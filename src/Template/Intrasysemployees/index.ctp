<?php
$this->assign('title', __('Intrasys Employees') . '/' . __('Index'));
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Employees'));
?>

<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= __('Intrasys Employees') ?></h3>
          </div>
          <div class="box-body">
          <div class="pull-right">
            <a class="btn btn-default btn-block" title="Create New Employee" href="/IS3102_Final/intrasys-employees/add" >Create New Employee</a>
          </div>
            <!--<legend><h4><?= __('Search') ?></h4></legend>-->
            <form method="post" accept-charset="utf-8" action="/IS3102_Final/intrasys-employees">
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
            <br>
            <table class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <!--<th scope="col"><?= $this->Paginator->sort('id') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>-->
                      <!--<th scope="col"><?= $this->Paginator->sort('activation_token') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('recovery_status') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('recovery_token') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('password') ?></th>-->
                      <th scope="col"><?= $this->Paginator->sort('first_name', ['label' => 'Employee Name']) ?></th>
                      <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('activation_status') ?></th>
                      <th scope="col" class="actions"><?= __('Actions') ?></th>
                      <th></th>
                      <!--<th scope="col"><?= $this->Paginator->sort('created') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('modified') ?></th>-->
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($intrasysEmployees as $intrasysEmployee): ?>
                  <tr>
                      <!--<td><?= $this->Number->format($intrasysEmployee->id) ?></td>
                      <td><?= h($intrasysEmployee->first_name) ?></td>
                      <td><?= h($intrasysEmployee->last_name) ?></td>-->
                      <!--<td><?= h($intrasysEmployee->activation_token) ?></td>
                      <td><?= h($intrasysEmployee->recovery_status) ?></td>
                      <td><?= h($intrasysEmployee->recovery_token) ?></td>
                      <td><?= h($intrasysEmployee->username) ?></td>
                      <td><?= h($intrasysEmployee->password) ?></td>-->
                      <td style="max-width: 150px; overflow: hidden;">
                        <?= $this->Html->link(__(h($intrasysEmployee->first_name.' '.$intrasysEmployee->last_name)), ['action' => 'view', $intrasysEmployee->id], ['title' => 'View Employee Details']) ?>
                      </td>
                      <td style="width: 150px; overflow: hidden;">
                        <a href="mailto:<?= h($intrasysEmployee->email) ?>" title="Email">
                          <?= h($intrasysEmployee->email) ?>
                        </a>
                      </td>
                      <td style="width: 150px; overflow: hidden;">
                        <a href="tel:+<?= h($intrasysEmployee->contact) ?>" title="Call Contact">
                          <?= h($intrasysEmployee->contact) ?>
                        </a>
                      </td>
                      <td style="width: 200px; overflow: hidden;">
                        <?= h($intrasysEmployee->address) ?>
                      </td>
                      <td>
                        <!--<?= h($intrasysEmployee->activation_status) ?>-->
                        <?php if ($intrasysEmployee->activation_status == 'Activated'): ?>
                          <a class="btn btn-default btn-block" title="Deactivate Employee" href="/IS3102_Final/intrasys-employees/deactivateStatus/<?= $intrasysEmployee->id ?>" >Deactivate</a>
                        <?php else: ?>
                          <a class="btn btn-default btn-block" title="Activate Employee" href="/IS3102_Final/intrasys-employees/activateStatus/<?= $intrasysEmployee->id ?>" >Activate</a>
                        <?php endif; ?>
                      </td>
                      <td>
                        <a href="/IS3102_Final/intrasys-employees/edit/<?=$intrasysEmployee->id?>">
                          <i class="fa fa-edit" title="Edit Employee Details"></i></a>&nbsp
                        <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Employee')), array('action' => 'delete', $intrasysEmployee->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $intrasysEmployee->id))) ?>
                      </td>
                      <td>
                        <a href="/IS3102_Final/intrasys-employees/manager_actions/<?= $intrasysEmployee->id ?>">
                          <i class="fa fa-users" title="Edit Employee Roles"></i>
                        </a>   
                      </td>
                      <!--<td><?= $this->Time->format(h($intrasysEmployee->created), 'd MMM YYYY, hh:mm') ?></td>
                      <td><?= $this->Time->format(h($intrasysEmployee->modified), 'd MMM YYYY, hh:mm') ?></td>-->
                      <!--<td class="actions">
                          <?= $this->Html->link(__('View |'), ['action' => 'view', $intrasysEmployee->id]) ?>
                          <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $intrasysEmployee->id]) ?>
                          <?= $this->Form->postLink(__('Delete |'), ['action' => 'delete', $intrasysEmployee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysEmployee->id)]) ?>
                          <?= $this->Html->link(__('Manager Actions '), ['action' => 'managerActions', $intrasysEmployee->id]) ?>
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
