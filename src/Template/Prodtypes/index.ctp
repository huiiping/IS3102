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
              <h3 class="box-title"><?= __('Search Product Types') ?></h3>
            </div>
            <div class="box-body">
              
              <br>
                <!--<h3><?= __('Search') ?></h3>-->
                <table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                    <tr><?php
                        echo $this->Form->create(null);?>
                        <th width="10"></th>
                        <th scope="col"><?= $this->Form->input(('prod_name'), ['label' => 'Product Name']); ?></th>
                        <th width="60"></th>
                        <th scope="col"><?= $this->Form->input(('prod_desc'), ['label' => 'Product Description']); ?></th>
                        <th width="60"></th>
                        <th scope="col"><?= $this->Form->input('colour'); ?></th>
                        <th width="30"></th>
                        <th scope="col"></th>
                        <th width="10"></th>
                    </tr>
                    <tr>
                        <th width="10"></th>
                        <th scope="col"><?= $this->Form->input('SKU'); ?></th>
                        <th width="60"></th>
                        <th scope="col"><?= $this->Form->input('store_unit_price'); ?></th>
                        <th width="60"></th>
                        <th scope="col"><?= $this->Form->input('web_store_unit_price'); ?></th>
                        <th width="30"></th>
                        <th scope="col" class="actions"><?= $this->Form->submit(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?></th>
                        <th width="10"></th>
                        <?php echo $this->Form->end();?>
                    </tr>
                </table>
                <br>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort(('prod_name'),['label' => 'Product Name']) ?></th>
                            <!--<th scope="col"><?= $this->Paginator->sort('colour') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('dimension') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('store_unit_price') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('web_store_unit_price') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('SKU') ?></th>-->
                            <th scope="col"><?= $this->Paginator->sort(('prod_cat_id'), ['label' => 'Product Category']) ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($prodTypes as $prodType): ?>
                        <tr>
                            <td><?= $this->Number->format($prodType->id) ?></td>
                            <td><?= h($prodType->prod_name) ?></td>
                            <!--<td><?= h($prodType->colour) ?></td>
                            <td><?= h($prodType->dimension) ?></td>
                            <td><?= $this->Number->format($prodType->store_unit_price) ?></td>
                            <td><?= $this->Number->format($prodType->web_store_unit_price) ?></td>
                            <td><?= h($prodType->SKU) ?></td>-->
                            <td><?= $prodType->has('prod_cat') ? $this->Html->link($prodType->prod_cat->cat_name, ['controller' => 'ProdCats', 'action' => 'view', $prodType->prod_cat->id]) : '' ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View |'), ['action' => 'view', $prodType->id]) ?>
                                <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $prodType->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $prodType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prodType->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                    </ul>
                    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                </div>
            </div> 
          </div>
        </div>
      </div>
  </section>
</div>
