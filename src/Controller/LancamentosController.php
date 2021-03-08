<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Lancamento;
use Cake\I18n\FrozenTime;

/**
 * Lancamentos Controller
 *
 * @property \App\Model\Table\LancamentosTable $Lancamentos
 *
 * @method \App\Model\Entity\Lancamento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LancamentosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $user = $this->usuarioLogado()['id'];
        $saida = 0;
        $entrada = 0;
        $lancamentos = $this->Lancamentos->find()->where([
            'Lancamentos.deleted IS NULL',
            'Lancamentos.user_id' => $user
        ])->contain(['Contas', 'Categorias']);

        foreach ($lancamentos as $lancamento) {
            if ($lancamento->tipo === Lancamento::TIPO_SAIDA) {
                $saida += $lancamento->valor;
            } else if ($lancamento->tipo === Lancamento::TIPO_ENTRADA) {
                $entrada += $lancamento->valor;
            }
        }
        $total = $entrada - $saida;
        $lancamentos = $this->paginate($lancamentos);

        $this->set(compact('lancamentos', 'total', 'entrada', 'saida'));
    }

    /**
     * View method
     *
     * @param string|null $id Lancamento id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lancamento = $this->Lancamentos->get($id, [
            'contain' => ['Contas', 'Categorias', 'Users'],
        ]);

        $this->set('lancamento', $lancamento);
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->usuarioLogado()['id'];
        $lancamento = $this->Lancamentos->newEntity();
        if ($this->request->is('post')) {
            $post = $this->request->getData();
            $post['valor'] = (float) str_replace(',', '.', str_replace('R$', '', $post['valor']));
            $data = explode('/', $post['data']);
            $post['data'] = "{$data[2]}-{$data[1]}-{$data[0]}";
            $lancamento = $this->Lancamentos->patchEntity($lancamento, $post);
            if ($this->Lancamentos->save($lancamento)) {
                $this->Flash->success(__('The {0} has been saved.', 'Lançamento'), ['params' => ['fadeOut' => true]]);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Lancamento'), ['params' => ['fadeOut' => true]]);
            }
        }
        $contas = $this->Lancamentos->Contas->find('list', ['limit' => 200])->where(['user_id' => $user]);
        $categorias = $this->Lancamentos->Categorias->find('list', ['limit' => 200])->where(['user_id' => $user]);

        if ($contas->count() == 0 || $categorias->count() == 0) {
            $this->Flash->error(__('Adicione ao menos uma conta ou categoria!'));
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('lancamento', 'contas', 'categorias', 'user'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Lancamento id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lancamento = $this->Lancamentos->get($id, [
            'contain' => []
        ]);
        $user = $this->usuarioLogado()['id'];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->request->getData();
            $post['valor'] = $this->trataValor($post['valor']);
            $data = explode('/', $post['data']);
            $post['data'] = "{$data[2]}-{$data[1]}-{$data[0]}";
            $lancamento = $this->Lancamentos->patchEntity($lancamento, $post);
            if ($this->Lancamentos->save($lancamento)) {
                $this->Flash->success(__('The {0} has been saved.', 'Lancamento'), ['params' => ['fadeOut' => true]]);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Lancamento'), ['params' => ['fadeOut' => true]]);
            }
        }
        $contas = $this->Lancamentos->Contas->find('list')->where(['user_id' => $user]);
        $categorias = $this->Lancamentos->Categorias->find('list')->where(['user_id' => $user]);

        $this->set(compact('lancamento', 'contas', 'categorias', 'user'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Lancamento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lancamento = $this->Lancamentos->get($id);
        $lancamento = $this->Lancamentos->patchEntity($lancamento, ['deleted' => new FrozenTime()]);
        if ($this->Lancamentos->save($lancamento)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Lancamento'), ['params' => ['fadeOut' => true]]);
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Lancamento'), ['params' => ['fadeOut' => true]]);
        }
        return $this->redirect(['action' => 'index']);
    }
}
