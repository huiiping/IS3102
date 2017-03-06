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
                <h3 class="box-title"><?= __('Create New Inventory') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($inventory) ?>
                <fieldset>
                    <?php
                        echo $this->Form->control('prod_type_id', ['label' => 'Product Type Id', 'options' => $prodTypes]);
                        echo $this->Form->control('SKU');
                        echo $this->Form->control('quantity');
                        echo $this->Form->control('section_id', ['options' => $sections]);
                        echo $this->Form->control('location_id', ['options' => $locations]);
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
