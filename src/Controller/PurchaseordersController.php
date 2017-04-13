<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;
use Cake\Mailer\Email;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * PurchaseOrders Controller
 *
 * @property \App\Model\Table\PurchaseOrdersTable $PurchaseOrders
 */
class PurchaseOrdersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        $this->loadComponent('Prg');
        $this->Prg->commonProcess();

        $this->paginate = [
        'contain' => ['Suppliers', 'Quotations', 'Locations']
        ];
        

        $this->set('purchaseOrders', $this->paginate($this->PurchaseOrders->find('searchable', $this->Prg->parsedParams())));
        $this->set(compact('purchaseOrders'));
        $this->set('_serialize', ['purchaseOrders']);
    }
    public $components = array(
        'Prg'
        );
    /**
     * View method
     *
     * @param string|null $id Purchase Order id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purchaseOrder = $this->PurchaseOrders->get($id, [
            'contain' => ['Suppliers', 'RetailerEmployees', 'PurchaseOrderItems']
        ]);

        $this->set('purchaseOrder', $purchaseOrder);
        $this->set('_serialize', ['purchaseOrder']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($quotationID=null, $supplierID=null)
    {
        $purchaseOrder = $this->PurchaseOrders->newEntity();
        if ($this->request->is('post')) {

            $fileName = $this->request->data['file']['name'];
            $uploadPath = 'uploads/files/';
            $uploadFile = $uploadPath.$fileName;

            if(move_uploaded_file($this->request->data['file']['tmp_name'],$uploadFile)){

                $uploadData = $this->PurchaseOrders->newEntity();
                $uploadData->created = date("Y-m-d H:i:s");
                $user = $this->request->session()->read('Auth.User');
                $uploadData->retailer_employee_id = $user['id'];
                $uploadData->file_name = $fileName;
                $uploadData->file_path = $uploadPath;
                $uploadData->approval_status = 'Pending';
                $uploadData->delivery_status = NULL;
                $uploadData->supplier_id = $supplierID;
                $uploadData->quotation_id = $quotationID;
                $uploadData->location_id = $_POST['location_id'];

                
                if ($this->PurchaseOrders->save($uploadData)) {

                    $this->Flash->success(__('Purchase Order has been uploaded and submitted successfully.'));

                    return $this->redirect(['action' => 'index']);

                }else{

                    $this->Flash->error(__('Unable to upload file, please try again.'));
                    echo date("Y-m-d H:i:s");
                    echo $user['id'];
                    echo $fileName;
                    echo $uploadPath;
                    echo $supplierID;
                    echo $quotationID;
                    echo $_POST['location_id'];
                }

            }else{

                $this->Flash->error(__('Unable to upload Purchase Order, please try again.'));

            }



        }
        $retailer_employee_ids = $this->PurchaseOrders->RetailerEmployees->find('list', ['limit' => 200]);
        $suppliers = $this->PurchaseOrders->Suppliers->find('list', ['limit' => 200]);
        $quotations = $this->PurchaseOrders->Quotations->find('list', ['limit' => 200]);
        $locations = $this->PurchaseOrders->Locations->find('all')->toArray();
        $this->set(compact('purchaseOrder', 'suppliers', 'quotations', 'locations', 'retailer_employee_ids', 'quotationID', 'supplierID'));
        $this->set('_serialize', ['purchaseOrder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Purchase Order id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purchaseOrder = $this->PurchaseOrders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchaseOrder = $this->PurchaseOrders->patchEntity($purchaseOrder, $this->request->getData());
            if ($this->PurchaseOrders->save($purchaseOrder)) {
                $this->Flash->success(__('The purchase order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase order could not be saved. Please, try again.'));
        }
        $suppliers = $this->PurchaseOrders->Suppliers->find('list', ['limit' => 200]);
        $quotations = $this->PurchaseOrders->Quotations->find('list', ['limit' => 200]);
        $locations = $this->PurchaseOrders->Locations->find('list', ['limit' => 200]);
        $this->set(compact('purchaseOrder', 'suppliers', 'retailerEmployees'));
        $this->set('_serialize', ['purchaseOrder']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Purchase Order id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purchaseOrder = $this->PurchaseOrders->get($id);
        if ($this->PurchaseOrders->delete($purchaseOrder)) {
            $this->Flash->success(__('The purchase order has been deleted.'));
        } else {
            $this->Flash->error(__('The purchase order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function download($id = null) { 

        $purchaseOrder = $this->PurchaseOrders->get($id);
        $filePath = $purchaseOrder['file_path'] . DS . $purchaseOrder['file_name'];
        $this->response->file($filePath , array('download'=> true, 'name'=> $purchaseOrder['file_name']));

        return $this->response;
    }
    public function supplierIndex($id = null) {

        $this->loadComponent('Prg');
        $this->Prg->commonProcess();

        $this->paginate = [
        'contain' => ['Suppliers', 'Quotations', 'Locations']
        ];

        $session = $this->request->session();
        $supplier = $session->read('supplier');
        $supplier_id = $supplier['id'];
        

        if($id != null) {
            $this->set('purchaseorders', $this->paginate($this->PurchaseOrders->find('searchable', $this->Prg->parsedParams())->where(['PurchaseOrders.quotation_id' => $id])->order(['PurchaseOrders.created' => 'DESC'])));
        } else { 
            /*$conn = ConnectionManager::get('default');
            $purchaseorders = $conn
                ->newQuery()
                ->select('*')
                ->from('purchase_orders')
                ->where([
                    'supplier_id' =>  $supplier['id'],
                    ]) 
                ->execute()
                ->fetchAll('assoc');
                $this->set('purchaseorders',  $this->paginate($purchaseorders));

             $this->set('purchaseorders', $this->paginate($this->PurchaseOrders->find('searchable', $this->Prg->parsedParams())));*/

            $this->set('purchaseorders', $this->paginate($this->PurchaseOrders->find('searchable', $this->Prg->parsedParams())->where(['PurchaseOrders.supplier_id' => $supplier_id])));
        }

        $this->set('id', $id);
        $this->set(compact('purchaseorders', 'id'));
        $this->set('_serialize', ['purchaseorders']);
    }

    public function approveOrder($id) {

        $purchaseOrder = $this->PurchaseOrders->get($id);
        $purchaseOrder->approval_status = 'Approved';
        $purchaseOrder->delivery_status = 0;
        $this->PurchaseOrders->save($purchaseOrder);
        $this->Flash->success(__('The Purchase Order has been approved.'));

        return $this->redirect(['action' => 'supplierIndex']);
    }

    public function rejectOrder($id) {

        $purchaseOrder = $this->PurchaseOrders->get($id);
        $purchaseOrder->approval_status = 'Rejected';
        $purchaseOrder->delivery_status = NULL;
        $this->PurchaseOrders->save($purchaseOrder);
        $this->Flash->success(__('The Purchase Order has been rejected.'));

        return $this->redirect(['action' => 'supplierIndex']);
    }
    public function pendingOrder($id) {

       $purchaseOrder = $this->PurchaseOrders->get($id);
       $purchaseOrder->approval_status = 'Pending';
       $purchaseOrder->delivery_status = NULL;
       $this->PurchaseOrders->save($purchaseOrder);
       $this->Flash->success(__('The Purchase Order\'s status has been revert to pending.'));

       return $this->redirect(['action' => 'supplierIndex']);
   }

    public function listpurchaseorders() 
    {
    
        $pos = $this->PurchaseOrders->find()->where(['delivery_status' => 0])->toArray();

        foreach ($pos as $row) {
            echo ($row['id']);
            echo "\n";
        }

        die;
        
    }

    public function listpoitems(){

        $this->loadModel("PurchaseOrderItems");
        $id = $_POST['id'];

        $array = $this->PurchaseOrderItems->find()->where(['purchase_order_id' => $id])->where(['quantity >' => 0])->toArray();

        foreach($array as $row){
            echo ($row['id']);
            echo "\n";
            echo ($row['itemID']);
            echo "\n";
            echo ($row['description']);
            echo "\n";
            echo ($row['quantity']);
            echo "\n";
            echo ($row['unit_price']);
            echo "\n";
        }

        die;
    }


}
