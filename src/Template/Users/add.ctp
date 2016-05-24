 <?=$this->element('breadcrumb')?>
<div class="col-md-offset-1 col-md-10">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registrar nuevo Usuario</h3>
            <div class="pull-right">
                <?= $this->element('acciones',['acciones'=>$user, 'tipo'=>'3', 'objeto'=>'Usuario'])?>
            </div>
        </div>
        <div class="box-body">
            <?=$this->Form->create($user, ['role'=>'form', 'novalidate'=>'novalidate' ,'type' =>'file']);?>
            <div class="col-md-4">
                <?php 
                echo $this->Form->input('foto',[
                    'type' =>'file'
                    ,'class'=>'filestyle'
                    ,'data-buttonName'=>'btn-primary'
                    ,'data-buttonText'=>' Seleccionar'
                    ,'data-size'=>'sm']);
                ?>
            </div>
            <div class="col-md-8">
                <?php
                    echo $this->Form->input('persona.nombres', ['label'=>'Nombres', 'class'=>'form-control']);
                    echo $this->Form->input('persona.apepaterno', ['label'=>'Apellido Paterno', 'class'=>'form-control']);
                    echo $this->Form->input('persona.apematerno', ['label'=>'Apellido Materno', 'class'=>'form-control']);
                    echo $this->Form->input('email', ['label'=>__('Email (Se usara como nombre de usuario)'), 'class'=>'form-control']);
                    echo $this->Form->input('password', ['label'=>'Password','class'=>'form-control']); 
                    
                    echo $this->Form->input('rolusers[]', [
                        'label'=>'Roles del Sistema', 
                        'class'=>'form-control select2',
                        'options'=>$listaRoles,
                        'type' => 'select',
                    ]);
                    ?>
            </div>
            <div class="col-md-12">
                <div class="btn-group">
                    <?=$this->Form->button(__('Limpiar'), ['type' => 'reset']) ?>
                    <?=$this->Form->button(__('Guardar'), ['bootstrap-type'=>'primary', 'class'=>'pull-right', 'type' => 'submit']) ?>
                </div>    
            </div>
            <?=$this->Form->end() ?>  
        </div>
        <div class="box-footer">
            <div class="pull-right">
                <?= $this->element('acciones',['acciones'=>$user, 'tipo'=>'3', 'objeto'=>'Usuario'])?>
            </div>
        </div>
    </div>
</div>