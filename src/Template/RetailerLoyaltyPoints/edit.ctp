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
              <h3 class="box-title"><?= __('Edit Retailer Loyalty Point') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($retailerLoyaltyPoint) ?>
                <fieldset>
                    <?php
                        echo $this->Form->input('loyalty_pts', ['label'=>'Loyalty Points']);
                        echo $this->Form->input('redemption_pts', ['label'=>'Redemption Points']);
                        echo $this->Form->input('remarks');
                        echo $this->Form->input('retailer_id', ['options' => $retailers]);
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
