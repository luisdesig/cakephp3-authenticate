<div class="box">
    <div class="box-header">
      <h3 class="box-title">lista de Talas</h3>
      <div class="pull-right"> 
            <?= $this->element('acciones',['acciones'=>$tablas, 'tipo'=>'0.1', 'objeto'=>'Tabla'])?>
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
            <th><?= $this->Paginator->sort('created') ?></th> 
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
     <tbody>
         <?php foreach ($tablas as $index => $tabla): ?>
            <tr>
                <td><?= $this->Number->format($tabla->id) ?></td>
                <td><?= $tabla->has('parent_tabla') ? $this->Html->link($tabla->parent_tabla->id, ['controller' => 'Tablas', 'action' => 'view', $tabla->parent_tabla->id]) : '' ?></td>
                <td><?= $this->Number->format($tabla->tipo) ?></td>
                <td><?= $this->Number->format($tabla->valor) ?></td>
                <td><?= h($tabla->codigo) ?></td>
                <td><?= h($tabla->fecha) ?></td>
                <td><?= h($tabla->nombre) ?></td>
                <td><?= h($tabla->descripcion) ?></td>
                <td><?= h($tabla->created) ?></td> 
                <td><?= $this->element('acciones',['acciones'=>$tabla, 'tipo'=>'0'])?></td>
            </tr>
            <?php endforeach; ?>
      </tbody>
      </table>
    </div>
    <div class="box-footer clearfix">
        <?=$this->element('paginador')?>
    </div>
</div>