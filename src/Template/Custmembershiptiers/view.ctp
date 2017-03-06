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
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= h($custMembershipTier->tier_name) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit Customer Membership Tier'), ['action' => 'edit', $custMembershipTier->id]) ?>
              </div>
            </div>
            <div class="box-body">

                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Tier Name') ?></th>
                        <td><?= h($custMembershipTier->tier_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Tier Description') ?></th>
                        <td><?= $this->Text->autoParagraph(h($custMembershipTier->description)); ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Tier Name') ?></th>
                        <td><?= h($custMembershipTier->status) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Min Spending') ?></th>
                        <td><?= h($custMembershipTier->min_spending) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Membership Fee') ?></th>
                        <td><?= h($custMembershipTier->membership_fee) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Discount Rate') ?></th>
                        <td><?= h($custMembershipTier->discount_rate) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Birthday Rate') ?></th>
                        <td><?= h($custMembershipTier->birthday_rate) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Validity Period') ?></th>
                        <td><?= $this->Number->format($custMembershipTier->validity_period) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Membership Pts') ?></th>
                        <td><?= $this->Number->format($custMembershipTier->membership_pts) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Redemption Pts') ?></th>
                        <td><?= $this->Number->format($custMembershipTier->redemption_pts) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($custMembershipTier->id) ?></td>
                    </tr>

                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= $this->Time->format(h($custMembershipTier->created), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= $this->Time->format(h($custMembershipTier->modified), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                </table>
                <div class="related">
                    <?php if (!empty($custMembershipTier->customers)): ?>
                    <h4><?= __('Related Customers') ?></h4>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <!--<th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Username') ?></th>
                            <th scope="col"><?= __('Password') ?></th>
                            <th scope="col"><?= __('Email') ?></th>
                            <th scope="col"><?= __('Address') ?></th>
                            <th scope="col"><?= __('Contact') ?></th>
                            <th scope="col"><?= __('Created') ?></th>
                            <th scope="col"><?= __('Modified') ?></th>
                            <th scope="col"><?= __('First Name') ?></th>
                            <th scope="col"><?= __('Last Name') ?></th>
                            <th scope="col"><?= __('Account Status') ?></th>
                            <th scope="col"><?= __('Mailing List') ?></th>
                            <th scope="col"><?= __('Cust Membership Tier Id') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>-->
                            <th scope="col"><?= __('Customer') ?></th>
                        </tr>
                        <?php foreach ($custMembershipTier->customers as $customers): ?>
                        <tr>
                            <!--<td><?= h($customers->id) ?></td>
                            <td><?= h($customers->username) ?></td>
                            <td><?= h($customers->password) ?></td>
                            <td><?= h($customers->email) ?></td>
                            <td><?= h($customers->address) ?></td>
                            <td><?= h($customers->contact) ?></td>
                            <td><?= h($customers->created) ?></td>
                            <td><?= h($customers->modified) ?></td>
                            <td><?= h($customers->first_name) ?></td>
                            <td><?= h($customers->last_name) ?></td>
                            <td><?= h($customers->account_status) ?></td>
                            <td><?= h($customers->mailing_list) ?></td>
                            <td><?= h($customers->cust_membership_tier_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Customers', 'action' => 'view', $customers->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Customers', 'action' => 'edit', $customers->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Customers', 'action' => 'delete', $customers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customers->id)]) ?>
                            </td>-->
                            <td>
                                <?= $this->Html->link(__(h($customers->first_name).' '.h($customers->last_name)), ['controller' => 'Customers', 'action' => 'view', $customers->id]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
      </div>
  </section>
</div>
