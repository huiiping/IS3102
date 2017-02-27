<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustomersPromotions Controller
 *
 * @property \App\Model\Table\CustomersPromotionsTable $CustomersPromotions
 */
class CustomersPromotionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Promotions']
        ];
        $customersPromotions = $this->paginate($this->CustomersPromotions);

        $this->set(compact('customersPromotions'));
        $this->set('_serialize', ['customersPromotions']);
    }

    /**
     * View method
     *
     * @param string|null $id Customers Promotion id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customersPromotion = $this->CustomersPromotions->get($id, [
            'contain' => ['Customers', 'Promotions']
        ]);

        $this->loadComponent('Logging');
        $this->Logging->log($customersPromotion['id']);
        $this->Logging->iLog($retailer, $customersPromotion['id']);

        $this->set('customersPromotion', $customersPromotion);
        $this->set('_serialize', ['customersPromotion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customersPromotion = $this->CustomersPromotions->newEntity();
        if ($this->request->is('post')) {
            $customersPromotion = $this->CustomersPromotions->patchEntity($customersPromotion, $this->request->data);
            if ($this->CustomersPromotions->save($customersPromotion)) {
                $this->Flash->success(__('The customers promotion has been saved.'));

                $this->loadComponent('Logging');
                $this->Logging->log($customersPromotion['id']);
                $this->Logging->iLog($retailer, $customersPromotion['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customers promotion could not be saved. Please, try again.'));
        }
        $customers = $this->CustomersPromotions->Customers->find('list', ['limit' => 200]);
        $promotions = $this->CustomersPromotions->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('customersPromotion', 'customers', 'promotions'));
        $this->set('_serialize', ['customersPromotion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Customers Promotion id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customersPromotion = $this->CustomersPromotions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customersPromotion = $this->CustomersPromotions->patchEntity($customersPromotion, $this->request->data);
            if ($this->CustomersPromotions->save($customersPromotion)) {
                $this->Flash->success(__('The customers promotion has been saved.'));

                $this->loadComponent('Logging');
                $this->Logging->log($customersPromotion['id']);
                $this->Logging->iLog($retailer, $customersPromotion['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customers promotion could not be saved. Please, try again.'));
        }
        $customers = $this->CustomersPromotions->Customers->find('list', ['limit' => 200]);
        $promotions = $this->CustomersPromotions->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('customersPromotion', 'customers', 'promotions'));
        $this->set('_serialize', ['customersPromotion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customers Promotion id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customersPromotion = $this->CustomersPromotions->get($id);
        if ($this->CustomersPromotions->delete($customersPromotion)) {
            $this->Flash->success(__('The customers promotion has been deleted.'));

            $this->loadComponent('Logging');
            $this->Logging->log($customersPromotion['id']);
            $this->Logging->iLog($retailer, $customersPromotion['id']);

        } else {
            $this->Flash->error(__('The customers promotion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
