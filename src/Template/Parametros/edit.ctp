<?=$this->element('breadcrumb')?>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="pull-right">
                    <?= $this->element('acciones',['acciones'=>$parametro, 'tipo'=>'2', 'objeto'=>'Parametros'])?>
                </div>
            </div>
            <div class="box-body">
                <?php
                echo $this->Form->create($parametro);
                echo $this->Form->input('parent_id', 
                    [
                        'label'=>'Depende del Parametros',
                        'options' => $parentParametros,
                        'empty' => true,
                        'class' => 's2'
                    ]);
                echo $this->Form->input('nombre');
                echo $this->Form->input('descripcion');
                ?>
                <div class="row">
                    <div class="col-md-3"><?=$this->Form->input('tipo')?></div>
                    <div class="col-md-3"><?=$this->Form->input('valor')?></div>
                    <div class="col-md-3"><?=$this->Form->input('codigo')?></div>
                    <div class="col-md-3"><?php
                        echo $this->Form->input('fecha', 
                            ['type'=>'text',
                            'value'=> ($parametro['fecha']==''?'':date("d/m/Y", strtotime($parametro['fecha']))),
                             'label'=>'Fecha', 
                             'class'=>'form-control datepicker',
                             'prepend' => $this->Icons->fa('calendar')
                             ]);
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12"><?=$this->Form->input('data',['label'=>'Datos'])?></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?=$this->Form->button(__('Guardar'), ['bootstrap-type' => 'primary']) ?>
                    </div>
                </div>
                <?=$this->Form->end() ?>                  
            </div>
        <?= $this->Form->end() ?>
            <div class="box-footer clearfix">
                <div class="pull-right">
                    <?= $this->element('acciones',['acciones'=>$parametro, 'tipo'=>'2', 'objeto'=>'Parametros'])?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
