<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RfqsSuppliers Controller
 *
 * @property \App\Model\Table\RfqsSuppliersTable $RfqsSuppliers
 */
class RfqsSuppliersController extends AppController
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
        $rfqsSuppliers = $this->paginate($this->RfqsSuppliers);

        $this->set(compact('rfqsSuppliers'));
        $this->set('_serialize', ['rfqsSuppliers']);
    }

    /**
     * View method
     *
     * @param string|null $id Rfqs Supplier id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rfqsSupplier = $this->RfqsSuppliers->get($id, [
            'contain' => ['Rfqs', 'Suppliers']
        ]);

        $this->set('rfqsSupplier', $rfqsSupplier);
        $this->set('_serialize', ['rfqsSupplier']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rfqsSupplier = $this->RfqsSuppliers->newEntity();
        if ($this->request->is('post')) {
            $rfqsSupplier = $this->RfqsSuppliers->patchEntity($rfqsSupplier, $this->request->getData());
            if ($this->RfqsSuppliers->save($rfqsSupplier)) {
                $this->Flash->success(__('The rfqs supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rfqs supplier could not be saved. Please, try again.'));
        }
        $rfqs = $this->RfqsSuppliers->Rfqs->find('list', ['limit' => 200]);
        $suppliers = $this->RfqsSuppliers->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('rfqsSupplier', 'rfqs', 'suppliers'));
        $this->set('_serialize', ['rfqsSupplier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rfqs Supplier id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rfqsSupplier = $this->RfqsSuppliers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rfqsSupplier = $this->RfqsSuppliers->patchEntity($rfqsSupplier, $this->request->getData());
            if ($this->RfqsSuppliers->save($rfqsSupplier)) {
                $this->Flash->success(__('The rfqs supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rfqs supplier could not be saved. Please, try again.'));
        }
        $rfqs = $this->RfqsSuppliers->Rfqs->find('list', ['limit' => 200]);
        $suppliers = $this->RfqsSuppliers->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('rfqsSupplier', 'rfqs', 'suppliers'));
        $this->set('_serialize', ['rfqsSupplier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rfqs Supplier id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rfqsSupplier = $this->RfqsSuppliers->get($id);
        if ($this->RfqsSuppliers->delete($rfqsSupplier)) {
            $this->Flash->success(__('The rfqs supplier has been deleted.'));
        } else {
            $this->Flash->error(__('The rfqs supplier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
