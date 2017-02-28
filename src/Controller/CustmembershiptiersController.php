<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustMembershipTiers Controller
 *
 * @property \App\Model\Table\CustMembershipTiersTable $CustMembershipTiers
 */
class CustMembershipTiersController extends AppController
{

    public function beforeFilter(Event $event)
    {

        $this->loadComponent('Logging');
        
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $custMembershipTiers = $this->paginate($this->CustMembershipTiers);

        $this->set(compact('custMembershipTiers'));
        $this->set('_serialize', ['custMembershipTiers']);
    }

    /**
     * View method
     *
     * @param string|null $id Cust Membership Tier id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $custMembershipTier = $this->CustMembershipTiers->get($id, [
            'contain' => ['Customers']
        ]);

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        $this->Logging->rLog($custMembershipTier['id']);
        $this->Logging->iLog($retailer, $custMembershipTier['id']);

        $this->set('custMembershipTier', $custMembershipTier);
        $this->set('_serialize', ['custMembershipTier']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $custMembershipTier = $this->CustMembershipTiers->newEntity();
        if ($this->request->is('post')) {
            $custMembershipTier = $this->CustMembershipTiers->patchEntity($custMembershipTier, $this->request->data);
            if ($this->CustMembershipTiers->save($custMembershipTier)) {
                $this->Flash->success(__('The cust membership tier has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($custMembershipTier['id']);
                $this->Logging->iLog($retailer, $custMembershipTier['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cust membership tier could not be saved. Please, try again.'));
        }
        $this->set(compact('custMembershipTier'));
        $this->set('_serialize', ['custMembershipTier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cust Membership Tier id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $custMembershipTier = $this->CustMembershipTiers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $custMembershipTier = $this->CustMembershipTiers->patchEntity($custMembershipTier, $this->request->data);
            if ($this->CustMembershipTiers->save($custMembershipTier)) {
                $this->Flash->success(__('The cust membership tier has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($custMembershipTier['id']);
                $this->Logging->iLog($retailer, $custMembershipTier['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cust membership tier could not be saved. Please, try again.'));
        }
        $this->set(compact('custMembershipTier'));
        $this->set('_serialize', ['custMembershipTier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cust Membership Tier id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $custMembershipTier = $this->CustMembershipTiers->get($id);
        if ($this->CustMembershipTiers->delete($custMembershipTier)) {
            $this->Flash->success(__('The cust membership tier has been deleted.'));

            $session = $this->request->session();
            $retailer = $session->read('retailer');

            //$this->loadComponent('Logging');
            $this->Logging->rLog($custMembershipTier['id']);
            $this->Logging->iLog($retailer, $custMembershipTier['id']);

        } else {
            $this->Flash->error(__('The cust membership tier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
