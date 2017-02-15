<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Membershippoints Controller
 *
 * @property \App\Model\Table\MembershippointsTable $Membershippoints
 */
class MembershippointsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers']
        ];
        $membershippoints = $this->paginate($this->Membershippoints);

        $this->set(compact('membershippoints'));
        $this->set('_serialize', ['membershippoints']);
    }

    /**
     * View method
     *
     * @param string|null $id Membershippoint id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $membershippoint = $this->Membershippoints->get($id, [
            'contain' => ['Customers']
        ]);

        $this->set('membershippoint', $membershippoint);
        $this->set('_serialize', ['membershippoint']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $membershippoint = $this->Membershippoints->newEntity();
        if ($this->request->is('post')) {
            $membershippoint = $this->Membershippoints->patchEntity($membershippoint, $this->request->data);
            if ($this->Membershippoints->save($membershippoint)) {
                $this->Flash->success(__('The membershippoint has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The membershippoint could not be saved. Please, try again.'));
        }
        $customers = $this->Membershippoints->Customers->find('list', ['limit' => 200]);
        $this->set(compact('membershippoint', 'customers'));
        $this->set('_serialize', ['membershippoint']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Membershippoint id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $membershippoint = $this->Membershippoints->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $membershippoint = $this->Membershippoints->patchEntity($membershippoint, $this->request->data);
            if ($this->Membershippoints->save($membershippoint)) {
                $this->Flash->success(__('The membershippoint has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The membershippoint could not be saved. Please, try again.'));
        }
        $customers = $this->Membershippoints->Customers->find('list', ['limit' => 200]);
        $this->set(compact('membershippoint', 'customers'));
        $this->set('_serialize', ['membershippoint']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Membershippoint id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $membershippoint = $this->Membershippoints->get($id);
        if ($this->Membershippoints->delete($membershippoint)) {
            $this->Flash->success(__('The membershippoint has been deleted.'));
        } else {
            $this->Flash->error(__('The membershippoint could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
