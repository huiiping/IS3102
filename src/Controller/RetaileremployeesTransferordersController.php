<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RetaileremployeesTransferorders Controller
 *
 * @property \App\Model\Table\RetaileremployeesTransferordersTable $RetaileremployeesTransferorders
 */
class RetaileremployeesTransferordersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Retaileremployees', 'Transferorders']
        ];
        $retaileremployeesTransferorders = $this->paginate($this->RetaileremployeesTransferorders);

        $this->set(compact('retaileremployeesTransferorders'));
        $this->set('_serialize', ['retaileremployeesTransferorders']);
    }

    /**
     * View method
     *
     * @param string|null $id Retaileremployees Transferorder id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retaileremployeesTransferorder = $this->RetaileremployeesTransferorders->get($id, [
            'contain' => ['Retaileremployees', 'Transferorders']
        ]);

        $this->set('retaileremployeesTransferorder', $retaileremployeesTransferorder);
        $this->set('_serialize', ['retaileremployeesTransferorder']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retaileremployeesTransferorder = $this->RetaileremployeesTransferorders->newEntity();
        if ($this->request->is('post')) {
            $retaileremployeesTransferorder = $this->RetaileremployeesTransferorders->patchEntity($retaileremployeesTransferorder, $this->request->data);
            if ($this->RetaileremployeesTransferorders->save($retaileremployeesTransferorder)) {
                $this->Flash->success(__('The retaileremployees transferorder has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retaileremployees transferorder could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->RetaileremployeesTransferorders->Retaileremployees->find('list', ['limit' => 200]);
        $transferorders = $this->RetaileremployeesTransferorders->Transferorders->find('list', ['limit' => 200]);
        $this->set(compact('retaileremployeesTransferorder', 'retaileremployees', 'transferorders'));
        $this->set('_serialize', ['retaileremployeesTransferorder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retaileremployees Transferorder id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retaileremployeesTransferorder = $this->RetaileremployeesTransferorders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retaileremployeesTransferorder = $this->RetaileremployeesTransferorders->patchEntity($retaileremployeesTransferorder, $this->request->data);
            if ($this->RetaileremployeesTransferorders->save($retaileremployeesTransferorder)) {
                $this->Flash->success(__('The retaileremployees transferorder has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retaileremployees transferorder could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->RetaileremployeesTransferorders->Retaileremployees->find('list', ['limit' => 200]);
        $transferorders = $this->RetaileremployeesTransferorders->Transferorders->find('list', ['limit' => 200]);
        $this->set(compact('retaileremployeesTransferorder', 'retaileremployees', 'transferorders'));
        $this->set('_serialize', ['retaileremployeesTransferorder']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retaileremployees Transferorder id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retaileremployeesTransferorder = $this->RetaileremployeesTransferorders->get($id);
        if ($this->RetaileremployeesTransferorders->delete($retaileremployeesTransferorder)) {
            $this->Flash->success(__('The retaileremployees transferorder has been deleted.'));
        } else {
            $this->Flash->error(__('The retaileremployees transferorder could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
