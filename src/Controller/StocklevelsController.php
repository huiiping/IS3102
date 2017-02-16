<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Stocklevels Controller
 *
 * @property \App\Model\Table\StocklevelsTable $Stocklevels
 */
class StocklevelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Locations', 'Prodtypes']
        ];
        $stocklevels = $this->paginate($this->Stocklevels);

        $this->set(compact('stocklevels'));
        $this->set('_serialize', ['stocklevels']);
    }

    /**
     * View method
     *
     * @param string|null $id Stocklevel id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stocklevel = $this->Stocklevels->get($id, [
            'contain' => ['Locations', 'Prodtypes']
        ]);

        $this->set('stocklevel', $stocklevel);
        $this->set('_serialize', ['stocklevel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stocklevel = $this->Stocklevels->newEntity();
        if ($this->request->is('post')) {
            $stocklevel = $this->Stocklevels->patchEntity($stocklevel, $this->request->data);
            if ($this->Stocklevels->save($stocklevel)) {
                $this->Flash->success(__('The stocklevel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stocklevel could not be saved. Please, try again.'));
        }
        $locations = $this->Stocklevels->Locations->find('list', ['limit' => 200]);
        $prodtypes = $this->Stocklevels->Prodtypes->find('list', ['limit' => 200]);
        $this->set(compact('stocklevel', 'locations', 'prodtypes'));
        $this->set('_serialize', ['stocklevel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Stocklevel id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stocklevel = $this->Stocklevels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stocklevel = $this->Stocklevels->patchEntity($stocklevel, $this->request->data);
            if ($this->Stocklevels->save($stocklevel)) {
                $this->Flash->success(__('The stocklevel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stocklevel could not be saved. Please, try again.'));
        }
        $locations = $this->Stocklevels->Locations->find('list', ['limit' => 200]);
        $prodtypes = $this->Stocklevels->Prodtypes->find('list', ['limit' => 200]);
        $this->set(compact('stocklevel', 'locations', 'prodtypes'));
        $this->set('_serialize', ['stocklevel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Stocklevel id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stocklevel = $this->Stocklevels->get($id);
        if ($this->Stocklevels->delete($stocklevel)) {
            $this->Flash->success(__('The stocklevel has been deleted.'));
        } else {
            $this->Flash->error(__('The stocklevel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
