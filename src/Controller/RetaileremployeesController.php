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
use Cake\Network\Http\Client;

/**
 * RetailerEmployees Controller
 *
 * @property \App\Model\Table\RetailerEmployeesTable $RetailerEmployees
 */
class RetailerEmployeesController extends AppController
{
    private $password;
    //$this->loadComponent('Logging');    

    public function beforeFilter(Event $event)
    {

        parent::beforeFilter($event);
        $this->loadComponent('RequestHandler');
        $this->loadComponent('CakeCaptcha.Captcha', [
          'captchaConfig' => 'ExampleCaptcha'
          ]);
        $this->loadComponent('Logging');
        $this->loadComponent('Email');
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
        $this->Auth->allow(['htcindex', 'add', 'logout', 'activate', 'recoverPassword', 'recoverActivate', 'setPassword']);
    }

    public function index() {

        $this->loadComponent('Prg');
        $this->Prg->commonProcess();
        $this->paginate = [
        'contain' => ['Locations','RetailerEmployeeRoles']
        ];

        $this->set('retailerEmployees', $this->paginate($this->RetailerEmployees->find('searchable', $this->Prg->parsedParams())));
        $this->set(compact('retailerEmployees'));
        $this->set('_serialize', ['retailerEmployees']);
    }

    public function htcindex() {
        $this->viewBuilder()->setLayout("ajax");

        
        $response = $this->request->data();

      //var_dump($response);

        //Check if there's any missing value
        foreach($response as $key => $value) {
            if ($value == "") {
                $this->set("test", "failed");
                return;
            } 
        };

        foreach($response as $key => $value) {
            if($key == 'username') {
                //var_dump("in check username");
                $this->request->data['username'] = $value;
            } else if ($key == 'password') {
                //var_dump("in check password");
                $this->request->data['password'] = $value;
            } else {
                $retailer = $value;
                $database = $value."db";
                //var_dump($database);

                $session = $this->request->session();
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

                $user = $this->Auth->identify();
                if ($user){
                $this->Auth->setUser($user);
                // var_dump("Auth Success");
            } else {
                $this->set("test", "failed");
                return;
            };
            };
        };
        $this->set("test", "pass");
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
            'contain' => ['Locations', 'Messages', 'RetailerEmployeeRoles', 'Promotions', 'PurchaseOrders', 'SupplierMemos', 'RetailerLoggings']
            ]);
        
        $session = $this->request->session();
        $retailer = $session->read('retailer');

        $session = $this->request->session()->read('Auth.User');
        $sessionEmployee = $this->RetailerEmployees->get($session['id'], [
            'contain' => ['RetailerEmployeeRoles']
            ]);

        foreach ($sessionEmployee->retailer_employee_roles as $retailerEmployeeRoles) {
            if($retailerEmployeeRoles->id == '4') {
                if($retailerEmployee['id'] != $session['id']) {
                    $this->redirect($this->referer());
                    $this->Flash->error(__('You are not authorized to view other employees.'));
                }    
            }

        }
        
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
    // public function add2()
    // {
    //     $retailerEmployee = $this->RetailerEmployees->newEntity();
    //     if ($this->request->is('post')) {
    //         $retailerEmployee = $this->RetailerEmployees->patchEntity($retailerEmployee, $this->request->data);
    //         if ($this->withinLimit()) {
    //             if ($this->RetailerEmployees->save($retailerEmployee)) {
    //                 $this->Flash->success(__('The retailer employee has been saved.'));

    //                 $session = $this->request->session();
    //                 $retailer = $session->read('retailer');

    //                 //$this->loadComponent('Logging');
    //                 $this->Logging->rLog($retailerEmployee['id']);
    //                 $this->Logging->iLog($retailer, $retailerEmployee['id']);

    //                 return $this->redirect(['action' => 'index']);
    //             }
    //         }
    //         else {
    //             $this->Flash->error(__('You have reached your maximum number of users! Please contact Intrasys to upgrade your account.'));
    //         }
    //         $this->Flash->error(__('The retailer employee could not be saved. Please, try again.'));
    //     }
    //     $locations = $this->RetailerEmployees->Locations->find('list', ['limit' => 200]);
    //     $messages = $this->RetailerEmployees->Messages->find('list', ['limit' => 200]);
    //     $retailerEmployeeRoles = $this->RetailerEmployees->RetailerEmployeeRoles->find('list', ['limit' => 200]);
    //     $this->set(compact('retailerEmployee', 'locations', 'messages', 'retailerEmployeeRoles'));
    //     $this->set('_serialize', ['retailerEmployee']);
    // }

    public function add(){

        $this->loadComponent('Generator');

        $retailerEmployee = $this->RetailerEmployees->newEntity();
        if ($this->request->is('post')) {

            $retailerEmployee = $this->RetailerEmployees->patchEntity($retailerEmployee, $this->request->data);

            if ($this->withinLimit()) {

                $retailerEmployee->set('username', $this->Generator->generateString());
                $this->password = $this->Generator->generateString();
                $retailerEmployee->set('password', $this->password);
                $retailerEmployee->set('activation_status', 'Deactivated');
                $retailerEmployee->set('activation_token', $this->Generator->generateString());


                if ($this->RetailerEmployees->save($retailerEmployee)) {

                    $session = $this->request->session();
                    $database = $session->read('database');
                    $retailer = $session->read('retailer');

                    $retailerEmployee = $this->RetailerEmployees->patchEntity($retailerEmployee, $this->request->data);
                    $username =  $retailerEmployee['id'] . substr($retailerEmployee['first_name'],0,1) . substr($retailerEmployee['last_name'],0,1) . $retailer;
                    $retailerEmployee->set('username', $username);
                    $this->RetailerEmployees->save($retailerEmployee);

                    $this->Email->activationEmail(
                        $retailerEmployee['email'], 
                        $retailerEmployee['first_name'], 
                        $retailerEmployee['username'], 
                        $this->password, 
                        $retailerEmployee['id'], 
                        $retailerEmployee['activation_token'], 
                        'retailer-employees',
                        $database
                        );

                    $this->Flash->success(__('The retailer employee has been saved.'));

                    $session = $this->request->session();
                    $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                    $this->Logging->rLog($retailerEmployee['id']);
                    $this->Logging->iLog($retailer, $retailerEmployee['id']);

                    return $this->redirect(['action' => 'index']);
                }

            } else {
                $this->Flash->error(__('You have reached your maximum number of users! Please contact Intrasys to upgrade your account.'));
            }

            $this->Flash->error(__('The retailer employee could not be saved. Please, try again.'));
        }
        $locations = $this->RetailerEmployees->Locations->find('list', ['limit' => 200]);
        $messages = $this->RetailerEmployees->Messages->find('list', ['limit' => 200]);
        $this->set('retailerEmployeeRoles', $this->RetailerEmployees->RetailerEmployeeRoles->find('all')); //to populate select input for roles
        //$retailerEmployeeRoles = $this->RetailerEmployees->RetailerEmployeeRoles->find('list', ['limit' => 200]);
        $this->set(compact('retailerEmployee', 'locations', 'messages', 'retailerEmployeeRoles'));
        $this->set('_serialize', ['retailerEmployee']);
    }

    
    public function activate($id, $token, $database) {

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
        ->from('retailer_employees')
        ->where(['id' => $id])
        ->execute()
        ->fetchAll('assoc');

        if($query[0]['activation_status'] == 'Activated'){
            $this->Flash->success(__('Your account has already been activated.'));
            return $this->redirect(['action' => 'login']);
        }
        $this->set('employeeId', $id);
        $this->set('token', $token);
        $this->set('dbname', $database);
        $this->set('name', $query[0]['first_name']);

        $retailersTable = TableRegistry::get('Retailers');
        $query = $retailersTable->find('all')->toArray();
        $this->set('retailers', $query);
        
    }

    function setPassword(){
        $id=$_POST['employeeId'];
        $token=$_POST['token'];
        $database=$_POST['dbname'];
        $password =$_POST['password'];

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
        ->from('retailer_employees')
        ->where(['id' => $id])
        ->execute()
        ->fetchAll('assoc');
        
        if($query[0]['activation_token'] == $token){


            $hasher = new DefaultPasswordHasher();
            $hashedPass = $hasher->hash($password);

            $conn->update('retailer_employees', 
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

    private function withinLimit()
    {   
        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //counting the retailer's existing number of employees
        $query = $this->RetailerEmployees->find();
        $count = $query->count();

        //obtaining the retailer's limit on the number of employees
        $conn = ConnectionManager::get('intrasysdb');
        $acctTypeID = $conn
        ->newQuery()
        ->select('retailer_acc_type_id')
        ->from('retailers')
        ->where(['retailer_name' => $retailer])
        ->execute()
        ->fetchAll('assoc');

        $defaultNum = $conn
        ->newQuery()
        ->select('num_of_users')
        ->from('retailer_acc_types')
        ->where(['id' => $acctTypeID[0]], ['id' => 'integer[]'])
        ->execute()
        ->fetchAll('assoc');
        $defaultNum = Hash::extract($defaultNum, '{n}.num_of_users');

        //The bonus number of employees given to the retailer
        $bonus = $conn
        ->newQuery()
        ->select('num_of_users')
        ->from('retailers')
        ->where(['retailer_name' => $retailer])
        ->execute()
        ->fetchAll('assoc');
        $bonus = Hash::extract($bonus, '{n}.num_of_users');

        //Total number of employees allowed to the retailers
        $limit = $defaultNum[0] + $bonus[0]; 

        if ($count >= $limit) {
            return false;
        }
        return true;
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
            'contain' => ['Locations', 'Messages', 'RetailerEmployeeRoles', 'Promotions', 'PurchaseOrders', 'SupplierMemos', 'RetailerLoggings']
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

        if ($session->check('login_fail') && $session->read('login_fail') > 3) {

          $isHuman = captcha_validate($this->request->data['CaptchaCode']);
          unset($this->request->data['CaptchaCode']);

          if (!$isHuman) {
            $this->Flash->error('Wrong captcha code. Please try again');
            
          } 
        }
        //check retailer's db match
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
            return $this->redirect(['controller' => 'RetailerEmployees', 'action' => 'login']);
        }

    //echo 'HELLO '.$_POST['username'];
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
        if($retaileremployee['activation_status'] == 'Deactivated') {
            $this->Flash->error('Your account has not been activated yet. Please check your email');

            return $this->redirect(['controller' => 'RetailerEmployees', 'action' => 'login']);
        } else if($retaileremployee['activation_status'] == 'Recovery') {
            $this->Flash->error('An email regarding password recovery has been sent to your email address. Please check your mail');

            return $this->redirect(['controller' => 'RetailerEmployees', 'action' => 'login']);
        } else {

            $conn = ConnectionManager::get('intrasysdb');
            $query = $conn
            ->newQuery()
            ->select('*')
            ->from('retailers')
            ->where(['retailer_name' => $retailer])
            ->execute()
            ->fetchAll('assoc');

            $now = Date::now();
            $end = Time::parse($query[0]['contract_end_date']);
            $start = Time::parse($query[0]['contract_start_date']);

            if($query[0]['account_status'] != 'Activated') {
                $this->Flash->error($retailer.'\'s account with Intrasys has been deactivated, banned or terminated.');

                return $this->redirect(['controller' => 'RetailerEmployees', 'action' => 'login']);
            } else if($end <= $now) {

                $retailerTable = TableRegistry::get('Retailers');
                $retailerEntity = $retailerTable->get($query[0]['id']);
                $retailerEntity->account_status = 'Deactivated';
                $retailerTable->save($retailerEntity);

                $this->Flash->error($retailer.'\'s contract with Intrasys has expired.');

                return $this->redirect(['controller' => 'RetailerEmployees', 'action' => 'login']);
            } else {

                        // 1. check the difference (in days) between the contract start date and today's date
                        // 2. mod the number of days by 365 (to get the number of years elapsed) 
                        // 3. count the number of times loyalty points have already been awarded to them for "annual contract loyalty"
                        // 4. if the answer from (3) - (2) is ONE, award 100 loyalty points to the retailer

                $diff_year = 0;
                $start->addYear(1);

                while($start<$now) {

                    $diff_year += 1;
                    $start->addYear(1);

                }

                if($diff_year != 0) {

                    $query2 = $conn
                    ->newQuery()
                    ->select('*')
                    ->from('retailer_loyalty_points')
                    ->where(['retailer_id' => $query[0]['id']])
                    ->where(['remarks' => 'Annual Contractual Loyalty Reward'])
                    ->execute()
                    ->fetchAll('assoc');

                    $rowCount = 0;

                    foreach($query2 as $row){
                        $rowCount++;
                    }

                            // if the amount of loyalty points awarded for the annual contractual loyalty does not tally with the number of years elapsed in the contract, award the retailer with the loyalty points before proceeding
                    while($diff_year - $rowCount != 0) {

                        $rlpTable = TableRegistry::get('RetailerLoyaltyPoints');
                        $rlp = $rlpTable->newEntity();

                        $rlp->loyalty_pts = 100;
                        $rlp->redemption_pts = null;
                        $rlp->remarks = 'Annual Contractual Loyalty Reward';
                        $rlp->retailer_id = $query[0]['id'];
                        $rlp->intrasys_employee_id = null;

                        $rlpTable->save($rlp);

                        $rowCount++;
                            //$this->Flash->error($rowCount); 

                    }
                }    
            }
        }

        $this->Auth->setUser($retaileremployee);
        $session->write('retailer', $retailer); 
        $session->write('retailer_employee_id',$retaileremployee['id']);

                //get retailer ID
        $conn = ConnectionManager::get('intrasysdb');
        $query = $conn
        ->newQuery()
        ->select('*')
        ->from('retailers')
        ->where(['retailer_name' => $retailer])
        ->execute()
        ->fetchAll('assoc');
        $rid = $query[0]['id'];
        $session->write('retailerid', $rid); 

                //$this->loadComponent('Logging');            
        $this->Logging->rLog($session->read('retailer_employee_id'));
        $this->Logging->iLog($retailer, $session->read('retailer_employee_id'));

        return $this->redirect(['controller' => 'Pages', 'action' => 'retailer']);
                //return $this->redirect($this->Auth->redirectUrl());            
    } else {

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

public function managerActions($id = null)
{
    $session = $this->request->session();
    $retailer = $session->read('retailer');
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

    $this->loadComponent('Generator');
        $this->set('roles', $this->RetailerEmployees->RetailerEmployeeRoles->find('all')); //to populate select input for roles
        $this->set(compact('roles'));
    }

    public function recoverPassword($id){

        $this->loadComponent('Generator');
        $session = $this->request->session();
        $database = $session->read('database');

        $retailerEmployee = $this->RetailerEmployees->get($id);
        

        $retailerEmployee->activation_status = 'Recovery';
        $retailerEmployee->activation_token = $this->Generator->generateString();

        if ($this->RetailerEmployees->save($retailerEmployee)){


            $this->Email->recoveryEmail(
                $retailerEmployee['email'], 
                $retailerEmployee['first_name'], 
                $retailerEmployee['username'], 
                $this->password, 
                $retailerEmployee['id'], 
                $retailerEmployee['activation_token'], 
                'retailer-employees',
                $database
                );

            $this->Flash->success(__('Password Reset Email Sent'));
            return $this->redirect(['action' => 'index']);
        }

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

    public function activateStatus($id) {

      $retailerEmployee = $this->RetailerEmployees->get($id);

      $retailerEmployee->activation_status = 'Activated';
      $this->RetailerEmployees->save($retailerEmployee);

      $this->Flash->success(__('The Retailer Employee has been activated.'));

      return $this->redirect(['action' => 'index']);
  }

  public function deactivateStatus($id) {

      $retailerEmployee = $this->RetailerEmployees->get($id);

      $retailerEmployee->activation_status = 'Deactivated';
      $this->RetailerEmployees->save($retailerEmployee);

      $this->Flash->success(__('The Retailer Employee has been deactivated.'));

      return $this->redirect(['action' => 'index']);

  }

  public function poslogin() 
  {
    if($this->request->is('post')) {

        //Setting default database connection
        $retailer = $_POST['retailer'];
        $database = $_POST['retailer']."db";
        $session = $this->request->session();
        $session->write('database', $database);
        $session->write('retailer', $retailer); 

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

        //Setting retailer ID
        $conn = ConnectionManager::get('intrasysdb');
        $query = $conn
        ->newQuery()
        ->select('*')
        ->from('retailers')
        ->where(['retailer_name' => $retailer])
        ->execute()
        ->fetchAll('assoc');
        $rid = $query[0]['id'];
        $session->write('retailerid', $rid); 

        //Authentication of retailer employee
        $retaileremployee = $this->Auth->identify();
        if($retaileremployee){
            if($retaileremployee['activation_status'] == 'Deactivated') {
                echo ("Your account has not been activated yet. Please check your email.");
            }   
            else if ($retaileremployee['location_id'] != $_POST['location']) {
                echo ("You do not have access to this POS machine!");
            }
            else {
                $this->Auth->setUser($retaileremployee);
                $session->write('retailer_employee_id',$retaileremployee['id']);

                //Logging
                $this->Logging->rLog($session->read('retailer_employee_id'));
                $this->Logging->iLog($retailer, $session->read('retailer_employee_id'));

                echo ("True");
                echo ("\n");
                echo ($retaileremployee['first_name'].' '.$retaileremployee['last_name']);
                echo ("\n");
                echo ($retaileremployee['id']);
                echo ("\n");
            }
        }
        else {
            echo ("Invalid Credentials!");
        }
    }

    $retailersTable = TableRegistry::get('Retailers');
    $query = $retailersTable->find('all')->toArray();
    $this->set('retailers', $query);
}

// public function recoverActivate($id, $token, $database){

//     ConnectionManager::drop('conn1'); 
//     ConnectionManager::config('conn1', [
//         'className' => 'Cake\Database\Connection',
//         'driver' => 'Cake\Database\Driver\Mysql',
//         'persistent' => false,
//         'host' => 'localhost',
//         'username' => 'root',
//         'password' => 'joy',
//         'database' => $database,
//         'encoding' => 'utf8',
//         'timezone' => 'UTC',
//         'cacheMetadata' => true,
//         ]);
//     $conn = ConnectionManager::get('conn1');

//     $query = $conn
//     ->newQuery()
//     ->select('*')
//     ->from('retailer_employees')
//     ->where(['id' => $id])
//     ->execute()
//     ->fetchAll('assoc');

//     if($query == NULL){
//         $this->Flash->error(__('There is something wrong with the activation link'));
//         return $this->redirect(['action' => 'login']);
//     }

//     if($query[0]['recovery_status'] == NULL){
//         $this->Flash->success(__('Your account has already been recovered.'));
//         return $this->redirect(['action' => 'login']);
//     }

//     $conn->update('retailer_employees', 
//         ['recovery_status' => NULL ,
//         'recovery_token' => NULL],
//         ['id' => $id]);

//     $this->Flash->success(__('Your account has been recovered.'));
//     return $this->redirect(['action' => 'login']);
// }

}