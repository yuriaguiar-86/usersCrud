<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Planilha');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['cadastrar', 'logout']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index(){
        $this->paginate = [
            'limit' => 20
        ];

        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set('user', $user);
    }

    public function perfil()
    {
        $user = $this->Auth->user();

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário cadastrado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->danger(__('Não foi possível cadastrar. Tente novamente.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $this->Flash->success(__('Usuário editado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível editar. Tente novamente.'));
        }
        $this->set(compact('user'));
    }

    public function editPerfil(){
        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                if($this->Auth->user('id') === $user->id){
                    $data = $user->toArray();
                    $this->Auth->setUser($data);
                }

                $this->Flash->success(__('Perfil editado com sucesso.'));
                return $this->redirect(['controller' => 'Users', 'action' => 'perfil']);
            }
            $this->Flash->error(__('Não foi possível editar. Tente novamente.'));
        }
        $this->set(compact('user'));
    }

    public function editSenha($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $this->Flash->success(__('Senha do usuário alterada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível alterar a senha. Tente novamente.'));
        }
        $this->set(compact('user'));
    }

    public function editSenhaPerfil()
    {
        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $this->Flash->success(__('Senha alterada com sucesso.'));
                return $this->redirect(['controller' => 'Users', 'action' => 'perfil']);
            }
            $this->Flash->error(__('Não foi possível alterar. Tente novamente.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Usuário apagado com sucesso.'));
        } else {
            $this->Flash->danger(__('Não foi possível deletar o usuário. Tente novamente'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Flash->danger(__('Usuário ou senha incorretos!'));
            }
        }
    }

    public function logout(){
        $this->Flash->success(__('Deslogado com sucesso!'));
        return $this->redirect($this->Auth->logout());
    }

    public function cadastrar(){
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Cadastrado com sucesso.'));

                return $this->redirect(['controller' => 'Users' ,'action' => 'login']);
            }
            $this->Flash->danger(__('Não foi possível cadastrar. Tente novamente.'));
        }
        $this->set(compact('user'));
    }

    public function export(){
        $this->Planilha->planilha('Users');
    }
}
