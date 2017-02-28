<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * RetailerEmployees Controller
 *
 * @property \App\Model\Table\RetailerEmployeesTable $RetailerEmployees
 */
class RetailerEmployeesController extends AppController
{

    //$this->loadComponent('Logging');    

    public function beforeFilter(Event $event)
    {

        parent::beforeFilter($event);
        $this->loadComponent('Logging');
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

    public function index() {

        $this->loadComponent('Prg');
        $this->Prg->commonProcess();
        $this->paginate = [
            'contain' => ['Locations']
        ];
        $this->set('retailerEmployees', $this->paginate($this->RetailerEmployees->find('searchable', $this->Prg->parsedParams())));
        $this->set(compact('retailerEmployees'));
        $this->set('_serialize', ['retailerEmployees']);
    }
    public $components = array(
        'Prg'
    );
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
        
        $session = $this->request->session();
        $retailer = $session->read('retailer');
        
        //$this->loadComponent('Logging');
        $this->Logging->rLog($retailerEmployee['id']);
        $this->Logging->iLog($retailer, $retailerEmployee['id']);

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

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($retailerEmployee['id']);
                $this->Logging->iLog($retailer, $retailerEmployee['id']);

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

        //Getting the session user - ID
        $sessionId = $this->request->session()->read('Auth.User.id');

        //Only the employee themselves can edit their account
        if($retailerEmployee['id'] != $sessionId) {
             $this->redirect($this->referer());
             $this->Flash->error(__('You are not authorzied to edit other employees.'));
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $retailerEmployee = $this->RetailerEmployees->patchEntity($retailerEmployee, $this->request->data);
            if ($this->RetailerEmployees->save($retailerEmployee)) {
                $this->Flash->success(__('The retailer employee has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($retailerEmployee['id']);
                $this->Logging->iLog($retailer, $retailerEmployee['id']);

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

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retailerEmployee = $this->RetailerEmployees->get($id);
        if ($this->RetailerEmployees->delete($retailerEmployee)) {
            
            $session = $this->request->session();
            $retailer = $session->read('retailer');
           
            //$this->loadComponent('Logging');
            $this->Logging->rLog($retailerEmployee['id']);
            $this->Logging->iLog($retailer, $retailerEmployee['id']);

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

        ConnectionManager::drop('conn1'); 
        ConnectionManager::config('conn1', [
            'className' => 'Cake\Database\Connection',
            'driver' => 'Cake\Database\Driver\Mysql',
            'persistent' => false,
            'host' => 'localhost',
            'username' => 'root',
            'password' => 'joy',
            'database' => $database,
            'encoding' => 'utf8',
            'timezone' => 'UTC',
            'cacheMetadata' => true,

            ]);
        ConnectionManager::alias('conn1', 'default');

        $retaileremployee = $this->Auth->identify();
        if($retaileremployee){
            $this->Auth->setUser($retaileremployee);
            $session->write('retailer', $retailer); 
            $session->write('retailer_employee_id',$retaileremployee['id']);

            //$this->loadComponent('Logging');            
            $this->Logging->rLog($session->read('retailer_employee_id'));
            $this->Logging->iLog($retailer, $session->read('retailer_employee_id'));
            
            return $this->redirect(['controller' => 'RetailerEmployees', 'action' => 'index']);
            //return $this->redirect($this->Auth->redirectUrl());            
        }
            $this->Flash->error('Incorrect Login');   
        }
    }

    public function managerActions($id = null)
    {
        $retailerEmployee = $this->RetailerEmployees->get($id, [
            'contain' => ['Messages', 'RetailerEmployeeRoles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retailerEmployee = $this->RetailerEmployees->patchEntity($retailerEmployee, $this->request->data);
            if ($this->RetailerEmployees->save($retailerEmployee)) {
                $this->Flash->success(__('The retailer employee has been saved.'));
                
                //$this->loadComponent('Logging');            
                $this->Logging->rLog($session->read('retailer_employee_id'));
                $this->Logging->iLog($retailer, $session->read('retailer_employee_id'));

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

    public function logout(){
        $this->Flash->success('You are now logged out');
        $this->Auth->logout();
        $session = $this->request->session();
        $session->destroy();

        //$this->loadComponent('Logging');             
        $this->Logging->rLog($session->read('retailer_employee_id'));
        $this->Logging->iLog($session->read('retailer'), $session->read('retailer_employee_id'));
        
        return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'main'));
    }
}