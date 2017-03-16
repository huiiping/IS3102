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
              <h3 class="box-title"><?= __('Edit Membership Point') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($membershipPoint) ?>
                <fieldset>
                    <?php
                        echo $this->Form->control('customer_id', ['options' => $customers, 'empty' => true]);
                        echo $this->Form->control('pts');
                        echo $this->Form->control('type');
                        echo $this->Form->control('remarks');
                        echo $this->Form->control('retailer_employee_id', ['options' => $retailerEmployees, 'empty' => true]);
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
