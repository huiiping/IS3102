<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * PurchaseOrderItems Controller
 *
 * @property \App\Model\Table\PurchaseOrderItemsTable $PurchaseOrderItems
 */
class PurchaseOrderItemsController extends AppController
{

    public function beforeFilter(Event $event)
    {

        $this->loadComponent('Logging');
        
    }

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
            'contain' => ['PurchaseOrders']
        ];

        $this->set('purchaseOrderItems', $this->paginate($this->PurchaseOrderItems->find('searchable', $this->Prg->parsedParams())));
        $this->set(compact('purchaseOrderItems'));
        $this->set('_serialize', ['purchaseOrderItems']);
    }

    public $components = array(
        'Prg'
    );
    /**
     * View method
     *
     * @param string|null $id Purchase Order Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purchaseOrderItem = $this->PurchaseOrderItems->get($id, [
            'contain' => ['PurchaseOrders']
        ]);

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        $this->Logging->rLog($purchaseOrderItem['id']);
        $this->Logging->iLog($retailer, $purchaseOrderItem['id']);

        $this->set('purchaseOrderItem', $purchaseOrderItem);
        $this->set('_serialize', ['purchaseOrderItem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $purchaseOrderItem = $this->PurchaseOrderItems->newEntity();
        if ($this->request->is('post')) {
            $purchaseOrderItem = $this->PurchaseOrderItems->patchEntity($purchaseOrderItem, $this->request->data);
            if ($this->PurchaseOrderItems->save($purchaseOrderItem)) {
                $this->Flash->success(__('The purchase order item has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($purchaseOrderItem['id']);
                $this->Logging->iLog($retailer, $purchaseOrderItem['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase order item could not be saved. Please, try again.'));
        }
        $purchaseOrders = $this->PurchaseOrderItems->PurchaseOrders->find('list', ['limit' => 200]);
        $this->set(compact('purchaseOrderItem', 'purchaseOrders'));
        $this->set('_serialize', ['purchaseOrderItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Purchase Order Item id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purchaseOrderItem = $this->PurchaseOrderItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchaseOrderItem = $this->PurchaseOrderItems->patchEntity($purchaseOrderItem, $this->request->data);
            if ($this->PurchaseOrderItems->save($purchaseOrderItem)) {
                $this->Flash->success(__('The purchase order item has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($purchaseOrderItem['id']);
                $this->Logging->iLog($retailer, $purchaseOrderItem['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase order item could not be saved. Please, try again.'));
        }
        $purchaseOrders = $this->PurchaseOrderItems->PurchaseOrders->find('list', ['limit' => 200]);
        $this->set(compact('purchaseOrderItem', 'purchaseOrders'));
        $this->set('_serialize', ['purchaseOrderItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Purchase Order Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purchaseOrderItem = $this->PurchaseOrderItems->get($id);
        if ($this->PurchaseOrderItems->delete($purchaseOrderItem)) {
            $this->Flash->success(__('The purchase order item has been deleted.'));

            $session = $this->request->session();
            $retailer = $session->read('retailer');

            //$this->loadComponent('Logging');
            $this->Logging->rLog($purchaseOrderItem['id']);
            $this->Logging->iLog($retailer, $purchaseOrderItem['id']);
            
        } else {
            $this->Flash->error(__('The purchase order item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
