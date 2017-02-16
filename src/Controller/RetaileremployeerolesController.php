<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Retaileremployeeroles Controller
 *
 * @property \App\Model\Table\RetaileremployeerolesTable $Retaileremployeeroles
 */
class RetaileremployeerolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $retaileremployeeroles = $this->paginate($this->Retaileremployeeroles);

        $this->set(compact('retaileremployeeroles'));
        $this->set('_serialize', ['retaileremployeeroles']);
    }

    /**
     * View method
     *
     * @param string|null $id Retaileremployeerole id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retaileremployeerole = $this->Retaileremployeeroles->get($id, [
            'contain' => ['Retaileremployees']
        ]);

        $this->set('retaileremployeerole', $retaileremployeerole);
        $this->set('_serialize', ['retaileremployeerole']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retaileremployeerole = $this->Retaileremployeeroles->newEntity();
        if ($this->request->is('post')) {
            $retaileremployeerole = $this->Retaileremployeeroles->patchEntity($retaileremployeerole, $this->request->data);
            if ($this->Retaileremployeeroles->save($retaileremployeerole)) {
                $this->Flash->success(__('The retaileremployeerole has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retaileremployeerole could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->Retaileremployeeroles->Retaileremployees->find('list', ['limit' => 200]);
        $this->set(compact('retaileremployeerole', 'retaileremployees'));
        $this->set('_serialize', ['retaileremployeerole']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retaileremployeerole id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retaileremployeerole = $this->Retaileremployeeroles->get($id, [
            'contain' => ['Retaileremployees']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retaileremployeerole = $this->Retaileremployeeroles->patchEntity($retaileremployeerole, $this->request->data);
            if ($this->Retaileremployeeroles->save($retaileremployeerole)) {
                $this->Flash->success(__('The retaileremployeerole has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retaileremployeerole could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->Retaileremployeeroles->Retaileremployees->find('list', ['limit' => 200]);
        $this->set(compact('retaileremployeerole', 'retaileremployees'));
        $this->set('_serialize', ['retaileremployeerole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retaileremployeerole id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retaileremployeerole = $this->Retaileremployeeroles->get($id);
        if ($this->Retaileremployeeroles->delete($retaileremployeerole)) {
            $this->Flash->success(__('The retaileremployeerole has been deleted.'));
        } else {
            $this->Flash->error(__('The retaileremployeerole could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
