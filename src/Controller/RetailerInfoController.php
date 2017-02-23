<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RetailerInfo Controller
 *
 * @property \App\Model\Table\RetailerInfoTable $RetailerInfo
 */
class RetailerInfoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {   
        /*
        $this->paginate = [
            'contain' => ['Retailers']
        ];*/
        $retailerInfo = $this->paginate($this->RetailerInfo);

        $this->set(compact('retailerInfo'));
        $this->set('_serialize', ['retailerInfo']);
    }

    /**
     * View method
     *
     * @param string|null $id Retailer Info id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {   
        /*
        $retailerInfo = $this->RetailerInfo->get($id, [
            'contain' => ['Retailers']
        ]);*/

        $this->set('retailerInfo', $retailerInfo);
        $this->set('_serialize', ['retailerInfo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retailerInfo = $this->RetailerInfo->newEntity();
        if ($this->request->is('post')) {
            $retailerInfo = $this->RetailerInfo->patchEntity($retailerInfo, $this->request->data);
            if ($this->RetailerInfo->save($retailerInfo)) {
                $this->Flash->success(__('The retailer info has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer info could not be saved. Please, try again.'));
        }
        /*
        $retailers = $this->RetailerInfo->Retailers->find('list', ['limit' => 200]);
        $this->set(compact('retailerInfo', 'retailers'));*/
        $this->set('_serialize', ['retailerInfo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retailer Info id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retailerInfo = $this->RetailerInfo->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retailerInfo = $this->RetailerInfo->patchEntity($retailerInfo, $this->request->data);
            if ($this->RetailerInfo->save($retailerInfo)) {
                $this->Flash->success(__('The retailer info has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer info could not be saved. Please, try again.'));
        }
        /*
        $retailers = $this->RetailerInfo->Retailers->find('list', ['limit' => 200]);
        $this->set(compact('retailerInfo', 'retailers'));*/
        $this->set('_serialize', ['retailerInfo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retailer Info id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retailerInfo = $this->RetailerInfo->get($id);
        if ($this->RetailerInfo->delete($retailerInfo)) {
            $this->Flash->success(__('The retailer info has been deleted.'));
        } else {
            $this->Flash->error(__('The retailer info could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
