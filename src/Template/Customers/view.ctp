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
              <h3 class="box-title"><?= h($customer->first_name).' '.h($customer->last_name) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?>
              </div>
            </div>
            <div class="box-body">

                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('First Name') ?></th>
                        <td><?= h($customer->first_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Last Name') ?></th>
                        <td><?= h($customer->last_name) ?></td>
                    </tr>
                    <!--<tr>
                        <th scope="row"><?= __('Username') ?></th>
                        <td><?= h($customer->username) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Password') ?></th>
                        <td><?= h($customer->password) ?></td>
                    </tr>-->
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
                        <th scope="row"><?= __('Activation Status') ?></th>
                        <td><?= h($customer->activation_status) ?></td>
                    </tr>
                    <!--<tr>
                        <th scope="row"><?= __('Activation Token') ?></th>
                        <td><?= h($customer->activation_token) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Recovery Status') ?></th>
                        <td><?= h($customer->recovery_status) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Recovery Token') ?></th>
                        <td><?= h($customer->recovery_token) ?></td>
                    </tr>-->
                    <tr>
                        <th scope="row"><?= __('Cust Membership Tier') ?></th>
                        <td><?= $customer->has('cust_membership_tier') ? $this->Html->link($customer->cust_membership_tier->id, ['controller' => 'CustMembershipTiers', 'action' => 'view', $customer->cust_membership_tier->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Mailing List') ?></th>
                        <td><?= $customer->mailing_list ? __('Yes') : __('No'); ?></td>
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
                <div class="related">
                    <?php if (!empty($customer->promotions)): ?>
                    <h4><?= __('Related Promotions') ?></h4>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <!--<th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Start Date') ?></th>
                            <th scope="col"><?= __('End Date') ?></th>
                            <th scope="col"><?= __('Promo Desc') ?></th>
                            <th scope="col"><?= __('First Voucher Num') ?></th>
                            <th scope="col"><?= __('Last Voucher Num') ?></th>
                            <th scope="col"><?= __('Discount Rate') ?></th>
                            <th scope="col"><?= __('Credit Card Type') ?></th>
                            <th scope="col"><?= __('Retailer Employee Id') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>-->
                            <th scope="col"><?= __('Voucher Number') ?></th>
                        </tr>
                        <?php foreach ($customer->promotions as $promotions): ?>
                        <tr>
                            <!--td><?= h($promotions->id) ?></td>
                            <td><?= h($promotions->start_date) ?></td>
                            <td><?= h($promotions->end_date) ?></td>
                            <td><?= h($promotions->promo_desc) ?></td>
                            <td><?= h($promotions->first_voucher_num) ?></td>
                            <td><?= h($promotions->last_voucher_num) ?></td>
                            <td><?= h($promotions->discount_rate) ?></td>
                            <td><?= h($promotions->credit_card_type) ?></td>
                            <td><?= h($promotions->retailer_employee_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Promotions', 'action' => 'view', $promotions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Promotions', 'action' => 'edit', $promotions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Promotions', 'action' => 'delete', $promotions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotions->id)]) ?>
                            </td>-->
                            <td>
                                <?= $this->Html->link(__(h($promotions->first_voucher_num).h($promotions->last_voucher_num) ), ['controller' => 'Promotions', 'action' => 'view', $promotions->id]) ?>
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
