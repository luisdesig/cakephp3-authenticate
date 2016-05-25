<?=$this->element('breadcrumb')?>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= h($parametro->nombre) ?></h3>
                <div class="pull-right">
                    <?= $this->element('acciones',['acciones'=>$parametro, 'tipo'=>'1', 'objeto'=>'Parametros'])?>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-1">
                        <?= __('Id') ?>
                    </div>
                    <div class="col-md-2">
                        <?= $this->Number->format($parametro->id) ?>
                    </div>
                    <div class="col-md-1">
                        <?= __('Tipo') ?>
                    </div>
                    <div class="col-md-2">
                        <?= $this->Number->format($parametro->tipo) ?>
                    </div>
                    <div class="col-md-1">
                        <?= __('Valor') ?>
                    </div>
                    <div class="col-md-2">
                        <?= $this->Number->format($parametro->valor) ?>
                    </div>
                    <div class="col-md-1">
                        <?= __('Fecha') ?>
                    </div>
                    <div class="col-md-2">
                        <?= h($parametro->fecha) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <?= __('Codigo') ?>
                    </div>
                    <div class="col-md-3">
                        <?= h($parametro->codigo) ?>
                    </div>
                    <div class="col-md-1">
                        <?= __('Nombre') ?>
                    </div>
                    <div class="col-md-3">
                        <?= h($parametro->nombre) ?>
                    </div>
                    <div class="col-md-1">
                        <?= __('Descripcion') ?>
                    </div>
                    <div class="col-md-3">
                        <?= h($parametro->descripcion) ?>
                    </div>
                </div>
            </div>
            <div class="box-footer clearfix">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?= h($parametro->nombre) ?>:: Sub parámetros</h3>
                 <div class="pull-right">
                    <?= $this->Html->link($this->Icons->fa('plus').__(' Agregar Sub Parametro '), ['action' => 'add', '?' =>['parent_id'=>$parametro->id]] ,['escape' => false, 'class'=>'pull-right btn btn-primary'])
                    ?>
                </div>
            </div>
            <div class="box-body">
                <div class="related">
                    <?php if (!empty($parametro->child_parametros)): ?>
                    <table class="table table-striped">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Tipo') ?></th>
                            <th><?= __('Valor') ?></th>
                            <th><?= __('Codigo') ?></th>
                            <th><?= __('Fecha') ?></th>
                            <th><?= __('Nombre') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($parametro->child_parametros as $childParametros): ?>
                        <tr>
                            <td><?= h($childParametros->id) ?></td>
                            <td><?= h($childParametros->tipo) ?></td>
                            <td><?= h($childParametros->valor) ?></td>
                            <td><?= h($childParametros->codigo) ?></td>
                            <td><?= h($childParametros->fecha) ?></td>
                            <td><?= h($childParametros->nombre) ?></td>
                            <td><?= h($childParametros->descripcion) ?></td>
                            <td>
                                <?= $this->element('acciones',['acciones'=>$childParametros, 'tipo'=>'0'])?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
            </div>
            <div class="box-footer clearfix">
                
            </div>
        </div>
    </div>
</div>