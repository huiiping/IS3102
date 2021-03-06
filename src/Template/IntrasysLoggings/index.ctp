<?php
$this->assign('title', __('Intrasys Loggings') );
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Loggings'));
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('System Log') ?></h3>
        </div>
        <div class="box-body">
            <div class="pull-right">
                <a class="btn btn-default btn-flat" href="/IS3102_Final/intrasys-loggings/export.csv">Export All Logs</a>
                <!--<?php echo '<h3>'; ?>
                    <?= $this->Html->link('Export All Logs', [
                      'controller' => 'intrasysLoggings', 
                      'action' => 'export',
                      '_ext' => 'csv'
                    ]) ?>
                <?php echo '</h3>';    ?>-->
            </div>
            <form method="post" accept-charset="utf-8" action="/IS3102_Final/intrasys-loggings">
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
                        'label' => 'Log ID')) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('action') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('entity', array(
                        'label' => 'Entity / Controller')) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('entityid', array(
                        'label' => 'Entity ID')) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('employeeid', array(
                        'label' => 'Employee ID')) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('retailer_id', array(
                        'label' => 'Retailer Name')) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <!--<th scope="col" class="actions"><?= __('Actions') ?></th>-->
                </tr>
            </thead>                
            <tbody>
                <?php foreach ($intrasysLoggings as $intrasysLogging): ?>
                <tr>
                    <td><?= $this->Number->format($intrasysLogging->id) ?></td>
                    <td><?= $this->Html->link(__(ucfirst($intrasysLogging->action)), ['action' => 'view', $intrasysLogging->id], ['title' => 'View Log Details']) ?></td>
                    <td><?= h($intrasysLogging->entity) ?></td>
                    <td><?= $this->Number->format($intrasysLogging->entityid) ?></td>
                    <td><?= $this->Number->format($intrasysLogging->employeeid) ?></td>
                    <td><?= $intrasysLogging->has('retailer') ? $this->Html->link($intrasysLogging->retailer->retailer_name, ['controller' => 'Retailers', 'action' => 'view', $intrasysLogging->retailer->id], ['title' => 'View Retailer Details']) : '' ?></td>
                    <td><?= $this->Time->format(h($intrasysLogging->created), 'd MMM YYYY, HH:mm') ?></td>
                    <!--<td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $intrasysLogging->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $intrasysLogging->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $intrasysLogging->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysLogging->id)]) ?>
                    </td>-->
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
