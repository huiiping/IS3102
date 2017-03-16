<?php
/**
  * @var \App\View\AppView $this
  */
?>


<?php
$this->assign('title', __('Items') . '/' . __('Edit'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('ProdCats'), ['controller' => 'ProdCats', 'action' => 'index']);
$this->Html->addCrumb(__('Products'), ['controller' => 'Products', 'action' => 'index']);
$this->Html->addCrumb(__('Items'), ['controller' => 'Items', 'action' => 'index']);
$this->Html->addCrumb(__('Edit'));
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
              <h3 class="box-title"><?= __('Edit Item') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($item) ?>
                <fieldset>
                    <?php
                        echo $this->Form->control('name');
                        echo $this->Form->control('description');
                        echo $this->Form->control('EPC');
                        echo $this->Form->control('status');
                        echo $this->Form->control('report_id');
                        echo $this->Form->control('product_id', ['options' => $products, 'empty' => true]);
                        echo $this->Form->control('location_id', ['options' => $locations, 'empty' => true]);
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
