<?php
/*
echo $this->Html->link($this->Html->glIcon('file'), ['action' => 'view',  $data ->id] ,['escape' => false]);
echo $this->Html->link($this->Html->glIcon('pencil'), ['action' => 'edit',  $data ->id],['escape' => false]);
echo $this->Form->postLink($this->Html->glIcon('trash'), ['action' => 'delete',  $data ->id], ['escape' => false, 'confirm' => __('Esta seguro de eliminar # {0}?',  $data ->id)]);

*/
echo $this->Form->buttonGroup(
    [  $this->Html->link($this->Html->glIcon('file'), ['action' => 'view',  $data ->id] ,['escape' => false, 'class'=>'btn btn-xs btn-default'])
     , $this->Html->link($this->Html->glIcon('pencil'), ['action' => 'edit',  $data ->id],['escape' => false, 'class'=>'btn btn-xs btn-default'])
     , $this->Form->postLink($this->Html->glIcon('trash'), ['action' => 'delete',  $data ->id], ['escape' => false, 'confirm' => __('Esta seguro de eliminar # {0}?',  $data ->id), 'class'=>'btn btn-xs btn-default'])
    ]);
