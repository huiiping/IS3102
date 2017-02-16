<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RetaileremployeesMessages Controller
 *
 * @property \App\Model\Table\RetaileremployeesMessagesTable $RetaileremployeesMessages
 */
class RetaileremployeesMessagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Retaileremployees', 'Messages']
        ];
        $retaileremployeesMessages = $this->paginate($this->RetaileremployeesMessages);

        $this->set(compact('retaileremployeesMessages'));
        $this->set('_serialize', ['retaileremployeesMessages']);
    }

    /**
     * View method
     *
     * @param string|null $id Retaileremployees Message id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retaileremployeesMessage = $this->RetaileremployeesMessages->get($id, [
            'contain' => ['Retaileremployees', 'Messages']
        ]);

        $this->set('retaileremployeesMessage', $retaileremployeesMessage);
        $this->set('_serialize', ['retaileremployeesMessage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retaileremployeesMessage = $this->RetaileremployeesMessages->newEntity();
        if ($this->request->is('post')) {
            $retaileremployeesMessage = $this->RetaileremployeesMessages->patchEntity($retaileremployeesMessage, $this->request->data);
            if ($this->RetaileremployeesMessages->save($retaileremployeesMessage)) {
                $this->Flash->success(__('The retaileremployees message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retaileremployees message could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->RetaileremployeesMessages->Retaileremployees->find('list', ['limit' => 200]);
        $messages = $this->RetaileremployeesMessages->Messages->find('list', ['limit' => 200]);
        $this->set(compact('retaileremployeesMessage', 'retaileremployees', 'messages'));
        $this->set('_serialize', ['retaileremployeesMessage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retaileremployees Message id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retaileremployeesMessage = $this->RetaileremployeesMessages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retaileremployeesMessage = $this->RetaileremployeesMessages->patchEntity($retaileremployeesMessage, $this->request->data);
            if ($this->RetaileremployeesMessages->save($retaileremployeesMessage)) {
                $this->Flash->success(__('The retaileremployees message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retaileremployees message could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->RetaileremployeesMessages->Retaileremployees->find('list', ['limit' => 200]);
        $messages = $this->RetaileremployeesMessages->Messages->find('list', ['limit' => 200]);
        $this->set(compact('retaileremployeesMessage', 'retaileremployees', 'messages'));
        $this->set('_serialize', ['retaileremployeesMessage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retaileremployees Message id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retaileremployeesMessage = $this->RetaileremployeesMessages->get($id);
        if ($this->RetaileremployeesMessages->delete($retaileremployeesMessage)) {
            $this->Flash->success(__('The retaileremployees message has been deleted.'));
        } else {
            $this->Flash->error(__('The retaileremployees message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
