<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('Reports') . '/' . __('Edit'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Purchase Orders'), ['controller' => 'Purchaseorders', 'action' => 'index']);
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
              <h3 class="box-title"><?= __('Edit Purchase Order') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($purchaseOrder) ?>
                <fieldset>
                    <?php
                        echo $this->Form->input('total_price');
                        echo $this->Form->input('delivery_status');
                        echo $this->Form->input('comments');
                        echo $this->Form->input('supplier_id', ['options' => $suppliers, 'empty' => true]);
                        echo $this->Form->input('retailer_employee_id', ['options' => $retailerEmployees, 'empty' => true]);
                        echo $this->Form->input('location_id', ['options' => $locations, 'empty' => true]);
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
