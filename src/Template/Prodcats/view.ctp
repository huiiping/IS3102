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
              <h3 class="box-title"><?= h($prodCat->cat_name) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit Product Category'), ['action' => 'edit', $prodCat->id]) ?>
              </div>
            </div>
            <div class="box-body">

                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Product Category Name') ?></th>
                        <td><?= h($prodCat->cat_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Product Category Description') ?></th>
                        <td>
                            <?= $this->Text->autoParagraph(h($prodCat->cat_desc)); ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($prodCat->id) ?></td>
                    </tr>
                </table>
                <div class="related">
                    <?php if (!empty($prodCat->prod_types)): ?>
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
                        <?php foreach ($prodCat->prod_types as $prodTypes): ?>
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
