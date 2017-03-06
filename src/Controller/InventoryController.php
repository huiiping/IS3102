<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inventory Controller
 *
 * @property \App\Model\Table\InventoryTable $Inventory
 */
class InventoryController extends AppController
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
            'contain' => ['ProdTypes', 'Sections', 'Locations']
        ];

        $this->set('inventory', $this->paginate($this->Inventory->find('searchable', $this->Prg->parsedParams())));

        $this->set(compact('inventory'));
        $this->set('_serialize', ['inventory']);
    }
    public $components = array(
        'Prg'
    );

    /**
     * View method
     *
     * @param string|null $id Inventory id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inventory = $this->Inventory->get($id, [
            'contain' => ['ProdTypes', 'Sections', 'Locations']
        ]);

        $this->set('inventory', $inventory);
        $this->set('_serialize', ['inventory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inventory = $this->Inventory->newEntity();

        if ($this->request->is('post')) {

            $inventory = $this->Inventory->patchEntity($inventory, $this->request->getData());
            $quantity = $this->request->getData('quantity');
            $sectionid=$this->request->getData('section_id');
            $locationid=$this->request->getData('location_id');


            $query = $this->Inventory->Sections->find()->where(['Sections.id'=>$sectionid, 'Sections.location_id'=>$locationid]);



            /******
             *
             * Since I can't figure out the Ajax dropdown, I'm using this to limit the sections to the locations.
             * Remove after figuring ou the Ajax thingy.
             *
             */


            if (iterator_count($query)){

                $reserve=$query->extract('reserve');
                if($reserve->first()==false){
                    $space = $query->extract('available_space')->first();

                    if($space >= $quantity) {

                        if ($this->Inventory->save($inventory)) {
                            $this->Flash->success(__('The inventory has been saved.'));
                            $query->update()->set(['available_space'=> ((int)$space-$quantity)])->execute();

                            $this->Flash->success(__('Available Space reduced.'));
                            return $this->redirect(['action' => 'index']);
                        }

                    }else{

                        $this->Flash->error(__('Not enough space in this section'));
                    }

                }else{
                    $this->Flash->error(__('This section is reserved.'));


                }
            }else {
                $this->Flash->error(__('The section is not in this location.'));


            }



            $this->Flash->error(__('The inventory could not be saved. Please, try again.'));
        }
        $prodTypes = $this->Inventory->ProdTypes->find('list', ['limit' => 200]);
        $sections = $this->Inventory->Sections->find('list', ['limit' => 200]);
        $locations = $this->Inventory->Locations->find('list', ['limit' => 200]);
        $this->set(compact('inventory', 'prodTypes', 'sections', 'locations'));
        $this->set('_serialize', ['inventory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inventory id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inventory = $this->Inventory->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inventory = $this->Inventory->patchEntity($inventory, $this->request->getData());
            if ($this->Inventory->save($inventory)) {
                $this->Flash->success(__('The inventory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inventory could not be saved. Please, try again.'));
        }
        $prodTypes = $this->Inventory->ProdTypes->find('list', ['limit' => 200]);
        $sections = $this->Inventory->Sections->find('list', ['limit' => 200]);
        $locations = $this->Inventory->Locations->find('list', ['limit' => 200]);
        $this->set(compact('inventory', 'prodTypes', 'sections', 'locations'));
        $this->set('_serialize', ['inventory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inventory id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inventory = $this->Inventory->get($id);
        if ($this->Inventory->delete($inventory)) {
            $this->Flash->success(__('The inventory has been deleted.'));
        } else {
            $this->Flash->error(__('The inventory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
