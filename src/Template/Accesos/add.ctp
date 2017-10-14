<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Accesos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="accesos form large-9 medium-8 columns content">
    <?= $this->Form->create($acceso) ?>
    <fieldset>
        <legend><?= __('Add Acceso') ?></legend>
        <?php
            echo $this->Form->control('prmsujeto');
            echo $this->Form->control('prmtiposujeto');
            echo $this->Form->control('prmrecurso');
            echo $this->Form->control('prmtiporecurso');
            echo $this->Form->control('activo');
            echo $this->Form->control('data');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
