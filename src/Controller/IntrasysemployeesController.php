<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
/**
 * IntrasysEmployees Controller
 *
 * @property \App\Model\Table\IntrasysEmployeesTable $IntrasysEmployees
 */
class IntrasysEmployeesController extends AppController
{
	private $password;

	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);

        //Loading Components
       $this->loadComponent('CakeCaptcha.Captcha', [
          'captchaConfig' => 'ExampleCaptcha'
          ]);
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
       $this->Auth->allow(['add', 'logout', 'activate', 'recover', 'recoverActivate']);
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
    public function view($id = null)
    {
    	$intrasysEmployee = $this->IntrasysEmployees->get($id, [
    		'contain' => ['IntrasysEmployeeRoles']
    		]);

        $sessionId = $this->request->session()->read('Auth.User.id');
        $session = $this->request->session()->read('Auth.User');
        $sessionEmployee = $this->IntrasysEmployees->get($session['id'], [
            'contain' => ['IntrasysEmployeeRoles']
            ]);
        //$intrasysEmployees = $intrasysEmployee->IntrasysEmployeeRoles;
        foreach ($sessionEmployee->intrasys_employee_roles as $intrasysEmployeeRoles) {
            if($intrasysEmployeeRoles->id == '7') {
                if($intrasysEmployee['id'] != $sessionId) {
                $this->redirect($this->referer());
                $this->Flash->error(__('You are not authorized to view other employees.'));
                }    
            }

        }
        //$this->loadComponent('Logging');
        //$this->Logging->log($intrasysEmployee['id']);
        $this->Logging->iLog(null, $intrasysEmployee['id']);

        $this->set('intrasysEmployee', $intrasysEmployee);
        $this->set('_serialize', ['intrasysEmployee']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    
    public function add2()
    {
    	$intrasysEmployee = $this->IntrasysEmployees->newEntity();
    	if ($this->request->is('post')) {
    		$intrasysEmployee = $this->IntrasysEmployees->patchEntity($intrasysEmployee, $this->request->data);
    		$intrasysEmployee->set('activation_status', 'Activated');
    		if ($this->IntrasysEmployees->save($intrasysEmployee)) {
    			$this->Flash->success(__('The intrasys employee has been saved.'));

                //$this->loadComponent('Logging');
                //$this->Logging->log($intrasysEmployee['id']);
                $this->Logging->iLog(null, $intrasysEmployee['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The intrasys employee could not be saved. Please, try again.'));
        }
        $intrasysEmployeeRoles = $this->IntrasysEmployees->IntrasysEmployeeRoles->find('list', ['limit' => 200]);
        $this->set(compact('intrasysEmployee', 'intrasysEmployeeRoles'));
        $this->set('_serialize', ['intrasysEmployee']);
    }

    public function add(){

    	$this->loadComponent('Generator');

    	$intrasysEmployee = $this->IntrasysEmployees->newEntity();
    	if ($this->request->is('post')) {
    		$intrasysEmployee = $this->IntrasysEmployees->patchEntity($intrasysEmployee, $this->request->data);
    		$intrasysEmployee->set('username', $this->Generator->generateString());
    		$this->password = $this->Generator->generateString();
    		$intrasysEmployee->set('password', $this->password);
    		$intrasysEmployee->set('activation_status', 'Deactivated');
    		$intrasysEmployee->set('activation_token', $this->Generator->generateString());

            echo $intrasysEmployee['email'].'<br />';
            echo $intrasysEmployee['first_name'].'<br />';
            echo $intrasysEmployee['username'].'<br />';
            echo $this->password.'<br />';
            echo $intrasysEmployee['id'].'<br />';
            echo $intrasysEmployee['activation_token'].'<br />';

            if ($this->IntrasysEmployees->save($intrasysEmployee)) {

                $this->Email->activationEmail(
                    $intrasysEmployee['email'], 
                    $intrasysEmployee['first_name'], 
                    $intrasysEmployee['username'], 
                    $this->password, 
                    $intrasysEmployee['id'], 
                    $intrasysEmployee['activation_token'], 
                    'intrasys-employees');

    			//$this->__sendActivationEmail($intrasysEmployee['id']);
                $this->Flash->success(__('The intrasys employee has been saved.'));

                //$this->loadComponent('Logging');
                //$this->Logging->log($intrasysEmployee['id']);
                $this->Logging->iLog(null, $intrasysEmployee['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The intrasys employee could not be saved. Please, try again.'));
        }
        $intrasysEmployeeRoles = $this->IntrasysEmployees->IntrasysEmployeeRoles->find('list', ['limit' => 200]);
        $this->set(compact('intrasysEmployee', 'intrasysEmployeeRoles'));
        $this->set('_serialize', ['intrasysEmployee']);
    }

    //function has been shifted into EmailComponent
    /*
    function __sendActivationEmail($user_id) {

    	$user = $this->IntrasysEmployees->get($user_id);
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
            'intrasys-employees');

    }
    */

    function activate($id, $token) {


        $intrasysEmployee = $this->IntrasysEmployees->get($id);
        if($intrasysEmployee['activation_status'] == 'Activated'){
        	$this->Flash->success(__('Your account has already been activated.'));
        	return $this->redirect(['action' => 'login']);
        }

        if ($intrasysEmployee && $intrasysEmployee['activation_token'] == $token) {

            $intrasysEmployee->activation_status = 'Activated';
            $intrasysEmployee->activation_token = NULL;
            $this->IntrasysEmployees->save($intrasysEmployee);

            //$this->loadComponent('Logging');
            //$this->Logging->log($intrasysEmployee['id']);
            $this->Logging->iLog(null, $intrasysEmployee['id']);

            $this->Flash->success(__('Your account has been activated.'));
            return $this->redirect(['action' => 'login']);

        }
        $this->Flash->error(__('There is something wrong with the activation link'));
        return $this->redirect(['action' => 'login']);
    }
    /**
     * Edit method
     *
     * @param string|null $id Intrasys Employee id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
    	$intrasysEmployee = $this->IntrasysEmployees->get($id, [
    		'contain' => ['IntrasysEmployeeRoles']
    		]);

        //Getting the session user - ID
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

                //$this->loadComponent('Logging');
                //$this->Logging->log($intrasysEmployee['id']);
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
    public function delete($id = null)
    {
    	$this->request->allowMethod(['post', 'delete']);
    	$intrasysEmployee = $this->IntrasysEmployees->get($id);
    	if ($this->IntrasysEmployees->delete($intrasysEmployee)) {
    		$this->Flash->success(__('The intrasys employee has been deleted.'));

            //$this->loadComponent('Logging');
            //$this->Logging->log($intrasysEmployee['id']);
            $this->Logging->iLog(null, $intrasysEmployee['id']);

        } else {
          $this->Flash->error(__('The intrasys employee could not be deleted. Please, try again.'));
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

public function managerActions($id = null)
{
    $intrasysEmployee = $this->IntrasysEmployees->get($id, [
        'contain' => ['IntrasysEmployeeRoles']
        ]);

    if ($this->request->is(['patch', 'post', 'put'])) {
        $intrasysEmployee = $this->IntrasysEmployees->patchEntity($intrasysEmployee, $this->request->data);
        if ($this->IntrasysEmployees->save($intrasysEmployee)) {
            $this->Flash->success(__('The intrasys employee has been saved.'));

                //$this->loadComponent('Logging'); 
            $this->Logging->iLog(null, $intrasysEmployee['id']);

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The intrasys employee could not be saved. Please, try again.'));
    }
    $intrasysEmployeeRoles = $this->IntrasysEmployees->IntrasysEmployeeRoles->find('list', ['limit' => 200]);
    $this->set(compact('intrasysEmployee', 'intrasysEmployeeRoles'));
    $this->set('_serialize', ['intrasysEmployee']);
}

public function recover(){

   $this->loadComponent('Generator');
   $email = $_POST['email'];
   $query = $this->IntrasysEmployees->find('all', [
      'conditions' => ['email' => $email],
      ]);

   if($query->count() == 0){
      $this->Flash->error(__('Invalid email address'));

      return $this->redirect(['action' => 'login']);
  }

  $row = $query->first();
  $intrasysemployee = $this->IntrasysEmployees->get($row['id']);
  $this->Logging->iLog(null, $intrasysemployee['id']);

  $newPass = $this->Generator->generateString();
  $intrasysemployee->password = $newPass;
  $intrasysemployee->recovery_status = 'Pending';
  $intrasysemployee->recovery_token = $this->Generator->generateString();

  if ($this->IntrasysEmployees->save($intrasysemployee)){

    $this->Email->recoveryEmail(
        $intrasysemployee['email'],
        $intrasysemployee['first_name'], 
        $intrasysemployee['username'], 
        $newPass, 
        $intrasysemployee['id'], 
        $intrasysemployee['recovery_token'], 
        'intrasys-employees');

            /*
    		$email = new Email('default');
    		$email->template('recovery');
    		$email->emailFormat('html');
    		$email->to($intrasysemployee['email']);
    		$email->subject('Password Recovery');
    		$email->from('tanyongming90@gmail.com');

    		$email->send($intrasysemployee['first_name'] . ',' .
    			$intrasysemployee['username'] . ',' .
    			$newPass . ',' .
    			env('SERVER_NAME') . ',' . 
    			$intrasysemployee['id'] . ',' . 
    			$intrasysemployee['recovery_token'] . ',' .   
                'intrasys-employees');
            */

                $this->Flash->success(__('Password Reset Email Sent, please check your email.'));
                return $this->redirect(['action' => 'login']);
            }

        }

        public function recoverActivate($id, $token){

           $intrasysEmployee = $this->IntrasysEmployees->get($id);
           if($intrasysEmployee['recovery_status'] == NULL){
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

        //$this->loadComponent('Logging'); 
       $this->Logging->iLog(null, $session->read('employee_id'));

       return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'main'));
   }
}
