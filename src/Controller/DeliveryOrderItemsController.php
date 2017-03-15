<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DeliveryOrderItems Controller
 *
 * @property \App\Model\Table\DeliveryOrderItemsTable $DeliveryOrderItems
 */
class DeliveryOrderItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DeliveryOrders']
        ];
        $deliveryOrderItems = $this->paginate($this->DeliveryOrderItems);

        $this->set(compact('deliveryOrderItems'));
        $this->set('_serialize', ['deliveryOrderItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Delivery Order Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deliveryOrderItem = $this->DeliveryOrderItems->get($id, [
            'contain' => ['DeliveryOrders']
        ]);

        $this->set('deliveryOrderItem', $deliveryOrderItem);
        $this->set('_serialize', ['deliveryOrderItem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deliveryOrderItem = $this->DeliveryOrderItems->newEntity();
        if ($this->request->is('post')) {
            $deliveryOrderItem = $this->DeliveryOrderItems->patchEntity($deliveryOrderItem, $this->request->getData());
            if ($this->DeliveryOrderItems->save($deliveryOrderItem)) {
                $this->Flash->success(__('The delivery order item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The delivery order item could not be saved. Please, try again.'));
        }
        $deliveryOrders = $this->DeliveryOrderItems->DeliveryOrders->find('list', ['limit' => 200]);
        $this->set(compact('deliveryOrderItem', 'deliveryOrders'));
        $this->set('_serialize', ['deliveryOrderItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Delivery Order Item id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deliveryOrderItem = $this->DeliveryOrderItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deliveryOrderItem = $this->DeliveryOrderItems->patchEntity($deliveryOrderItem, $this->request->getData());
            if ($this->DeliveryOrderItems->save($deliveryOrderItem)) {
                $this->Flash->success(__('The delivery order item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The delivery order item could not be saved. Please, try again.'));
        }
        $deliveryOrders = $this->DeliveryOrderItems->DeliveryOrders->find('list', ['limit' => 200]);
        $this->set(compact('deliveryOrderItem', 'deliveryOrders'));
        $this->set('_serialize', ['deliveryOrderItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Delivery Order Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deliveryOrderItem = $this->DeliveryOrderItems->get($id);
        if ($this->DeliveryOrderItems->delete($deliveryOrderItem)) {
            $this->Flash->success(__('The delivery order item has been deleted.'));
        } else {
            $this->Flash->error(__('The delivery order item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
