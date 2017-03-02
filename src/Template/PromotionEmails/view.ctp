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
              <h3 class="box-title"><?= h($promotionEmail->title) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit Promotion Email'), ['action' => 'edit', $promotionEmail->id]) ?>
              </div>
            </div>
            <div class="box-body">

                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Title') ?></th>
                        <td><?= h($promotionEmail->title) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Promotion') ?></th>
                        <td><?= $promotionEmail->has('promotion') ? $this->Html->link($promotionEmail->promotion->id, ['controller' => 'Promotions', 'action' => 'view', $promotionEmail->promotion->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Customer Membership Tier') ?></th>
                        <td><?= $promotionEmail->has('cust_membership_tier') ? $this->Html->link($promotionEmail->cust_membership_tier->tier_name, ['controller' => 'CustMembershipTiers', 'action' => 'view', $promotionEmail->cust_membership_tier->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Body') ?></th>
                        <td><?= h($promotionEmail->body) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Number Of Sends') ?></th>
                        <td><?= $this->Number->format($promotionEmail->number_of_sends) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Last Sent') ?></th>
                        <td><?= $this->Time->format(h($promotionEmail->last_sent), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($promotionEmail->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= $this->Time->format(h($promotionEmail->created), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= $this->Time->format(h($promotionEmail->modified), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                </table>
              </div>
            </div>
        </div>
      </div>
  </section>
</div>
