<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RetailerDetails Controller
 *
 * @property \App\Model\Table\RetailerDetailsTable $RetailerDetails
 */
class RetailerDetailsController extends AppController
{

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

        $this->set('retailerDetail', $retailerDetail);
        $this->set('_serialize', ['retailerDetail']);
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
        } else {
            $this->Flash->error(__('The retailer detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
