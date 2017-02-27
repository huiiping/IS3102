<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * IntrasysEmployeesIntrasysEmployeeRoles Controller
 *
 * @property \App\Model\Table\IntrasysEmployeesIntrasysEmployeeRolesTable $IntrasysEmployeesIntrasysEmployeeRoles
 */
class IntrasysEmployeesIntrasysEmployeeRolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['IntrasysEmployees', 'IntrasysEmployeeRoles']
        ];
        $intrasysEmployeesIntrasysEmployeeRoles = $this->paginate($this->IntrasysEmployeesIntrasysEmployeeRoles);

        $this->set(compact('intrasysEmployeesIntrasysEmployeeRoles'));
        $this->set('_serialize', ['intrasysEmployeesIntrasysEmployeeRoles']);
    }

    /**
     * View method
     *
     * @param string|null $id Intrasys Employees Intrasys Employee Role id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $intrasysEmployeesIntrasysEmployeeRole = $this->IntrasysEmployeesIntrasysEmployeeRoles->get($id, [
            'contain' => ['IntrasysEmployees', 'IntrasysEmployeeRoles']
        ]);

        $this->loadComponent('Logging');
        //$this->Logging->log($customer['id']);
        $this->Logging->iLog(null, $intrasysEmployeesIntrasysEmployeeRole['id']);

        $this->set('intrasysEmployeesIntrasysEmployeeRole', $intrasysEmployeesIntrasysEmployeeRole);
        $this->set('_serialize', ['intrasysEmployeesIntrasysEmployeeRole']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $intrasysEmployeesIntrasysEmployeeRole = $this->IntrasysEmployeesIntrasysEmployeeRoles->newEntity();
        if ($this->request->is('post')) {
            $intrasysEmployeesIntrasysEmployeeRole = $this->IntrasysEmployeesIntrasysEmployeeRoles->patchEntity($intrasysEmployeesIntrasysEmployeeRole, $this->request->data);
            if ($this->IntrasysEmployeesIntrasysEmployeeRoles->save($intrasysEmployeesIntrasysEmployeeRole)) {
                $this->Flash->success(__('The intrasys employees intrasys employee role has been saved.'));

                $this->loadComponent('Logging');
                //$this->Logging->log($customer['id']);
                $this->Logging->iLog(null, $intrasysEmployeesIntrasysEmployeeRole['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The intrasys employees intrasys employee role could not be saved. Please, try again.'));
        }
        $intrasysEmployees = $this->IntrasysEmployeesIntrasysEmployeeRoles->IntrasysEmployees->find('list', ['limit' => 200]);
        $intrasysEmployeeRoles = $this->IntrasysEmployeesIntrasysEmployeeRoles->IntrasysEmployeeRoles->find('list', ['limit' => 200]);
        $this->set(compact('intrasysEmployeesIntrasysEmployeeRole', 'intrasysEmployees', 'intrasysEmployeeRoles'));
        $this->set('_serialize', ['intrasysEmployeesIntrasysEmployeeRole']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Intrasys Employees Intrasys Employee Role id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $intrasysEmployeesIntrasysEmployeeRole = $this->IntrasysEmployeesIntrasysEmployeeRoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $intrasysEmployeesIntrasysEmployeeRole = $this->IntrasysEmployeesIntrasysEmployeeRoles->patchEntity($intrasysEmployeesIntrasysEmployeeRole, $this->request->data);
            if ($this->IntrasysEmployeesIntrasysEmployeeRoles->save($intrasysEmployeesIntrasysEmployeeRole)) {
                $this->Flash->success(__('The intrasys employees intrasys employee role has been saved.'));

                $this->loadComponent('Logging');
                //$this->Logging->log($customer['id']);
                $this->Logging->iLog(null, $intrasysEmployeesIntrasysEmployeeRole['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The intrasys employees intrasys employee role could not be saved. Please, try again.'));
        }
        $intrasysEmployees = $this->IntrasysEmployeesIntrasysEmployeeRoles->IntrasysEmployees->find('list', ['limit' => 200]);
        $intrasysEmployeeRoles = $this->IntrasysEmployeesIntrasysEmployeeRoles->IntrasysEmployeeRoles->find('list', ['limit' => 200]);
        $this->set(compact('intrasysEmployeesIntrasysEmployeeRole', 'intrasysEmployees', 'intrasysEmployeeRoles'));
        $this->set('_serialize', ['intrasysEmployeesIntrasysEmployeeRole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Intrasys Employees Intrasys Employee Role id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $intrasysEmployeesIntrasysEmployeeRole = $this->IntrasysEmployeesIntrasysEmployeeRoles->get($id);
        if ($this->IntrasysEmployeesIntrasysEmployeeRoles->delete($intrasysEmployeesIntrasysEmployeeRole)) {

            $this->loadComponent('Logging');
            //$this->Logging->log($customer['id']);
            $this->Logging->iLog(null, $intrasysEmployeesIntrasysEmployeeRole['id']);

            $this->Flash->success(__('The intrasys employees intrasys employee role has been deleted.'));
        } else {
            $this->Flash->error(__('The intrasys employees intrasys employee role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
