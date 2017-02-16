<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustomersRetaileremployees Controller
 *
 * @property \App\Model\Table\CustomersRetaileremployeesTable $CustomersRetaileremployees
 */
class CustomersRetaileremployeesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Retaileremployees']
        ];
        $customersRetaileremployees = $this->paginate($this->CustomersRetaileremployees);

        $this->set(compact('customersRetaileremployees'));
        $this->set('_serialize', ['customersRetaileremployees']);
    }

    /**
     * View method
     *
     * @param string|null $id Customers Retaileremployee id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customersRetaileremployee = $this->CustomersRetaileremployees->get($id, [
            'contain' => ['Customers', 'Retaileremployees']
        ]);

        $this->set('customersRetaileremployee', $customersRetaileremployee);
        $this->set('_serialize', ['customersRetaileremployee']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customersRetaileremployee = $this->CustomersRetaileremployees->newEntity();
        if ($this->request->is('post')) {
            $customersRetaileremployee = $this->CustomersRetaileremployees->patchEntity($customersRetaileremployee, $this->request->data);
            if ($this->CustomersRetaileremployees->save($customersRetaileremployee)) {
                $this->Flash->success(__('The customers retaileremployee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customers retaileremployee could not be saved. Please, try again.'));
        }
        $customers = $this->CustomersRetaileremployees->Customers->find('list', ['limit' => 200]);
        $retaileremployees = $this->CustomersRetaileremployees->Retaileremployees->find('list', ['limit' => 200]);
        $this->set(compact('customersRetaileremployee', 'customers', 'retaileremployees'));
        $this->set('_serialize', ['customersRetaileremployee']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Customers Retaileremployee id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customersRetaileremployee = $this->CustomersRetaileremployees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customersRetaileremployee = $this->CustomersRetaileremployees->patchEntity($customersRetaileremployee, $this->request->data);
            if ($this->CustomersRetaileremployees->save($customersRetaileremployee)) {
                $this->Flash->success(__('The customers retaileremployee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customers retaileremployee could not be saved. Please, try again.'));
        }
        $customers = $this->CustomersRetaileremployees->Customers->find('list', ['limit' => 200]);
        $retaileremployees = $this->CustomersRetaileremployees->Retaileremployees->find('list', ['limit' => 200]);
        $this->set(compact('customersRetaileremployee', 'customers', 'retaileremployees'));
        $this->set('_serialize', ['customersRetaileremployee']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customers Retaileremployee id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customersRetaileremployee = $this->CustomersRetaileremployees->get($id);
        if ($this->CustomersRetaileremployees->delete($customersRetaileremployee)) {
            $this->Flash->success(__('The customers retaileremployee has been deleted.'));
        } else {
            $this->Flash->error(__('The customers retaileremployee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
