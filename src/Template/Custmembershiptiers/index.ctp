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
              <h3 class="box-title"><?= __('Customer Membership Tiers') ?></h3>
            </div>
            <div class="box-body">

                <br>
                <!--<legend><h4><?= __('Search') ?></h4></legend>-->
                <table cellpadding="0" cellspacing="0", bgcolor="#FFFFFF">
                    <tr><?php
                        echo $this->Form->create($custMembershipTiers);?>
                        <th width="10"></th>
                        <th scope="col"><?= $this->Form->input(('tier_name'), ['label' => 'Membership Tier Name', 'type' => 'search']); ?></th>
                        <th width="10"></th>
                        <th scope="col"><?= $this->Form->input('validity_period',['label' => 'Validity Period', 'type' => 'search']); ?></th>
                        <th width="30"></th>
                        <th scope="col"><?= $this->Form->input('membership_pts',['label' => 'Membership Pts', 'type' => 'search']); ?></th>
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
                        <th scope="col"><?= $this->Paginator->sort('tier_name') ?></th>
                        <!--<th scope="col"><?= $this->Paginator->sort('validity_period') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('min_spending') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('membership_fee') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('membership_pts') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('redemption_pts') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('discount_rate') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('birthday_rate') ?></th>-->
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($custMembershipTiers as $custMembershipTier): ?>
                    <tr>
                        <td><?= $this->Number->format($custMembershipTier->id) ?></td>
                        <td><?= h($custMembershipTier->tier_name) ?></td>
                        <!--<td><?= $this->Number->format($custMembershipTier->validity_period) ?></td>
                        <td><?= h($custMembershipTier->min_spending) ?></td>
                        <td><?= h($custMembershipTier->membership_fee) ?></td>
                        <td><?= $this->Number->format($custMembershipTier->membership_pts) ?></td>
                        <td><?= $this->Number->format($custMembershipTier->redemption_pts) ?></td>
                        <td><?= h($custMembershipTier->discount_rate) ?></td>
                        <td><?= h($custMembershipTier->birthday_rate) ?></td>-->
                        <td><?= $this->Time->format(h($custMembershipTier->created), 'd MMM YYYY, hh:mm') ?></td>
                        <td><?= $this->Time->format(h($custMembershipTier->modified), 'd MMM YYYY, hh:mm') ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View |'), ['action' => 'view', $custMembershipTier->id]) ?>
                            <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $custMembershipTier->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $custMembershipTier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $custMembershipTier->id)]) ?>
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
