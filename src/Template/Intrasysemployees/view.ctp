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
        <div class="col-xs-4">
          <div class="box box-primary" style="height: 100%;">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="/IS3102_Final/img/user2-160x160.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?= h($intrasysEmployee->first_name).' '.h($intrasysEmployee->last_name) ?></h3>

              <?php if (!empty($intrasysEmployee->intrasys_employee_roles)): ?>
              <?php foreach ($intrasysEmployee->intrasys_employee_roles as $intrasysEmployeeRoles): ?>
                <p class="text-muted text-center">
                    <?= $this->Html->link(__(h($intrasysEmployeeRoles->role_name)), ['controller' => 'IntrasysEmployeeRoles', 'action' => 'view', $intrasysEmployeeRoles->id]) ?>
                </p>
              <?php endforeach; ?>
              <?php endif; ?> 

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><?= __('Activation Status') ?></b> 
                  <div class="pull-right"><?= h($intrasysEmployee->activation_status) ?></div>
                </li>
              </ul>
              <div class="btn btn-default btn-block"><?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $intrasysEmployee->id]) ?></div>
            </div>
          </div>
        </div>
        
        <div class="col-md-8">  
            <div class="box box-primary" style="height: 100%;">
                <div class="box-body box-profile">
                  <div class="box-header with-border">
                    <h3 class="box-title"><?= __('Employee Profile') ?></h3>
                  </div>
                  <div class="box-body"><br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th scope="row"><?= __('Username') ?></th>
                            <td><?= h($intrasysEmployee->username) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Email') ?></th>
                            <td><?= h($intrasysEmployee->email) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Contact') ?></th>
                            <td><?= h($intrasysEmployee->contact) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Address') ?></th>
                            <td><?= h($intrasysEmployee->address) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($intrasysEmployee->id) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= $this->Time->format(h($intrasysEmployee->created), 'd MMM YYYY, hh:mm') ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= $this->Time->format(h($intrasysEmployee->modified), 'd MMM YYYY, hh:mm') ?></td>
                        </tr>
                    </table>
                  </div>
                </div>
            </div>
        </div>
      </div>
  </section>
</div>