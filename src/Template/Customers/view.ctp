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
                <h3 class="profile-username text-center"><?= h($customer->first_name).' '.h($customer->last_name) ?></h3>
                <br>
                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b><?= __('Customer Membership Tier') ?></b> 
                    <div class="pull-right">
                        <?= $customer->has('cust_membership_tier') ? $this->Html->link($customer->cust_membership_tier->tier_name, ['controller' => 'CustMembershipTiers', 'action' => 'view', $customer->cust_membership_tier->id]) : '' ?>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <b><?= __('Activation Status') ?></b> 
                    <div class="pull-right"><?= h($customer->activation_status) ?></div>
                  </li>
                  <li class="list-group-item">
                    <b><?= __('Mailing List') ?></b> 
                    <div class="pull-right"><?= $customer->mailing_list ? __('Yes') : __('No'); ?></div>
                  </li>
                  <li class="list-group-item">
                    <b><?= __('Expiry Date') ?></b> 
                    <div class="pull-right"><?= $this->Time->format(h($customer->expiry_date), 'd MMM YYYY, hh:mm') ?></div>
                  </li>
                </ul>
                <br>
              <div class="btn btn-default btn-block"><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?></div>
            </div>
          </div>
        </div>

        <div class="col-md-8">  
            <div class="box box-primary" style="height: 100%;">
                <div class="box-body box-profile">
                  <div class="box-header with-border">
                    <h3 class="box-title"><?= __('Customer Profile') ?></h3>
                  </div>
                  <div class="box-body"><br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th scope="row"><?= __('Username') ?></th>
                            <td><?= h($customer->username) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Email') ?></th>
                            <td><?= h($customer->email) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Address') ?></th>
                            <td><?= h($customer->address) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Contact') ?></th>
                            <td><?= h($customer->contact) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($customer->id) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= $this->Time->format(h($customer->created), 'd MMM YYYY, hh:mm') ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= $this->Time->format(h($customer->modified), 'd MMM YYYY, hh:mm') ?></td>
                        </tr>
                    </table>
                  </div>
                </div>
            </div>            
        </div>
      </div>
  </section>
</div>
