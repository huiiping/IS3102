<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

/**
 * IntrasysEmployees Controller
 *
 * @property \App\Model\Table\IntrasysEmployeesTable $IntrasysEmployees
 */
class IntrasysEmployeesController extends AppController {
  private $password;

  public function beforeFilter(Event $event) 
  {
    parent::beforeFilter($event);

        //Loading Components
    $this->loadComponent('CakeCaptcha.Captcha', [
      'captchaConfig' => 'ExampleCaptcha']);
    $this->loadComponent('Logging');
    $this->loadComponent('Email');
    $this->loadcomponent('Auth', [
      'authenticate' => [
      'Form' => [
      'userModel' => 'IntrasysEmployees',
      'fields' => [
      'username' => 'username',
      'password' => 'password'
      ],
      ]
      ],
      'loginAction' => [
      'controller' => 'IntrasysEmployees',
      'action' => 'login'
      ]
      ]);

    // Allow users to register and logout.
    // You should not add the "login" action to allow list. Doing so would cause problems with normal functioning of AuthComponent.
    $this->Auth->allow(['add', 'logout', 'activate', 'recoverPassword', 'recoverActivate', 'setPassword']);

  }

  public function index() {

    $this->loadComponent('Prg');
    $this->Prg->commonProcess();
    $this->set('intrasysEmployees', $this->paginate($this->IntrasysEmployees->find('searchable', $this->Prg->parsedParams())));
    $this->set(compact('intrasysEmployees'));
    $this->set('_serialize', ['intrasysEmployees']);
  }

  public $components = array(
    'Prg'
    );

  /**
  * View method
  *
  * @param string|null $id Intrasys Employee id.
  * @return \Cake\Network\Response|null
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function view($id = null) {
  	
    $intrasysEmployee = $this->IntrasysEmployees->get($id, [
      'contain' => ['IntrasysEmployeeRoles']
      ]);

    $sessionId = $this->request->session()->read('Auth.User.id');
    $session = $this->request->session()->read('Auth.User');
    $sessionEmployee = $this->IntrasysEmployees->get($session['id'], [
      'contain' => ['IntrasysEmployeeRoles']
      ]);

    foreach ($sessionEmployee->intrasys_employee_roles as $intrasysEmployeeRoles) {

      if($intrasysEmployeeRoles->id == '7') {

        if($intrasysEmployee['id'] != $sessionId) {

          $this->redirect($this->referer());
          $this->Flash->error(__('You are not authorized to view other employees.'));

        }    
      }

    }

    $this->Logging->iLog(null, $intrasysEmployee['id']);
    $this->set('intrasysEmployee', $intrasysEmployee);
    $this->set('_serialize', ['intrasysEmployee']);

  }

  /**
  * Add method
  *
  * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
  */

  public function add2() {

    $intrasysEmployee = $this->IntrasysEmployees->newEntity();

    if ($this->request->is('post')) {

    	$intrasysEmployee = $this->IntrasysEmployees->patchEntity($intrasysEmployee, $this->request->data);
    	$intrasysEmployee->set('activation_status', 'Activated');

    	if ($this->IntrasysEmployees->save($intrasysEmployee)) {

    		$this->Flash->success(__('The intrasys employee has been saved.'));
        $this->Logging->iLog(null, $intrasysEmployee['id']);

        return $this->redirect(['action' => 'index']);
      }

      $this->Flash->error(__('The intrasys employee could not be saved. Please, try again.'));

    }

    $intrasysEmployeeRoles = $this->IntrasysEmployees->IntrasysEmployeeRoles->find('list', ['limit' => 200]);
    $this->set(compact('intrasysEmployee', 'intrasysEmployeeRoles'));
    $this->set('_serialize', ['intrasysEmployee']);

  }

