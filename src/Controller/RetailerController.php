<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Retailer Controller
 *
 * @property \App\Model\Table\RetailerTable $Retailer
 */
class RetailerController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $retailer = $this->paginate($this->Retailer);

        $this->set(compact('retailer'));
        $this->set('_serialize', ['retailer']);
    }

    /**
     * View method
     *
     * @param string|null $id Retailer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retailer = $this->Retailer->get($id, [
            'contain' => []
        ]);

        $this->set('retailer', $retailer);
        $this->set('_serialize', ['retailer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retailer = $this->Retailer->newEntity();
        if ($this->request->is('post')) {
            $retailer = $this->Retailer->patchEntity($retailer, $this->request->data);
            if ($this->Retailer->save($retailer)) {
                $this->Flash->success(__('The retailer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer could not be saved. Please, try again.'));
        }
        $this->set(compact('retailer'));
        $this->set('_serialize', ['retailer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retailer id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retailer = $this->Retailer->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retailer = $this->Retailer->patchEntity($retailer, $this->request->data);
            if ($this->Retailer->save($retailer)) {
                $this->Flash->success(__('The retailer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer could not be saved. Please, try again.'));
        }
        $this->set(compact('retailer'));
        $this->set('_serialize', ['retailer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retailer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retailer = $this->Retailer->get($id);
        if ($this->Retailer->delete($retailer)) {
            $this->Flash->success(__('The retailer has been deleted.'));
        } else {
            $this->Flash->error(__('The retailer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
