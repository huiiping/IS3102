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
    public function index($id = null) {

        $this->loadComponent('Prg');
        $this->Prg->commonProcess();

        $this->paginate = [
            'contain' => ['Rfqs', 'Suppliers']
        ];

        if($id != null) {
            $this->set('quotations', $this->paginate($this->Quotations->find('searchable', $this->Prg->parsedParams())->where(['Quotations.rfq_id' => $id])->order(['Quotations.created' => 'DESC'])));
        } else { 
            $this->set('quotations', $this->paginate($this->Quotations->find('searchable', $this->Prg->parsedParams())->order(['Quotations.created' => 'DESC'])));
        }

        $this->set('id', $id);
        $this->set(compact('quotations', 'id'));
        $this->set('_serialize', ['quotations']);
    }

    public function supplierIndex($id = null) {

        $this->loadComponent('Prg');
        $this->Prg->commonProcess();

        $this->paginate = [
            'contain' => ['Rfqs', 'Suppliers']
        ];

        $session = $this->request->session();
        $supplier = $session->read('supplier');
        $supplier_id = $supplier['id'];

        if($id != null) {
            $this->set('quotations', $this->paginate($this->Quotations->find('searchable', $this->Prg->parsedParams())->where(['Quotations.rfq_id' => $id])->order(['Quotations.created' => 'DESC'])));
        } else { 
            $this->set('quotations', $this->paginate($this->Quotations->find('searchable', $this->Prg->parsedParams())->where(['Quotations.supplier_id' => $supplier_id])->order(['Quotations.created' => 'DESC'])));
        }

        $this->set('id', $id);
        $this->set(compact('quotations', 'id'));
        $this->set('_serialize', ['quotations']);
    }

    public $components = array(
        'Prg'
    );

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

    public function supplierView($id = null) {
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
    public function supplierAdd($id = null) {
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
                    $uploadData->rfq_id = $_POST['rfq_id'];
                    $uploadData->supplier_id = $_POST['supplier_id'];
                    $uploadData->comments = $_POST['comments'];
                    $uploadData->status = $_POST['status'];
                    $uploadData->created = date("Y-m-d H:i:s");
                    $uploadData->modified = date("Y-m-d H:i:s");

                    if ($this->Quotations->save($uploadData)) {

                        $this->Flash->success(__('Quotation has been uploaded and submitted successfully.'));

                        return $this->redirect(['action' => 'supplierIndex']);

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
        $this->set('rfqid', $id);
        $this->set('supplierid', $supplierid);
        $this->set(compact('quotation', 'rfqs', 'suppliers', 'rfqid', 'supplierid'));
        $this->set('_serialize', ['quotation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Quotation id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    // public function edit($id = null) {
    //     $quotation = $this->Quotations->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {

    //         if(!empty($this->request->data['file']['name'])){

    //             $fileName = $this->request->data['file']['name'];
    //             $uploadPath = 'uploads/files/';
    //             $uploadFile = $uploadPath.$fileName;

    //             if(move_uploaded_file($this->request->data['file']['tmp_name'],$uploadFile)){

    //                 $quotation = $this->Quotations->patchEntity($quotation, $this->request->getData());
    //                 $quotation->fileName = $fileName;
    //                 $quotation->filePath = $uploadPath;
    //                 $quotation->comments = $_POST['comments'];
    //                 $quotation->modified = date("Y-m-d H:i:s");

    //                 if ($this->Quotations->save($quotation)) {

    //                     $this->Flash->success(__('Quotation has been updated successfully.'));

    //                     return $this->redirect(['action' => 'index']);

    //                 }else{

    //                     $this->Flash->error(__('Unable to upload file, please try again.'));

    //                 }

    //             }else{

    //                 $this->Flash->error(__('Unable to update quotation, please try again.'));

    //             }

    //         }else{

    //             $quotation = $this->Quotations->patchEntity($quotation, $this->request->getData());

    //             if ($this->Quotations->save($quotation)) {

    //                 $this->Flash->success(__('The quotation has been saved.'));

    //                 return $this->redirect(['action' => 'index']);
    //             }

    //             $this->Flash->error(__('The quotation could not be saved. Please, try again.'));
    //             }
    //     }

    //     $rfqs = $this->Quotations->Rfqs->find('list', ['limit' => 200]);
    //     $suppliers = $this->Quotations->Suppliers->find('list', ['limit' => 200]);

    //     $this->set(compact('quotation', 'rfqs', 'suppliers'));
    //     $this->set('_serialize', ['quotation']);
    // }

    public function supplierEdit($id = null) {
        $quotation = $this->Quotations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            if(!empty($this->request->data['file']['name'])){

                $fileName = $this->request->data['file']['name'];
                $uploadPath = 'uploads/files/';
                $uploadFile = $uploadPath.$fileName;

                if(move_uploaded_file($this->request->data['file']['tmp_name'],$uploadFile)){

                    $quotation = $this->Quotations->patchEntity($quotation, $this->request->getData());
                    $quotation->fileName = $fileName;
                    $quotation->filePath = $uploadPath;
                    $quotation->comments = $_POST['comments'];
                    $quotation->modified = date("Y-m-d H:i:s");

                    if ($this->Quotations->save($quotation)) {

                        $this->Flash->success(__('Quotation has been updated successfully.'));

                        return $this->redirect(['action' => 'supplierIndex']);

                    }else{

                        $this->Flash->error(__('Unable to upload file, please try again.'));

                    }

                }else{

                    $this->Flash->error(__('Unable to update quotation, please try again.'));

                }

            }else{

                $quotation = $this->Quotations->patchEntity($quotation, $this->request->getData());

                if ($this->Quotations->save($quotation)) {

                    $this->Flash->success(__('The quotation has been saved.'));

                    return $this->redirect(['action' => 'supplierIndex']);
                }

                $this->Flash->error(__('The quotation could not be saved. Please, try again.'));
                }
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

    public function download($id = null) { 

        $quotation = $this->Quotations->get($id);
        $filePath = $quotation['filePath'] . DS . $quotation['fileName'];
        $this->response->file($filePath , array('download'=> true, 'name'=> $quotation['fileName']));

        return $this->response;
    }

    public function approveQuotation($id) {

        $quotation = $this->Quotations->get($id);
        $quotation->status = 'Approved';
        $this->Quotations->save($quotation);
        $this->Flash->success(__('The quotation has been approved.'));

        return $this->redirect(['action' => 'index']);
    }

    public function rejectQuotation($id) {

        $quotation = $this->Quotations->get($id);
        $quotation->status = 'Rejected';
        $this->Quotations->save($quotation);
        $this->Flash->success(__('The quotation has been rejected.'));

        return $this->redirect(['action' => 'index']);
    }

    public function pendingQuotation($id) {

        $quotation = $this->Quotations->get($id);
        $quotation->status = 'Pending';
        $this->Quotations->save($quotation);
        $this->Flash->success(__('The quotation\'s status has been revert to pending.'));

        return $this->redirect(['action' => 'index']);
    }

}

