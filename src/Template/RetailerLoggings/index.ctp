<?php
$this->assign('title', __('Retailer Loggings') . '/' . __('Index'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Retailer Loggings'));
?>

<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= ucfirst(h($this->request->session()->read('retailer'))).'\'s System Log' ?></h3>
          </div>
          <div class="box-body">
            <div class="pull-right">
              <a class="btn btn-default btn-flat" href="/IS3102_Final/retailer-loggings/export.csv">Export All Logs</a>
            </div>
              <form method="post" accept-charset="utf-8" action="/IS3102_Final/retailer-loggings">
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
                      <th scope="col"><?= $this->Paginator->sort('id', array(
                          'label' => 'Log ID')
                        ) ?></th>
                      <th scope="col"><?= $this->Paginator->sort('action') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('entity', array(
                          'label' => 'Entity (ID)')
                        ) ?></th>
                      <th scope="col"><?= $this->Paginator->sort('entityid', array(
                          'label' => 'Entity ID')
                        ) ?></th>
                      <th scope="col"><?= $this->Paginator->sort('retailer_employee_id', array(
                          'label' => 'Employee ID')
                        ) ?></th>
                      <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($retailerLoggings as $retailerLogging): ?>
                  <tr>
                      <td><?= $this->Number->format($retailerLogging->id) ?></td>
                      <td><?= $this->Html->link(__(ucfirst($retailerLogging->action)), ['action' => 'view', $retailerLogging->id]) ?></td>
                      <td><?= h($retailerLogging->entity) ?>
                        (<?= $this->Number->format($retailerLogging->entityid) ?>)
                      </td>
                      <td><?= $this->Number->format($retailerLogging->entityid) ?></td>
                      <td><?= $retailerLogging->has('retailer_employee') ? $this->Html->link($retailerLogging->retailer_employee->first_name.' '.$retailerLogging->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $retailerLogging->retailer_employee->id]) : '' ?></td>
                      <td><?= $this->Time->format(h($retailerLogging->created), 'd MMM YYYY, HH:mm') ?></td>
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
