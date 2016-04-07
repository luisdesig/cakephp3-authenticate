<?php
$this->Html->addCrumb('Usuarios', '/users');
$this->Html->addCrumb('Editar usuario', '', ['class'=>'active']);
?>

<div class="col-md-12">
    <?=$this->Form->create($user, ['role'=>'form', 'novalidate'=>'novalidate' ,'type' =>'file']) ?>
        <fieldset>
            <legend>
                <?=__( 'Editar Usuario') ?>
            </legend>
            <div class="col-md-4">
                <?php echo $this->Html->image($user['fotodir'].'edit_'.$user['foto'],['class'=>'img-thumbnail img-responsive']); ?>

                <?php echo $this->Form->input('foto',[
                    'type' =>'file'
                    ,'class'=>'filestyle'
                    ,'data-buttonName'=>'btn-primary'
                    ,'data-buttonText'=>' Seleccionar'
                    ,'data-size'=>'sm']);?>
            </div>
            <div class="col-md-8">
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
        </fieldset>
        <div class="row">
            <div class="col-md-12 text-right">
                <?=$this->Form->button(__('Guardar'), ['class'=>'btn btn-primary']) ?>
            </div>
        </div>
        <?=$this->Form->end() ?>    
        
</div>
    
<div class="col-md-12">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li>
            <?=$this->Form->postLink( __('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)] ) ?>
        </li>
        <li>
            <?=$this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</div>