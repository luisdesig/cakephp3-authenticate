
<?php 
$this->Html->addCrumb('Users', '/users' , ['class'=>'active']);
//$this->Html->addCrumb('User', ['controller' => 'Users', 'action' => 'index'], ['class'=>'active']);
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Usuarios del Sistema</h3>
                <?=$this->Html->link(__('Nuevo Usuarios'), ['action' => 'add'],['class'=>'pull-right btn btn-primary']) ?>
            </div>
            <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th><?=$this->Paginator->sort('id') ?></th>
                             <th><?=$this->Paginator->sort('foto') ?></th>
                            <th><?=$this->Paginator->sort('email') ?></th>
                            <th><?=$this->Paginator->sort('role') ?></th>
                            <th><?=$this->Paginator->sort('status') ?></th>
                            <th><?=$this->Paginator->sort('created') ?></th>
                            <th class="actions"><?=__( 'Actions') ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?=$this->Number->format($user->id) ?></td>
                            <td><?=$this->Html->image($user->fotodir.'ico_'.$user->foto) ?></td>
                            <td><?=h ($user->email) ?></td>
                            <td><?=h ($user->role) ?></td>
                            <td><?=$this->Number->format($user->status) ?></td>
                            <td><?=h ($user->created) ?></td>
                            <td class="actions">
                                <?=$this->element('accionved',['data'=>$user])?>
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