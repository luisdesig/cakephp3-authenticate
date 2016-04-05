<!-- File: src/Template/Users/login.ctp -->

<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create('/',['role'=>'login']) ?>
        <?= $this->Form->input('email',['label'=>false, 'placeholder'=>'Login', 'class'=>'form-control input-lg']) ?>
        <?= $this->Form->input('password',['label'=>false, 'placeholder'=>'Password', 'class'=>'form-control input-lg']) ?>
        <!-- <div class="pwstrength_viewport_progress"></div> -->
    <?= $this->Form->button(__('Login'), ['class'=>'btn btn-lg btn-primary btn-block']); ?>
 <div>
 <div class="row text-center" style="margin-top:10px;">
     <a href="#"><?php echo __('Create account');?></a> or <a href="#"><?php echo __('reset password');?></a>
 </div>
    
  </div>
<?= $this->Form->end() ?>
</div>