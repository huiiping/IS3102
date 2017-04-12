<?php
$this->assign('title', __('Customers') . '/' . __('Index'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Customers'));

use Cake\ORM\TableRegistry;
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Customers') ?></h3>
        </div>
        <div class="box-body">
          <div class="pull-right">
            <a class="btn btn-success btn-block" title="Create New Employee" href="/IS3102_Final/customers/add" >Create New Customer</a>
          </div>
          <br>
          <form method="post" accept-charset="utf-8" action="/IS3102_Final/customers">
            <table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
              <tr>
                <th width="10"></th>
                <th scope="col">
                  <div class ="form-group">
                    <div class="input-group">
                      <label for="search"></label>&nbsp&nbsp&nbsp
                      <input class = "form-control" type="text" name="search" id="search" placeholder="Search">
                    </div>
                  </div>
                </th>
                <th width="30"></th>
                <th scope="col" class ="form-group">
                  <div class ="submit">
                  <input class="btn btn-primary btn-block" class = "form-control" type="submit" class="btn btn-default bth-flat" value="Search">
                  </div>
                </th>
                <th width="10"></th>
                <th scope="col" class ="form-group">
                  <div class ="submit">
                    <button class="btn btn-default btn-block"><a class="reset_button" onclick="reset();" placeholder="Reset"><i class="fa fa-fw fa-undo"></i>Reset</a></button>
                  </div>
                </th>
              </tr>
            </table>
          </form>

          <br>

          <?php 
          foreach ($customers as $customer): 
            ?>
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
                    <?php if ($customer->activation_status == 'Deactivated'): ?>
                      <a class="btn btn-danger btn-block" title="Deactivate Customer" href="/IS3102_Final/customers/deactivateStatus/<?= $customer->id ?>" >Deactivated</a>
                    <?php else: ?>
                      <a class="btn btn-success btn-block" title="Activate Customer" href="/IS3102_Final/customers/activateStatus/<?= $customer->id ?>" >Activated</a>
                    <?php endif; ?>
                  </div><br><br>
                </li>
              </ul>
            </div>
            <td>
              <div style="text-align: center">
                <a href="/IS3102_Final/customers/view/<?=$customer->id?>">
                  <i class="fa fa-bars" style="font-size:24px;" title="View Customer Details"></i></a>&nbsp
                  <a href="/IS3102_Final/customers/edit/<?=$customer->id?>">
                    <i class="fa fa-edit" style="font-size:24px;" title="Edit Customer Details"></i></a>&nbsp
                    <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash ', 'style' => 'font-size: 24px', 'title' => 'Delete Customer')), array('action' => 'delete', $customer->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $customer->id))) ?>
                  </div>
                </td>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="box-body">

          <div class="paginator">
            <ul class="pagination">
              <?= $this->Paginator->first('<< ' . __('first')) ?>
              <?= $this->Paginator->prev('< ' . __('previous')) ?>
              <?= $this->Paginator->numbers() ?>
              <?= $this->Paginator->next(__('next') . ' >') ?>
              <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
          </div>

        </div>
      </div>
    </div>
  </div>

</section>
