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
              <h3 class="box-title"><?= __('Retailer Loyalty Points') ?></h3>
            </div>
            <div class="box-body">

                <br>
                <!--<legend><h4><?= __('Search') ?></h4></legend>-->
                <table cellpadding="0" cellspacing="0", bgcolor="#FFFFFF">
                    <tr><?php
                        echo $this->Form->create($retailerLoyaltyPoints);?>
                        <th width="10"></th>
                        <th scope="col"><?= $this->Form->input(('retailer_name'), ['label' => 'Retailer Name', 'type' => 'search']); ?></th>
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
                        <th scope="col"><?= $this->Paginator->sort('retailer_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('loyalty_pts') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('redemption_pts') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($retailerLoyaltyPoints as $retailerLoyaltyPoint): ?>
                    <tr>
                        <td><?= $this->Number->format($retailerLoyaltyPoint->id) ?></td>
                        <td><?= $retailerLoyaltyPoint->has('retailer') ? $this->Html->link($retailerLoyaltyPoint->retailer->retailer_name, ['controller' => 'Retailers', 'action' => 'view', $retailerLoyaltyPoint->retailer->id]) : '' ?></td>
                        <td><?= $this->Number->format($retailerLoyaltyPoint->loyalty_pts) ?></td>
                        <td><?= $this->Number->format($retailerLoyaltyPoint->redemption_pts) ?></td>
                        <td><?= $this->Time->format(h($retailerLoyaltyPoint->created), 'd MMM YYYY, hh:mm') ?></td>
                        <td><?= $this->Time->format(h($retailerLoyaltyPoint->modified), 'd MMM YYYY, hh:mm') ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View |'), ['action' => 'view', $retailerLoyaltyPoint->id]) ?>
                            <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $retailerLoyaltyPoint->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $retailerLoyaltyPoint->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerLoyaltyPoint->id)]) ?>
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
