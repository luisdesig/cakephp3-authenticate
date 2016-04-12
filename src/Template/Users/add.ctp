<?php
$this->Html->addCrumb('Usuarios', '/users');
$this->Html->addCrumb('Registrar usuario', '', ['class'=>'active']);
?>

<script type="text/javascript">
    $('documento').ready(function(){
        $('#rolusers-tabla-id').select2({multiple:true });
    });
    
</script>
<div class="col-md-offset-3 col-md-6">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registrar nuevo Usuario</h3>
        </div>
        <?=$this->Form->create($user, ['role'=>'form', 'novalidate'=>'novalidate' ,'type' =>'file']) ?>
        <div class="box-body">
            <?php
                
                echo $this->Form->input('personas.nombres', ['label'=>'Nombres', 'class'=>'form-control']);
                echo $this->Form->input('personas.apepaterno', ['label'=>'Apellido Paterno', 'class'=>'form-control']);
                echo $this->Form->input('personas.apematerno', ['label'=>'Apellido Materno', 'class'=>'form-control']);
                echo $this->Form->input('email', ['label'=>__('Email (Se usara como nombre de usuario)'), 'class'=>'form-control']);
                echo $this->Form->input('password', ['label'=>'Password','class'=>'form-control']); 
                
                echo $this->Form->input('rolusers.tabla_id', [
                    'label'=>'Rol', 
                    'class'=>'form-control',
                    'options'=>$listaRoles,
                    'type' => 'select',
                    ]);
    
                echo $this->Form->input('foto',[
                'type' =>'file'
                ,'class'=>'filestyle'
                ,'data-buttonName'=>'btn-primary'
                ,'data-buttonText'=>' Seleccionar'
                ,'data-size'=>'sm']);?>
        </div>
        <div class="box-footer">
            <div class="btn-group">
              <?=$this->Form->button(__('Cancelar'), ['type' => 'reset']) ?>
              <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul role="menu" class="dropdown-menu">
                <li><?=$this->Html->link(__('Lista de Usuarios'), ['action' => 'index']) ?></li></li>
              </ul>
            </div>
            <?=$this->Html->button(__('Guardar'), ['bootstrap-type'=>'primary', 'class'=>'pull-right']) ?>
         </div>
        <?=$this->Form->end() ?>  
    </div>
</div>