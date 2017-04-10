<?php
namespace App\Controller;

use App\Controller\AppController;

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
        $this->paginate = [
            'contain' => ['Suppliers', 'RetailerEmployees']
        ];
        $purchaseOrders = $this->paginate($this->PurchaseOrders);

        $this->set(compact('purchaseOrders'));
        $this->set('_serialize', ['purchaseOrders']);
    }

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
    public function add()
    {
        $purchaseOrder = $this->PurchaseOrders->newEntity();
        if ($this->request->is('post')) {
            $purchaseOrder = $this->PurchaseOrders->patchEntity($purchaseOrder, $this->request->getData());
            if ($this->PurchaseOrders->save($purchaseOrder)) {
                $this->Flash->success(__('The purchase order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase order could not be saved. Please, try again.'));
        }
        $suppliers = $this->PurchaseOrders->Suppliers->find('list', ['limit' => 200]);
        $retailerEmployees = $this->PurchaseOrders->RetailerEmployees->find('list', ['limit' => 200]);
        $this->set(compact('purchaseOrder', 'suppliers', 'retailerEmployees'));
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
        $retailerEmployees = $this->PurchaseOrders->RetailerEmployees->find('list', ['limit' => 200]);
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
