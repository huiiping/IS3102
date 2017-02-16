<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustmembershiptiersRetaileremployees Controller
 *
 * @property \App\Model\Table\CustmembershiptiersRetaileremployeesTable $CustmembershiptiersRetaileremployees
 */
class CustmembershiptiersRetaileremployeesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Custmembershiptiers', 'Retaileremployees']
        ];
        $custmembershiptiersRetaileremployees = $this->paginate($this->CustmembershiptiersRetaileremployees);

        $this->set(compact('custmembershiptiersRetaileremployees'));
        $this->set('_serialize', ['custmembershiptiersRetaileremployees']);
    }

    /**
     * View method
     *
     * @param string|null $id Custmembershiptiers Retaileremployee id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $custmembershiptiersRetaileremployee = $this->CustmembershiptiersRetaileremployees->get($id, [
            'contain' => ['Custmembershiptiers', 'Retaileremployees']
        ]);

        $this->set('custmembershiptiersRetaileremployee', $custmembershiptiersRetaileremployee);
        $this->set('_serialize', ['custmembershiptiersRetaileremployee']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $custmembershiptiersRetaileremployee = $this->CustmembershiptiersRetaileremployees->newEntity();
        if ($this->request->is('post')) {
            $custmembershiptiersRetaileremployee = $this->CustmembershiptiersRetaileremployees->patchEntity($custmembershiptiersRetaileremployee, $this->request->data);
            if ($this->CustmembershiptiersRetaileremployees->save($custmembershiptiersRetaileremployee)) {
                $this->Flash->success(__('The custmembershiptiers retaileremployee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The custmembershiptiers retaileremployee could not be saved. Please, try again.'));
        }
        $custmembershiptiers = $this->CustmembershiptiersRetaileremployees->Custmembershiptiers->find('list', ['limit' => 200]);
        $retaileremployees = $this->CustmembershiptiersRetaileremployees->Retaileremployees->find('list', ['limit' => 200]);
        $this->set(compact('custmembershiptiersRetaileremployee', 'custmembershiptiers', 'retaileremployees'));
        $this->set('_serialize', ['custmembershiptiersRetaileremployee']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Custmembershiptiers Retaileremployee id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $custmembershiptiersRetaileremployee = $this->CustmembershiptiersRetaileremployees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $custmembershiptiersRetaileremployee = $this->CustmembershiptiersRetaileremployees->patchEntity($custmembershiptiersRetaileremployee, $this->request->data);
            if ($this->CustmembershiptiersRetaileremployees->save($custmembershiptiersRetaileremployee)) {
                $this->Flash->success(__('The custmembershiptiers retaileremployee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The custmembershiptiers retaileremployee could not be saved. Please, try again.'));
        }
        $custmembershiptiers = $this->CustmembershiptiersRetaileremployees->Custmembershiptiers->find('list', ['limit' => 200]);
        $retaileremployees = $this->CustmembershiptiersRetaileremployees->Retaileremployees->find('list', ['limit' => 200]);
        $this->set(compact('custmembershiptiersRetaileremployee', 'custmembershiptiers', 'retaileremployees'));
        $this->set('_serialize', ['custmembershiptiersRetaileremployee']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Custmembershiptiers Retaileremployee id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $custmembershiptiersRetaileremployee = $this->CustmembershiptiersRetaileremployees->get($id);
        if ($this->CustmembershiptiersRetaileremployees->delete($custmembershiptiersRetaileremployee)) {
            $this->Flash->success(__('The custmembershiptiers retaileremployee has been deleted.'));
        } else {
            $this->Flash->error(__('The custmembershiptiers retaileremployee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
