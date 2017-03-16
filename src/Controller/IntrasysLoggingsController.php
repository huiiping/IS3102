<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use PHPExcel_Reader_HTML;
use PHPExcel_IOFactory;
use PHPExcel_Writer_HTML;
use PHPExcel;

/**
 * IntrasysLoggings Controller
 *
 * @property \App\Model\Table\IntrasysLoggingsTable $IntrasysLoggings
 */
class IntrasysLoggingsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);        
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
            'contain' => ['Retailers']
        ];
       // $intrasysLoggings = $this->paginate($this->IntrasysLoggings);
        $this->set('intrasysLoggings', $this->paginate($this->IntrasysLoggings->find('searchable', $this->Prg->parsedParams())));
        $this->set(compact('intrasysLoggings'));
        $this->set('_serialize', ['intrasysLoggings']);
    }

    public $components = array(
        'Prg'
    );

    /**
     * View method
     *
     * @param string|null $id Intrasys Logging id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $intrasysLogging = $this->IntrasysLoggings->get($id, [
            'contain' => ['Retailers']
        ]);

        $session = $this->request->session();
        $retailer = $session->read('retailer');
        //$this->loadComponent('Logging');
        //$this->Logging->rLog($intrasysLogging['id']);
        $this->Logging->iLog($retailer, $intrasysLogging['id']);

        $this->set('intrasysLogging', $intrasysLogging);
        $this->set('_serialize', ['intrasysLogging']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $intrasysLogging = $this->IntrasysLoggings->newEntity();
        if ($this->request->is('post')) {
            $intrasysLogging = $this->IntrasysLoggings->patchEntity($intrasysLogging, $this->request->data);
            if ($this->IntrasysLoggings->save($intrasysLogging)) {
                $this->Flash->success(__('The intrasys logging has been saved.'));

                //$this->loadComponent('Logging');
                //$this->Logging->rLog($intrasysLogging['id']);
                $this->Logging->iLog($retailer, $intrasysLogging['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The intrasys logging could not be saved. Please, try again.'));
        }
        $retailers = $this->IntrasysLoggings->Retailers->find('list', ['limit' => 200]);
        $this->set(compact('intrasysLogging', 'retailers'));
        $this->set('_serialize', ['intrasysLogging']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Intrasys Logging id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $intrasysLogging = $this->IntrasysLoggings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $intrasysLogging = $this->IntrasysLoggings->patchEntity($intrasysLogging, $this->request->data);
            if ($this->IntrasysLoggings->save($intrasysLogging)) {
                $this->Flash->success(__('The intrasys logging has been saved.'));

                //$this->loadComponent('Logging');
                //$this->Logging->rLog($intrasysLogging['id']);
                $this->Logging->iLog($retailer, $intrasysLogging['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The intrasys logging could not be saved. Please, try again.'));
        }
        $retailers = $this->IntrasysLoggings->Retailers->find('list', ['limit' => 200]);
        $this->set(compact('intrasysLogging', 'retailers'));
        $this->set('_serialize', ['intrasysLogging']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Intrasys Logging id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $intrasysLogging = $this->IntrasysLoggings->get($id);
        if ($this->IntrasysLoggings->delete($intrasysLogging)) {
            $this->Flash->success(__('The intrasys logging has been deleted.'));

            //$this->loadComponent('Logging');
            //$this->Logging->rLog($intrasysLogging['id']);
            $this->Logging->iLog($retailer, $intrasysLogging['id']);
            
        } else {
            $this->Flash->error(__('The intrasys logging could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function export() {
        
        $this->response->download('intrasyslog_'.date("d-m-y:h:s").'.csv');
        $data = $this->IntrasysLoggings->find('all')->toArray();
        $_serialize = 'data';
        $_header = ['ID', 'Retailer ID', 'Action', 'Entity', 'Entity ID', 'Employee ID', 'Created'];
        //$_extract = ['id', 'action', 'entity'];
        //$this->set(compact('data', '_serialize', '_header', '_extract'));
        $this->set(compact('data', '_serialize', '_header'));
        $this->viewBuilder()->className('CsvView.Csv');
        return;
    }

    public function test() {

        $inputFileName = 'C:\xampp\htdocs\IS3102_Final\src\purchase-order.xlsx';

        /** Load $inputFileName to a PHPExcel Object  **/
        // $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
        // $objPHPExcel->getSheet(0);

        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
        $objPHPExcel->getSheet(0);

        // $objWriter = new PHPExcel_Writer_HTML($objPHPExcel);
        // $objWriter->setUseBOM(true);

        // $objWriter->save($objPHPExcel);
        //$this->set('objPHPExcel', $objWriter);


    }

    public function xls($id, $output_type = 'D', $file = 'my_spreadsheet.xlsx') {
        //$user = $this->Users->get($id);
        $this->set(compact('output_type', 'file'));
        $this->viewBuilder()->layout('xls/default');
        $this->viewBuilder()->template('xls/spreadsheet_user');
        $this->RequestHandler->respondAs('xlsx');
        $this->render();
    }
}
