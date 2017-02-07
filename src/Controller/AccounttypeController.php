<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Accounttype Controller
 *
 * @property \App\Model\Table\AccounttypeTable $Accounttype
 */
class AccounttypeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $accounttype = $this->paginate($this->Accounttype);

        $this->set(compact('accounttype'));
        $this->set('_serialize', ['accounttype']);
    }

    /**
     * View method
     *
     * @param string|null $id Accounttype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $accounttype = $this->Accounttype->get($id, [
            'contain' => []
        ]);

        $this->set('accounttype', $accounttype);
        $this->set('_serialize', ['accounttype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $accounttype = $this->Accounttype->newEntity();
        if ($this->request->is('post')) {
            $accounttype = $this->Accounttype->patchEntity($accounttype, $this->request->data);
            if ($this->Accounttype->save($accounttype)) {
                $this->Flash->success(__('The accounttype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The accounttype could not be saved. Please, try again.'));
        }
        $this->set(compact('accounttype'));
        $this->set('_serialize', ['accounttype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Accounttype id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $accounttype = $this->Accounttype->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $accounttype = $this->Accounttype->patchEntity($accounttype, $this->request->data);
            if ($this->Accounttype->save($accounttype)) {
                $this->Flash->success(__('The accounttype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The accounttype could not be saved. Please, try again.'));
        }
        $this->set(compact('accounttype'));
        $this->set('_serialize', ['accounttype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Accounttype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $accounttype = $this->Accounttype->get($id);
        if ($this->Accounttype->delete($accounttype)) {
            $this->Flash->success(__('The accounttype has been deleted.'));
        } else {
            $this->Flash->error(__('The accounttype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
