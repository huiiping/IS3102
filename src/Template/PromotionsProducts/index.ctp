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
        <li><?= $this->Html->link(__('New Promotions Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="promotionsProducts index large-9 medium-8 columns content">
    <h3><?= __('Promotions Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('promotion_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($promotionsProducts as $promotionsProduct): ?>
            <tr>
                <td><?= $promotionsProduct->has('promotion') ? $this->Html->link($promotionsProduct->promotion->promo_desc, ['controller' => 'Promotions', 'action' => 'view', $promotionsProduct->promotion->id]) : '' ?></td>
                <td><?= $promotionsProduct->has('product') ? $this->Html->link($promotionsProduct->product->id, ['controller' => 'Products', 'action' => 'view', $promotionsProduct->product->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $promotionsProduct->promotion_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $promotionsProduct->promotion_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $promotionsProduct->promotion_id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotionsProduct->promotion_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
