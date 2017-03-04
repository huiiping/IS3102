<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * SupplierMemos Controller
 *
 * @property \App\Model\Table\SupplierMemosTable $SupplierMemos
 */
class SupplierMemosController extends AppController
{

    public function beforeFilter(Event $event)
    {

        $this->loadComponent('Logging');
        
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        $this->loadComponent('Prg');
        $this->Prg->commonProcess();
        $this->paginate = [
            'contain' => ['Suppliers', 'RetailerEmployees']
        ];

        $this->set('supplierMemos', $this->paginate($this->SupplierMemos->find('searchable', $this->Prg->parsedParams())));

        $this->set(compact('supplierMemos'));
        $this->set('_serialize', ['supplierMemos']);
    }
    public $components = array(
        'Prg'
    );


    /**
     * View method
     *
     * @param string|null $id Supplier Memo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supplierMemo = $this->SupplierMemos->get($id, [
            'contain' => ['Suppliers', 'RetailerEmployees']
        ]);

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        $this->Logging->rLog($supplierMemo['id']);
        $this->Logging->iLog($retailer, $supplierMemo['id']);

        $this->set('supplierMemo', $supplierMemo);
        $this->set('_serialize', ['supplierMemo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $supplierMemo = $this->SupplierMemos->newEntity();
        if ($this->request->is('post')) {
            $supplierMemo = $this->SupplierMemos->patchEntity($supplierMemo, $this->request->data);
            if ($this->SupplierMemos->save($supplierMemo)) {
                $this->Flash->success(__('The supplier memo has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($supplierMemo['id']);
                $this->Logging->iLog($retailer, $supplierMemo['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier memo could not be saved. Please, try again.'));
        }
        $suppliers = $this->SupplierMemos->Suppliers->find('list', ['limit' => 200]);
        $retailerEmployees = $this->SupplierMemos->RetailerEmployees->find('list', ['limit' => 200]);
        $this->set(compact('supplierMemo', 'suppliers', 'retailerEmployees'));
        $this->set('_serialize', ['supplierMemo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Supplier Memo id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $supplierMemo = $this->SupplierMemos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supplierMemo = $this->SupplierMemos->patchEntity($supplierMemo, $this->request->data);
            if ($this->SupplierMemos->save($supplierMemo)) {
                $this->Flash->success(__('The supplier memo has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($supplierMemo['id']);
                $this->Logging->iLog($retailer, $supplierMemo['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier memo could not be saved. Please, try again.'));
        }
        $suppliers = $this->SupplierMemos->Suppliers->find('list', ['limit' => 200]);
        $retailerEmployees = $this->SupplierMemos->RetailerEmployees->find('list', ['limit' => 200]);
        $this->set(compact('supplierMemo', 'suppliers', 'retailerEmployees'));
        $this->set('_serialize', ['supplierMemo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Supplier Memo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supplierMemo = $this->SupplierMemos->get($id);
        if ($this->SupplierMemos->delete($supplierMemo)) {
            $this->Flash->success(__('The supplier memo has been deleted.'));

            $session = $this->request->session();
            $retailer = $session->read('retailer');

            //$this->loadComponent('Logging');
            $this->Logging->rLog($supplierMemo['id']);
            $this->Logging->iLog($retailer, $supplierMemo['id']);
        
        } else {
            $this->Flash->error(__('The supplier memo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
