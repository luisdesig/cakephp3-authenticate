<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tabla'), ['action' => 'edit', $tabla->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tabla'), ['action' => 'delete', $tabla->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tabla->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tablas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tabla'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Tablas'), ['controller' => 'Tablas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Tabla'), ['controller' => 'Tablas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rolusers'), ['controller' => 'Rolusers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Roluser'), ['controller' => 'Rolusers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tablas view large-9 medium-8 columns content">
    <h3><?= h($tabla->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Parent Tabla') ?></th>
            <td><?= $tabla->has('parent_tabla') ? $this->Html->link($tabla->parent_tabla->id, ['controller' => 'Tablas', 'action' => 'view', $tabla->parent_tabla->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Codigo') ?></th>
            <td><?= h($tabla->codigo) ?></td>
        </tr>
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($tabla->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Descripcion') ?></th>
            <td><?= h($tabla->descripcion) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($tabla->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo') ?></th>
            <td><?= $this->Number->format($tabla->tipo) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor') ?></th>
            <td><?= $this->Number->format($tabla->valor) ?></td>
        </tr>
        <tr>
            <th><?= __('Lft') ?></th>
            <td><?= $this->Number->format($tabla->lft) ?></td>
        </tr>
        <tr>
            <th><?= __('Rght') ?></th>
            <td><?= $this->Number->format($tabla->rght) ?></td>
        </tr>
        <tr>
            <th><?= __('Fecha') ?></th>
            <td><?= h($tabla->fecha) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($tabla->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($tabla->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Rolusers') ?></h4>
        <?php if (!empty($tabla->rolusers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Tabla Id') ?></th>
                <th><?= __('Activo') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tabla->rolusers as $rolusers): ?>
            <tr>
                <td><?= h($rolusers->id) ?></td>
                <td><?= h($rolusers->user_id) ?></td>
                <td><?= h($rolusers->tabla_id) ?></td>
                <td><?= h($rolusers->activo) ?></td>
                <td><?= h($rolusers->created) ?></td>
                <td><?= h($rolusers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Rolusers', 'action' => 'view', $rolusers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Rolusers', 'action' => 'edit', $rolusers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rolusers', 'action' => 'delete', $rolusers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rolusers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tablas') ?></h4>
        <?php if (!empty($tabla->child_tablas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Tipo') ?></th>
                <th><?= __('Valor') ?></th>
                <th><?= __('Codigo') ?></th>
                <th><?= __('Fecha') ?></th>
                <th><?= __('Nombre') ?></th>
                <th><?= __('Descripcion') ?></th>
                <th><?= __('Lft') ?></th>
                <th><?= __('Rght') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tabla->child_tablas as $childTablas): ?>
            <tr>
                <td><?= h($childTablas->id) ?></td>
                <td><?= h($childTablas->parent_id) ?></td>
                <td><?= h($childTablas->tipo) ?></td>
                <td><?= h($childTablas->valor) ?></td>
                <td><?= h($childTablas->codigo) ?></td>
                <td><?= h($childTablas->fecha) ?></td>
                <td><?= h($childTablas->nombre) ?></td>
                <td><?= h($childTablas->descripcion) ?></td>
                <td><?= h($childTablas->lft) ?></td>
                <td><?= h($childTablas->rght) ?></td>
                <td><?= h($childTablas->created) ?></td>
                <td><?= h($childTablas->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tablas', 'action' => 'view', $childTablas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tablas', 'action' => 'edit', $childTablas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tablas', 'action' => 'delete', $childTablas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childTablas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
