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
                <h3 class="box-title"><?= __('Create New Product Category') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($prodCat) ?>
                <fieldset>
                    <?php
                        echo $this->Form->input(('cat_name'), ['label' => 'Product Category Name']);
                        echo $this->Form->input(('cat_desc'), ['label' => 'Product Category Description']);
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
