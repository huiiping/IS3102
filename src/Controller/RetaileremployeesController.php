<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Retaileremployees Controller
 *
 * @property \App\Model\Table\RetaileremployeesTable $Retaileremployees
 */
class RetaileremployeesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Locations']
        ];
        $retaileremployees = $this->paginate($this->Retaileremployees);

        $this->set(compact('retaileremployees'));
        $this->set('_serialize', ['retaileremployees']);
    }

    /**
     * View method
     *
     * @param string|null $id Retaileremployee id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retaileremployee = $this->Retaileremployees->get($id, [
            'contain' => ['Locations', 'Custmembershiptiers', 'Customers', 'Employeeroles', 'Suppliermemos', 'Transactions', 'Transferorders']
        ]);

        $this->set('retaileremployee', $retaileremployee);
        $this->set('_serialize', ['retaileremployee']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retaileremployee = $this->Retaileremployees->newEntity();
        if ($this->request->is('post')) {
            $retaileremployee = $this->Retaileremployees->patchEntity($retaileremployee, $this->request->data);
            if ($this->Retaileremployees->save($retaileremployee)) {
                $this->Flash->success(__('The retaileremployee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retaileremployee could not be saved. Please, try again.'));
        }
        $locations = $this->Retaileremployees->Locations->find('list', ['limit' => 200]);
        $custmembershiptiers = $this->Retaileremployees->Custmembershiptiers->find('list', ['limit' => 200]);
        $customers = $this->Retaileremployees->Customers->find('list', ['limit' => 200]);
        $employeeroles = $this->Retaileremployees->Employeeroles->find('list', ['limit' => 200]);
        $suppliermemos = $this->Retaileremployees->Suppliermemos->find('list', ['limit' => 200]);
        $transactions = $this->Retaileremployees->Transactions->find('list', ['limit' => 200]);
        $transferorders = $this->Retaileremployees->Transferorders->find('list', ['limit' => 200]);
        $this->set(compact('retaileremployee', 'locations', 'custmembershiptiers', 'customers', 'employeeroles', 'suppliermemos', 'transactions', 'transferorders'));
        $this->set('_serialize', ['retaileremployee']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retaileremployee id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retaileremployee = $this->Retaileremployees->get($id, [
            'contain' => ['Custmembershiptiers', 'Customers', 'Employeeroles', 'Suppliermemos', 'Transactions', 'Transferorders']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retaileremployee = $this->Retaileremployees->patchEntity($retaileremployee, $this->request->data);
            if ($this->Retaileremployees->save($retaileremployee)) {
                $this->Flash->success(__('The retaileremployee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retaileremployee could not be saved. Please, try again.'));
        }
        $locations = $this->Retaileremployees->Locations->find('list', ['limit' => 200]);
        $custmembershiptiers = $this->Retaileremployees->Custmembershiptiers->find('list', ['limit' => 200]);
        $customers = $this->Retaileremployees->Customers->find('list', ['limit' => 200]);
        $employeeroles = $this->Retaileremployees->Employeeroles->find('list', ['limit' => 200]);
        $suppliermemos = $this->Retaileremployees->Suppliermemos->find('list', ['limit' => 200]);
        $transactions = $this->Retaileremployees->Transactions->find('list', ['limit' => 200]);
        $transferorders = $this->Retaileremployees->Transferorders->find('list', ['limit' => 200]);
        $this->set(compact('retaileremployee', 'locations', 'custmembershiptiers', 'customers', 'employeeroles', 'suppliermemos', 'transactions', 'transferorders'));
        $this->set('_serialize', ['retaileremployee']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retaileremployee id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retaileremployee = $this->Retaileremployees->get($id);
        if ($this->Retaileremployees->delete($retaileremployee)) {
            $this->Flash->success(__('The retaileremployee has been deleted.'));
        } else {
            $this->Flash->error(__('The retaileremployee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
