<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Error\Debugger;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;
use Cake\I18n\Time;
use Cake\I18n\Date;

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
        $retailerEmployeesMessages = TableRegistry::get('RetailerEmployeesMessages');
        $retailerEmployees = TableRegistry::get('RetailerEmployees');
        $session = $this->request->session();
        $id = $session->read('retailer_employee_id');
        
        //Employees that user has sent messages to
        $sentIDs = $this->Messages->find()->where(['sender_id' => $id])->select('id');
        if (isset($sentIDs)) {
            $reciever = $retailerEmployeesMessages->find()->where(['message_id' => $sentIDs], ['message_id' => 'integer[]'])->select('retailer_employee_id')->toArray();
            $reciever = Hash::extract($reciever, '{n}.retailer_employee_id');
        }

        //Employees that user has recieved messages from
        $recieveIDs = $retailerEmployeesMessages->find()->where(['retailer_employee_id' => $id])->select('message_id');
        if (isset($recieveIDs)) {
            $sender = $this->Messages->find()->where(['id' => $recieveIDs], ['id' => 'integer[]'])->select('sender_id')->toArray();
            $sender = Hash::extract($sender, '{n}.sender_id');
        }   
        
        //Paginating all the relevant employees
        if (!empty($reciever) && !empty($sender)) {
            $employees = $this->paginate($retailerEmployees->find()
                ->where(['id' => $reciever], ['id' => 'integer[]'])
                ->orWhere(['id' => $sender], ['id' => 'integer[]'])
                );
        } else if (!empty($reciever)) {
            $employees = $this->paginate($retailerEmployees->find()->where(['id' => $reciever], ['id' => 'integer[]']));
        }
        else if (!empty($sender)) {
            $employees = $this->paginate($retailerEmployees->find()->where(['id' => $sender], ['id' => 'integer[]']));
        }
        
        $this->set(compact('employees'));
        $this->set('_serialize', ['employees']);
    }

    public function chat($id)
    {   
        $session = $this->request->session();
        $sender = $session->read('retailer_employee_id');
        /**
        $retailerEmployees = TableRegistry::get('RetailerEmployees');
        $reciever = $retailerEmployees->find('list', ['limit' => 200])->where(['id' => $id]);
        $this->set(compact('reciever', 'retailerEmployees'));
        $this->set('reciever', $reciever);
        $this->set('_serialize', ['reciever']);*/

        $this->paginate = [
            'contain' => ['RetailerEmployees']
        ];

        $messages = $this->paginate($this->Messages->find()
            ->where(['sender_id' => $id])
            ->orWhere(['sender_id' => $sender])
        );

        $this->set(compact('messages'));
        $this->set('_serialize', ['messages']);
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
}
