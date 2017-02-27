<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RetailerEmployeesMessages Controller
 *
 * @property \App\Model\Table\RetailerEmployeesMessagesTable $RetailerEmployeesMessages
 */
class RetailerEmployeesMessagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RetailerEmployees', 'Messages']
        ];
        $retailerEmployeesMessages = $this->paginate($this->RetailerEmployeesMessages);

        $this->set(compact('retailerEmployeesMessages'));
        $this->set('_serialize', ['retailerEmployeesMessages']);
    }

    /**
     * View method
     *
     * @param string|null $id Retailer Employees Message id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retailerEmployeesMessage = $this->RetailerEmployeesMessages->get($id, [
            'contain' => ['RetailerEmployees', 'Messages']
        ]);

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        $this->loadComponent('Logging');
        $this->Logging->log($retailerEmployeesMessage['id']);
        $this->Logging->iLog($retailer, $retailerEmployeesMessage['id']);

        $this->set('retailerEmployeesMessage', $retailerEmployeesMessage);
        $this->set('_serialize', ['retailerEmployeesMessage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retailerEmployeesMessage = $this->RetailerEmployeesMessages->newEntity();
        if ($this->request->is('post')) {
            $retailerEmployeesMessage = $this->RetailerEmployeesMessages->patchEntity($retailerEmployeesMessage, $this->request->data);
            if ($this->RetailerEmployeesMessages->save($retailerEmployeesMessage)) {
                $this->Flash->success(__('The retailer employees message has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                $this->loadComponent('Logging');
                $this->Logging->log($retailerEmployeesMessage['id']);
                $this->Logging->iLog($retailer, $retailerEmployeesMessage['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer employees message could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->RetailerEmployeesMessages->RetailerEmployees->find('list', ['limit' => 200]);
        $messages = $this->RetailerEmployeesMessages->Messages->find('list', ['limit' => 200]);
        $this->set(compact('retailerEmployeesMessage', 'retailerEmployees', 'messages'));
        $this->set('_serialize', ['retailerEmployeesMessage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retailer Employees Message id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retailerEmployeesMessage = $this->RetailerEmployeesMessages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retailerEmployeesMessage = $this->RetailerEmployeesMessages->patchEntity($retailerEmployeesMessage, $this->request->data);
            if ($this->RetailerEmployeesMessages->save($retailerEmployeesMessage)) {
                $this->Flash->success(__('The retailer employees message has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                $this->loadComponent('Logging');
                $this->Logging->log($retailerEmployeesMessage['id']);
                $this->Logging->iLog($retailer, $retailerEmployeesMessage['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer employees message could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->RetailerEmployeesMessages->RetailerEmployees->find('list', ['limit' => 200]);
        $messages = $this->RetailerEmployeesMessages->Messages->find('list', ['limit' => 200]);
        $this->set(compact('retailerEmployeesMessage', 'retailerEmployees', 'messages'));
        $this->set('_serialize', ['retailerEmployeesMessage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retailer Employees Message id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retailerEmployeesMessage = $this->RetailerEmployeesMessages->get($id);
        if ($this->RetailerEmployeesMessages->delete($retailerEmployeesMessage)) {
            $this->Flash->success(__('The retailer employees message has been deleted.'));

            $session = $this->request->session();
            $retailer = $session->read('retailer');

            $this->loadComponent('Logging');
            $this->Logging->log($retailerEmployeesMessage['id']);
            $this->Logging->iLog($retailer, $retailerEmployeesMessage['id']);
        
        } else {
            $this->Flash->error(__('The retailer employees message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
