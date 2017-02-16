<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LocationsPromotions Controller
 *
 * @property \App\Model\Table\LocationsPromotionsTable $LocationsPromotions
 */
class LocationsPromotionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Locations', 'Promotions']
        ];
        $locationsPromotions = $this->paginate($this->LocationsPromotions);

        $this->set(compact('locationsPromotions'));
        $this->set('_serialize', ['locationsPromotions']);
    }

    /**
     * View method
     *
     * @param string|null $id Locations Promotion id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $locationsPromotion = $this->LocationsPromotions->get($id, [
            'contain' => ['Locations', 'Promotions']
        ]);

        $this->set('locationsPromotion', $locationsPromotion);
        $this->set('_serialize', ['locationsPromotion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $locationsPromotion = $this->LocationsPromotions->newEntity();
        if ($this->request->is('post')) {
            $locationsPromotion = $this->LocationsPromotions->patchEntity($locationsPromotion, $this->request->data);
            if ($this->LocationsPromotions->save($locationsPromotion)) {
                $this->Flash->success(__('The locations promotion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The locations promotion could not be saved. Please, try again.'));
        }
        $locations = $this->LocationsPromotions->Locations->find('list', ['limit' => 200]);
        $promotions = $this->LocationsPromotions->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('locationsPromotion', 'locations', 'promotions'));
        $this->set('_serialize', ['locationsPromotion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Locations Promotion id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $locationsPromotion = $this->LocationsPromotions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $locationsPromotion = $this->LocationsPromotions->patchEntity($locationsPromotion, $this->request->data);
            if ($this->LocationsPromotions->save($locationsPromotion)) {
                $this->Flash->success(__('The locations promotion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The locations promotion could not be saved. Please, try again.'));
        }
        $locations = $this->LocationsPromotions->Locations->find('list', ['limit' => 200]);
        $promotions = $this->LocationsPromotions->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('locationsPromotion', 'locations', 'promotions'));
        $this->set('_serialize', ['locationsPromotion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Locations Promotion id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $locationsPromotion = $this->LocationsPromotions->get($id);
        if ($this->LocationsPromotions->delete($locationsPromotion)) {
            $this->Flash->success(__('The locations promotion has been deleted.'));
        } else {
            $this->Flash->error(__('The locations promotion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
