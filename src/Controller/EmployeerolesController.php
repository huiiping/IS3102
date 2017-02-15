<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Employeeroles Controller
 *
 * @property \App\Model\Table\EmployeerolesTable $Employeeroles
 */
class EmployeerolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $employeeroles = $this->paginate($this->Employeeroles);

        $this->set(compact('employeeroles'));
        $this->set('_serialize', ['employeeroles']);
    }

    /**
     * View method
     *
     * @param string|null $id Employeerole id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employeerole = $this->Employeeroles->get($id, [
            'contain' => ['Retaileremployees']
        ]);

        $this->set('employeerole', $employeerole);
        $this->set('_serialize', ['employeerole']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employeerole = $this->Employeeroles->newEntity();
        if ($this->request->is('post')) {
            $employeerole = $this->Employeeroles->patchEntity($employeerole, $this->request->data);
            if ($this->Employeeroles->save($employeerole)) {
                $this->Flash->success(__('The employeerole has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employeerole could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->Employeeroles->Retaileremployees->find('list', ['limit' => 200]);
        $this->set(compact('employeerole', 'retaileremployees'));
        $this->set('_serialize', ['employeerole']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Employeerole id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employeerole = $this->Employeeroles->get($id, [
            'contain' => ['Retaileremployees']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeerole = $this->Employeeroles->patchEntity($employeerole, $this->request->data);
            if ($this->Employeeroles->save($employeerole)) {
                $this->Flash->success(__('The employeerole has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employeerole could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->Employeeroles->Retaileremployees->find('list', ['limit' => 200]);
        $this->set(compact('employeerole', 'retaileremployees'));
        $this->set('_serialize', ['employeerole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Employeerole id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employeerole = $this->Employeeroles->get($id);
        if ($this->Employeeroles->delete($employeerole)) {
            $this->Flash->success(__('The employeerole has been deleted.'));
        } else {
            $this->Flash->error(__('The employeerole could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
