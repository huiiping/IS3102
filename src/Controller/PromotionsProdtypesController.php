<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PromotionsProdtypes Controller
 *
 * @property \App\Model\Table\PromotionsProdtypesTable $PromotionsProdtypes
 */
class PromotionsProdtypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Promotions', 'Prodtypes']
        ];
        $promotionsProdtypes = $this->paginate($this->PromotionsProdtypes);

        $this->set(compact('promotionsProdtypes'));
        $this->set('_serialize', ['promotionsProdtypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Promotions Prodtype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $promotionsProdtype = $this->PromotionsProdtypes->get($id, [
            'contain' => ['Promotions', 'Prodtypes']
        ]);

        $this->set('promotionsProdtype', $promotionsProdtype);
        $this->set('_serialize', ['promotionsProdtype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $promotionsProdtype = $this->PromotionsProdtypes->newEntity();
        if ($this->request->is('post')) {
            $promotionsProdtype = $this->PromotionsProdtypes->patchEntity($promotionsProdtype, $this->request->data);
            if ($this->PromotionsProdtypes->save($promotionsProdtype)) {
                $this->Flash->success(__('The promotions prodtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promotions prodtype could not be saved. Please, try again.'));
        }
        $promotions = $this->PromotionsProdtypes->Promotions->find('list', ['limit' => 200]);
        $prodtypes = $this->PromotionsProdtypes->Prodtypes->find('list', ['limit' => 200]);
        $this->set(compact('promotionsProdtype', 'promotions', 'prodtypes'));
        $this->set('_serialize', ['promotionsProdtype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Promotions Prodtype id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $promotionsProdtype = $this->PromotionsProdtypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $promotionsProdtype = $this->PromotionsProdtypes->patchEntity($promotionsProdtype, $this->request->data);
            if ($this->PromotionsProdtypes->save($promotionsProdtype)) {
                $this->Flash->success(__('The promotions prodtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promotions prodtype could not be saved. Please, try again.'));
        }
        $promotions = $this->PromotionsProdtypes->Promotions->find('list', ['limit' => 200]);
        $prodtypes = $this->PromotionsProdtypes->Prodtypes->find('list', ['limit' => 200]);
        $this->set(compact('promotionsProdtype', 'promotions', 'prodtypes'));
        $this->set('_serialize', ['promotionsProdtype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Promotions Prodtype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $promotionsProdtype = $this->PromotionsProdtypes->get($id);
        if ($this->PromotionsProdtypes->delete($promotionsProdtype)) {
            $this->Flash->success(__('The promotions prodtype has been deleted.'));
        } else {
            $this->Flash->error(__('The promotions prodtype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
