<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * RetailerLoggings Controller
 *
 * @property \App\Model\Table\RetailerLoggingsTable $RetailerLoggings
 */
class RetailerLoggingsController extends AppController
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
        $this->set('retailerLoggings', $this->paginate($this->RetailerLoggings->find('searchable', $this->Prg->parsedParams())->order(['RetailerLoggings.created' => 'DESC'])));
        $this->set(compact('retailerLoggings'));
        $this->set('_serialize', ['retailerLoggings']);
    }
    public $components = array(
        'Prg'
    );


    /**
     * View method
     *
     * @param string|null $id Retailer Logging id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retailerLogging = $this->RetailerLoggings->get($id, [
            'contain' => ['RetailerEmployees']
        ]);


        $session = $this->request->session();
        $retailer = $session->read('retailer');
        //$this->loadComponent('Logging');
        $this->Logging->rLog($retailerLogging['id']);
        $this->Logging->iLog($retailer, $retailerLogging['id']);

        $this->set('retailerLogging', $retailerLogging);
        $this->set('_serialize', ['retailerLogging']);
    }

    // /**
    //  * Add method
    //  *
    //  * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
    //  */
    // public function add()
    // {
    //     $retailerLogging = $this->RetailerLoggings->newEntity();
    //     if ($this->request->is('post')) {
    //         $retailerLogging = $this->RetailerLoggings->patchEntity($retailerLogging, $this->request->data);
    //         if ($this->RetailerLoggings->save($retailerLogging)) {
    //             $this->Flash->success(__('The retailer logging has been saved.'));

    //             //$this->loadComponent('Logging');
    //             $this->Logging->rLog($retailerLogging['id']);
    //             $this->Logging->iLog($retailer, $retailerLogging['id']);

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The retailer logging could not be saved. Please, try again.'));
    //     }
    //     $retailerEmployees = $this->RetailerLoggings->RetailerEmployees->find('list', ['limit' => 200]);
    //     $this->set(compact('retailerLogging', 'retailerEmployees'));
    //     $this->set('_serialize', ['retailerLogging']);
    // }

    // /**
    //  * Edit method
    //  *
    //  * @param string|null $id Retailer Logging id.
    //  * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
    //  * @throws \Cake\Network\Exception\NotFoundException When record not found.
    //  */
    // public function edit($id = null)
    // {
    //     $retailerLogging = $this->RetailerLoggings->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $retailerLogging = $this->RetailerLoggings->patchEntity($retailerLogging, $this->request->data);
    //         if ($this->RetailerLoggings->save($retailerLogging)) {
    //             $this->Flash->success(__('The retailer logging has been saved.'));

    //             //$this->loadComponent('Logging');
    //             $this->Logging->rLog($retailerLogging['id']);
    //             $this->Logging->iLog($retailer, $retailerLogging['id']);

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The retailer logging could not be saved. Please, try again.'));
    //     }
    //     $retailerEmployees = $this->RetailerLoggings->RetailerEmployees->find('list', ['limit' => 200]);
    //     $this->set(compact('retailerLogging', 'retailerEmployees'));
    //     $this->set('_serialize', ['retailerLogging']);
    // }

    // /**
    //  * Delete method
    //  *
    //  * @param string|null $id Retailer Logging id.
    //  * @return \Cake\Network\Response|null Redirects to index.
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $retailerLogging = $this->RetailerLoggings->get($id);
    //     if ($this->RetailerLoggings->delete($retailerLogging)) {
    //         $this->Flash->success(__('The retailer logging has been deleted.'));

    //         //$this->loadComponent('Logging');
    //         $this->Logging->rLog($retailerLogging['id']);
    //         $this->Logging->iLog($retailer, $retailerLogging['id']);
            
    //     } else {
    //         $this->Flash->error(__('The retailer logging could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }

    public function export() {
        
        $session = $this->request->session();
        $retailer = $session->read('retailer');
        $this->response->download($retailer.'log_'.date("d-m-y:h:s").'.csv');
        $data = $this->RetailerLoggings->find('all')->toArray();
        $_serialize = 'data';
        $_header = ['ID', 'Action', 'Entity', 'Entity ID', 'Employee ID', 'Created'];
        //$_extract = ['id', 'action', 'entity'];
        //$this->set(compact('data', '_serialize', '_header', '_extract'));
        $this->set(compact('data', '_serialize', '_header'));
        $this->viewBuilder()->className('CsvView.Csv');
        return;
    }
}
