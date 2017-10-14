<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Acceso'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="accesos index large-9 medium-8 columns content">
    <h3><?= __('Accesos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prmsujeto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prmtiposujeto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prmrecurso') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prmtiporecurso') ?></th>
                <th scope="col"><?= $this->Paginator->sort('activo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accesos as $acceso): ?>
            <tr>
                <td><?= $this->Number->format($acceso->id) ?></td>
                <td><?= $this->Number->format($acceso->prmsujeto) ?></td>
                <td><?= $this->Number->format($acceso->prmtiposujeto) ?></td>
                <td><?= $this->Number->format($acceso->prmrecurso) ?></td>
                <td><?= $this->Number->format($acceso->prmtiporecurso) ?></td>
                <td><?= h($acceso->activo) ?></td>
                <td><?= h($acceso->created) ?></td>
                <td><?= h($acceso->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $acceso->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $acceso->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $acceso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $acceso->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
