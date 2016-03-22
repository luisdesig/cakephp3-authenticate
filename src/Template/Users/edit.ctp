<div class="col-md-12">
    <?=$this->Form->create($user, ['role'=>'form', 'novalidate'=>'novalidate' ,'type' =>'file']) ?>
        <fieldset>
            <legend>
                <?=__( 'Editar Usuario') ?>
            </legend>
            <div class="col-md-4">
                <?php echo $this->Html->image($user['fotodir'].'edit_'.$user['foto']); ?>
                <?php echo $this->Form->input('foto',['type' =>'file', 'class'=>'form-control']);?>
            </div>
            <div class="col-md-8">
                <?php echo $this->Form->input('email', ['class'=>'form-control']); 
                    echo $this->Form->input('username', ['class'=>'form-control']); 
                    //echo $this->Form->input('password', ['class'=>'form-control']); 
                    echo $this->Form->input('role', ['class'=>'form-control']); 
                    echo $this->Form->input('status', ['class'=>'form-control']); ?>
            </div>
        </fieldset>
        <?=$this->Form->button(__('Submit')) ?>
            <?=$this->Form->end() ?>
</div>
    
<div class="col-md-12">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li>
            <?=$this->Form->postLink( __('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)] ) ?>
        </li>
        <li>
            <?=$this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</div>