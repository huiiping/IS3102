<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;
use Cake\I18n\Date;
use Cake\Event\Event;
require 'C:/xampp/htdocs/IS3102_Final/vendor/autoload.php';
use \Mailjet\Resources;

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
        $apikey = '86b677af65add5a9ccdf9da1035ff660';
        $apisecret = 'eef2c47229e7616b0996ade8a6f49d34';

        $mj = new \Mailjet\Client($apikey, $apisecret);

        $response = $mj->get(Resources::$Apikeytotals);
        $response->success();
        //var_dump($response->getData());
        //var_dump($response->getData());
        $stats = $response->getData();
        var_dump($stats[0]);
        var_dump('HI');
        echo $stats[0]['BlockedCount'];
        echo "nottttttt";

        $responses = $mj->get(Resources::$Messagesentstatistics, ['id' => $id]);
        $responses->success();
        $stat = $responses->getData();        

        var_dump($stat);
        foreach ($responses as $response) {
            echo $response; 
        }
        
        //$promotionEmails = $this->paginate($this->PromotionEmails);
        $this->loadComponent('Prg');
        $this->Prg->commonProcess();
        $this->paginate = [
        'contain' => ['Promotions']
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
            'contain' => ['Promotions']
            ]);

        $custMembershipTiers = $this->PromotionEmails->Promotions->CustMembershipTiers->find('list', ['limit' => 200]);

        $this->set(compact('promotionEmail', 'promotions', 'custMembershipTiers'));
        $this->set('_serialize', ['promotionEmail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null) {

        //$promotionEmail = $this->PromotionEmails->get($id, ['contain' => []]);{
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
        $custMembershipTiers = $this->PromotionEmails->Promotions->CustMembershipTiers->find('list', ['limit' => 200]);
        $this->set(compact('promotionEmail', 'promotions', 'custMembershipTiers'));
        $this->set('id', $id);
        $this->set('_serialize', ['promotionEmail']);
    }

    public function addAll() {
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

                $send = $_POST['email'];
                
                if($send = 'y') {

                    $title = $_POST['title'];
                    $body = $_POST['body'];
                    $tier = $_POST['cust_membership_tier_id'];

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
        $custMembershipTiers = $this->PromotionEmails->Promotions->CustMembershipTiers->find('list', ['limit' => 200]);
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
