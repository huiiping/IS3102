<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RetaileremployeesEmployeeroles Controller
 *
 * @property \App\Model\Table\RetaileremployeesEmployeerolesTable $RetaileremployeesEmployeeroles
 */
class RetaileremployeesEmployeerolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Retaileremployees', 'Employeeroles']
        ];
        $retaileremployeesEmployeeroles = $this->paginate($this->RetaileremployeesEmployeeroles);

        $this->set(compact('retaileremployeesEmployeeroles'));
        $this->set('_serialize', ['retaileremployeesEmployeeroles']);
    }

    /**
     * View method
     *
     * @param string|null $id Retaileremployees Employeerole id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retaileremployeesEmployeerole = $this->RetaileremployeesEmployeeroles->get($id, [
            'contain' => ['Retaileremployees', 'Employeeroles']
        ]);

        $this->set('retaileremployeesEmployeerole', $retaileremployeesEmployeerole);
        $this->set('_serialize', ['retaileremployeesEmployeerole']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retaileremployeesEmployeerole = $this->RetaileremployeesEmployeeroles->newEntity();
        if ($this->request->is('post')) {
            $retaileremployeesEmployeerole = $this->RetaileremployeesEmployeeroles->patchEntity($retaileremployeesEmployeerole, $this->request->data);
            if ($this->RetaileremployeesEmployeeroles->save($retaileremployeesEmployeerole)) {
                $this->Flash->success(__('The retaileremployees employeerole has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retaileremployees employeerole could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->RetaileremployeesEmployeeroles->Retaileremployees->find('list', ['limit' => 200]);
        $employeeroles = $this->RetaileremployeesEmployeeroles->Employeeroles->find('list', ['limit' => 200]);
        $this->set(compact('retaileremployeesEmployeerole', 'retaileremployees', 'employeeroles'));
        $this->set('_serialize', ['retaileremployeesEmployeerole']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retaileremployees Employeerole id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retaileremployeesEmployeerole = $this->RetaileremployeesEmployeeroles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retaileremployeesEmployeerole = $this->RetaileremployeesEmployeeroles->patchEntity($retaileremployeesEmployeerole, $this->request->data);
            if ($this->RetaileremployeesEmployeeroles->save($retaileremployeesEmployeerole)) {
                $this->Flash->success(__('The retaileremployees employeerole has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retaileremployees employeerole could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->RetaileremployeesEmployeeroles->Retaileremployees->find('list', ['limit' => 200]);
        $employeeroles = $this->RetaileremployeesEmployeeroles->Employeeroles->find('list', ['limit' => 200]);
        $this->set(compact('retaileremployeesEmployeerole', 'retaileremployees', 'employeeroles'));
        $this->set('_serialize', ['retaileremployeesEmployeerole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retaileremployees Employeerole id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retaileremployeesEmployeerole = $this->RetaileremployeesEmployeeroles->get($id);
        if ($this->RetaileremployeesEmployeeroles->delete($retaileremployeesEmployeerole)) {
            $this->Flash->success(__('The retaileremployees employeerole has been deleted.'));
        } else {
            $this->Flash->error(__('The retaileremployees employeerole could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
