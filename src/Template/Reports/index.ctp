<?php
$this->assign('title', __('Reports') . '/' . __('Index'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Incident Reports'));
?>

<!-- Main content -->
<section class="content" style="min-height: 550px">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= __('Incident Reports') ?></h3>
          </div>
          <div class="box-body">
          <div class="pull-right">
            <a class="btn btn-success btn-block" title="Create New Incident Report" href="/IS3102_Final/reports/add" >Create New Incident Report</a>
          </div>
            <!--<legend><h4><?= __('Search') ?></h4></legend>-->
            <form method="post" accept-charset="utf-8" action="/IS3102_Final/reports">
              <table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                <tr>
                  <th width="10"></th>
                  <th scope="col">
                    <div class ="form-group">
                      <div class="input-group">
                        <label for="search"></label>&nbsp&nbsp&nbsp
                        <input class = "form-control" type="text" name="search" id="search" placeholder="Search">
                      </div>
                    </div>
                  </th>
                  <th width="30"></th>
                  <th scope="col" class ="form-group">
                    <div class ="submit">
                      <input class = "form-control" type="submit" class="btn btn-default bth-flat" value="Search">
                    </div>
                  </th>
                </tr>
              </table>
            </form>
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('message') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('entity') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('entityID') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reports as $report): ?>
                    <tr>
                        <td><?= $this->Number->format($report->id) ?></td>
                        <td>
                            <?= $this->Html->link(__($report->title), ['action' => 'view', $report->id], ['title' => 'View Incident Report Details']) ?></td>
                        <td><?= h($report->message) ?></td>
                        <td><?= h($report->entity) ?></td>
                        <td><?= $this->Number->format($report->entityID) ?></td>
                        <td>
                            <?php if($report->status == 'Pending') { ?>
                                <div class="btn-group">
                                  <button type="button" style="width: 100px;" class="btn btn-warning btn-flat"><?= h($report->status) ?></button>
                                  <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                  </button>

                                  <ul class="dropdown-menu" role="menu">
                                    <li><a title="Resolved" href="/IS3102_Final/reports/resolvedStatus/<?= $report->id ?>">Resolved</a></li>
                                  </ul>
                                </div>
                            <?php } else{ ?>
                                <div class="btn-group">
                                  <button type="button" style="width: 100px;" class="btn btn-success btn-flat"><?= h($report->status) ?></button>
                                  <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                  </button>

                                  <ul class="dropdown-menu" role="menu">
                                    <li><a title="Pending" href="/IS3102_Final/reports/pendingStatus/<?= $report->id ?>">Pending</a></li>
                                  </ul>
                                </div>
                            <?php } ?>
                        </td>
                        <td><?= $report->has('retailer_employee') ? $this->Html->link($report->retailer_employee->first_name.' '.$report->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $report->retailer_employee->id], ['View Employee Details']) : '' ?></td>
                        <td class="actions">
                            <a href="/IS3102_Final/reports/edit/<?=$report->id?>">
                            <i class="fa fa-edit" title="Edit Incident Report Details"></i></a>&nbsp
                            <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Incident Report')), array('action' => 'delete', $report->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $report->id))) ?>
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
