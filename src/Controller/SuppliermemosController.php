<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Suppliermemos Controller
 *
 * @property \App\Model\Table\SuppliermemosTable $Suppliermemos
 */
class SuppliermemosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Suppliers', 'Retaileremployees']
        ];
        $suppliermemos = $this->paginate($this->Suppliermemos);

        $this->set(compact('suppliermemos'));
        $this->set('_serialize', ['suppliermemos']);
    }

    /**
     * View method
     *
     * @param string|null $id Suppliermemo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $suppliermemo = $this->Suppliermemos->get($id, [
            'contain' => ['Suppliers', 'Retaileremployees']
        ]);

        $this->set('suppliermemo', $suppliermemo);
        $this->set('_serialize', ['suppliermemo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $suppliermemo = $this->Suppliermemos->newEntity();
        if ($this->request->is('post')) {
            $suppliermemo = $this->Suppliermemos->patchEntity($suppliermemo, $this->request->data);
            if ($this->Suppliermemos->save($suppliermemo)) {
                $this->Flash->success(__('The suppliermemo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The suppliermemo could not be saved. Please, try again.'));
        }
        $suppliers = $this->Suppliermemos->Suppliers->find('list', ['limit' => 200]);
        $retaileremployees = $this->Suppliermemos->Retaileremployees->find('list', ['limit' => 200]);
        $this->set(compact('suppliermemo', 'suppliers', 'retaileremployees'));
        $this->set('_serialize', ['suppliermemo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Suppliermemo id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $suppliermemo = $this->Suppliermemos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $suppliermemo = $this->Suppliermemos->patchEntity($suppliermemo, $this->request->data);
            if ($this->Suppliermemos->save($suppliermemo)) {
                $this->Flash->success(__('The suppliermemo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The suppliermemo could not be saved. Please, try again.'));
        }
        $suppliers = $this->Suppliermemos->Suppliers->find('list', ['limit' => 200]);
        $retaileremployees = $this->Suppliermemos->Retaileremployees->find('list', ['limit' => 200]);
        $this->set(compact('suppliermemo', 'suppliers', 'retaileremployees'));
        $this->set('_serialize', ['suppliermemo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Suppliermemo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $suppliermemo = $this->Suppliermemos->get($id);
        if ($this->Suppliermemos->delete($suppliermemo)) {
            $this->Flash->success(__('The suppliermemo has been deleted.'));
        } else {
            $this->Flash->error(__('The suppliermemo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
