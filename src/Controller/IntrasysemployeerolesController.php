<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * IntrasysEmployeeRoles Controller
 *
 * @property \App\Model\Table\IntrasysEmployeeRolesTable $IntrasysEmployeeRoles
 */
class IntrasysEmployeeRolesController extends AppController
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
    public function index() {


        $this->loadComponent('Prg');
        $this->Prg->commonProcess();
        $this->set('intrasysEmployeeRoles', $this->paginate($this->IntrasysEmployeeRoles->find('searchable', $this->Prg->parsedParams())));
        $this->set(compact('intrasysEmployeeRoles'));
        $this->set('_serialize', ['intrasysEmployeeRoles']);
    }
    public $components = array(
        'Prg'
    );


    /**
     * View method
     *
     * @param string|null $id Intrasys Employee Role id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $intrasysEmployeeRole = $this->IntrasysEmployeeRoles->get($id, [
            'contain' => ['IntrasysEmployees']
        ]);

        //$this->loadComponent('Logging');
        //$this->Logging->log($intrasysEmployeeRole['id']);
        $this->Logging->iLog(null, $intrasysEmployeeRole['id']);

        $this->set('intrasysEmployeeRole', $intrasysEmployeeRole);
        $this->set('_serialize', ['intrasysEmployeeRole']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $intrasysEmployeeRole = $this->IntrasysEmployeeRoles->newEntity();
        if ($this->request->is('post')) {
            $intrasysEmployeeRole = $this->IntrasysEmployeeRoles->patchEntity($intrasysEmployeeRole, $this->request->data);
            if ($this->IntrasysEmployeeRoles->save($intrasysEmployeeRole)) {
                $this->Flash->success(__('The intrasys employee role has been saved.'));
                
                //$this->loadComponent('Logging');
                //$this->Logging->log($intrasysEmployeeRole['id']);
                $this->Logging->iLog(null, $intrasysEmployeeRole['id']);
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The intrasys employee role could not be saved. Please, try again.'));
        }
        $intrasysEmployees = $this->IntrasysEmployeeRoles->IntrasysEmployees->find('list', ['limit' => 200]);
        $this->set(compact('intrasysEmployeeRole', 'intrasysEmployees'));
        $this->set('_serialize', ['intrasysEmployeeRole']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Intrasys Employee Role id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $intrasysEmployeeRole = $this->IntrasysEmployeeRoles->get($id, [
            'contain' => ['IntrasysEmployees']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $intrasysEmployeeRole = $this->IntrasysEmployeeRoles->patchEntity($intrasysEmployeeRole, $this->request->data);
            if ($this->IntrasysEmployeeRoles->save($intrasysEmployeeRole)) {
                $this->Flash->success(__('The intrasys employee role has been saved.'));

                //$this->loadComponent('Logging');
                //$this->Logging->log($intrasysEmployeeRole['id']);
                $this->Logging->iLog(null, $intrasysEmployeeRole['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The intrasys employee role could not be saved. Please, try again.'));
        }
        $intrasysEmployees = $this->IntrasysEmployeeRoles->IntrasysEmployees->find('list', ['limit' => 200]);
        $this->set(compact('intrasysEmployeeRole', 'intrasysEmployees'));
        $this->set('_serialize', ['intrasysEmployeeRole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Intrasys Employee Role id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $intrasysEmployeeRole = $this->IntrasysEmployeeRoles->get($id);
        if ($this->IntrasysEmployeeRoles->delete($intrasysEmployeeRole)) {
            $this->Flash->success(__('The intrasys employee role has been deleted.'));

            //$this->loadComponent('Logging');
            //$this->Logging->log($intrasysEmployeeRole['id']);
            $this->Logging->iLog(null, $intrasysEmployeeRole['id']);
            
        } else {
            $this->Flash->error(__('The intrasys employee role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
