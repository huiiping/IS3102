<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Transferorderitems Controller
 *
 * @property \App\Model\Table\TransferorderitemsTable $Transferorderitems
 */
class TransferorderitemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Items', 'Transferorders', 'Promotions']
        ];
        $transferorderitems = $this->paginate($this->Transferorderitems);

        $this->set(compact('transferorderitems'));
        $this->set('_serialize', ['transferorderitems']);
    }

    /**
     * View method
     *
     * @param string|null $id Transferorderitem id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transferorderitem = $this->Transferorderitems->get($id, [
            'contain' => ['Items', 'Transferorders', 'Promotions']
        ]);

        $this->set('transferorderitem', $transferorderitem);
        $this->set('_serialize', ['transferorderitem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transferorderitem = $this->Transferorderitems->newEntity();
        if ($this->request->is('post')) {
            $transferorderitem = $this->Transferorderitems->patchEntity($transferorderitem, $this->request->data);
            if ($this->Transferorderitems->save($transferorderitem)) {
                $this->Flash->success(__('The transferorderitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transferorderitem could not be saved. Please, try again.'));
        }
        $items = $this->Transferorderitems->Items->find('list', ['limit' => 200]);
        $transferorders = $this->Transferorderitems->Transferorders->find('list', ['limit' => 200]);
        $promotions = $this->Transferorderitems->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('transferorderitem', 'items', 'transferorders', 'promotions'));
        $this->set('_serialize', ['transferorderitem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Transferorderitem id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transferorderitem = $this->Transferorderitems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transferorderitem = $this->Transferorderitems->patchEntity($transferorderitem, $this->request->data);
            if ($this->Transferorderitems->save($transferorderitem)) {
                $this->Flash->success(__('The transferorderitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transferorderitem could not be saved. Please, try again.'));
        }
        $items = $this->Transferorderitems->Items->find('list', ['limit' => 200]);
        $transferorders = $this->Transferorderitems->Transferorders->find('list', ['limit' => 200]);
        $promotions = $this->Transferorderitems->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('transferorderitem', 'items', 'transferorders', 'promotions'));
        $this->set('_serialize', ['transferorderitem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Transferorderitem id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transferorderitem = $this->Transferorderitems->get($id);
        if ($this->Transferorderitems->delete($transferorderitem)) {
            $this->Flash->success(__('The transferorderitem has been deleted.'));
        } else {
            $this->Flash->error(__('The transferorderitem could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
