<?php

$resultado = [];
switch ($tipo) {
    case '0': // para los registros del index 
        $resultado = $this->Form->buttonGroup([
            $this->Html->link($this->Icons->fa('eye'), ['action' => 'view',  $acciones['id']] ,['escape' => false, 'class'=>'btn btn-xs btn-default'])
            , $this->Html->link($this->Icons->fa('edit'), ['action' => 'edit',  $acciones['id']],['escape' => false, 'class'=>'btn btn-xs btn-default'])
            , $this->Form->postLink($this->Icons->fa('trash'), ['action' => 'delete',  $acciones['id']], ['escape' => false, 'confirm' => __('Esta seguro de eliminar # {0}?',  $acciones ->id), 'class'=>'btn btn-xs btn-default'])
        ]);
        break;
    case '0.1': // para mostrar en el index
        $resultado = $this->Html->link($this->Icons->fa('plus').__(' Registrar '). $objeto, ['action' => 'add'] ,['escape' => false, 'class'=>'pull-right btn btn-primary']);
        break;
    case '1': // para la pagina view
        $resultado = $this->Form->dropdownButton('Acciones', [
            $this->Html->link($this->Icons->fa('files-o').__(' Listar '). $objeto.'s', ['action' => 'index'] ,['escape' => false]),
            $this->Html->link($this->Icons->fa('file').__(' Registrar '). $objeto, ['action' => 'add'] ,['escape' => false]),
            $this->Html->link($this->Icons->fa('pencil').__(' Editar '). $objeto, ['action' => 'edit',  $acciones->id] ,['escape' => false]),
            $this->Form->postLink($this->Icons->fa('trash').__(' Eliminar '). $objeto, ['action' => 'delete',  $acciones->id], ['escape' => false, 'confirm' => __('Esta seguro de eliminar # {0}?',  $acciones ->id)])
            //'divider', 
            ]
        ,['class'=>'btn btn-primary' 
        ]);
        break;
    case '2': // para la pagina edit
         $resultado = $this->Form->dropdownButton('Acciones', [
            $this->Html->link($this->Icons->fa('files-o').__(' Listar '). $objeto.'s', ['action' => 'index'] ,['escape' => false]),
            $this->Html->link($this->Icons->fa('file').__(' Registrar '). $objeto, ['action' => 'add'] ,['escape' => false]),
            $this->Html->link($this->Icons->fa('eye').__(' Ver '). $objeto, ['action' => 'view', $acciones->id] ,['escape' => false]),
            $this->Form->postLink($this->Icons->fa('trash').__(' Eliminar '). $objeto, ['action' => 'delete',  $acciones->id], ['escape' => false, 'confirm' => __('Esta seguro de eliminar # {0}?',  $acciones ->id)])
            //'divider', 
            ]
        ,['class'=>'btn btn-primary' 
        ]);
        break;
    case '3': // para la pagina edit
         $resultado = $this->Form->dropdownButton('Acciones', [
            $this->Html->link($this->Icons->fa('files-o').__(' Listar '). $objeto.'s', ['action' => 'index'] ,['escape' => false]),
            //'divider', 
            ]
        ,['class'=>'btn btn-primary' 
        ]);
        break;
}
echo $resultado;