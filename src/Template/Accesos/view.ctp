<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Acceso'), ['action' => 'edit', $acceso->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Acceso'), ['action' => 'delete', $acceso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $acceso->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Accesos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Acceso'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="accesos view large-9 medium-8 columns content">
    <h3><?= h($acceso->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Activo') ?></th>
            <td><?= h($acceso->activo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($acceso->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prmsujeto') ?></th>
            <td><?= $this->Number->format($acceso->prmsujeto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prmtiposujeto') ?></th>
            <td><?= $this->Number->format($acceso->prmtiposujeto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prmrecurso') ?></th>
            <td><?= $this->Number->format($acceso->prmrecurso) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prmtiporecurso') ?></th>
            <td><?= $this->Number->format($acceso->prmtiporecurso) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($acceso->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($acceso->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Data') ?></h4>
        <?= $this->Text->autoParagraph(h($acceso->data)); ?>
    </div>
</div>
