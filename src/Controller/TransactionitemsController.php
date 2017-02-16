<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Transactionitems Controller
 *
 * @property \App\Model\Table\TransactionitemsTable $Transactionitems
 */
class TransactionitemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Items', 'Transactions']
        ];
        $transactionitems = $this->paginate($this->Transactionitems);

        $this->set(compact('transactionitems'));
        $this->set('_serialize', ['transactionitems']);
    }

    /**
     * View method
     *
     * @param string|null $id Transactionitem id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transactionitem = $this->Transactionitems->get($id, [
            'contain' => ['Items', 'Transactions']
        ]);

        $this->set('transactionitem', $transactionitem);
        $this->set('_serialize', ['transactionitem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transactionitem = $this->Transactionitems->newEntity();
        if ($this->request->is('post')) {
            $transactionitem = $this->Transactionitems->patchEntity($transactionitem, $this->request->data);
            if ($this->Transactionitems->save($transactionitem)) {
                $this->Flash->success(__('The transactionitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transactionitem could not be saved. Please, try again.'));
        }
        $items = $this->Transactionitems->Items->find('list', ['limit' => 200]);
        $transactions = $this->Transactionitems->Transactions->find('list', ['limit' => 200]);
        $this->set(compact('transactionitem', 'items', 'transactions'));
        $this->set('_serialize', ['transactionitem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Transactionitem id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transactionitem = $this->Transactionitems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transactionitem = $this->Transactionitems->patchEntity($transactionitem, $this->request->data);
            if ($this->Transactionitems->save($transactionitem)) {
                $this->Flash->success(__('The transactionitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transactionitem could not be saved. Please, try again.'));
        }
        $items = $this->Transactionitems->Items->find('list', ['limit' => 200]);
        $transactions = $this->Transactionitems->Transactions->find('list', ['limit' => 200]);
        $this->set(compact('transactionitem', 'items', 'transactions'));
        $this->set('_serialize', ['transactionitem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Transactionitem id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transactionitem = $this->Transactionitems->get($id);
        if ($this->Transactionitems->delete($transactionitem)) {
            $this->Flash->success(__('The transactionitem has been deleted.'));
        } else {
            $this->Flash->error(__('The transactionitem could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
