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
class AnalyticsController extends AppController
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
        $retailerEmployeesTable = TableRegistry::get('RetailerEmployees');
        $query =  $retailerEmployeesTable->find('all')->toArray();
        $this->set('retailers', $query);
    }

    
    /**
     * View method
     *
     * @param string|null $id Promotion id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
   /* public function view($id = null)
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
    }*/

    

    
    
}
