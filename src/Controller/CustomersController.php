<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 */
class CustomersController extends AppController
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
      //$customers = $this->Customers->find('list', ['limit' => 200]);
      $this->loadComponent('Prg');
      $this->Prg->commonProcess();
      $this->paginate = [
      'contain' => ['CustMembershipTiers']
      ];

      $this->set('customers', $this->paginate($this->Customers->find('searchable', $this->Prg->parsedParams())));

      $this->set(compact('customers'));
      $this->set('_serialize', ['customers']);
    }
    public $components = array(
      'Prg'
      );

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
      $customer = $this->Customers->get($id, [
        'contain' => ['CustMembershipTiers']
        ]);

      $session = $this->request->session();
      $retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
      $this->Logging->rLog($customer['id']);
      $this->Logging->iLog($retailer, $customer['id']);

      $this->set('customer', $customer);
      $this->set('_serialize', ['customer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
      $this->loadComponent('Generator');
      $customer = $this->Customers->newEntity();
      if ($this->request->is('post')) {
        $customer = $this->Customers->patchEntity($customer, $this->request->data);

        $this->password = $this->Generator->generateString();
        $customer->set('password', $this->password);
        $customer->set('activation_status', 'Deactivated');
        $customer->set('activation_token', $this->Generator->generateString());

        $this->expiry_date = date('Y-m-d', strtotime('+1 year'));
        $customer->set('expiry_date', $this->expiry_date);

        if ($this->Customers->save($customer)) {

          $customer = $this->Customers->patchEntity($customer, $this->request->data);

          //Need to check if the member identification is an username!
          // $this->Email->activationEmail(
          // $intrasysEmployee['email'], 
          // $intrasysEmployee['first_name'], 
          // $intrasysEmployee['username'], 
          // $this->password, 
          // $intrasysEmployee['id'], 
          // $intrasysEmployee['activation_token'], 
          // 'intrasys-employees',
          // ""
          // );

          $this->Flash->success(__('The customer has been saved.'));

          $session = $this->request->session();
          $retailer = $session->read('retailer');

          $this->loadComponent('Logging');
          $this->Logging->log($customer['id']);
          $this->Logging->iLog($retailer, $customer['id']);

          return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The customer could not be saved. Please, try again.'));
      }
        $this->set('custMembershipTiers', $this->Customers->CustMembershipTiers->find('all')); //to populate select input 
        //$custMembershipTiers = $this->Customers->CustMembershipTiers->find('list', ['limit' => 200]);
        //$promotions = $this->Customers->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('customer','custMembershipTiers'));
        $this->set('_serialize', ['customer']);
      }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
      $customer = $this->Customers->get($id, [
        'contain' => []
        ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
        $customer = $this->Customers->patchEntity($customer, $this->request->data);
        if ($this->Customers->save($customer)) {
          $this->Flash->success(__('The customer has been saved.'));

          $session = $this->request->session();
          $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
          $this->Logging->rLog($customer['id']);
          $this->Logging->iLog($retailer, $customer['id']);

          return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The customer could not be saved. Please, try again.'));
      }
      $custMembershipTiers = $this->Customers->CustMembershipTiers->find('list', ['limit' => 200]);
      $this->set(compact('customer', 'custMembershipTiers'));
      $this->set('_serialize', ['customer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
      $this->request->allowMethod(['post', 'delete']);
      $customer = $this->Customers->get($id);
      if ($this->Customers->delete($customer)) {
        $this->Flash->success(__('The customer has been deleted.'));

        $session = $this->request->session();
        $retailer = $session->read('retailer'); 

            //$this->loadComponent('Logging');
        $this->Logging->rLog($customer['id']);
        $this->Logging->iLog($retailer, $customer['id']);

      } else {
        $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'index']);
    }

    public function activateStatus($id) {

      $customer = $this->Customers->get($id);

      $customer->activation_status = 'Activated';
      $this->Customers->save($customer);

      $this->Flash->success(__('The Customer has been activated.'));

      return $this->redirect(['action' => 'index']);
    }

    public function deactivateStatus($id) {

      $customer = $this->Customers->get($id);

      $customer->activation_status = 'Deactivated';
      $this->Customers->save($customer);

      $this->Flash->success(__('The Customer has been deactivated.'));

      return $this->redirect(['action' => 'index']);

    }
  }
