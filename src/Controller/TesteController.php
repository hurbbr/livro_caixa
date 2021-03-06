<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Teste Controller
 *
 * @property \App\Model\Table\TesteTable $Teste
 *
 * @method \App\Model\Entity\Teste[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TesteController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $teste = $this->paginate($this->Teste);

        $this->set(compact('teste'));
    }

    /**
     * View method
     *
     * @param string|null $id Teste id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $teste = $this->Teste->get($id, [
            'contain' => [],
        ]);

        $this->set('teste', $teste);
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $teste = $this->Teste->newEntity();
        if ($this->request->is('post')) {
            $teste = $this->Teste->patchEntity($teste, $this->request->data);
            if ($this->Teste->save($teste)) {
                $this->Flash->success(__('The {0} has been saved.', 'Teste'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Teste'));
            }
        }
        $this->set(compact('teste'));
        $this->set('_serialize', ['teste']);
    }


    /**
     * Edit method
     *
     * @param string|null $id Teste id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $teste = $this->Teste->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $teste = $this->Teste->patchEntity($teste, $this->request->data);
            if ($this->Teste->save($teste)) {
                $this->Flash->success(__('The {0} has been saved.', 'Teste'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Teste'));
            }
        }
        $this->set(compact('teste'));
        $this->set('_serialize', ['teste']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Teste id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $teste = $this->Teste->get($id);
        if ($this->Teste->delete($teste)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Teste'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Teste'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
