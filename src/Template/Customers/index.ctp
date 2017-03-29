<?php
$this->assign('title', __('Customers') . '/' . __('Index'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Customers'));
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
                    <input class = "form-control" type="submit" class="btn btn-default bth-flat" value="Search">
                  </div>
                </th>
              </tr>
            </table>
          </form>

          <br>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>

                <th scope="col"><?= $this->Paginator->sort('first_name', ['label' => 'Customer Name']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expiry_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cust_membership_tier_id', ['label' => 'Membership Tiers']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('activation_status') ?></th>

                <th scope="col"><?= $this->Paginator->sort('mailing_list') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($customers as $customer): ?>
                <tr>

                  <td style="max-width: 150px; overflow: hidden;">
                    <?= $this->Html->link(__(h($customer->first_name.' '.$customer->last_name)), ['action' => 'view', $customer->id], ['title' => 'View Customer Details']) ?>
                  </td>
                  <td style="width: 150px; overflow: hidden;">
                    <a href="mailto:<?= h($customer->email) ?>" title="Email">
                      <?= h($customer->email) ?>
                    </a>
                  </td>
                  <td style="width: 150px; overflow: hidden;">
                    <a href="tel:+<?= h($customer->contact) ?>" title="Call Contact">
                      <?= h($customer->contact) ?>
                    </a>
                  </td>

                  <td style="width: 150px; overflow: hidden;">
                    <?= h($customer->expiry_date) ?>
                  </td>

                  <td><?= $customer->has('cust_membership_tier') ? $this->Html->link($customer->cust_membership_tier->tier_name, ['controller' => 'CustMembershipTiers', 'action' => 'view', $customer->cust_membership_tier->id]) : '' ?></td>
 
                    <td>
                      <?php if ($customer->activation_status == 'Activated'): ?>
                        <a class="btn btn-danger btn-block" title="Deactivate Customer" href="/IS3102_Final/customers/deactivateStatus/<?= $customer->id ?>" >Deactivate</a>
                      <?php else: ?>
                        <a class="btn btn-success btn-block" title="Activate Customer" href="/IS3102_Final/customers/activateStatus/<?= $customer->id ?>" >Activate</a>
                      <?php endif; ?>
                    </td>

                    <td>
                      <?php if ($customer->mailing_list == '0'): ?>
                        No
                      <?php else: ?>
                        Yes
                      <?php endif; ?>                        
                    </td>
                    <td>
                      <a href="/IS3102_Final/customers/edit/<?=$customer->id?>">
                        <i class="fa fa-edit" title="Edit Customer Details"></i></a>&nbsp
                        <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Customer')), array('action' => 'delete', $customer->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $customer->id))) ?>
                      </td>
                    
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
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
