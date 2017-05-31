 <?=$this->element('breadcrumb')?>
<div class="col-md-offset-1 col-md-10">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registrar configuraciones</h3>
            <div class="pull-right">
                <?= $this->element('acciones',['acciones'=>$parametro, 'tipo'=>'3', 'objeto'=>'Parametros'])?>
            </div>
        </div>
        <div class="box-body">
            <?php
                echo $this->Form->create($parametro);
                echo $this->Form->input('parent_id', [
                                            'class' => 's2',
                                            'label'=>'Depende del Parámetro', 
                                            'options' => $parentParametros, 
                                            'empty' => ($parametro['parent_id']!=''?false:true)
                                        ]);
                echo $this->Form->input('nombre');
                echo $this->Form->input('descripcion', ['label'=>'Descripción']);
            ?>
            <div class="row">
                <div class="col-md-3"><?=$this->Form->input('tipo')?></div>
                <div class="col-md-3"><?=$this->Form->input('valor')?></div>
                <div class="col-md-3"><?=$this->Form->input('codigo', [])?></div>
                <div class="col-md-3"><?php
                    echo $this->Form->input('fecha', 
                        ['type'=>'text',
                        'value'=> ($parametro['fecha']==''?'':date("d/m/Y", strtotime($parametro['fecha']))),
                         'label'=>'Fecha', 
                         'class'=>'form-control datepicker',
                         'prepend' => $this->Icons->fa('calendar')
                         ]);
                ?></div>
            </div>
            <div class="row">
                <div class="col-md-12"><?=$this->Form->input('data',['label'=>'Datos'])?></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group">
                        <?=$this->Form->button(__('Limpiar'), ['type' => 'reset']) ?>
                        <?=$this->Form->button(__('Guardar'), ['bootstrap-type'=>'primary', 'class'=>'pull-right', 'type' => 'submit']) ?>
                        
                    </div>
                </div>
            </div>
            <?=$this->Form->end() ?>  
        </div>
        <div class="box-footer">
            <div class="pull-right">
                <?= $this->element('acciones',['acciones'=>$parametro, 'tipo'=>'3', 'objeto'=>'Parametros'])?>
            </div>
        </div>
    </div>
</div>
