<?php
    $crumbs = explode('/', substr($this->request->here, 1));
    foreach ($miVars['breadcrumbs'] as $crumb){
        if (isset($crumb['class']) ){
            $this->Html->addCrumb($crumb['label'], '', ['class' => $crumb['class']]);
        }else{
            $this->Html->addCrumb($crumb['label'], $crumb['url']);
        }
        
    }