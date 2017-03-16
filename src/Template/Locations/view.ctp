<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Element('retailerLeftSideBar'); ?>
<?php
$this->assign('title', __('View') . '/' . __('Add'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Location'), ['controller' => 'Locations', 'action' => 'index']);
$this->Html->addCrumb(__('View'));
?>
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
              <h3 class="box-title"><?= h($location->name) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit Location'), ['action' => 'edit', $location->id]) ?>
              </div>
            </div>
            <div class="box-body">

                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($location->name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Address') ?></th>
                        <td><?= h($location->address) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Type') ?></th>
                        <td><?= h($location->type) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Contact') ?></th>
                        <td><?= h($location->contact) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($location->id) ?></td>
                    </tr>
                </table>
                <div class="related">
                    <?php if (!empty($location->retailer_employees)): ?>
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
                        <?php foreach ($location->retailer_employees as $retailerEmployees): ?>
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
                <div class="related">
                    <?php if (!empty($location->sections)): ?>
                    <h4><?= __('Related Sections') ?></h4>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <!--<th scope="col"><?= __('Id') ?></th>-->
                            <th scope="col"><?= __('Section Name') ?></th>
                            <!--<th scope="col"><?= __('Space Limit') ?></th>
                            <th scope="col"><?= __('Reserve') ?></th>
                            <th scope="col"><?= __('Location Id') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>-->
                        </tr>
                        <?php foreach ($location->sections as $sections): ?>
                        <tr>
                            <!--<td><?= h($sections->id) ?></td>-->
                            <td>
                                <?= $this->Html->link(__(h($sections->sec_name)), ['controller' => 'Sections', 'action' => 'view', $sections->id]) ?>
                            </td>
                            <!--<td><?= h($sections->space_limit) ?></td>
                            <td><?= h($sections->reserve) ?></td>
                            <td><?= h($sections->location_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Sections', 'action' => 'view', $sections->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Sections', 'action' => 'edit', $sections->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sections', 'action' => 'delete', $sections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sections->id)]) ?>
                            </td>-->
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
