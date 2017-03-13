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
              <h3 class="box-title"><?= h($prodSpecification->title) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit Product Specification'), ['action' => 'edit', $prodSpecification->title]) ?>
              </div>
            </div>
            <div class="box-body">
                <h3><?= h($prodSpecification->title) ?></h3>
                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Title') ?></th>
                        <td><?= h($prodSpecification->title) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Description') ?></th>
                        <td><?= h($prodSpecification->description) ?></td>
                    </tr>
                </table>
                <div class="related">
                    <h4><?= __('Related Products') ?></h4>
                    <?php if (!empty($prodSpecification->products)): ?>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Prod Name') ?></th>
                            <th scope="col"><?= __('Prod Desc') ?></th>
                            <th scope="col"><?= __('Store Unit Price') ?></th>
                            <th scope="col"><?= __('Web Store Unit Price') ?></th>
                            <th scope="col"><?= __('SKU') ?></th>
                            <th scope="col"><?= __('Prod Cat Id') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($prodSpecification->products as $products): ?>
                        <tr>
                            <td><?= h($products->id) ?></td>
                            <td><?= h($products->prod_name) ?></td>
                            <td><?= h($products->prod_desc) ?></td>
                            <td><?= h($products->store_unit_price) ?></td>
                            <td><?= h($products->web_store_unit_price) ?></td>
                            <td><?= h($products->SKU) ?></td>
                            <td><?= h($products->prod_cat_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
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
