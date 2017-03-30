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
        'contain' => ['RetailerEmployees', 'Suppliers']
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
            'contain' => ['RetailerEmployees', 'Suppliers', 'TransferOrderItems']
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
        $retailerEmployees = $this->TransferOrders->RetailerEmployees->find('list', ['limit' => 200]);
        $suppliers = $this->TransferOrders->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('transferOrder', 'retailerEmployees', 'suppliers'));
        $this->set('_serialize', ['transferOrder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Transfer Order id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
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

    /**
     * Delete method
     *
     * @param string|null $id Transfer Order id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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
}
