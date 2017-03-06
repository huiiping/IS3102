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
              <h3 class="box-title"><?= __('Edit Customer Membership Tier') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($custMembershipTier) ?>
                <fieldset>
                    <?php
                        echo $this->Form->input('tier_name', array('label' => 'Name'));
                        echo $this->Form->input('validity_period', array('label' => 'Renewal Cycle (days)'));
                        echo $this->Form->input('min_spending', array('label' => 'Minimum Spending'));
                        echo $this->Form->input('membership_fee', array('label' => 'Membership Fee'));
                        echo $this->Form->input('membership_pts', array('label' => 'Membership Points Earned Per $1 Spent'));
                        echo $this->Form->input('redemption_pts', array('label' => 'Redemption Points Exchange Rate For $1 Discount'));
                        echo $this->Form->input('discount_rate', array('label' => 'Discount Rate (%)'));
                        echo $this->Form->input('birthday_rate', array('label' => 'Birthday Discount Rate (%)'));
                        echo $this->Form->input('description');
                        echo $this->Form->input('status',['options' => ['Activated' => 'Activated', 'Deactivated' => 'Deactivated']]);
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
