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
        //$customers = $this->paginate($this->Customers);
        $this->loadComponent('Prg');
        $this->Prg->commonProcess();
        $this->set('customers', $this->paginate($this->Customers->find('searchable', $this->Prg->parsedParams())));
        $this->paginate = [
            'contain' => ['CustMembershipTiers']
        ];
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
            'contain' => ['CustMembershipTiers', 'Promotions']
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
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            if ($this->Customers->save($customer)) {
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
        $custMembershipTiers = $this->Customers->CustMembershipTiers->find('list', ['limit' => 200]);
        $promotions = $this->Customers->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'custMembershipTiers', 'promotions'));
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
            'contain' => ['Promotions']
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
        $promotions = $this->Customers->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'custMembershipTiers', 'promotions'));
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
}
