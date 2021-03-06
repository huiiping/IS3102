<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;
use Cake\I18n\Date;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Error\Debugger;

/**
 * Promotions Controller
 *
 * @property \App\Model\Table\PromotionsTable $Promotions
 */
class PromotionsController extends AppController
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
        //$promotions = $this->paginate($this->Promotions);
        $this->loadComponent('Prg');
        $this->Prg->commonProcess();
        $this->paginate = [
            'contain' => ['RetailerEmployees']
        ];
        $this->set('promotions', $this->paginate($this->Promotions->find('searchable', $this->Prg->parsedParams())));
        $this->set(compact('promotions'));
        $this->set('_serialize', ['promotions']);
    }

    public $components = array(
        'Prg'
    );


    public function view($id = null)
    {
        $promotion = $this->Promotions->get($id, [
            'contain' => ['RetailerEmployees', 'CustMembershipTiers', 'Products']
        ]);

        $promotionEmails = TableRegistry::get('PromotionEmails');
        $query = $promotionEmails
                    ->find()
                    ->select(['id', 'title', 'body'])
                    ->where(['promotion_id' => $id])
                    ->toArray();

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        $this->Logging->rLog($promotion['id']);
        $this->Logging->iLog($retailer, $promotion['id']);

        $this->set('promotion', $promotion);
        $this->set('promotionEmails', $query);    
        $this->set('_serialize', ['promotion', 'promotionEmails']);
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

                $session = $this->request->session();
                $retailer = $session->read('retailer');
                
                if ($_POST['title'] != null && $_POST['body'] != null) {

                    $promotionEmailTable = TableRegistry::get('PromotionEmails');
                    $promotionEmail = $promotionEmailTable->newEntity([
                        'promotion_id' => $promotion['id'],
                        'title' => $_POST['title'],
                        'body' => $_POST['body'],
                        'last_sent' => Date::now(),
                        'number_of_sends' => 1]);
                    $promotionEmailTable->save($promotionEmail);
                    //Debugger::dump($this->request->data);


                    $tiers = $_POST['cust_membership_tiers'];
                    $conn = ConnectionManager::get('default');
                    foreach ($tiers['_ids'] as $tier):
                        $query = $conn
                        ->execute('SELECT * FROM customers WHERE cust_membership_tier_id = :id', ['id' => $tier])
                        ->fetchAll('assoc');  

                        $this->Email->promotionEmail($_POST['title'], $_POST['body'], $query);
                    endforeach;                               

                    $this->Flash->success(__('The promotion has been saved and the email has been sent out.'));

                } else {

                    $this->Flash->success(__('The promotion has been saved.'));

                }

                //$this->loadComponent('Logging');
                $this->Logging->rLog($promotion['id']);
                $this->Logging->iLog($retailer, $promotion['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promotion could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->Promotions->RetailerEmployees->find('list', ['limit' => 200]);
        $custMembershipTiers = $this->Promotions->custMembershipTiers->find('all', ['limit' => 200]);
        $products = $this->Promotions->Products->find('all');
        $this->set(compact('promotion', 'retailerEmployees', 'custMembershipTiers', 'products'));
        $this->set('_serialize', ['promotion']);
    }

    public function edit($id = null)
    {
        $promotion = $this->Promotions->get($id, [
            'contain' => ['CustMembershipTiers', 'Products']
        ]);

        //Check if the promotion has already started or ended
        $now = new Date();
        if ($now > $promotion['end_date']){
            $this->Flash->error(_('The promotion has already ended.'));
            return $this->redirect(['action' => 'index']);
        } else if ($now > $promotion['start_date']) {
            $this->Flash->error(_('The promotion has already begun. It can not be edited or deleted once it has started.'));
            return $this->redirect(['action' => 'index']);
        }
        // ---------------------------------------------------

        if ($this->request->is(['patch', 'post', 'put'])) {
            $promotion = $this->Promotions->patchEntity($promotion, $this->request->data);
            if ($this->Promotions->save($promotion)) {

                if ($_POST['title'] != null && $_POST['body'] != null) {

                    $promotionEmailTable = TableRegistry::get('PromotionEmails');
                    $promotionEmail = $promotionEmailTable->newEntity([
                        'promotion_id' => $promotion['id'],
                        'title' => $_POST['title'],
                        'body' => $_POST['body'],
                        'last_sent' => Date::now(),
                        'number_of_sends' => 1]);
                    $promotionEmailTable->save($promotionEmail);
                    Debugger::dump($this->request->data);


                    $tiers = $_POST['cust_membership_tiers'];
                    $conn = ConnectionManager::get('default');
                    foreach ($tiers['_ids'] as $tier):
                        $query = $conn
                        ->execute('SELECT * FROM customers WHERE cust_membership_tier_id = :id', ['id' => $tier])
                        ->fetchAll('assoc');  

                        $this->Email->promotionEmail($_POST['title'], $_POST['body'], $query);
                    endforeach;                               

                    $this->Flash->success(__('The promotion has been saved and the email has been sent out.'));

                } else {

                    $this->Flash->success(__('The promotion has been saved.'));

                }

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($promotion['id']);
                $this->Logging->iLog($retailer, $promotion['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promotion could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->Promotions->RetailerEmployees->find('list', ['limit' => 200]);
        $custMembershipTiers = $this->Promotions->custMembershipTiers->find('list', ['limit' => 200]);
        $products = $this->Promotions->Products->find('list');
        $this->set('custMemberTiers', $this->Promotions->custMembershipTiers->find('all'));
        $this->set('prods', $this->Promotions->Products->find('all')); //to populate select input for roles
        $this->set(compact('promotion', 'retailerEmployees', 'custMembershipTiers', 'products'));
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

        // Check if the promomtion has started or ended before allowing the deletion of the promotion.
        $now = new Date();
        if ($now > $promotion['end_date']){
            $this->Flash->error(_('The promotion has already ended.'));
        } else if ($now > $promotion['start_date']) {
            $this->Flash->error(_('The promotion has already begun. It can not be deleted once it has started.'));
        } else if($this->Promotions->delete($promotion)) {

            $session = $this->request->session();
            $retailer = $session->read('retailer');

            //$this->loadComponent('Logging');
            $this->Logging->rLog($promotion['id']);
            $this->Logging->iLog($retailer, $promotion['id']);

            $this->Flash->success(__('The promotion has been deleted.'));
        } else {
            $this->Flash->error(__('The promotion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function redeemvoucher() {
        $voucherNum = (int) $_POST['voucherNum'];
        $now = Time::now();
        
        $voucher = $this->Promotions->find()
            ->where(['first_voucher_num <=' => $voucherNum], ['first_voucher_num' => 'integer'])
            ->andWhere(['last_voucher_num >=' => $voucherNum], ['last_voucher_num' => 'integer'])
            ->andWhere(['start_date <' => $now])
            ->andWhere(['end_date >' => $now])
            ->toArray();

        if (!empty($voucher)) {
            
            echo "Valid";
            echo "\n";

            foreach ($voucher as $vouch) {
                echo ($vouch['discount_rate']);
                echo "\n";
            }
        }
        else {
            echo ("Invalid");
            echo ("\n");
        }

        die();
    }


    // currently not in use
    // KIV for future memory_get_usage()
    /*
    public function email($id = null){

        $promotion = $this->Promotions->get($id);
        $retailerEmployees = $this->Promotions->RetailerEmployees->find('list', ['limit' => 200]);
        $email = new Email('default');
        $email->template('default');
        $email->emailFormat('both');
        $email->to('secretariat@nuscomputing.com');
        $email->subject('Intrasys');
        $email->from('tanyongming90@gmail.com');
        $email->replyTo('support@intrasys.com');
        $email->send($retailerEmployees['username'].','.$promotion['promo_desc'].','.$promotion['start_date'].','.$promotion['end_date'].','.$promotion['discount_rate'].','.$promotion['credit_card_type']); 
    }
    */
}
