<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Prodtypes Controller
 *
 * @property \App\Model\Table\ProdtypesTable $Prodtypes
 */
class ProdtypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Prodcats']
        ];
        $prodtypes = $this->paginate($this->Prodtypes);

        $this->set(compact('prodtypes'));
        $this->set('_serialize', ['prodtypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Prodtype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prodtype = $this->Prodtypes->get($id, [
            'contain' => ['Prodcats', 'Promotions']
        ]);

        $this->set('prodtype', $prodtype);
        $this->set('_serialize', ['prodtype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prodtype = $this->Prodtypes->newEntity();
        if ($this->request->is('post')) {
            $prodtype = $this->Prodtypes->patchEntity($prodtype, $this->request->data);
            if ($this->Prodtypes->save($prodtype)) {
                $this->Flash->success(__('The prodtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prodtype could not be saved. Please, try again.'));
        }
        $prodcats = $this->Prodtypes->Prodcats->find('list', ['limit' => 200]);
        $promotions = $this->Prodtypes->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('prodtype', 'prodcats', 'promotions'));
        $this->set('_serialize', ['prodtype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Prodtype id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prodtype = $this->Prodtypes->get($id, [
            'contain' => ['Promotions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prodtype = $this->Prodtypes->patchEntity($prodtype, $this->request->data);
            if ($this->Prodtypes->save($prodtype)) {
                $this->Flash->success(__('The prodtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prodtype could not be saved. Please, try again.'));
        }
        $prodcats = $this->Prodtypes->Prodcats->find('list', ['limit' => 200]);
        $promotions = $this->Prodtypes->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('prodtype', 'prodcats', 'promotions'));
        $this->set('_serialize', ['prodtype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Prodtype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prodtype = $this->Prodtypes->get($id);
        if ($this->Prodtypes->delete($prodtype)) {
            $this->Flash->success(__('The prodtype has been deleted.'));
        } else {
            $this->Flash->error(__('The prodtype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
