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
              <h3 class="box-title"><?= __('Feedbacks') ?></h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('customer_first_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('customer_last_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('customer_contact') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('customer_email') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('message') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($feedbacks as $feedback): ?>
                    <tr>
                        <td><?= $this->Number->format($feedback->id) ?></td>
                        <td><?= $feedback->has('customer') ? $this->Html->link($feedback->customer->id, ['controller' => 'Customers', 'action' => 'view', $feedback->customer->id]) : '' ?></td>
                        <td><?= h($feedback->customer_first_name) ?></td>
                        <td><?= h($feedback->customer_last_name) ?></td>
                        <td><?= $this->Number->format($feedback->customer_contact) ?></td>
                        <td><?= h($feedback->customer_email) ?></td>
                        <td><?= h($feedback->message) ?></td>
                        <td><?= h($feedback->status) ?></td>
                        <td><?= $feedback->has('product') ? $this->Html->link($feedback->product->id, ['controller' => 'Products', 'action' => 'view', $feedback->product->id]) : '' ?></td>
                        <td><?= $feedback->has('item') ? $this->Html->link($feedback->item->name, ['controller' => 'Items', 'action' => 'view', $feedback->item->id]) : '' ?></td>
                        <td><?= h($feedback->modified) ?></td>
                        <td><?= h($feedback->created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $feedback->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $feedback->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $feedback->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feedback->id)]) ?>
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
