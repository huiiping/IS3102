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
              <h3 class="box-title"><?= __('Edit Promotion') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($promotion) ?>
                <fieldset>
                    <?php
                        echo $this->Form->input('start_date', ['empty' => true]);
                        echo $this->Form->input('end_date', ['empty' => true]);
                        echo $this->Form->input('promo_desc');
                        echo $this->Form->input('first_voucher_num');
                        echo $this->Form->input('last_voucher_num');
                        echo $this->Form->input('discount_rate');
                        echo $this->Form->input('credit_card_type');
                        echo $this->Form->input('retailer_employee_id', ['options' => $retailerEmployees, 'empty' => true]);
                        echo $this->Form->input('customers._ids', ['options' => $customers]);
                        echo $this->Form->input('prod_types._ids', ['options' => $prodTypes]);
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
