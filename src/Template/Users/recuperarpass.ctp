<div class="col-md-12">
    <h3>Recuperar Password</h3>
    <?php
        
    echo $this->Form->create($user, ['role'=>'form', 'novalidate'=>'novalidate' ]);
    echo $this->Form->input('username', array('label' => 'Nombre de usuario o Email', 'between'=>'<br />', 'type'=>'text'));
    
    echo $this->Form->button(__('Invieme las información a mi correo'), ['class'=>'btn btn-primary submit', 'id' => 'submit']);
    echo $this->Form->end(); ?> 
</div>