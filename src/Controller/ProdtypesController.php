<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\Utility\Hash;

/**
 * ProdTypes Controller
 *
 * @property \App\Model\Table\ProdTypesTable $ProdTypes
 */
class ProdTypesController extends AppController
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
    public function index() {


        $this->loadComponent('Prg');
        $this->Prg->commonProcess();
        $this->paginate = [
            'contain' => ['ProdCats']
        ];
        $this->set('prodTypes', $this->paginate($this->ProdTypes->find('searchable', $this->Prg->parsedParams())));
        $this->set(compact('prodTypes'));
        $this->set('_serialize', ['prodTypes']);
    }
    public $components = array(
        'Prg'
    );



    /**
     * View method
     *
     * @param string|null $id Prod Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prodType = $this->ProdTypes->get($id, [
            'contain' => ['ProdCats', 'Promotions']
        ]);

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        $this->Logging->rLog($prodType['id']);
        $this->Logging->iLog($retailer, $prodType['id']);

        $this->set('prodType', $prodType);
        $this->set('_serialize', ['prodType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prodType = $this->ProdTypes->newEntity();
        if ($this->request->is('post')) {
            $prodType = $this->ProdTypes->patchEntity($prodType, $this->request->data);
            if ($this->withinLimit()) {
                if ($this->ProdTypes->save($prodType)) {
                    $this->Flash->success(__('The prod type has been saved.'));

                    $session = $this->request->session();
                    $retailer = $session->read('retailer');

                    //$this->loadComponent('Logging');
                    $this->Logging->rLog($prodType['id']);
                    $this->Logging->iLog($retailer, $prodType['id']);

                    return $this->redirect(['action' => 'index']);
                }
            }
            else {
                $this->Flash->error(__('You have reached your maximum number of Product Types! Please contact Intrasys to upgrade your account.'));
            }
            $this->Flash->error(__('The prod type could not be saved. Please, try again.'));
        }
        $prodCats = $this->ProdTypes->ProdCats->find('list', ['limit' => 200]);
        $promotions = $this->ProdTypes->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('prodType', 'prodCats', 'promotions'));
        $this->set('_serialize', ['prodType']);
    }

    private function withinLimit()
    {   
        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //counting the retailer's existing number of product types
        $query = $this->ProdTypes->find();
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
            ->select('num_of_product_types')
            ->from('retailer_acc_types')
            ->where(['id' => $acctTypeID[0]], ['id' => 'integer[]'])
            ->execute()
            ->fetchAll('assoc');
        $defaultNum = Hash::extract($defaultNum, '{n}.num_of_product_types');

        //The bonus number of units given to individual retailers
        $bonus = $conn
            ->newQuery()
            ->select('num_of_product_types')
            ->from('retailers')
            ->where(['retailer_name' => $retailer])
            ->execute()
            ->fetchAll('assoc');
        $bonus = Hash::extract($bonus, '{n}.num_of_product_types');

        //Total number of product types allowed to the retailers
        $limit = $defaultNum[0] + $bonus[0]; 
        
        if ($count >= $limit) {
            return false;
        }
        return true;
    }

    /**
     * Edit method
     *
     * @param string|null $id Prod Type id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prodType = $this->ProdTypes->get($id, [
            'contain' => ['Promotions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prodType = $this->ProdTypes->patchEntity($prodType, $this->request->data);
            if ($this->ProdTypes->save($prodType)) {
                $this->Flash->success(__('The prod type has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($prodType['id']);
                $this->Logging->iLog($retailer, $prodType['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prod type could not be saved. Please, try again.'));
        }
        $prodCats = $this->ProdTypes->ProdCats->find('list', ['limit' => 200]);
        $promotions = $this->ProdTypes->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('prodType', 'prodCats', 'promotions'));
        $this->set('_serialize', ['prodType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Prod Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prodType = $this->ProdTypes->get($id);
        if ($this->ProdTypes->delete($prodType)) {
            $this->Flash->success(__('The prod type has been deleted.'));

            $session = $this->request->session();
            $retailer = $session->read('retailer');

            //$this->loadComponent('Logging');
            $this->Logging->rLog($prodType['id']);
            $this->Logging->iLog($retailer, $prodType['id']);

        } else {
            $this->Flash->error(__('The prod type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
