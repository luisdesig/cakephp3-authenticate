<?php
    if (!$envioCorreo): ?>
    <p class="login-box-msg">
        <?=__( 'Ingrese su cuenta de Email para recuperar su contraseña')?>
    </p>
    
    <?= $this->Form->create(null,['role'=>'form', 'novalidate'=>'novalidate']) ?>
        <div class="form-group has-feedback">
            <?=$this->Form->input('username', ['label'=>false,'placeholder'=>__('Username'), 'class'=>'form-control'])?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="row text-center">
    <?= $this->Form->button(__('Invieme las información a mi correo'), ['class'=>'btn btn-primary submit', 'id' => 'submit'])?>
        </div>
    <?= $this->Form->end(); ?>
<?php else :?>
    <div class="row text-center">
        <h2>Felicitaciones!!</h2>
        se envio un correo conlas indicaciones para recuperar su password a la direccion proporcionada<br/>
        <div class="row" style="margin-top: 15px;">
            <?=$this->Html->link('Ingresar al sistema', 
                ['controller'=>'users',
                 'action'=>'login', 
                 '_full' => true,
                 ],['class'=>'btn btn-primary'])?>
        </div>
    </div>
<?php endif;?>