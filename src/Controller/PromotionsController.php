<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Promotions Controller
 *
 * @property \App\Model\Table\PromotionsTable $Promotions
 */
class PromotionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Item1s', 'Item2s', 'ProdType1s', 'ProdType2s', 'ProdCats', 'Retaileremployees']
        ];
        $promotions = $this->paginate($this->Promotions);

        $this->set(compact('promotions'));
        $this->set('_serialize', ['promotions']);
    }

    /**
     * View method
     *
     * @param string|null $id Promotion id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $promotion = $this->Promotions->get($id, [
            'contain' => ['Item1s', 'Item2s', 'ProdType1s', 'ProdType2s', 'ProdCats', 'Retaileremployees', 'Locations', 'Transferorderitems']
        ]);

        $this->set('promotion', $promotion);
        $this->set('_serialize', ['promotion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $promotion = $this->Promotions->newEntity();
        if ($this->request->is('post')) {
            $promotion = $this->Promotions->patchEntity($promotion, $this->request->data);
            if ($this->Promotions->save($promotion)) {
                $this->Flash->success(__('The promotion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promotion could not be saved. Please, try again.'));
        }
        $item1s = $this->Promotions->Item1s->find('list', ['limit' => 200]);
        $item2s = $this->Promotions->Item2s->find('list', ['limit' => 200]);
        $prodType1s = $this->Promotions->ProdType1s->find('list', ['limit' => 200]);
        $prodType2s = $this->Promotions->ProdType2s->find('list', ['limit' => 200]);
        $prodCats = $this->Promotions->ProdCats->find('list', ['limit' => 200]);
        $retaileremployees = $this->Promotions->Retaileremployees->find('list', ['limit' => 200]);
        $locations = $this->Promotions->Locations->find('list', ['limit' => 200]);
        $this->set(compact('promotion', 'item1s', 'item2s', 'prodType1s', 'prodType2s', 'prodCats', 'retaileremployees', 'locations'));
        $this->set('_serialize', ['promotion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Promotion id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $promotion = $this->Promotions->get($id, [
            'contain' => ['Locations']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $promotion = $this->Promotions->patchEntity($promotion, $this->request->data);
            if ($this->Promotions->save($promotion)) {
                $this->Flash->success(__('The promotion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promotion could not be saved. Please, try again.'));
        }
        $item1s = $this->Promotions->Item1s->find('list', ['limit' => 200]);
        $item2s = $this->Promotions->Item2s->find('list', ['limit' => 200]);
        $prodType1s = $this->Promotions->ProdType1s->find('list', ['limit' => 200]);
        $prodType2s = $this->Promotions->ProdType2s->find('list', ['limit' => 200]);
        $prodCats = $this->Promotions->ProdCats->find('list', ['limit' => 200]);
        $retaileremployees = $this->Promotions->Retaileremployees->find('list', ['limit' => 200]);
        $locations = $this->Promotions->Locations->find('list', ['limit' => 200]);
        $this->set(compact('promotion', 'item1s', 'item2s', 'prodType1s', 'prodType2s', 'prodCats', 'retaileremployees', 'locations'));
        $this->set('_serialize', ['promotion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Promotion id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $promotion = $this->Promotions->get($id);
        if ($this->Promotions->delete($promotion)) {
            $this->Flash->success(__('The promotion has been deleted.'));
        } else {
            $this->Flash->error(__('The promotion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
