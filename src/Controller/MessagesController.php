<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Error\Debugger;
use Cake\ORM\TableRegistry;

/**
 * Messages Controller
 *
 * @property \App\Model\Table\MessagesTable $Messages
 */
class MessagesController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadComponent('Logging'); 
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {   
        $session = $this->request->session();
        $id = $session->read('retailer_employee_id');

        $this->paginate = [
            'contain' => ['RetailerEmployees']
        ];

        $retailerEmployeesMessages = TableRegistry::get('RetailerEmployeesMessages');
        $msgIDs = $retailerEmployeesMessages->find()->where(['retailer_employee_id' => $id])->select('message_id');
        $inboxMessages = $this->paginate($this->Messages->find()->where(['id' => $msgIDs], ['id' => 'integer[]']));

        $this->set(compact('inboxMessages'));
        $this->set('_serialize', ['inboxMessages']);
    }

    public function viewSent()
    {   
        $session = $this->request->session();
        $id = $session->read('retailer_employee_id');

        $this->paginate = [
            'contain' => ['RetailerEmployees']
        ];

        $sentMessages = $this->paginate($this->Messages->find()->where(['sender_id' => $id]));

        $this->set(compact('sentMessages'));
        $this->set('_serialize', ['sentMessages']);
    }

    /**
     * View method
     *
     * @param string|null $id Message id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $message = $this->Messages->get($id, [
            'contain' => ['RetailerEmployees']
        ]);

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        $this->Logging->rLog($message['id']);
        $this->Logging->iLog($retailer, $message['id']);

        $this->set('message', $message);
        $this->set('_serialize', ['message']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $message = $this->Messages->newEntity();
        if ($this->request->is('post')) {
            $message = $this->Messages->patchEntity($message, $this->request->data);
            //$message->retailer_employee_id = $this->Auth->retaileremployee('id');    
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($message['id']);
                $this->Logging->iLog($retailer, $message['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
        $references = $this->Messages->find('list', ['limit' => 200]);
        $retailerEmployees = $this->Messages->RetailerEmployees->find('list', ['limit' => 200]);
        $this->set(compact('message', 'references'));
        $this->set(compact('message', 'retailerEmployees'));
        $this->set('_serialize', ['message']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Message id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $message = $this->Messages->get($id, [
            'contain' => ['RetailerEmployees']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $message = $this->Messages->patchEntity($message, $this->request->data);
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($message['id']);
                $this->Logging->iLog($retailer, $message['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
        //$references = $this->Messages->References->find('list', ['limit' => 200]);
        $retailerEmployees = $this->Messages->RetailerEmployees->find('list', ['limit' => 200]);
        //$this->set(compact('message', 'references', 'retailerEmployees'));
            $this->set(compact('message', 'retailerEmployees'));
        $this->set('_serialize', ['message']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Message id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = $this->Messages->get($id);
        if ($this->Messages->delete($message)) {
            $this->Flash->success(__('The message has been deleted.'));

            $session = $this->request->session();
            $retailer = $session->read('retailer');

            //$this->loadComponent('Logging');
            $this->Logging->rLog($message['id']);
            $this->Logging->iLog($retailer, $message['id']);
            
        } else {
            $this->Flash->error(__('The message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function test()
    {
        
    }
}
