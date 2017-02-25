<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Element('retailerLeftSideBar'); ?>

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
              <h3 class="box-title"><?= h($retailerEmployeeRole->role_name) ?></h3>
            </div>
            <div class="box-body">

                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Role Name') ?></th>
                        <td><?= h($retailerEmployeeRole->role_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Role Description') ?></th>
                        <td><?= $this->Text->autoParagraph(h($retailerEmployeeRole->role_desc)); ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($retailerEmployeeRole->id) ?></td>
                    </tr>
                </table>
                <div class="related">
                    <?php if (!empty($retailerEmployeeRole->retailer_employees)): ?>
                    <h4><?= __('Related Retailer Employees') ?></h4>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <!--<th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Username') ?></th>
                            <th scope="col"><?= __('Password') ?></th>
                            <th scope="col"><?= __('Email') ?></th>
                            <th scope="col"><?= __('Address') ?></th>
                            <th scope="col"><?= __('Contact') ?></th>
                            <th scope="col"><?= __('Created') ?></th>
                            <th scope="col"><?= __('Modified') ?></th>
                            <th scope="col"><?= __('First Name') ?></th>
                            <th scope="col"><?= __('Last Name') ?></th>
                            <th scope="col"><?= __('Account Status') ?></th>
                            <th scope="col"><?= __('Location Id') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>-->
                            <th scope="col"><?= __('Retailer Employee Name') ?></th>
                        </tr>
                        <?php foreach ($retailerEmployeeRole->retailer_employees as $retailerEmployees): ?>
                        <tr>
                            <!--<td><?= h($retailerEmployees->id) ?></td>
                            <td><?= h($retailerEmployees->username) ?></td>
                            <td><?= h($retailerEmployees->password) ?></td>
                            <td><?= h($retailerEmployees->email) ?></td>
                            <td><?= h($retailerEmployees->address) ?></td>
                            <td><?= h($retailerEmployees->contact) ?></td>
                            <td><?= h($retailerEmployees->created) ?></td>
                            <td><?= h($retailerEmployees->modified) ?></td>
                            <td><?= h($retailerEmployees->first_name) ?></td>
                            <td><?= h($retailerEmployees->last_name) ?></td>
                            <td><?= h($retailerEmployees->account_status) ?></td>
                            <td><?= h($retailerEmployees->location_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'RetailerEmployees', 'action' => 'view', $retailerEmployees->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'RetailerEmployees', 'action' => 'edit', $retailerEmployees->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'RetailerEmployees', 'action' => 'delete', $retailerEmployees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerEmployees->id)]) ?>
                            </td>-->
                            <td>
                                <?= $this->Html->link(__(h($retailerEmployees->first_name).' '.h($retailerEmployees->last_name)), ['controller' => 'RetailerEmployees', 'action' => 'view', $retailerEmployees->id]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
      </div>
  </section>
</div>
