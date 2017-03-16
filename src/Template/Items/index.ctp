<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('Items') . '/' . __('Index'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('ProdCats'), ['controller' => 'ProdCats', 'action' => 'index']);
$this->Html->addCrumb(__('Products'), ['controller' => 'Products', 'action' => 'index']);
$this->Html->addCrumb(__('Items'));
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
              <h3 class="box-title"><?= __('Items') ?></h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('EPC') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('report_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= $this->Number->format($item->id) ?></td>
                        <td><?= h($item->name) ?></td>
                        <td><?= h($item->description) ?></td>
                        <td><?= h($item->EPC) ?></td>
                        <td><?= h($item->status) ?></td>
                        <td><?= $this->Number->format($item->report_id) ?></td>
                        <td><?= $item->has('product') ? $this->Html->link($item->product->id, ['controller' => 'Products', 'action' => 'view', $item->product->id]) : '' ?></td>
                        <td><?= $item->has('location') ? $this->Html->link($item->location->name, ['controller' => 'Locations', 'action' => 'view', $item->location->id]) : '' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>
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
