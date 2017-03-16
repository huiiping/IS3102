<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StockLevels Controller
 *
 * @property \App\Model\Table\StockLevelsTable $StockLevels
 */
class StockLevelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Locations', 'Products', 'RetailerEmployees']
        ];
        $stockLevels = $this->paginate($this->StockLevels);

        $this->set(compact('stockLevels'));
        $this->set('_serialize', ['stockLevels']);
    }

    /**
     * View method
     *
     * @param string|null $id Stock Level id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stockLevel = $this->StockLevels->get($id, [
            'contain' => ['Locations', 'Products', 'RetailerEmployees']
        ]);

        $this->set('stockLevel', $stockLevel);
        $this->set('_serialize', ['stockLevel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stockLevel = $this->StockLevels->newEntity();
        if ($this->request->is('post')) {
            $stockLevel = $this->StockLevels->patchEntity($stockLevel, $this->request->getData());
            if ($this->StockLevels->save($stockLevel)) {
                $this->Flash->success(__('The stock level has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stock level could not be saved. Please, try again.'));
        }
        $locations = $this->StockLevels->Locations->find('list', ['limit' => 200]);
        $products = $this->StockLevels->Products->find('list', ['limit' => 200]);
        $retailerEmployees = $this->StockLevels->RetailerEmployees->find('list', ['limit' => 200]);
        $this->set(compact('stockLevel', 'locations', 'products', 'retailerEmployees'));
        $this->set('_serialize', ['stockLevel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Stock Level id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stockLevel = $this->StockLevels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stockLevel = $this->StockLevels->patchEntity($stockLevel, $this->request->getData());
            if ($this->StockLevels->save($stockLevel)) {
                $this->Flash->success(__('The stock level has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stock level could not be saved. Please, try again.'));
        }
        $locations = $this->StockLevels->Locations->find('list', ['limit' => 200]);
        $products = $this->StockLevels->Products->find('list', ['limit' => 200]);
        $retailerEmployees = $this->StockLevels->RetailerEmployees->find('list', ['limit' => 200]);
        $this->set(compact('stockLevel', 'locations', 'products', 'retailerEmployees'));
        $this->set('_serialize', ['stockLevel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Stock Level id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stockLevel = $this->StockLevels->get($id);
        if ($this->StockLevels->delete($stockLevel)) {
            $this->Flash->success(__('The stock level has been deleted.'));
        } else {
            $this->Flash->error(__('The stock level could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
