<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TransferOrderItems Controller
 *
 * @property \App\Model\Table\TransferOrderItemsTable $TransferOrderItems
 */
class TransferOrderItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TransferOrders']
        ];
        $transferOrderItems = $this->paginate($this->TransferOrderItems);

        $this->set(compact('transferOrderItems'));
        $this->set('_serialize', ['transferOrderItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Transfer Order Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transferOrderItem = $this->TransferOrderItems->get($id, [
            'contain' => ['TransferOrders']
        ]);

        $this->set('transferOrderItem', $transferOrderItem);
        $this->set('_serialize', ['transferOrderItem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transferOrderItem = $this->TransferOrderItems->newEntity();
        if ($this->request->is('post')) {
            $transferOrderItem = $this->TransferOrderItems->patchEntity($transferOrderItem, $this->request->getData());
            if ($this->TransferOrderItems->save($transferOrderItem)) {
                $this->Flash->success(__('The transfer order item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transfer order item could not be saved. Please, try again.'));
        }
        $transferOrders = $this->TransferOrderItems->TransferOrders->find('list', ['limit' => 200]);
        $this->set(compact('transferOrderItem', 'transferOrders'));
        $this->set('_serialize', ['transferOrderItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Transfer Order Item id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transferOrderItem = $this->TransferOrderItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transferOrderItem = $this->TransferOrderItems->patchEntity($transferOrderItem, $this->request->getData());
            if ($this->TransferOrderItems->save($transferOrderItem)) {
                $this->Flash->success(__('The transfer order item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transfer order item could not be saved. Please, try again.'));
        }
        $transferOrders = $this->TransferOrderItems->TransferOrders->find('list', ['limit' => 200]);
        $this->set(compact('transferOrderItem', 'transferOrders'));
        $this->set('_serialize', ['transferOrderItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Transfer Order Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transferOrderItem = $this->TransferOrderItems->get($id);
        if ($this->TransferOrderItems->delete($transferOrderItem)) {
            $this->Flash->success(__('The transfer order item has been deleted.'));
        } else {
            $this->Flash->error(__('The transfer order item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
