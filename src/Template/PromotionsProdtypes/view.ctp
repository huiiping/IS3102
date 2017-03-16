<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?php
$this->assign('title', __('Reports') . '/' . __('Edit'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Promotions'), ['controller' => 'Promotions', 'action' => 'index']);
$this->Html->addCrumb(__('Promotions ProdTypes'), ['controller' => 'PromotionsProdTypes', 'action' => 'index']);
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Promotions Prod Type'), ['action' => 'edit', $promotionsProdType->promotion_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Promotions Prod Type'), ['action' => 'delete', $promotionsProdType->promotion_id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotionsProdType->promotion_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Promotions Prod Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotions Prod Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prod Types'), ['controller' => 'ProdTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prod Type'), ['controller' => 'ProdTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="promotionsProdTypes view large-9 medium-8 columns content">
    <h3><?= h($promotionsProdType->promotion_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Promotion') ?></th>
            <td><?= $promotionsProdType->has('promotion') ? $this->Html->link($promotionsProdType->promotion->id, ['controller' => 'Promotions', 'action' => 'view', $promotionsProdType->promotion->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prod Type') ?></th>
            <td><?= $promotionsProdType->has('prod_type') ? $this->Html->link($promotionsProdType->prod_type->id, ['controller' => 'ProdTypes', 'action' => 'view', $promotionsProdType->prod_type->id]) : '' ?></td>
        </tr>
    </table>
</div>
