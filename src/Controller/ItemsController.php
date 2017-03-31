<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 */
class ItemsController extends AppController
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
        $this->loadComponent('Prg');
        $this->Prg->commonProcess();
        $this->paginate = [
            'contain' => ['Products', 'Locations', 'Sections']
        ];
        $this->set('items', $this->paginate($this->Items->find('searchable', $this->Prg->parsedParams())));
        $this->set(compact('items'));
        $this->set('_serialize', ['items']);
    }
    public $components = array(
        'Prg'
    );

    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Products', 'Locations', 'Reports', 'DeliveryOrderItems', 'Feedbacks', 'TransactionItems', 'TransferOrderItems']
        ]);

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        $this->Logging->rLog($item['id']);
        $this->Logging->iLog($retailer, $item['id']);
        
        $this->set('item', $item);
        $this->set('_serialize', ['item']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $item = $this->Items->newEntity();
        if ($this->request->is('post')) {
            $item = $this->Items->patchEntity($item, $this->request->data);

            $session = $this->request->session();
            $item['location_id'] = $_SESSION['Auth']['User']['location_id'];

            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));
                
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($item['id']);
                $this->Logging->iLog($retailer, $item['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $products = $this->Items->Products->find('all', ['limit' => 200]);
        $locations = $this->Items->Locations->find('all', ['limit' => 200]);
        $sections = $this->Items->Sections->find('all', ['limit' => 200]);
        $this->set(compact('item', 'products', 'locations', 'sections'));
        $this->set('_serialize', ['item']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->data);
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($item['id']);
                $this->Logging->iLog($retailer, $item['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $products = $this->Items->Products->find('list', ['limit' => 200]);
        $locations = $this->Items->Locations->find('list', ['limit' => 200]);
        $this->set(compact('item', 'products', 'locations'));
        $this->set('_serialize', ['item']);

        //populate rows from products table
        $this->set('prods', $this->Items->Products->find('all'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        if ($this->Items->delete($item)) {
            $this->Flash->success(__('The item has been deleted.'));

            $session = $this->request->session();
            $retailer = $session->read('retailer');

            //$this->loadComponent('Logging');
            $this->Logging->rLog($item['id']);
            $this->Logging->iLog($retailer, $item['id']);

        } else {
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function inbound()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $session = $this->request->session();
            $retailer = $session->read('retailer');

            //$this->loadComponent('Logging');
            $this->Logging->rLog($item['id']);
            $this->Logging->iLog($retailer, $item['id']);

            return $this->redirect(['action' => 'index']);
        }
    }    
}
