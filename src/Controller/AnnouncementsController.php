<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Announcements Controller
 *
 * @property \App\Model\Table\AnnouncementsTable $Announcements
 */
class AnnouncementsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadComponent('Logging');
        
        $user = $this->request->session()->read('Auth.User');

        if($user == null) {
            $this->Flash->error(__('You are not log in.'));
            return $this->redirect(['controller' => 'Pages', 'action' => 'main']);
        }
        
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        //$announcements = $this->paginate($this->Announcements);

        $this->loadComponent('Prg');
        $this->Prg->commonProcess();
        $this->set('announcements', $this->paginate($this->Announcements->find('searchable', $this->Prg->parsedParams())));
        $this->set(compact('announcements'));
        $this->set('_serialize', ['announcements']);
    }
    
    public $components = array(
        'Prg'
        );

    /**
     * View method
     *
     * @param string|null $id Announcement id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {   
        $user = $this->request->session()->read('Auth.User');
        $aTable = TableRegistry::get('AnnouncementRecipients');
        $query = $aTable->query();
        $query->update()
        ->set(['is_read' => true])
        ->where([
            'intrasys_employee_id' => $user['id'],
            'announcement_id' => $id
            ])
        ->execute();

        $announcement = $this->Announcements->get($id, [
            'contain' => []
            ]);

        //$this->loadComponent('Logging');
        //$this->Logging->log($announcement['id']);
        $this->Logging->iLog(null, $announcement['id']);

        $this->set('announcement', $announcement);
        $this->set('_serialize', ['announcement']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $announcement = $this->Announcements->newEntity();
        if ($this->request->is('post')) {
            $announcement = $this->Announcements->patchEntity($announcement, $this->request->data);
            if ($this->Announcements->save($announcement)) {


                $intrasysEmployeeTable = TableRegistry::get('Intrasysemployees');
                $query = $intrasysEmployeeTable->find('all')->toArray();
                $aRTable = TableRegistry::get('AnnouncementRecipients');
                

                foreach ($query as $intrasysEmployee){

                    $announcementRecipient = $aRTable->newEntity();
                    $announcementRecipient->announcement_id = $announcement['id'];
                    $announcementRecipient->intrasys_employee_id = $intrasysEmployee['id'];
                    $announcementRecipient->is_read = FALSE;
                    $aRTable->save($announcementRecipient); 
                }

                $this->Flash->success(__('The announcement has been saved.'));
                
                //$this->loadComponent('Logging');
                //$this->Logging->log($announcement['id']);
                $this->Logging->iLog(null, $announcement['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The announcement could not be saved. Please, try again.'));
        }
        $this->set(compact('announcement'));
        $this->set('_serialize', ['announcement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Announcement id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $announcement = $this->Announcements->get($id, [
            'contain' => []
            ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $announcement = $this->Announcements->patchEntity($announcement, $this->request->data);
            if ($this->Announcements->save($announcement)) {
                $this->Flash->success(__('The announcement has been saved.'));

                //$this->loadComponent('Logging');
                //$this->Logging->log($announcement['id']);
                $this->Logging->iLog(null, $announcement['id']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The announcement could not be saved. Please, try again.'));
        }
        $this->set(compact('announcement'));
        $this->set('_serialize', ['announcement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Announcement id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $announcement = $this->Announcements->get($id);
        if ($this->Announcements->delete($announcement)) {
            $this->Flash->success(__('The announcement has been deleted.'));

            //$this->loadComponent('Logging');
            //$this->Logging->log($announcement['id']);
            $this->Logging->iLog(null, $announcement['id']);
            
        } else {
            $this->Flash->error(__('The announcement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
