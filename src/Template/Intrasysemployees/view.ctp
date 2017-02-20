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
              <h3 class="box-title"><?= h($intrasysEmployee->first_name) ?> <?= h($intrasysEmployee->last_name) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $intrasysEmployee->id]) ?>
              </div>
            </div>
            <div class="box-body">

                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('First Name') ?></th>
                        <td><?= h($intrasysEmployee->first_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Last Name') ?></th>
                        <td><?= h($intrasysEmployee->last_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Account Status') ?></th>
                        <td><?= h($intrasysEmployee->account_status) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Username') ?></th>
                        <td><?= h($intrasysEmployee->username) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Email') ?></th>
                        <td><?= h($intrasysEmployee->email) ?></td>
                    </tr>
                    <!--<tr>
                        <th scope="row"><?= __('Password') ?></th>
                        <td><?= h($intrasysEmployee->password) ?></td>
                    </tr>-->
                    <tr>
                        <th scope="row"><?= __('Address') ?></th>
                        <td><?= h($intrasysEmployee->address) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Contact') ?></th>
                        <td><?= h($intrasysEmployee->contact) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('ID') ?></th>
                        <td><?= $this->Number->format($intrasysEmployee->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($intrasysEmployee->created) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= h($intrasysEmployee->modified) ?></td>
                    </tr>
                </table>
                <br>

                <div class="related">
                    <h4><?= __('Intrasys Employee Roles') ?></h4>
                    <?php if (!empty($intrasysEmployee->intrasys_employee_roles)): ?>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <!--<th scope="col"><?= __('Id') ?></th>-->
                            <th scope="col"><?= __('Role Name') ?></th>
                            <!--<th scope="col"><?= __('Role Desc') ?></th>
                            <th scope="col"><?= __('Created') ?></th>
                            <th scope="col"><?= __('Modified') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>-->
                        </tr>
                        <?php foreach ($intrasysEmployee->intrasys_employee_roles as $intrasysEmployeeRoles): ?>
                        <tr>
                            <!--<td><?= h($intrasysEmployeeRoles->id) ?></td>-->
                            <td><?= h($intrasysEmployeeRoles->role_name) ?></td>
                            <!--<td><?= h($intrasysEmployeeRoles->role_desc) ?></td>
                            <td><?= h($intrasysEmployeeRoles->created) ?></td>
                            <td><?= h($intrasysEmployeeRoles->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'IntrasysEmployeeRoles', 'action' => 'view', $intrasysEmployeeRoles->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'IntrasysEmployeeRoles', 'action' => 'edit', $intrasysEmployeeRoles->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'IntrasysEmployeeRoles', 'action' => 'delete', $intrasysEmployeeRoles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysEmployeeRoles->id)]) ?>
                            </td>-->
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
