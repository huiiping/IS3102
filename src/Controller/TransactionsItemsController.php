<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TransactionsItems Controller
 *
 * @property \App\Model\Table\TransactionsItemsTable $TransactionsItems
 */
class TransactionsItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Transactions', 'Items']
        ];
        $transactionsItems = $this->paginate($this->TransactionsItems);

        $this->set(compact('transactionsItems'));
        $this->set('_serialize', ['transactionsItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Transactions Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transactionsItem = $this->TransactionsItems->get($id, [
            'contain' => ['Transactions', 'Items']
        ]);

        $this->set('transactionsItem', $transactionsItem);
        $this->set('_serialize', ['transactionsItem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transactionsItem = $this->TransactionsItems->newEntity();
        if ($this->request->is('post')) {
            $transactionsItem = $this->TransactionsItems->patchEntity($transactionsItem, $this->request->getData());
            if ($this->TransactionsItems->save($transactionsItem)) {
                $this->Flash->success(__('The transactions item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transactions item could not be saved. Please, try again.'));
        }
        $transactions = $this->TransactionsItems->Transactions->find('list', ['limit' => 200]);
        $items = $this->TransactionsItems->Items->find('list', ['limit' => 200]);
        $this->set(compact('transactionsItem', 'transactions', 'items'));
        $this->set('_serialize', ['transactionsItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Transactions Item id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transactionsItem = $this->TransactionsItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transactionsItem = $this->TransactionsItems->patchEntity($transactionsItem, $this->request->getData());
            if ($this->TransactionsItems->save($transactionsItem)) {
                $this->Flash->success(__('The transactions item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transactions item could not be saved. Please, try again.'));
        }
        $transactions = $this->TransactionsItems->Transactions->find('list', ['limit' => 200]);
        $items = $this->TransactionsItems->Items->find('list', ['limit' => 200]);
        $this->set(compact('transactionsItem', 'transactions', 'items'));
        $this->set('_serialize', ['transactionsItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Transactions Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transactionsItem = $this->TransactionsItems->get($id);
        if ($this->TransactionsItems->delete($transactionsItem)) {
            $this->Flash->success(__('The transactions item has been deleted.'));
        } else {
            $this->Flash->error(__('The transactions item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
