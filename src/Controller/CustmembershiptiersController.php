<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Custmembershiptiers Controller
 *
 * @property \App\Model\Table\CustmembershiptiersTable $Custmembershiptiers
 */
class CustmembershiptiersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $custmembershiptiers = $this->paginate($this->Custmembershiptiers);

        $this->set(compact('custmembershiptiers'));
        $this->set('_serialize', ['custmembershiptiers']);
    }

    /**
     * View method
     *
     * @param string|null $id Custmembershiptier id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $custmembershiptier = $this->Custmembershiptiers->get($id, [
            'contain' => ['Retaileremployees']
        ]);

        $this->set('custmembershiptier', $custmembershiptier);
        $this->set('_serialize', ['custmembershiptier']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $custmembershiptier = $this->Custmembershiptiers->newEntity();
        if ($this->request->is('post')) {
            $custmembershiptier = $this->Custmembershiptiers->patchEntity($custmembershiptier, $this->request->data);
            if ($this->Custmembershiptiers->save($custmembershiptier)) {
                $this->Flash->success(__('The custmembershiptier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The custmembershiptier could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->Custmembershiptiers->Retaileremployees->find('list', ['limit' => 200]);
        $this->set(compact('custmembershiptier', 'retaileremployees'));
        $this->set('_serialize', ['custmembershiptier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Custmembershiptier id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $custmembershiptier = $this->Custmembershiptiers->get($id, [
            'contain' => ['Retaileremployees']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $custmembershiptier = $this->Custmembershiptiers->patchEntity($custmembershiptier, $this->request->data);
            if ($this->Custmembershiptiers->save($custmembershiptier)) {
                $this->Flash->success(__('The custmembershiptier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The custmembershiptier could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->Custmembershiptiers->Retaileremployees->find('list', ['limit' => 200]);
        $this->set(compact('custmembershiptier', 'retaileremployees'));
        $this->set('_serialize', ['custmembershiptier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Custmembershiptier id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $custmembershiptier = $this->Custmembershiptiers->get($id);
        if ($this->Custmembershiptiers->delete($custmembershiptier)) {
            $this->Flash->success(__('The custmembershiptier has been deleted.'));
        } else {
            $this->Flash->error(__('The custmembershiptier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
