<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PromotionEmails Controller
 *
 * @property \App\Model\Table\PromotionEmailsTable $PromotionEmails
 */
class PromotionEmailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Promotions', 'CustMembershipTiers']
        ];
        $promotionEmails = $this->paginate($this->PromotionEmails);

        $this->set(compact('promotionEmails'));
        $this->set('_serialize', ['promotionEmails']);
    }

    /**
     * View method
     *
     * @param string|null $id Promotion Email id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $promotionEmail = $this->PromotionEmails->get($id, [
            'contain' => ['Promotions', 'CustMembershipTiers']
        ]);

        $this->set('promotionEmail', $promotionEmail);
        $this->set('_serialize', ['promotionEmail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $promotionEmail = $this->PromotionEmails->newEntity();
        if ($this->request->is('post')) {
            $promotionEmail = $this->PromotionEmails->patchEntity($promotionEmail, $this->request->data);
            if ($this->PromotionEmails->save($promotionEmail)) {
                $this->Flash->success(__('The promotion email has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promotion email could not be saved. Please, try again.'));
        }
        $promotions = $this->PromotionEmails->Promotions->find('list', ['limit' => 200]);
        $custMembershipTiers = $this->PromotionEmails->CustMembershipTiers->find('list', ['limit' => 200]);
        $this->set(compact('promotionEmail', 'promotions', 'custMembershipTiers'));
        $this->set('_serialize', ['promotionEmail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Promotion Email id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $promotionEmail = $this->PromotionEmails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $promotionEmail = $this->PromotionEmails->patchEntity($promotionEmail, $this->request->data);
            if ($this->PromotionEmails->save($promotionEmail)) {
                $this->Flash->success(__('The promotion email has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promotion email could not be saved. Please, try again.'));
        }
        $promotions = $this->PromotionEmails->Promotions->find('list', ['limit' => 200]);
        $custMembershipTiers = $this->PromotionEmails->CustMembershipTiers->find('list', ['limit' => 200]);
        $this->set(compact('promotionEmail', 'promotions', 'custMembershipTiers'));
        $this->set('_serialize', ['promotionEmail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Promotion Email id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $promotionEmail = $this->PromotionEmails->get($id);
        if ($this->PromotionEmails->delete($promotionEmail)) {
            $this->Flash->success(__('The promotion email has been deleted.'));
        } else {
            $this->Flash->error(__('The promotion email could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
