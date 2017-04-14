<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Utility\Hash;
use Cake\Event\Event;


class ProductsController extends AppController
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
        'contain' => ['ProdCats']
        ];

        $this->set('products', $this->paginate($this->Products->find('searchable', $this->Prg->parsedParams())));
        //$products = $this->paginate($this->Products);
        $promotions = $this->Products->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
        $this->set('receiver', $promotions);
        $this->set('_serialize', ['promotions']);
    }

    public $components = array(
        'Prg'
        );
    
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['ProdCats', 'ProdSpecifications', 'Promotions']
            ]);

        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->session();

        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->withinLimit()) {
                if ($this->Products->save($product)) {
                    $this->Flash->success(__('The product has been saved.'));

                    $session->write('product', $product->prod_name);

                    $session->write('product',$product);
                    //return $this->redirect(['action' => 'add2']);

                    return $this->redirect(['action' => 'add2']);
                }
            } else {
                $this->Flash->error(__('You have reached your maximum number of users! Please contact Intrasys to upgrade your account.'));
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $prodCats = $this->Products->ProdCats->find('list', ['limit' => 200]);
        $prodSpecifications = $this->Products->ProdSpecifications->find('list', ['limit' => 200]);
        $promotions = $this->Products->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('product', 'prodCats', 'prodSpecifications', 'promotions'));
        $this->set('_serialize', ['product']);

    }

    public function add2()
    {
      $session = $this->request->session();
      $product = $session->read('product');

      if ($this->request->is('post')) {
        $product = $this->Products->patchEntity($product, $this->request->getData());

        if ($this->Products->save($product)) {
            $this->Flash->success(__('The product specifications has been saved.'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The product specifications could not be saved. Please, try again.'));
    }
    
    $prodCats = $this->Products->ProdCats->find('list', ['limit' => 200]);
    $prodSpecifications = $this->Products->ProdSpecifications->find('list', ['limit' => 200]);
    $promotions = $this->Products->Promotions->find('list', ['limit' => 200]);
    $products = $this->Products->find('all', ['limit' => 200]);
    $this->set(compact('products','product', 'prodCats', 'prodSpecifications', 'promotions'));
    $this->set('_serialize', ['product']);
}

private function withinLimit()
{   
    $session = $this->request->session();
    $retailer = $session->read('retailer');

        //counting the retailer's existing number of product types
    $query = $this->Products->find();
    $count = $query->count();

        //obtaining the retailer's limit on the number of product types
    $conn = ConnectionManager::get('intrasysdb');
    $acctTypeID = $conn
    ->newQuery()
    ->select('retailer_acc_type_id')
    ->from('retailers')
    ->where(['retailer_name' => $retailer])
    ->execute()
    ->fetchAll('assoc');

    $defaultNum = $conn
    ->newQuery()
    ->select('num_of_products')
    ->from('retailer_acc_types')
    ->where(['id' => $acctTypeID[0]], ['id' => 'integer[]'])
    ->execute()
    ->fetchAll('assoc');
    $defaultNum = Hash::extract($defaultNum, '{n}.num_of_products');

        //The bonus number of products given to individual retailers
    $bonus = $conn
    ->newQuery()
    ->select('num_of_products')
    ->from('retailers')
    ->where(['retailer_name' => $retailer])
    ->execute()
    ->fetchAll('assoc');
    $bonus = Hash::extract($bonus, '{n}.num_of_products');

        //Total number of products allowed to the retailers
    $limit = $defaultNum[0] + $bonus[0]; 

    if ($count >= $limit) {
        return false;
    }
    return true;
}

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['ProdSpecifications', 'Promotions']
            ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $prodCats = $this->Products->ProdCats->find('list', ['limit' => 200]);
        $prodSpecifications = $this->Products->ProdSpecifications->find('list', ['limit' => 200]);
        $promotions = $this->Products->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('product', 'prodCats', 'prodSpecifications', 'promotions'));
        $this->set('_serialize', ['product']);
        //to populate select input for prodcats
        $this->set('cats', $this->Products->ProdCats->find('all')); 
        //to populate select input for promos
        $this->set('promos', $this->Products->Promotions->find('all')); 
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getproduct(){
        $code = $_POST['code'];
        $qty = $_POST['qty'];
        $this->loadModel('Promotions');
        $this->loadModel('PromotionsProducts');
        //$now = Time::now();

        $products = $this->Products->find()->where(['barcode' => $code])->toArray();

        if (!empty($products)) {

            foreach ($products as $product) {

                echo ($product['prod_name']);
                echo "\n";

                echo ($product['barcode']);
                echo "\n";

                $unitPrice = $product['store_unit_price'];
                $promotionIDs = $this->PromotionsProducts->find()->where(['product_id' => $product['id']])->select('promotion_id');
                $promotions = $this->Promotions->find()
                    ->where(['id' => $promotionIDs], ['id' => 'integer[]'])
                    // ->andWhere(['start_date <' => $now])
                    // ->andWhere(['end_date >' => $now])
                    ->toArray();    

                foreach ($promotions as $promotion) {
                    $unitPrice = $unitPrice * $promotion['discount_rate'];
                }

                echo ($unitPrice);
                echo "\n";
            }
        }
        else {
            echo ("Product does not exist!");
            echo ("\n");
        }

        die();

    }

}
