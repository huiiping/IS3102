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
        <div class="col-xs-4">
          <div class="box box-primary" style="height: 100%;">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center"><?= h($retailerDetail->retailer_name) ?></h3>
              <br>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><?= __('Email') ?></b> 
                  <div class="pull-right"><?= h($retailerDetail->retailer_email) ?></div>
                </li>
                <li class="list-group-item">
                  <b><?= __('Contact') ?></b> 
                  <div class="pull-right"><?= h($retailerDetail->contact) ?></div>
                </li>
              </ul>
              <br>
              <div class="btn btn-default btn-block">
                <?= $this->Html->link(__('Edit Retailer Detail'), ['action' => 'edit', $retailerDetail->retailerid]) ?>
              </div>
              <br>
              <div class="btn btn-default btn-block">
                <?= $this->Html->link(__('View Retailer Loyalty Points'), ['controller' => 'RetailerLoyaltyPoints', 'action' => 'individual', $retailerDetail->retailerid]) ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">  
          <div class="box box-primary" style="height: 100%;">
              <div class="box-body box-profile">
                <div class="box-header with-border">
                  <h3 class="box-title"><?= __('Retailer Profile') ?></h3>
                </div>
                <div class="box-body"><br>
                  <table class="table table-bordered table-striped">
                    <tr>
                        <th scope="row"><?= __('Retailer Name') ?></th>
                        <td><?= h($retailerDetail->retailer_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Retailer Description') ?></th>
                        <td><?= $this->Text->autoParagraph(h($retailerDetail->retailer_desc)); ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Address') ?></th>
                        <td><?= h($retailerDetail->address) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Retailer Id') ?></th>
                        <td><?= $this->Number->format($retailerDetail->retailerid) ?></td>
                    </tr>
                  </table>
                </div>
              </div>
          </div>
        </div>
      </div>
  </section>
</div>
