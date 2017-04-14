<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('Reports') . '/' . __('Edit'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Promotions'), ['controller' => 'Promotions', 'action' => 'index']);
$this->Html->addCrumb(__('View Promotion'));
?>

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
    <div class="box-body"><br>

        <table class="table table-bordered table-striped">
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
    </div>
</div>
</div>

<div class="col-xs-12">
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#custMembershipTier" data-toggle="tab">Customer Membership Tier</a></li>
      <li><a href="#product" data-toggle="tab">Products</a></li>
      <li><a href="#promotionalEmail" data-toggle="tab">Latest Promotional Email</a></li>
  </ul>

  <div class="tab-content">
    <div class="active tab-pane" id="custMembershipTier">
        <?php if (!empty($promotion->cust_membership_tiers)): ?><br>
            <table class="table table-bordered table-striped">
                <tbody>
                    <?php foreach ($promotion->cust_membership_tiers as $custMembershipTiers): ?>

                       <tr>
                        <td>
                            <?= $this->Html->link(__(h($custMembershipTiers->tier_name)), ['controller' => 'CustMembershipTiers', 'action' => 'view', $custMembershipTiers->id]) ?>

                        </td>
                    </tr>
                    
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <br>
        There is no related customer membership tier.
        <br><br>
    <?php endif; ?>
</div>

<div class="tab-pane" id="promotionalEmail">
    <?php if (!empty($promotionEmails)): ?><br>
        <table class="table table-bordered table-striped">
          <thead>
            <tbody>
                <?php foreach ($promotionEmails as $promotionEmail): ?>
                    <tr>
                        <td>
                            <?= $this->Html->link(__(h($promotionEmail->title)), ['controller' => 'PromotionEmails', 'action' => 'view', $promotionEmail->id]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <br>
            There is no related promotional email.
            <br><br>
        <?php endif; ?>
    </div>

    <div class="tab-pane" id="product">
    <?php if (!empty($promotion->products)): ?><br>
        <table class="table table-bordered table-striped">
          <thead>
            <tbody>
                <?php foreach ($promotion->products as $product): ?>
                    <tr>
                        <td>
                            <?= $this->Html->link(__(h($product->prod_name)), ['controller' => 'Products', 'action' => 'view', $product->id]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <br>
            There is no related products.
            <br><br>
        <?php endif; ?>
    </div>


</div>
</div>
</div>
</section>

