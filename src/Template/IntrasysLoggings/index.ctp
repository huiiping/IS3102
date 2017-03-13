<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Element('intrasysLeftSideBar'); ?>

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
              <h3 class="box-title"><?= __('Intrasys Loggings') ?></h3>
            </div>
            <div class="box-body">

                <br>
                <!--<legend><h4><?= __('Search') ?></h4></legend>-->
                <table cellpadding="0" cellspacing="0", bgcolor="#FFFFFF">
                    <tr><?php
                        echo $this->Form->create($intrasysLoggings);?>
                        <th width="10"></th>
                        <th scope="col"><?= $this->Form->input(('search'), ['label' => 'Retailer Name', 'type' => 'search']); ?></th>
                        <th width="60"></th>

                        <th scope="col" class="actions"><?= $this->Form->submit(__('Search'), ['class'=>'btn btn-default btn-flat']); ?></th>
                        <th width="10"></th>
                        <?php echo $this->Form->end();?>
                    </tr>
                </table>
                <?php echo '<h3>'; ?>
                    <?= $this->Html->link('Export All Logs', [
                      'controller' => 'intrasysLoggings', 
                      'action' => 'export',
                      '_ext' => 'csv'
                    ]) ?>
                <?php echo '</h3>';    ?>
                <br>

              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id', array(
                            'label' => 'Log ID')) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('retailer_id', array(
                            'label' => 'Retailer Name')) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('action') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('entity', array(
                            'label' => 'Entity / Controller')) ?></th>
                        <!--<th scope="col"><?= $this->Paginator->sort('entityid', array(
                            'label' => 'Entity ID')) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('employeeid', array(
                            'label' => 'Employee ID')) ?></th>-->
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>                
                <tbody>
                    <?php foreach ($intrasysLoggings as $intrasysLogging): ?>
                    <tr>
                        <td><?= $this->Number->format($intrasysLogging->id) ?></td>
                        <td><?= $intrasysLogging->has('retailer') ? $this->Html->link($intrasysLogging->retailer->retailer_name, ['controller' => 'Retailers', 'action' => 'view', $intrasysLogging->retailer->id]) : '' ?></td>
                        <td><?= h($intrasysLogging->action) ?></td>
                        <td><?= h($intrasysLogging->entity) ?></td>
                        <!--<td><?= $this->Number->format($intrasysLogging->entityid) ?></td>
                        <td><?= $this->Number->format($intrasysLogging->employeeid) ?></td>-->
                        <td><?= $this->Time->format(h($intrasysLogging->created), 'd MMM YYYY, hh:mm') ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $intrasysLogging->id]) ?>
                            <!--<?= $this->Html->link(__('Edit'), ['action' => 'edit', $intrasysLogging->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $intrasysLogging->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysLogging->id)]) ?>-->
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
</div>
