<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('Intrasys') );
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Retailer Account Types'), ['controller' => 'RetailerAccTypes', 'action' => 'index']);

?>
<?= $this->Element('intrasysLeftSideBar'); ?>

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
              <h3 class="box-title"><?= __('Retailer Account Types') ?></h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <!--<th scope="col"><?= $this->Paginator->sort('num_of_users') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('num_of_warehouses') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('num_of_stores') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('num_of_products') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>-->
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($retailerAccTypes as $retailerAccType): ?>
                    <tr>
                        <td><?= $this->Number->format($retailerAccType->id) ?></td>
                        <td><?= h($retailerAccType->name) ?></td>
                        <!--<td><?= $this->Number->format($retailerAccType->num_of_users) ?></td>
                        <td><?= $this->Number->format($retailerAccType->num_of_warehouses) ?></td>
                        <td><?= $this->Number->format($retailerAccType->num_of_stores) ?></td>
                        <td><?= $this->Number->format($retailerAccType->num_of_products) ?></td>
                        <td><?= h($retailerAccType->created) ?></td>
                        <td><?= h($retailerAccType->modified) ?></td>-->
                        <td class="actions">
                            <?= $this->Html->link(__('View |'), ['action' => 'view', $retailerAccType->id]) ?>
                            <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $retailerAccType->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $retailerAccType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerAccType->id)]) ?>
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