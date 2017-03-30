<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TransferOrdersItems Controller
 *
 * @property \App\Model\Table\TransferOrdersItemsTable $TransferOrdersItems
 */
class TransferOrdersItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TransferOrders', 'Items']
        ];
        $transferOrdersItems = $this->paginate($this->TransferOrdersItems);

        $this->set(compact('transferOrdersItems'));
        $this->set('_serialize', ['transferOrdersItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Transfer Orders Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transferOrdersItem = $this->TransferOrdersItems->get($id, [
            'contain' => ['TransferOrders', 'Items']
        ]);

        $this->set('transferOrdersItem', $transferOrdersItem);
        $this->set('_serialize', ['transferOrdersItem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transferOrdersItem = $this->TransferOrdersItems->newEntity();
        if ($this->request->is('post')) {
            $transferOrdersItem = $this->TransferOrdersItems->patchEntity($transferOrdersItem, $this->request->getData());
            if ($this->TransferOrdersItems->save($transferOrdersItem)) {
                $this->Flash->success(__('The transfer orders item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transfer orders item could not be saved. Please, try again.'));
        }
        $transferOrders = $this->TransferOrdersItems->TransferOrders->find('list', ['limit' => 200]);
        $items = $this->TransferOrdersItems->Items->find('list', ['limit' => 200]);
        $this->set(compact('transferOrdersItem', 'transferOrders', 'items'));
        $this->set('_serialize', ['transferOrdersItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Transfer Orders Item id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transferOrdersItem = $this->TransferOrdersItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transferOrdersItem = $this->TransferOrdersItems->patchEntity($transferOrdersItem, $this->request->getData());
            if ($this->TransferOrdersItems->save($transferOrdersItem)) {
                $this->Flash->success(__('The transfer orders item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transfer orders item could not be saved. Please, try again.'));
        }
        $transferOrders = $this->TransferOrdersItems->TransferOrders->find('list', ['limit' => 200]);
        $items = $this->TransferOrdersItems->Items->find('list', ['limit' => 200]);
        $this->set(compact('transferOrdersItem', 'transferOrders', 'items'));
        $this->set('_serialize', ['transferOrdersItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Transfer Orders Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transferOrdersItem = $this->TransferOrdersItems->get($id);
        if ($this->TransferOrdersItems->delete($transferOrdersItem)) {
            $this->Flash->success(__('The transfer orders item has been deleted.'));
        } else {
            $this->Flash->error(__('The transfer orders item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
