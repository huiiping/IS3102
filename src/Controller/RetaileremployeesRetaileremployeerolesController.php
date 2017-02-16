<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RetaileremployeesRetaileremployeeroles Controller
 *
 * @property \App\Model\Table\RetaileremployeesRetaileremployeerolesTable $RetaileremployeesRetaileremployeeroles
 */
class RetaileremployeesRetaileremployeerolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Retaileremployees', 'Retaileremployeeroles']
        ];
        $retaileremployeesRetaileremployeeroles = $this->paginate($this->RetaileremployeesRetaileremployeeroles);

        $this->set(compact('retaileremployeesRetaileremployeeroles'));
        $this->set('_serialize', ['retaileremployeesRetaileremployeeroles']);
    }

    /**
     * View method
     *
     * @param string|null $id Retaileremployees Retaileremployeerole id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retaileremployeesRetaileremployeerole = $this->RetaileremployeesRetaileremployeeroles->get($id, [
            'contain' => ['Retaileremployees', 'Retaileremployeeroles']
        ]);

        $this->set('retaileremployeesRetaileremployeerole', $retaileremployeesRetaileremployeerole);
        $this->set('_serialize', ['retaileremployeesRetaileremployeerole']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retaileremployeesRetaileremployeerole = $this->RetaileremployeesRetaileremployeeroles->newEntity();
        if ($this->request->is('post')) {
            $retaileremployeesRetaileremployeerole = $this->RetaileremployeesRetaileremployeeroles->patchEntity($retaileremployeesRetaileremployeerole, $this->request->data);
            if ($this->RetaileremployeesRetaileremployeeroles->save($retaileremployeesRetaileremployeerole)) {
                $this->Flash->success(__('The retaileremployees retaileremployeerole has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retaileremployees retaileremployeerole could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->RetaileremployeesRetaileremployeeroles->Retaileremployees->find('list', ['limit' => 200]);
        $retaileremployeeroles = $this->RetaileremployeesRetaileremployeeroles->Retaileremployeeroles->find('list', ['limit' => 200]);
        $this->set(compact('retaileremployeesRetaileremployeerole', 'retaileremployees', 'retaileremployeeroles'));
        $this->set('_serialize', ['retaileremployeesRetaileremployeerole']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retaileremployees Retaileremployeerole id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retaileremployeesRetaileremployeerole = $this->RetaileremployeesRetaileremployeeroles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retaileremployeesRetaileremployeerole = $this->RetaileremployeesRetaileremployeeroles->patchEntity($retaileremployeesRetaileremployeerole, $this->request->data);
            if ($this->RetaileremployeesRetaileremployeeroles->save($retaileremployeesRetaileremployeerole)) {
                $this->Flash->success(__('The retaileremployees retaileremployeerole has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retaileremployees retaileremployeerole could not be saved. Please, try again.'));
        }
        $retaileremployees = $this->RetaileremployeesRetaileremployeeroles->Retaileremployees->find('list', ['limit' => 200]);
        $retaileremployeeroles = $this->RetaileremployeesRetaileremployeeroles->Retaileremployeeroles->find('list', ['limit' => 200]);
        $this->set(compact('retaileremployeesRetaileremployeerole', 'retaileremployees', 'retaileremployeeroles'));
        $this->set('_serialize', ['retaileremployeesRetaileremployeerole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retaileremployees Retaileremployeerole id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retaileremployeesRetaileremployeerole = $this->RetaileremployeesRetaileremployeeroles->get($id);
        if ($this->RetaileremployeesRetaileremployeeroles->delete($retaileremployeesRetaileremployeerole)) {
            $this->Flash->success(__('The retaileremployees retaileremployeerole has been deleted.'));
        } else {
            $this->Flash->error(__('The retaileremployees retaileremployeerole could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
