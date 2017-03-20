<?php
$this->assign('title', __('Customer Membership Tiers') . '/' . __('Index'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Customer Membership Tiers'));
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Customer Membership Tiers') ?></h3>
        </div>
        <div class="box-body">
            <div class="pull-right">
                <a class="btn btn-default btn-block" title="Create New Customer Membership Tier" href="/IS3102_Final/cust-membership-tiers/add" >Create New Customer Membership Tier</a>
            </div>
            <br>
            <!--<legend><h4><?= __('Search') ?></h4></legend>-->
            <form method="post" accept-charset="utf-8" action="/IS3102_Final/cust-membership-tiers">
              <table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                <tr>
                  <th width="10"></th>
                  <th scope="col">
                    <div class ="form-group">
                      <div class="input-group">
                        <label for="search"></label>&nbsp&nbsp&nbsp
                        <input class = "form-control" type="text" name="search" id="search" placeholder="Search">
                      </div>
                    </div>
                  </th>
                  <th width="30"></th>
                  <th scope="col" class ="form-group">
                    <div class ="submit">
                      <input class = "form-control" type="submit" class="btn btn-default bth-flat" value="Search">
                    </div>
                  </th>
                </tr>
              </table>
            </form>
            <!--<table cellpadding="0" cellspacing="0", bgcolor="#FFFFFF">
                <tr><?php
                    echo $this->Form->create($custMembershipTiers);?>
                    <th width="10"></th>
                    <th scope="col"><?= $this->Form->input(('search'), ['label' => 'Membership Tier Name', 'type' => 'search']); ?></th>
                    <th width="10"></th>


                    <th scope="col" class="actions"><?= $this->Form->submit(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?></th>
                    <th width="10"></th>
                    <?php echo $this->Form->end();?>
                </tr>
            </table>-->
            <br>

          <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <!--<th scope="col"><?= $this->Paginator->sort('id') ?></th>-->
                    <th scope="col"><?= $this->Paginator->sort('tier_name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('validity_period') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('min_spending') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('membership_fee') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('membership_pts') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('redemption_pts') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('discount_rate') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('birthday_rate') ?></th>
                    <!--<th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>-->
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($custMembershipTiers as $custMembershipTier): ?>
                <tr>
                    <!--<td><?= $this->Number->format($custMembershipTier->id) ?></td>-->
                    <td>
                        <?= $this->Html->link(__($custMembershipTier->tier_name), ['action' => 'view', $custMembershipTier->id], ['title' => 'View Customer Membership Tier Details']) ?>
                    </td>
                    <td><?= $this->Number->format($custMembershipTier->validity_period) ?></td>
                    <td><?= h($custMembershipTier->min_spending) ?></td>
                    <td><?= h($custMembershipTier->membership_fee) ?></td>
                    <td><?= $this->Number->format($custMembershipTier->membership_pts) ?></td>
                    <td><?= $this->Number->format($custMembershipTier->redemption_pts) ?></td>
                    <td><?= h($custMembershipTier->discount_rate) ?></td>
                    <td><?= h($custMembershipTier->birthday_rate) ?></td>
                    <td>
                        <a href="/IS3102_Final/cust-membership-tiers/edit/<?=$custMembershipTier->id?>">
                          <i class="fa fa-edit" title="Edit Customer Membership Tier Details"></i></a>&nbsp
                        <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Customer Membership Tier')), array('action' => 'delete', $custMembershipTier->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $custMembershipTier->id))) ?>
                    </td>
                    <!--<td><?= $this->Time->format(h($custMembershipTier->created), 'd MMM YYYY, hh:mm') ?></td>
                    <td><?= $this->Time->format(h($custMembershipTier->modified), 'd MMM YYYY, hh:mm') ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View |'), ['action' => 'view', $custMembershipTier->id]) ?>
                        <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $custMembershipTier->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $custMembershipTier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $custMembershipTier->id)]) ?>
                    </td>-->
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
