<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RetailerLoggings Controller
 *
 * @property \App\Model\Table\RetailerLoggingsTable $RetailerLoggings
 */
class RetailerLoggingsController extends AppController
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
        $this->paginate = [
            'contain' => ['RetailerEmployees']
        ];
        $retailerLoggings = $this->paginate($this->RetailerLoggings);

        $this->set(compact('retailerLoggings'));
        $this->set('_serialize', ['retailerLoggings']);
    }

    /**
     * View method
     *
     * @param string|null $id Retailer Logging id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retailerLogging = $this->RetailerLoggings->get($id, [
            'contain' => ['RetailerEmployees']
        ]);

        //$this->loadComponent('Logging');
        $this->Logging->rLog($retailerLogging['id']);
        $this->Logging->iLog($retailer, $retailerLogging['id']);

        $this->set('retailerLogging', $retailerLogging);
        $this->set('_serialize', ['retailerLogging']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retailerLogging = $this->RetailerLoggings->newEntity();
        if ($this->request->is('post')) {
            $retailerLogging = $this->RetailerLoggings->patchEntity($retailerLogging, $this->request->data);
            if ($this->RetailerLoggings->save($retailerLogging)) {
                $this->Flash->success(__('The retailer logging has been saved.'));

                //$this->loadComponent('Logging');
                $this->Logging->rLog($retailerLogging['id']);
                $this->Logging->iLog($retailer, $retailerLogging['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer logging could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->RetailerLoggings->RetailerEmployees->find('list', ['limit' => 200]);
        $this->set(compact('retailerLogging', 'retailerEmployees'));
        $this->set('_serialize', ['retailerLogging']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retailer Logging id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retailerLogging = $this->RetailerLoggings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retailerLogging = $this->RetailerLoggings->patchEntity($retailerLogging, $this->request->data);
            if ($this->RetailerLoggings->save($retailerLogging)) {
                $this->Flash->success(__('The retailer logging has been saved.'));

                //$this->loadComponent('Logging');
                $this->Logging->rLog($retailerLogging['id']);
                $this->Logging->iLog($retailer, $retailerLogging['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer logging could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->RetailerLoggings->RetailerEmployees->find('list', ['limit' => 200]);
        $this->set(compact('retailerLogging', 'retailerEmployees'));
        $this->set('_serialize', ['retailerLogging']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retailer Logging id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retailerLogging = $this->RetailerLoggings->get($id);
        if ($this->RetailerLoggings->delete($retailerLogging)) {
            $this->Flash->success(__('The retailer logging has been deleted.'));

            //$this->loadComponent('Logging');
            $this->Logging->rLog($retailerLogging['id']);
            $this->Logging->iLog($retailer, $retailerLogging['id']);
            
        } else {
            $this->Flash->error(__('The retailer logging could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
