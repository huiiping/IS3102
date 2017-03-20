<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Utility\Hash;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
        'contain' => ['ProdCats']
        ];
        $products = $this->paginate($this->Products);
        $promotions = $this->Products->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
        $this->set('receiver', $promotions);
        $this->set('_serialize', ['promotions']);
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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

                    return $this->redirect(['controller' => 'prodSpecifications', 'action' => 'add']);
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

        $this->set('promos', $this->Products->Promotions->find('all')); //to populate select input for roles
    $this->set(compact('promos'));
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
}
