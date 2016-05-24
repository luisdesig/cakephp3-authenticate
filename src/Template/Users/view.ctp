<?=$this->element('breadcrumb')?>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="pull-right">
                    <?= $this->element('acciones',['acciones'=>$user, 'tipo'=>'1', 'objeto'=>'Usuario'])?>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-4">
                    <?php echo $this->Html->image('../../files/users/foto/'.$user['fotodir'].'/edit_'.$user['foto'],['class'=>'img-thumbnail img-responsive center-block']); ?>
                </div>
                <div class="col-md-8">
                    <div class="form-group text">
                        <label class="control-label" ><?= __('Nombre') ?></label>
                        <div class="input-group">
                            <?= h($user->persona['nombres']) ?>
                        </div>
                    </div>
                    <div class="form-group text">
                        <label class="control-label" ><?= __('Apellido Paterno') ?></label>
                        <div class="input-group">
                            <?= h($user->persona['apepaterno']) ?>
                        </div>
                    </div>
                    <div class="form-group text">
                        <label class="control-label" ><?= __('Apellido Materno') ?></label>
                        <div class="input-group">
                            <?= h($user->persona['apematerno']) ?>
                        </div>
                    </div>
                    <div class="form-group text">
                        <label class="control-label" ><?= __('Fecha de Nacimiento') ?></label>
                        <div class="input-group">
                            <?= h($user->persona['fechanacimiento']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group text col-md-8">
                            <label class="control-label" ><?= __('Email') ?></label>
                            <div class="input-group">
                                <?= h($user['email']) ?>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="status">Activo</label>
                            <div class="input-group">
                                <?= ($user['status']==1?'Si':'No')?>
                            </div>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="form-group text">
                            <label class="control-label" ><?= __('Roles') ?></label>
                            <div class="box box-default">
                                <div class="box-body">
                                    <ul class="products-list product-list-in-box">
                                        <?php 
                                            foreach($user['rolusers'] as $rol){
                                                echo '<li class="item">'.$rol['role']['nombre'].'</li>';
                                             }
                                         ?>
                                    </ul>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="box-footer clearfix">
                <div class="pull-right">
                    <?= $this->element('acciones',['acciones'=>$user, 'tipo'=>'1', 'objeto'=>'Usuario'])?>
                </div>
            </div>
        </div>
    </div>
</div>