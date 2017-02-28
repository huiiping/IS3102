<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Error\Debugger;
use Cake\Datasource\ConnectionManager;
use Cake\Utility\Hash;

/**
 * Locations Controller
 *
 * @property \App\Model\Table\LocationsTable $Locations
 */
class LocationsController extends AppController
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
        $this->set('locations', $this->paginate($this->Locations->find('searchable', $this->Prg->parsedParams())));
        $this->set(compact('locations'));
        $this->set('_serialize', ['locations']);
    }
    public $components = array(
        'Prg'
    );

    /**
     * View method
     *
     * @param string|null $id Location id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $location = $this->Locations->get($id, [
            'contain' => ['RetailerEmployees', 'Sections']
        ]);

        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //$this->loadComponent('Logging');
        $this->Logging->rLog($location['id']);
        $this->Logging->iLog($retailer, $location['id']);

        $this->set('location', $location);
        $this->set('_serialize', ['location']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $location = $this->Locations->newEntity();
        if ($this->request->is('post')) {
            $location = $this->Locations->patchEntity($location, $this->request->data);
            $type = $location['type'];
            if ($this->withinLimit($type)) {
                if ($this->Locations->save($location)) {
                    $this->Flash->success(__('The location has been saved.'));

                    $session = $this->request->session();
                    $retailer = $session->read('retailer');

                    //$this->loadComponent('Logging');
                    $this->Logging->rLog($location['id']);
                    $this->Logging->iLog($retailer, $location['id']);

                    return $this->redirect(['action' => 'index']);
                }
            }
            else {
                $this->Flash->error(__('You have reached your maximum number of '.$type.'s! Please contact Intrasys to upgrade your account.'));
            }
            $this->Flash->error(__('The location could not be saved. Please, try again.'));
        }
        $this->set(compact('location'));
        $this->set('_serialize', ['location']);
    }

    private function withinLimit($type)
    {   
        $session = $this->request->session();
        $retailer = $session->read('retailer');

        //counting the retailer's existing number of locations of a certain type
        $query = $this->Locations->find()->where(['type' => $type]);
        $count = $query->count();
        /*$locations = TableRegistry::get('Locations');
        $query = $locations->find('all')->where(['type' => $type]);
        $count = $query->count();*/

        //obtaining the retailer's limit on the number of locations of a certain type
        $conn = ConnectionManager::get('intrasysdb');
        $acctTypeID = $conn
            ->newQuery()
            ->select('retailer_acc_type_id')
            ->from('retailers')
            ->where(['retailer_name' => $retailer])
            ->execute()
            ->fetchAll('assoc');
        
        $limit = $conn
            ->newQuery()
            ->select('num_of_'.$type.'s')
            ->from('retailer_acc_types')
            ->where(['id' => $acctTypeID[0]], ['id' => 'integer[]'])
            ->execute()
            ->fetchAll('assoc');
        $limit = Hash::extract($limit, '{n}.num_of_'.$type.'s');

        if ($count >= $limit[0]) {
            return false;
        }
        return true;
    }

    /**
     * Edit method
     *
     * @param string|null $id Location id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $location = $this->Locations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $location = $this->Locations->patchEntity($location, $this->request->data);
            if ($this->Locations->save($location)) {
                $this->Flash->success(__('The location has been saved.'));

                $session = $this->request->session();
                $retailer = $session->read('retailer');

                //$this->loadComponent('Logging');
                $this->Logging->rLog($location['id']);
                $this->Logging->iLog($retailer, $location['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The location could not be saved. Please, try again.'));
        }
        $this->set(compact('location'));
        $this->set('_serialize', ['location']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Location id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $location = $this->Locations->get($id);
        if ($this->Locations->delete($location)) {
            $this->Flash->success(__('The location has been deleted.'));

            $session = $this->request->session();
            $retailer = $session->read('retailer');

            //$this->loadComponent('Logging');
            $this->Logging->rLog($location['id']);
            $this->Logging->iLog($retailer, $location['id']);

        } else {
            $this->Flash->error(__('The location could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
