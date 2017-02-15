<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prodtypes'), ['controller' => 'Prodtypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prodtype'), ['controller' => 'Prodtypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Deliveryorderitems'), ['controller' => 'Deliveryorderitems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deliveryorderitem'), ['controller' => 'Deliveryorderitems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactionitems'), ['controller' => 'Transactionitems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transactionitem'), ['controller' => 'Transactionitems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transferorderitems'), ['controller' => 'Transferorderitems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transferorderitem'), ['controller' => 'Transferorderitems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="items view large-9 medium-8 columns content">
    <h3><?= h($item->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ItemName') ?></th>
            <td><?= h($item->itemName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EPC') ?></th>
            <td><?= h($item->EPC) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Barcode') ?></th>
            <td><?= h($item->barcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ItemStatus') ?></th>
            <td><?= h($item->itemStatus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $item->has('location') ? $this->Html->link($item->location->name, ['controller' => 'Locations', 'action' => 'view', $item->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prodtype') ?></th>
            <td><?= $item->has('prodtype') ? $this->Html->link($item->prodtype->id, ['controller' => 'Prodtypes', 'action' => 'view', $item->prodtype->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($item->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Section Id') ?></th>
            <td><?= $this->Number->format($item->section_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Defective') ?></th>
            <td><?= $item->defective ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('ItemDesc') ?></h4>
        <?= $this->Text->autoParagraph(h($item->itemDesc)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sections') ?></h4>
        <?php if (!empty($item->sections)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('SecName') ?></th>
                <th scope="col"><?= __('SpcaeLimit') ?></th>
                <th scope="col"><?= __('Reserve') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->sections as $sections): ?>
            <tr>
                <td><?= h($sections->id) ?></td>
                <td><?= h($sections->secName) ?></td>
                <td><?= h($sections->spcaeLimit) ?></td>
                <td><?= h($sections->reserve) ?></td>
                <td><?= h($sections->item_id) ?></td>
                <td><?= h($sections->location_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sections', 'action' => 'view', $sections->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sections', 'action' => 'edit', $sections->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sections', 'action' => 'delete', $sections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sections->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Deliveryorderitems') ?></h4>
        <?php if (!empty($item->deliveryorderitems)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('ECP') ?></th>
                <th scope="col"><?= __('Barcode') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('DeliveryOrder Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->deliveryorderitems as $deliveryorderitems): ?>
            <tr>
                <td><?= h($deliveryorderitems->id) ?></td>
                <td><?= h($deliveryorderitems->item_id) ?></td>
                <td><?= h($deliveryorderitems->ECP) ?></td>
                <td><?= h($deliveryorderitems->barcode) ?></td>
                <td><?= h($deliveryorderitems->quantity) ?></td>
                <td><?= h($deliveryorderitems->deliveryOrder_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Deliveryorderitems', 'action' => 'view', $deliveryorderitems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Deliveryorderitems', 'action' => 'edit', $deliveryorderitems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Deliveryorderitems', 'action' => 'delete', $deliveryorderitems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryorderitems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Transactionitems') ?></h4>
        <?php if (!empty($item->transactionitems)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('TransactionStatus') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('ItemDesc') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('UnitPrice') ?></th>
                <th scope="col"><?= __('Transaction Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->transactionitems as $transactionitems): ?>
            <tr>
                <td><?= h($transactionitems->id) ?></td>
                <td><?= h($transactionitems->transactionStatus) ?></td>
                <td><?= h($transactionitems->item_id) ?></td>
                <td><?= h($transactionitems->itemDesc) ?></td>
                <td><?= h($transactionitems->quantity) ?></td>
                <td><?= h($transactionitems->unitPrice) ?></td>
                <td><?= h($transactionitems->transaction_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Transactionitems', 'action' => 'view', $transactionitems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Transactionitems', 'action' => 'edit', $transactionitems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transactionitems', 'action' => 'delete', $transactionitems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactionitems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Transferorderitems') ?></h4>
        <?php if (!empty($item->transferorderitems)): ?>
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
            <?php foreach ($item->transferorderitems as $transferorderitems): ?>
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
</div>
