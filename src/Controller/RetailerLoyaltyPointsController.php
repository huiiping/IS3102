<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RetailerLoyaltyPoints Controller
 *
 * @property \App\Model\Table\RetailerLoyaltyPointsTable $RetailerLoyaltyPoints
 */
class RetailerLoyaltyPointsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Retailers']
        ];
        $retailerLoyaltyPoints = $this->paginate($this->RetailerLoyaltyPoints);

        $this->set(compact('retailerLoyaltyPoints'));
        $this->set('_serialize', ['retailerLoyaltyPoints']);
    }

    /**
     * View method
     *
     * @param string|null $id Retailer Loyalty Point id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retailerLoyaltyPoint = $this->RetailerLoyaltyPoints->get($id, [
            'contain' => ['Retailers']
        ]);

        $this->set('retailerLoyaltyPoint', $retailerLoyaltyPoint);
        $this->set('_serialize', ['retailerLoyaltyPoint']);
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

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer loyalty point could not be saved. Please, try again.'));
        }
        $retailers = $this->RetailerLoyaltyPoints->Retailers->find('list', ['limit' => 200]);
        $this->set(compact('retailerLoyaltyPoint', 'retailers'));
        $this->set('_serialize', ['retailerLoyaltyPoint']);
    }

    /**
     * Edit method
     *
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

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer loyalty point could not be saved. Please, try again.'));
        }
        $retailers = $this->RetailerLoyaltyPoints->Retailers->find('list', ['limit' => 200]);
        $this->set(compact('retailerLoyaltyPoint', 'retailers'));
        $this->set('_serialize', ['retailerLoyaltyPoint']);
    }

    /**
     * Delete method
     *
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
        } else {
            $this->Flash->error(__('The retailer loyalty point could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}