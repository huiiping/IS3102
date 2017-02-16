<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Transferorders Controller
 *
 * @property \App\Model\Table\TransferordersTable $Transferorders
 */
class TransferordersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Locations']
        ];
        $transferorders = $this->paginate($this->Transferorders);

        $this->set(compact('transferorders'));
        $this->set('_serialize', ['transferorders']);
    }

    /**
     * View method
     *
     * @param string|null $id Transferorder id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transferorder = $this->Transferorders->get($id, [
            'contain' => ['Locations', 'Retaileremployees']
        ]);

        $this->set('transferorder', $transferorder);
        $this->set('_serialize', ['transferorder']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transferorder = $this->Transferorders->newEntity();
        if ($this->request->is('post')) {
            $transferorder = $this->Transferorders->patchEntity($transferorder, $this->request->data);
            if ($this->Transferorders->save($transferorder)) {
                $this->Flash->success(__('The transferorder has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transferorder could not be saved. Please, try again.'));
        }
        $locations = $this->Transferorders->Locations->find('list', ['limit' => 200]);
        $retaileremployees = $this->Transferorders->Retaileremployees->find('list', ['limit' => 200]);
        $this->set(compact('transferorder', 'locations', 'retaileremployees'));
        $this->set('_serialize', ['transferorder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Transferorder id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transferorder = $this->Transferorders->get($id, [
            'contain' => ['Retaileremployees']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transferorder = $this->Transferorders->patchEntity($transferorder, $this->request->data);
            if ($this->Transferorders->save($transferorder)) {
                $this->Flash->success(__('The transferorder has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transferorder could not be saved. Please, try again.'));
        }
        $locations = $this->Transferorders->Locations->find('list', ['limit' => 200]);
        $retaileremployees = $this->Transferorders->Retaileremployees->find('list', ['limit' => 200]);
        $this->set(compact('transferorder', 'locations', 'retaileremployees'));
        $this->set('_serialize', ['transferorder']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Transferorder id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transferorder = $this->Transferorders->get($id);
        if ($this->Transferorders->delete($transferorder)) {
            $this->Flash->success(__('The transferorder has been deleted.'));
        } else {
            $this->Flash->error(__('The transferorder could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
