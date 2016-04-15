<!-- File: src/Template/Users/login.ctp -->
<p class="login-box-msg">
    <?=__( 'Regístrese para iniciar Sesión')?>
</p>

<?= $this->Form->create($user,['role'=>'form', 'novalidate'=>'novalidate']) ?>
    <div class="form-group has-feedback">
        <?=$this->Form->input('email', ['label'=>false,'placeholder'=>__('Username'), 'class'=>'form-control'])?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>

    <div class="form-group has-feedback">
        <?=$this->Form->input('password', ['label'=>false, 'placeholder'=>'Password', 'class'=>'form-control']) ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <?= $this->Flash->render() ?>
    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox icheck">
                <label class="">
                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;">
                    <input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);">
                    <ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                </div
                > <?=__('Recordarme')?></label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <?=$this->Form->button(__('Ingresar'), ['bootstrap-type'=>'primary', 'class'=>'btn-block btn-flat']); ?>
        </div>
        <!-- /.col -->
    </div>
    <div> 
        <?=$this->Html->link(__('Olvidé mi Password'), 'recpassword')?>
        <br>
        <a href="javascript:void(0);" class="text-center"><?=__('Registrarme')?></a>
    </div>
<?=$this->Form->end() ?>