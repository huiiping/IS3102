<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Prodtype'), ['action' => 'edit', $prodtype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Prodtype'), ['action' => 'delete', $prodtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prodtype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Prodtypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prodtype'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prodcats'), ['controller' => 'Prodcats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prodcat'), ['controller' => 'Prodcats', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="prodtypes view large-9 medium-8 columns content">
    <h3><?= h($prodtype->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ProdName') ?></th>
            <td><?= h($prodtype->prodName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Colour') ?></th>
            <td><?= h($prodtype->colour) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dimension') ?></th>
            <td><?= h($prodtype->dimension) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SKU') ?></th>
            <td><?= h($prodtype->SKU) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prodcat') ?></th>
            <td><?= $prodtype->has('prodcat') ? $this->Html->link($prodtype->prodcat->id, ['controller' => 'Prodcats', 'action' => 'view', $prodtype->prodcat->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($prodtype->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StoreUnitPrice') ?></th>
            <td><?= $this->Number->format($prodtype->storeUnitPrice) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('WebStoreUnitPrice') ?></th>
            <td><?= $this->Number->format($prodtype->webStoreUnitPrice) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('ProdDesc') ?></h4>
        <?= $this->Text->autoParagraph(h($prodtype->prodDesc)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Promotions') ?></h4>
        <?php if (!empty($prodtype->promotions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('StartDate') ?></th>
                <th scope="col"><?= __('EndDate') ?></th>
                <th scope="col"><?= __('PromoDesc') ?></th>
                <th scope="col"><?= __('FirstVouherNo') ?></th>
                <th scope="col"><?= __('LastVoucherNo') ?></th>
                <th scope="col"><?= __('DiscountRate') ?></th>
                <th scope="col"><?= __('CreditCardType') ?></th>
                <th scope="col"><?= __('RetailerEmployee Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($prodtype->promotions as $promotions): ?>
            <tr>
                <td><?= h($promotions->id) ?></td>
                <td><?= h($promotions->startDate) ?></td>
                <td><?= h($promotions->endDate) ?></td>
                <td><?= h($promotions->promoDesc) ?></td>
                <td><?= h($promotions->firstVouherNo) ?></td>
                <td><?= h($promotions->lastVoucherNo) ?></td>
                <td><?= h($promotions->discountRate) ?></td>
                <td><?= h($promotions->creditCardType) ?></td>
                <td><?= h($promotions->retailerEmployee_id) ?></td>
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
