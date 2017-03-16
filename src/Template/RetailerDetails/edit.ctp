<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('Retailer') . '/' . __('RetailerDetails'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Retailer Details'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Edit'));
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
              <h3 class="box-title"><?= __('Edit Retailer Detail') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($retailerDetail) ?>
                <fieldset>
                    <?php
                        echo $this->Form->input('retailer_name', array('disabled' => true));
                        echo $this->Form->input(('retailer_desc'), ['label' => 'Retailer Description']);
                        echo $this->Form->input('retailer_email');
                        echo $this->Form->input('address');
                        echo $this->Form->input('contact');
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
