<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductsProdSpecifications Controller
 *
 * @property \App\Model\Table\ProductsProdSpecificationsTable $ProductsProdSpecifications
 */
class ProductsProdSpecificationsController extends AppController
{

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
            'contain' => ['Products', 'ProdSpecifications']
        ];

        $this->set('productsProdSpecifications', $this->paginate($this->ProductsProdSpecifications->find('searchable', $this->Prg->parsedParams())));

        $this->set(compact('productsProdSpecifications'));
        $this->set('_serialize', ['productsProdSpecifications']);
    }
    public $components = array(
        'Prg'
    );

    /**
     * View method
     *
     * @param string|null $id Products Prod Specification id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productsProdSpecification = $this->ProductsProdSpecifications->get($id, [
            'contain' => ['Products', 'ProdSpecifications']
        ]);

        $this->set('productsProdSpecification', $productsProdSpecification);
        $this->set('_serialize', ['productsProdSpecification']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productsProdSpecification = $this->ProductsProdSpecifications->newEntity();
        if ($this->request->is('post')) {
            $productsProdSpecification = $this->ProductsProdSpecifications->patchEntity($productsProdSpecification, $this->request->data);
            if ($this->ProductsProdSpecifications->save($productsProdSpecification)) {
                $this->Flash->success(__('The products prod specification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products prod specification could not be saved. Please, try again.'));
        }
        $products = $this->ProductsProdSpecifications->Products->find('list', ['limit' => 200]);
        $prodSpecifications = $this->ProductsProdSpecifications->ProdSpecifications->find('list', ['limit' => 200]);
        $this->set(compact('productsProdSpecification', 'products', 'prodSpecifications'));
        $this->set('_serialize', ['productsProdSpecification']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Products Prod Specification id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productsProdSpecification = $this->ProductsProdSpecifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productsProdSpecification = $this->ProductsProdSpecifications->patchEntity($productsProdSpecification, $this->request->data);
            if ($this->ProductsProdSpecifications->save($productsProdSpecification)) {
                $this->Flash->success(__('The products prod specification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products prod specification could not be saved. Please, try again.'));
        }
        $products = $this->ProductsProdSpecifications->Products->find('list', ['limit' => 200]);
        $prodSpecifications = $this->ProductsProdSpecifications->ProdSpecifications->find('list', ['limit' => 200]);
        $this->set(compact('productsProdSpecification', 'products', 'prodSpecifications'));
        $this->set('_serialize', ['productsProdSpecification']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Products Prod Specification id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productsProdSpecification = $this->ProductsProdSpecifications->get($id);
        if ($this->ProductsProdSpecifications->delete($productsProdSpecification)) {
            $this->Flash->success(__('The products prod specification has been deleted.'));
        } else {
            $this->Flash->error(__('The products prod specification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
