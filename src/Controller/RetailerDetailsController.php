<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

/**
 * RetailerDetails Controller
 *
 * @property \App\Model\Table\RetailerDetailsTable $RetailerDetails
 */
class RetailerDetailsController extends AppController
{

    public function beforeFilter(Event $event)
    {

        $this->loadComponent('Logging');

        $session = $this->request->session();
        $session->write('page', 'RetailerDetails'); //set page
        
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $retailerDetails = $this->paginate($this->RetailerDetails);

        $this->set(compact('retailerDetails'));
        $this->set('_serialize', ['retailerDetails']);

        $rid = $this->request->session()->read('retailerid'); //get retailer ID
        $this->redirect(['controller' => 'RetailerDetails', 'action' => 'view', $rid]); //redirect to retailer details view page
    }

    /**
     * View method
     *
     * @param string|null $id Retailer Detail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retailerDetail = $this->RetailerDetails->get($id, [
            'contain' => []
        ]);

        $retailerLoyaltyPoints = TableRegistry::get('retailerLoyaltyPoints');
        $query = $retailerLoyaltyPoints
                    ->find()
                    ->select(['loyalty_pts', 'redemption_pts'])
                    ->where(['retailer_id' => $id])
                    ->toArray();

        $this->set('retailerLoyaltyPoints', $query);
        $this->set('_serialize', ['retailerLoyaltyPoints']);

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        $this->Logging->rLog($retailerDetail['id']);
        $this->Logging->iLog($retailer, $retailerDetail['id']);

        $this->set('retailerDetail', $retailerDetail);
        $this->set('_serialize', ['retailerDetail']);

        //get retailer details from retailers table
        $retailerID = $retailerDetail['retailerid'];
        $retailerTable = TableRegistry::get('Retailers');
        $getRetailer = $retailerTable->get($retailerID, [
            'contain' => ['RetailerAccTypes']
        ]);
        $this->set('getRetailer', $getRetailer);
        $this->set('_serialize', ['getRetailer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retailerDetail = $this->RetailerDetails->newEntity();
        if ($this->request->is('post')) {
            $retailerDetail = $this->RetailerDetails->patchEntity($retailerDetail, $this->request->data);
            if ($this->RetailerDetails->save($retailerDetail)) {
                $this->Flash->success(__('The retailer detail has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($retailerDetail['id']);
                $this->Logging->iLog($retailer, $retailerDetail['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer detail could not be saved. Please, try again.'));
        }
        $this->set(compact('retailerDetail'));
        $this->set('_serialize', ['retailerDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retailer Detail id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retailerDetail = $this->RetailerDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retailerDetail = $this->RetailerDetails->patchEntity($retailerDetail, $this->request->data);
            if ($this->RetailerDetails->save($retailerDetail)) {
                $this->Flash->success(__('The retailer detail has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');
                $retailerID = $retailerDetail['retailerid'];

                $retailerTable = TableRegistry::get('Retailers');
                $getRetailer = $retailerTable->get($retailerID);

                $getRetailer->address = $retailerDetail['address'];
                $getRetailer->contact = $retailerDetail['contact'];
                $getRetailer->retailer_desc = $retailerDetail['retailer_desc'];
                $getRetailer->retailer_email = $retailerDetail['retailer_email'];
                $getRetailer->retailer_name = $retailerDetail['retailer_name'];
                $retailerTable->save($getRetailer);

                //$this->loadComponent('Logging');
                $this->Logging->rLog($retailerDetail['id']);
                $this->Logging->iLog($retailer, $retailerDetail['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer detail could not be saved. Please, try again.'));
        }
        $this->set(compact('retailerDetail'));
        $this->set('_serialize', ['retailerDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retailer Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retailerDetail = $this->RetailerDetails->get($id);
        if ($this->RetailerDetails->delete($retailerDetail)) {
            $this->Flash->success(__('The retailer detail has been deleted.'));

            $session = $this->request->session();
            $retailer = $session->read('retailer');

            //$this->loadComponent('Logging');
            $this->Logging->rLog($retailerDetail['id']);
            $this->Logging->iLog($retailer, $retailerDetail['id']);
            
        } else {
            $this->Flash->error(__('The retailer detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
