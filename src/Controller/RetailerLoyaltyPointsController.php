<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

/**
 * RetailerLoyaltyPoints Controller
 *
 * @property \App\Model\Table\RetailerLoyaltyPointsTable $RetailerLoyaltyPoints
 */
class RetailerLoyaltyPointsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadComponent('Logging');
        
    }

    /**
     * Index method
     * Not used in the current setup
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->loadComponent('Prg');
        $this->Prg->commonProcess();

        $this->paginate = [
            'contain' => ['Retailers']
        ];

        $this->set('retailerLoyaltyPoints', $this->paginate($this->RetailerLoyaltyPoints->find('searchable', $this->Prg->parsedParams())));
        $this->set(compact('retailerLoyaltyPoints'));
        $this->set('_serialize', ['retailerLoyaltyPoints']);
    }

    public $components = array(
        'Prg'
    );

    /**
     * View method
     *
     * @param string|null $id Retailer Loyalty Point id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->paginate = [
            'contain' => ['IntrasysEmployees', 'Retailers']
        ];

        $query = $this->paginate($this->RetailerLoyaltyPoints->find('searchable', $this->Prg->parsedParams())->where(['retailer_id' => $id])->order(['RetailerLoyaltyPoints.modified' => 'ASC']));

        $query2 = $this->RetailerLoyaltyPoints->Retailers->find('all')->where(['id' => $id])->toArray();

        $this->set('retailer', $query2);
        $this->set('retailerLoyaltyPoints', $query);
        $this->set(compact('retailerLoyaltyPoints', 'retailer'));
        $this->set('_serialize', ['retailerLoyaltyPoints']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retailerLoyaltyPoint = $this->RetailerLoyaltyPoints->newEntity();
        if ($this->request->is('post')) {
            $retailerLoyaltyPoint = $this->RetailerLoyaltyPoints->patchEntity($retailerLoyaltyPoint, $this->request->data);
            if ($this->RetailerLoyaltyPoints->save($retailerLoyaltyPoint)) {
                $this->Flash->success(__('The retailer loyalty point has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($retailerLoyaltyPoint['id']);
                $this->Logging->iLog($retailer, $retailerLoyaltyPoint['id']);

                return $this->redirect(['action' => 'view', $retailerLoyaltyPoint->retailer_id]);
            }
            $this->Flash->error(__('The retailer loyalty point could not be saved. Please, try again.'));
        }
        $retailers = $this->RetailerLoyaltyPoints->Retailers->find('list', ['limit' => 200]);
        $this->set(compact('retailerLoyaltyPoint', 'retailers'));
        $this->set('_serialize', ['retailerLoyaltyPoint']);
    }

    public function addSpecific($id = null)
    {
        $retailerLoyaltyPoint = $this->RetailerLoyaltyPoints->newEntity();
        if ($this->request->is('post')) {
            $retailerLoyaltyPoint = $this->RetailerLoyaltyPoints->patchEntity($retailerLoyaltyPoint, $this->request->data);
            if ($this->RetailerLoyaltyPoints->save($retailerLoyaltyPoint)) {
                $this->Flash->success(__('The retailer loyalty point has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($retailerLoyaltyPoint['id']);
                $this->Logging->iLog($retailer, $retailerLoyaltyPoint['id']);

                return $this->redirect(['action' => 'view', $retailerLoyaltyPoint->retailer_id]);
            }
            $this->Flash->error(__('The retailer loyalty point could not be saved. Please, try again.'));
        }

        $query2 = $this->RetailerLoyaltyPoints->Retailers->find('all')->where(['id' => $id])->toArray();

        $this->set('retailer', $query2);
        $this->set(compact('retailerLoyaltyPoint', 'retailer'));
        $this->set('_serialize', ['retailerLoyaltyPoint']);
    }

    /**
     * Edit method
     * Not allowed to edit with the current set up.
     * User to create another row to correct mistakes if any. 
     * @param string|null $id Retailer Loyalty Point id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retailerLoyaltyPoint = $this->RetailerLoyaltyPoints->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retailerLoyaltyPoint = $this->RetailerLoyaltyPoints->patchEntity($retailerLoyaltyPoint, $this->request->data);
            if ($this->RetailerLoyaltyPoints->save($retailerLoyaltyPoint)) {
                $this->Flash->success(__('The retailer loyalty point has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($retailerLoyaltyPoint['id']);
                $this->Logging->iLog($retailer, $retailerLoyaltyPoint['id']);

                return $this->redirect(['action' => 'view', $retailerLoyaltyPoint->retailer_id]);
            }
            $this->Flash->error(__('The retailer loyalty point could not be saved. Please, try again.'));
        }
        $retailers = $this->RetailerLoyaltyPoints->Retailers->find('list', ['limit' => 200]);
        $this->set(compact('retailerLoyaltyPoint', 'retailers'));
        $this->set('_serialize', ['retailerLoyaltyPoint']);
    }

    public function redeem($id = null)
    {
        $retailerLoyaltyPoint = $this->RetailerLoyaltyPoints->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retailerLoyaltyPoint = $this->RetailerLoyaltyPoints->patchEntity($retailerLoyaltyPoint, $this->request->data);

            if ($retailerLoyaltyPoint['redemption_pts'] == 0) {
                $retailerLoyaltyPoint->redemption_pts =  $retailerLoyaltyPoint['loyalty_pts'];

                if ($this->RetailerLoyaltyPoints->save($retailerLoyaltyPoint)) {
                    $this->Flash->success(__('The loyalty points has been redeemed.'));

                    $session = $this->request->session();
                    $retailer = $session->read('retailer');

                    //$this->loadComponent('Logging');
                    $this->Logging->rLog($retailerLoyaltyPoint['id']);
                    $this->Logging->iLog($retailer, $retailerLoyaltyPoint['id']);

                    return $this->redirect(['action' => 'view', $retailerLoyaltyPoint->retailer_id]);
                }
            } else {
                $this->Flash->error(__('Cannot redeem loyalty points that had been redeemed.'));
                return $this->redirect(['action' => 'individual', $retailerLoyaltyPoint->retailer_id]);
            }
            $this->Flash->error(__('The loyalty point could not be redeemed. Please, try again.'));
        }
        //$retailers = $this->RetailerLoyaltyPoints->Retailers->find('list', ['limit' => 200]);
        $this->set(compact('retailerLoyaltyPoint', 'retailers'));
        $this->set('_serialize', ['retailerLoyaltyPoint']);
    }
    /**
     * Delete method
     * Not allowed to delete with the current setup
     * @param string|null $id Retailer Loyalty Point id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retailerLoyaltyPoint = $this->RetailerLoyaltyPoints->get($id);
        if ($this->RetailerLoyaltyPoints->delete($retailerLoyaltyPoint)) {
            $this->Flash->success(__('The retailer loyalty point has been deleted.'));

            $session = $this->request->session();
            $retailer = $session->read('retailer');

            //$this->loadComponent('Logging');
            $this->Logging->rLog($retailerLoyaltyPoint['id']);
            $this->Logging->iLog($retailer, $retailerLoyaltyPoint['id']);
            
        } else {
            $this->Flash->error(__('The retailer loyalty point could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'view', $retailerLoyaltyPoint->retailer_id]);
    }

    public function individual($id = null)
    {
        $retailerLoyaltyPoints = $this->paginate($this->RetailerLoyaltyPoints);
        $this->set(compact('retailerLoyaltyPoints'));

        $query = $this->RetailerLoyaltyPoints->find('all', [
            'contain' => ['Retailers'],
            'conditions' => ['RetailerLoyaltyPoints.retailer_id' => $id]
        ]);
        $retailerLoyaltyPoints = $query->all();

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        $this->set('retailerLoyaltyPoints', $retailerLoyaltyPoints);
        $this->set('_serialize', ['retailerLoyaltyPoints']);
    }
}
        
