<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DeliveryOrders Controller
 *
 * @property \App\Model\Table\DeliveryOrdersTable $DeliveryOrders
 */
class DeliveryOrdersController extends AppController
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
        $deliveryOrders = $this->paginate($this->DeliveryOrders);

        $this->set(compact('deliveryOrders'));
        $this->set('_serialize', ['deliveryOrders']);
    }

    /**
     * View method
     *
     * @param string|null $id Delivery Order id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deliveryOrder = $this->DeliveryOrders->get($id, [
            'contain' => ['Customers', 'RetailerEmployees', 'Locations', 'Transactions', 'DeliveryOrderItems']
        ]);

        $this->set('deliveryOrder', $deliveryOrder);
        $this->set('_serialize', ['deliveryOrder']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deliveryOrder = $this->DeliveryOrders->newEntity();
        if ($this->request->is('post')) {
            $deliveryOrder = $this->DeliveryOrders->patchEntity($deliveryOrder, $this->request->getData());
            if ($this->DeliveryOrders->save($deliveryOrder)) {
                $this->Flash->success(__('The delivery order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The delivery order could not be saved. Please, try again.'));
        }
        $customers = $this->DeliveryOrders->Customers->find('list', ['limit' => 200]);
        $retailerEmployees = $this->DeliveryOrders->RetailerEmployees->find('list', ['limit' => 200]);
        $locations = $this->DeliveryOrders->Locations->find('list', ['limit' => 200]);
        $this->set(compact('deliveryOrder', 'customers', 'retailerEmployees', 'locations'));
        $this->set('_serialize', ['deliveryOrder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Delivery Order id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deliveryOrder = $this->DeliveryOrders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deliveryOrder = $this->DeliveryOrders->patchEntity($deliveryOrder, $this->request->getData());
            if ($this->DeliveryOrders->save($deliveryOrder)) {
                $this->Flash->success(__('The delivery order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The delivery order could not be saved. Please, try again.'));
        }
        $customers = $this->DeliveryOrders->Customers->find('list', ['limit' => 200]);
        $retailerEmployees = $this->DeliveryOrders->RetailerEmployees->find('list', ['limit' => 200]);
        $locations = $this->DeliveryOrders->Locations->find('list', ['limit' => 200]);
        $this->set(compact('deliveryOrder', 'customers', 'retailerEmployees', 'locations'));
        $this->set('_serialize', ['deliveryOrder']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Delivery Order id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deliveryOrder = $this->DeliveryOrders->get($id);
        if ($this->DeliveryOrders->delete($deliveryOrder)) {
            $this->Flash->success(__('The delivery order has been deleted.'));
        } else {
            $this->Flash->error(__('The delivery order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
