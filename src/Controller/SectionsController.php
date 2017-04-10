<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Sections Controller
 *
 * @property \App\Model\Table\SectionsTable $Sections
 */
class SectionsController extends AppController
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
            'contain' => ['Locations']
        ];
        $this->set('sections', $this->paginate($this->Sections->find('searchable', $this->Prg->parsedParams())));
        $this->set(compact('sections', 'locations'));
        $this->set('_serialize', ['sections']);
    }
    public $components = array(
        'Prg'
    );

    /**
     * View method
     *
     * @param string|null $id Section id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $section = $this->Sections->get($id, [
            'contain' => ['Locations']
        ]);

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        $this->Logging->rLog($section['id']);
        $this->Logging->iLog($retailer, $section['id']);

        $this->set('section', $section);
        $this->set('_serialize', ['section']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $section = $this->Sections->newEntity();
        if ($this->request->is('post')) {

            // $spaceLim = $this->request->getData('space_limit');
            // $this->update()->set(['available_space'=> $spaceLim])->execute();

            $section = $this->Sections->patchEntity($section, $this->request->data);

            $spaceLimit = $section['space_limit'];
            $section['available_space'] = $spaceLimit;
            $section['reserve_space'] = 0;

            if ($this->Sections->save($section)) {
                $this->Flash->success(__('The section has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($section['id']);
                $this->Logging->iLog($retailer, $section['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The section could not be saved. Please, try again.'));
        }
        $locations = $this->Sections->Locations->find('all', ['limit' => 200]);
        //$locations = $this->Sections->Locations->find('list', ['limit' => 200]);
        $this->set(compact('section', 'locations'));
        $this->set('_serialize', ['section']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Section id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $section = $this->Sections->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $section = $this->Sections->patchEntity($section, $this->request->data);

            $spaceLimit = $section['space_limit'];
            $reserveSpace = $section['reserve_space'];
            $section['available_space'] = $spaceLimit - $reserveSpace;

            if ($this->Sections->save($section)) {
                $this->Flash->success(__('The section has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($section['id']);
                $this->Logging->iLog($retailer, $section['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The section could not be saved. Please, try again.'));
        }
        $locations = $this->Sections->Locations->find('list', ['limit' => 200]);
        $this->set(compact('section', 'locations'));
        $this->set('_serialize', ['section']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Section id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $section = $this->Sections->get($id);
        if ($this->Sections->delete($section)) {
            $this->Flash->success(__('The section has been deleted.'));

            $session = $this->request->session();
            $retailer = $session->read('retailer');

            //$this->loadComponent('Logging');
            $this->Logging->rLog($section['id']);
            $this->Logging->iLog($retailer, $section['id']);
        
        } else {
            $this->Flash->error(__('The section could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function loadsections(){

        $location = $_POST['location'];
        $sections = $this->Sections->find()->where(['location_id' => $location])->toArray();

        foreach($sections as $row){
            echo ($row['id']);
            echo "\n";
            echo ($row['sec_name']);
            echo "\n";
            echo ($row['space_limit']);
            echo "\n";
            echo ($row['available_space']);
            echo "\n";
            if($row['reserve'] == 0){
                echo ("N");
            } else {
                echo ("Y");
            }
            echo "\n";
        }

        die();


    }
}
