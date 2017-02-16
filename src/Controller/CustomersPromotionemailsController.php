<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustomersPromotionemails Controller
 *
 * @property \App\Model\Table\CustomersPromotionemailsTable $CustomersPromotionemails
 */
class CustomersPromotionemailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Promotionemails']
        ];
        $customersPromotionemails = $this->paginate($this->CustomersPromotionemails);

        $this->set(compact('customersPromotionemails'));
        $this->set('_serialize', ['customersPromotionemails']);
    }

    /**
     * View method
     *
     * @param string|null $id Customers Promotionemail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customersPromotionemail = $this->CustomersPromotionemails->get($id, [
            'contain' => ['Customers', 'Promotionemails']
        ]);

        $this->set('customersPromotionemail', $customersPromotionemail);
        $this->set('_serialize', ['customersPromotionemail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customersPromotionemail = $this->CustomersPromotionemails->newEntity();
        if ($this->request->is('post')) {
            $customersPromotionemail = $this->CustomersPromotionemails->patchEntity($customersPromotionemail, $this->request->data);
            if ($this->CustomersPromotionemails->save($customersPromotionemail)) {
                $this->Flash->success(__('The customers promotionemail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customers promotionemail could not be saved. Please, try again.'));
        }
        $customers = $this->CustomersPromotionemails->Customers->find('list', ['limit' => 200]);
        $promotionemails = $this->CustomersPromotionemails->Promotionemails->find('list', ['limit' => 200]);
        $this->set(compact('customersPromotionemail', 'customers', 'promotionemails'));
        $this->set('_serialize', ['customersPromotionemail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Customers Promotionemail id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customersPromotionemail = $this->CustomersPromotionemails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customersPromotionemail = $this->CustomersPromotionemails->patchEntity($customersPromotionemail, $this->request->data);
            if ($this->CustomersPromotionemails->save($customersPromotionemail)) {
                $this->Flash->success(__('The customers promotionemail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customers promotionemail could not be saved. Please, try again.'));
        }
        $customers = $this->CustomersPromotionemails->Customers->find('list', ['limit' => 200]);
        $promotionemails = $this->CustomersPromotionemails->Promotionemails->find('list', ['limit' => 200]);
        $this->set(compact('customersPromotionemail', 'customers', 'promotionemails'));
        $this->set('_serialize', ['customersPromotionemail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customers Promotionemail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customersPromotionemail = $this->CustomersPromotionemails->get($id);
        if ($this->CustomersPromotionemails->delete($customersPromotionemail)) {
            $this->Flash->success(__('The customers promotionemail has been deleted.'));
        } else {
            $this->Flash->error(__('The customers promotionemail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
