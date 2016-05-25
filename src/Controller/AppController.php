<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Database\Type;
use Cake\Core\Configure;

use Cake\I18n\Time;
Time::$defaultLocale = 'es-PE';
Time::setToStringFormat('dd/MM/yyyy'); // este formato es para mostrar en las index
Type::build('datetime')->useLocaleParser(false);

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    
    public $miVars = [
        'title' => '',
        'optActivo'=>['S'=>'Si','N'=>'No']
        ,'optEliminado'=>['S'=>'Si','N'=>'No']
        ,'breadcrumbs'=>[]
    ];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
     public $helpers = [
        'Html' => ['className' => 'Bootstrap.BootstrapHtml'],
        'Form' => ['className' => 'Bootstrap.BootstrapForm'],
        'Paginator' => ['className' => 'Bootstrap.BootstrapPaginator'],
        'Modal' => ['className' => 'Bootstrap.BootstrapModal']
    ];

    public function initialize()
    {
        parent::initialize();
        

        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authenticate' => [
                'Form' => [
                    'userModel' => 'Users',
                    'fields' => array(
                        'username' => 'email',
                        'password' => 'password'
                    ),
                    'scope' => array('status' => 1)
                ]
            ],
            'authError' => 'Proporsione sus credenciales para entraral sistema.'
        ]);
    }
    
    public function parseFechaPostgresql($date = null){
        if ($date!=null and $date!=''){
            $date = explode("/", $date)[2] .'-'. explode("/", $date)[1] .'-'. explode("/", $date)[0];
            $date = new Time($date);
        }
        return $date;
    }
    
    public function paraBreadCrumb(){
        $Controller = $this->request->params['controller'];
        $labelCrumb = $this->request->params['action'];
        $this->miVars['breadcrumbs'][0]['label'] = $Controller;
        
        switch ($this->request->params['action']) {
            case 'view':
                $labelCrumb = __('Ver '.$Controller);
                break;
            case 'add':
                $labelCrumb = __('Registrar '.$Controller);
                break;
            case 'edit':
                $labelCrumb = __('Modificar '.$Controller);
                break;
            case 'index':
                $labelCrumb = __('Lista de '.$Controller);
                break;
        }
        
        $this->miVars['title'] = $labelCrumb;
        $this->miVars['breadcrumbs'][1]['label'] = $labelCrumb;
        $this->miVars['breadcrumbs'][1]['url'] = '';
        $this->miVars['breadcrumbs'][1]['class'] = 'active';
    }

    public function beforeFilter(Event $event)
    {
        $this->paraBreadCrumb();
        $this->miVars['breadcrumbs'][0]['crumb'] = $this->request->params['controller'];
        $this->miVars['breadcrumbs'][0]['url'] = '/'.split('/', $this->request->here)[1];
        
        $this->miVars['breadcrumbs'][1]['crumb'] = $this->request->params['action'];
        $this->miVars['breadcrumbs'][1]['url'] = $this->request->here;

        $this->miVars['company'] = Configure::read('trujinet');

        $this->set('usuarioLogueado', $this->Auth->user());
        $this->set('miVars', $this->miVars);
    }
}