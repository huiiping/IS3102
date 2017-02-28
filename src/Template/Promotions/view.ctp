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
              <h3 class="box-title"><?= 'Promotion ID '.h($promotion->id) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit Promotion'), ['action' => 'edit', $promotion->id]) ?>
              </div>
            </div>
            <div class="box-body">

                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('First Voucher Number') ?></th>
                        <td><?= h($promotion->first_voucher_num) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Last Voucher Number') ?></th>
                        <td><?= h($promotion->last_voucher_num) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Promotion Description') ?></th>
                        <td><?= $this->Text->autoParagraph(h($promotion->promo_desc)); ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Credit Card Type') ?></th>
                        <td><?= h($promotion->credit_card_type) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Discount Rate') ?></th>
                        <td><?= $this->Number->format($promotion->discount_rate) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Start Date') ?></th>
                        <td><?= $this->Time->format(h($promotion->start_date), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('End Date') ?></th>
                        <td><?= $this->Time->format(h($promotion->end_date), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Retailer Employee') ?></th>
                        <td><?= $promotion->has('retailer_employee') ? $this->Html->link($promotion->retailer_employee->first_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $promotion->retailer_employee->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($promotion->id) ?></td>
                    </tr>
                </table>
                <div class="related">
                    <?php if (!empty($promotion->customers)): ?>
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
                            <th scope="col"><?= __('Activation Status') ?></th>
                            <th scope="col"><?= __('Activation Token') ?></th>
                            <th scope="col"><?= __('Recovery Status') ?></th>
                            <th scope="col"><?= __('Recovery Token') ?></th>
                            <th scope="col"><?= __('Mailing List') ?></th>
                            <th scope="col"><?= __('Cust Membership Tier Id') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>-->
                            <th scope="col"><?= __('Customer') ?></th>
                        </tr>
                        <?php foreach ($promotion->customers as $customers): ?>
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
                            <td><?= h($customers->activation_status) ?></td>
                            <td><?= h($customers->activation_token) ?></td>
                            <td><?= h($customers->recovery_status) ?></td>
                            <td><?= h($customers->recovery_token) ?></td>
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
                <div class="related">
                    <?php if (!empty($promotion->prod_types)): ?>
                    <h4><?= __('Related Product Types') ?></h4>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <!--<th scope="col"><?= __('Id') ?></th>-->
                            <th scope="col"><?= __('Product Name') ?></th>
                            <!--<th scope="col"><?= __('Prod Desc') ?></th>
                            <th scope="col"><?= __('Colour') ?></th>
                            <th scope="col"><?= __('Dimension') ?></th>
                            <th scope="col"><?= __('Store Unit Price') ?></th>
                            <th scope="col"><?= __('Web Store Unit Price') ?></th>
                            <th scope="col"><?= __('SKU') ?></th>
                            <th scope="col"><?= __('Prod Cat Id') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>-->
                        </tr>
                        <?php foreach ($promotion->prod_types as $prodTypes): ?>
                        <tr>
                            <!--<td><?= h($prodTypes->id) ?></td>-->
                            <td>
                                <?= $this->Html->link(__(h($prodTypes->prod_name)), ['controller' => 'ProdTypes', 'action' => 'view', $prodTypes->id]) ?>
                            </td>
                            <!--<td><?= h($prodTypes->prod_desc) ?></td>
                            <td><?= h($prodTypes->colour) ?></td>
                            <td><?= h($prodTypes->dimension) ?></td>
                            <td><?= h($prodTypes->store_unit_price) ?></td>
                            <td><?= h($prodTypes->web_store_unit_price) ?></td>
                            <td><?= h($prodTypes->SKU) ?></td>
                            <td><?= h($prodTypes->prod_cat_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ProdTypes', 'action' => 'view', $prodTypes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ProdTypes', 'action' => 'edit', $prodTypes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProdTypes', 'action' => 'delete', $prodTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prodTypes->id)]) ?>
                            </td>-->
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
