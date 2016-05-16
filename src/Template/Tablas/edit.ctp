<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tabla->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tabla->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tablas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Tablas'), ['controller' => 'Tablas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Tabla'), ['controller' => 'Tablas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rolusers'), ['controller' => 'Rolusers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Roluser'), ['controller' => 'Rolusers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tablas form large-9 medium-8 columns content">
    <?= $this->Form->create($tabla) ?>
    <fieldset>
        <legend><?= __('Edit Tabla') ?></legend>
        <?php
            echo $this->Form->input('parent_id', ['options' => $parentTablas, 'empty' => true]);
            echo $this->Form->input('tipo');
            echo $this->Form->input('valor');
            echo $this->Form->input('codigo');
            echo $this->Form->input('fecha', ['empty' => true]);
            echo $this->Form->input('nombre');
            echo $this->Form->input('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
