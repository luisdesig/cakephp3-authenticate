 <?=$this->element('breadcrumb')?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Usuarios del Sistema</h3>
                <div class="pull-right">
                    <?=$this->element('acciones',['acciones'=>$users, 'tipo'=>'0.1', 'objeto'=>'Usuario'])?>
                </div>
            </div>
            <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th><?=$this->Paginator->sort('id') ?></th>
                            <th><?=$this->Paginator->sort('foto') ?></th>
                            <th><?=$this->Paginator->sort('email') ?></th>
                            <th><?=$this->Paginator->sort('role', ['label'=>'Rol']) ?></th>
                            <th><?=$this->Paginator->sort('status', ['label'=>'Activo']) ?></th>
                            <th><?=$this->Paginator->sort('created', ['label'=>'Desde']) ?></th>
                            <th><?=__( 'Acciones') ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr class="<?php echo ($user->activo =='N'? 'info' : ($user->eliminado=='S' ? 'danger' : '')) ; ?>" >
                            <td><?=$this->Number->format($user->id) ?></td>
                            <td><?=$this->Html->image($user->fotodir.'ico_'.$user->foto) ?></td>
                            <td><?=h ($user->email) ?></td>
                            <td><?php foreach ($user->rolusers as $index => $rol) {
                                echo ($index==0?$rol['role']['nombre']:', '.$rol['role']['nombre']);
                            }?></td>
                            <td><?=($this->Number->format($user->status)==1?__('Si'):__('No')) ?></td>
                            <td><?=h ($user->created) ?></td>
                            <td class="actions">
                                <?php
                                if ($user->activo =='N'){
                                    echo $this->Form->button(__('Activar Usuario'), ['type' => 'button', 'class'=>'btn btn-success', 'onclick'=>'activarusuario('.$user->id.')']);
                                }elseif ($user->eliminado=='S') {
                                    echo $this->Form->button(__('Resuperar Usuario'), ['type' => 'button', 'class'=>'btn btn-success', 'onclick'=>'recuperarusuario('.$user->id.')']);
                                }else{
                                    echo $this->element('acciones',['acciones'=>$user, 'tipo'=>0]);
                                }
                                ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                <?=$this->element('paginador')?>
            </div>
        </div>
    </div>
</div>

<?php
  echo $this->Html->script(
    ['app/users'], 
    ['block' => true]);
?>