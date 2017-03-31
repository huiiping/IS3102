<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;


class TransferOrdersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadcomponent('DbSchema');
        $this->loadComponent('Logging');
    }

    public function index()
    {
        $this->loadComponent('Prg');
        $this->Prg->commonProcess();
        $this->paginate = [
        'contain' => ['RetailerEmployees', 'Suppliers', 'Locations']
        ];
        $this->set('transferOrders', $this->paginate($this->TransferOrders->find('searchable', $this->Prg->parsedParams())));
        // $transferOrders = $this->paginate($this->TransferOrders);


        $this->set(compact('transferOrders'));
        $this->set('_serialize', ['transferOrders']);
    }

    public $components = array(
        'Prg'
        );

    public function view($id = null)
    {
        $transferOrder = $this->TransferOrders->get($id, [
            'contain' => ['RetailerEmployees', 'Suppliers','Items']
            ]);

        $this->set('transferOrder', $transferOrder);
        $this->set('_serialize', ['transferOrder']);
    }

    public function add()
    {
        $transferOrder = $this->TransferOrders->newEntity();
        if ($this->request->is('post')) {
            $transferOrder = $this->TransferOrders->patchEntity($transferOrder, $this->request->getData());

            if ($this->TransferOrders->save($transferOrder)) {

                
                $this->Flash->success(__('The transfer order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transfer order could not be saved. Please, try again.'));
        }
        $locations = $this->TransferOrders->Locations->find('list', ['limit' => 200]);
        $retailerEmployees = $this->TransferOrders->RetailerEmployees->find('list', ['limit' => 200]);
        $suppliers = $this->TransferOrders->Suppliers->find('list', ['limit' => 200]);
        $this->set('items', $this->TransferOrders->items->find('all'));
        $this->set(compact('transferOrder', 'retailerEmployees', 'suppliers','locations','items'));
        $this->set('_serialize', ['transferOrder']);
    }

    public function edit($id = null)
    {
        $transferOrder = $this->TransferOrders->get($id, [
            'contain' => []
            ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transferOrder = $this->TransferOrders->patchEntity($transferOrder, $this->request->getData());
            if ($this->TransferOrders->save($transferOrder)) {
                $this->Flash->success(__('The transfer order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transfer order could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->TransferOrders->RetailerEmployees->find('list', ['limit' => 200]);
        $suppliers = $this->TransferOrders->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('transferOrder', 'retailerEmployees', 'suppliers'));
        $this->set('_serialize', ['transferOrder']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transferOrder = $this->TransferOrders->get($id);
        if ($this->TransferOrders->delete($transferOrder)) {
            $this->Flash->success(__('The transfer order has been deleted.'));
        } else {
            $this->Flash->error(__('The transfer order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function pendingStatus($id) {

      $transferOrder = $this->TransferOrders->get($id);

      $transferOrder->status = 'Pending';
      $this->TransferOrders->save($transferOrder);

      $session = $this->request->session();
      $retailer = $session->read('retailer');
      $this->Logging->rLog($transferOrder['id']);
      $this->Logging->iLog($retailer, $transferOrder['id']);

      $this->Flash->success(__('The Transfer Order has a pending status.'));

      return $this->redirect(['action' => 'index']);
  }

  public function rejectedStatus($id) {

      $transferOrder = $this->TransferOrders->get($id);

      $transferOrder->status = 'Rejected';
      $this->TransferOrders->save($transferOrder);

      $session = $this->request->session();
      $retailer = $session->read('retailer');
      $this->Logging->rLog($transferOrder['id']);
      $this->Logging->iLog($retailer, $transferOrder['id']);

      $this->Flash->success(__('The Transfer Order has a rejected status.'));

      return $this->redirect(['action' => 'index']);

  }

  public function acceptedStatus($id) {

      $transferOrder = $this->TransferOrders->get($id);

      $transferOrder->status = 'Accepted';
      $this->TransferOrders->save($transferOrder);

      $session = $this->request->session();
      $retailer = $session->read('retailer');
      $this->Logging->rLog($transferOrder['id']);
      $this->Logging->iLog($retailer, $transferOrder['id']);

      $this->Flash->success(__('The Transfer Order has an accepted status.'));

      return $this->redirect(['action' => 'index']);

  }
}
