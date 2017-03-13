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
        $this->Auth->allow(['add', 'logout', 'activate', 'recover', 'recoverActivate']);
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
    public function add2()
    {
        $retailerEmployee = $this->RetailerEmployees->newEntity();
        if ($this->request->is('post')) {
            $retailerEmployee = $this->RetailerEmployees->patchEntity($retailerEmployee, $this->request->data);
            if ($this->withinLimit()) {
                if ($this->RetailerEmployees->save($retailerEmployee)) {
                    $this->Flash->success(__('The retailer employee has been saved.'));

                    $session = $this->request->session();
                    $retailer = $session->read('retailer');

                    //$this->loadComponent('Logging');
                    $this->Logging->rLog($retailerEmployee['id']);
                    $this->Logging->iLog($retailer, $retailerEmployee['id']);

                    return $this->redirect(['action' => 'index']);
                }
            }
            else {
                $this->Flash->error(__('You have reached your maximum number of users! Please contact Intrasys to upgrade your account.'));
            }
            $this->Flash->error(__('The retailer employee could not be saved. Please, try again.'));
        }
        $locations = $this->RetailerEmployees->Locations->find('list', ['limit' => 200]);
        $messages = $this->RetailerEmployees->Messages->find('list', ['limit' => 200]);
        $retailerEmployeeRoles = $this->RetailerEmployees->RetailerEmployeeRoles->find('list', ['limit' => 200]);
        $this->set(compact('retailerEmployee', 'locations', 'messages', 'retailerEmployeeRoles'));
        $this->set('_serialize', ['retailerEmployee']);
    }

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

                    $this->Email->retailerEmployeeActivationEmail(
                        $retailerEmployee['email'], 
                        $retailerEmployee['first_name'], 
                        $retailerEmployee['username'], 
                        $this->password, 
                        $retailerEmployee['id'], 
                        $retailerEmployee['activation_token'], 
                        'retailer-employees',
                        $database
                        );


                    //$this->__sendActivationEmail($retailerEmployee['id']);
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
        $retailerEmployeeRoles = $this->RetailerEmployees->RetailerEmployeeRoles->find('list', ['limit' => 200]);
        $this->set(compact('retailerEmployee', 'locations', 'messages', 'retailerEmployeeRoles'));
        $this->set('_serialize', ['retailerEmployee']);
    }

    /*
    function __sendActivationEmail($user_id) {

        $user = $this->RetailerEmployees->get($user_id);
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

        return $email->send($user['first_name'] . ',' .
            $user['username'] . ',' .
            $this->password . ',' .
            env('SERVER_NAME') . ',' . 
            $user['id'] . ',' . 
            $user['activation_token'] . ',' .
            'retailer-employees');

    }*/

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
            
        if($query[0]['activation_token'] == $token){
            $conn->update('retailer_employees', 
                ['activation_status' => 'Activated' ,
                'activation_token' => NULL],
                ['id' => $id]);
            
            $this->Flash->success(__('Your account has been activated.'));
                return $this->redirect(['action' => 'login']);
        }
        else{
            $this->Flash->error(__('There is something wrong with the activation link'));
            return $this->redirect(['action' => 'login']);
        }

        
