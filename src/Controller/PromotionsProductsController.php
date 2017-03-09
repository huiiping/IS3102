<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PromotionsProducts Controller
 *
 * @property \App\Model\Table\PromotionsProductsTable $PromotionsProducts
 */
class PromotionsProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Promotions', 'Products']
        ];
        $promotionsProducts = $this->paginate($this->PromotionsProducts);

        $this->set(compact('promotionsProducts'));
        $this->set('_serialize', ['promotionsProducts']);
    }

    /**
     * View method
     *
     * @param string|null $id Promotions Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $promotionsProduct = $this->PromotionsProducts->get($id, [
            'contain' => ['Promotions', 'Products']
        ]);

        $this->set('promotionsProduct', $promotionsProduct);
        $this->set('_serialize', ['promotionsProduct']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $promotionsProduct = $this->PromotionsProducts->newEntity();
        if ($this->request->is('post')) {
            $promotionsProduct = $this->PromotionsProducts->patchEntity($promotionsProduct, $this->request->data);
            if ($this->PromotionsProducts->save($promotionsProduct)) {
                $this->Flash->success(__('The promotions product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promotions product could not be saved. Please, try again.'));
        }
        $promotions = $this->PromotionsProducts->Promotions->find('list', ['limit' => 200]);
        $products = $this->PromotionsProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('promotionsProduct', 'promotions', 'products'));
        $this->set('_serialize', ['promotionsProduct']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Promotions Product id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $promotionsProduct = $this->PromotionsProducts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $promotionsProduct = $this->PromotionsProducts->patchEntity($promotionsProduct, $this->request->data);
            if ($this->PromotionsProducts->save($promotionsProduct)) {
                $this->Flash->success(__('The promotions product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promotions product could not be saved. Please, try again.'));
        }
        $promotions = $this->PromotionsProducts->Promotions->find('list', ['limit' => 200]);
        $products = $this->PromotionsProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('promotionsProduct', 'promotions', 'products'));
        $this->set('_serialize', ['promotionsProduct']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Promotions Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $promotionsProduct = $this->PromotionsProducts->get($id);
        if ($this->PromotionsProducts->delete($promotionsProduct)) {
            $this->Flash->success(__('The promotions product has been deleted.'));
        } else {
            $this->Flash->error(__('The promotions product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
