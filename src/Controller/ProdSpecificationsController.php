<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProdSpecifications Controller
 *
 * @property \App\Model\Table\ProdSpecificationsTable $ProdSpecifications
 */
class ProdSpecificationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $prodSpecifications = $this->paginate($this->ProdSpecifications);

        $this->set(compact('prodSpecifications'));
        $this->set('_serialize', ['prodSpecifications']);
    }

    /**
     * View method
     *
     * @param string|null $id Prod Specification id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prodSpecification = $this->ProdSpecifications->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('prodSpecification', $prodSpecification);
        $this->set('_serialize', ['prodSpecification']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prodSpecification = $this->ProdSpecifications->newEntity();
        if ($this->request->is('post')) {
            $prodSpecification = $this->ProdSpecifications->patchEntity($prodSpecification, $this->request->data);
            if ($this->ProdSpecifications->save($prodSpecification)) {
                $this->Flash->success(__('The prod specification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prod specification could not be saved. Please, try again.'));
        }
        $products = $this->ProdSpecifications->Products->find('list', ['limit' => 200]);
        $this->set(compact('prodSpecification', 'products'));
        $this->set('_serialize', ['prodSpecification']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Prod Specification id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prodSpecification = $this->ProdSpecifications->get($id, [
            'contain' => ['Products']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prodSpecification = $this->ProdSpecifications->patchEntity($prodSpecification, $this->request->data);
            if ($this->ProdSpecifications->save($prodSpecification)) {
                $this->Flash->success(__('The prod specification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prod specification could not be saved. Please, try again.'));
        }
        $products = $this->ProdSpecifications->Products->find('list', ['limit' => 200]);
        $this->set(compact('prodSpecification', 'products'));
        $this->set('_serialize', ['prodSpecification']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Prod Specification id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prodSpecification = $this->ProdSpecifications->get($id);
        if ($this->ProdSpecifications->delete($prodSpecification)) {
            $this->Flash->success(__('The prod specification has been deleted.'));
        } else {
            $this->Flash->error(__('The prod specification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
