<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;
use Cake\I18n\Date;
use Cake\Event\Event;

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
            'contain' => ['RetailerEmployees', 'CustMembershipTiers', 'ProdTypes']
        ]);

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        $this->Logging->rLog($promotion['id']);
        $this->Logging->iLog($retailer, $promotion['id']);

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
        $prodTypes = $this->Promotions->ProdTypes->find('list', ['limit' => 200]);
        $this->set(compact('promotion', 'retailerEmployees', 'custMembershipTiers', 'prodTypes'));
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
            'contain' => ['CustMembershipTiers', 'ProdTypes']
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
                $this->Flash->success(__('The promotion has been saved.'));

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
        $prodTypes = $this->Promotions->ProdTypes->find('list', ['limit' => 200]);
        $this->set(compact('promotion', 'retailerEmployees', 'custMembershipTiers', 'prodTypes'));
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
