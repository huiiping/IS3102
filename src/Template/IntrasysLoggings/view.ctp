<?php
$this->assign('title', __('Intrasys Loggings') .'/'. 'View');
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Intrasys Loggings'), ['controller' => 'IntrasysLoggings', 'action' => 'index']);
$this->Html->addCrumb(__('View Intrasys Logging'));
?>

<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= ucfirst(h($intrasysLogging->action)) ?></h3>
          </div>
          <div class="box-body">
              <br>
              <table class="table table-bordered table-striped">
                  <tr>
                      <th scope="row"><?= __('Id') ?></th>
                      <td><?= $this->Number->format($intrasysLogging->id) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Action') ?></th>
                      <td><?= ucfirst(h($intrasysLogging->action)) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Entity') ?></th>
                      <td><?= h($intrasysLogging->entity) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Entityid') ?></th>
                      <td><?= $this->Number->format($intrasysLogging->entityid) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Retailer') ?></th>
                      <td><?= $intrasysLogging->has('retailer') ? $this->Html->link($intrasysLogging->retailer->retailer_name, ['controller' => 'Retailers', 'action' => 'view', $intrasysLogging->retailer->id]) : '' ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Employee Id') ?></th>
                      <td><?= $this->Number->format($intrasysLogging->employeeid) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Created') ?></th>
                      <td><?= $this->Time->format(h($intrasysLogging->created), 'd MMM YYYY, HH:mm') ?></td>
                  </tr>
              </table>
              <br>
          </div>
      </div>
    </div>
</section>