/*
        $retailerEmployee = $this->RetailerEmployees->get($id);

        if($retailerEmployee){
            if($retailerEmployee['activation_status'] == 'Activated'){
                $this->Flash->success(__('Your account has already been activated.'));
                return $this->redirect(['action' => 'login']);
            }

            if ($retailerEmployee['activation_token'] == $token) {

                $retailerEmployee->activation_status = 'Activated';
                $retailerEmployee->activation_token = NULL;
                $this->RetailerEmployees->save($retailerEmployee);

            //$this->loadComponent('Logging');
            //$this->Logging->log($intrasysEmployee['id']);
                $this->Logging->iLog(null, $retailerEmployee['id']);

                $this->Flash->success(__('Your account has been activated.'));
                return $this->redirect(['action' => 'login']);
            }
        }else{
            $this->Flash->error(__('There is something wrong with the activation link'));
            return $this->redirect(['action' => 'login']);
        }
*/
    }

    private function withinLimit()
    {   
        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //counting the retailer's existing number of product types
        $query = $this->RetailerEmployees->find();
        $count = $query->count();

        //obtaining the retailer's limit on the number of product types
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

        //The bonus number of units given to individual retailers
        $bonus = $conn
        ->newQuery()
        ->select('num_of_users')
        ->from('retailers')
        ->where(['retailer_name' => $retailer])
        ->execute()
        ->fetchAll('assoc');
        $bonus = Hash::extract($bonus, '{n}.num_of_users');

        //Total number of product types allowed to the retailers
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

        if ($session->check('login_fail') && $session->read('login_fail') > 3) {
          
          $isHuman = captcha_validate($this->request->data['CaptchaCode']);

          unset($this->request->data['CaptchaCode']);

          if (!$isHuman) {
            $this->Flash->error('Wrong captcha code. Please try again');
            return $this->redirect(['controller' => 'RetailerEmployees', 'action' => 'login']);
          }
        }
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
            } else if($retaileremployee['recovery_status'] == 'Pending') {
                $this->Flash->error('Your account has not been recovered yet. Please check your email.');

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
                        
                        //echo $diff_year - $rowCount;

                        // if the amount of loyalty points awarded for the annual contractual loyalty does not tally with the number of years elapsed in the contract, award the retailer with the loyalty points before proceeding
                        while($diff_year - $rowCount != 0) {

                            $rlpTable = TableRegistry::get('RetailerLoyaltyPoints');
                            $rlp = $rlpTable->newEntity();

                            $rlp->loyalty_pts = 100;
                            $rlp->redemption_pts = null;
                            $rlp->remarks = 'Annual Contractual Loyalty Reward';
                            $rlp->retailer_id = $query[0]['id'];
                            $rlp->intrasys_employee_id = '0';

                            $rlpTable->save($rlp);

                            $rowCount++;

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
}

public function recover(){

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
    ->from('retailer_employees')
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

    $conn->update('retailer_employees', 
        ['recovery_status' => 'Pending' ,
        'recovery_token' => $token,
        'password' => $hashedPass],
        ['email' => $email]);

    $this->Email->retailerEmployeeRecoveryEmail(
                    $email, 
                    $query[0]['first_name'], 
                    $query[0]['username'], 
                    $pass, 
                    $query[0]['id'], 
                    $token,  
                    'retailer-employees',
                    $database
                    );

   
    $this->Flash->success(__('Password Reset Email Sent, please check your email.'));
    return $this->redirect(['action' => 'login']);

}


/*

    $query = $this->RetailerEmployees->find('all', [
        'conditions' => ['email' => $email],
        ]);

     
    $row = $query->first();
    $retaileremployee = $this->RetailerEmployees->get($row['id']);
    $this->Logging->iLog(null, $retaileremployee['id']);

    $newPass = $this->Generator->generateString();
    $retaileremployee->password = $newPass;
    $retaileremployee->recovery_status = 'Pending';
    $retaileremployee->recovery_token = $this->Generator->generateString();

    if ($this->RetailerEmployees->save($retaileremployee)){

        $this->Email->recoveryEmail(
            $retaileremployee['email'], 
            $retaileremployee['first_name'], 
            $retaileremployee['username'], 
            $newPass, 
            $retaileremployee['id'], 
            $retaileremployee['recovery_token'], 
            'retailer-employees');

        

        $this->Flash->success(__('Password Reset Email Sent, please check your email.'));
        return $this->redirect(['action' => 'login']);
    */
    



public function recoverActivate($id, $token, $database){

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

    if($query == NULL){
        $this->Flash->error(__('There is something wrong with the activation link'));
        return $this->redirect(['action' => 'login']);
    }

    if($query[0]['recovery_status'] == NULL){
        $this->Flash->success(__('Your account has already been recovered.'));
        return $this->redirect(['action' => 'login']);
    }

    $conn->update('retailer_employees', 
        ['recovery_status' => NULL ,
        'recovery_token' => NULL],
        ['id' => $id]);

    $this->Flash->success(__('Your account has been recovered.'));
    return $this->redirect(['action' => 'login']);
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