  public function add() {

  	$this->loadComponent('Generator');

  	$intrasysEmployee = $this->IntrasysEmployees->newEntity();

  	if ($this->request->is('post')) {

  		$intrasysEmployee = $this->IntrasysEmployees->patchEntity($intrasysEmployee, $this->request->data);
      $intrasysEmployee->set('username', $this->Generator->generateString());
      $this->password = $this->Generator->generateString();
      $intrasysEmployee->set('password', $this->password);
      $intrasysEmployee->set('activation_status', 'Deactivated');
      $intrasysEmployee->set('activation_token', $this->Generator->generateString());

      if ($this->IntrasysEmployees->save($intrasysEmployee)) {

        $intrasysEmployee = $this->IntrasysEmployees->patchEntity($intrasysEmployee, $this->request->data);
        $username =  $intrasysEmployee['id'] . substr($intrasysEmployee['first_name'],0,1) . substr($intrasysEmployee['last_name'],0,1) . "intrasys";
        $intrasysEmployee->set('username', $username);
        $this->IntrasysEmployees->save($intrasysEmployee);

        $this->Email->activationEmail(
          $intrasysEmployee['email'], 
          $intrasysEmployee['first_name'], 
          $intrasysEmployee['username'], 
          $this->password, 
          $intrasysEmployee['id'], 
          $intrasysEmployee['activation_token'], 
          'intrasys-employees',
          ""
          );

        $this->Flash->success(__('The intrasys employee has been saved.'));
        $this->Logging->iLog(null, $intrasysEmployee['id']);

        return $this->redirect(['action' => 'index']);
      }

      $this->Flash->error(__('The intrasys employee could not be saved. Please, try again.'));

    }

      $this->set('intrasysEmployeeRoles', $this->IntrasysEmployees->IntrasysEmployeeRoles->find('all')); //to populate select input for roles
      $this->set(compact('intrasysEmployee', 'intrasysEmployeeRoles'));
      $this->set('_serialize', ['intrasysEmployee']);

    }



    function activate($id, $token) {

      $intrasysEmployee = $this->IntrasysEmployees->get($id);

      if($intrasysEmployee['activation_status'] == 'Activated'){
        $this->Flash->success(__('Your account has already been activated.'));

        return $this->redirect(['action' => 'login']);
      }

      $this->set('employeeId', $id);
      $this->set('token', $token);
      $this->set('name', $intrasysEmployee['first_name']);

    }

    function setPassword() {

      $id=$_POST['employeeId'];
      $token=$_POST['token'];
      $password = $_POST['password'];
      $intrasysEmployee = $this->IntrasysEmployees->get($id);

      if($intrasysEmployee['activation_token'] == $token){

        $intrasysEmployee->password = $password;
        $intrasysEmployee->activation_status = 'Activated';
        $intrasysEmployee->activation_token = NULL;
        $this->IntrasysEmployees->save($intrasysEmployee);

        $this->Flash->success(__('Your account has been successfully activated, please log in with your new credentials'));

        return $this->redirect(['action' => 'login']);
      }

      $this->Flash->error(__('Stop tempering with the system'));

      return $this->redirect(['action' => 'login']);
    }

