<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use CakePdf\Pdf\CakePdf;



class DeliveryOrdersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadcomponent('DbSchema');
        $this->loadComponent('Logging');
    }

    public function index()
    {

        $this->loadComponent('Prg');
        $this->Prg->commonProcess();

        $this->paginate = [
        'contain' => ['Customers', 'RetailerEmployees', 'Locations', 'Transactions']
        ];
       // $deliveryOrders = $this->paginate($this->DeliveryOrders);

        $this->set('deliveryOrders', $this->paginate($this->DeliveryOrders->find('searchable',  $this->Prg->parsedParams())));

        $this->set(compact('deliveryOrders'));
        $this->set('_serialize', ['deliveryOrders']);
    }

    public $components = array(
      'Prg'
      );

    public function view($id = null)
    {   

        // $this->pdfConfig = array(
        //     'engine' => 'CakePdf.DomPdf',
        //     'download' => true,
        //     'filename' => 'apples.pdf');

        $deliveryOrder = $this->DeliveryOrders->get($id, [
            'contain' => ['Customers', 'RetailerEmployees', 'Locations', 'Transactions', 'Items']
            ]);


        $this->set('deliveryOrder', $deliveryOrder);
        $this->set('_serialize', ['deliveryOrder']);
    }

    public function add()
    {
        $deliveryOrder = $this->DeliveryOrders->newEntity();

        if ($this->request->is('post')) {
            $deliveryOrder = $this->DeliveryOrders->patchEntity($deliveryOrder, $this->request->getData());
            if ($this->DeliveryOrders->save($deliveryOrder)) {
                $this->Flash->success(__('The delivery order has been saved.'));
                $session = $this->request->session();
                $session->write('deliveryOrder',$deliveryOrder);
                return $this->redirect(['action' => 'add2']);
            }
            $this->Flash->error(__('The delivery order could not be saved. Please, try again.'));
        }
        $customers = $this->DeliveryOrders->Customers->find('list', ['limit' => 200]);
        $retailerEmployees = $this->DeliveryOrders->RetailerEmployees->find('list', ['limit' => 200]);
        $locations = $this->DeliveryOrders->Locations->find('list', ['limit' => 200]);
        $transactions = $this->DeliveryOrders->Transactions->find('list', ['limit' => 200]);
        $this->set(compact('deliveryOrder', 'customers', 'retailerEmployees', 'locations', 'transactions'));
        $this->set('_serialize', ['deliveryOrder']);
    }

    public function add2()
    {
      $session = $this->request->session();
        $deliveryOrder = $session->read('deliveryOrder');

        if ($this->request->is('post')) {
            $deliveryOrder = $this->DeliveryOrders->patchEntity($deliveryOrder, $this->request->getData());
            if ($this->DeliveryOrders->save($deliveryOrder)) {
                $this->Flash->success(__('The delivery order items has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The delivery order could not be saved. Please, try again.'));
        }
        $customers = $this->DeliveryOrders->Customers->find('list', ['limit' => 200]);
        $retailerEmployees = $this->DeliveryOrders->RetailerEmployees->find('list', ['limit' => 200]);
        $locations = $this->DeliveryOrders->Locations->find('list', ['limit' => 200]);
        $transactions = $this->DeliveryOrders->Transactions->find('list', ['limit' => 200]);
        $this->set('deliveryOrder', $deliveryOrder);
        $this->set(compact('deliveryOrder', 'customers', 'retailerEmployees', 'locations', 'transactions'));
        $this->set('_serialize', ['deliveryOrder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Delivery Order id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deliveryOrder = $this->DeliveryOrders->get($id, [
            'contain' => []
            ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deliveryOrder = $this->DeliveryOrders->patchEntity($deliveryOrder, $this->request->getData());
            if ($this->DeliveryOrders->save($deliveryOrder)) {
                $this->Flash->success(__('The delivery order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The delivery order could not be saved. Please, try again.'));
        }
        $customers = $this->DeliveryOrders->Customers->find('list', ['limit' => 200]);
        $retailerEmployees = $this->DeliveryOrders->RetailerEmployees->find('list', ['limit' => 200]);
        $locations = $this->DeliveryOrders->Locations->find('list', ['limit' => 200]);
        $transactions = $this->DeliveryOrders->Transactions->find('list', ['limit' => 200]);
        $this->set(compact('deliveryOrder', 'customers', 'retailerEmployees', 'locations', 'transactions'));
        $this->set('_serialize', ['deliveryOrder']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Delivery Order id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deliveryOrder = $this->DeliveryOrders->get($id);
        if ($this->DeliveryOrders->delete($deliveryOrder)) {
            $this->Flash->success(__('The delivery order has been deleted.'));
        } else {
            $this->Flash->error(__('The delivery order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function pendingStatus($id) {

      $deliveryOrder = $this->DeliveryOrders->get($id);

      $deliveryOrder->status = 'Pending';
      $this->DeliveryOrders->save($deliveryOrder);

      $session = $this->request->session();
      $retailer = $session->read('retailer');
      $this->Logging->rLog($deliveryOrder['id']);
      $this->Logging->iLog($retailer, $deliveryOrder['id']);

      $this->Flash->success(__('The delivery order has a pending status.'));

      return $this->redirect(['action' => 'index']);
  }

  public function deliveredStatus($id) {

    $deliveryOrder = $this->DeliveryOrders->get($id);

    $deliveryOrder->status = 'Delivered';
    $this->DeliveryOrders->save($deliveryOrder);

    $session = $this->request->session();
    $retailer = $session->read('retailer');
    $this->Logging->rLog($deliveryOrder['id']);
    $this->Logging->iLog($retailer, $deliveryOrder['id']);

    $this->Flash->success(__('The delivery order has a delivered status.'));

    return $this->redirect(['action' => 'index']);

  }

  public function listdeliveryorders() 
  {
  
      $dos = $this->DeliveryOrders->find()->where(['status' => 'Approved'])->toArray();

      foreach ($dos as $row) {
          echo ($row['id']);
          echo "\n";
      }

      die;
      
  }

  public function listdoitems()
  {

    $this->loadModel("DeliveryOrdersItems");
    $this->loadModel("Items");
    $this->loadModel("Products");
    $id = $_POST['id'];

    $array = $this->DeliveryOrdersItems->find()->where(['delivery_order_id' => $id])->toArray();

    foreach($array as $row){

      $item_id = $row['item_id'];
      $item = $this->Items->get($item_id);
      echo ($item['id']);
      echo "\n";
      echo ($item['name']);
      echo "\n";
      echo ($item['description']);
      echo "\n";
      echo ($item['EPC']);
      echo "\n";

      if($item['product_id'] != null){
        $product = $this->Products->get($item['product_id']);
        echo ($product['barcode']);
        echo "\n";
      } else {
        echo ("null");
        echo "\n";
      }

      echo ($item['status']);
      echo "\n";
    }

    die;
  }
}
