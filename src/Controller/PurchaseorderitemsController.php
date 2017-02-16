<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Purchaseorderitems Controller
 *
 * @property \App\Model\Table\PurchaseorderitemsTable $Purchaseorderitems
 */
class PurchaseorderitemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Purchaseorders']
        ];
        $purchaseorderitems = $this->paginate($this->Purchaseorderitems);

        $this->set(compact('purchaseorderitems'));
        $this->set('_serialize', ['purchaseorderitems']);
    }

    /**
     * View method
     *
     * @param string|null $id Purchaseorderitem id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purchaseorderitem = $this->Purchaseorderitems->get($id, [
            'contain' => ['Purchaseorders']
        ]);

        $this->set('purchaseorderitem', $purchaseorderitem);
        $this->set('_serialize', ['purchaseorderitem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $purchaseorderitem = $this->Purchaseorderitems->newEntity();
        if ($this->request->is('post')) {
            $purchaseorderitem = $this->Purchaseorderitems->patchEntity($purchaseorderitem, $this->request->data);
            if ($this->Purchaseorderitems->save($purchaseorderitem)) {
                $this->Flash->success(__('The purchaseorderitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchaseorderitem could not be saved. Please, try again.'));
        }
        $purchaseorders = $this->Purchaseorderitems->Purchaseorders->find('list', ['limit' => 200]);
        $this->set(compact('purchaseorderitem', 'purchaseorders'));
        $this->set('_serialize', ['purchaseorderitem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Purchaseorderitem id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purchaseorderitem = $this->Purchaseorderitems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchaseorderitem = $this->Purchaseorderitems->patchEntity($purchaseorderitem, $this->request->data);
            if ($this->Purchaseorderitems->save($purchaseorderitem)) {
                $this->Flash->success(__('The purchaseorderitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchaseorderitem could not be saved. Please, try again.'));
        }
        $purchaseorders = $this->Purchaseorderitems->Purchaseorders->find('list', ['limit' => 200]);
        $this->set(compact('purchaseorderitem', 'purchaseorders'));
        $this->set('_serialize', ['purchaseorderitem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Purchaseorderitem id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purchaseorderitem = $this->Purchaseorderitems->get($id);
        if ($this->Purchaseorderitems->delete($purchaseorderitem)) {
            $this->Flash->success(__('The purchaseorderitem has been deleted.'));
        } else {
            $this->Flash->error(__('The purchaseorderitem could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
