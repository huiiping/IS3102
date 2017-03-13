<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Auth\DefaultPasswordHasher;
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
        $this->loadComponent('Email');
    }

    public function index()
    {
        //$retailers = $this->paginate($this->Retailers);

        $this->loadComponent('Prg');
        $this->Prg->commonProcess();
        $this->paginate = [
            'contain' => ['RetailerAccTypes', 'RetailerLoyaltyPoints']
        ];
        $this->set('retailers', $this->paginate($this->Retailers->find('searchable', $this->Prg->parsedParams())));
        $this->set('retailerLoyaltyPoints', $this->Retailers->RetailerLoyaltyPoints);
        $this->set(compact('retailers', 'retailerLoyaltyPoints'));
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

                $this->loadComponent('Generator');
                
                $user = $this->Generator->generateString();
                $pass = $this->Generator->generateString();
                $hasher = new DefaultPasswordHasher();
                $hashedPass = $hasher->hash($pass);

                $token = $this->Generator->generateString();

                

                $sql = "INSERT INTO Retailer_employees (username, first_name, last_name, password, activation_status, activation_token, email, address, contact, created, modified)  
                VALUES (
                '$user',
                '$companyName',
                '$companyName',
                '$hashedPass',
                'Deactivated',
                '$token',
                '$companyEmail',
                '$companyAddress',
                '$companyContact',
                '$created',
                '$modified'
                )";
                
                $this->Email->retailerEmployeeActivationEmail(
                        $companyEmail, 
                        $companyName, 
                        $user, 
                        $pass, 
                        1, 
                        $token,  
                        'retailer-employees',
                        $database
                        );
                
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
