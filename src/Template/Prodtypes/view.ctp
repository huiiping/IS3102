<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Prod Type'), ['action' => 'edit', $prodType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Prod Type'), ['action' => 'delete', $prodType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prodType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Prod Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prod Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prod Cats'), ['controller' => 'ProdCats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prod Cat'), ['controller' => 'ProdCats', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="prodTypes view large-9 medium-8 columns content">
    <h3><?= h($prodType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Prod Name') ?></th>
            <td><?= h($prodType->prod_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Colour') ?></th>
            <td><?= h($prodType->colour) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dimension') ?></th>
            <td><?= h($prodType->dimension) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SKU') ?></th>
            <td><?= h($prodType->SKU) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prod Cat') ?></th>
            <td><?= $prodType->has('prod_cat') ? $this->Html->link($prodType->prod_cat->id, ['controller' => 'ProdCats', 'action' => 'view', $prodType->prod_cat->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($prodType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Store Unit Price') ?></th>
            <td><?= $this->Number->format($prodType->store_unit_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Web Store Unit Price') ?></th>
            <td><?= $this->Number->format($prodType->web_store_unit_price) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Prod Desc') ?></h4>
        <?= $this->Text->autoParagraph(h($prodType->prod_desc)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Promotions') ?></h4>
        <?php if (!empty($prodType->promotions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Promo Desc') ?></th>
                <th scope="col"><?= __('First Vouher Num') ?></th>
                <th scope="col"><?= __('Last Voucher Num') ?></th>
                <th scope="col"><?= __('Discount Rate') ?></th>
                <th scope="col"><?= __('Credit Card Type') ?></th>
                <th scope="col"><?= __('Retailer Employee Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($prodType->promotions as $promotions): ?>
            <tr>
                <td><?= h($promotions->id) ?></td>
                <td><?= h($promotions->start_date) ?></td>
                <td><?= h($promotions->end_date) ?></td>
                <td><?= h($promotions->promo_desc) ?></td>
                <td><?= h($promotions->first_vouher_num) ?></td>
                <td><?= h($promotions->last_voucher_num) ?></td>
                <td><?= h($promotions->discount_rate) ?></td>
                <td><?= h($promotions->credit_card_type) ?></td>
                <td><?= h($promotions->retailer_employee_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Promotions', 'action' => 'view', $promotions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Promotions', 'action' => 'edit', $promotions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Promotions', 'action' => 'delete', $promotions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
