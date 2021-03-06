<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;
use Cake\Error\Debugger;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;


class FeedbacksController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadcomponent('DbSchema');
        $this->loadComponent('Logging');
        $this->loadComponent('Email');
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->loadComponent('Prg');
        $this->Prg->commonProcess();
        $this->paginate = [
        'contain' => ['Customers']
        ];
        $this->set('feedbacks', $this->paginate($this->Feedbacks->find('searchable', $this->Prg->parsedParams())));

        $this->set(compact('feedbacks'));
        $this->set('_serialize', ['feedbacks']);
    }

    public $components = array(
        'Prg'
    );

    public function view($id = null)
    {
        $feedback = $this->Feedbacks->get($id, [
            'contain' => ['Customers']
            ]);

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        $this->Logging->rLog($feedback['id']);
        $this->Logging->iLog($retailer, $feedback['id']);

        $this->set('feedback', $feedback);
        $this->set('_serialize', ['feedback']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $feedback = $this->Feedbacks->newEntity();
        if ($this->request->is('post')) {
            $feedback = $this->Feedbacks->patchEntity($feedback, $this->request->getData());
            if ($this->Feedbacks->save($feedback)) {
                $this->Flash->success(__('The feedback has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The feedback could not be saved. Please, try again.'));
        }

        $customers = $this->Feedbacks->Customers->find('list', ['limit' => 200]);
        $products = $this->Feedbacks->Products->find('all', ['limit' => 200]);
        $items = $this->Feedbacks->Items->find('all', ['limit' => 200]);

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        $this->Logging->rLog($feedback['id']);
        $this->Logging->iLog($retailer, $feedback['id']);

        $this->set(compact('feedback', 'customers', 'products', 'items'));
        $this->set('_serialize', ['feedback']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Feedback id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $feedback = $this->Feedbacks->get($id, [
            'contain' => []
            ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $feedback = $this->Feedbacks->patchEntity($feedback, $this->request->getData());
            if ($this->Feedbacks->save($feedback)) {
                $this->Flash->success(__('The feedback has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The feedback could not be saved. Please, try again.'));
        }

        $customers = $this->Feedbacks->Customers->find('list', ['limit' => 200]);
        $products = $this->Feedbacks->Products->find('all', ['limit' => 200]);
        $items = $this->Feedbacks->Items->find('all', ['limit' => 200]);

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        $this->Logging->rLog($feedback['id']);
        $this->Logging->iLog($retailer, $feedback['id']);

        $this->set(compact('feedback', 'customers', 'products', 'items'));
        $this->set('_serialize', ['feedback']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Feedback id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $feedback = $this->Feedbacks->get($id);

        if ($feedback->status == "Closed") {
          if ($this->Feedbacks->delete($feedback)) {
              $this->Flash->success(__('The feedback has been deleted.'));
          } else {
              $this->Flash->error(__('The feedback could not be deleted. Please, try again.'));
          }
        } else {
          $this->Flash->error(__('Delete of feedback is not allowed.'));
        }

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        $this->Logging->rLog($feedback['id']);
        $this->Logging->iLog($retailer, $feedback['id']);

        return $this->redirect(['action' => 'index']);
    }

    public function pendingStatus($id) {

      $feedback = $this->Feedbacks->get($id);

      $feedback->status = 'Pending';
      $this->Feedbacks->save($feedback);

      $session = $this->request->session();
      $retailer = $session->read('retailer');
      $this->Logging->rLog($feedback['id']);
      $this->Logging->iLog($retailer, $feedback['id']);

      $this->Flash->success(__('The feedback has a pending status.'));

      return $this->redirect(['action' => 'index']);
  }

  public function repliedStatus($id) {

      $feedback = $this->Feedbacks->get($id);

      $feedback->status = 'Replied';
      $this->Feedbacks->save($feedback);

      $session = $this->request->session();
      $retailer = $session->read('retailer');
      $this->Logging->rLog($feedback['id']);
      $this->Logging->iLog($retailer, $feedback['id']);

      $this->Flash->success(__('The feedback has a replied status.'));

      return $this->redirect(['action' => 'index']);

  }

  public function closedStatus($id) {

      $feedback = $this->Feedbacks->get($id);

      $feedback->status = 'Closed';
      $this->Feedbacks->save($feedback);

      $session = $this->request->session();
      $retailer = $session->read('retailer');
      $this->Logging->rLog($feedback['id']);
      $this->Logging->iLog($retailer, $feedback['id']);

      $this->Flash->success(__('The feedback has a closed status.'));

      return $this->redirect(['action' => 'index']);

  }
}
