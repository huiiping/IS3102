<?php
namespace Retailerdb\Controller;

use Retailerdb\Controller\AppController;

/**
 * Loggings Controller
 *
 * @property \Retailerdb\Model\Table\LoggingsTable $Loggings
 */
class LoggingsController extends AppController
{

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
        $loggings = $this->paginate($this->Loggings);

        $this->set(compact('loggings'));
        $this->set('_serialize', ['loggings']);
    }

    /**
     * View method
     *
     * @param string|null $id Logging id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $logging = $this->Loggings->get($id, [
            'contain' => ['RetailerEmployees']
        ]);

        $this->set('logging', $logging);
        $this->set('_serialize', ['logging']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $logging = $this->Loggings->newEntity();
        if ($this->request->is('post')) {
            $logging = $this->Loggings->patchEntity($logging, $this->request->data);
            if ($this->Loggings->save($logging)) {
                $this->Flash->success(__('The logging has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The logging could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->Loggings->RetailerEmployees->find('list', ['limit' => 200]);
        $this->set(compact('logging', 'retailerEmployees'));
        $this->set('_serialize', ['logging']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Logging id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $logging = $this->Loggings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $logging = $this->Loggings->patchEntity($logging, $this->request->data);
            if ($this->Loggings->save($logging)) {
                $this->Flash->success(__('The logging has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The logging could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->Loggings->RetailerEmployees->find('list', ['limit' => 200]);
        $this->set(compact('logging', 'retailerEmployees'));
        $this->set('_serialize', ['logging']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Logging id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $logging = $this->Loggings->get($id);
        if ($this->Loggings->delete($logging)) {
            $this->Flash->success(__('The logging has been deleted.'));
        } else {
            $this->Flash->error(__('The logging could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
