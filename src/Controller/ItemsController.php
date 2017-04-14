<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Error\Debugger;
use Cake\Event\Event;
use Cake\I18n\Time;

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

        $query = $this->Items->find()->contain([
            'Products' => function ($q) {
                return $q
                    ->select(['Products.barcode']);
            }
        ])->where(['Items.product_id' => '5'])->where(['Items.status' => 'In Location']);
        //var_dump($query);
        $this->set('query', $query);
        $this->set(compact('items', 'query'));
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

    public function htcCountBarCode() {
        $this->viewBuilder()->setLayout("ajax");
        $response = $this->request->data();

        $count = '';
        foreach($response as $key => $value) {
            if($key == 'tag') {

                $query = $this->Items->find('all' , [
                    'conditions' => ['Items.EPC =' => $value]])-> count();

                //var_dump($query);
                $this->set('status', $query);
        //     } else {
        //         $this->set('status', 'failed');
        //     }
                $this->set('_serialize', ['status']);
        // }
            }
        }
    }

    public function htcUpdateStatus(){
        $this->viewBuilder()->setLayout("ajax");
        $response = $this->request->data();
        $now = Time::now();

        $newStatus = '';
        
        foreach($response as $key => $value) {
            if($key == 'status') {
                $newStatus = $value;
                //var_dump($newStatus);
            } else {
                $item = $this->Items->get($value);
                $item['status'] = $newStatus." ".$now;
                //var_dump($item['status']);
                $this->Items->save($item);
                $this->set('status', 'success');
            }
        }
        //$this->set('status', 'failed');
        $this->set('_serialize', ['status']);
    }

    public function htcBarcode(){
        $query = $this->Items->find()->contain([
            'Products' => function ($q) {
                return $q
                ->select(['Products.barcode']);
            }
            ])->where(['Items.product_id' => '1'])->where(['Items.status' => 'In Location']);

        
        $this->set('status', $query);
        $this->set('_serialize', ['status']);

    }

    public function htcAllUpdateStatus(){
        $this->viewBuilder()->setLayout("ajax");
        $response = $this->request->data();
        $now = Time::now();

        //  var_dump($response);
        $newStatus = '';
        
        foreach($response as $key => $value) {
            if($key == 'status') {
                $newStatus = $value;
                //var_dump($newStatus);
            } else {
                $item = $this->Items->get($value);
                $item['status'] = $newStatus." ".$now;
                //var_dump($item['status']);
                $this->Items->save($item);
                $this->set('status', 'success');
            }
        }
        //$this->set('status', 'failed');
        $this->set('_serialize', ['status']);
    }

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

    public function checkpaymentstatus() {

        $rfid = $_POST['rfid'];
        $items = $this->Items->find()->where(['EPC' => $rfid]);
        $first = $items->first();

        $item = $this->Items->get($first['id']);

        echo ($item['status']);
        echo ("\n");
        die();
        
    }

    public function outboundrfidtag() {

        $this->loadModel("DeliveryOrdersItems");
        $this->loadModel("DeliveryOrders");
        $this->loadModel("TransferOrdersItems");
        $this->loadModel("TransferOrders");

        $id = $_POST['id'];
        $type = $_POST['type'];
        $item_id = $_POST['item_id'];

        $item = $this->Items->get($item_id);
        $item->status = "In Transit";
        $item->location_id = null;
        $item->section_id = null;

        if($this->Items->save($item)){

            if($type == 'to') {

                $array = $this->TransferOrdersItems->find()->where(['transfer_order_id' => $id])->toArray();

                $completed = true;
                foreach ($array as $row) {

                    $item = $this->Items->get($row['item_id']);

                    if($item['status'] != 'In Transit'){
                        $completed = false;
                        break;
                    }
                }

                if($completed){
                    $transferOrder = $this->TransferOrders->get($id);
                    $transferOrder->status = "In Transit";
                    $this->TransferOrders->save($transferOrder);
                }

            } else {

                $array = $this->DeliveryOrdersItems->find()->where(['delivery_order_id' => $id])->toArray();

                $completed = true;
                foreach ($array as $row) {

                    $item = $this->Items->get($row['item_id']);

                    if($item['status'] != 'In Transit'){
                        $completed = false;
                        break;
                    }
                }

                if($completed){
                    $deliveryOrder = $this->DeliveryOrders->get($id);
                    $deliveryOrder->status = "In Transit";
                    $this->DeliveryOrders->save($deliveryOrder);
                }

            }

            echo ("SUCCESS"."\n");
            
        } else {
            echo ("FAILED"."\n");
        }

        die();

    }

    public function inboundrfidtag() {

        $this->loadModel("PurchaseOrderItems");
        $this->loadModel("PurchaseOrders");
        $this->loadModel("TransferOrdersItems");
        $this->loadModel("TransferOrders");
        $this->loadModel("Sections");

        $type = $_POST['type'];
        echo ("$type: ".$type.'\n');
        $id = $_POST['id'];
        echo ("$type: ".$id.'\n');
        $location = $_POST['location'];
        echo ("$location: ".$location.'\n');
        $section_id = $_POST['section'];
        echo ("$section_id: ".$section_id.'\n');
        $space = $_POST['space'];
        echo ("$space: ".$space.'\n');
        $product = $_POST['product'];
        echo ("$product: ".$product.'\n');
        $use_reserve = $_POST['reserve'];
        echo ("$use_reserve: ".$use_reserve.'\n');
        //echo ("Type =".$type);

        $section = $this->Sections->get($section_id);
        $section->available_space = $section->available_space - $space;
        if($use_reserve){
            $section->reserve_space = $secion->reserve_space - $space;
        }
        $this->Sections->save($section);

        if($type == "po") {

            $po_id = $_POST['po_id'];
            echo ("$po_id: ".$po_id.'\n');
            $item_code = $_POST['item_code'];
            echo ("$item_code: ".$item_code.'\n');
            $desc = $_POST['desc'];
            echo ("$desc: ".$desc.'\n');
            $qty = $_POST['qty'];
            $price = $_POST['price'];
            $rfid_list = $_POST['rfid_list'];
            $count = 0;
            $rfid_list = substr($rfid_list, 1, strlen($rfid_list)-2);
            $rfid_arr = explode(", ", $rfid_list);

            $query = $this->PurchaseOrderItems->get($id);
            $query->quantity = 0;
            $this->PurchaseOrderItems->save($query);

            $array = $this->PurchaseOrderItems->find()->where(['purchase_order_id' => $po_id])->toArray();

            $completed = true;
            foreach ($array as $row) {
                if($row['quantity'] != 0){
                    $completed = false;
                    break;
                }
            }

            if($completed){
                $purchaseOrder = $this->PurchaseOrders->get($po_id);
                $purchaseOrder->delivery_status = 1;
                $this->PurchaseOrders->save($purchaseOrder);
            }


            while($count < $qty){
                echo ("rfid array[".$count."] = ".$rfid_arr[$count]."\n");
                $item = $this->Items->newEntity();
                $item->name = $item_code;
                $item->description = $desc;
                $item->section_id = $section_id;
                $item->location_id = $location;
                $item->EPC = $rfid_arr[$count];
                $item->status = "In Location";
                $item->product_id = $product;

                if($this->Items->save($item)){
                    echo ("SUCCESS"."\n");
                } else {
                    echo ("FAILED"."\n");
                }

                $count++;
            }

        } else {
            
            $to_id = $_POST['to_id'];
            $item = $this->Items->get($id);
            $item->location_id = $location;
            $item->section_id = $section;
            $item->status = "In Location";

            if($this->Items->save($item)){

                $array = $this->TransferOrdersItems->find()->where(['transfer_order_id' => $to_id])->toArray();

                $completed = true;
                foreach ($array as $row) {

                    $item = $this->Items->get($row['item_id']);

                    if($item['status'] != 'In Location'){
                        $completed = false;
                        break;
                    }
                }

                if($completed){
                    $transferOrder = $this->TransferOrders->get($to_id);
                    $transferOrder->status = "Completed";
                    $this->TransferOrders->save($transferOrder);
                }

                echo ("SUCCESS"."\n");
            } else {
                echo ("FAILED"."\n");
            }
        }

        die();
    }
}
