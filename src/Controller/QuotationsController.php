<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;
use Cake\Mailer\Email;
use Cake\Event\Event;

/**
 * Quotations Controller
 *
 * @property \App\Model\Table\QuotationsTable $Quotations
 */
class QuotationsController extends AppController
{

    public function beforeFilter(Event $event) {

        $this->loadComponent('Logging');
        $this->loadComponent('Email');
        
    }

    public function initialize(){

        parent::initialize();
        $this->loadModel('Files');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Rfqs', 'Suppliers']
        ];
        $quotations = $this->paginate($this->Quotations);

        $this->set(compact('quotations'));
        $this->set('_serialize', ['quotations']);
    }

    /**
     * View method
     *
     * @param string|null $id Quotation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $quotation = $this->Quotations->get($id, [
            'contain' => ['Rfqs', 'Suppliers']
        ]);

        $this->set('quotation', $quotation);
        $this->set('_serialize', ['quotation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null) {
        $quotation = $this->Quotations->newEntity();

        if ($this->request->is('post')) {

            if(!empty($this->request->data['file']['name'])){

                $fileName = $this->request->data['file']['name'];
                $uploadPath = 'uploads/files/';
                $uploadFile = $uploadPath.$fileName;

                if(move_uploaded_file($this->request->data['file']['tmp_name'],$uploadFile)){

                    $uploadData = $this->Quotations->newEntity();
                    $uploadData->fileName = $fileName;
                    $uploadData->filePath = $uploadPath;
                    $uploadData->rfq_id = $id;
                    $uploadData->supplier_id = $_POST['supplier_id'];
                    $uploadData->comments = $_POST['comments'];
                    $uploadData->status = $_POST['status'];
                    $uploadData->created = date("Y-m-d H:i:s");
                    $uploadData->modified = date("Y-m-d H:i:s");

                    if ($this->Quotations->save($uploadData)) {

                        $this->Flash->success(__('Quotation has been uploaded and submitted successfully.'));

                        return $this->redirect(['action' => 'index']);

                    }else{

                        $this->Flash->error(__('Unable to upload file, please try again.'));

                    }

                }else{

                    $this->Flash->error(__('Unable to upload quotation, please try again.'));

                }

            }else{

                $this->Flash->error(__('Please choose a file to upload.'));
            }

        }

        $rfqs = $this->Quotations->Rfqs->find('list', ['limit' => 200]);
        $suppliers = $this->Quotations->Suppliers->find('list', ['limit' => 200]);

        $supplier = $this->request->session()->read('supplier');
        $supplierid = $supplier['id'];
        $this->set('supplierid', $supplierid);
        $this->set(compact('quotation', 'rfqs', 'suppliers', 'id', 'supplierid'));
        $this->set('_serialize', ['quotation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Quotation id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quotation = $this->Quotations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quotation = $this->Quotations->patchEntity($quotation, $this->request->getData());
            if ($this->Quotations->save($quotation)) {
                $this->Flash->success(__('The quotation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quotation could not be saved. Please, try again.'));
        }
        $rfqs = $this->Quotations->Rfqs->find('list', ['limit' => 200]);
        $suppliers = $this->Quotations->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('quotation', 'rfqs', 'suppliers'));
        $this->set('_serialize', ['quotation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Quotation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quotation = $this->Quotations->get($id);
        if ($this->Quotations->delete($quotation)) {
            $this->Flash->success(__('The quotation has been deleted.'));
        } else {
            $this->Flash->error(__('The quotation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
