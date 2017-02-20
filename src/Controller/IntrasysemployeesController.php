<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * IntrasysEmployees Controller
 *
 * @property \App\Model\Table\IntrasysEmployeesTable $IntrasysEmployees
 */
class IntrasysEmployeesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $intrasysEmployees = $this->paginate($this->IntrasysEmployees);

        $this->set(compact('intrasysEmployees'));
        $this->set('_serialize', ['intrasysEmployees']);
    }

    /**
     * View method
     *
     * @param string|null $id Intrasys Employee id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $intrasysEmployee = $this->IntrasysEmployees->get($id, [
            'contain' => ['IntrasysEmployeeRoles']
        ]);

        $this->set('intrasysEmployee', $intrasysEmployee);
        $this->set('_serialize', ['intrasysEmployee']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $intrasysEmployee = $this->IntrasysEmployees->newEntity();
        if ($this->request->is('post')) {
            $intrasysEmployee = $this->IntrasysEmployees->patchEntity($intrasysEmployee, $this->request->data);
            if ($this->IntrasysEmployees->save($intrasysEmployee)) {
                $this->Flash->success(__('The intrasys employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The intrasys employee could not be saved. Please, try again.'));
        }
        $intrasysEmployeeRoles = $this->IntrasysEmployees->IntrasysEmployeeRoles->find('list', ['limit' => 200]);
        $this->set(compact('intrasysEmployee', 'intrasysEmployeeRoles'));
        $this->set('_serialize', ['intrasysEmployee']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Intrasys Employee id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $intrasysEmployee = $this->IntrasysEmployees->get($id, [
            'contain' => ['IntrasysEmployeeRoles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $intrasysEmployee = $this->IntrasysEmployees->patchEntity($intrasysEmployee, $this->request->data);
            if ($this->IntrasysEmployees->save($intrasysEmployee)) {
                $this->Flash->success(__('The intrasys employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The intrasys employee could not be saved. Please, try again.'));
        }
        $intrasysEmployeeRoles = $this->IntrasysEmployees->IntrasysEmployeeRoles->find('list', ['limit' => 200]);
        $this->set(compact('intrasysEmployee', 'intrasysEmployeeRoles'));
        $this->set('_serialize', ['intrasysEmployee']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Intrasys Employee id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $intrasysEmployee = $this->IntrasysEmployees->get($id);
        if ($this->IntrasysEmployees->delete($intrasysEmployee)) {
            $this->Flash->success(__('The intrasys employee has been deleted.'));
        } else {
            $this->Flash->error(__('The intrasys employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
