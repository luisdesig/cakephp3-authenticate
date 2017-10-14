<?=$this->element('breadcrumb')?>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="pull-right">
                    <?= $this->element('acciones',['acciones'=>$user, 'tipo'=>'2', 'objeto'=>'Usuario'])?>
                </div>
            </div>
            <div class="box-body">
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
                        echo $this->Form->input('persona.nombrecompleto', ['type'=>'hidden']); 
                        echo $this->Form->input('nombrecompleto', ['type'=>'hidden']);
                        
                        echo $this->Form->input('persona.nombres', ['label'=>'Nombres']);
                        echo $this->Form->input('persona.apepaterno', ['label'=>'Apellido Paterno']);
                        echo $this->Form->input('persona.apematerno', ['label'=>'Apellido Materno']);
                        echo $this->Form->input('persona.fechanacimiento', 
                            ['type'=>'text',
                            'value'=> h($user['persona']->fechanacimiento==''?'':date("d/m/Y", strtotime($user['persona']->fechanacimiento))),
                             'label'=>'Fecha Nacimiento', 
                             'class'=>'form-control datepicker',
                             'prepend' => $this->Icons->fa('calendar')
                             ]);
                        echo $this->Form->input('email', [
                                'label'=>__('Email (Se usara como nombre de usuario)'),
                                'class'=>'form-control',
                                'prepend' => $this->Icons->fa('envelope')
                            ]);
                        //echo $this->Form->input('password', ['label'=>'Password','class'=>'form-control']); 
                        ?>
                        
                        <div class="form-group">
                            <label class="control-label" for="status">Activo</label>
                            <input name="status" id="status" type="checkbox" class="flat-blue form-control"
                                <?= ($user['status']==1?'checked':'')?>>
                        </div>
                        
                        <?php
                        echo $this->Form->input('rolusers[]', [
                            'label'=>'Roles del Sistema', 
                            'class'=>'form-control select2',
                            'options'=>$listaRoles,
                            'type' => 'select',
                            'id' => 'rolusers'
                        ]);
                       ?>
 
                </div>
                <div class="row">
                    <div class="col-md-offset-4 col-md-4 text-left">
                        <?=$this->Form->button(__('Guardar'), ['bootstrap-type' => 'primary']) ?>
                    </div>
                </div>
                    <?=$this->Form->end() ?>                  
            </div>
            <div class="box-footer clearfix">
                <div class="pull-right">
                    <?= $this->element('acciones',['acciones'=>$user, 'tipo'=>'2', 'objeto'=>'Usuario'])?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('.select2').select2({multiple:true });
    $('#rolusers').val([<?=str_replace('\'','',$rolesid)?>]).change();
});
</script>