  /**
  * Edit method
  *
  * @param string|null $id Intrasys Employee id.
  * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function edit($id = null) {

    $intrasysEmployee = $this->IntrasysEmployees->get($id, [
      'contain' => ['IntrasysEmployeeRoles']
      ]);

    $sessionId = $this->request->session()->read('Auth.User.id');

        //Only the employee themselves can edit their account
    if($intrasysEmployee['id'] != $sessionId) {

      $this->redirect($this->referer());
      $this->Flash->error(__('You are not authorized to edit other employees.'));

    }

    if ($this->request->is(['patch', 'post', 'put'])) {

      $intrasysEmployee = $this->IntrasysEmployees->patchEntity($intrasysEmployee, $this->request->data);

      if ($this->IntrasysEmployees->save($intrasysEmployee)) {

        $this->Flash->success(__('The intrasys employee has been saved.'));
        $this->Logging->iLog(null, $intrasysEmployee['id']);

        return $this->redirect(['action' => 'index']);

      }

      $this->Flash->error(__('The intrasys employee could not be saved. Please, try again.'));
    }

    $intrasysEmployeeRoles = $this->IntrasysEmployees->IntrasysEmployeeRoles->find('list', ['limit' => 200]);
    $this->set(compact('intrasysEmployee', 'intrasysEmployeeRoles'));
    $this->set('_serialize', ['intrasysEmployee']);

  }

  /**
   * Delete method
   *
   * @param string|null $id Intrasys Employee id.
   * @return \Cake\Network\Response|null Redirects to index.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function delete($id = null) {
    $session = $this->request->session();
    $employee_id = $session->read('employee_id');

    if($id != $employee_id){

     $this->request->allowMethod(['post', 'delete']);
     $intrasysEmployee = $this->IntrasysEmployees->get($id);

     if ($this->IntrasysEmployees->delete($intrasysEmployee)) {

      $this->Flash->success(__('The intrasys employee has been deleted.'));
      $this->Logging->iLog(null, $intrasysEmployee['id']);

    } else {

      $this->Flash->error(__('The intrasys employee could not be deleted. Please, try again.'));

    }

  } else {

    $this->Flash->error(__('You cannot delete your own account.'));

  }

  return $this->redirect(['action' => 'index']);
}

public function login(){

  if($this->request->is('post')){

    $session = $this->request->session();

          //CAPTCHA feature
    if ($session->check('login_fail') && $session->read('login_fail') > 3) {
      $isHuman = captcha_validate($this->request->data['CaptchaCode']);

      unset($this->request->data['CaptchaCode']);

      if (!$isHuman) {
        $this->Flash->error('Wrong captcha code. Please try again');
        return $this->redirect(['controller' => 'IntrasysEmployees', 'action' => 'login']);
      }
    }

    $intrasysemployee = $this->Auth->identify();
    if($intrasysemployee){
      if($intrasysemployee['activation_status'] == 'Deactivated'){
        $this->Flash->error('Your account has not been activated yet. Please check your email');

        return $this->redirect(['controller' => 'IntrasysEmployees', 'action' => 'login']);
      }

      if($intrasysemployee['recovery_status'] == 'Pending'){
        $this->Flash->error('Your account has not been recovered yet. Please check your email.');

        return $this->redirect(['controller' => 'IntrasysEmployees', 'action' => 'login']);
      }

      $this->Auth->setUser($intrasysemployee);
      $session->write('employee_id',$intrasysemployee['id']);

      $this->Logging->iLog(null, $intrasysemployee['id']);

      return $this->redirect(['controller' => 'Pages', 'action' => 'intrasys']);

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
}

public function managerActions($id = null) {

  $intrasysEmployee = $this->IntrasysEmployees->get($id, [
    'contain' => ['IntrasysEmployeeRoles']
    ]);

  if ($this->request->is(['patch', 'post', 'put'])) {

    $intrasysEmployee = $this->IntrasysEmployees->patchEntity($intrasysEmployee, $this->request->data);

    if ($this->IntrasysEmployees->save($intrasysEmployee)) {

      $this->Flash->success(__('The intrasys employee has been saved.'));
      $this->Logging->iLog(null, $intrasysEmployee['id']);

      return $this->redirect(['action' => 'index']);
    }

    $this->Flash->error(__('The intrasys employee could not be saved. Please, try again.'));

  }

  $intrasysEmployeeRoles = $this->IntrasysEmployees->IntrasysEmployeeRoles->find('list', ['limit' => 200]);

  $this->set(compact('intrasysEmployee', 'intrasysEmployeeRoles'));
  $this->set('_serialize', ['intrasysEmployee']);

  $this->loadComponent('Generator');
    $this->set('roles', $this->IntrasysEmployees->IntrasysEmployeeRoles->find('all')); //to populate select input for roles
    $this->set(compact('roles'));

  }

  public function recoverPassword($id = null) {

    $this->loadComponent('Generator');
    $intrasysEmployee = $this->IntrasysEmployees->get($id);
    


    $intrasysEmployee->activation_status = 'Deactivated';
    $intrasysEmployee->activation_token = $this->Generator->generateString();

    if ($this->IntrasysEmployees->save($intrasysEmployee)){

      $this->Email->recoveryEmail(
       $intrasysEmployee['email'],
       $intrasysEmployee['first_name'], 
       $intrasysEmployee['username'], 
       $intrasysEmployee['password'], 
       $intrasysEmployee['id'], 
       $intrasysEmployee['activation_token'], 
       'intrasys-employees',
       "");

      $this->Flash->success(__('Password Reset Email Sent'));
      return $this->redirect(['action' => 'index']);
    }
  }

  public function recoverActivate($id, $token){

    $intrasysEmployee = $this->IntrasysEmployees->get($id);

    if($intrasysEmployee['recovery_status'] == NULL) {

      $this->Flash->success(__('Your account has already been recovered.'));

      return $this->redirect(['action' => 'login']);
    }

    if ($intrasysEmployee && $intrasysEmployee['recovery_token'] == $token) {

      $intrasysEmployee->recovery_status = NULL;
      $intrasysEmployee->recovery_token = NULL;
      $this->IntrasysEmployees->save($intrasysEmployee);

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

   $this->Logging->iLog(null, $session->read('employee_id'));

   return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'main'));
 }

 public function activateStatus($id) {

  $intrasysEmployee = $this->IntrasysEmployees->get($id);
  $intrasysEmployee->activation_status = 'Activated';
  $this->IntrasysEmployees->save($intrasysEmployee);
  $this->Flash->success(__('The Intrasys Employee has been activated.'));

  return $this->redirect(['action' => 'index']);
}

public function deactivateStatus($id) {

  $intrasysEmployee = $this->IntrasysEmployees->get($id);
  $intrasysEmployee->activation_status = 'Deactivated';
  $this->IntrasysEmployees->save($intrasysEmployee);
  $this->Flash->success(__('The Intrasys Employee has been deactivated.'));

  return $this->redirect(['action' => 'index']);
}
}
