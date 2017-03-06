<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\Error\Debugger;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;

/**
 * Retailers Controller
 *
 * @property \App\Model\Table\RetailersTable $Retailers
 */
class RetailersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadcomponent('DbSchema');
        $this->loadComponent('Logging');
    }

    public function index()
    {
        //$retailers = $this->paginate($this->Retailers);

        $this->loadComponent('Prg');
        $this->Prg->commonProcess();
        $this->paginate = [
            'contain' => ['RetailerAccTypes']
        ];
        $this->set('retailers', $this->paginate($this->Retailers->find('searchable', $this->Prg->parsedParams())));
        $this->set(compact('retailers'));
        $this->set('_serialize', ['retailers']);
    }
    public $components = array(
        'Prg'
    );

    /**
     * View method
     *
     * @param string|null $id Retailer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retailer = $this->Retailers->get($id, [
            'contain' => ['RetailerAccTypes']
        ]);

        //$session = $this->request->session();
        //$retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        //$this->Logging->log($retailer['id']);
        $this->Logging->iLog(null, $retailer['id']);

        $this->set('retailer', $retailer);
        $this->set('_serialize', ['retailer']);
    }

    public function account($id = null)
    {
        $retailer = $this->Retailers->get($id, [
            'contain' => ['RetailerAccTypes']
        ]);

        //$session = $this->request->session();
        //$retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        //$this->Logging->log($retailer['id']);
        $this->Logging->iLog(null, $retailer['id']);

        $this->set('retailer', $retailer);
        $this->set('_serialize', ['retailer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retailer = $this->Retailers->newEntity();
        if ($this->request->is('post')) {
            $retailer = $this->Retailers->patchEntity($retailer, $this->request->data);
            if ($this->Retailers->save($retailer)) {
                $this->Flash->success(__('The retailer has been saved.'));

                //$session = $this->request->session();
                //$retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                //$this->Logging->log($retailer['id']);
                $this->Logging->iLog(null, $retailer['id']);

                //Create new database for new retailer with tables
                //Use the 'default' connection to create a new database
                $conn = ConnectionManager::get('default');
                $database = $retailer->retailer_name."db";
                $conn->query("Create Database $database");

                //TODO:UPDATE the commands accordingly to the OS
                $scriptpath = $this->DbSchema->SCHEMA_FOLDER . "retailerdb_For 1SR_Latest.txt";
                exec("C:/xampp/mysql/bin/mysql -uroot -pjoy -D$database < \"$scriptpath\"");
                //---------------------------------------------------*/

                $this->retailerActivities($database,$retailer);
                
            }
        }
        $retailerAccTypes = $this->Retailers->RetailerAccTypes->find('list', ['limit' => 200]);
        $this->set(compact('retailer', 'retailerAccTypes'));
        $this->set('_serialize', ['retailer']);
    }

    public function add2(){

        $this->loadComponent('Generator');

        $retailer = $this->Retailers->newEntity();
        if ($this->request->is('post')) {
            $retailer = $this->Retailers->patchEntity($retailer, $this->request->data);
            $retailer->set('username', $this->Generator->generateString());
            $this->password = $this->Generator->generateString();
            $retailer->set('password', $this->password);
            $retailer->set('activation_status', 'Deactivated');
            $retailer->set('activation_token', $this->Generator->generateString());


            if ($this->Retailers->save($retailer)) {

                $this->__sendActivationEmail($retailer['id']);
                $this->Flash->success(__('The retailer has been saved.'));

                //$this->loadComponent('Logging');
                //$this->Logging->log($intrasysEmployee['id']);
                $this->Logging->iLog(null, $retailer['id']);
                $conn = ConnectionManager::get('default');
                $database = $retailer->retailer_name."db";
                $conn->query("Create Database $database");

                //TODO:UPDATE the commands accordingly to the OS
                $scriptpath = $this->DbSchema->SCHEMA_FOLDER . "retailerdb_For 1SR_Latest.txt";
                exec("C:/xampp/mysql/bin/mysql -uroot -pjoy -D$database < \"$scriptpath\"");
                //---------------------------------------------------*/

                $this->retailerActivities($database,$retailer);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer could not be saved. Please, try again.'));
        }
       $retailerAccTypes = $this->Retailers->RetailerAccTypes->find('list', ['limit' => 200]);
        $this->set(compact('retailer', 'retailerAccTypes'));
        $this->set('_serialize', ['retailer']);
    }

    function __sendActivationEmail($user_id) {

        $user = $this->Retailer->get($user_id);
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
            'retailers');

    }

    function activate($id, $token) {


        $retailer = $this->Retailer->get($id);
        if($retailer['activation_status'] == 'Activated'){
            $this->Flash->success(__('Your account has already been activated.'));
            return $this->redirect(['action' => 'index']);
        }

        if ($retailer && $retailer['activation_token'] == $token) {

            $retailer->activation_status = 'Activated';
            $retailer->activation_token = NULL;
            $this->Retailer->save($retailer);

            //$this->loadComponent('Logging');
            //$this->Logging->log($intrasysEmployee['id']);
            $this->Logging->iLog(null, $retailer['id']);

            $this->Flash->success(__('Your account has been activated.'));
            return $this->redirect(['action' => 'index']);

        }
        $this->Flash->error(__('There is something wrong with the activation link'));
        return $this->redirect(['action' => 'index']);
    }
    public function retailerActivities($database,$retailer){
                //TODO:UPDATE the commands accordingly to the OS
                //Add retailer roles in the retailer employee roles table
                $scriptpath = $this->DbSchema->SCHEMA_FOLDER . "Retailer_Employee_Roles_AccessRights.sql";
                exec("C:/xampp/mysql/bin/mysql -uroot -pjoy -D$database < \"$scriptpath\"");
                //---------------------------------------------------*/

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
                Debugger::dump('ADDRETAILER- DATABASENAME');
                Debugger::dump($database);
                Debugger::dump($retailer['retailer_name']);
                $companyID = $retailer['id'];
                $companyName = $retailer['retailer_name'];
                $companyEmail = $retailer['retailer_email'];
                $companyAddress = $retailer['address'];
                $companyContact = $retailer['contact'];
                $companyDesc = $retailer['retailer_desc'];
                $created = $retailer['created'];
                $modified = $retailer['modified'];

                $conn = ConnectionManager::get('conn1');
                //To Do: Ask glenn to do the auto generation of username and password and activation link & changing of activation status to 'activated'
                $sql = "INSERT INTO Retailer_employees (username, password, created, modified)  
                VALUES ('$companyName','123','$created','$modified')";
                //Add 'Master Account' role to the master account
                $sql2 = "INSERT INTO Retailer_employees_retailer_employee_roles (retailer_employee_id, retailer_employee_role_id) VALUES ('1', '35')";
                //Information in retailer table in intrasys DB will be copied to retailer_details in the retailer DB
                $sql3 = "INSERT INTO Retailer_details (address, contact, retailerid, retailer_desc, retailer_email, retailer_name) VALUES ('$companyAddress', '$companyContact', '$companyID', '$companyDesc', '$companyEmail', '$companyName')";

                $conn->query($sql);
                $conn->query($sql2);
                $conn->query($sql3);

                return $this->redirect(['action' => 'index']);
            
            $this->Flash->error(__('The retailer could not be saved. Please, try again.'));
            $this->set(compact('retailer'));
            $this->set('_serialize', ['retailer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retailer id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retailer = $this->Retailers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retailer = $this->Retailers->patchEntity($retailer, $this->request->data);
            if ($this->Retailers->save($retailer)) {
                $this->Flash->success(__('The retailer has been saved.'));

                //$session = $this->request->session();
                //$retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                //$this->Logging->log($retailer['id']);
                $this->Logging->iLog(null, $retailer['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer could not be saved. Please, try again.'));
        }
        $retailerAccTypes = $this->Retailers->RetailerAccTypes->find('list', ['limit' => 200]);
        $this->set(compact('retailer', 'retailerAccTypes'));
        $this->set('_serialize', ['retailer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retailer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retailer = $this->Retailers->get($id);
        if ($this->Retailers->delete($retailer)) {
            $this->Flash->success(__('The retailer has been deleted.'));

            //$session = $this->request->session();
            //$retailer = $session->read('retailer');

            //$this->loadComponent('Logging');
            //$this->Logging->log($retailer['id']);
            $this->Logging->iLog(null, $retailer['id']);
            
        } else {
            $this->Flash->error(__('The retailer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function activateStatus($id) {

        $retailer = $this->Retailers->get($id);

        $retailer->account_status = 'Activated';
        $this->Retailers->save($retailer);

        $this->Flash->success(__('The retailer has been activated.'));

        return $this->redirect(['action' => 'view/'.$id]);
    }

    public function deactivateStatus($id) {

        $retailer = $this->Retailers->get($id);

        $retailer->account_status = 'Deactivated';
        $this->Retailers->save($retailer);

        $this->Flash->success(__('The retailer has been deactivated.'));

        return $this->redirect(['action' => 'view/'.$id]);

    }

}
