<?=$this->element('breadcrumb')?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"></h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-5" id="treee">
					  <form action="" role="form" class="form-horizontal">
              <div class="form-group ">
                <label class="control-label col-sm-2" for="filtrar">Filtrar:</label>
                <div class="col-sm-9 form-group input-group" >
                  <input type="text" class="form-control" 
                  id="txtfiltrarParam" placeholder="Filtrar Parametros" name="filtrar">
                  <span class="input-group-btn">
                  <?php echo $this->Form->Button($this->Icons->fa('search'), 
                        ['escape' => false,
                          'type' => 'button',
                          'id'=>'btnfiltrarParam'
                        ],
                        ['class'=>'btn btn-primary']);
                    ?>
                  </span>
                </div>
              </div>
					  </form>
					  <div class="col-md-12">
					    <div class="row">
  					    <div class="pull-right">
                  <div class="btn-group">
                    <?php echo $this->Form->Button($this->Icons->fa('plus'), 
                                      ['escape' => false,
                                        'type' => 'button',
                                        'title' => __('Agregar Nuevo Parametro'),
                                        'class'=>'btn btn-primary btn-xs',
                                        'onclick'=>'nuevoParametro();'
                                      ]
                                    );
                          echo $this->Form->Button($this->Icons->fa('plus-square'),
                                      ['escape' => false,
                                        'type' => 'button',
                                        'title' => __('Agregar Sub Parametro'),
                                        'class'=>'btn btn-primary btn-xs',
                                        'onclick'=>'nuevoSubParametro()'
                                      ]
                                    );
                          echo $this->Form->Button($this->Icons->fa('trash'), 
                                      ['escape' => false,
                                        'type' => 'button',
                                        'title' => __('Eliminar el Parametro seleccionado'),
                                        'class'=>'btn btn-primary btn-xs',
                                        'onclick'=>'borrarParametro()'
                                      ]
                                    );
                    ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div id="treeParametro"></div>
              </div>
  					</div>
    			</div>	
					<div class="col-md-7">
					  <form method="post" accept-charset="utf-8" id="frmParametro" role="form">
						<?php
              //echo $this->Form->create($parametro, ['id'=>'frmParametro']);
              echo $this->Form->input('parent_id', ['type'=>'hidden']);
              echo $this->Form->input('id', ['type'=>'hidden']);
              ?>
            <div class="form-group text horizontal">
              <label class="control-label">Ruta del Parametro: </label>
              <span id='padreParametro'></span>
            </div>
            <?php
              echo $this->Form->input('nombre');
              echo $this->Form->input('descripcion');
            ?>
						<div class="row">
							<div class="col-md-6">
								<?=$this->Form->input('tipo')?>
							</div>
							<div class="col-md-6">
								<?=$this->Form->input('valor')?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<?=$this->Form->input('codigo')?>
							</div>
							<div class="col-md-6">
								<?php
                      echo $this->Form->input('fecha', 
                          ['type'=>'text',
                          'value'=> '',
                           'label'=>'Fecha', 
                           'class'=>'form-control datepicker',
                           'prepend' => $this->Icons->fa('calendar')
                           ]);
                      ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<?=$this->Form->input('data',['label'=>'Datos'])?>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?=$this->Form->button(__('Guardar'), ['bootstrap-type' => 'primary']) ?>
					</div>
				</div>
				<?=$this->Form->end() ?>
				<div class="box-footer clearfix">
					<div class="pull-right">
						<?= $this->element('acciones',['acciones'=>$parametro, 'tipo'=>'2', 'objeto'=>'Parametros'])?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
  echo $this->Html->css(['app/parametros']);
  echo $this->Html->script(
    [
      'bower_components/jquery.fancytree/dist/jquery.fancytree',
      'bower_components/jquery.fancytree/dist/src/jquery.fancytree.dnd5',
      'bower_components/jquery.fancytree/dist/src/jquery.fancytree.edit',
      'bower_components/jquery.fancytree/dist/src/jquery.fancytree.glyph',
      'bower_components/jquery.fancytree/dist/src/jquery.fancytree.wide',
      'app/parametros'
    ], 
    ['block' => true]);
?>