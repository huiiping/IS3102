<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Purchaseorders Controller
 *
 * @property \App\Model\Table\PurchaseordersTable $Purchaseorders
 */
class PurchaseordersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Suppliers', 'Retaileremployees']
        ];
        $purchaseorders = $this->paginate($this->Purchaseorders);

        $this->set(compact('purchaseorders'));
        $this->set('_serialize', ['purchaseorders']);
    }

    /**
     * View method
     *
     * @param string|null $id Purchaseorder id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purchaseorder = $this->Purchaseorders->get($id, [
            'contain' => ['Suppliers', 'Retaileremployees']
        ]);

        $this->set('purchaseorder', $purchaseorder);
        $this->set('_serialize', ['purchaseorder']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $purchaseorder = $this->Purchaseorders->newEntity();
        if ($this->request->is('post')) {
            $purchaseorder = $this->Purchaseorders->patchEntity($purchaseorder, $this->request->data);
            if ($this->Purchaseorders->save($purchaseorder)) {
                $this->Flash->success(__('The purchaseorder has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchaseorder could not be saved. Please, try again.'));
        }
        $suppliers = $this->Purchaseorders->Suppliers->find('list', ['limit' => 200]);
        $retaileremployees = $this->Purchaseorders->Retaileremployees->find('list', ['limit' => 200]);
        $this->set(compact('purchaseorder', 'suppliers', 'retaileremployees'));
        $this->set('_serialize', ['purchaseorder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Purchaseorder id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purchaseorder = $this->Purchaseorders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchaseorder = $this->Purchaseorders->patchEntity($purchaseorder, $this->request->data);
            if ($this->Purchaseorders->save($purchaseorder)) {
                $this->Flash->success(__('The purchaseorder has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchaseorder could not be saved. Please, try again.'));
        }
        $suppliers = $this->Purchaseorders->Suppliers->find('list', ['limit' => 200]);
        $retaileremployees = $this->Purchaseorders->Retaileremployees->find('list', ['limit' => 200]);
        $this->set(compact('purchaseorder', 'suppliers', 'retaileremployees'));
        $this->set('_serialize', ['purchaseorder']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Purchaseorder id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purchaseorder = $this->Purchaseorders->get($id);
        if ($this->Purchaseorders->delete($purchaseorder)) {
            $this->Flash->success(__('The purchaseorder has been deleted.'));
        } else {
            $this->Flash->error(__('The purchaseorder could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
