<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Error\Debugger;
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

    public function htcindex() {
        $this->viewBuilder()->setLayout("ajax");
        $response = $this->request->data();

        foreach($response as $key => $value) {
            if($key == 'locationId') {
                // var_dump("in check locationID");

                $query = $this->Items->find('all' , [
                    'conditions' => ['Items.location_id =' => $value],
                    ]);

                //$items = $query->toArray();
                
                if ($query == null) {
                    $this->set('query', 'noItems');    
                } else {
                    $this->set('query', $query);
                }
            }
            else {
                $this->set('query', 'error');
                return;
            }
            $this->set('_serialize', ['query']);
        }
    }

    public function htcUpdateStatus(){
        $this->viewBuilder()->setLayout("ajax");
        $response = $this->request->data();

        $newStatus = '';
        foreach($response as $key => $value) {
            if($key == 'status') {
                $newStatus = $value;
                //var_dump($newStatus);
            } else {
                $item = $this->Items->get($value);
                $item['status'] = $newStatus;
                //var_dump($item['status']);
                $this->Items->save($item);
                $this->set('status', 'success');
           }
        }
        //$this->set('status', 'failed');
        $this->set('_serialize', ['status']);
    }

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
            'contain' => ['Products', 'Locations', 'Sections']
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

    public function checkStock($id = null, $lid = null)
    {
        $items = TableRegistry::get('Items');
        $item = $items->get($id);

        $pid = $item->product_id;

        //retrieve threshold of a product at a particular location
        $allStockLevels = TableRegistry::get('StockLevels');
        $stockLevels = $allStockLevels
        ->find()
        ->where(['product_id' => $pid, 'location_id' => $lid]);

        foreach ($stockLevels as $sl) {
            $stockLevel = $allStockLevels->get($sl->id);
        }
        $threshold = $stockLevel->threshold;

        //retrieve no.of items of a particular product at a particular location
        $allItems = TableRegistry::get('Items');
        $itemCounts = $allItems
        ->find()
        ->where(['product_id' => $pid, 'location_id' => $lid]);
        
        $count = 0;
        foreach ($itemCounts as $itemCount) {
            $count = $count + 1;
        }

        //if stock level falls below threshold
        if ($threshold > $count) {
            //change status of stock level
            $stockLevel->status = 'Triggered';

            $allStockLevels->save($stockLevel);

            //alert (message) employee that is incharge of managing stock level
            $eid = $stockLevel->retailer_employee_id;

            //create new message
            $msgTable = TableRegistry::get('Messages');
            $message = $msgTable->newEntity();

            //get location and product details
            $products = TableRegistry::get('Products');
            $product = $products->get($pid);
            $prod = $product->prod_name;
            $locations = TableRegistry::get('Locations');
            $location = $locations->get($lid);
            $loc = $location->name;

            $message->title = 'Low Stock Level Alert';
            $message->message = 'Product '.$prod.' at '.$loc.' is running low in stock.';
            $message->status = 0;
            
            // The $message entity contains the id now
            if ($msgTable->save($message)) {
                $mid = $message->id;
            }

            //save message to employee (joined entities)
            $emTable = TableRegistry::get('RetailerEmployeesMessages');
            $em = $emTable->newEntity();

            $em->retailer_employee_id = $eid;
            $em->message_id = $mid;

            $emTable->save($em);
        } 
    } 

    public function inbound()
    {
        $inbound = $this->Items->newEntity();

        if ($this->request->is(['patch', 'post', 'put'])) {
            //generate section(s) that has(have) available space
            if (isset($_POST['generate_button'])) {
                $inbound = $this->Items->patchEntity($inbound, $this->request->data);

                $space = $inbound['space'];
            } 
            else {
                //update item's section_id and section's available space
                if (isset($_POST['save_button'])) {
                    $inbound = $this->Items->patchEntity($inbound, $this->request->data);

                    if ($inbound['section_id'] == null) {
                        $this->Flash->error(__('Please select a section'));
                    } else {

                        $space = $inbound['space'];
                        $selectedItems = $inbound['item']['_ids'];
                        $sid = $inbound['section_id'];

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
                }
                else {
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

    public function outbound()
    {
        $outbound = $this->Items->newEntity();
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            //generate items in the particular section
            if (isset($_POST['generate_button'])) {
                $outbound = $this->Items->patchEntity($outbound, $this->request->data);

                $selectedItems = $outbound['item']['_ids'];

                $allItems = TableRegistry::get('Items');
                $allSections = TableRegistry::get('Sections');

                $sections = array();

                //retrieving section(s) of item(s) selected
                foreach ($selectedItems as $selectedItem) {
                    if ($selectedItem != '') {
                        $item = $allItems->get($selectedItem);
                        $sid = $item->section_id;

                        if (!in_array($allSections->get($sid), $sections)) {
                            $sections[] = $allSections->get($sid);
                        }
                    }
                }
            } 
            else {
                //manage outbound goods
                if (isset($_POST['save_button'])) {
                    $outbound = $this->Items->patchEntity($outbound, $this->request->data);

                    $selectedItems = $outbound['item']['_ids'];

                    $allItems = TableRegistry::get('Items');
                    $allSections = TableRegistry::get('Sections');

                    $sections = array();

                    //retrieving section(s) of item(s) selected
                    foreach ($selectedItems as $selectedItem) {
                        if ($selectedItem != '') {
                            $item = $allItems->get($selectedItem);
                            $sid = $item->section_id;

                            if (!in_array($allSections->get($sid), $sections)) {
                                $sections[] = $allSections->get($sid);
                            }
                        }
                    }
                    $error = true;

                    //check if required field(s) is(are) filled
                    foreach ($sections as $section) {
                        if ($outbound[$section->id] == null) {
                            $error = true;
                            $this->Flash->error(__('Please fill in section field(s)'));
                            break;
                        } else {
                            $error = false;

                            $space = $outbound[$section->id];
                            $newspace = $section->space_limit - $section->available_space - $section->reserve_space;

                            //prompt error if 'units of space to free' is more than space_limit minus available_space
                            if ($newspace < $space) {
                                $error = true;
                                $this->Flash->error(__('The value entered for "Estimated Space to Free in Units" field cannot be more than the current space that is used up in the section.'));
                                break;
                            }
                        }
                    }
                    $type = $outbound['type'];

                    //if item(s) is(are) being transferred to another location
                    if ($type == 1) {
                        if ($outbound['location_id'] == null || $outbound['transfer_order'] == null || ($outbound['location_id'] == null && $outbound['transfer_order'] == null)) {
                            $error = true;
                            $this->Flash->error(__('Please fill in location and/or transfer order fields'));
                        }
                    }

                    if (!$error) {

                        //if item(s) is(are) being transferred to another location
                        if ($type == 1) {
                            $locationId = $outbound['location_id'];

                            foreach ($selectedItems as $selectedItem) {
                                if($selectedItem != '') {
                                    $items = TableRegistry::get('Items');
                                    $item = $items->get($selectedItem);

                                    $sid = $item->section_id;
                                    $item->section_id = null;
                                    $item->location_id = $locationId;
                                    $tOid = $outbound['transfer_order'];
                                    $item->status = 'Transferred (Refer to Transfer Order : Id '.$tOid.')';
                                    $items->save($item);

                                    $session = $this->request->session();
                                    $retailer = $session->read('retailer');

                                    //$this->loadComponent('Logging');
                                    $this->Logging->rLog($item['id']);
                                    $this->Logging->iLog($retailer, $item['id']);
                                }
                            }
                            //check stock level
                            foreach ($selectedItems as $selectedItem) {
                                if($selectedItem != '') {
                                    $session = $this->request->session();
                                    //get location id of warehouse employee
                                    $lid = $_SESSION['Auth']['User']['location_id'];

                                    $this->checkStock($selectedItem , $lid);
                                }
                            }
                        }
                        //if item(s) is(are) sold
                        else {                                    
                            foreach ($selectedItems as $selectedItem) {
                                if($selectedItem != '') {
                                    $items = TableRegistry::get('Items');
                                    $item = $items->get($selectedItem);

                                    $sid = $item->section_id;
                                    $item->section_id = null;
                                    $item->location_id = null;
                                    $item->status = 'Sold';
                                    $items->save($item);

                                    $session = $this->request->session();
                                    $retailer = $session->read('retailer');

                                    //$this->loadComponent('Logging');
                                    $this->Logging->rLog($item['id']);
                                    $this->Logging->iLog($retailer, $item['id']);
                                }
                            }
                            //check stock level
                            foreach ($selectedItems as $selectedItem) {
                                if($selectedItem != '') {
                                    $session = $this->request->session();
                                    //get location id of warehouse employee
                                    $lid = $_SESSION['Auth']['User']['location_id'];

                                    $this->checkStock($selectedItem , $lid);
                                }
                            }
                        }
                        //update section's available space
                        foreach ($sections as $section) {
                            $newspace = $section->available_space + $space;

                            $section->available_space = $newspace;
                            $allSections->save($section);

                            $session = $this->request->session();
                            $retailer = $session->read('retailer');

                            //$this->loadComponent('Logging');
                            $this->Logging->rLog($section['id']);
                            $this->Logging->iLog($retailer, $section['id']);
                        }                   
                        //if successful
                        $this->Flash->success(__('The item(s) has(have) been saved.'));

                        return $this->redirect(['action' => 'index']);
                    } 
                }
                else {
                    $this->Flash->error(__('The item(s) could not be saved. Please, try again.'));
                }
            }
        }
        $session = $this->request->session();
        //get location id of warehouse employee
        $lid = $_SESSION['Auth']['User']['location_id'];

        $this->set(compact('item', 'lid', 'sections'));
        $this->set('_serialize', ['item']);
    } 
}
