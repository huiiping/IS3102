<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * RetailerEmployeeRoles Controller
 *
 * @property \App\Model\Table\RetailerEmployeeRolesTable $RetailerEmployeeRoles
 */
class RetailerEmployeeRolesController extends AppController
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
        //$retailerEmployeeRoles = $this->paginate($this->RetailerEmployeeRoles);
        $this->loadComponent('Prg');
        $this->Prg->commonProcess();
        $this->set('retailerEmployeeRoles', $this->paginate($this->RetailerEmployeeRoles->find('searchable', $this->Prg->parsedParams())));
        $this->set(compact('retailerEmployeeRoles'));
        $this->set('_serialize', ['retailerEmployeeRoles']);
    }
    public $components = array(
        'Prg'
    );

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

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        $this->Logging->rLog($retailerEmployeeRole['id']);
        $this->Logging->iLog($retailer, $retailerEmployeeRole['id']);

        $this->set('retailerEmployeeRole', $retailerEmployeeRole);
        $this->set('_serialize', ['retailerEmployeeRole']);
    }

    // /**
    //  * Add method
    //  *
    //  * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
    //  */
    // public function add()
    // {
    //     $retailerEmployeeRole = $this->RetailerEmployeeRoles->newEntity();
    //     if ($this->request->is('post')) {
    //         $retailerEmployeeRole = $this->RetailerEmployeeRoles->patchEntity($retailerEmployeeRole, $this->request->data);
    //         if ($this->RetailerEmployeeRoles->save($retailerEmployeeRole)) {
    //             $this->Flash->success(__('The retailer employee role has been saved.'));

    //             $session = $this->request->session();
    //             $retailer = $session->read('retailer');

    //             //$this->loadComponent('Logging');
    //             $this->Logging->rLog($retailerEmployeeRole['id']);
    //             $this->Logging->iLog($retailer, $retailerEmployeeRole['id']);

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The retailer employee role could not be saved. Please, try again.'));
    //     }
    //     $retailerEmployees = $this->RetailerEmployeeRoles->RetailerEmployees->find('list', ['limit' => 200]);
    //     $this->set(compact('retailerEmployeeRole', 'retailerEmployees'));
    //     $this->set('_serialize', ['retailerEmployeeRole']);
    // }

    // /**
    //  * Edit method
    //  *
    //  * @param string|null $id Retailer Employee Role id.
    //  * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
    //  * @throws \Cake\Network\Exception\NotFoundException When record not found.
    //  */
    // public function edit($id = null)
    // {
    //     $retailerEmployeeRole = $this->RetailerEmployeeRoles->get($id, [
    //         'contain' => ['RetailerEmployees']
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $retailerEmployeeRole = $this->RetailerEmployeeRoles->patchEntity($retailerEmployeeRole, $this->request->data);
    //         if ($this->RetailerEmployeeRoles->save($retailerEmployeeRole)) {
    //             $this->Flash->success(__('The retailer employee role has been saved.'));

    //             $session = $this->request->session();
    //             $retailer = $session->read('retailer');

    //             //$this->loadComponent('Logging');
    //             $this->Logging->rLog($retailerEmployeeRole['id']);
    //             $this->Logging->iLog($retailer, $retailerEmployeeRole['id']);

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The retailer employee role could not be saved. Please, try again.'));
    //     }
    //     $retailerEmployees = $this->RetailerEmployeeRoles->RetailerEmployees->find('list', ['limit' => 200]);
    //     $this->set(compact('retailerEmployeeRole', 'retailerEmployees'));
    //     $this->set('_serialize', ['retailerEmployeeRole']);
    // }

    // /**
    //  * Delete method
    //  *
    //  * @param string|null $id Retailer Employee Role id.
    //  * @return \Cake\Network\Response|null Redirects to index.
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $retailerEmployeeRole = $this->RetailerEmployeeRoles->get($id);
    //     if ($this->RetailerEmployeeRoles->delete($retailerEmployeeRole)) {
    //         $this->Flash->success(__('The retailer employee role has been deleted.'));

    //         $session = $this->request->session();
    //         $retailer = $session->read('retailer');

    //         //$this->loadComponent('Logging');
    //         $this->Logging->rLog($retailerEmployeeRole['id']);
    //         $this->Logging->iLog($retailer, $retailerEmployeeRole['id']);
        
    //     } else {
    //         $this->Flash->error(__('The retailer employee role could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
