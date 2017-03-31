<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Error\Debugger;
use Cake\Datasource\ConnectionManager;
use Cake\Utility\Hash;
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
            'contain' => ['Products', 'Locations', 'Reports', 'Feedbacks', 'TransactionItems']
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
            //get location id of warehouse employee
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

    public function checkStock($pid = null, $lid = null)
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $session = $this->request->session();
            $retailer = $session->read('retailer');
            $database = $retailer->retailer_name."db";

            //connect to retailer's db
            ConnectionManager::drop('conn1'); 
            ConnectionManager::config('conn1', [
                'className' => 'Cake\Database\Connection',
                'driver' => 'Cake\Database\Driver\Mysql',
                'persistent' => false,
                'host' => 'localhost',
                'username' => 'root',
                'password' => 'joy',
                'database' => $database,
                'encoding' => 'utf8',
                'timezone' => 'UTC',
                'cacheMetadata' => true,
            ]);
            $conn = ConnectionManager::get('conn1');
            //count no. of items of a particular product at a particular location
            $countItems = $conn
            ->newQuery()
            ->select('COUNT(*)')
            ->from('Items')
            ->where(['product_id' => $pid, 'location_id' => '$lid'])
            ->execute()
            ->fetchAll('assoc');
            //check stock level threshold of a particular product at a particular location
            $compareStock = $conn
            ->newQuery()
            ->select('threshold')
            ->from('StockLevels')
            ->where(['product_id' => $pid, 'location_id' => '$lid'])
            ->execute()
            ->fetchAll('assoc');

            $query = $items->find();
            $query->select(['Articles.id', $query->func()->count('Comments.id')])
                ->matching('Comments')
                ->group(['Articles.id']);
            $total = $query->count();

            return $this->redirect(['action' => 'index']);
        }
    } 

    public function inbound()
    {
        $inbound = $this->Items->newEntity();
        // $id = 1;
        // $item = $this->Items->get($id, [
        //     'contain' => []
        // ]);
        // if ($this->request->is(['patch', 'post', 'put'])) {
        //     $item = $this->Items->patchEntity($item, $this->request->data);
        //     if ($this->Items->save($item)) {
        //         $this->Flash->success(__('The item has been saved.'));

        //         $retailer = $session->read('retailer');

        //         //$this->loadComponent('Logging');
        //         $this->Logging->rLog($item['id']);
        //         $this->Logging->iLog($retailer, $item['id']);

        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The item could not be saved. Please, try again.'));
        // }
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($_POST['submit_button'])) {
                $inbound = $this->Items->patchEntity($inbound, $this->request->data);

                $space = $inbound['space'];
            } else {
                if (isset($_POST['save_button'])) {
                    $inbound = $this->Items->patchEntity($inbound, $this->request->data);

                    $space = $inbound['space'];
                    $selectedItems = $inbound['item']['_ids'];
                    $sid = $inbound['section_id'];
                    debugger::Dump($selectedItems);

                    foreach ($selectedItems as $selectedItem) {
                        if($selectedItem != '') {
                            $items = TableRegistry::get('Items');
                            $item = $items->get($selectedItem);

                            $item->section_id = $sid;
                            $items->save($item);

                            $session = $this->request->session();
                            $retailer = $session->read('retailer');

                            //$this->loadComponent('Logging');
                            $this->Logging->rLog($item['id']);
                            $this->Logging->iLog($retailer, $item['id']);
                        }
                    }
                    $sections = TableRegistry::get('Sections');
                    $section = $sections->get($sid);

                    $newspace = $section->available_space;
                    $newspace = $newspace - $space;

                    $section->available_space = $newspace;
                    $sections->save($section);

                    $session = $this->request->session();
                    $retailer = $session->read('retailer');

                    //$this->loadComponent('Logging');
                    $this->Logging->rLog($section['id']);
                    $this->Logging->iLog($retailer, $section['id']);

                    $this->Flash->success(__('The item(s) has(have) been saved.'));
                    return $this->redirect(['action' => 'index']); 
                }
                else 
                {
                    $this->Flash->error(__('The item(s) could not be saved. Please, try again.'));
                }
            }
        }
        $session = $this->request->session();
        //get location id of warehouse employee
        $lid = $_SESSION['Auth']['User']['location_id'];

        $this->set(compact('item', 'lid', 'space'));
        $this->set('_serialize', ['item']);
    } 
}
