<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * IntrasysemployeesIntrasysemployeeroles Controller
 *
 * @property \App\Model\Table\IntrasysemployeesIntrasysemployeerolesTable $IntrasysemployeesIntrasysemployeeroles
 */
class IntrasysemployeesIntrasysemployeerolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Intrasysemployees', 'Intrasysemployeeroles']
        ];
        $intrasysemployeesIntrasysemployeeroles = $this->paginate($this->IntrasysemployeesIntrasysemployeeroles);

        $this->set(compact('intrasysemployeesIntrasysemployeeroles'));
        $this->set('_serialize', ['intrasysemployeesIntrasysemployeeroles']);
    }

    /**
     * View method
     *
     * @param string|null $id Intrasysemployees Intrasysemployeerole id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $intrasysemployeesIntrasysemployeerole = $this->IntrasysemployeesIntrasysemployeeroles->get($id, [
            'contain' => ['Intrasysemployees', 'Intrasysemployeeroles']
        ]);

        $this->set('intrasysemployeesIntrasysemployeerole', $intrasysemployeesIntrasysemployeerole);
        $this->set('_serialize', ['intrasysemployeesIntrasysemployeerole']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $intrasysemployeesIntrasysemployeerole = $this->IntrasysemployeesIntrasysemployeeroles->newEntity();
        if ($this->request->is('post')) {
            $intrasysemployeesIntrasysemployeerole = $this->IntrasysemployeesIntrasysemployeeroles->patchEntity($intrasysemployeesIntrasysemployeerole, $this->request->data);
            if ($this->IntrasysemployeesIntrasysemployeeroles->save($intrasysemployeesIntrasysemployeerole)) {
                $this->Flash->success(__('The intrasysemployees intrasysemployeerole has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The intrasysemployees intrasysemployeerole could not be saved. Please, try again.'));
        }
        $intrasysemployees = $this->IntrasysemployeesIntrasysemployeeroles->Intrasysemployees->find('list', ['limit' => 200]);
        $intrasysemployeeroles = $this->IntrasysemployeesIntrasysemployeeroles->Intrasysemployeeroles->find('list', ['limit' => 200]);
        $this->set(compact('intrasysemployeesIntrasysemployeerole', 'intrasysemployees', 'intrasysemployeeroles'));
        $this->set('_serialize', ['intrasysemployeesIntrasysemployeerole']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Intrasysemployees Intrasysemployeerole id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $intrasysemployeesIntrasysemployeerole = $this->IntrasysemployeesIntrasysemployeeroles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $intrasysemployeesIntrasysemployeerole = $this->IntrasysemployeesIntrasysemployeeroles->patchEntity($intrasysemployeesIntrasysemployeerole, $this->request->data);
            if ($this->IntrasysemployeesIntrasysemployeeroles->save($intrasysemployeesIntrasysemployeerole)) {
                $this->Flash->success(__('The intrasysemployees intrasysemployeerole has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The intrasysemployees intrasysemployeerole could not be saved. Please, try again.'));
        }
        $intrasysemployees = $this->IntrasysemployeesIntrasysemployeeroles->Intrasysemployees->find('list', ['limit' => 200]);
        $intrasysemployeeroles = $this->IntrasysemployeesIntrasysemployeeroles->Intrasysemployeeroles->find('list', ['limit' => 200]);
        $this->set(compact('intrasysemployeesIntrasysemployeerole', 'intrasysemployees', 'intrasysemployeeroles'));
        $this->set('_serialize', ['intrasysemployeesIntrasysemployeerole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Intrasysemployees Intrasysemployeerole id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $intrasysemployeesIntrasysemployeerole = $this->IntrasysemployeesIntrasysemployeeroles->get($id);
        if ($this->IntrasysemployeesIntrasysemployeeroles->delete($intrasysemployeesIntrasysemployeerole)) {
            $this->Flash->success(__('The intrasysemployees intrasysemployeerole has been deleted.'));
        } else {
            $this->Flash->error(__('The intrasysemployees intrasysemployeerole could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
