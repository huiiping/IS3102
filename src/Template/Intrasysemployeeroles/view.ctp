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
            <div class="box box-primary" style="height: 100%;">
                <div class="box-body box-profile">
                  <div class="box-header with-border">
                    <h3 class="box-title"><?= __($intrasysEmployeeRole->role_name) ?></h3>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($intrasysEmployeeRole->id) ?></td>
                        </tr>                
                        <tr>
                            <th scope="row"><?= __('Role Name') ?></th>
                            <td><?= h($intrasysEmployeeRole->role_name) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Role Description') ?></th>
                            <td><?= $this->Text->autoParagraph(h($intrasysEmployeeRole->role_desc)); ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= $this->Time->format(h($intrasysEmployeeRole->created), 'd MMM YYYY, hh:mm') ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= $this->Time->format(h($intrasysEmployeeRole->modified), 'd MMM YYYY, hh:mm') ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
    
<section class="content">
  <div class="row">
    <div class="col-xs-12">
        <div class="box box-primary" style="height: 100%;">
            <div class="box-body box-profile">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= __('Intrasys Employees') ?></h3>
                </div>
                <?php if (!empty($intrasysEmployeeRole->intrasys_employees)): ?>
                    <div class="box-body">                        
                        <table class="table table-bordered table-striped">
                            <?php foreach ($intrasysEmployeeRole->intrasys_employees as $intrasysEmployees): ?>
                                <tr>
                                    <th scope="row"><?= __('Employee Name') ?></th>
                                    <td><?= $this->Html->link((h($intrasysEmployees->first_name).' '.h($intrasysEmployees->last_name)), ['controller' => 'IntrasysEmployees', 'action' => 'view', $intrasysEmployees->id]) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>
</section>
</div>


<!-- <table cellpadding="0" cellspacing="0">
    <tr>
        <th scope="col"><?= __('Employee Name') ?>
                            <!--<th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('First Name') ?></th>
                            <th scope="col"><?= __('Last Name') ?></th>
                            <th scope="col"><?= __('Account Status') ?></th>
                            <th scope="col"><?= __('Username') ?></th>-->
                            <th scope="col"><?= __('Email') ?></th>
                            <!--<th scope="col"><?= __('Password') ?></th>
                            <th scope="col"><?= __('Address') ?></th>
                            <th scope="col"><?= __('Contact') ?></th>
                            <th scope="col"><?= __('Created') ?></th>
                            <th scope="col"><?= __('Modified') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($intrasysEmployeeRole->intrasys_employees as $intrasysEmployees): ?>
                            <tr>
                                <td>
                                    <?= $this->Html->link(__(h($intrasysEmployees->first_name).' '.h($intrasysEmployees->last_name)), ['controller' => 'IntrasysEmployees', 'action' => 'view', $intrasysEmployees->id]) ?>
                                </td>
                            <!--<td><?= h($intrasysEmployees->id) ?></td>
                            <td><?= h($intrasysEmployees->first_name) ?></td>
                            <td><?= h($intrasysEmployees->last_name) ?></td>
                            <td><?= h($intrasysEmployees->account_status) ?></td>
                            <td><?= h($intrasysEmployees->username) ?></td>
                            <td><?= h($intrasysEmployees->email) ?></td>
                            <!--<td><?= h($intrasysEmployees->password) ?></td>
                            <td><?= h($intrasysEmployees->address) ?></td>
                            <td><?= h($intrasysEmployees->contact) ?></td>
                            <td><?= h($intrasysEmployees->created) ?></td>
                            <td><?= h($intrasysEmployees->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'IntrasysEmployees', 'action' => 'view', $intrasysEmployees->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'IntrasysEmployees', 'action' => 'edit', $intrasysEmployees->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'IntrasysEmployees', 'action' => 'delete', $intrasysEmployees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intrasysEmployees->id)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            
        </div>
    </div>
</div>
</div>
</div>
</section>
</div> -->
