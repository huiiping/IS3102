<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RetaileremployeesTransactions Controller
 *
 * @property \App\Model\Table\RetaileremployeesTransactionsTable $RetaileremployeesTransactions
 */
class RetaileremployeesTransactionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Retaileremployees', 'Transactions']
        ];
        $retaileremployeesTransactions = $this->paginate($this->RetaileremployeesTransactions);

        $this->set(compact('retaileremployeesTransactions'));
        $this->set('_serialize', ['retaileremployeesTransactions']);
    }

    /**
     * View method
     *
     * @param string|null $id Retaileremployees Transaction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retaileremployeesTransaction = $this->RetaileremployeesTransactions->get($id, [
            'contain' => ['Retaileremployees', 'Transactions']
        ]);

        $this->set('retaileremployeesTransaction', $retaileremployeesTransaction);
        $this->set('_serialize', ['retaileremployeesTransaction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retaileremployeesTransaction = $this->RetaileremployeesTransactions->newEntity();
        if ($this->request->is('post')) {
            $retaileremployeesTransaction = $this->RetaileremployeesTransactions->patchEntity($retaileremployeesTransaction, $this->request->data);
            if ($this->RetaileremployeesTransactions->save($retaileremployeesTransaction)) {
                $this->Flash->success(__('The retaileremployees transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retaileremployees transaction could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->RetaileremployeesTransactions->Retaileremployees->find('list', ['limit' => 200]);
        $transactions = $this->RetaileremployeesTransactions->Transactions->find('list', ['limit' => 200]);
        $this->set(compact('retaileremployeesTransaction', 'retaileremployees', 'transactions'));
        $this->set('_serialize', ['retaileremployeesTransaction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retaileremployees Transaction id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retaileremployeesTransaction = $this->RetaileremployeesTransactions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retaileremployeesTransaction = $this->RetaileremployeesTransactions->patchEntity($retaileremployeesTransaction, $this->request->data);
            if ($this->RetaileremployeesTransactions->save($retaileremployeesTransaction)) {
                $this->Flash->success(__('The retaileremployees transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retaileremployees transaction could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->RetaileremployeesTransactions->Retaileremployees->find('list', ['limit' => 200]);
        $transactions = $this->RetaileremployeesTransactions->Transactions->find('list', ['limit' => 200]);
        $this->set(compact('retaileremployeesTransaction', 'retaileremployees', 'transactions'));
        $this->set('_serialize', ['retaileremployeesTransaction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retaileremployees Transaction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retaileremployeesTransaction = $this->RetaileremployeesTransactions->get($id);
        if ($this->RetaileremployeesTransactions->delete($retaileremployeesTransaction)) {
            $this->Flash->success(__('The retaileremployees transaction has been deleted.'));
        } else {
            $this->Flash->error(__('The retaileremployees transaction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
