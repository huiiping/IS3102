<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RetailerEmployeeRoles Controller
 *
 * @property \App\Model\Table\RetailerEmployeeRolesTable $RetailerEmployeeRoles
 */
class RetailerEmployeeRolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadcomponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'userModel' => 'RetailerEmployees',
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ],
                ]
            ],
            'loginAction' => [
                'controller' => 'RetailerEmployees',
                'action' => 'login'
            ]
        ]);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add', 'logout']);
    }
    public function index()
    {
        $retailerEmployeeRoles = $this->paginate($this->RetailerEmployeeRoles);

        $this->set(compact('retailerEmployeeRoles'));
        $this->set('_serialize', ['retailerEmployeeRoles']);
    }

    /**
     * View method
     *
     * @param string|null $id Retailer Employee Role id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retailerEmployeeRole = $this->RetailerEmployeeRoles->get($id, [
            'contain' => ['RetailerEmployees']
        ]);

        $this->set('retailerEmployeeRole', $retailerEmployeeRole);
        $this->set('_serialize', ['retailerEmployeeRole']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retailerEmployeeRole = $this->RetailerEmployeeRoles->newEntity();
        if ($this->request->is('post')) {
            $retailerEmployeeRole = $this->RetailerEmployeeRoles->patchEntity($retailerEmployeeRole, $this->request->data);
            if ($this->RetailerEmployeeRoles->save($retailerEmployeeRole)) {
                $this->Flash->success(__('The retailer employee role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer employee role could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->RetailerEmployeeRoles->RetailerEmployees->find('list', ['limit' => 200]);
        $this->set(compact('retailerEmployeeRole', 'retailerEmployees'));
        $this->set('_serialize', ['retailerEmployeeRole']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retailer Employee Role id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retailerEmployeeRole = $this->RetailerEmployeeRoles->get($id, [
            'contain' => ['RetailerEmployees']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retailerEmployeeRole = $this->RetailerEmployeeRoles->patchEntity($retailerEmployeeRole, $this->request->data);
            if ($this->RetailerEmployeeRoles->save($retailerEmployeeRole)) {
                $this->Flash->success(__('The retailer employee role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retailer employee role could not be saved. Please, try again.'));
        }
        $retailerEmployees = $this->RetailerEmployeeRoles->RetailerEmployees->find('list', ['limit' => 200]);
        $this->set(compact('retailerEmployeeRole', 'retailerEmployees'));
        $this->set('_serialize', ['retailerEmployeeRole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retailer Employee Role id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retailerEmployeeRole = $this->RetailerEmployeeRoles->get($id);
        if ($this->RetailerEmployeeRoles->delete($retailerEmployeeRole)) {
            $this->Flash->success(__('The retailer employee role has been deleted.'));
        } else {
            $this->Flash->error(__('The retailer employee role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
