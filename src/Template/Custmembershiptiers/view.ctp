<?php
$this->assign('title', __('Customer Membership Tiers') . '/' . __('View'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Customer Membership Tiers'), ['controller' => 'CustMembershipTiers', 'action' => 'index']);
$this->Html->addCrumb(__('View Customer Membership Tier'));
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= h($custMembershipTier->tier_name) ?></h3>
        </div>
        <div class="box-body">
          <div class="pull-right">
            <a class="btn btn-default btn-block" title="Edit Customer Membership Tier" href="/IS3102_Final/cust-membership-tiers/edit/<?=$custMembershipTier->id?>" >Edit Customer Membership Tier</a>
          </div><br><br><br>

            <table class="table table-bordered table-striped">
                <tr>
                    <th scope="row"><?= __('ID') ?></th>
                    <td><?= $this->Number->format($custMembershipTier->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Tier Name') ?></th>
                    <td><?= h($custMembershipTier->tier_name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Tier Description') ?></th>
                    <td><?= $this->Text->autoParagraph(h($custMembershipTier->description)); ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Minimum Spending') ?></th>
                    <td><?= h($custMembershipTier->min_spending) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Membership Fee') ?></th>
                    <td><?= h($custMembershipTier->membership_fee) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Discount Rate (%)') ?></th>
                    <td><?= h($custMembershipTier->discount_rate) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Birthday Rate (%)') ?></th>
                    <td><?= h($custMembershipTier->birthday_rate) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Validity Period') ?></th>
                    <td><?= $this->Number->format($custMembershipTier->validity_period) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Membership Points') ?></th>
                    <td><?= $this->Number->format($custMembershipTier->membership_pts) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Redemption Points') ?></th>
                    <td><?= $this->Number->format($custMembershipTier->redemption_pts) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= $this->Time->format(h($custMembershipTier->created), 'd MMM YYYY, HH:mm') ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= $this->Time->format(h($custMembershipTier->modified), 'd MMM YYYY, HH:mm') ?></td>
                </tr>
            </table><br><br>
        </div>
      </div>
    </div>
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?= __('Related Customers') ?></h3>
        </div>
        <div class="box-body">
            <?php if (!empty($custMembershipTier->customers)): ?>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                    <!--<th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Username') ?></th>
                    <th scope="col"><?= __('Password') ?></th>-->
                    <th scope="col"><?= __('Customer') ?></th>
                    <th scope="col"><?= __('Email') ?></th>
                    <th scope="col"><?= __('Contact') ?></th>
                    <!--<th scope="col"><?= __('Cust Membership Tier Id') ?></th>
                    <th scope="col"><?= __('Address') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col"><?= __('First Name') ?></th>
                    <th scope="col"><?= __('Last Name') ?></th>
                    <th scope="col"><?= __('Account Status') ?></th>
                    <th scope="col"><?= __('Mailing List') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>-->
                </tr>
              </thead>
              <tbody>
                <?php foreach ($custMembershipTier->customers as $customers): ?>
                <tr>
                    <!--<td><?= h($customers->id) ?></td>
                    <td><?= h($customers->username) ?></td>
                    <td><?= h($customers->password) ?></td>-->
                    <td>
                        <?= $this->Html->link(__(h($customers->first_name).' '.h($customers->last_name)), ['controller' => 'Customers', 'action' => 'view', $customers->id], ['title' => 'View Customer Details' ]) ?>
                    </td>
                    <td>
                        <a href="mailto:<?= h($customers->email) ?>" title="Email">
                          <?= h($customers->email) ?>
                        </a>
                    </td>
                    <td>
                        <a href="tel:+<?= h($customers->contact) ?>" title="Call Contact">
                          <?= h($customers->contact) ?>
                        </a>
                      </td>
                    <!--<td><?= h($customers->cust_membership_tier_id) ?></td>
                    <td><?= h($customers->address) ?></td>
                    <td><?= h($customers->created) ?></td>
                    <td><?= h($customers->modified) ?></td>
                    <td><?= h($customers->first_name) ?></td>
                    <td><?= h($customers->last_name) ?></td>
                    <td><?= h($customers->account_status) ?></td>
                    <td><?= h($customers->mailing_list) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Customers', 'action' => 'view', $customers->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Customers', 'action' => 'edit', $customers->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Customers', 'action' => 'delete', $customers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customers->id)]) ?>
                    </td>-->
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
