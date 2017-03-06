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

                <br>
                <!--<legend><h4><?= __('Search') ?></h4></legend>-->
                <table cellpadding="0" cellspacing="0", bgcolor="#FFFFFF">
                    <tr><?php
                        echo $this->Form->create($promotions);?>
                        <th width="10"></th>
                        <!--<th scope="col"><?= $this->Form->input(('cust_membership_tier_id'), ['label' => 'Customer Membership Tier ID', 'type' => 'search']); ?></th>
                        <th width="30"></th>-->
                        <!--<th scope="col"><?= $this->Form->input(('start_date'), ['label' => 'Start Date', 'type' => 'search']); ?></th>
                        <th width="30"></th>
                        <th scope="col"><?= $this->Form->input(('end_date'), ['label' => 'End Date', 'type' => 'search']); ?></th>-->
                        <!--<th width="30"></th>-->
                        <th scope="col"><?= $this->Form->input(('retailer_employee_id') ,['label' => 'Retailer Employee Name', 'type' => 'search']); ?></th>
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
                        <th scope="col"><?= $this->Paginator->sort(('promo_desc'), ['label' => 'Description']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort(('retailer_employee_id'), ['label' => 'Created By']) ?></th>
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
                        <td><?= h($promotion->promo_desc) ?></td>
                        <td><?= $promotion->has('retailer_employee') ? $this->Html->link($promotion->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $promotion->retailer_employee->id]) : '' ?></td>
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
