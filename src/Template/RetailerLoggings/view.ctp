<?php
$this->assign('title', __('Retailer Loggings') . '/' . __('Index'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Loggings'), ['controller' => 'RetailerLoggings', 'action' => 'index']);
$this->Html->addCrumb(__('View Log'));
?>

<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= ucfirst(h($retailerLogging->action))  ?></h3>
          </div>
          <div class="box-body">

            <table class="table table-bordered table-striped">
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($retailerLogging->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Action') ?></th>
                    <td><?= ucfirst(h($retailerLogging->action)) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Entity') ?></th>
                    <td><?= h($retailerLogging->entity) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Entity Id') ?></th>
                    <td><?= $this->Number->format($retailerLogging->entityid) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Retailer Employee') ?></th>
                    <td><?= $retailerLogging->has('retailer_employee') ? $this->Html->link($retailerLogging->retailer_employee->first_name.' '.$retailerLogging->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $retailerLogging->retailer_employee->id], ['title' => 'View Employee Details']) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= $this->Time->format(h($retailerLogging->created), 'd MMM YYYY, HH:mm') ?></td>
                </tr>
            </table>
        </div>
      </div>
    </div>
</section>
