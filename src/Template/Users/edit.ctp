<?php
$this->Html->addCrumb('Usuarios', '/users');
$this->Html->addCrumb('Editar usuario', '', ['class'=>'active']);
?>

<div class="col-md-12">
    <?=$this->Form->create($user, ['role'=>'form', 'novalidate'=>'novalidate' ,'type' =>'file']) ?>
    <div class="col-md-4">
        <?php echo $this->Html->image($user['fotodir'].'edit_'.$user['foto'],['class'=>'img-thumbnail img-responsive center-block']); ?>

        <?php echo $this->Form->input('Foto',[
            'type' =>'file'
            ,'class'=>'filestyle'
            ,'data-buttonName'=>'btn-primary'
            ,'data-buttonText'=>' Seleccionar'
            ,'data-size'=>'sm']);?>
    </div>
    <div class="col-md-8">
        <?php
            
            echo $this->Form->input('persona.nombres', ['label'=>'Nombres']);
            echo $this->Form->input('persona.apepaterno', ['label'=>'Apellido Paterno']);
            echo $this->Form->input('persona.apematerno', ['label'=>'Apellido Materno']);
            echo $this->Form->input('persona.fecnacimiento', 
                ['type'=>'text',
                'value'=> date("d/m/Y", strtotime($user['persona']['fecnacimiento'])),
                 'label'=>'Fecha Nacimiento', 
                 'class'=>'form-control datepicker',
                 'prepend' => $this->Html->glIcon('calendar')
                 ]);

            echo $this->Form->input('email', [
                    'label'=>__('Email (Se usara como nombre de usuario)'),
                    'class'=>'form-control',
                    'prepend' => $this->Html->glIcon('envelope')
                ]);
            //echo $this->Form->input('password', ['label'=>'Password','class'=>'form-control']); 
            ?>
        <div class="row">
            <div class="col-md-6">
                <?php
                echo $this->Form->input('roluser.tabla_id', [
                    'label'=>'Rol', 
                    'class'=>'form-control',
                    'options'=>$listaRoles,
                    'type' => 'select',
                    'prepend' => $this->Html->glIcon('eye-open')
                    ]);
               ?>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label" for="status">Activo</label>
                    <input name="status" id="status" type="checkbox" class="flat-blue form-control"
                        <?= ($user['status']==1?'checked':'')?>>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-4 col-md-4 text-left">
            <?=$this->Form->postLink( __('Eliminar'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)] ) ?>
            <?=$this->Html->link(__('Lista de Usuarios'), ['action' => 'index'],['class'=>'btn btn-default']) ?></li>
        </div>
        <div class="col-md-4 text-right">
            <?=$this->Form->button(__('Guardar'), ['bootstrap-type' => 'primary']) ?>
        </div>
    </div>
    <?=$this->Form->end() ?>      
</div>