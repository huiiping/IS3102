<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Intrasysemployees Controller
 *
 * @property \App\Model\Table\IntrasysemployeesTable $Intrasysemployees
 */
class IntrasysemployeesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $intrasysemployees = $this->paginate($this->Intrasysemployees);

        $this->set(compact('intrasysemployees'));
        $this->set('_serialize', ['intrasysemployees']);
    }

    /**
     * View method
     *
     * @param string|null $id Intrasysemployee id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $intrasysemployee = $this->Intrasysemployees->get($id, [
            'contain' => ['Intrasysemployeeroles']
        ]);

        $this->set('intrasysemployee', $intrasysemployee);
        $this->set('_serialize', ['intrasysemployee']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $intrasysemployee = $this->Intrasysemployees->newEntity();
        if ($this->request->is('post')) {
            $intrasysemployee = $this->Intrasysemployees->patchEntity($intrasysemployee, $this->request->data);
            if ($this->Intrasysemployees->save($intrasysemployee)) {
                $this->Flash->success(__('The intrasysemployee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The intrasysemployee could not be saved. Please, try again.'));
        }
        $intrasysemployeeroles = $this->Intrasysemployees->Intrasysemployeeroles->find('list', ['limit' => 200]);
        $this->set(compact('intrasysemployee', 'intrasysemployeeroles'));
        $this->set('_serialize', ['intrasysemployee']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Intrasysemployee id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $intrasysemployee = $this->Intrasysemployees->get($id, [
            'contain' => ['Intrasysemployeeroles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $intrasysemployee = $this->Intrasysemployees->patchEntity($intrasysemployee, $this->request->data);
            if ($this->Intrasysemployees->save($intrasysemployee)) {
                $this->Flash->success(__('The intrasysemployee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The intrasysemployee could not be saved. Please, try again.'));
        }
        $intrasysemployeeroles = $this->Intrasysemployees->Intrasysemployeeroles->find('list', ['limit' => 200]);
        $this->set(compact('intrasysemployee', 'intrasysemployeeroles'));
        $this->set('_serialize', ['intrasysemployee']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Intrasysemployee id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $intrasysemployee = $this->Intrasysemployees->get($id);
        if ($this->Intrasysemployees->delete($intrasysemployee)) {
            $this->Flash->success(__('The intrasysemployee has been deleted.'));
        } else {
            $this->Flash->error(__('The intrasysemployee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login(){
        if($this->request->is('post')){
            $intrasysemployee = $this->Auth->identify();
            if($intrasysemployee){
                $this->Auth->setUser($intrasysemployee);
                return $this->redirect(['controller' => 'retailers', 'action' => 'index']);
                //return $this->redirect($this->Auth->redirectUrl());            
            }
            $this->Flash->error('Incorrect Login');   
        }
    }

    public function logout(){
        $this->Flash->success('You are now logged out');
        return $this->redirect($this->Auth->logout());
    }
}
