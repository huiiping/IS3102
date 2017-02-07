<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Productcategory Controller
 *
 * @property \App\Model\Table\ProductcategoryTable $Productcategory
 */
class ProductcategoryController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $productcategory = $this->paginate($this->Productcategory);

        $this->set(compact('productcategory'));
        $this->set('_serialize', ['productcategory']);
    }

    /**
     * View method
     *
     * @param string|null $id Productcategory id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productcategory = $this->Productcategory->get($id, [
            'contain' => []
        ]);

        $this->set('productcategory', $productcategory);
        $this->set('_serialize', ['productcategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productcategory = $this->Productcategory->newEntity();
        if ($this->request->is('post')) {
            $productcategory = $this->Productcategory->patchEntity($productcategory, $this->request->data);
            if ($this->Productcategory->save($productcategory)) {
                $this->Flash->success(__('The productcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The productcategory could not be saved. Please, try again.'));
        }
        $this->set(compact('productcategory'));
        $this->set('_serialize', ['productcategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Productcategory id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productcategory = $this->Productcategory->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productcategory = $this->Productcategory->patchEntity($productcategory, $this->request->data);
            if ($this->Productcategory->save($productcategory)) {
                $this->Flash->success(__('The productcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The productcategory could not be saved. Please, try again.'));
        }
        $this->set(compact('productcategory'));
        $this->set('_serialize', ['productcategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Productcategory id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productcategory = $this->Productcategory->get($id);
        if ($this->Productcategory->delete($productcategory)) {
            $this->Flash->success(__('The productcategory has been deleted.'));
        } else {
            $this->Flash->error(__('The productcategory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
