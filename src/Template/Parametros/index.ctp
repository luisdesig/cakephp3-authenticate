<div class="box">
    <div class="box-header">
      <h3 class="box-title">lista de Talas</h3>
      <div class="pull-right"> 
            <?= $this->element('acciones',['acciones'=>$parametros, 'tipo'=>'0.1', 'objeto'=>'Parametros'])?>
      </div>
    </div>
    <div class="box-body no-padding">
      <table class="table table-striped">
        <thead><tr>
            <th><?= $this->Paginator->sort('id', ['label'=>'#']) ?></th>
            <th><?= $this->Paginator->sort('parent_id') ?></th>
            <th><?= $this->Paginator->sort('tipo') ?></th>
            <th><?= $this->Paginator->sort('valor') ?></th>
            <th><?= $this->Paginator->sort('codigo') ?></th>
            <th><?= $this->Paginator->sort('fecha') ?></th>
            <th><?= $this->Paginator->sort('nombre') ?></th>
            <th><?= $this->Paginator->sort('descripcion') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
     <tbody>
         <?php foreach ($parametros as $index => $parametros): ?>
            <tr>
                <td><?= $this->Number->format($parametros->id) ?></td>
                <td><?= $parametros->has('parent_parametros') ? $this->Html->link($parametros->parent_parametros->id, ['controller' => 'Parametros', 'action' => 'view', $parametros->parent_parametros->id]) : '' ?></td>
                <td><?= $this->Number->format($parametros->tipo) ?></td>
                <td><?= $this->Number->format($parametros->valor) ?></td>
                <td><?= h($parametros->codigo) ?></td>
                <td><?= h($parametros->fecha) ?></td>
                <td><?= h($parametros->nombre) ?></td>
                <td><?= h($parametros->descripcion) ?></td>
                <td><?= $this->element('acciones',['acciones'=>$parametros, 'tipo'=>'0'])?></td>
            </tr>
            <?php endforeach; ?>
      </tbody>
      </table>
    </div>
    <div class="box-footer clearfix">
        <?=$this->element('paginador')?>
    </div>
</div>