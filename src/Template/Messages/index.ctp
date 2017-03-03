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
  <!-- Inbox Messages -->
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Chats') ?></h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <?php if(isset($employees)) : ?>
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                      <?php foreach ($employees as $employee): ?>
                      <tr>
                          <td><?= h($employee->first_name) ?></td>
                          <td><?= h($employee->last_name) ?></td>
                          <td class="actions">
                            <?= $this->Html->link(__('Chat'), ['action' => 'chat', $employee->id]) ?>
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
                <?php else : ?>
                    <h3>You do not have any current chats</h3>
                <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>


