<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;
use Cake\I18n\Date;
use Cake\Event\Event;

/**
 * PromotionEmails Controller
 *
 * @property \App\Model\Table\PromotionEmailsTable $PromotionEmails
 */
class PromotionEmailsController extends AppController
{

    public function beforeFilter(Event $event)
    {

        $this->loadComponent('Logging');
        $this->loadComponent('Email');
        
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        
        //$promotionEmails = $this->paginate($this->PromotionEmails);
        $this->loadComponent('Prg');
        $this->Prg->commonProcess();
        $this->paginate = [
            'contain' => ['Promotions', 'CustMembershipTiers']
        ];
        $this->set('promotionEmails', $this->paginate($this->PromotionEmails->find('searchable', $this->Prg->parsedParams())));
        $this->set(compact('promotionEmails'));
        $this->set('_serialize', ['promotionEmails']);
    }
    public $components = array(
        'Prg'
    );

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
            
            $send = $_POST['email'];
            $title = $_POST['title'];
            $body = $_POST['body'];
            $tier = $_POST['cust_membership_tier_id'];
            //echo $tier[0];

            if ($this->PromotionEmails->save($promotionEmail)) {

                if($send = 'y') {

                    $session = $this->request->session();
                    $retailer = $session->read('retailer');
                    $conn = ConnectionManager::get('default');
                    $query = $conn
                        ->execute('SELECT * FROM customers WHERE cust_membership_tier_id = :id', ['id' => $tier[0]])
                        ->fetchAll('assoc');                    

                    $this->Email->promotionEmail($title, $body, $query);

                    $this->Flash->success(__('The promotion email has been sent and saved.'));

                } else {

                    $this->Flash->success(__('The promotion email has been saved.'));

                }

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
