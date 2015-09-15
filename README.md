# CakePHP Application Skeleton

Permitir iniciar con una version de cakephp con el modulo authentiate basico preconfigurado


para ingresar al sistema http://localhost/login
    Usuario : admin@admin.com
    Password: admin

Para salir del sistema para ingresar al sistema http://localhost/logout


para agregar nuevos usuarios agregar la accion add en el metodo beforefilter en UsersController

    public function beforeFilter(Event $event)
        {
            parent::beforeFilter($event);
            $this->Auth->allow(['add','logout']);
        }
        
para agregar nuevo usuario http://localhost/users/add
