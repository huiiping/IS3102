<?php
/**
  * @var \App\View\AppView $this
  */
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
                        <th scope="col"><?= $this->Paginator->sort(('id'), ['label' => 'ID']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <!--<th scope="col"><?= $this->Paginator->sort('num_of_users') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('num_of_warehouses') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('num_of_stores') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('num_of_prod_types') ?></th>-->
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
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
                        <td><?= $this->Number->format($retailerAccType->num_of_prod_types) ?></td>-->
                        <td><?= $this->Time->format(h($retailerAccType->created), 'd MMM YYYY, hh:mm') ?></td>
                        <td><?= $this->Time->format(h($retailerAccType->modified), 'd MMM YYYY, hh:mm') ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View | '), ['action' => 'view', $retailerAccType->id]) ?>
                            <?= $this->Html->link(__('Edit | '), ['action' => 'edit', $retailerAccType->id]) ?>
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

