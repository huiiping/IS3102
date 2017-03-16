<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Reports Controller
 *
 * @property \App\Model\Table\ReportsTable $Reports
 */
class ReportsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RetailerEmployees', 'Locations', 'Suppliers', 'DeliveryOrders']
        ];
        $reports = $this->paginate($this->Reports);

        $this->set(compact('reports'));
        $this->set('_serialize', ['reports']);
    }

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
            'contain' => ['RetailerEmployees', 'Locations', 'Suppliers', 'DeliveryOrders', 'Items']
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
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->Reports->RetailerEmployees->find('list', ['limit' => 200]);
        $locations = $this->Reports->Locations->find('list', ['limit' => 200]);
        $suppliers = $this->Reports->Suppliers->find('list', ['limit' => 200]);
        $deliveryOrders = $this->Reports->DeliveryOrders->find('list', ['limit' => 200]);
        $this->set(compact('report', 'retailerEmployees', 'locations', 'suppliers', 'deliveryOrders'));
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
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->Reports->RetailerEmployees->find('list', ['limit' => 200]);
        $locations = $this->Reports->Locations->find('list', ['limit' => 200]);
        $suppliers = $this->Reports->Suppliers->find('list', ['limit' => 200]);
        $deliveryOrders = $this->Reports->DeliveryOrders->find('list', ['limit' => 200]);
        $this->set(compact('report', 'retailerEmployees', 'locations', 'suppliers', 'deliveryOrders'));
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
            $this->Flash->success(__('The report has been deleted.'));
        } else {
            $this->Flash->error(__('The report could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
