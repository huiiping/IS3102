<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Retaileracctypes Controller
 *
 * @property \App\Model\Table\RetaileracctypesTable $Retaileracctypes
 */
class RetaileracctypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $retaileracctypes = $this->paginate($this->Retaileracctypes);

        $this->set(compact('retaileracctypes'));
        $this->set('_serialize', ['retaileracctypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Retaileracctype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retaileracctype = $this->Retaileracctypes->get($id, [
            'contain' => ['Retailers']
        ]);

        $this->set('retaileracctype', $retaileracctype);
        $this->set('_serialize', ['retaileracctype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retaileracctype = $this->Retaileracctypes->newEntity();
        if ($this->request->is('post')) {
            $retaileracctype = $this->Retaileracctypes->patchEntity($retaileracctype, $this->request->data);
            if ($this->Retaileracctypes->save($retaileracctype)) {
                $this->Flash->success(__('The retaileracctype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retaileracctype could not be saved. Please, try again.'));
        }
        $this->set(compact('retaileracctype'));
        $this->set('_serialize', ['retaileracctype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retaileracctype id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retaileracctype = $this->Retaileracctypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retaileracctype = $this->Retaileracctypes->patchEntity($retaileracctype, $this->request->data);
            if ($this->Retaileracctypes->save($retaileracctype)) {
                $this->Flash->success(__('The retaileracctype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retaileracctype could not be saved. Please, try again.'));
        }
        $this->set(compact('retaileracctype'));
        $this->set('_serialize', ['retaileracctype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retaileracctype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retaileracctype = $this->Retaileracctypes->get($id);
        if ($this->Retaileracctypes->delete($retaileracctype)) {
            $this->Flash->success(__('The retaileracctype has been deleted.'));
        } else {
            $this->Flash->error(__('The retaileracctype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
