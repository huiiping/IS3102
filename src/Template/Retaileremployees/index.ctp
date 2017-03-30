<?php
$this->assign('title', __('Retailer Employee') . '/' . __('Index'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Employees'));

?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Search Retailer Employees') ?></h3>
        </div>
        <div class="box-body">
            <div class="pull-right">
                <a class="btn btn-default btn-block" title="Create New Employee" href="/IS3102_Final/retailer-employees/add" >Create New Employee</a>
            </div>
            <br>
            <!--<legend><h4><?= __('Search') ?></h4></legend>-->
            <form method="post" accept-charset="utf-8" action="/IS3102_Final/retailer-employees">
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
            <!--<table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                <tr>
                    <?php echo $this->Form->create($retailerEmployees);?>
                    <th width="10"></th>
                    <th scope="col"><?= $this->Form->input('search'); ?></th>
                    <th width="60"></th>

                    <th scope="col" class="actions"><?= $this->Form->submit(__('Search'), ['class'=>'btn btn-default btn-flat']); ?></th>
                    <th width="10"></th>
                    <?php echo $this->Form->end();?>
                </tr>
            </table>-->
          <br>
          <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <!--<th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('password') ?></th>-->
                    <!--<th scope="col"><?= $this->Paginator->sort('activation_token') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('recovery_status') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('recovery_token') ?></th>-->
                    <th scope="col"><?= $this->Paginator->sort('first_name', ['label' => 'Employee Name'])  ?></th>
                    <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('activation_status') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                    <!--<th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>-->
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($retailerEmployees as $retailerEmployee): ?>
                <tr>
                    <!--<td><?= $this->Number->format($retailerEmployee->id) ?></td>
                    <td><?= h($retailerEmployee->first_name) ?></td>
                    <td><?= h($retailerEmployee->last_name) ?></td>
                    <td><?= h($retailerEmployee->username) ?></td>
                    <td><?= h($retailerEmployee->password) ?></td>
                    <td><?= h($retailerEmployee->activation_token) ?></td>
                    <td><?= h($retailerEmployee->recovery_status) ?></td>
                    <td><?= h($retailerEmployee->recovery_token) ?></td>-->
                    <td style="max-width: 150px; overflow: hidden;">
                        <?= $this->Html->link(__(h($retailerEmployee->first_name.' '.$retailerEmployee->last_name)), ['action' => 'view', $retailerEmployee->id], ['title' => 'View Employee Details']) ?>
                    </td>
                    <td style="width: 150px; overflow: hidden;">
                        <a href="mailto:<?= h($retailerEmployee->email) ?>" title="Email">
                          <?= h($retailerEmployee->email) ?>
                        </a>
                    </td>
                    <td style="width: 150px; overflow: hidden;">
                        <a href="tel:+<?= h($retailerEmployee->contact) ?>" title="Call Contact">
                          <?= h($retailerEmployee->contact) ?>
                        </a>
                    </td>
                    <td style="width: 200px; overflow: hidden;">
                        <?= h($retailerEmployee->address) ?>
                    </td>
                    <td>
                        <?php if ($retailerEmployee->activation_status == 'Activated'): ?>
                          <a class="btn btn-default btn-block" title="Deactivate Employee" href="/IS3102_Final/retailer-employees/deactivateStatus/<?= $retailerEmployee->id ?>" >Deactivate</a>
                        <?php else: ?>
                          <a class="btn btn-default btn-block" title="Activate Employee" href="/IS3102_Final/retailer-employees/activateStatus/<?= $retailerEmployee->id ?>" >Activate</a>
                        <?php endif; ?>
                    </td>             
                    <td>
                        <?= $retailerEmployee->has('location') ? $this->Html->link($retailerEmployee->location->name, ['controller' => 'Locations', 'action' => 'view', $retailerEmployee->location->id],['title' => 'View Location Details']) : '' ?></td>
                    <td>
                        <a href="/IS3102_Final/retailer-employees/edit/<?=$retailerEmployee->id?>">
                          <i class="fa fa-edit" title="Edit Employee Details"></i></a>&nbsp
                        <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Employee')), array('action' => 'delete', $retailerEmployee->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $retailerEmployee->id))) ?>
                    </td>
                    <td>
                        <a href="/IS3102_Final/retailer-employees/manager_actions/<?= $retailerEmployee->id ?>">
                          <i class="fa fa-users" title="Manager Actions"></i>
                        </a>   
                    </td>
                    <!--<td><?= $this->Time->format(h($retailerEmployee->created), 'd MMM YYYY, hh:mm') ?></td>
                    <td><?= $this->Time->format(h($retailerEmployee->modified), 'd MMM YYYY, hh:mm') ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View |'), ['action' => 'view', $retailerEmployee->id]) ?>
                        <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $retailerEmployee->id]) ?>
                        <?= $this->Form->postLink(__('Delete |'), ['action' => 'delete', $retailerEmployee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerEmployee->id)]) ?>
                        <?= $this->Html->link(__('Manager Actions'), ['action' => 'managerActions', $retailerEmployee->id]) ?>
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
