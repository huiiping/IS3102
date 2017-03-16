<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TransactionItems Controller
 *
 * @property \App\Model\Table\TransactionItemsTable $TransactionItems
 */
class TransactionItemsController extends AppController
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
        $transactionItems = $this->paginate($this->TransactionItems);

        $this->set(compact('transactionItems'));
        $this->set('_serialize', ['transactionItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Transaction Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transactionItem = $this->TransactionItems->get($id, [
            'contain' => ['Transactions', 'Items']
        ]);

        $this->set('transactionItem', $transactionItem);
        $this->set('_serialize', ['transactionItem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transactionItem = $this->TransactionItems->newEntity();
        if ($this->request->is('post')) {
            $transactionItem = $this->TransactionItems->patchEntity($transactionItem, $this->request->getData());
            if ($this->TransactionItems->save($transactionItem)) {
                $this->Flash->success(__('The transaction item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction item could not be saved. Please, try again.'));
        }
        $transactions = $this->TransactionItems->Transactions->find('list', ['limit' => 200]);
        $items = $this->TransactionItems->Items->find('list', ['limit' => 200]);
        $this->set(compact('transactionItem', 'transactions', 'items'));
        $this->set('_serialize', ['transactionItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Transaction Item id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transactionItem = $this->TransactionItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transactionItem = $this->TransactionItems->patchEntity($transactionItem, $this->request->getData());
            if ($this->TransactionItems->save($transactionItem)) {
                $this->Flash->success(__('The transaction item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction item could not be saved. Please, try again.'));
        }
        $transactions = $this->TransactionItems->Transactions->find('list', ['limit' => 200]);
        $items = $this->TransactionItems->Items->find('list', ['limit' => 200]);
        $this->set(compact('transactionItem', 'transactions', 'items'));
        $this->set('_serialize', ['transactionItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Transaction Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transactionItem = $this->TransactionItems->get($id);
        if ($this->TransactionItems->delete($transactionItem)) {
            $this->Flash->success(__('The transaction item has been deleted.'));
        } else {
            $this->Flash->error(__('The transaction item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
