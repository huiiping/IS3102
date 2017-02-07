<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Producttype Controller
 *
 * @property \App\Model\Table\ProducttypeTable $Producttype
 */
class ProducttypeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $producttype = $this->paginate($this->Producttype);

        $this->set(compact('producttype'));
        $this->set('_serialize', ['producttype']);
    }

    /**
     * View method
     *
     * @param string|null $id Producttype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $producttype = $this->Producttype->get($id, [
            'contain' => []
        ]);

        $this->set('producttype', $producttype);
        $this->set('_serialize', ['producttype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $producttype = $this->Producttype->newEntity();
        if ($this->request->is('post')) {
            $producttype = $this->Producttype->patchEntity($producttype, $this->request->data);
            if ($this->Producttype->save($producttype)) {
                $this->Flash->success(__('The producttype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The producttype could not be saved. Please, try again.'));
        }
        $this->set(compact('producttype'));
        $this->set('_serialize', ['producttype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Producttype id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $producttype = $this->Producttype->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $producttype = $this->Producttype->patchEntity($producttype, $this->request->data);
            if ($this->Producttype->save($producttype)) {
                $this->Flash->success(__('The producttype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The producttype could not be saved. Please, try again.'));
        }
        $this->set(compact('producttype'));
        $this->set('_serialize', ['producttype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Producttype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $producttype = $this->Producttype->get($id);
        if ($this->Producttype->delete($producttype)) {
            $this->Flash->success(__('The producttype has been deleted.'));
        } else {
            $this->Flash->error(__('The producttype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
