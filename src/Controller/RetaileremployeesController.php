<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Retaileremployees Controller
 *
 * @property \App\Model\Table\RetaileremployeesTable $Retaileremployees
 */
class RetaileremployeesController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadcomponent('Auth', [
                'authenticate' => [
                    'Form' => [
                        'userModel' => 'Retaileremployees',
                        'fields' => [
                            'username' => 'username',
                            'password' => 'password'
                        ],
                    ]
                ],
                'loginAction' => [
                    'controller' => 'Retaileremployees',
                    'action' => 'login'
                ]
            ]);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add', 'logout']);
    }


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Locations']
        ];
        $retaileremployees = $this->paginate($this->Retaileremployees);

        $this->set(compact('retaileremployees'));
        $this->set('_serialize', ['retaileremployees']);
    }

    /**
     * View method
     *
     * @param string|null $id Retaileremployee id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retaileremployee = $this->Retaileremployees->get($id, [
            'contain' => ['Locations', 'Messages', 'Retaileremployeeroles']
        ]);

        $this->set('retaileremployee', $retaileremployee);
        $this->set('_serialize', ['retaileremployee']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retaileremployee = $this->Retaileremployees->newEntity();
        if ($this->request->is('post')) {
            $retaileremployee = $this->Retaileremployees->patchEntity($retaileremployee, $this->request->data);
            if ($this->Retaileremployees->save($retaileremployee)) {
                $this->Flash->success(__('The retaileremployee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retaileremployee could not be saved. Please, try again.'));
        }
        $locations = $this->Retaileremployees->Locations->find('list', ['limit' => 200]);
        $messages = $this->Retaileremployees->Messages->find('list', ['limit' => 200]);
        $retaileremployeeroles = $this->Retaileremployees->Retaileremployeeroles->find('list', ['limit' => 200]);
        $this->set(compact('retaileremployee', 'locations', 'messages', 'retaileremployeeroles'));
        $this->set('_serialize', ['retaileremployee']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Retaileremployee id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retaileremployee = $this->Retaileremployees->get($id, [
            'contain' => ['Messages', 'Retaileremployeeroles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retaileremployee = $this->Retaileremployees->patchEntity($retaileremployee, $this->request->data);
            if ($this->Retaileremployees->save($retaileremployee)) {
                $this->Flash->success(__('The retaileremployee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retaileremployee could not be saved. Please, try again.'));
        }
        $locations = $this->Retaileremployees->Locations->find('list', ['limit' => 200]);
        $messages = $this->Retaileremployees->Messages->find('list', ['limit' => 200]);
        $retaileremployeeroles = $this->Retaileremployees->Retaileremployeeroles->find('list', ['limit' => 200]);
        $this->set(compact('retaileremployee', 'locations', 'messages', 'retaileremployeeroles'));
        $this->set('_serialize', ['retaileremployee']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Retaileremployee id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retaileremployee = $this->Retaileremployees->get($id);
        if ($this->Retaileremployees->delete($retaileremployee)) {
            $this->Flash->success(__('The retaileremployee has been deleted.'));
        } else {
            $this->Flash->error(__('The retaileremployee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

        public function login(){
        if($this->request->is('post')){
            $retaileremployee = $this->Auth->identify();
            if($retaileremployee){
                $this->Auth->setUser($retaileremployee);
                return $this->redirect(['controller' => 'retaileremployees', 'action' => 'index']);
                //return $this->redirect($this->Auth->redirectUrl());            
            }
            $this->Flash->error('Incorrect Login');   
        }
    }
}
