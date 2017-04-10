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
        $this->loadComponent('Prg');
    }

    // public function chat() {
        
    // }

    public $components = array(
        'Prg'
    );

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id = null, $attachment = null, $attachmentID = null) 
    {   
        $this->loadComponent('Prg');
        $this->Prg->commonProcess();

        //Setting Variables
        $retailerEmployeesMessages = TableRegistry::get('RetailerEmployeesMessages');
        $retailerEmployees = TableRegistry::get('RetailerEmployees');
        $session = $this->request->session();
        $sender = $session->read('retailer_employee_id');
        $receiver = $this->Messages->RetailerEmployees->find('list', ['limit' => 200])->where(['id !=' => $sender]);
        $employees = [];
        $msg = [];
        $chatName = [];

        //Attaching attachments
        if ($id == 0 && isset($attachment) && isset($attachmentID)) {
            $this->set('attachment', $attachment);
            $this->set('_serialize', ['attachment']);
            $this->set('attachmentID', $attachmentID);
            $this->set('_serialize', ['attachmentID']);
        }

        //Receiver is the person the user is chatting with
        if (isset($id) && $id != 0) {

            $receiver = $this->Messages->RetailerEmployees->find('list', ['limit' => 200])->where(['id' => $id]);
            $chatName = $this->paginate($retailerEmployees->find()->where(['id' => $id], ['id' => 'integer[]']));
        }   
        
        //message_id's of messages sent by the user
        $sentIDs = $this->Messages->find()->where(['sender_id' => $sender])->select('id');
        if (isset($sentIDs)) {

            //Employees that user has sent messages to
            $msgReceiver = $retailerEmployeesMessages->find()->where(['message_id' => $sentIDs], ['message_id' => 'integer[]'])->select('retailer_employee_id')->toArray();
            $msgReceiver = Hash::extract($msgReceiver, '{n}.retailer_employee_id');

            //Messages sent by user to
            if (isset($id) && $id != 0) { 
                $msgsSent = $retailerEmployeesMessages->find()
                        ->where(['message_id' => $sentIDs], ['message_id' => 'integer[]'])
                        ->andWhere(['retailer_employee_id' => $id])
                        ->select('message_id')
                        ->toArray();
                $msgsSent = Hash::extract($msgsSent, '{n}.message_id');
            }
        }

        //message_id's of messages recieved by the user
        $receiveIDs = $retailerEmployeesMessages->find()->where(['retailer_employee_id' => $sender])->select('message_id');
        if (isset($receiveIDs)) {

            //Employees that user has recieved messages from
            $msgSender = $this->Messages->find()->where(['id' => $receiveIDs], ['id' => 'integer[]'])->select('sender_id')->toArray();
            $msgSender = Hash::extract($msgSender, '{n}.sender_id');

            //Messages recieved by user
            if (isset($id) && $id != 0) {
                $msgsReceived = $this->Messages->find()
                        ->where(['id' => $receiveIDs], ['id' => 'integer[]'])
                        ->andWhere(['sender_id' => $id])
                        ->select('id')
                        ->toArray();
                $msgsReceived = Hash::extract($msgsReceived, '{n}.id');
            }
        } 
        
        //Paginating the employees who have active chats with the user
        if (!empty($msgReceiver) && !empty($msgSender)) {
            $employees = $this->paginate($retailerEmployees->find()
                ->where(['id' => $msgReceiver], ['id' => 'integer[]'])
                ->orWhere(['id' => $msgSender], ['id' => 'integer[]'])
                );
        } 
        else if (!empty($msgReceiver)) {
            $employees = $this->paginate($retailerEmployees->find()->where(['id' => $msgReceiver], ['id' => 'integer[]']));
        }
        else if (!empty($msgSender)) {
            $employees = $this->paginate($retailerEmployees->find()->where(['id' => $msgSender], ['id' => 'integer[]']));
        }

        //Paginating the relevant chat history
        $this->paginate = [
                'contain' => ['RetailerEmployees']
            ];
        if (!empty($msgsSent) && !empty($msgsReceived)) {
            $msg = $this->paginate($this->Messages->find()
                ->where(['id' => $msgsSent], ['id' => 'integer[]'])
                ->orWhere(['id' => $msgsReceived], ['id' => 'integer[]'])
                );
        } 
        else if (!empty($msgsSent)) {
            $msg = $this->paginate($this->Messages->find()->where(['id' => $msgsSent], ['id' => 'integer[]']));
        }
        else if (!empty($msgsReceived)) {
            $msg = $this->paginate($this->Messages->find()->where(['id' => $msgsReceived], ['id' => 'integer[]']));
        }

        $msgs = $this->paginate($this->Messages->find('searchable', $this->Prg->parsedParams()));

        $this->set('receiver', $receiver);
        $this->set('_serialize', ['receiver']);
        $this->set('chatName', $chatName);
        $this->set('_serialize', ['chatName']);
        $this->set('msgs', $msgs);
        $this->set('_serialize', ['msgs']);
        $this->set('msg', $msg);
        $this->set('_serialize', ['msg']);
        $this->set('employees', $employees);
        $this->set('_serialize', ['employees']);
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

    public function clear(){

        $user = $this->request->session()->read('Auth.User');
          $messageTable = TableRegistry::get('RetailerEmployeesMessages');
        $query = $messageTable->query();
        $query->update()
        ->set(['is_read' => 1])
        ->where([
            'retailer_employee_id' => $user['id'],
            ])
        ->execute();
         return $this->redirect(['action' => 'index']);
        
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
