<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = $miVars['company']['name'].' :: '.$miVars['title'];
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?= $cakeDescription ?>
        <?php // echo $this->fetch('title') ?>
    </title>
<?php 
    echo $this->Html->meta('icon');
    echo $this->Html->css(
      [
        '../js/bower_components/bootstrap/dist/css/bootstrap.min',
        '../js/bower_components/select2/dist/css/select2.min',
        '../js/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min',
        '../js/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min',
        '../js/bower_components/font-awesome/css/font-awesome.min',
        '../js/bower_components/iCheck/skins/all',
        '../js/bower_components/jquery.fancytree/dist/skin-bootstrap/ui.fancytree.min',
        'main'
      ]
    );
?>
    <!-- Ionicons -->
    <?= $this->Html->css('ionicons.min.css') ?>
    <?= $this->Html->css('blue.css') ?>
    <!-- Theme style -->
    <?= $this->Html->css('AdminLTE-2.3.3.min.css') ?>
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <?= $this->Html->css('skin-blue.css') ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php 
      echo $this->Html->css('main.css');
      echo $this->fetch('meta');
      echo $this->fetch('css');
    ?>
</head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div id="ajaxCargando" class="modal fade" data-backdrop="static" data-keyboard="false"
    	tabindex="-1" role="dialog" aria-hidden="true" style="padding-top: 15%; overflow-y: visible; display: none;">
    	<div class="loader" style="margin-left: auto; margin-right: auto; margin-top: auto; margin-bottom: auto;"></div>
    </div>
    
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">
            <?=$miVars['company']['name']?>
          </span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">
            <?=$miVars['company']['name']?>
          </span>
        </a>
        
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the messages -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <!-- User Image -->
                            <?php echo $this->Html->image($usuarioLogueado['fotodir'].'icofoto_'.$usuarioLogueado['foto'], ['class'=>'img-circle', 'alt'=>'User Image']); ?>
                          </div>
                          <!-- Message title and timestamp -->
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <!-- The message -->
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                    </ul><!-- /.menu -->
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li><!-- /.messages-menu -->

              <!-- Notifications Menu -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li><!-- end notification -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks Menu -->
              <li class="dropdown tasks-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- Inner menu: contains the tasks -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <!-- Task title and progress text -->
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <!-- The progress bar -->
                          <div class="progress xs">
                            <!-- Change the css width attribute to simulate progress -->
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <!--<img src="img/avatar5.png" class="user-image" alt="User Image"> -->
                  <?php echo $this->Html->image($usuarioLogueado['fotodir'].'ico_'.$usuarioLogueado['foto'], ['class'=>'img-circle', 'alt'=>'User Image']); ?>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?=$usuarioLogueado['nombrecompleto']?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <!--<img src="img/avatar5.png" class="user-image" alt="User Image"> -->
                    <?php echo $this->Html->image($usuarioLogueado['fotodir'].'thumb_'.$usuarioLogueado['foto'], ['class'=>'img-circle', 'alt'=>'User Image']); ?>
                    <p>
                      <?=$usuarioLogueado['nombrecompleto']?>
                      <small>Miembro desde <?=$usuarioLogueado['created']?> </small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <?=$this->Html->link('Profile', 'users/edit/'.$usuarioLogueado['id'],['class'=>'btn btn-default btn-flat'])?>
                    </div>
                    <div class="pull-right">
                      <?=$this->Html->link('salir', 'users/logout',['class'=>'btn btn-default btn-flat'])?>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button 
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
              -->
            </ul>
          </div>
        </nav>
    </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <!--<img src="img/avatar5.png" class="user-image" alt="User Image"> -->
                    <?php echo $this->Html->image($usuarioLogueado['fotodir'].'icofoto_'.$usuarioLogueado['foto'], ['class'=>'img-circle', 'alt'=>'User Image']); ?>
            </div>
            <div class="pull-left info">
              <p><?=$usuarioLogueado['nombrecompleto']?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="<?=__('Buscar...')?>">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header"><?=__('MENÚ')?></li>
            <!-- Optionally, you can add icons to the links -->
            <li class="<?=($this->request->here=='/parametros'?'active':'')?>"><a href="/parametros"><?= $this->Icons->fa('gears')?> <span>Parametros</span></a></li>
            <li class="<?=($this->request->here=='/users'?'active':'')?>"><a href="/users"><?= $this->Icons->fa('user')?> <span>Usuarios</span></a></li>
          </ul><!-- /.sidebar-menu -->

        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1><?=$miVars['title']?></h1>
            <?php 
              echo $this->Html->getCrumbList([
                    'firstClass' => 'fa fa-dashboard',
                    'lastClass' => 'active',
                    'class' => 'breadcrumb'
                    ],
                    'Inicio');
            ?>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <?= $this->Flash->render() ?>
              <?= $this->fetch('content') ?>
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Soluciones Integrales
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 <?=$this->Html->link($miVars['company']['name'], '/')?>.</strong> All rights reserved.
      </footer>
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

<?php 
  echo $this->Html->script(
    [
      'bower_components/jquery/dist/jquery.min',

      'bower_components/jquery-ui/jquery-ui.min',
      'bower_components/jquery-ui/ui/effects/effect-drop',
      'bower_components/jquery-ui/ui/effects/effect-slide',
      'bower_components/jquery-ui/ui/effects/effect-fade',

      'bower_components/bootstrap/dist/js/bootstrap.min',
      'bower_components/bootstrap-filestyle/src/bootstrap-filestyle.min',
      'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker',
      'bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min',
      'bower_components/inputmask/dist/inputmask/jquery.inputmask',
      'bower_components/inputmask/dist/inputmask/inputmask',
      'bower_components/inputmask/dist/inputmask/inputmask.date.extensions',
      'bower_components/inputmask/dist/inputmask/inputmask.extensions',
      'bower_components/select2/dist/js/select2.min',
      'bower_components/iCheck/icheck.min',
      'bower_components/bootbox.js/bootbox',
      'bower_components/remarkable-bootstrap-notify/bootstrap-notify.min',
      'app',
      'main'
      ]
    );
  echo $this->fetch('script');
  
?>
</body>
</html>
