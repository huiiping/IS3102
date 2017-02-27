<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PromotionsProdTypes Controller
 *
 * @property \App\Model\Table\PromotionsProdTypesTable $PromotionsProdTypes
 */
class PromotionsProdTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Promotions', 'ProdTypes']
        ];
        $promotionsProdTypes = $this->paginate($this->PromotionsProdTypes);

        $this->set(compact('promotionsProdTypes'));
        $this->set('_serialize', ['promotionsProdTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Promotions Prod Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $promotionsProdType = $this->PromotionsProdTypes->get($id, [
            'contain' => ['Promotions', 'ProdTypes']
        ]);

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        $this->loadComponent('Logging');
        $this->Logging->log($promotionsProdType['id']);
        $this->Logging->iLog($retailer, $promotionsProdType['id']);

        $this->set('promotionsProdType', $promotionsProdType);
        $this->set('_serialize', ['promotionsProdType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $promotionsProdType = $this->PromotionsProdTypes->newEntity();
        if ($this->request->is('post')) {
            $promotionsProdType = $this->PromotionsProdTypes->patchEntity($promotionsProdType, $this->request->data);
            if ($this->PromotionsProdTypes->save($promotionsProdType)) {
                $this->Flash->success(__('The promotions prod type has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                $this->loadComponent('Logging');
                $this->Logging->log($promotionsProdType['id']);
                $this->Logging->iLog($retailer, $promotionsProdType['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promotions prod type could not be saved. Please, try again.'));
        }
        $promotions = $this->PromotionsProdTypes->Promotions->find('list', ['limit' => 200]);
        $prodTypes = $this->PromotionsProdTypes->ProdTypes->find('list', ['limit' => 200]);
        $this->set(compact('promotionsProdType', 'promotions', 'prodTypes'));
        $this->set('_serialize', ['promotionsProdType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Promotions Prod Type id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $promotionsProdType = $this->PromotionsProdTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $promotionsProdType = $this->PromotionsProdTypes->patchEntity($promotionsProdType, $this->request->data);
            if ($this->PromotionsProdTypes->save($promotionsProdType)) {
                $this->Flash->success(__('The promotions prod type has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                $this->loadComponent('Logging');
                $this->Logging->log($promotionsProdType['id']);
                $this->Logging->iLog($retailer, $promotionsProdType['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promotions prod type could not be saved. Please, try again.'));
        }
        $promotions = $this->PromotionsProdTypes->Promotions->find('list', ['limit' => 200]);
        $prodTypes = $this->PromotionsProdTypes->ProdTypes->find('list', ['limit' => 200]);
        $this->set(compact('promotionsProdType', 'promotions', 'prodTypes'));
        $this->set('_serialize', ['promotionsProdType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Promotions Prod Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $promotionsProdType = $this->PromotionsProdTypes->get($id);
        if ($this->PromotionsProdTypes->delete($promotionsProdType)) {
            $this->Flash->success(__('The promotions prod type has been deleted.'));

            $session = $this->request->session();
            $retailer = $session->read('retailer');

            $this->loadComponent('Logging');
            $this->Logging->log($promotionsProdType['id']);
            $this->Logging->iLog($retailer, $promotionsProdType['id']);
            
        } else {
            $this->Flash->error(__('The promotions prod type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
