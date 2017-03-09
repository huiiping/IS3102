<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Error\Debugger;

/**
 * ProdCats Controller
 *
 * @property \App\Model\Table\ProdCatsTable $ProdCats
 */
class ProdCatsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $prodCats = $this->paginate($this->ProdCats);
        Debugger::dump($prodCats);
        $this->set(compact('prodCats'));
        $this->set('_serialize', ['prodCats']);
    }

    /**
     * View method
     *
     * @param string|null $id Prod Cat id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prodCat = $this->ProdCats->get($id, [
            'contain' => ['ProdTypes']
            ]);

        $this->set('prodCat', $prodCat);
        $this->set('_serialize', ['prodCat']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   
        $prodCats = $this->paginate($this->ProdCats);
        Debugger::dump($prodCats);

        $prodCatids = $prodCats->find('all')->all();
        //->extract('id');

        $prodCat = $this->ProdCats->newEntity();
        if ($this->request->is('post')) {

            $prodCat = $this->ProdCats->patchEntity($prodCat, $this->request->data);
            if ($this->ProdCats->save($prodCat)) {
                $this->Flash->success(__('The prod cat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prod cat could not be saved. Please, try again.'));
        }
        $this->set(compact('prodCat'));
        $this->set('_serialize', ['prodCat']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Prod Cat id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prodCat = $this->ProdCats->get($id, [
            'contain' => []
            ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prodCat = $this->ProdCats->patchEntity($prodCat, $this->request->data);
            if ($this->ProdCats->save($prodCat)) {
                $this->Flash->success(__('The prod cat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prod cat could not be saved. Please, try again.'));
        }
        $this->set(compact('prodCat'));
        $this->set('_serialize', ['prodCat']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Prod Cat id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prodCat = $this->ProdCats->get($id);
        if ($this->ProdCats->delete($prodCat)) {
            $this->Flash->success(__('The prod cat has been deleted.'));
        } else {
            $this->Flash->error(__('The prod cat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
