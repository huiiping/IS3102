<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Promotion'), ['action' => 'edit', $promotion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Promotion'), ['action' => 'delete', $promotion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prod Cats'), ['controller' => 'Prodcats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prod Cat'), ['controller' => 'Prodcats', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retaileremployees'), ['controller' => 'Retaileremployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retaileremployee'), ['controller' => 'Retaileremployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transferorderitems'), ['controller' => 'Transferorderitems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transferorderitem'), ['controller' => 'Transferorderitems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="promotions view large-9 medium-8 columns content">
    <h3><?= h($promotion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('FirstVouherNo') ?></th>
            <td><?= h($promotion->firstVouherNo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LastVoucherNo') ?></th>
            <td><?= h($promotion->lastVoucherNo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CreditCardType') ?></th>
            <td><?= h($promotion->creditCardType) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prod Cat') ?></th>
            <td><?= $promotion->has('prod_cat') ? $this->Html->link($promotion->prod_cat->id, ['controller' => 'Prodcats', 'action' => 'view', $promotion->prod_cat->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retaileremployee') ?></th>
            <td><?= $promotion->has('retaileremployee') ? $this->Html->link($promotion->retaileremployee->id, ['controller' => 'Retaileremployees', 'action' => 'view', $promotion->retaileremployee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($promotion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item1 Id') ?></th>
            <td><?= $this->Number->format($promotion->item1_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item2 Id') ?></th>
            <td><?= $this->Number->format($promotion->item2_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProdType1 Id') ?></th>
            <td><?= $this->Number->format($promotion->prodType1_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProdType2 Id') ?></th>
            <td><?= $this->Number->format($promotion->prodType2_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DiscountRate') ?></th>
            <td><?= $this->Number->format($promotion->discountRate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StartDate') ?></th>
            <td><?= h($promotion->startDate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EndDate') ?></th>
            <td><?= h($promotion->endDate) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('PromoDesc') ?></h4>
        <?= $this->Text->autoParagraph(h($promotion->promoDesc)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Transferorderitems') ?></h4>
        <?php if (!empty($promotion->transferorderitems)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('ECP') ?></th>
                <th scope="col"><?= __('Barcode') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('TransferOrder Id') ?></th>
                <th scope="col"><?= __('Promotion Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($promotion->transferorderitems as $transferorderitems): ?>
            <tr>
                <td><?= h($transferorderitems->id) ?></td>
                <td><?= h($transferorderitems->item_id) ?></td>
                <td><?= h($transferorderitems->ECP) ?></td>
                <td><?= h($transferorderitems->barcode) ?></td>
                <td><?= h($transferorderitems->quantity) ?></td>
                <td><?= h($transferorderitems->transferOrder_id) ?></td>
                <td><?= h($transferorderitems->promotion_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Transferorderitems', 'action' => 'view', $transferorderitems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Transferorderitems', 'action' => 'edit', $transferorderitems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transferorderitems', 'action' => 'delete', $transferorderitems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferorderitems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Locations') ?></h4>
        <?php if (!empty($promotion->locations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Contact') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($promotion->locations as $locations): ?>
            <tr>
                <td><?= h($locations->id) ?></td>
                <td><?= h($locations->name) ?></td>
                <td><?= h($locations->address) ?></td>
                <td><?= h($locations->contact) ?></td>
                <td><?= h($locations->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Locations', 'action' => 'view', $locations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Locations', 'action' => 'edit', $locations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Locations', 'action' => 'delete', $locations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
