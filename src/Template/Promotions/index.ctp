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
              <h3 class="box-title"><?= __('Promotions') ?></h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort(('first_voucher_num'), ['label' => 'First Voucher Number']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort(('last_voucher_num'), ['label' => 'First Voucher Number']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                        <!--<th scope="col"><?= $this->Paginator->sort('discount_rate') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('credit_card_type') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>-->
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($promotions as $promotion): ?>
                    <tr>
                        <td><?= $this->Number->format($promotion->id) ?></td>
                        <td><?= h($promotion->first_voucher_num) ?></td>
                        <td><?= h($promotion->last_voucher_num) ?></td>
                        <td><?= $this->Time->format(h($promotion->start_date), 'd MMM YYYY, hh:mm') ?></td>
                        <td><?= $this->Time->format(h($promotion->end_date), 'd MMM YYYY, hh:mm') ?></td>
                        <!--<td><?= $this->Number->format($promotion->discount_rate) ?></td>
                        <td><?= h($promotion->credit_card_type) ?></td>
                        <td><?= $promotion->has('retailer_employee') ? $this->Html->link($promotion->retailer_employee->id, ['controller' => 'RetailerEmployees', 'action' => 'view', $promotion->retailer_employee->id]) : '' ?></td>-->
                        <td class="actions">
                            <?= $this->Html->link(__('View |'), ['action' => 'view', $promotion->id]) ?>
                            <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $promotion->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $promotion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotion->id)]) ?>
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
