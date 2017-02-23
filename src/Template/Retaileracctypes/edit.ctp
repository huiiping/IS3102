<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Element('intrasysLeftSideBar'); ?>

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
              <h3 class="box-title"><?= __('Edit Retailer Account Type') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($retailerAccType) ?>
                <fieldset>
                    <?php
                        echo $this->Form->input('name');
                        echo $this->Form->input('num_of_users', ['label'=>'No. of Users']);
                        echo $this->Form->input('num_of_warehouses', ['label'=>'No. of Warehouses']);
                        echo $this->Form->input('num_of_stores', ['label'=>'No. of Stores']);
                        echo $this->Form->input('num_of_product_types', ['label'=>'No. of Product Types']);
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
