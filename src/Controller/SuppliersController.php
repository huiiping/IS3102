<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\Mailer\Email;
/**
 * Suppliers Controller
 *
 * @property \App\Model\Table\SuppliersTable $Suppliers
 */
class SuppliersController extends AppController
{
    private $password;
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadcomponent('Logging');
        $this->loadComponent('Email');
        $this->loadcomponent('Auth', [
            'authenticate' => [
            'Form' => [
            'userModel' => 'Suppliers',
            'fields' => [
            'username' => 'username',
            'password' => 'password'
            ],
            ]
            ],
            'loginAction' => [
            'controller' => 'Suppliers',
            'action' => 'login'
            ]
            ]);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add', 'logout', 'activate', 'recover', 'recoverActivate']);
    }
    

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {


        $this->loadComponent('Prg');
        $this->Prg->commonProcess();
        $this->set('suppliers', $this->paginate($this->Suppliers->find('searchable', $this->Prg->parsedParams())));
        $this->set(compact('suppliers'));
        $this->set('_serialize', ['suppliers']);
    }
    public $components = array(
        'Prg'
        );

    /**
     * View method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supplier = $this->Suppliers->get($id, [
            'contain' => ['PurchaseOrders', 'SupplierMemos']
            ]);

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        $this->Logging->rLog($supplier['id']);
        $this->Logging->iLog($retailer, $supplier['id']);

        $this->set('supplier', $supplier);
        $this->set('_serialize', ['supplier']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $supplier = $this->Suppliers->newEntity();
        if ($this->request->is('post')) {
            $supplier = $this->Suppliers->patchEntity($supplier, $this->request->data);
            if ($this->Suppliers->save($supplier)) {
                $this->Flash->success(__('The supplier has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($supplier['id']);
                $this->Logging->iLog($retailer, $supplier['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
        }
        $this->set(compact('supplier'));
        $this->set('_serialize', ['supplier']);
    }

    public function add2(){

        $this->loadComponent('Generator');

        $supplier = $this->Suppliers->newEntity();
        if ($this->request->is('post')) {
            $supplier = $this->Suppliers->patchEntity($supplier, $this->request->data);
            $supplier->set('username', $this->Generator->generateString());
            $this->password = $this->Generator->generateString();
            $supplier->set('password', $this->password);
            $supplier->set('activation_status', 'Deactivated');
            $supplier->set('activation_token', $this->Generator->generateString());


            if ($this->Suppliers->save($supplier)) {

                $this->Email->activationEmail(
                    $supplier['email'], 
                    $supplier['first_name'], 
                    $supplier['username'], 
                    $this->password, 
                    $supplier['id'], 
                    $supplier['activation_token'], 
                    'suppliers');

                //$this->__sendActivationEmail($supplier['id']);
                $this->Flash->success(__('The supplier has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($supplier['id']);
                $this->Logging->iLog($retailer, $supplier['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
        }
        $this->set(compact('supplier'));
        $this->set('_serialize', ['supplier']);
    }

    /*
    function __sendActivationEmail($user_id) {

        $user = $this->Suppliers->get($user_id);
        $activationToken = $user['activation_token'];
        if ($user === false) {
            debug(__METHOD__." failed to retrieve User data for user.id: {$user_id}");
            return false;
        }

        $email = new Email('default');
        $email->template('activation');
        $email->emailFormat('html');
        $email->to($user['email']);
        $email->subject('Please confirm your email address');
        $email->from('tanyongming90@gmail.com');

        return $email->send($user['supplier_name'] . ',' .
            $user['username'] . ',' .
            $this->password . ',' .
            env('SERVER_NAME') . ',' . 
            $user['id'] . ',' . 
            $user['activation_token'] . ',' .
            'suppliers');

    }*/

    function activate($id, $token) {


        $supplier = $this->Suppliers->get($id);
        if($supplier['activation_status'] == 'Activated'){
            $this->Flash->success(__('Your account has already been activated.'));
            return $this->redirect(['action' => 'login']);
        }

        if ($supplier &&  $supplier['activation_token'] == $token) {

         $supplier->activation_status = 'Activated';
         $supplier->activation_token = NULL;
         $this->Suppliers->save($supplier);

            //$this->loadComponent('Logging');
            //$this->Logging->log($intrasysEmployee['id']);
         $this->Logging->iLog(null,  $supplier['id']);

         $this->Flash->success(__('Your account has been activated.'));
         return $this->redirect(['action' => 'login']);

     }
     $this->Flash->error(__('There is something wrong with the activation link'));
     return $this->redirect(['action' => 'login']);
 }
    /**
     * Edit method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $supplier = $this->Suppliers->get($id, [
            'contain' => []
            ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supplier = $this->Suppliers->patchEntity($supplier, $this->request->data);
            if ($this->Suppliers->save($supplier)) {
                $this->Flash->success(__('The supplier has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($supplier['id']);
                $this->Logging->iLog($retailer, $supplier['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
        }
        $this->set(compact('supplier'));
        $this->set('_serialize', ['supplier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supplier = $this->Suppliers->get($id);
        if ($this->Suppliers->delete($supplier)) {
            $this->Flash->success(__('The supplier has been deleted.'));

            $session = $this->request->session();
            $retailer = $session->read('retailer');

            //$this->loadComponent('Logging');
            $this->Logging->rLog($supplier['id']);
            $this->Logging->iLog($retailer, $supplier['id']);

        } else {
            $this->Flash->error(__('The supplier could not be deleted. Please, try again.'));
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

            $supplier = $this->Auth->identify();
            if($supplier){
                if($supplier['activation_status'] == 'Deactivated'){
                    $this->Flash->error('Your account has not been activated yet. Please check your email');

                    return $this->redirect(['controller' => 'Pages', 'action' => 'login']);
                }

                if($supplier['recovery_status'] == 'Pending'){
                    $this->Flash->error('Your account has not been recovered yet. Please check your email.');

                    return $this->redirect(['controller' => 'Pages', 'action' => 'login']);
                }
                $this->Auth->setUser($supplier);
                $session->write('supplier', $supplier); 
                return $this->redirect(['controller' => 'Pages', 'action' => 'supplier']);
            //return $this->redirect($this->Auth->redirectUrl());            
            }
            $this->Flash->error('Incorrect Login');   
        }
    }

    public function recover(){

        $this->loadComponent('Generator');
        $email = $_POST['email'];
        $query = $this->Suppliers->find('all', [
            'conditions' => ['email' => $email],
            ]);

        //check if user exists based on email
        if($query->count() == 0){
            $this->Flash->error(__('Invalid email address'));

            //$this->loadComponent('Logging'); 
            return $this->redirect(['action' => 'login']);
        }

        $row = $query->first();
        $supplier = $this->Suppliers->get($row['id']);
        $this->Logging->iLog(null, $supplier['id']);

        $newPass = $this->Generator->generateString();
        $supplier->password = $newPass;
        $supplier->recovery_status = 'Pending';
        $supplier->recovery_token = $this->Generator->generateString();

        if ($this->Suppliers->save($supplier)){

            $this->Email->recoveryEmail(
                $supplier['email'], 
                $supplier['first_name'], 
                $supplier['username'], 
                $newPass, 
                $supplier['id'], 
                $supplier['recovery_token'], 
                'suppliers');

            /*
            $email = new Email('default');
            $email->template('recovery');
            $email->emailFormat('html');
            $email->to($supplier['email']);
            $email->subject('Password Recovery');
            $email->from('tanyongming90@gmail.com');

            $email->send($supplier['supplier_name'] . ',' .
                $supplier['username'] . ',' .
                $newPass . ',' .
                env('SERVER_NAME') . ',' . 
                $supplier['id'] . ',' . 
                $supplier['recovery_token'] . ',' .   
                'suppliers');
            */

            $this->Flash->success(__('Password Reset Email Sent, please check your email.'));
            return $this->redirect(['action' => 'login']);
        }

    }

    public function recoverActivate($id, $token){

        $supplier = $this->Suppliers->get($id);
        if($supplier['recovery_status'] == NULL){
            $this->Flash->success(__('Your account has already been recovered.'));
            return $this->redirect(['action' => 'login']);
        }

        if ($supplier && $supplier['recovery_token'] == $token) {


            $supplier->recovery_status = NULL;
            $supplier->recovery_token = NULL;
            $this->Suppliers->save($supplier);

            $this->Flash->success(__('Your account has been recovered. Please log in using your new username and password.'));
            return $this->redirect(['action' => 'login']);

        }
        $this->Flash->error(__('There is something wrong with the activation link'));
        return $this->redirect(['action' => 'login']);

    }

    public function logout(){
        $this->Flash->success('You are now logged out');
        $this->Auth->logout();
        $session = $this->request->session();
        $session->destroy();
        return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'main'));
    }
}
