<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Element('intrasyssLeftSideBar'); ?>

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
              <h3 class="box-title"><?= h($intrasysLogging->action) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit '), ['action' => 'edit', $intrasysLogging->id]) ?>
              </div>
            </div>
            <div class="box-body">
            
                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Retailer') ?></th>
                        <td><?= $intrasysLogging->has('retailer') ? $this->Html->link($intrasysLogging->retailer->id, ['controller' => 'Retailers', 'action' => 'view', $intrasysLogging->retailer->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Action') ?></th>
                        <td><?= h($intrasysLogging->action) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Entity') ?></th>
                        <td><?= h($intrasysLogging->entity) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($intrasysLogging->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Entityid') ?></th>
                        <td><?= $this->Number->format($intrasysLogging->entityid) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Employeeid') ?></th>
                        <td><?= $this->Number->format($intrasysLogging->employeeid) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= $this->Time->format(h($intrasysLogging->created), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                </table>
            </div>
        </div>
      </div>
  </section>
</div>
