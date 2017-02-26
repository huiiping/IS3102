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
              <h3 class="box-title"><?= __('Edit Product Type') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($prodType) ?>
                <fieldset>
                    <?php
                        echo $this->Form->input('prod_name');
                        echo $this->Form->input('prod_desc');
                        echo $this->Form->input('colour');
                        echo $this->Form->input('dimension');
                        echo $this->Form->input('store_unit_price');
                        echo $this->Form->input('web_store_unit_price');
                        echo $this->Form->input('SKU');
                        echo $this->Form->input('prod_cat_id', ['options' => $prodCats, 'empty' => true]);
                        echo $this->Form->input('promotions._ids', ['options' => $promotions]);
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
