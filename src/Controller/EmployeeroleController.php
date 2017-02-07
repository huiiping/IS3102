<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Employeerole Controller
 *
 * @property \App\Model\Table\EmployeeroleTable $Employeerole
 */
class EmployeeroleController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $employeerole = $this->paginate($this->Employeerole);

        $this->set(compact('employeerole'));
        $this->set('_serialize', ['employeerole']);
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
        $employeerole = $this->Employeerole->get($id, [
            'contain' => []
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
        $employeerole = $this->Employeerole->newEntity();
        if ($this->request->is('post')) {
            $employeerole = $this->Employeerole->patchEntity($employeerole, $this->request->data);
            if ($this->Employeerole->save($employeerole)) {
                $this->Flash->success(__('The employeerole has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employeerole could not be saved. Please, try again.'));
        }
        $this->set(compact('employeerole'));
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
        $employeerole = $this->Employeerole->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeerole = $this->Employeerole->patchEntity($employeerole, $this->request->data);
            if ($this->Employeerole->save($employeerole)) {
                $this->Flash->success(__('The employeerole has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employeerole could not be saved. Please, try again.'));
        }
        $this->set(compact('employeerole'));
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
        $employeerole = $this->Employeerole->get($id);
        if ($this->Employeerole->delete($employeerole)) {
            $this->Flash->success(__('The employeerole has been deleted.'));
        } else {
            $this->Flash->error(__('The employeerole could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
