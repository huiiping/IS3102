<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

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
            $this->Flash->error(__('The incident report could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->Reports->RetailerEmployees->find('list', ['limit' => 200]);
        $this->set(compact('report', 'retailerEmployees'));
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
        $report = $this->Reports->newEntity();
        if ($this->request->is('post')) {
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
            $this->Flash->error(__('The incident report could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->Reports->RetailerEmployees->find('list', ['limit' => 200]);
        $this->set(compact('report', 'retailerEmployees'));
        $this->set('_serialize', ['report']);
    }
}
