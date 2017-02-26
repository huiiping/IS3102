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
              <h3 class="box-title"><?= h($prodType->prod_name) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit Product Type'), ['action' => 'edit', $prodType->id]) ?>
              </div>
            </div>
            <div class="box-body">

                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Product Name') ?></th>
                        <td><?= h($prodType->prod_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Product Description') ?></th>
                        <td><?= $this->Text->autoParagraph(h($prodType->prod_desc)); ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Colour') ?></th>
                        <td><?= h($prodType->colour) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Dimension') ?></th>
                        <td><?= h($prodType->dimension) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('SKU') ?></th>
                        <td><?= h($prodType->SKU) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Product Category') ?></th>
                        <td><?= $prodType->has('prod_cat') ? $this->Html->link($prodType->prod_cat->cat_name, ['controller' => 'ProdCats', 'action' => 'view', $prodType->prod_cat->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Store Unit Price') ?></th>
                        <td><?= $this->Number->format($prodType->store_unit_price) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Web Store Unit Price') ?></th>
                        <td><?= $this->Number->format($prodType->web_store_unit_price) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($prodType->id) ?></td>
                    </tr>
                </table>
                <div class="related">
                    <?php if (!empty($prodType->promotions)): ?>
                    <h4><?= __('Related Promotions') ?></h4>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <!--<th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Start Date') ?></th>
                            <th scope="col"><?= __('End Date') ?></th>
                            <th scope="col"><?= __('Promo Desc') ?></th>
                            <th scope="col"><?= __('First Vouher Num') ?></th>
                            <th scope="col"><?= __('Last Voucher Num') ?></th>
                            <th scope="col"><?= __('Discount Rate') ?></th>
                            <th scope="col"><?= __('Credit Card Type') ?></th>
                            <th scope="col"><?= __('Retailer Employee Id') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>-->
                            <th scope="col"><?= __('Voucher Number') ?></th>
                        </tr>
                        <?php foreach ($prodType->promotions as $promotions): ?>
                        <tr>
                            <!--<td><?= h($promotions->id) ?></td>
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
                                <?= $this->Html->link(__(h($promotions->first_voucher_num).' '.h($promotions->last_voucher_num)), ['controller' => 'Promotions', 'action' => 'view', $promotions->id]) ?>
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
