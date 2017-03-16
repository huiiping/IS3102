<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('Retailer') );
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Loyalty Points'), ['controller' => 'RetailerLoyaltyPoints', 'action' => 'index']);

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
              <h3 class="box-title"><?= __('Redeem Loyalty Point') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($retailerLoyaltyPoint) ?>
                <fieldset>
                    <?php
                      echo $this->Form->input('loyalty_pts', array('disabled'=>'disabled', 'label'=>'Loyalty Points'));
                      //echo $this->Form->input('redemption_pts', array('disabled'=>'disabled', 'label'=>'Redemption Points'));
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
