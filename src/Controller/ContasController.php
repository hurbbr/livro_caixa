<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Contas Controller
 *
 * @property \App\Model\Table\ContasTable $Contas
 *
 * @method \App\Model\Entity\Conta[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $contas = $this->Contas->find()->where(['user_id' => $this->usuarioLogado()['id']]);

        $contas = $this->paginate($contas);

        $this->set(compact('contas'));
    }

    /**
     * View method
     *
     * @param string|null $id Conta id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $conta = $this->Contas->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('conta', $conta);
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $conta = $this->Contas->newEntity();
        if ($this->request->is('post')) {
            $post = $this->request->data;
            $post['user_id'] = $this->usuarioLogado()['id'];
            $conta = $this->Contas->patchEntity($conta, $post);
            if ($this->Contas->save($conta)) {
                $this->Flash->success(__('The {0} has been saved.', 'Conta'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Conta'));
            }
        }
        $users = $this->Contas->Users->find('list', ['limit' => 200]);
        $this->set(compact('conta', 'users'));
        $this->set('_serialize', ['conta']);
    }


    /**
     * Edit method
     *
     * @param string|null $id Conta id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $conta = $this->Contas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->request->data;
            $post['user_id'] = $this->usuarioLogado()['id'];
            $conta = $this->Contas->patchEntity($conta, $post);
            if ($this->Contas->save($conta)) {
                $this->Flash->success(__('The {0} has been saved.', 'Conta'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Conta'));
            }
        }
        $users = $this->Contas->Users->find('list', ['limit' => 200]);
        $this->set(compact('conta', 'users'));
        $this->set('_serialize', ['conta']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Conta id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $conta = $this->Contas->get($id);
        if ($this->Contas->delete($conta)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Conta'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Conta'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
