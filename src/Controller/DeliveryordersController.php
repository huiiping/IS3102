<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Deliveryorders Controller
 *
 * @property \App\Model\Table\DeliveryordersTable $Deliveryorders
 */
class DeliveryordersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Transactions']
        ];
        $deliveryorders = $this->paginate($this->Deliveryorders);

        $this->set(compact('deliveryorders'));
        $this->set('_serialize', ['deliveryorders']);
    }

    /**
     * View method
     *
     * @param string|null $id Deliveryorder id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deliveryorder = $this->Deliveryorders->get($id, [
            'contain' => ['Transactions']
        ]);

        $this->set('deliveryorder', $deliveryorder);
        $this->set('_serialize', ['deliveryorder']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deliveryorder = $this->Deliveryorders->newEntity();
        if ($this->request->is('post')) {
            $deliveryorder = $this->Deliveryorders->patchEntity($deliveryorder, $this->request->data);
            if ($this->Deliveryorders->save($deliveryorder)) {
                $this->Flash->success(__('The deliveryorder has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deliveryorder could not be saved. Please, try again.'));
        }
        $transactions = $this->Deliveryorders->Transactions->find('list', ['limit' => 200]);
        $this->set(compact('deliveryorder', 'transactions'));
        $this->set('_serialize', ['deliveryorder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Deliveryorder id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deliveryorder = $this->Deliveryorders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deliveryorder = $this->Deliveryorders->patchEntity($deliveryorder, $this->request->data);
            if ($this->Deliveryorders->save($deliveryorder)) {
                $this->Flash->success(__('The deliveryorder has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deliveryorder could not be saved. Please, try again.'));
        }
        $transactions = $this->Deliveryorders->Transactions->find('list', ['limit' => 200]);
        $this->set(compact('deliveryorder', 'transactions'));
        $this->set('_serialize', ['deliveryorder']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Deliveryorder id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deliveryorder = $this->Deliveryorders->get($id);
        if ($this->Deliveryorders->delete($deliveryorder)) {
            $this->Flash->success(__('The deliveryorder has been deleted.'));
        } else {
            $this->Flash->error(__('The deliveryorder could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
