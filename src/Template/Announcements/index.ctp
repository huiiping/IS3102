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
              <h3 class="box-title"><?= __('System Announcements') ?></h3>
            </div>
            <div class="box-body">
              <br>
              <table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                  <tr>
                    <?php echo $this->Form->create(null);?>
                      <th width="10"></th>
                      <th scope="col"><?= $this->Form->input('title'); ?></th>
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
                        <th scope="col"><?= $this->Paginator->sort(('id'), ['label' => 'ID']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                        <!--<th scope="col"><?= $this->Paginator->sort('message') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('remarks') ?></th>-->
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($announcements as $announcement): ?>
                    <tr>
                        <td><?= $this->Number->format($announcement->id) ?></td>
                        <td><?= h($announcement->title) ?></td>
                        <!--<td><?= h($announcement->message) ?></td>
                        <td><?= h($announcement->remarks) ?></td>-->
                        <td><?= $this->Time->format(h($announcement->created), 'd MMM YYYY, hh:mm') ?></td>
                        <td><?= $this->Time->format(h($announcement->modified), 'd MMM YYYY, hh:mm') ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View | '), ['action' => 'view', $announcement->id]) ?>
                            <?= $this->Html->link(__('Edit | '), ['action' => 'edit', $announcement->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $announcement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcement->id)]) ?>
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


