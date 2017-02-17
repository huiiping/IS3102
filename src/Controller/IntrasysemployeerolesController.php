<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Intrasysemployeeroles Controller
 *
 * @property \App\Model\Table\IntrasysemployeerolesTable $Intrasysemployeeroles
 */
class IntrasysemployeerolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $intrasysemployeeroles = $this->paginate($this->Intrasysemployeeroles);

        $this->set(compact('intrasysemployeeroles'));
        $this->set('_serialize', ['intrasysemployeeroles']);
    }

    /**
     * View method
     *
     * @param string|null $id Intrasysemployeerole id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $intrasysemployeerole = $this->Intrasysemployeeroles->get($id, [
            'contain' => ['Intrasysemployees']
        ]);

        $this->set('intrasysemployeerole', $intrasysemployeerole);
        $this->set('_serialize', ['intrasysemployeerole']);
    }

    /**
     * Add method
     *
     * Can't create new roles! - Gwen
     
    public function add()
    {
        $intrasysemployeerole = $this->Intrasysemployeeroles->newEntity();
        if ($this->request->is('post')) {
            $intrasysemployeerole = $this->Intrasysemployeeroles->patchEntity($intrasysemployeerole, $this->request->data);
            if ($this->Intrasysemployeeroles->save($intrasysemployeerole)) {
                $this->Flash->success(__('The intrasysemployeerole has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The intrasysemployeerole could not be saved. Please, try again.'));
        }
        $intrasysemployees = $this->Intrasysemployeeroles->Intrasysemployees->find('list', ['limit' => 200]);
        $this->set(compact('intrasysemployeerole', 'intrasysemployees'));
        $this->set('_serialize', ['intrasysemployeerole']);
    }*/

    /**
     * Edit method
     *
     * @param string|null $id Intrasysemployeerole id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $intrasysemployeerole = $this->Intrasysemployeeroles->get($id, [
            'contain' => ['Intrasysemployees']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $intrasysemployeerole = $this->Intrasysemployeeroles->patchEntity($intrasysemployeerole, $this->request->data);
            if ($this->Intrasysemployeeroles->save($intrasysemployeerole)) {
                $this->Flash->success(__('The intrasysemployeerole has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The intrasysemployeerole could not be saved. Please, try again.'));
        }
        $intrasysemployees = $this->Intrasysemployeeroles->Intrasysemployees->find('list', ['limit' => 200]);
        $this->set(compact('intrasysemployeerole', 'intrasysemployees'));
        $this->set('_serialize', ['intrasysemployeerole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Intrasysemployeerole id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $intrasysemployeerole = $this->Intrasysemployeeroles->get($id);
        if ($this->Intrasysemployeeroles->delete($intrasysemployeerole)) {
            $this->Flash->success(__('The intrasysemployeerole has been deleted.'));
        } else {
            $this->Flash->error(__('The intrasysemployeerole could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
