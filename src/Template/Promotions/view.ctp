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
                <?= $this->Html->link(__('Edit Promotion'), ['action' => 'edit', $promotion->id]) ?> |  
                 <?= $this->Html->link(__('Generate Email'), ['controller' => 'PromotionEmails', 'action' => 'add', $promotion->id]) ?>
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
                    <?php if (!empty($promotionEmails)): ?>
                    <h4><?= __('Saved Email Drafts') ?></h4>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <th scope="col"><?= __('Email ID') ?></th>
                        </tr>
                        <?php foreach ($promotionEmails as $promotionEmail): ?>
                        <tr>
                            <td>
                                <?= $this->Html->link(__(h($promotionEmail->title)), ['controller' => 'PromotionEmails', 'action' => 'view', $promotionEmail->id]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
                <div class="related">
                    <?php if (!empty($promotion->cust_membership_tiers)): ?>
                    <h4><?= __('Related Customer Membership Tiers') ?></h4>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <th scope="col"><?= __('Customer Membership Tier') ?></th>
                        </tr>
                        <?php foreach ($promotion->cust_membership_tiers as $custMembershipTiers): ?>
                        <tr>
                            <td>
                                <?= $this->Html->link(__(h($custMembershipTiers->tier_name)), ['controller' => 'CustMembershipTiers', 'action' => 'view', $custMembershipTiers->id]) ?>
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
