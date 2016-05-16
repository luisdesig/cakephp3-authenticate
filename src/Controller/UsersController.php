<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use App\Controller\TablasController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\I18n\Time;
use Cake\Network\Email\Email;
use Cake\Core\Configure;

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
        $this->Auth->allow(['login','recuperarpass', 'resetpass','logout']);
    }

    public function login()
    {
        $user =  $this->Users->newEntity();
        if($this->Auth->user() !== null){
            return $this->redirect($this->Auth->redirectUrl());
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
        $this->set('title', __('Ingreso al Sistema'));
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
        $this->paginate = ['contain' => ['Personas', 'Rolusers']];
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
        $this->set('title', __('Lista de Usuarios'));
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
        $this->set('title', __('Datos del Usuario'));
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
             $user['username'] = $user['email'];
             
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
        $this->set('title', __( 'Registrar nuevo Usuario'));
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
    public function edit($id = null){
        $user = $this->Users->get($id, [
            'contain' => ['Personas','Rolusers']
        ]);

        $modifico = false;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['persona']['fecnacimiento'] = $this->parseFechaPostgresql($data['persona']['fecnacimiento']);
            if(isset($data['status'])){
                $data['status'] = ($data['status']=='on'?1:0);
            }else $data['status'] = 0;
            
            $user = $this->Users->patchEntity($user, $data);
            
            $user['username'] = $user['email'];

            if ($this->Users->save($user)) {
                if ($this->Auth->User('id') ==$user['id']){
                    $modifico = true;
                    $user['fotodir'] = '../files/users/foto/' . $user['fotodir'].'/';
                    $user2 = $user->toArray();
                    unset($user2['password']);
                    $this->Auth->setUser($user2);
                }
               
                $this->Flash->success(__('El usuario se guardo con exito.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('No se pudo guardar al usuario. Favor de intentar nuevamente.'));
            }
        }
        if ($modifico == false){ $user['fotodir'] = '../files/users/foto/' . $user['fotodir'].'/';}
        $this->set('listaRoles', $this->__getListaRoles());
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        $this->set('title', __('Actualizar datos del usuario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null){
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
        $envioCorreo = false;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->find('all')->where(['username'=>$this->request->data['username']])->first();
            if (empty($user)) {
                $this->Flash->error(__('Lo sentimos pero no tenemos un usuario con los datos indicados'));
            }else{
                $token = date("Y-m-d G:i:s"); ;
                
                $user['passtoken'] = (new DefaultPasswordHasher)->hash($token);
                $user['passtokenfecha'] = $token;
                
                $this->log('listo para enviar correo','debug');
                if ($this->Users->save($user)){
                    $persona = $this->Users->Personas->get($user['persona_id']);

                    $data = ['empresa'=>Configure::read('Company')];
                    $data['token']= $user['passtoken'];
                    $data['titulo'] = Configure::read('Company')['name'].':: Dirección para Reseteo de Password';
                    $data['persona'] = [
                        'nombres' => $persona['nombres'],
                        'apepaterno' => $persona['apepaterno'],
                        'apematerno' => $persona['apematerno']
                        ];
                    
                    if ($this->__emailResetPass($data)){
                        $this->log('se envio correo','debug');
                        $envioCorreo = true;
                    }
                }
            }
        }
        $this->viewBuilder()->layout('login');
        $this->set('envioCorreo', $envioCorreo);
        $this->set('title', __('Recuperar Contraseña'));
    }

    public function resetpass(){
        $this->log('funcion: resetpass', 'debug');
        $user = $this->Users->newEntity();
        $token ='';
        $resetExito = false;
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->log('inicio validacion y cambio de pass', 'debug');
            if($this->request->data['nuevo-pass'] != $this->request->data['confirm-pass']){
                $this->log('Las contraseñas no coinciden','debug');
                $this->Flash->error(__('La nueva contraseña y su confirmación no noinciden. Vuelva a intentarlo.'));
            }else{
                 $this->log('Las contraseñas coinciden','debug');
                if ($this->request->data && $this->request->data['token']){
                    $this->log('setiene clave token','debug');
                    $user = $this->Users->newEntity();
                    $user = $this->Users->find('all')->where(['passtoken'=>$this->request->data['token']])->first();
                    if($user){
                        $this->log('encontro el token en la base de datos','debug');
                        $fechaToken = new Time($user['passtokenfecha']->format('Y-m-d H:i:s'));
                        if (!$fechaToken->wasWithinLast(2)){
                            $this->log('la clave token caduco','debug');
                            $this->Flash->error(__('La clave token ya caduco. Genere una nueva y vuelva a intentarlo'));
                        }else{
                            $this->log('la clave token esta vigente','debug');
                            $user['password'] = $this->request->data['nuevo-pass'];
                            $user['passtoken']= '';
                            $user['passtokenfecha'] = '';
                            
                            if ($this->Users->save($user)){
                                 $this->Flash->success(__('Su contraseña se cambio con exito.'));
                                 $resetExito = true;
                                 return $this->redirect($this->Auth->logout());
                            }
                        }
                    }
                }
            }
        }else{
            $this->log('ingresa por url','debug');
            if ($this->request->query['token']){
                $this->log('mostrar formulario reseteo', 'debug');
                $token = $this->request->query['token']; 
            }
        } 

        $this->viewBuilder()->layout('login');
        $this->set('user','');
        $this->set('token',$token);
        $this->set('resetExito', $resetExito);
        $this->set('title', __('Recuperar Contraseña'));
    }
    
    /**
     * Plantillas de Emails
     */
    
    private function __emailResetPass($data){
        $this->log('inicio envio emai Reset Password','debug');
         /*enviando el correo*/
        $correo = new Email(); //instancia de correo
        $correo
          ->transport('default') //nombre del configTrasnport que acabamos de configurar
          ->template('resetpassword') //plantilla a utilizar
          ->emailFormat('html') //formato de correo
          ->to('para@gmail.com') //correo para
          ->from('de@gmail.com') //correo de
          ->subject((($data['titulo']==null || $data['titulo']=='')?'Dirección para Reseteo de Password':$data['titulo'])) //asunto
          ->viewVars(['data'=> $data])
          ;

        return $correo->send();
    }
    
    private function __emailBienVenida($data){
        $this->log('inicio envio emai Bienvenida','debug');
         /*enviando el correo*/
        $correo = new Email(); //instancia de correo
        $correo
          ->transport('default') //nombre del configTrasnport que acabamos de configurar
          ->template('bienvenida') //plantilla a utilizar
          ->emailFormat('html') //formato de correo
          ->to('para@gmail.com') //correo para
          ->from('de@gmail.com') //correo de
          ->subject((($data['titulo']==null || $data['titulo']=='')?'Bienvenido!':$data['titulo'])) //asunto
          ->viewVars(['data'=> $data])
          ;

        return $correo->send();
    }
    
     /**
     * Fin Plantillas de Emails
     */
}