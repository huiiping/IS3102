<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Datasource\ConnectionManager;

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
            'contain' => ['RetailerEmployees']
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
            'contain' => ['RetailerEmployees', 'Customers', 'ProdTypes']
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
                
                $session = $this->request->session();
                $retailer = $session->read('retailer');
                $tier = $_POST['customer_tier'];
                $conn = ConnectionManager::get('default');
                $query = $conn
                        ->execute('SELECT * FROM customers WHERE cust_membership_tier_id = :id', ['id' => $tier])
                        ->fetchAll('assoc');

                //echo $query[0]['username'];
                $email = new Email('default');
                $email->template('promotion');
                $email->emailFormat('html');                
                $email->to('secretariat@nuscomputing.com');
                $email->subject('Intrasys');
                $email->from('tanyongming90@gmail.com');
                $email->replyTo('support@intrasys.com');
                foreach ($query as $row):
                    $email->to($row['email']);
                    $email->send($row['username'].','.$retailer.','.$promotion['promo_desc'].','.$promotion['start_date'].','.$promotion['end_date'].','.$promotion['discount_rate'].','.$promotion['credit_card_type']);
                endforeach;
                /*
                foreach($query as $row){
                    echo $row;
                    $email->addTo($row);
                    $email->send($promotion['promo_desc'].','.$promotion['start_date'].','.$promotion['end_date'].','.$promotion['discount_rate'].','.$promotion['credit_card_type']);
                } */               
                
                $this->Flash->success(__('The promotion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promotion could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->Promotions->RetailerEmployees->find('list', ['limit' => 200]);
        $customers = $this->Promotions->Customers->find('list', ['limit' => 200]);
        $prodTypes = $this->Promotions->ProdTypes->find('list', ['limit' => 200]);
        $this->set(compact('promotion', 'retailerEmployees', 'customers', 'prodTypes'));
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
            'contain' => ['Customers', 'ProdTypes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $promotion = $this->Promotions->patchEntity($promotion, $this->request->data);
            if ($this->Promotions->save($promotion)) {
                $this->Flash->success(__('The promotion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promotion could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->Promotions->RetailerEmployees->find('list', ['limit' => 200]);
        $customers = $this->Promotions->Customers->find('list', ['limit' => 200]);
        $prodTypes = $this->Promotions->ProdTypes->find('list', ['limit' => 200]);
        $this->set(compact('promotion', 'retailerEmployees', 'customers', 'prodTypes'));
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
}
