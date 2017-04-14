<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;
use Cake\I18n\Date;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;
use Cake\Mailer\Email;
use Cake\Auth\DefaultPasswordHasher;

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
        $this->loadComponent('CakeCaptcha.Captcha', [
          'captchaConfig' => 'ExampleCaptcha'
          ]);
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
        $this->Auth->allow(['add', 'logout', 'activate', 'setPassword', 'recoverPassword', 'recoverActivate']);

        $session = $this->request->session();
        $session->write('page', 'Suppliers'); //set page
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
        
        if($this->request->session()->read('type')) { //if is supplier
            $sid = $_SESSION['Auth']['User']['id'];
            $this->redirect(['controller' => 'Suppliers', 'action' => 'view', $sid]);
        }
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
    // public function add2()
    // {
    //     $supplier = $this->Suppliers->newEntity();
    //     if ($this->request->is('post')) {
    //         $supplier = $this->Suppliers->patchEntity($supplier, $this->request->data);
    //         if ($this->Suppliers->save($supplier)) {
    //             $this->Flash->success(__('The supplier has been saved.'));

    //             $session = $this->request->session();
    //             $retailer = $session->read('retailer');

    //             //$this->loadComponent('Logging');
    //             $this->Logging->rLog($supplier['id']);
    //             $this->Logging->iLog($retailer, $supplier['id']);

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('supplier'));
    //     $this->set('_serialize', ['supplier']);
    // }

    public function add(){

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
                $session = $this->request->session();
                $database = $session->read('database');

                $supplier = $this->Suppliers->patchEntity($supplier, $this->request->data);
                $username =  $supplier['id'] . substr($supplier['supplier_name'],0,1) . substr($supplier['supplier_name'],0,1) . "supplier";
                $supplier->set('username', $username);
                $this->Suppliers->save($supplier);

                $this->Email->activationEmail(
                    $supplier['email'], 
                    $supplier['supplier_name'], 
                    $supplier['username'], 
                    $this->password, 
                    $supplier['id'], 
                    $supplier['activation_token'], 
                    'suppliers',
                    $database
                    );

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

    

    function activate($id, $token, $database) {

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
        $conn = ConnectionManager::get('conn1');
        
        $query = $conn
        ->newQuery()
        ->select('*')
        ->from('suppliers')
        ->where(['id' => $id])
        ->execute()
        ->fetchAll('assoc');

        if($query[0]['activation_status'] == 'Activated'){
            $this->Flash->success(__('Your account has already been activated.'));
            return $this->redirect(['action' => 'login']);
        }
        
        $this->set('supplierId', $id);
        $this->set('token', $token);
        $this->set('dbname', $database);
        $this->set('name', $query[0]['supplier_name']);

        $retailersTable = TableRegistry::get('Retailers');
        $query = $retailersTable->find('all')->toArray();
        $this->set('retailers', $query);

        /*if($query[0]['activation_token'] == $token){
            $conn->update('suppliers', 
                ['activation_status' => 'Activated' ,
                'activation_token' => NULL],
                ['id' => $id]);
            
            $this->Flash->success(__('Your account has been activated.'));
            return $this->redirect(['action' => 'login']);
        }
        else{
            $this->Flash->error(__('There is something wrong with the activation link'));
            return $this->redirect(['action' => 'login']);
        }*/
    }

    function setPassword(){
        $id=$_POST['supplierId'];
        $token=$_POST['token'];
        $database=$_POST['dbname']; 
        $password = $_POST['password'];


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
        $conn = ConnectionManager::get('conn1');

        $query = $conn
        ->newQuery()
        ->select('*')
        ->from('suppliers')
        ->where(['id' => $id])
        ->execute()
        ->fetchAll('assoc');
        
        if($query[0]['activation_token'] == $token){


            $hasher = new DefaultPasswordHasher();
            $hashedPass = $hasher->hash($password);

            $conn->update('suppliers', 
                ['activation_status' => 'Activated' ,
                'activation_token' => NULL,
                'password' => $hashedPass],
                ['id' => $id]
                );


            $this->Flash->success(__('Your account has been successfully activated, please log in with your new credentials'));
            return $this->redirect(['action' => 'login']);
        }
        $this->Flash->error(__('Stop tempering with the system'));
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

            //check db match
            $allRetailers = TableRegistry::get('Retailers');
            $retailers = $allRetailers
                ->find();

            $check = false; 

            foreach ($retailers as $retailerInd) {
                if ($retailerInd->retailer_name == $_POST['retailer']) {
                    $check = false;
                    break;
                } else {
                    $check = true;
                }
            }
            if ($check) {
                $this->Flash->error('Incorrect login, please try again.');
                return $this->redirect(['controller' => 'Suppliers', 'action' => 'login']);
            }
            $retailer = $_POST['retailer'];
            $database = $_POST['retailer']."db";

            
            $session->write('database', $database);

            //CAPTCHA feature
            if ($session->check('login_fail') && $session->read('login_fail') > 3) {
                $isHuman = captcha_validate($this->request->data['CaptchaCode']);

                unset($this->request->data['CaptchaCode']);

                if (!$isHuman) {
                    $this->Flash->error('Wrong captcha code. Please try again');
                    return $this->redirect(['controller' => 'Suppliers', 'action' => 'login']);
                }
            }

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

                if($supplier['activation_status'] == 'Recovery'){
                    $this->Flash->error('An email regarding password recovery has been sent to your email address. Please check your mail');

                    return $this->redirect(['controller' => 'Pages', 'action' => 'login']);
                }
                $this->Auth->setUser($supplier);
                $session->write('supplier', $supplier); 
                return $this->redirect(['controller' => 'Pages', 'action' => 'supplier']);
            //return $this->redirect($this->Auth->redirectUrl());            
            }

            else {

                if($session->check('login_fail')) {
                    $login_fail = $session->read('login_fail') + 1;
                }   
                else {
                    $login_fail = 1;
                }
                $session->write("login_fail",$login_fail);
            }

            $this->Flash->error('Incorrect Login');   
        }

        $retailersTable = TableRegistry::get('Retailers');
        $query = $retailersTable->find('all')->toArray();
        $this->set('retailers', $query);
    }

    public function recoverPassword(){
        //check db match
        $allRetailers = TableRegistry::get('Retailers');
        $retailers = $allRetailers
            ->find();

        $check = false; 

        foreach ($retailers as $retailerInd) {
            if ($retailerInd->retailer_name == $_POST['retailer']) {
                $check = false;
                break;
            } else {
                $check = true;
            }
        }
        if ($check) {
            $this->Flash->error('Incorrect inputs, please try again.');
            return $this->redirect(['controller' => 'Suppliers', 'action' => 'login']);
        }

        $this->loadComponent('Generator');

        $email = $_POST['email'];
        $retailer = $_POST['retailer'];
        $database = $_POST['retailer'].'db';


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
        $conn = ConnectionManager::get('conn1');

        $query = $conn
        ->newQuery()
        ->select('*')
        ->from('suppliers')
        ->where(['email' => $email])
        ->execute()
        ->fetchAll('assoc');

        if($query == NULL){
            $this->Flash->error(__('Invalid email address'));
            return $this->redirect(['action' => 'login']);
        }

        $token = $this->Generator->generateString();
        $pass = $this->Generator->generateString();
        $hasher = new DefaultPasswordHasher();
        $hashedPass = $hasher->hash($pass);

        $conn->update('suppliers', 
            ['activation_status' => 'Recovery' ,
            'activation_token' => $token,
            'password' => $hashedPass],
            ['email' => $email]);

        $this->Email->recoveryEmail(
            $email, 
            $query[0]['supplier_name'], 
            $query[0]['username'], 
            $pass, 
            $query[0]['id'], 
            $token,  
            'suppliers',
            $database
            );


        $this->Flash->success(__('Password Reset Email Sent, please check your email.'));
        return $this->redirect(['action' => 'login']);



    }


    

    public function logout(){
        $this->Flash->success('You are now logged out');
        $this->Auth->logout();
        $session = $this->request->session();
        $session->destroy();
        return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'main'));
    }

    public function activateStatus($id) {

        $supplier = $this->Suppliers->get($id);

        $supplier->activation_status = 'Activated';
        $this->Suppliers->save($supplier);

        $this->Flash->success(__('The supplier has been activated.'));

        return $this->redirect(['action' => 'view/'.$id]);
    }

    public function deactivateStatus($id) {

        $supplier = $this->Suppliers->get($id);

        $supplier->activation_status = 'Deactivated';
        $this->Suppliers->save($supplier);

        $this->Flash->success(__('The supplier has been deactivated.'));

        return $this->redirect(['action' => 'view/'.$id]);

    }

    

    // public function recoverActivate($id, $token){

    //     $supplier = $this->Suppliers->get($id);
    //     if($supplier['recovery_status'] == NULL){
    //         $this->Flash->success(__('Your account has already been recovered.'));
    //         return $this->redirect(['action' => 'login']);
    //     }

    //     if ($supplier && $supplier['recovery_token'] == $token) {


    //         $supplier->recovery_status = NULL;
    //         $supplier->recovery_token = NULL;
    //         $this->Suppliers->save($supplier);

    //         $this->Flash->success(__('Your account has been recovered. Please log in using your new username and password.'));
    //         return $this->redirect(['action' => 'login']);

    //     }
    //     $this->Flash->error(__('There is something wrong with the activation link'));
    //     return $this->redirect(['action' => 'login']);

    // }

    
}
