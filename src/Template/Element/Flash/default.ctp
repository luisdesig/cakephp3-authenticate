<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<!-- <div class="<?// h($class) ?>"><?// h($message) ?></div> -->

<div class="alert alert-warning alert-dismissible <?= h($class) ?>">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> <?= __('Alert'); ?></h4>
    <?= h($message) ?>
</div>