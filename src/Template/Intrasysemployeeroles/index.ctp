<?php
$this->assign('title', __('Intrasys Roles') . '/' . __('Add'));
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Employee Roles'));
?>

<!-- Main content -->       
<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= __('Intrasys Employee Roles') ?></h3>
          </div>
          <div class="box-body">
          <div class="pull-right">
            <a class="btn btn-default btn-block" title="View Employee Roles Mapping Tree" href="/IS3102_Final/pages/intrasys_tree" >View Employee Roles Mapping Tree</a>
          </div>
          <br>
            <!--<legend><h4><?= __('Search') ?></h4></legend>-->
            <form method="post" accept-charset="utf-8" action="/IS3102_Final/intrasys-employee-roles">
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
                    <!--<?php echo $this->Form->create(null);?>
                    <th width="10"></th>
                    <th scope="col"><?= $this->Form->input('search'); ?></th>
                    <th width="30"></th>
                    <th scope="col" class="actions"><?= $this->Form->submit(__('Search'), ['class'=>'btn btn-default btn-flat']); ?></th>
                    <th width="10"></th>
                    <?php echo $this->Form->end();?>-->
                </tr>
              </table>
            </form>
            <!--<table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                <tr>
                  <?php echo $this->Form->create(null);?>
                    <th width="10"></th>
                    <th scope="col"><?= $this->Form->input('role_name'); ?></th>
                    <th width="30"></th>
                    <th scope="col" class="actions"><?= $this->Form->submit(__('Search'), ['class'=>'btn btn-default btn-flat']); ?></th>
                    <th width="10"></th>
                    <?php echo $this->Form->end();?>
                </tr>
            </table>-->

            <br>

            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort(('id'), ['label' => 'ID']) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('role_name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('role_desc') ?></th>
                    <!-- <th scope="col"><?= $this->Paginator->sort('modified') ?></th> -->
                    <!-- <th scope="col" class="actions"><?= __('Actions') ?></th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($intrasysEmployeeRoles as $intrasysEmployeeRole): ?>
                <tr>
                    <td><?= $this->Number->format($intrasysEmployeeRole->id) ?></td>
                    <td><?= $this->Html->link(__($intrasysEmployeeRole->role_name), ['action' => 'view', $intrasysEmployeeRole->id], ['title' => 'View Employee Role Details'])  ?></td>
                    <td><?= h($intrasysEmployeeRole->role_desc) ?></td>
                    <!--  <td><?= $this->Time->format(h($intrasysEmployeeRole->created), 'd MMM YYYY, hh:mm') ?></td>
                    <td><?= $this->Time->format(h($intrasysEmployeeRole->modified), 'd MMM YYYY, hh:mm') ?></td> -->
                   <!--  <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $intrasysEmployeeRole->id]) ?> -->
                        <!--<?= $this->Html->link(__('Edit'), ['action' => 'edit', $intrasysEmployeeRole->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $intrasysEmployeeRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysEmployeeRole->id)]) ?>-->
                    <!-- </td> -->
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
</section>
