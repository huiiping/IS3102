<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DeliveryOrdersItems Controller
 *
 * @property \App\Model\Table\DeliveryOrdersItemsTable $DeliveryOrdersItems
 */
class DeliveryOrdersItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DeliveryOrders', 'Items']
        ];
        $deliveryOrdersItems = $this->paginate($this->DeliveryOrdersItems);

        $this->set(compact('deliveryOrdersItems'));
        $this->set('_serialize', ['deliveryOrdersItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Delivery Orders Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deliveryOrdersItem = $this->DeliveryOrdersItems->get($id, [
            'contain' => ['DeliveryOrders', 'Items']
        ]);

        $this->set('deliveryOrdersItem', $deliveryOrdersItem);
        $this->set('_serialize', ['deliveryOrdersItem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deliveryOrdersItem = $this->DeliveryOrdersItems->newEntity();
        if ($this->request->is('post')) {
            $deliveryOrdersItem = $this->DeliveryOrdersItems->patchEntity($deliveryOrdersItem, $this->request->getData());
            if ($this->DeliveryOrdersItems->save($deliveryOrdersItem)) {
                $this->Flash->success(__('The delivery orders item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The delivery orders item could not be saved. Please, try again.'));
        }
        $deliveryOrders = $this->DeliveryOrdersItems->DeliveryOrders->find('list', ['limit' => 200]);
        $items = $this->DeliveryOrdersItems->Items->find('list', ['limit' => 200]);
        $this->set(compact('deliveryOrdersItem', 'deliveryOrders', 'items'));
        $this->set('_serialize', ['deliveryOrdersItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Delivery Orders Item id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deliveryOrdersItem = $this->DeliveryOrdersItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deliveryOrdersItem = $this->DeliveryOrdersItems->patchEntity($deliveryOrdersItem, $this->request->getData());
            if ($this->DeliveryOrdersItems->save($deliveryOrdersItem)) {
                $this->Flash->success(__('The delivery orders item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The delivery orders item could not be saved. Please, try again.'));
        }
        $deliveryOrders = $this->DeliveryOrdersItems->DeliveryOrders->find('list', ['limit' => 200]);
        $items = $this->DeliveryOrdersItems->Items->find('list', ['limit' => 200]);
        $this->set(compact('deliveryOrdersItem', 'deliveryOrders', 'items'));
        $this->set('_serialize', ['deliveryOrdersItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Delivery Orders Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deliveryOrdersItem = $this->DeliveryOrdersItems->get($id);
        if ($this->DeliveryOrdersItems->delete($deliveryOrdersItem)) {
            $this->Flash->success(__('The delivery orders item has been deleted.'));
        } else {
            $this->Flash->error(__('The delivery orders item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
