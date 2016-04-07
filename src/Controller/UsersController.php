<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use App\Controller\TablasController;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{   
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login','recuperarpass','logout']);
    }

    public function login()
    {
        $user =  $this->Users->newEntity();
        if($this->Auth->user() !== null){
            //return $this->redirect($this->Auth->redirectUrl());
        }
        if ($this->request->is('post')) {
            $user = $this->Users->newEntity($this->request->data, ['validation'=>'default']);
            if (count($user->errors())==0){
                $user = $this->Auth->identify();
                if ($user) {
                    $user['fotodir'] = '../files/users/foto/' . $user['fotodir'].'/';
                    $persona = $this->Users->Personas->get($user['persona_id']);
                    $user['persona'] = $persona->toArray();
                    $user['persona']['nomcompleto'] = $user['persona']['nombres'].' '.$user['persona']['apepaterno'].' '.$user['persona']['apematerno'];
                    $this->Auth->setUser($user);
                    
                    return $this->redirect($this->Auth->redirectUrl());
                }
                $this->Flash->error(__('Usuario o contraseña son incorrectos'));
            }
            
        }
        $this->viewBuilder()->layout('login');
        $this->set('user', $user);
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = ['contain' => ['Personas']];
    
        $users = $this->paginate($this->Users);

        foreach ($users as $id => $user) {
            $user['fotodir'] = '../files/users/foto/' . $user['fotodir'].'/';
        }
        
        $titulo = [ 'titulo' => __('Lista de Usuarios'),
                    'subTitulo' => __('todos los usuarios')
            ];

        $this->set('titulo', $titulo);
        $this->set('users', $users);
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add(){
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $persona = $this->Users->Personas->newEntity();
            $persona = $this->Users->Personas->patchEntity($persona, $this->request->data['personas']);
            
            if($this->Users->Personas->save($persona)){
                $user['persona_id'] = $persona['id'];
                $user['username'] = $user['email'];
                $user['activo'] = 'S';
                $user['eliminado'] = 'N';
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Usuario creado con éxito.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('No se pudo crear un nuevo usuario. Intentelo nuevamente.'));
                }
            }else{
                $this->Flash->error(__('No se pudo crear una persona para el usuario'));
            }
            
        }

        $this->set('listaRoles', $this->__getListaRoles());
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
    private function __getListaRoles(){
        $tabla = new TablasController(); 
        $roles = $tabla->getRolesUsuario()->toArray();
        
        $listaRoles =[];
        foreach ($roles as $rol){
            $listaRoles[$rol['id']] = $rol['nombre'];
        }
        return $listaRoles;
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Personas']
        ]);
        $modifico = false;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                if ($this->Auth->User('id') ==$user['id']){
                    $modifico = true;
                    $user['fotodir'] = '../files/users/foto/' . $user['fotodir'].'/';
                    $user2 = $user->toArray();
                    unset($user2['password']);
                    $this->Auth->setUser($user2);
                }
               
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        if ($modifico == false){ $user['fotodir'] = '../files/users/foto/' . $user['fotodir'].'/';}
        
        $this->set('listaRoles', $this->__getListaRoles());
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    public function recuperarpass() {
        $user = $this->Users->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->find('all')->where(['username'=>$this->request->data['username']])->first();
            if (empty($user)) {
                $this->Flash->error(__('Lo sentimos pero no tenemos un usuario con los datos indicados'));
            }else{
                $token = date("Y-m-d G:i:s"); ;
                
                $user['passtoken'] = (new DefaultPasswordHasher)->hash($token);
                $user['passtokenfecha'] = $token;
                
                $this->Users->save($user);
            }
        }
        $this->viewBuilder()->layout('login');
        $this->set('user', $user);
    }
}
