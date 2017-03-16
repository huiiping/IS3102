<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('Reports') . '/' . __('Edit'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Purchase Orders'), ['controller' => 'Purchaseorders', 'action' => 'index']);
$this->Html->addCrumb(__('Purchase Order Items'), ['controller' => 'Purchaseorderitems', 'action' => 'index']);
?>
<?= $this->Element('retailerLeftSideBar'); ?>

<!-- Main Content -->
<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
  </section>
  <!-- Main content -->
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Edit Purchase Order Item') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($purchaseOrderItem) ?>
                <fieldset>
                    <?php
                        echo $this->Form->input(('item_ID'), ['label' => 'Item Description']);
                        echo $this->Form->input('item_name');
                        echo $this->Form->input(('item_desc'), ['label' => 'Item Description']);
                        echo $this->Form->input('quantity');
                        echo $this->Form->input('unit_price');
                        echo $this->Form->input('sub_total_price');
                        echo $this->Form->input('purchase_order_id', ['options' => $purchaseOrders, 'empty' => true]);
                    ?>
                </fieldset>
                <br>
                <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?>
                <?= $this->Form->end() ?>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
