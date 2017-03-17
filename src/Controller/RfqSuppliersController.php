<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RfqSuppliers Controller
 *
 * @property \App\Model\Table\RfqSuppliersTable $RfqSuppliers
 */
class RfqSuppliersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Rfqs', 'Suppliers']
        ];
        $rfqSuppliers = $this->paginate($this->RfqSuppliers);

        $this->set(compact('rfqSuppliers'));
        $this->set('_serialize', ['rfqSuppliers']);
    }

    /**
     * View method
     *
     * @param string|null $id Rfq Supplier id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rfqSupplier = $this->RfqSuppliers->get($id, [
            'contain' => ['Rfqs', 'Suppliers']
        ]);

        $this->set('rfqSupplier', $rfqSupplier);
        $this->set('_serialize', ['rfqSupplier']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rfqSupplier = $this->RfqSuppliers->newEntity();
        if ($this->request->is('post')) {
            $rfqSupplier = $this->RfqSuppliers->patchEntity($rfqSupplier, $this->request->getData());
            if ($this->RfqSuppliers->save($rfqSupplier)) {
                $this->Flash->success(__('The rfq supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rfq supplier could not be saved. Please, try again.'));
        }
        $rfqs = $this->RfqSuppliers->Rfqs->find('list', ['limit' => 200]);
        $suppliers = $this->RfqSuppliers->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('rfqSupplier', 'rfqs', 'suppliers'));
        $this->set('_serialize', ['rfqSupplier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rfq Supplier id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rfqSupplier = $this->RfqSuppliers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rfqSupplier = $this->RfqSuppliers->patchEntity($rfqSupplier, $this->request->getData());
            if ($this->RfqSuppliers->save($rfqSupplier)) {
                $this->Flash->success(__('The rfq supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rfq supplier could not be saved. Please, try again.'));
        }
        $rfqs = $this->RfqSuppliers->Rfqs->find('list', ['limit' => 200]);
        $suppliers = $this->RfqSuppliers->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('rfqSupplier', 'rfqs', 'suppliers'));
        $this->set('_serialize', ['rfqSupplier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rfq Supplier id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rfqSupplier = $this->RfqSuppliers->get($id);
        if ($this->RfqSuppliers->delete($rfqSupplier)) {
            $this->Flash->success(__('The rfq supplier has been deleted.'));
        } else {
            $this->Flash->error(__('The rfq supplier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
