<?php
$this->assign('title', __('Intrasys Employees') . '/' . __('View'));
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Employees'), ['controller' => 'intrasys-employees', 'action' => 'index']);
$this->Html->addCrumb(__('View : '.$intrasysEmployee->first_name.' '.$intrasysEmployee->last_name));
?>

<!-- Content Header -->
<section class="content-header">
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-xs-4">
        <div class="box box-primary" style="min-height: 500px;">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="/IS3102_Final/img/user2-160x160.jpg" alt="User profile picture">

            <h3 class="profile-username text-center"><?= h($intrasysEmployee->first_name).' '.h($intrasysEmployee->last_name) ?></h3>

            <?php if (!empty($intrasysEmployee->intrasys_employee_roles)): ?>
            <?php foreach ($intrasysEmployee->intrasys_employee_roles as $intrasysEmployeeRoles): ?>
              <p class="text-muted text-center">
                  <?= $this->Html->link(__(h($intrasysEmployeeRoles->role_name)), ['controller' => 'IntrasysEmployeeRoles', 'action' => 'view', $intrasysEmployeeRoles->id], ['title' => 'View Employee Role Details']) ?>
              </p>
            <?php endforeach; ?>
            <?php endif; ?> 

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b><?= __('Activation Status') ?></b> 
                <div class="pull-right">
                <?php if ($intrasysEmployee->activation_status == 'Activated'): ?>
                  <a class="btn btn-default btn-block" title="Deactivate Employee" href="/IS3102_Final/intrasys-employees/deactivateStatus/<?= $intrasysEmployee->id ?>">Deactivate</a>
                <?php else: ?>
                  <a class="btn btn-default btn-block" title="Activate Employee" href="/IS3102_Final/intrasys-employees/activateStatus/<?= $intrasysEmployee->id ?>">Activate</a>
                <?php endif; ?>   
              </div><br><br>
              </li>
            </ul>
            <a class="btn btn-default btn-block" title="Edit Employee Details" href="/IS3102_Final/intrasys-employees/edit/<?= $intrasysEmployee->id ?>" >Edit Employee Details</a>
          </div>
        </div>
      </div>
      
      <div class="col-md-8">  
          <div class="box box-primary" style="min-height: 500px;">
              <div class="box-body box-profile">
                <div class="box-header with-border">
                  <h3 class="box-title"><?= __('Employee Profile') ?></h3>
                </div>
                <div class="box-body"><br>
                  <table class="table table-bordered table-striped">
                      <tr>
                          <th scope="row"><?= __('Id') ?></th>
                          <td><?= $this->Number->format($intrasysEmployee->id) ?></td>
                      </tr>
                      <tr>
                          <th scope="row"><?= __('Username') ?></th>
                          <td><?= h($intrasysEmployee->username) ?></td>
                      </tr>
                      <tr>
                          <th scope="row"><?= __('Email') ?></th>
                          <td>
                            <a href="mailto:<?= h($intrasysEmployee->email) ?>" title="Email">
                              <?= h($intrasysEmployee->email) ?>
                            </a>
                          </td>
                      </tr>
                      <tr>
                          <th scope="row"><?= __('Contact') ?></th>
                          <td>
                            <a href="tel:+<?= h($intrasysEmployee->contact) ?>" title="Call Contact">
                              <?= h($intrasysEmployee->contact) ?>
                            </a>
                          </td>
                      </tr>
                      <tr>
                          <th scope="row"><?= __('Address') ?></th>
                          <td><?= h($intrasysEmployee->address) ?></td>
                      </tr>
                      <tr>
                          <th scope="row"><?= __('Date Created') ?></th>
                          <td><?= $this->Time->format(h($intrasysEmployee->created), 'd MMM YYYY, HH:mm') ?></td>
                      </tr>
                      <tr>
                          <th scope="row"><?= __('Last Modified') ?></th>
                          <td><?= $this->Time->format(h($intrasysEmployee->modified), 'd MMM YYYY, HH:mm') ?></td>
                      </tr>
                  </table>
                </div>
              </div>
          </div>
      </div>
    </div>
</section>
