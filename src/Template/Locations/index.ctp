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
              <h3 class="box-title"><?= __('Search Locations') ?></h3>
            </div>
            <div class="box-body">

                <br>
                <!--<h3><?= __('Search') ?></h3>-->
                <table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                    <tr><?php
                        echo $this->Form->create(null);?>
                        <th width="10"></th>
                        <th scope="col"><?= $this->Form->input('name'); ?></th>
                        <th width="30"></th>
                        <th scope="col"><?= $this->Form->input('address'); ?></th>
                        <th width="30"></th>
                        <th scope="col"><?= $this->Form->input('contact'); ?></th>
                        <th width="30"></th>
                        <th scope="col"><?= $this->Form->input('type'); ?></th>
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
                            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                            <!--<th scope="col"><?= $this->Paginator->sort('address') ?></th>-->
                            <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                            <!--<th scope="col"><?= $this->Paginator->sort('type') ?></th>-->
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($locations as $location): ?>
                        <tr>
                            <td><?= $this->Number->format($location->id) ?></td>
                            <td><?= h($location->name) ?></td>
                            <!--<td><?= h($location->address) ?></td>-->
                            <td><?= h($location->contact) ?></td>
                            <!--<td><?= h($location->type) ?></td>-->
                            <td class="actions">
                                <?= $this->Html->link(__('View |'), ['action' => 'view', $location->id]) ?>
                                <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $location->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]) ?>
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
