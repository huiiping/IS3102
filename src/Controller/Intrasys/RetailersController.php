<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Retailers Controller
 *
 * @property \App\Model\Table\RetailersTable $Retailers
 */
class RetailersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Retaileracctypes']
        ];
        $retailers = $this->paginate($this->Retailers);

        $this->set(compact('retailers'));
        $this->set('_serialize', ['retailers']);
    }

    /**
     * View method
     *
     * @param string|null $id Retailer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retailer = $this->Retailers->get($id, [
            'contain' => ['Retaileracctypes']
        ]);

        $this->set('retailer', $retailer);
        $this->set('_serialize', ['retailer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retailer = $this->Retailers->newEntity();
        if ($this->request->is('post')) {
            $retailer = $this->Retailers->patchEntity($retailer, $this->request->data);
            if ($this->Retailers->save($retailer)) {
                $this->Flash->success(__('The retailer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer could not be saved. Please, try again.'));
        }
        $retaileracctypes = $this->Retailers->Retaileracctypes->find('list', ['limit' => 200]);
        $this->set(compact('retailer', 'retaileracctypes'));
        $this->set('_serialize', ['retailer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retailer id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retailer = $this->Retailers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retailer = $this->Retailers->patchEntity($retailer, $this->request->data);
            if ($this->Retailers->save($retailer)) {
                $this->Flash->success(__('The retailer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer could not be saved. Please, try again.'));
        }
        $retaileracctypes = $this->Retailers->Retaileracctypes->find('list', ['limit' => 200]);
        $this->set(compact('retailer', 'retaileracctypes'));
        $this->set('_serialize', ['retailer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retailer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retailer = $this->Retailers->get($id);
        if ($this->Retailers->delete($retailer)) {
            $this->Flash->success(__('The retailer has been deleted.'));
        } else {
            $this->Flash->error(__('The retailer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
