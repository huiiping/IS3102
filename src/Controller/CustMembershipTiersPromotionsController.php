<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustMembershipTiersPromotions Controller
 *
 * @property \App\Model\Table\CustMembershipTiersPromotionsTable $CustMembershipTiersPromotions
 */
class CustMembershipTiersPromotionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CustMembershipTiers', 'Promotions']
        ];
        $custMembershipTiersPromotions = $this->paginate($this->CustMembershipTiersPromotions);

        $this->set(compact('custMembershipTiersPromotions'));
        $this->set('_serialize', ['custMembershipTiersPromotions']);
    }

    /**
     * View method
     *
     * @param string|null $id Cust Membership Tiers Promotion id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $custMembershipTiersPromotion = $this->CustMembershipTiersPromotions->get($id, [
            'contain' => ['CustMembershipTiers', 'Promotions']
        ]);

        $this->set('custMembershipTiersPromotion', $custMembershipTiersPromotion);
        $this->set('_serialize', ['custMembershipTiersPromotion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $custMembershipTiersPromotion = $this->CustMembershipTiersPromotions->newEntity();
        if ($this->request->is('post')) {
            $custMembershipTiersPromotion = $this->CustMembershipTiersPromotions->patchEntity($custMembershipTiersPromotion, $this->request->data);
            if ($this->CustMembershipTiersPromotions->save($custMembershipTiersPromotion)) {
                $this->Flash->success(__('The cust membership tiers promotion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cust membership tiers promotion could not be saved. Please, try again.'));
        }
        $custMembershipTiers = $this->CustMembershipTiersPromotions->CustMembershipTiers->find('list', ['limit' => 200]);
        $promotions = $this->CustMembershipTiersPromotions->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('custMembershipTiersPromotion', 'custMembershipTiers', 'promotions'));
        $this->set('_serialize', ['custMembershipTiersPromotion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cust Membership Tiers Promotion id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $custMembershipTiersPromotion = $this->CustMembershipTiersPromotions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $custMembershipTiersPromotion = $this->CustMembershipTiersPromotions->patchEntity($custMembershipTiersPromotion, $this->request->data);
            if ($this->CustMembershipTiersPromotions->save($custMembershipTiersPromotion)) {
                $this->Flash->success(__('The cust membership tiers promotion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cust membership tiers promotion could not be saved. Please, try again.'));
        }
        $custMembershipTiers = $this->CustMembershipTiersPromotions->CustMembershipTiers->find('list', ['limit' => 200]);
        $promotions = $this->CustMembershipTiersPromotions->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('custMembershipTiersPromotion', 'custMembershipTiers', 'promotions'));
        $this->set('_serialize', ['custMembershipTiersPromotion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cust Membership Tiers Promotion id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $custMembershipTiersPromotion = $this->CustMembershipTiersPromotions->get($id);
        if ($this->CustMembershipTiersPromotions->delete($custMembershipTiersPromotion)) {
            $this->Flash->success(__('The cust membership tiers promotion has been deleted.'));
        } else {
            $this->Flash->error(__('The cust membership tiers promotion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
