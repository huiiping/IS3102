<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Error\Debugger;
use Cake\Event\Event;

/**
 * StockLevels Controller
 *
 * @property \App\Model\Table\StockLevelsTable $StockLevels
 */
class StockLevelsController extends AppController
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
            'contain' => ['Locations', 'Products', 'RetailerEmployees']
        ];
        $this->set('stockLevels', $this->paginate($this->StockLevels->find('searchable', $this->Prg->parsedParams())));
        $this->set(compact('stockLevels'));
        $this->set('_serialize', ['stockLevels']);
    }
    public $components = array(
        'Prg'
    );

    /**
     * View method
     *
     * @param string|null $id Stock Level id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stockLevel = $this->StockLevels->get($id, [
            'contain' => ['Locations', 'Products', 'RetailerEmployees']
        ]);

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        $this->Logging->rLog($stockLevel['id']);
        $this->Logging->iLog($retailer, $stockLevel['id']);

        $this->set('stockLevel', $stockLevel);
        $this->set('_serialize', ['stockLevel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stockLevel = $this->StockLevels->newEntity();
        
        if ($this->request->is('post')) { 

            //get product id selected           
            if (isset($_POST['generate_button'])) {
                $stockLevel = $this->StockLevels->patchEntity($stockLevel, $this->request->data);

                $pid = $stockLevel['product_id'];
                
                //get location id(s) of stock levels entity of the selected product and load location(s) from locations entity that is(are) not found in stock levels entity of the selected product 
                $allSLs = TableRegistry::get('StockLevels');
                $sLs = $allSLs
                    ->find()
                    ->where(['product_id' => $pid]);

                $allLocs = TableRegistry::get('Locations');
                $locs = $allLocs
                    ->find();

                $locations = array(); //to be passed over to stock levels add.ctp
                $count = 1;

                foreach ($locs as $loc) {
                    $count = 0;
                    foreach ($sLs as $sL) {
                        //break loop and do not record location if ids matched
                        if ($loc->id == $sL->location_id) {
                             $count = 1;
                             break;
                        }
                    }
                    //record location(s) that has(have) matched ids
                    if ($count == 0) {
                        $locations[] = $loc;
                    }
                }
            }
            else {
                //create new stock level for product
                if (isset($_POST['save_button'])) {
                    $stockLevel = $this->StockLevels->patchEntity($stockLevel, $this->request->data);

                    $stockLevel['status'] = "Not Triggered";

                    if ($this->StockLevels->save($stockLevel)) {
                        $this->Flash->success(__('The stock level has been saved.'));

                        $session = $this->request->session();
                        $retailer = $session->read('retailer');

                        //$this->loadComponent('Logging');
                        $this->Logging->rLog($stockLevel['id']);
                        $this->Logging->iLog($retailer, $stockLevel['id']);

                        return $this->redirect(['action' => 'index']);
                    } 
                } else {
                    $this->Flash->error(__('The stock level could not be saved. Please, try again.'));
                }
            }
        }
        $products = $this->StockLevels->Products->find('all', ['limit' => 200]);
        // $locations = $this->StockLevels->Locations->find('all', ['limit' => 200]);
        $retailerEmployees = $this->StockLevels->RetailerEmployees->find('all', ['limit' => 200]);
        $this->set(compact('stockLevel', 'products', 'locations', 'retailerEmployees'));
        $this->set('_serialize', ['stockLevel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Stock Level id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stockLevel = $this->StockLevels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stockLevel = $this->StockLevels->patchEntity($stockLevel, $this->request->data);
            if ($this->StockLevels->save($stockLevel)) {
                $this->Flash->success(__('The stock level has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($stockLevel['id']);
                $this->Logging->iLog($retailer, $stockLevel['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stock level could not be saved. Please, try again.'));
        }
        $locations = $this->StockLevels->Locations->find('list', ['limit' => 200]);
        $products = $this->StockLevels->Products->find('list', ['limit' => 200]);
        $retailerEmployees = $this->StockLevels->RetailerEmployees->find('list', ['limit' => 200]);
        $this->set(compact('stockLevel', 'locations', 'products', 'retailerEmployees'));
        $this->set('_serialize', ['stockLevel']);

        //retrieve data from locations, products, retailer employees tables
        $locs = $this->StockLevels->Locations->find('all');
        $prods = $this->StockLevels->Products->find('all');
        $employees = $this->StockLevels->RetailerEmployees->find('all');
        $this->set(compact('locs', 'prods', 'employees'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stock Level id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stockLevel = $this->StockLevels->get($id);
        if ($this->StockLevels->delete($stockLevel)) {
            $this->Flash->success(__('The stock level has been deleted.'));

            $session = $this->request->session();
            $retailer = $session->read('retailer');

            //$this->loadComponent('Logging');
            $this->Logging->rLog($stockLevel['id']);
            $this->Logging->iLog($retailer, $stockLevel['id']);
            
        } else {
            $this->Flash->error(__('The stock level could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function changeStatus($id) {

        $stockLevel = $this->StockLevels->get($id);

        $stockLevel->status = 'Not Triggered';
        $this->StockLevels->save($stockLevel);

        $session = $this->request->session();
        $retailer = $session->read('retailer');
        $this->Logging->rLog($stockLevel['id']);
        $this->Logging->iLog($retailer, $stockLevel['id']);

        $this->Flash->success(__('The stock level status is updated.'));

        return $this->redirect(['action' => 'index']);
    }
}
