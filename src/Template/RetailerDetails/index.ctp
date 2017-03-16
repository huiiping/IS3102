<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('Retailer') . '/' . __('RetailerDetails'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Retailer Details'));
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
              <h3 class="box-title"><?= __('Retailer Details') ?></h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort(('retailerid'), ['label' => 'Retailer Id']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('retailer_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('retailer_email') ?></th>
                        <!--<th scope="col"><?= $this->Paginator->sort('address') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('contact') ?></th>-->
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($retailerDetails as $retailerDetail): ?>
                    <tr>
                        <td><?= $this->Number->format($retailerDetail->retailerid) ?></td>
                        <td><?= h($retailerDetail->retailer_name) ?></td>
                        <td><?= h($retailerDetail->retailer_email) ?></td>
                        <!--<td><?= h($retailerDetail->address) ?></td>
                        <td><?= h($retailerDetail->contact) ?></td>-->
                        <td class="actions">
                            <?= $this->Html->link(__('View | '), ['action' => 'view', $retailerDetail->retailerid]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $retailerDetail->retailerid]) ?>
                            <!--<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $retailerDetail->retailerid], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerDetail->retailerid)]) ?>-->
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
