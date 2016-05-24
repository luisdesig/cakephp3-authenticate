<?php
namespace App\View\Helper;

use Cake\View\Helper;

class IconsHelper extends Helper
{
    public function fa($ico=null)
    {
        return '<i class="fa fa-'.trim($ico).'"></i>';
    }
    
  /*  public function btnved($obj, $data){
        return $obj->Form->buttonGroup(
            [  $obj->Html->link($obj->Icons->fa('eye'), ['action' => 'view',  $data ->id] ,['escape' => false, 'class'=>'btn btn-xs btn-default'])
             , $obj->Html->link($obj->Icons->fa('edit'), ['action' => 'edit',  $data ->id],['escape' => false, 'class'=>'btn btn-xs btn-default'])
             , $obj->Form->postLink($obj->Icons->fa('trash'), ['action' => 'delete',  $data ->id], ['escape' => false, 'confirm' => __('Esta seguro de eliminar # {0}?',  $data ->id), 'class'=>'btn btn-xs btn-default'])
            ]);
    }*/
    
}