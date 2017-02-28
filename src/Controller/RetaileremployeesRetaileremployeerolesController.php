<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RetailerEmployeesRetailerEmployeeRoles Controller
 *
 * @property \App\Model\Table\RetailerEmployeesRetailerEmployeeRolesTable $RetailerEmployeesRetailerEmployeeRoles
 */
class RetailerEmployeesRetailerEmployeeRolesController extends AppController
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
        $this->paginate = [
            'contain' => ['RetailerEmployees', 'RetailerEmployeeRoles']
        ];
        $retailerEmployeesRetailerEmployeeRoles = $this->paginate($this->RetailerEmployeesRetailerEmployeeRoles);

        $this->set(compact('retailerEmployeesRetailerEmployeeRoles'));
        $this->set('_serialize', ['retailerEmployeesRetailerEmployeeRoles']);
    }

    /**
     * View method
     *
     * @param string|null $id Retailer Employees Retailer Employee Role id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retailerEmployeesRetailerEmployeeRole = $this->RetailerEmployeesRetailerEmployeeRoles->get($id, [
            'contain' => ['RetailerEmployees', 'RetailerEmployeeRoles']
        ]);

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        $this->Logging->rLog($retailerEmployeesRetailerEmployeeRole['id']);
        $this->Logging->iLog($retailer, $retailerEmployeesRetailerEmployeeRole['id']);

        $this->set('retailerEmployeesRetailerEmployeeRole', $retailerEmployeesRetailerEmployeeRole);
        $this->set('_serialize', ['retailerEmployeesRetailerEmployeeRole']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retailerEmployeesRetailerEmployeeRole = $this->RetailerEmployeesRetailerEmployeeRoles->newEntity();
        if ($this->request->is('post')) {
            $retailerEmployeesRetailerEmployeeRole = $this->RetailerEmployeesRetailerEmployeeRoles->patchEntity($retailerEmployeesRetailerEmployeeRole, $this->request->data);
            if ($this->RetailerEmployeesRetailerEmployeeRoles->save($retailerEmployeesRetailerEmployeeRole)) {
                $this->Flash->success(__('The retailer employees retailer employee role has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($retailerEmployeesRetailerEmployeeRole['id']);
                $this->Logging->iLog($retailer, $retailerEmployeesRetailerEmployeeRole['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer employees retailer employee role could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->RetailerEmployeesRetailerEmployeeRoles->RetailerEmployees->find('list', ['limit' => 200]);
        $retailerEmployeeRoles = $this->RetailerEmployeesRetailerEmployeeRoles->RetailerEmployeeRoles->find('list', ['limit' => 200]);
        $this->set(compact('retailerEmployeesRetailerEmployeeRole', 'retailerEmployees', 'retailerEmployeeRoles'));
        $this->set('_serialize', ['retailerEmployeesRetailerEmployeeRole']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retailer Employees Retailer Employee Role id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retailerEmployeesRetailerEmployeeRole = $this->RetailerEmployeesRetailerEmployeeRoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retailerEmployeesRetailerEmployeeRole = $this->RetailerEmployeesRetailerEmployeeRoles->patchEntity($retailerEmployeesRetailerEmployeeRole, $this->request->data);
            if ($this->RetailerEmployeesRetailerEmployeeRoles->save($retailerEmployeesRetailerEmployeeRole)) {
                $this->Flash->success(__('The retailer employees retailer employee role has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($retailerEmployeesRetailerEmployeeRole['id']);
                $this->Logging->iLog($retailer, $retailerEmployeesRetailerEmployeeRole['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer employees retailer employee role could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->RetailerEmployeesRetailerEmployeeRoles->RetailerEmployees->find('list', ['limit' => 200]);
        $retailerEmployeeRoles = $this->RetailerEmployeesRetailerEmployeeRoles->RetailerEmployeeRoles->find('list', ['limit' => 200]);
        $this->set(compact('retailerEmployeesRetailerEmployeeRole', 'retailerEmployees', 'retailerEmployeeRoles'));
        $this->set('_serialize', ['retailerEmployeesRetailerEmployeeRole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retailer Employees Retailer Employee Role id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retailerEmployeesRetailerEmployeeRole = $this->RetailerEmployeesRetailerEmployeeRoles->get($id);
        if ($this->RetailerEmployeesRetailerEmployeeRoles->delete($retailerEmployeesRetailerEmployeeRole)) {
            $this->Flash->success(__('The retailer employees retailer employee role has been deleted.'));

            $session = $this->request->session();
            $retailer = $session->read('retailer');

            //$this->loadComponent('Logging');
            $this->Logging->rLog($retailerEmployeesRetailerEmployeeRole['id']);
            $this->Logging->iLog($retailer, $retailerEmployeesRetailerEmployeeRole['id']);
        
        } else {
            $this->Flash->error(__('The retailer employees retailer employee role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
