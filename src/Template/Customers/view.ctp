<?php
$this->assign('title', __('Customer') . '/' . __('View'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Customers'), ['controller' => 'Customers', 'action' => 'index']);
$this->Html->addCrumb(__('View Customer : '.h($customer->first_name).' '.h($customer->last_name)));
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-4">
      <div class="box box-primary" style="height: 500px;">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="/IS3102_Final/img/user2-160x160.jpg" alt="User profile picture">
          <h3 class="profile-username text-center"><?= h($customer->first_name).' '.h($customer->last_name) ?></h3>

          <ul class="list-group list-group-unbordered"><br>

           <li class="list-group-item">
            <b><?= __('Email') ?></b> 
            <div class="pull-right">                    
              <a href="mailto:<?= h($customer->email) ?>" title="Email">
                <?= h($customer->email) ?>
              </a>
            </div>
          </li>

          <li class="list-group-item">
            <b><?= __('Contact') ?></b> 
            <div class="pull-right">                    
              <a href="tel:+<?= h($customer->contact) ?>" title="Call Contact">
                <?= h($customer->contact) ?>
              </a>
            </div>
          </li>
          <li class="list-group-item">
            <b><?= __('Customer Membership Tier') ?></b> 
            <div class="pull-right">                    
              <?= $customer->has('cust_membership_tier') ? $this->Html->link($customer->cust_membership_tier->tier_name, ['controller' => 'CustMembershipTiers', 'action' => 'view', $customer->cust_membership_tier->id]) : '' ?>
            </div>
          </li>
          <li class="list-group-item">
            <b><?= __('Mailing List') ?></b> 
            <div class="pull-right"><?= $customer->mailing_list ? __('Yes') : __('No'); ?></div>
          </li>
          <li class="list-group-item">
            <b><?= __('Activation Status') ?></b> 
            <div class="pull-right">
              <?php if ($customer->activation_status == 'Activated'): ?>
                <a class="btn btn-danger btn-block" title="Deactivate Customer" href="/IS3102_Final/customers/deactivateStatus/<?= $customer->id ?>" >Deactivate</a>
              <?php else: ?>
                <a class="btn btn-success btn-block" title="Activate Customer" href="/IS3102_Final/customers/activateStatus/<?= $customer->id ?>" >Activate</a>
              <?php endif; ?>
            </div><br><br>
          </li>
        </ul>
      </div>
      <td>
        <div style="text-align: center">
          <a href="/IS3102_Final/customers/edit/<?=$customer->id?>">
            <i class="fa fa-edit" style="font-size:24px;" title="Edit Customer Details"></i></a>&nbsp
            <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash ', 'style' => 'font-size: 24px', 'title' => 'Delete Customer')), array('action' => 'delete', $customer->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $customer->id))) ?>
          </div>
        </td>
      </div>
    </div>

    <div class="col-md-8">  
      <div class="box box-primary" style="height: 500px;">
        <div class="box-body box-profile">
          <div class="box-header with-border">
            <h3 class="box-title"><?= __('Customer Profile') ?></h3>
          </div>
          <div class="box-body"><br>
            <table class="table table-bordered table-striped">
              <tr>
                <th scope="row"><?= __('Member Identification') ?></th>
                <td><?= h($customer->member_identification) ?></td>
              </tr>
              <tr>
                <th scope="row"><?= __('Date of Birth') ?></th>
                <td><?= $this->Time->format(h($customer->dob), 'd MMM YYYY') ?></td>
              </tr>
              <tr>
                <th scope="row"><?= __('Address') ?></th>
                <td><?= h($customer->address) ?></td>
              </tr>
              <tr>
              <th scope="row"><?= __('Preferred Currency') ?></th>
                <td><?= h($customer->preferred_currency) ?></td>
              </tr>
              <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= $this->Time->format(h($customer->created), 'd MMM YYYY, HH:mm') ?></td>
              </tr>
              <tr>
                <th scope="row"><?= __('Expiry Date') ?></th>
                <td><?= $this->Time->format(h($customer->expiry_date), 'd MMM YYYY') ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>            
    </div>
  </div>
</section>
