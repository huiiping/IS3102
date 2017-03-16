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
                <h3 class="box-title"><?= __('Award / Redeem Loyalty Points') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($retailerLoyaltyPoint) ?>
                <fieldset>
                    <?php
                        $session = $this->request->session();
                        echo $this->Form->input('loyalty_pts', ['label'=>'Loyalty Points']);
                        echo $this->Form->input('redemption_pts');
                        echo $this->Form->input('remarks');
                        echo $this->Form->hidden('retailer_id', ['value' => $retailer[0]['id']]);
                        echo $this->Form->hidden('intrasys_employee_id', ['value'=>$session->read('employee_id')]);
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
