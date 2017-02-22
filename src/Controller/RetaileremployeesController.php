<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * RetailerEmployees Controller
 *
 * @property \App\Model\Table\RetailerEmployeesTable $RetailerEmployees
 */
class RetailerEmployeesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadcomponent('Auth', [
                'authenticate' => [
                    'Form' => [
                        'userModel' => 'RetailerEmployees',
                        'fields' => [
                            'username' => 'username',
                            'password' => 'password'
                        ],
                    ]
                ],
                'loginAction' => [
                    'controller' => 'RetailerEmployees',
                    'action' => 'login'
                ]
            ]);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add', 'logout']);
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Locations']
        ];
        $retailerEmployees = $this->paginate($this->RetailerEmployees);

        $this->set(compact('retailerEmployees'));
        $this->set('_serialize', ['retailerEmployees']);
    }

    /**
     * View method
     *
     * @param string|null $id Retailer Employee id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retailerEmployee = $this->RetailerEmployees->get($id, [
            'contain' => ['Locations', 'Messages', 'RetailerEmployeeRoles', 'Promotions', 'PurchaseOrders', 'SupplierMemos']
        ]);

        $this->set('retailerEmployee', $retailerEmployee);
        $this->set('_serialize', ['retailerEmployee']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retailerEmployee = $this->RetailerEmployees->newEntity();
        if ($this->request->is('post')) {
            $retailerEmployee = $this->RetailerEmployees->patchEntity($retailerEmployee, $this->request->data);
            if ($this->RetailerEmployees->save($retailerEmployee)) {
                $this->Flash->success(__('The retailer employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer employee could not be saved. Please, try again.'));
        }
        $locations = $this->RetailerEmployees->Locations->find('list', ['limit' => 200]);
        $messages = $this->RetailerEmployees->Messages->find('list', ['limit' => 200]);
        $retailerEmployeeRoles = $this->RetailerEmployees->RetailerEmployeeRoles->find('list', ['limit' => 200]);
        $this->set(compact('retailerEmployee', 'locations', 'messages', 'retailerEmployeeRoles'));
        $this->set('_serialize', ['retailerEmployee']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retailer Employee id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retailerEmployee = $this->RetailerEmployees->get($id, [
            'contain' => ['Messages', 'RetailerEmployeeRoles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retailerEmployee = $this->RetailerEmployees->patchEntity($retailerEmployee, $this->request->data);
            if ($this->RetailerEmployees->save($retailerEmployee)) {
                $this->Flash->success(__('The retailer employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer employee could not be saved. Please, try again.'));
        }
        $locations = $this->RetailerEmployees->Locations->find('list', ['limit' => 200]);
        $messages = $this->RetailerEmployees->Messages->find('list', ['limit' => 200]);
        $retailerEmployeeRoles = $this->RetailerEmployees->RetailerEmployeeRoles->find('list', ['limit' => 200]);
        $this->set(compact('retailerEmployee', 'locations', 'messages', 'retailerEmployeeRoles'));
        $this->set('_serialize', ['retailerEmployee']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retailer Employee id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retailerEmployee = $this->RetailerEmployees->get($id);
        if ($this->RetailerEmployees->delete($retailerEmployee)) {
            $this->Flash->success(__('The retailer employee has been deleted.'));
        } else {
            $this->Flash->error(__('The retailer employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login(){
    if($this->request->is('post')){
        $session = $this->request->session();
        $retailer = $_POST['retailer'];
        $database = $_POST['retailer']."db";
        $session->write('database', $database);
        $retaileremployee = $this->Auth->identify();
        if($retaileremployee){
            $this->Auth->setUser($retaileremployee);
            $session->write('retailer', $retailer); 
            return $this->redirect(['controller' => 'RetailerEmployees', 'action' => 'index']);
            //return $this->redirect($this->Auth->redirectUrl());            
        }
            $this->Flash->error('Incorrect Login');   
        }
    }
}
