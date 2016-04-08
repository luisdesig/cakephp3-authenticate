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

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    
    <?= $this->Html->css('font-awesome.min.css') ?>
    <!-- Ionicons -->
    <?= $this->Html->css('ionicons.min.css') ?>
    <!-- Theme style -->
    
    <?= $this->Html->css('AdminLTE-2.3.3.min') ?>
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <?= $this->Html->css('blue.css') ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?= $this->Html->css('main.css') ?>
    
</head>
<body class="hold-transition login-page">
 <div class="login-box">
      <div class="login-logo">
        <a href="">
          <?=$this->Html->image('logo.png',['class'=>'img-responsive center-block']);?>
        </a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <?= $this->Flash->render()?>
        <?= $this->fetch('content')?>
      </div>
      <!-- /.login-box-body -->
    </div>

    <!-- REQUIRED JS SCRIPTS -->
    <?= $this->Html->script('jQuery-2.1.4.min.js')?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('icheck.min.js') ?>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
</body>
</html>
