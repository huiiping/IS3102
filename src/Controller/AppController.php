<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');      

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');

        //Setting the database connection
        $session = $this->request->session();
        $database = $session->read('database');
        //$session->destroy();
        //debugger::dump($database);
        if ($database != NULL) {
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
        }


    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event) {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
            ) {
            $this->set('_serialize', true);
    }

        //check login
    if($this->request->session()->read('Auth.User')){
        $this->set('loggedIn', true);
    } else {
        $this->set('loggedIn', false);
    }

        //check database
    if($this->request->session()->read('database') == null){
        $this->set('intrasys', true);
    } else {
        $this->set('intrasys', false);
        $db = $this->request->session()->read('database');
            $this->set('dbName', $db); //store database name
        }

        //check user type --> supplier
        if($this->request->session()->read('supplier')){
            $this->set('type', true);
        } else {
            $this->set('type', false);
        }
    }

    
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        //Debugger::dump(['IN Before Filter NOW']);
        //Retrieve & check User's role
        $user = $this->request->session()->read('Auth.User');

        //Controller Name
        $controllerName = $this->request->params['controller'];
        //Function Name
        $methodName = $this->request->params['action'];
        //Previous Page 
        $previousPage = $this->referer();

        //Reading the database
        $session = $this->request->session();
        $database = $session->read('database');
        //debugger::dump($database);
        //Debugger::dump($user);

        /*if($user['account_status'] == 'deactivated' || $user['account_status'] == 'banned' ){
            $this->Flash->error(__('Your account is '.$user['account_status']));
            $user = null;
            Debugger::dump($user);
            //return $this->redirect($this->Auth->logout());
        } */

        if($user != null && $database == null) {
            //echo("INTRASYS EMPLOYEES");
           $IntrasysEmployeeRoles = TableRegistry::get('IntrasysEmployeesIntrasysEmployeeRoles');
           $allRoles = $IntrasysEmployeeRoles
           ->find()
           ->where(['intrasys_employee_id' => $user['id']])
           ->extract('intrasys_employee_role_id');

           foreach ($allRoles as $intrasysEmployeeRole) {
                //echo "IER: ".$intrasysEmployeeRole;
                //echo "Controller: ".$controllerName;
                //echo "Method: ".$methodName;
                //echo "From Page: ".$previousPage;

            //MUST ENSURE THAT IN THE INTRASYS DATABASE THE ID STARTS FROM 1
            if($intrasysEmployeeRole == '1' ){
                if($controllerName == 'Retailers'){
                            //is there going to be a search function? || $methodName == 'search')
                    if($methodName == 'index' || $methodName == 'view') {
                        return;
                    }
                }
            }

            if($intrasysEmployeeRole == '2'){
                if($controllerName == 'Retailers'){
                    return;
                }
            }

            if($intrasysEmployeeRole == '3'){
                if($controllerName == 'Retailers'){
                    if($methodName == 'index' || $methodName == 'add' || $methodName == 'edit') {
                        return;
                    }
                }   
            } 

            if($intrasysEmployeeRole == '4'){
                if($controllerName == 'Announcements'){ 
                    return;
                }
            }

            if($intrasysEmployeeRole == '5'){
                if($controllerName == 'Announcements'){
                        //is there going to be a search function?
                    if($methodName == 'index' || $methodName == 'view'){
                        return;
                    }
                }
            }

            if($intrasysEmployeeRole == '6'){
                if($controllerName == 'IntrasysEmployees'){
                    return;
                }
            }


            if($intrasysEmployeeRole == '7'){
                if($controllerName == 'IntrasysEmployees'){
                    if($methodName == 'index' || $methodName == 'edit' || $methodName == 'view'){
                        return;
                    }
                }
            }

            if($intrasysEmployeeRole == '8'){
                if($controllerName == 'IntrasysEmployees'){
                        //is there going to be a search function?
                  if($methodName == 'index' || $methodName == 'view'){
                    return;
                }
            }
        }

        if($intrasysEmployeeRole == '9'){
            if($controllerName == 'IntrasysEmployeeRoles'){
                if($methodName == 'index' || $methodName == 'view'){
                    return;
                }
            }
        }

        if($intrasysEmployeeRole == '10'){
            return;
        }

        if($intrasysEmployeeRole == '11'){
            if($controllerName == 'IntrasysLoggings'){
                return;
            }
        }


        if($intrasysEmployeeRole == '12'){
            if($controllerName == 'RetailerAccTypes'){
                if($methodName == 'index' || $methodName == 'view'){
                    return;
                }
            }
        }

        if($intrasysEmployeeRole == '13'){
            if($controllerName == 'RetailerAccTypes'){
                return;
            }
        }

        if($intrasysEmployeeRole == '14'){
            if($controllerName == 'RetailerLoyaltyPoints'){
                return;
            }
        }

        if($intrasysEmployeeRole == '15'){
            if($controllerName == 'RetailerLoyaltyPoints'){
                if($methodName == 'index' || $methodName == 'view'){
                    return;
                }
            }
        }

        if($controllerName == 'IntrasysEmployees' && $methodName == 'logout'){
            return;
        }
    }

    if($controllerName != 'Pages' && $methodName != 'display') {
        $this->Flash->error(__('You are not authorized to access that function.'));
        return $this->redirect($this->referer()); 
    }

                //break; 

    return;
} else if ($database != null) {
        /*$RetailerEmployeeRoles = TableRegistry::get('IntrasysEmployeesIntrasysEmployeeRoles');
            $allRoles = $IntrasysEmployeeRoles
                    ->find()
                    ->where(['intrasys_employee_id' => $user['id']])
                    ->extract('intrasys_employee_role_id');

            foreach ($allRoles as $intrasysEmployeeRole) {
                echo "IER: ".$intrasysEmployeeRole;
                echo "Controller: ".$controllerName;
                echo "Method: ".$methodName;
                echo "From Page: ".$previousPage;*/
            //echo("RETAILER EMPLOYEES");

                $RetailerEmployeeRoles = TableRegistry::get('RetailerEmployeesRetailerEmployeeRoles');
                $allRoles = $RetailerEmployeeRoles
                ->find()
                ->where(['retailer_employee_id' => $user['id']])
                ->extract('retailer_employee_role_id');

                foreach ($allRoles as $retailerEmployeeRole) {
                //echo "IER: ".$retailerEmployeeRole;
                //echo "Controller: ".$controllerName;
                //echo "Method: ".$methodName;
                //echo "From Page: ".$previousPage;

            //MUST ENSURE THAT IN THE INTRASYS DATABASE THE ID STARTS FROM 1
                //Employee Roles User
                    if($retailerEmployeeRole == '1' ){
                        if($controllerName == 'RetailerEmployeeRoles'){
                            if($methodName == 'index' || $methodName == 'view') {
                                return;
                            }
                        }
                    }
                //Employee Accounts Manager
                    if($retailerEmployeeRole == '2'){
                        if($controllerName == 'RetailerEmployees'){
                            return;
                        }
                    }
                //Employee Accounts Admin
                    if($retailerEmployeeRole == '3'){
                        if($controllerName == 'RetailerEmployees'){
                            if($methodName == 'index' || $methodName == 'add' || $methodName == 'edit') {
                                return;
                            }
                        }   
                    }
                //Normal User
                    if($retailerEmployeeRole == '4'){
                        if($controllerName == 'RetailerEmployees'){
                            if($methodName == 'index' || $methodName == 'edit' || $methodName == 'view') {
                                return;
                            }
                        }   
                    }
                //Employee Accounts User
                    if($retailerEmployeeRole == '5'){
                        if($controllerName == 'RetailerEmployees'){
                            if($methodName == 'index' || $methodName == 'view') {
                                return;
                            }
                        }
                    }
                //Company Info Admin
                    if($retailerEmployeeRole == '6'){
                        if($controllerName == 'RetailerDetails'){
                            return;
                        }
                    }
                //Customers Membership Manager
                    if($retailerEmployeeRole == '7'){
                        if($controllerName == 'CustMembershipTiers'){
                            return;
                        }
                    }
                //Customers Membership User    
                    if($retailerEmployeeRole == '8'){
                        if($controllerName == 'CustMembershipTiers'){
                            if($methodName == 'index' || $methodName == 'view'){
                                return;
                            }
                        }
                    }
                //Customers User
                    if($retailerEmployeeRole == '9'){
                        if($controllerName == 'Customers'){
                          if($methodName == 'index' || $methodName == 'view'){
                            return;
                        }
                    }
                }
                //Product Types Manager
                if($retailerEmployeeRole == '10'){
                    if($controllerName == 'ProdTypes'){
                        return;
                    }
                }
                //Product Types Admin
                if($retailerEmployeeRole == '11'){
                    if($controllerName == 'ProdTypes'){
                      if($methodName == 'index' || $methodName == 'add' || $methodName == 'edit'){
                        return;
                    }
                }
            }
                //Product Types User
            if($retailerEmployeeRole == '12'){
                if($controllerName == 'ProdTypes'){
                    if($methodName == 'index' || $methodName == 'view'){
                        return;
                    }
                }
            }
                //Product Categories Manager
            if($retailerEmployeeRole == '13'){
                if($controllerName == 'ProdCats'){
                    return;
                }
            }
                //Product Categories Admin
            if($retailerEmployeeRole == '14'){
                if($controllerName == 'ProdCats'){
                  if($methodName == 'index' || $methodName == 'add' || $methodName == 'edit'){
                    return;
                }
            }
        }
                //Product Categories User
        if($retailerEmployeeRole == '15'){
            if($controllerName == 'ProdCats'){
                if($methodName == 'index' || $methodName == 'view'){
                    return;
                }
            }
        }
                //Purchase Orders Manager
        if($retailerEmployeeRole == '16'){
            if($controllerName == 'PurchaseOrders'){
                return;
            }
        }


                //Purchase Orders User
        if($retailerEmployeeRole == '17'){
            if($controllerName == 'PurchaseOrders'){
                if($methodName == 'index' || $methodName == 'view'){
                    return;
                }
            }
        }

                //Purchase Orders Admin
        if($retailerEmployeeRole == '18'){
            if($controllerName == 'PurchaseOrders'){
                if($methodName == 'index' || $methodName == 'add' || $methodName == 'edit'){
                    return;
                }
            }
        }

                //Suppliers Accounts Manager
        if($retailerEmployeeRole == '19'){
            if($controllerName == 'Suppliers'){
                return;
            }
        }

                //Suppliers Accounts User
        if($retailerEmployeeRole == '20'){
            if($controllerName == 'Suppliers'){
                if($methodName == 'index' || $methodName == 'view'){
                    return;
                }
            }
        }

                //Suppliers Accounts Admin
        if($retailerEmployeeRole == '21'){
            if($controllerName == 'Suppliers'){
                if($methodName == 'index' || $methodName == 'add' || $methodName == 'edit'){
                    return;
                }
            }
        }

                //Suppliers Memos Manager
        if($retailerEmployeeRole == '22'){
            if($controllerName == 'SupplierMemos'){
                return;
            }
        }

                //Suppliers Memos User
        if($retailerEmployeeRole == '23'){
            if($controllerName == 'SupplierMemos'){
                if($methodName == 'index' || $methodName == 'view'){
                    return;
                }
            }
        }

                //Suppliers Memos Admin
        if($retailerEmployeeRole == '24'){
            if($controllerName == 'SupplierMemos'){
                if($methodName == 'index' || $methodName == 'add' || $methodName == 'edit'){
                    return;
                }
            }
        }

                //Supplier
        if($retailerEmployeeRole == '25'){
            if($controllerName == 'Suppliers'){
                if($methodName == 'index' || $methodName == 'edit'){
                    return;
                }
            }
        }

                //Promotional Schemes Manager
        if($retailerEmployeeRole == '26'){
            if($controllerName == 'Promotions'){
                return;
            }
        }

                //Promotional Schemes User
        if($retailerEmployeeRole == '27'){
            if($controllerName == 'Promotions'){
                if($methodName == 'index' || $methodName == 'view'){
                    return;
                }
            }
        }

                //Promotional Schemes Admin
        if($retailerEmployeeRole == '28'){
            if($controllerName == 'Promotions'){
                if($methodName == 'index' || $methodName == 'add' || $methodName == 'edit'){
                    return;
                }
            }
        }
                /*Wait for YM to bake promotional email table
                //Promotional Email Manager
                if($retailerEmployeeRole == '29'){
                    if($controllerName == 'XX'){
                            return;
                        }
                    }
                
                //Promotional Email User
                if($retailerEmployeeRole == '30'){
                    if($controllerName == 'XX'){
                        if($methodName == 'index' || $methodName == 'view'){
                            return;
                        }
                    }
                }

                //Promotional Email Admin
                if($retailerEmployeeRole == '31'){
                    if($controllerName == 'XX'){
                        if($methodName == 'index' || $methodName == 'add' || $methodName == 'edit'){
                            return;
                        }
                    }
                }*/
                //Communications User
                if($retailerEmployeeRole == '32'){
                    if($controllerName == 'Messages'){
                        return;
                    }
                }
                //Warehouse Admin
                if($retailerEmployeeRole == '33'){
                    if($controllerName == 'Sections'){
                        if($methodName == 'index' || $methodName == 'view'){
                            return;
                        }
                    }
                }
                //Warehouse Layouts Manager
                if($retailerEmployeeRole == '34'){
                    if($controllerName == 'Sections'){
                        return;
                    }
                }
                //Master Account
                if($retailerEmployeeRole == '35'){
                    return;
                }
                //Loggings
                if($retailerEmployeeRole == '36'){
                    if($controllerName == 'RetailerLoggings'){
                        return;
                    }
                }
                //Locations Admin
                if($retailerEmployeeRole == '37'){
                    if($controllerName == 'Locations'){
                        if($methodName == 'index' || $methodName == 'add' || $methodName == 'edit'){
                            return;
                        }
                    }
                }
                //Locations Manager
                if($retailerEmployeeRole == '38'){
                    if($controllerName == 'Locations'){
                        return;
                    }
                }
                //Locations User
                if($retailerEmployeeRole == '39'){
                    if($controllerName == 'Locations'){
                        if($methodName == 'index' || $methodName == 'view'){
                            return;
                        }
                    }
                }
                

                if($controllerName != 'Pages' && $methodName != 'display') {
                    $this->Flash->error(__('You are not authorized to access that function.'));
                    return $this->redirect($this->referer()); 
                }

                break; 
            }
            return;


        }
    }

}
