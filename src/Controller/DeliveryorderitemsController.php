<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Deliveryorderitems Controller
 *
 * @property \App\Model\Table\DeliveryorderitemsTable $Deliveryorderitems
 */
class DeliveryorderitemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Items', 'Deliveryorders']
        ];
        $deliveryorderitems = $this->paginate($this->Deliveryorderitems);

        $this->set(compact('deliveryorderitems'));
        $this->set('_serialize', ['deliveryorderitems']);
    }

    /**
     * View method
     *
     * @param string|null $id Deliveryorderitem id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deliveryorderitem = $this->Deliveryorderitems->get($id, [
            'contain' => ['Items', 'Deliveryorders']
        ]);

        $this->set('deliveryorderitem', $deliveryorderitem);
        $this->set('_serialize', ['deliveryorderitem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deliveryorderitem = $this->Deliveryorderitems->newEntity();
        if ($this->request->is('post')) {
            $deliveryorderitem = $this->Deliveryorderitems->patchEntity($deliveryorderitem, $this->request->data);
            if ($this->Deliveryorderitems->save($deliveryorderitem)) {
                $this->Flash->success(__('The deliveryorderitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deliveryorderitem could not be saved. Please, try again.'));
        }
        $items = $this->Deliveryorderitems->Items->find('list', ['limit' => 200]);
        $deliveryorders = $this->Deliveryorderitems->Deliveryorders->find('list', ['limit' => 200]);
        $this->set(compact('deliveryorderitem', 'items', 'deliveryorders'));
        $this->set('_serialize', ['deliveryorderitem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Deliveryorderitem id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deliveryorderitem = $this->Deliveryorderitems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deliveryorderitem = $this->Deliveryorderitems->patchEntity($deliveryorderitem, $this->request->data);
            if ($this->Deliveryorderitems->save($deliveryorderitem)) {
                $this->Flash->success(__('The deliveryorderitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deliveryorderitem could not be saved. Please, try again.'));
        }
        $items = $this->Deliveryorderitems->Items->find('list', ['limit' => 200]);
        $deliveryorders = $this->Deliveryorderitems->Deliveryorders->find('list', ['limit' => 200]);
        $this->set(compact('deliveryorderitem', 'items', 'deliveryorders'));
        $this->set('_serialize', ['deliveryorderitem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Deliveryorderitem id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deliveryorderitem = $this->Deliveryorderitems->get($id);
        if ($this->Deliveryorderitems->delete($deliveryorderitem)) {
            $this->Flash->success(__('The deliveryorderitem has been deleted.'));
        } else {
            $this->Flash->error(__('The deliveryorderitem could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
