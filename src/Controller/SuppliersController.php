<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Suppliers Controller
 *
 * @property \App\Model\Table\SuppliersTable $Suppliers
 */
class SuppliersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $suppliers = $this->paginate($this->Suppliers);

        $this->set(compact('suppliers'));
        $this->set('_serialize', ['suppliers']);
    }

    /**
     * View method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supplier = $this->Suppliers->get($id, [
            'contain' => ['PurchaseOrders', 'SupplierMemos']
        ]);

        $this->set('supplier', $supplier);
        $this->set('_serialize', ['supplier']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $supplier = $this->Suppliers->newEntity();
        if ($this->request->is('post')) {
            $supplier = $this->Suppliers->patchEntity($supplier, $this->request->data);
            if ($this->Suppliers->save($supplier)) {
                $this->Flash->success(__('The supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
        }
        $this->set(compact('supplier'));
        $this->set('_serialize', ['supplier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $supplier = $this->Suppliers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supplier = $this->Suppliers->patchEntity($supplier, $this->request->data);
            if ($this->Suppliers->save($supplier)) {
                $this->Flash->success(__('The supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
        }
        $this->set(compact('supplier'));
        $this->set('_serialize', ['supplier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supplier = $this->Suppliers->get($id);
        if ($this->Suppliers->delete($supplier)) {
            $this->Flash->success(__('The supplier has been deleted.'));
        } else {
            $this->Flash->error(__('The supplier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
