<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rfq'), ['action' => 'edit', $rfq->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rfq'), ['action' => 'delete', $rfq->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfq->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rfqs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rfq'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rfq Suppliers'), ['controller' => 'RfqSuppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rfq Supplier'), ['controller' => 'RfqSuppliers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
-->
<style>
    .panel, .btn{
        border-radius: 8px;
        overflow:hidden;
    }
</style>
<div style="height:6em;"></div>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading"><h3><strong><?= $rfq->title ?></strong></h3></div>
            <div class="panel-body"><?= h($rfq->message) ?>
                <br><hr>
                <?php if($type) : ?>
                    Received: <?= h($rfq->created) ?>
                <?php else: ?>
                    Sent on: <?= h($rfq->created) ?>
                <?php endif?>
                <br>
                Last modified: <?= h($rfq->modified) ?>
                <br>

                <?php if(!$type) : ?>
                    <hr>
                    This RFQ was sent out to the following suppliers: <br><br>
                    <?php foreach ($rfq->suppliers as $supplier): ?>
                        <a class="btn btn-default btn-sm" href="/IS3102_Final/Suppliers/view/<?= $supplier->id ?>"><?= $supplier->supplier_name ?></a>
                    </tr>
                <?php endforeach; ?>
            <?php endif?>
        </div>
        <div class="panel-footer">

            <?php if($type) : ?>
                <a class="btn btn-default btn-md btn-block" href="/IS3102_Final/rfqs/supplierIndex">Back to RFQ Index</a>
                <a class="btn btn-primary btn-md btn-block" href="/IS3102_Final/quotations/supplier-add/<?= $rfq->id ?>">Submit Quotation</a>
            <?php else: ?>
                <a class="btn btn-default btn-md btn-block" href=" /IS3102_Final/Rfqs/index">Back to RFQ Index</a>
            <?php endif?>
        </div>
    </div>
</div>
</div>


<!-- 
<?php if(!$type) : ?>
    <div class="related">
        <h4><?= __('Related Suppliers') ?></h4>
        <?php if (!empty($rfq->suppliers)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Rfq Id') ?></th>
                    <th scope="col"><?= __('Supplier Id') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($rfq->suppliers as $supplier): ?>
                    <tr>
                        <td><?= h($supplier->id) ?></td>
                        <td><?= h($supplier->supplier_name) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Suppliers', 'action' => 'view', $supplier->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Suppliers', 'action' => 'edit', $supplier->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Suppliers', 'action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
<?php endif?> -->
</div>
