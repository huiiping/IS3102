<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Promotionemails Controller
 *
 * @property \App\Model\Table\PromotionemailsTable $Promotionemails
 */
class PromotionemailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Retaileremployees']
        ];
        $promotionemails = $this->paginate($this->Promotionemails);

        $this->set(compact('promotionemails'));
        $this->set('_serialize', ['promotionemails']);
    }

    /**
     * View method
     *
     * @param string|null $id Promotionemail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $promotionemail = $this->Promotionemails->get($id, [
            'contain' => ['Retaileremployees', 'Customers']
        ]);

        $this->set('promotionemail', $promotionemail);
        $this->set('_serialize', ['promotionemail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $promotionemail = $this->Promotionemails->newEntity();
        if ($this->request->is('post')) {
            $promotionemail = $this->Promotionemails->patchEntity($promotionemail, $this->request->data);
            if ($this->Promotionemails->save($promotionemail)) {
                $this->Flash->success(__('The promotionemail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promotionemail could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->Promotionemails->Retaileremployees->find('list', ['limit' => 200]);
        $customers = $this->Promotionemails->Customers->find('list', ['limit' => 200]);
        $this->set(compact('promotionemail', 'retaileremployees', 'customers'));
        $this->set('_serialize', ['promotionemail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Promotionemail id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $promotionemail = $this->Promotionemails->get($id, [
            'contain' => ['Customers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $promotionemail = $this->Promotionemails->patchEntity($promotionemail, $this->request->data);
            if ($this->Promotionemails->save($promotionemail)) {
                $this->Flash->success(__('The promotionemail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promotionemail could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->Promotionemails->Retaileremployees->find('list', ['limit' => 200]);
        $customers = $this->Promotionemails->Customers->find('list', ['limit' => 200]);
        $this->set(compact('promotionemail', 'retaileremployees', 'customers'));
        $this->set('_serialize', ['promotionemail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Promotionemail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $promotionemail = $this->Promotionemails->get($id);
        if ($this->Promotionemails->delete($promotionemail)) {
            $this->Flash->success(__('The promotionemail has been deleted.'));
        } else {
            $this->Flash->error(__('The promotionemail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
