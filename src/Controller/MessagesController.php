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
        $employees = [];
        
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
        
        $this->set('employees', $employees);
        $this->set('_serialize', ['employees']);
    }

    public function chat($id = null, $attachment = null, $attachmentID = null)
    {   
        $this->loadComponent('Prg');
        $this->Prg->commonProcess();

        $msgs = [];
        $retailerEmployeesMessages = TableRegistry::get('RetailerEmployeesMessages');
        $retailerEmployees = TableRegistry::get('RetailerEmployees');
        
        $session = $this->request->session();
        $sender = $session->read('retailer_employee_id');
        $reciever = $this->Messages->RetailerEmployees->find('list', ['limit' => 200])->where(['id !=' => $sender]);
        $this->paginate = [
                'contain' => ['RetailerEmployees']
            ];

        //Attaching entity
        if ($id == 0 && isset($attachment) && isset($attachmentID)) {
            $this->set('attachment', $attachment);
            $this->set('_serialize', ['attachment']);
            $this->set('attachmentID', $attachmentID);
            $this->set('_serialize', ['attachmentID']);
        }

        //Retrieving existing chats
        if (isset($id) && $id != 0) {

            //Reciever is the person the user is chatting with
            $reciever = $this->Messages->RetailerEmployees->find('list', ['limit' => 200])->where(['id' => $id]);
            $this->set(compact('reciever', 'retailerEmployees'));

            $this->paginate = [
                'contain' => ['RetailerEmployees']
            ];

            //Messages sent by user
            $sentIDs = $this->Messages->find()->where(['sender_id' => $sender])->select('id');
            if (isset($sentIDs)) {
                $msgsSent = $retailerEmployeesMessages->find()
                        ->where(['message_id' => $sentIDs], ['message_id' => 'integer[]'])
                        ->andWhere(['retailer_employee_id' => $id])
                        ->select('message_id')
                        ->toArray();
                $msgsSent = Hash::extract($msgsSent, '{n}.message_id');
            }

            //Messages recieved from recepient
            $recieveIDs = $this->Messages->find()->where(['sender_id' => $id])->select('id');
            if (isset($recieveIDs)) {
                $msgsRecieved = $retailerEmployeesMessages->find()
                        ->where(['message_id' => $recieveIDs], ['message_id' => 'integer[]'])
                        ->andWhere(['retailer_employee_id' => $sender])
                        ->select('message_id')
                        ->toArray();
                $msgsRecieved = Hash::extract($msgsRecieved, '{n}.message_id');
            }  

            //Paginating all the relevant messages
            if (!empty($msgsSent) && !empty($msgsRecieved)) {
                $msgs = $this->paginate($this->Messages->find()
                    ->where(['id' => $msgsSent], ['id' => 'integer[]'])
                    ->orWhere(['id' => $msgsRecieved], ['id' => 'integer[]'])
                    );
            } else if (!empty($msgsSent)) {
                $msgs = $this->paginate($this->Messages->find()->where(['id' => $msgsSent], ['id' => 'integer[]']));
            }
            else if (!empty($msgsRecieved)) {
                $msgs = $this->paginate($this->Messages->find()->where(['id' => $msgsRecieved], ['id' => 'integer[]']));
            }
        }
        $msgs = $this->paginate($this->Messages->find('searchable', $this->Prg->parsedParams()));

        $this->set('reciever', $reciever);
        $this->set('_serialize', ['reciever']);
        $this->set('msgs', $msgs);
        $this->set('_serialize', ['msgs']);
    }
    public $components = array(
        'Prg'
    );

    public function test($id = null, $attachment = null, $attachmentID = null) 
    {   
        //Defining variables
        $retailerEmployeesMessages = TableRegistry::get('RetailerEmployeesMessages');
        $retailerEmployees = TableRegistry::get('RetailerEmployees');
        $chats = $retailerEmployees->find('list', ['limit' => 200]);
        $session = $this->request->session();
        $senderID = $session->read('retailer_employee_id');
        $msgs = [];
        
        //Employees that user has sent messages to
        $sentIDs = $this->Messages->find()->where(['sender_id' => $senderID])->select('id');
        if (isset($sentIDs)) {
            $recievers = $retailerEmployeesMessages->find()->where(['message_id' => $sentIDs], ['message_id' => 'integer[]'])->select('retailer_employee_id')->toArray();
            $recievers = Hash::extract($recievers, '{n}.retailer_employee_id');
        }

        //Employees that user has recieved messages from
        $recieveIDs = $retailerEmployeesMessages->find()->where(['retailer_employee_id' => $senderID])->select('message_id');
        if (isset($recieveIDs)) {
            $senders = $this->Messages->find()->where(['id' => $recieveIDs], ['id' => 'integer[]'])->select('sender_id')->toArray();
            $senders = Hash::extract($senders, '{n}.sender_id');
        }   
        
        //Paginating all the relevant employees
        if (!empty($recievers) && !empty($senders)) {
            $employees = $this->paginate($retailerEmployees->find()
                ->where(['id' => $recievers], ['id' => 'integer[]'])
                ->orWhere(['id' => $senders], ['id' => 'integer[]'])
                );
        } else if (!empty($recievers)) {
            $employees = $this->paginate($retailerEmployees->find()->where(['id' => $recievers], ['id' => 'integer[]']));
        }
        else if (!empty($senders)) {
            $employees = $this->paginate($retailerEmployees->find()->where(['id' => $senders], ['id' => 'integer[]']));
        }

        $this->set(compact('employees'));
        $this->set('_serialize', ['employees']);

        //Details of attachments
        if ($id == 0 && isset($attachment) && isset($attachmentID)) {
            $this->set('attachment', $attachment);
            $this->set('_serialize', ['attachment']);
            $this->set('attachmentID', $attachmentID);
            $this->set('_serialize', ['attachmentID']);
        }
        
        //Retrieving existing chats with a particular person or group
        if (isset($id) && $id != 0) {
            $chats = $retailerEmployees->find('list', ['limit' => 200])->where(['id' => $id]);
            $this->set(compact('chats', 'retailerEmployees'));

            $msgs = $this->paginate($this->Messages->find()
                ->where(['sender_id' => $id])
                ->orWhere(['sender_id' => $senderID])
            );
        }
        
        $this->set('reciever', $chats);
        $this->set('_serialize', ['reciever']);
        $this->set('msgs', $msgs);
        $this->set('_serialize', ['msgs']);
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
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                $this->Logging->rLog($message['id']);
                $this->Logging->iLog($retailer, $message['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->Messages->RetailerEmployees->find('list', ['limit' => 200]);
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

                $this->Logging->rLog($message['id']);
                $this->Logging->iLog($retailer, $message['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->Messages->RetailerEmployees->find('list', ['limit' => 200]);
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
            
            $session = $this->request->session();
            $retailer = $session->read('retailer');

            $this->Logging->rLog($message['id']);
            $this->Logging->iLog($retailer, $message['id']);

            $this->Flash->success(__('The message has been deleted.'));
        } else {
            $this->Flash->error(__('The message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
