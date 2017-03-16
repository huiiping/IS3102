<?php
/**
  * @var \App\View\AppView $this
  */
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
                <h3 class="box-title"><?= __('Create New Feedback') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($feedback) ?>
                <fieldset>
                    <?php
                        echo $this->Form->control('customer_id', ['options' => $customers, 'empty' => true]);
                        echo $this->Form->control('customer_first_name');
                        echo $this->Form->control('customer_last_name');
                        echo $this->Form->control('customer_contact');
                        echo $this->Form->control('customer_email');
                        echo $this->Form->control('message');
                        echo $this->Form->control('status');
                        echo $this->Form->control('product_id', ['options' => $products, 'empty' => true]);
                        echo $this->Form->control('item_id', ['options' => $items, 'empty' => true]);
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
