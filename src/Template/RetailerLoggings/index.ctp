<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?php if($intrasys) : ?>
  <?= $this->Element('intrasysLeftSideBar'); ?>
<?php else : ?>
  <?= $this->Element('retailerLeftSideBar'); ?>
<?php endif; ?>

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
              <h3 class="box-title"><?= ucfirst(h($this->request->session()->read('retailer'))).'\'s System Log' ?></h3>
            </div>
            <div class="box-body">

            <br>
                <!--<legend><h4><?= __('Search') ?></h4></legend>-->
                <table cellpadding="0" cellspacing="0", bgcolor="#FFFFFF">
                    <tr><?php
                        echo $this->Form->create($retailerLoggings);?>
                        <th width="10"></th>
                        <th scope="col"><?= $this->Form->input(('retailer_employee_id'), ['label' => 'Retailer Employee Name', 'type' => 'search']); ?></th>
                        <th width="60"></th>
                        <th scope="col"><?= $this->Form->input(('entity'), ['label' => 'Entity / Controller', 'type' => 'search']); ?></th>
                        <th width="30"></th>
                        <th scope="col" class="actions"><?= $this->Form->submit(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?></th>
                        <th width="10"></th>
                        <?php echo $this->Form->end();?>
                    </tr>
                </table>
                <br >
                <a class="btn btn-default btn-flat" href="/IS3102_Final/intrasys-loggings/export.csv">Export All Logs</a>
                <br><br >

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
                        <!--<th scope="col"><?= $this->Paginator->sort('entityid', array(
                            'label' => 'Entity ID')
                          ) ?></th>-->
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
                        <td><?= ucfirst(h($retailerLogging->action)) ?></td>
                        <td><?= h($retailerLogging->entity) ?>
                          (<?= $this->Number->format($retailerLogging->entityid) ?>)
                        </td>
                        <!--<td><?= $this->Number->format($retailerLogging->entityid) ?></td>-->
                        <td><?= $retailerLogging->has('retailer_employee') ? $this->Html->link($retailerLogging->retailer_employee->first_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $retailerLogging->retailer_employee->id]) : '' ?></td>
                        <td><?= $this->Time->format(h($retailerLogging->created), 'd MMM YYYY, hh:mm') ?></td>
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
