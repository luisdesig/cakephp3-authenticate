<!-- <div class="message success"><? //= h($message) ?></div> -->

<div class="alert alert-success alert-dismissibles">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> <?= __('Alert'); ?></h4>
    <?= h($message) ?>
</div>