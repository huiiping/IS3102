<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MembershipPoints Controller
 *
 * @property \App\Model\Table\MembershipPointsTable $MembershipPoints
 */
class MembershipPointsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'RetailerEmployees']
        ];
        $membershipPoints = $this->paginate($this->MembershipPoints);

        $this->set(compact('membershipPoints'));
        $this->set('_serialize', ['membershipPoints']);
    }

    /**
     * View method
     *
     * @param string|null $id Membership Point id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $membershipPoint = $this->MembershipPoints->get($id, [
            'contain' => ['Customers', 'RetailerEmployees']
        ]);

        $this->set('membershipPoint', $membershipPoint);
        $this->set('_serialize', ['membershipPoint']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $membershipPoint = $this->MembershipPoints->newEntity();
        if ($this->request->is('post')) {
            $membershipPoint = $this->MembershipPoints->patchEntity($membershipPoint, $this->request->getData());
            if ($this->MembershipPoints->save($membershipPoint)) {
                $this->Flash->success(__('The membership point has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The membership point could not be saved. Please, try again.'));
        }
        $customers = $this->MembershipPoints->Customers->find('list', ['limit' => 200]);
        $retailerEmployees = $this->MembershipPoints->RetailerEmployees->find('list', ['limit' => 200]);
        $this->set(compact('membershipPoint', 'customers', 'retailerEmployees'));
        $this->set('_serialize', ['membershipPoint']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Membership Point id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $membershipPoint = $this->MembershipPoints->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $membershipPoint = $this->MembershipPoints->patchEntity($membershipPoint, $this->request->getData());
            if ($this->MembershipPoints->save($membershipPoint)) {
                $this->Flash->success(__('The membership point has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The membership point could not be saved. Please, try again.'));
        }
        $customers = $this->MembershipPoints->Customers->find('list', ['limit' => 200]);
        $retailerEmployees = $this->MembershipPoints->RetailerEmployees->find('list', ['limit' => 200]);
        $this->set(compact('membershipPoint', 'customers', 'retailerEmployees'));
        $this->set('_serialize', ['membershipPoint']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Membership Point id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $membershipPoint = $this->MembershipPoints->get($id);
        if ($this->MembershipPoints->delete($membershipPoint)) {
            $this->Flash->success(__('The membership point has been deleted.'));
        } else {
            $this->Flash->error(__('The membership point could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
