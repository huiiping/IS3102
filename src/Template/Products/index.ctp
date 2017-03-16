<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Element('retailerLeftSideBar'); ?>
<?php
$this->assign('title', __('ProdCats') . '/' . __('Index'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('ProdCats'), ['controller' => 'ProdCats', 'action' => 'index']);
$this->Html->addCrumb(__('Products'));

?>
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
                        echo $this->Form->create($products);?>
                        <th width="10"></th>
                        <th scope="col"><?= $this->Form->input(('search'), ['label' => 'Search']); ?></th>
                        <th width="60"></th>

                        <th scope="col" class="actions"><?= $this->Form->submit(__('Search'), ['class'=>'btn btn-default btn-flat']); ?></th>
                        <th width="10"></th>
                        <?php echo $this->Form->end();?>
                    </tr>
                </table>
                <br>
                <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prod_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('store_unit_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('web_store_unit_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('SKU') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prod_cat_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->id) ?></td>
                <td><?= h($product->prod_name) ?></td>
                <td><?= $this->Number->format($product->store_unit_price) ?></td>
                <td><?= $this->Number->format($product->web_store_unit_price) ?></td>
                <td><?= h($product->SKU) ?></td>
                <td><?= $product->has('prod_cat') ? $this->Html->link($product->prod_cat->cat_name, ['controller' => 'ProdCats', 'action' => 'view', $product->prod_cat->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
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
