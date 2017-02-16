<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Incidentreports Controller
 *
 * @property \App\Model\Table\IncidentreportsTable $Incidentreports
 */
class IncidentreportsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['References', 'Retaileremployees']
        ];
        $incidentreports = $this->paginate($this->Incidentreports);

        $this->set(compact('incidentreports'));
        $this->set('_serialize', ['incidentreports']);
    }

    /**
     * View method
     *
     * @param string|null $id Incidentreport id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $incidentreport = $this->Incidentreports->get($id, [
            'contain' => ['References', 'Retaileremployees']
        ]);

        $this->set('incidentreport', $incidentreport);
        $this->set('_serialize', ['incidentreport']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $incidentreport = $this->Incidentreports->newEntity();
        if ($this->request->is('post')) {
            $incidentreport = $this->Incidentreports->patchEntity($incidentreport, $this->request->data);
            if ($this->Incidentreports->save($incidentreport)) {
                $this->Flash->success(__('The incidentreport has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The incidentreport could not be saved. Please, try again.'));
        }
        $references = $this->Incidentreports->References->find('list', ['limit' => 200]);
        $retaileremployees = $this->Incidentreports->Retaileremployees->find('list', ['limit' => 200]);
        $this->set(compact('incidentreport', 'references', 'retaileremployees'));
        $this->set('_serialize', ['incidentreport']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Incidentreport id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $incidentreport = $this->Incidentreports->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $incidentreport = $this->Incidentreports->patchEntity($incidentreport, $this->request->data);
            if ($this->Incidentreports->save($incidentreport)) {
                $this->Flash->success(__('The incidentreport has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The incidentreport could not be saved. Please, try again.'));
        }
        $references = $this->Incidentreports->References->find('list', ['limit' => 200]);
        $retaileremployees = $this->Incidentreports->Retaileremployees->find('list', ['limit' => 200]);
        $this->set(compact('incidentreport', 'references', 'retaileremployees'));
        $this->set('_serialize', ['incidentreport']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Incidentreport id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $incidentreport = $this->Incidentreports->get($id);
        if ($this->Incidentreports->delete($incidentreport)) {
            $this->Flash->success(__('The incidentreport has been deleted.'));
        } else {
            $this->Flash->error(__('The incidentreport could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
