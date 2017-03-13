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
              <h3 class="box-title"><?= __('Search Promotion Email') ?></h3>
            </div>
            <div class="box-body">
              
              <br>
                <table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                    <tr><?php
                        echo $this->Form->create($promotionEmails);?>
                        <th width="10"></th>
                        <th scope="col"><?= $this->Form->input('title') ?></th>
                        <th width="30"></th>
                        <th scope="col" class="actions"><?= $this->Form->submit(__('Search'), ['class'=>'btn btn-default btn-flat']); ?></th>
                        <th width="10"></th>
                        <?php echo $this->Form->end();?>
                    </tr>
                </table>
                <br>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('promotion_id') ?></th>
                            <!--<th scope="col"><?= $this->Paginator->sort('body') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('last_sent') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('number_of_sends') ?></th>-->
                            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($promotionEmails as $promotionEmail): ?>
                        <tr>
                            <td><?= $this->Number->format($promotionEmail->id) ?></td>
                            <td><?= h($promotionEmail->title) ?></td>
                            <td><?= $promotionEmail->has('promotion') ? $this->Html->link($promotionEmail->promotion->id, ['controller' => 'Promotions', 'action' => 'view', $promotionEmail->promotion->id]) : '' ?></td>
                            <!--<td><?= h($promotionEmail->body) ?></td>
                            <td><?= h($promotionEmail->last_sent) ?></td>
                            <td><?= $this->Number->format($promotionEmail->number_of_sends) ?></td>-->
                            <td><?= $this->Time->format(h($promotionEmail->created), 'd MMM YYYY, hh:mm') ?></td>
                            <td><?= $this->Time->format(h($promotionEmail->modified), 'd MMM YYYY, hh:mm') ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View |'), ['action' => 'view', $promotionEmail->id]) ?>
                                <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $promotionEmail->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $promotionEmail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotionEmail->id)]) ?>
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
