<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RetaileremployeesSuppliermemos Controller
 *
 * @property \App\Model\Table\RetaileremployeesSuppliermemosTable $RetaileremployeesSuppliermemos
 */
class RetaileremployeesSuppliermemosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Retaileremployees', 'Suppliermemos']
        ];
        $retaileremployeesSuppliermemos = $this->paginate($this->RetaileremployeesSuppliermemos);

        $this->set(compact('retaileremployeesSuppliermemos'));
        $this->set('_serialize', ['retaileremployeesSuppliermemos']);
    }

    /**
     * View method
     *
     * @param string|null $id Retaileremployees Suppliermemo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retaileremployeesSuppliermemo = $this->RetaileremployeesSuppliermemos->get($id, [
            'contain' => ['Retaileremployees', 'Suppliermemos']
        ]);

        $this->set('retaileremployeesSuppliermemo', $retaileremployeesSuppliermemo);
        $this->set('_serialize', ['retaileremployeesSuppliermemo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retaileremployeesSuppliermemo = $this->RetaileremployeesSuppliermemos->newEntity();
        if ($this->request->is('post')) {
            $retaileremployeesSuppliermemo = $this->RetaileremployeesSuppliermemos->patchEntity($retaileremployeesSuppliermemo, $this->request->data);
            if ($this->RetaileremployeesSuppliermemos->save($retaileremployeesSuppliermemo)) {
                $this->Flash->success(__('The retaileremployees suppliermemo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retaileremployees suppliermemo could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->RetaileremployeesSuppliermemos->Retaileremployees->find('list', ['limit' => 200]);
        $suppliermemos = $this->RetaileremployeesSuppliermemos->Suppliermemos->find('list', ['limit' => 200]);
        $this->set(compact('retaileremployeesSuppliermemo', 'retaileremployees', 'suppliermemos'));
        $this->set('_serialize', ['retaileremployeesSuppliermemo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retaileremployees Suppliermemo id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retaileremployeesSuppliermemo = $this->RetaileremployeesSuppliermemos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retaileremployeesSuppliermemo = $this->RetaileremployeesSuppliermemos->patchEntity($retaileremployeesSuppliermemo, $this->request->data);
            if ($this->RetaileremployeesSuppliermemos->save($retaileremployeesSuppliermemo)) {
                $this->Flash->success(__('The retaileremployees suppliermemo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retaileremployees suppliermemo could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->RetaileremployeesSuppliermemos->Retaileremployees->find('list', ['limit' => 200]);
        $suppliermemos = $this->RetaileremployeesSuppliermemos->Suppliermemos->find('list', ['limit' => 200]);
        $this->set(compact('retaileremployeesSuppliermemo', 'retaileremployees', 'suppliermemos'));
        $this->set('_serialize', ['retaileremployeesSuppliermemo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retaileremployees Suppliermemo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retaileremployeesSuppliermemo = $this->RetaileremployeesSuppliermemos->get($id);
        if ($this->RetaileremployeesSuppliermemos->delete($retaileremployeesSuppliermemo)) {
            $this->Flash->success(__('The retaileremployees suppliermemo has been deleted.'));
        } else {
            $this->Flash->error(__('The retaileremployees suppliermemo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
