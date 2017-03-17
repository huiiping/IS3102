<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rfqs Controller
 *
 * @property \App\Model\Table\RfqsTable $Rfqs
 */
class RfqsController extends AppController
{

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
            'contain' => ['RetailerEmployees']
        ];
        $this->set('rfqs', $this->paginate($this->Rfqs->find('searchable', $this->Prg->parsedParams())));

        $this->set(compact('rfqs'));
        $this->set('_serialize', ['rfqs']);
    }

    public $components = array(
        'Prg'
    );

    /**
     * View method
     *
     * @param string|null $id Rfq id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rfq = $this->Rfqs->get($id, [
            'contain' => ['RetailerEmployees', 'Suppliers', 'RfqsSuppliers']
        ]);

        $this->set('rfq', $rfq);
        $this->set('_serialize', ['rfq']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rfq = $this->Rfqs->newEntity();
        if ($this->request->is('post')) {
            $rfq = $this->Rfqs->patchEntity($rfq, $this->request->getData());
            if ($this->Rfqs->save($rfq)) {
                $this->Flash->success(__('The rfq has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rfq could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->Rfqs->RetailerEmployees->find('list', ['limit' => 200]);
        $this->set('suppliers', $this->Rfqs->Suppliers->find('all'));
        $this->set(compact('rfq', 'retailerEmployees', 'suppliers'));
        $this->set('_serialize', ['rfq']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rfq id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rfq = $this->Rfqs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rfq = $this->Rfqs->patchEntity($rfq, $this->request->getData());
            if ($this->Rfqs->save($rfq)) {
                $this->Flash->success(__('The rfq has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rfq could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->Rfqs->RetailerEmployees->find('list', ['limit' => 200]);
        $this->set(compact('rfq', 'retailerEmployees'));
        $this->set('_serialize', ['rfq']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rfq id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rfq = $this->Rfqs->get($id);
        if ($this->Rfqs->delete($rfq)) {
            $this->Flash->success(__('The rfq has been deleted.'));
        } else {
            $this->Flash->error(__('The rfq could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
