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
        <div class="col-xs-8">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username"><?= h($retailer->retailer_name) ?></h3>
              <br>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><?= __('Account Type') ?></b> 
                  <div class="pull-right">
                      <?= h($retailer->retailer_acc_type->name) ?>
                  </div>
                </li>
                <br>
                <h4>Contract Terms</h4>
                <li class="list-group-item">
                  <b><?= __('No. Of Users') ?></b> 
                  <div class="pull-right">
                      <?= h($retailer->retailer_acc_type->num_of_users) ?>
                  </div>
                </li>
                <li class="list-group-item">
                  <b><?= __('No. Of Warehouses') ?></b> 
                  <div class="pull-right">
                      <?= h($retailer->retailer_acc_type->num_of_warehouses) ?>
                  </div>
                </li>
                <li class="list-group-item">
                  <b><?= __('No. Of Stores') ?></b> 
                  <div class="pull-right">
                      <?= h($retailer->retailer_acc_type->num_of_stores) ?>
                  </div>
                </li>
                <li class="list-group-item">
                  <b><?= __('No. Of Product Types') ?></b> 
                  <div class="pull-right"><?= h($retailer->retailer_acc_type->num_of_product_types) ?></div>
                </li>
                <br>
                <h4>Additional Contract Add-ons</h4>
                <li class="list-group-item">
                  <b><?= __('Additional No. Of Users') ?></b> 
                  <div class="pull-right"><?= $this->Number->format($retailer->num_of_users) ?></div>
                </li>
                <li class="list-group-item">
                  <b><?= __('Additional No. Of Warehouses') ?></b> 
                  <div class="pull-right"><?= $this->Number->format($retailer->num_of_warehouses) ?></div>
                </li>
                <li class="list-group-item">
                  <b><?= __('Additional No. Of Stores') ?></b> 
                  <div class="pull-right"><?= $this->Number->format($retailer->num_of_stores) ?></div>
                </li>
                <li class="list-group-item">
                  <b><?= __('Additional No. Of Product Types') ?></b> 
                  <div class="pull-right"><?= $this->Number->format($retailer->num_of_product_types) ?></div>
                </li>                
              </ul>
              <br>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>