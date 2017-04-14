<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Reports Controller
 *
 * @property \App\Model\Table\ReportsTable $Reports
 */
class ReportsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        $this->loadComponent('Logging');   
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->loadComponent('Prg');
        $this->Prg->commonProcess();
        $this->paginate = [
        'contain' => ['RetailerEmployees']
        ];
        $this->set('reports', $this->paginate($this->Reports->find('searchable', $this->Prg->parsedParams())));
        $this->set(compact('reports'));
        $this->set('_serialize', ['reports']);
    }
    public $components = array(
        'Prg'
        );

    /**
     * View method
     *
     * @param string|null $id Report id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $report = $this->Reports->get($id, [
            'contain' => ['RetailerEmployees']
            ]);

        $this->set('report', $report);
        $this->set('_serialize', ['report']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $report = $this->Reports->newEntity();
        if ($this->request->is('post')) {

            if (isset($_POST['generate_button'])) {
                $report = $this->Reports->patchEntity($report, $this->request->data);

                $entity = $report['entity2'];
            } 
            else {

                if (isset($_POST['save_button'])) {
                    $report = $this->Reports->patchEntity($report, $this->request->data);

                    $session = $this->request->session();
                    //get employee id
                    $report['retailer_employee_id'] = $_SESSION['Auth']['User']['id'];
                    $report['status'] = 'Pending';

                    if ($this->Reports->save($report)) {
                        $this->Flash->success(__('The incident report has been saved.'));

                        $retailer = $session->read('retailer');

                        //$this->loadComponent('Logging');
                        $this->Logging->rLog($report['id']);
                        $this->Logging->iLog($retailer, $report['id']);

                        return $this->redirect(['action' => 'index']);
                    }
                } else {
                    $this->Flash->error(__('The incident report could not be saved. Please, try again.'));
                }
            }
        }
        $this->set(compact('report', 'entity'));
        $this->set('_serialize', ['report']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Report id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $report = $this->Reports->get($id, [
            'contain' => []
            ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $report = $this->Reports->patchEntity($report, $this->request->data);
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The incident report has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($report['id']);
                $this->Logging->iLog($retailer, $report['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The incident report could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->Reports->RetailerEmployees->find('list', ['limit' => 200]);
        $this->set(compact('report', 'retailerEmployees'));
        $this->set('_serialize', ['report']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Report id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $report = $this->Reports->get($id);
        if ($this->Reports->delete($report)) {
            $this->Flash->success(__('The incident report has been deleted.'));

            $session = $this->request->session();
            $retailer = $session->read('retailer');

            //$this->loadComponent('Logging');
            $this->Logging->rLog($report['id']);
            $this->Logging->iLog($retailer, $report['id']);

        } else {
            $this->Flash->error(__('The incident report could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function pendingStatus($id) {

        $report = $this->Reports->get($id);

        $report->status = 'Pending';
        $this->Reports->save($report);

        $session = $this->request->session();
        $retailer = $session->read('retailer');
        $this->Logging->rLog($report['id']);
        $this->Logging->iLog($retailer, $report['id']);

        $this->Flash->success(__('The incident report has a pending status.'));

        return $this->redirect(['action' => 'index']);
    }

    public function resolvedStatus($id) {

        $report = $this->Reports->get($id);

        $report->status = 'Resolved';
        $this->Reports->save($report);

        $session = $this->request->session();
        $retailer = $session->read('retailer');
        $this->Logging->rLog($report['id']);
        $this->Logging->iLog($retailer, $report['id']);

        $this->Flash->success(__('The incident report has a resolved status.'));

        return $this->redirect(['action' => 'index']);
    }

    public function other() {

        $timePeriods = ['Last 12 months', 'Last 12 weeks', '2017 Q1', '2016 Q4', '2016 Q3', '2016 Q2', '2016 Q1'];

        if ($this->request->is('post')) {

            $reportType = $_POST['report'];
            var_dump($reportType);
            if($reportType == "1") {
                return $this->redirect(['action' => 'rusr'] );
            }elseif($reportType == "2") {
                return $this->redirect(['action' => 'rusrnc']);
            }
            elseif($reportType == "3") {
                return $this->redirect(['action' => 'rusrc']);
            }
            elseif($reportType == "4") {
                return $this->redirect(['action' => 'tsmr']);
            }
            elseif($reportType == "5") {
                return $this->redirect(['action' => 'tscr']);
            }else{
               $this->Flash->error(__('The  report could not be generated. Please, try again.'));
               var_dump($reportType);
           }
       }
       $this->set(compact('timePeriods'));
   }

   public function rusr(){

       $retailerEmployeesTable = TableRegistry::get('RetailerEmployees');
       $suppliersTable = TableRegistry::get('Suppliers');
       $customersTable = TableRegistry::get('Customers');
       $employees =  sizeof($retailerEmployeesTable->find()->toArray());
       $suppliers =  sizeof($suppliersTable->find()->toArray());
       $customers =  sizeof($customersTable->find()->toArray());
       $date = date("Y-m-d H:i:s");

       $this->set(compact('employees','customers','suppliers','date'));




     /*$date2 = date("Y-m-00");
     $date3 = date("Y-m-00", strtotime("-". $interval ."months"));
     $interval++;
     $date4 = date("Y-m-00", strtotime("-" .$interval. " months"));

     var_dump($date2);
     var_dump($date3);
     var_dump($date4);

     $employees2 =  sizeof($retailerEmployeesTable->find('all', array('conditions' => array('created <=' => $date, 'created >=' => $date2)))->toArray());
     $employees3 =  sizeof($retailerEmployeesTable->find('all', array('conditions' => array('created <=' => $date2, 'created >=' => $date3)))->toArray());
     $employees4 =  sizeof($retailerEmployeesTable->find('all', array('conditions' => array('created <=' => $date3, 'created >=' => $date4)))->toArray());
     var_dump($employees2);
     var_dump($employees3);
     var_dump($employees4);*/

 }
 public function rusrnc(){
    $retailerEmployeesTable = TableRegistry::get('RetailerEmployees');
    $suppliersTable = TableRegistry::get('Suppliers');
    $customersTable = TableRegistry::get('Customers');
    $date = date("Y-m-d H:i:s");
    $date2 = date("Y-m-00");

    $emparray[] = sizeof($retailerEmployeesTable->find('all', array('conditions' => array('created <=' => $date, 'created >=' => $date2)))->toArray());
    $supparray[] = sizeof($suppliersTable->find('all', array('conditions' => array('created <=' => $date, 'created >=' => $date2)))->toArray());
    $custarray[] = sizeof($customersTable->find('all', array('conditions' => array('created <=' => $date, 'created >=' => $date2)))->toArray());
    $timeInterval[] = date('M');
    


    $interval = 0;
    while($interval<11){

        $date3 = date("Y-m-00", strtotime("-". $interval ."months"));
        $date4 = date("Y-m-00", strtotime("-". $interval-1 ."months"));
        array_unshift($emparray, sizeof($retailerEmployeesTable->find('all', array('conditions' => array('created <=' => $date3, 'created >=' => $date4)))->toArray()));
        array_unshift($supparray, sizeof($suppliersTable->find('all', array('conditions' => array('created <=' => $date3, 'created >=' => $date4)))->toArray()));
        array_unshift($custarray,  sizeof($customersTable->find('all', array('conditions' => array('created <=' => $date3, 'created >=' => $date4)))->toArray()));
        $timeInterval[] = date('M', strtotime("-". $interval-1 ."months"));



        $interval++;
    }
    

    $this->set(compact('emparray','supparray','custarray','timeInterval'));
}
public function rusrc(){
    $retailerEmployeesTable = TableRegistry::get('RetailerEmployees');
    $suppliersTable = TableRegistry::get('Suppliers');
    $customersTable = TableRegistry::get('Customers');
    $date = date("Y-m-d H:i:s");
    $date2 = date("Y-m-00");

    $emparray[] = sizeof($retailerEmployeesTable->find('all', array('conditions' => array('created <=' => $date)))->toArray());
    $supparray[] = sizeof($suppliersTable->find('all', array('conditions' => array('created <=' => $date)))->toArray());
    $custarray[] = sizeof($customersTable->find('all', array('conditions' => array('created <=' => $date)))->toArray());
    $timeInterval[] = date('M');

    
    $interval = 0;
    while($interval<11){


        $date3 = date("Y-m-00", strtotime("-". $interval ."months"));
        $date4 = date("Y-m-00", strtotime("-". $interval-1 ."months"));
        array_unshift($emparray, sizeof($retailerEmployeesTable->find('all', array('conditions' => array('created <=' => $date3)))->toArray()));
        array_unshift($supparray, sizeof($suppliersTable->find('all', array('conditions' => array('created <=' => $date3)))->toArray()));
        array_unshift($custarray,  sizeof($customersTable->find('all', array('conditions' => array('created <=' => $date3)))->toArray()));
        $timeInterval[] = date('M', strtotime("-". $interval-1 ."months"));



        $interval++;
    }
    
    
    $this->set(compact('emparray','supparray','custarray','timeInterval'));
}
public function tsmr(){

    $transactionsTable = TableRegistry::get('Transactions');
    $date = date("Y-m-d H:i:s");
    $date2 = date("Y-m-00");

    $transarray[] = sizeof($transactionsTable->find('all', array('conditions' => array('created <=' => $date, 'created >=' => $date2)))->toArray());
    $timeInterval[] = date('M');
    


    $interval = 0;
    while($interval<11){

        $date3 = date("Y-m-00", strtotime("-". $interval ."months"));
        $date4 = date("Y-m-00", strtotime("-". $interval-1 ."months"));
        array_unshift($transarray, sizeof($transactionsTable->find('all', array('conditions' => array('created <=' => $date3, 'created >=' => $date4)))->toArray()));

        $timeInterval[] = date('M', strtotime("-". $interval-1 ."months"));

        $interval++;
    }
    

    $this->set(compact('transarray','timeInterval'));
}
public function tscr(){
    $transactionsTable = TableRegistry::get('Transactions');
    $date = date("Y-m-d H:i:s");
    $date2 = date("Y-m-00");

    $transarray[] = sizeof($transactionsTable->find('all', array('conditions' => array('created <=' => $date)))->toArray());
    $timeInterval[] = date('M');

    
    $interval = 0;
    while($interval<11){

        $date3 = date("Y-m-00", strtotime("-". $interval ."months"));
        $date4 = date("Y-m-00", strtotime("-". $interval-1 ."months"));
        array_unshift($transarray, sizeof($transactionsTable->find('all', array('conditions' => array('created <=' => $date3)))->toArray()));
        $timeInterval[] = date('M', strtotime("-". $interval-1 ."months"));

        $interval++;
    }
    
    
   $this->set(compact('transarray','timeInterval'));

}
}

