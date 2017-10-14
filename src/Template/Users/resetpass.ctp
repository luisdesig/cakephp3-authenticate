<?php 
if (!$resetExito):?>
<p class="login-box-msg">
    <?=__( 'Ingrese su nuevo Password')?>
</p>
<?= $this->Form->create($user,['role'=>'form', 'novalidate'=>'novalidate']) ?>
    <div class="form-group has-feedback">
        <?=$this->Form->input('nuevo-pass', ['label'=>false, 'placeholder'=>__('Nuevo Password'), 'class'=>'form-control', 'type'=>'password'])?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <?=$this->Form->input('confirm-pass', ['label'=>false,'placeholder'=>__('Repetir Password'), 'class'=>'form-control', 'type'=>'password'])?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <?=$this->Form->input('token',['type'=>'hidden', 'value'=>$token])?>
    <div class="row text-center">
<?= $this->Form->button(__('Cambiar mi Contraseña'), ['class'=>'btn btn-primary submit', 'id' => 'submit'])?>
    </div>
<?= $this->Form->end(); 
else:?>
    <div class="row text-center">
        <?=$this->Html->link('Ingresar al sistema', 
            ['controller'=>'users',
             'action'=>'login', 
             '_full' => true,
             ],['class'=>'btn btn-primary'])?>
    </div>

<?php endif;?>