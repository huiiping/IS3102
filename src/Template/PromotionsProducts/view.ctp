<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('Reports') . '/' . __('Edit'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Promotions'), ['controller' => 'Promotions', 'action' => 'index']);
$this->Html->addCrumb(__('Promotions Products'), ['controller' => 'PromotionsProducts', 'action' => 'index']);
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Promotions Product'), ['action' => 'edit', $promotionsProduct->promotion_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Promotions Product'), ['action' => 'delete', $promotionsProduct->promotion_id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotionsProduct->promotion_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Promotions Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotions Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="promotionsProducts view large-9 medium-8 columns content">
    <h3><?= h($promotionsProduct->promotion_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Promotion') ?></th>
            <td><?= $promotionsProduct->has('promotion') ? $this->Html->link($promotionsProduct->promotion->promo_desc, ['controller' => 'Promotions', 'action' => 'view', $promotionsProduct->promotion->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $promotionsProduct->has('product') ? $this->Html->link($promotionsProduct->product->id, ['controller' => 'Products', 'action' => 'view', $promotionsProduct->product->id]) : '' ?></td>
        </tr>
    </table>
</div>
