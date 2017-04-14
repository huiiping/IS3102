<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Transactions Controller
 *
 * @property \App\Model\Table\TransactionsTable $Transactions
 */
class TransactionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
        'contain' => ['Customers', 'RetailerEmployees', 'Locations']
        ];
        $transactions = $this->paginate($this->Transactions);

        $this->set(compact('transactions'));
        $this->set('_serialize', ['transactions']);
    }

    /**
     * View method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transaction = $this->Transactions->get($id, [
            'contain' => ['Customers', 'RetailerEmployees', 'Locations']
            ]);

        $this->set('transaction', $transaction);
        $this->set('_serialize', ['transaction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transaction = $this->Transactions->newEntity();
        if ($this->request->is('post')) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->getData());
            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
        }
        $items = $this->Transactions->Items->find('list', ['limit' => 200]);
        $customers = $this->Transactions->Customers->find('list', ['limit' => 200]);
        $retailerEmployees = $this->Transactions->RetailerEmployees->find('list', ['limit' => 200]);
        $locations = $this->Transactions->Locations->find('list', ['limit' => 200]);
        $this->set(compact('transaction', 'customers', 'retailerEmployees', 'locations', 'items'));
        $this->set('_serialize', ['transaction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transaction = $this->Transactions->get($id, [
            'contain' => []
            ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->getData());
            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
        }
        $customers = $this->Transactions->Customers->find('list', ['limit' => 200]);
        $retailerEmployees = $this->Transactions->RetailerEmployees->find('list', ['limit' => 200]);
        $locations = $this->Transactions->Locations->find('list', ['limit' => 200]);
        $this->set(compact('transaction', 'customers', 'retailerEmployees', 'locations'));
        $this->set('_serialize', ['transaction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transaction = $this->Transactions->get($id);
        if ($this->Transactions->delete($transaction)) {
            $this->Flash->success(__('The transaction has been deleted.'));
        } else {
            $this->Flash->error(__('The transaction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

   public function addStoreTransaction() {

        $this->loadModel('Customers');
        $this->loadModel('TransactionsItems');
        $this->loadModel('Items');
        $this->loadModel('Products');
        $this->loadModel('DeliveryOrders');
        $this->loadModel('DeliveryOrdersItems');

        //Variables
        $receiptNum = $_POST['receipt_number'];
        $cardID = $_POST['cardID'];
        $location = $_POST['location'];
        $grossAmt = $_POST['grossAmt'];
        $grossAmt = explode("$", $grossAmt);
        $netAmt = $_POST['netAmt'];
        $netAmt = explode("$", $netAmt);
        $memberDiscount = $_POST['memberDiscount'];
        $otherDiscount = $_POST['otherDiscount'];
        $items = $_POST['items'];
        $items = explode("," , $items);
        $employeeID = $_POST['employeeID'];
        $address = $_POST['address'];
        $deliveryCost = $_POST['deliveryCost'];
        $transactionID = null;
        $customer = null;
        $deliveryOrderID = null;

        //Customer
        if(!empty($cardID)) {
            $query = $this->Customers->find()->where(['member_identification' => $cardID]);
            $first = $query->first();
            if (!empty($first)) {
                $customer = $this->Customers->get($first['id']);
            }
            else {
                echo ("Customer does not exist!");
                echo ("\n");
                die();
            }
        }

        //Creating new transaction
        $transaction = $this->Transactions->newEntity();
        $transaction->receipt_number = $receiptNum;
        $transaction->customer_id = $customer['id'];
        $transaction->retailer_employee_id = $employeeID;
        $transaction->location_id = $location;
        $transaction->gross_amount = $grossAmt[1];
        $transaction->nett_amount = $netAmt[1];
        $transaction->member_discount = $memberDiscount/100;
        $transaction->other_discount = $otherDiscount/100;
            
        if ($this->Transactions->save($transaction)) {
            $transactionID = $transaction->id;
        }

        //Finding the item
        $productID = $this->Products->find()->where(['barcode' => $items], ['barcode' => 'string[]'])->select('id');
        $query = $this->Items->find()->where(['product_id' => $productID], ['product_id' => 'integer[]'])
                ->where(['location_id' => $location])
                ->toArray();

        //Creating the transaction item record
        foreach ($query as $q) {
            $transactionsItem = $this->TransactionsItems->newEntity();
            $transactionsItem->transaction_id = $transactionID;
            $transactionsItem->item_id = $q['id'];
            $this->TransactionsItems->save($transactionsItem);

            //Setting item status to sold
            $item = $this->Items->get($q['id']);
            $item['status'] = "Sold";
            $this->Items->save($item);

            //Checking and trigerring low stock alert
            $this->redirect(['controller' => 'Items' ,'action' => 'checkStock', $item['id'], $location]);
        }

        if (!empty($address)) {

            //Creating delivery order
            $deliveryOrder = $this->DeliveryOrders->newEntity();
            $deliveryOrder->fee = $deliveryCost;
            $deliveryOrder->customer_id = $customer['id'];
            $deliveryOrder->retailer_employee_id = $employeeID;
            $deliveryOrder->status = "Pending";
            $deliveryOrder->location_id = $location;
            $deliveryOrder->transaction_id = $transactionID;
                
            if ($this->DeliveryOrders->save($deliveryOrder)) {
                $deliveryOrderID = $deliveryOrder->id;
            }

            //Creating delivery order items 
            foreach ($query as $q) {
                $deliveryOrderItems = $this->DeliveryOrdersItems->newEntity();
                $deliveryOrderItems->delivery_order_id = $deliveryOrderID;
                $deliveryOrderItems->item_id = $q['id'];
                $this->DeliveryOrdersItems->save($deliveryOrderItems);
            }
        }

        echo ("Success");
        echo ("\n");
        die();
    }

    public function approvedStatus($id) {

        $transaction = $this->Transactions->get($id);

        $transaction->status = 'Approved';
        $this->Transactions->save($transaction);

        $this->Flash->success(__('The transaction has an approved status.'));

        return $this->redirect(['action' => 'index']);

    }

    public function editLocation($tid, $lid) {

        $transaction = $this->Transactions->get($tid);

        $transaction->location_id = $lid;
        $this->Transactions->save($transaction);

        $this->Flash->success(__('The new location has been saved.'));

        return $this->redirect(['action' => 'index']);

    }
}
