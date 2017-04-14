<?php
$this->assign('title', __('Report') . '/' . __('View'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Incident Report'), ['controller' => 'reports', 'action' => 'index']);
$this->Html->addCrumb(__('View Incident Report'));
?>

<!-- Main content -->
<section class="content" style="min-height: 550px">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= h($report->title) ?></h3>
          </div>
          <div class="box-body">
          <div class="pull-right">
            <a class="btn btn-success btn-block" title="Edit Incident Report Details" href="/IS3102_Final/reports/edit/<?=$report->id?>">Edit Incident Report</a>
          </div>
          <br><br><br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($report->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Title') ?></th>
                    <td><?= h($report->title) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Message') ?></th>
                    <td><?= h($report->message) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Entity') ?></th>
                    <td><?= $this->Html->link(__($report->entity), ['controller' => $report->entity, 'action' => 'view', $report->entityID], ['title' => 'View Entity Details']) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('EntityID') ?></th>
                    <td><?= $this->Html->link(__($report->entityID), ['controller' => $report->entity, 'action' => 'view', $report->entityID], ['title' => 'View Entity Details']) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Status') ?></th>
                    <td><?= h($report->status) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Retailer Employee') ?></th>
                    <td><?= $report->has('retailer_employee') ? $this->Html->link($report->retailer_employee->first_name.' '.$report->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $report->retailer_employee->id], ['View Employee Details']) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= $this->Time->format(h($report->modified), 'd MMM YYYY, HH:mm') ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= $this->Time->format(h($report->created), 'd MMM YYYY, HH:mm') ?></td>
                </tr>
            </table>
        </div>
      </div>
    </div>
  </div>
</section>
