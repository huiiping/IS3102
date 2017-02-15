<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Prodcats Controller
 *
 * @property \App\Model\Table\ProdcatsTable $Prodcats
 */
class ProdcatsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Retaileremployees']
        ];
        $prodcats = $this->paginate($this->Prodcats);

        $this->set(compact('prodcats'));
        $this->set('_serialize', ['prodcats']);
    }

    /**
     * View method
     *
     * @param string|null $id Prodcat id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prodcat = $this->Prodcats->get($id, [
            'contain' => ['Retaileremployees']
        ]);

        $this->set('prodcat', $prodcat);
        $this->set('_serialize', ['prodcat']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prodcat = $this->Prodcats->newEntity();
        if ($this->request->is('post')) {
            $prodcat = $this->Prodcats->patchEntity($prodcat, $this->request->data);
            if ($this->Prodcats->save($prodcat)) {
                $this->Flash->success(__('The prodcat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prodcat could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->Prodcats->Retaileremployees->find('list', ['limit' => 200]);
        $this->set(compact('prodcat', 'retaileremployees'));
        $this->set('_serialize', ['prodcat']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Prodcat id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prodcat = $this->Prodcats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prodcat = $this->Prodcats->patchEntity($prodcat, $this->request->data);
            if ($this->Prodcats->save($prodcat)) {
                $this->Flash->success(__('The prodcat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prodcat could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->Prodcats->Retaileremployees->find('list', ['limit' => 200]);
        $this->set(compact('prodcat', 'retaileremployees'));
        $this->set('_serialize', ['prodcat']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Prodcat id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prodcat = $this->Prodcats->get($id);
        if ($this->Prodcats->delete($prodcat)) {
            $this->Flash->success(__('The prodcat has been deleted.'));
        } else {
            $this->Flash->error(__('The prodcat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
