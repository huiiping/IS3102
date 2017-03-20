<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Feedbacks Controller
 *
 * @property \App\Model\Table\FeedbacksTable $Feedbacks
 */
class FeedbacksController extends AppController
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
        'contain' => ['Customers', 'Products', 'Items']
        ];
        $this->set('feedbacks', $this->paginate($this->Feedbacks->find('searchable', $this->Prg->parsedParams())));

        $this->set(compact('feedbacks'));
        $this->set('_serialize', ['feedbacks']);
    }

    public $components = array(
        'Prg'
    );

    /**
     * View method
     *
     * @param string|null $id Feedback id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $feedback = $this->Feedbacks->get($id, [
            'contain' => ['Customers', 'Products', 'Items']
            ]);

        $this->set('feedback', $feedback);
        $this->set('_serialize', ['feedback']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $feedback = $this->Feedbacks->newEntity();
        if ($this->request->is('post')) {
            $feedback = $this->Feedbacks->patchEntity($feedback, $this->request->getData());
            if ($this->Feedbacks->save($feedback)) {
                $this->Flash->success(__('The feedback has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The feedback could not be saved. Please, try again.'));
        }
        $customers = $this->Feedbacks->Customers->find('list', ['limit' => 200]);
        $products = $this->Feedbacks->Products->find('list', ['limit' => 200]);
        $items = $this->Feedbacks->Items->find('list', ['limit' => 200]);
        $this->set(compact('feedback', 'customers', 'products', 'items'));
        $this->set('_serialize', ['feedback']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Feedback id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $feedback = $this->Feedbacks->get($id, [
            'contain' => []
            ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $feedback = $this->Feedbacks->patchEntity($feedback, $this->request->getData());
            if ($this->Feedbacks->save($feedback)) {
                $this->Flash->success(__('The feedback has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The feedback could not be saved. Please, try again.'));
        }
        $customers = $this->Feedbacks->Customers->find('list', ['limit' => 200]);
        $products = $this->Feedbacks->Products->find('list', ['limit' => 200]);
        $items = $this->Feedbacks->Items->find('list', ['limit' => 200]);
        $this->set(compact('feedback', 'customers', 'products', 'items'));
        $this->set('_serialize', ['feedback']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Feedback id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $feedback = $this->Feedbacks->get($id);
        if ($this->Feedbacks->delete($feedback)) {
            $this->Flash->success(__('The feedback has been deleted.'));
        } else {
            $this->Flash->error(__('The feedback could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function pendingStatus($id) {

      $feedback = $this->Feedbacks->get($id);

      $feedback->status = 'Pending';
      $this->Feedbacks->save($feedback);

      $this->Flash->success(__('The feedback has a pending status.'));

      return $this->redirect(['action' => 'index']);
  }

  public function repliedStatus($id) {

      $feedback = $this->Feedbacks->get($id);

      $feedback->status = 'Replied';
      $this->Feedbacks->save($feedback);

      $this->Flash->success(__('The feedback has a replied status.'));

      return $this->redirect(['action' => 'index']);

  }

  public function closedStatus($id) {

      $feedback = $this->Feedbacks->get($id);

      $feedback->status = 'Closed';
      $this->Feedbacks->save($feedback);

      $this->Flash->success(__('The feedback has a closed status.'));

      return $this->redirect(['action' => 'index']);

  }
}
