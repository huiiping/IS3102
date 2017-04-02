<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AnnouncementRecipients Controller
 *
 * @property \App\Model\Table\AnnouncementRecipientsTable $AnnouncementRecipients
 */
class AnnouncementRecipientsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Announcements', 'IntrasysEmployees']
        ];
        $announcementRecipients = $this->paginate($this->AnnouncementRecipients);

        $this->set(compact('announcementRecipients'));
        $this->set('_serialize', ['announcementRecipients']);
    }

    /**
     * View method
     *
     * @param string|null $id Announcement Recipient id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $announcementRecipient = $this->AnnouncementRecipients->get($id, [
            'contain' => ['Announcements', 'IntrasysEmployees']
        ]);

        $this->set('announcementRecipient', $announcementRecipient);
        $this->set('_serialize', ['announcementRecipient']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $announcementRecipient = $this->AnnouncementRecipients->newEntity();
        if ($this->request->is('post')) {
            $announcementRecipient = $this->AnnouncementRecipients->patchEntity($announcementRecipient, $this->request->getData());
            if ($this->AnnouncementRecipients->save($announcementRecipient)) {
                $this->Flash->success(__('The announcement recipient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The announcement recipient could not be saved. Please, try again.'));
        }
        $announcements = $this->AnnouncementRecipients->Announcements->find('list', ['limit' => 200]);
        $intrasysEmployees = $this->AnnouncementRecipients->IntrasysEmployees->find('list', ['limit' => 200]);
        $this->set(compact('announcementRecipient', 'announcements', 'intrasysEmployees'));
        $this->set('_serialize', ['announcementRecipient']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Announcement Recipient id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $announcementRecipient = $this->AnnouncementRecipients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $announcementRecipient = $this->AnnouncementRecipients->patchEntity($announcementRecipient, $this->request->getData());
            if ($this->AnnouncementRecipients->save($announcementRecipient)) {
                $this->Flash->success(__('The announcement recipient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The announcement recipient could not be saved. Please, try again.'));
        }
        $announcements = $this->AnnouncementRecipients->Announcements->find('list', ['limit' => 200]);
        $intrasysEmployees = $this->AnnouncementRecipients->IntrasysEmployees->find('list', ['limit' => 200]);
        $this->set(compact('announcementRecipient', 'announcements', 'intrasysEmployees'));
        $this->set('_serialize', ['announcementRecipient']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Announcement Recipient id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $announcementRecipient = $this->AnnouncementRecipients->get($id);
        if ($this->AnnouncementRecipients->delete($announcementRecipient)) {
            $this->Flash->success(__('The announcement recipient has been deleted.'));
        } else {
            $this->Flash->error(__('The announcement recipient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
