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
              <h3 class="box-title"><?= h($retailerLogging->action)  ?></h3>
            </div>
            <div class="box-body">

              <table class="vertical-table">
                  <tr>
                      <th scope="row"><?= __('Action') ?></th>
                      <td><?= h($retailerLogging->action) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Entity') ?></th>
                      <td><?= h($retailerLogging->entity) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Entityid') ?></th>
                      <td><?= $this->Number->format($retailerLogging->entityid) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Retailer Employee') ?></th>
                      <td><?= $retailerLogging->has('retailer_employee') ? $this->Html->link($retailerLogging->retailer_employee->first_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $retailerLogging->retailer_employee->id]) : '' ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Id') ?></th>
                      <td><?= $this->Number->format($retailerLogging->id) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Created') ?></th>
                      <td><?= $this->Time->format(h($retailerLogging->created), 'd MMM YYYY, hh:mm') ?></td>
                  </tr>
              </table>
          </div>
        </div>
      </div>
  </section>
</div>
