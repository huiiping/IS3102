<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RetailerAccTypes Controller
 *
 * @property \App\Model\Table\RetailerAccTypesTable $RetailerAccTypes
 */
class RetailerAccTypesController extends AppController
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
        $retailerAccTypes = $this->paginate($this->RetailerAccTypes);

        $this->set(compact('retailerAccTypes'));
        $this->set('_serialize', ['retailerAccTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Retailer Acc Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retailerAccType = $this->RetailerAccTypes->get($id, [
            'contain' => ['Retailers']
        ]);

        //$session = $this->request->session();
        //$retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        //$this->Logging->log($retailerAccType['id']);
        $this->Logging->iLog(null, $retailerAccType['id']);

        $this->set('retailerAccType', $retailerAccType);
        $this->set('_serialize', ['retailerAccType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retailerAccType = $this->RetailerAccTypes->newEntity();
        if ($this->request->is('post')) {
            $retailerAccType = $this->RetailerAccTypes->patchEntity($retailerAccType, $this->request->data);
            if ($this->RetailerAccTypes->save($retailerAccType)) {
                $this->Flash->success(__('The retailer acc type has been saved.'));

                //$session = $this->request->session();
                //$retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                //$this->Logging->log($retailerAccType['id']);
                $this->Logging->iLog(null, $retailerAccType['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer acc type could not be saved. Please, try again.'));
        }
        $this->set(compact('retailerAccType'));
        $this->set('_serialize', ['retailerAccType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retailer Acc Type id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retailerAccType = $this->RetailerAccTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retailerAccType = $this->RetailerAccTypes->patchEntity($retailerAccType, $this->request->data);
            if ($this->RetailerAccTypes->save($retailerAccType)) {
                $this->Flash->success(__('The retailer acc type has been saved.'));

                //$session = $this->request->session();
                //$retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                //$this->Logging->log($retailerAccType['id']);
                $this->Logging->iLog(null, $retailerAccType['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer acc type could not be saved. Please, try again.'));
        }
        $this->set(compact('retailerAccType'));
        $this->set('_serialize', ['retailerAccType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retailer Acc Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retailerAccType = $this->RetailerAccTypes->get($id);
        if ($this->RetailerAccTypes->delete($retailerAccType)) {
            $this->Flash->success(__('The retailer acc type has been deleted.'));

            //$session = $this->request->session();
            //$retailer = $session->read('retailer');

            //$this->loadComponent('Logging');
            //$this->Logging->log($retailerAccType['id']);
            $this->Logging->iLog(null, $retailerAccType['id']);
        
        } else {
            $this->Flash->error(__('The retailer acc type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
