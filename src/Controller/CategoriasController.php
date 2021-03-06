<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Categorias Controller
 *
 * @property \App\Model\Table\CategoriasTable $Categorias
 *
 * @method \App\Model\Entity\Categoria[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $categorias = $this->Categorias->find()->where(['user_id' => $this->usuarioLogado()['id']]);
        $categorias = $this->paginate($categorias);

        $this->set(compact('categorias'));
    }

    /**
     * View method
     *
     * @param string|null $id Categoria id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categoria = $this->Categorias->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('categoria', $categoria);
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoria = $this->Categorias->newEntity();
        if ($this->request->is('post')) {
            $post = $this->request->data;
            $post['user_id'] = $this->usuarioLogado()['id'];
            $categoria = $this->Categorias->patchEntity($categoria, $post);
            if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('The {0} has been saved.', 'Categoria'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Categoria'));
            }
        }
        $this->set(compact('categoria'));
        $this->set('_serialize', ['categoria']);
    }


    /**
     * Edit method
     *
     * @param string|null $id Categoria id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoria = $this->Categorias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->request->data;
            $post['user_id'] = $this->usuarioLogado()['id'];
            $categoria = $this->Categorias->patchEntity($categoria, $post);
            if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('The {0} has been saved.', 'Categoria'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Categoria'));
            }
        }
        $this->set(compact('categoria'));
        $this->set('_serialize', ['categoria']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Categoria id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoria = $this->Categorias->get($id);
        if ($this->Categorias->delete($categoria)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Categoria'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Categoria'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
