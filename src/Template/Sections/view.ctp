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
              <h3 class="box-title"><?= h($section->sec_name) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit Section'), ['action' => 'edit', $section->id]) ?>
              </div>
            </div>
            <div class="box-body">
                
            <table class="vertical-table">
                <tr>
                    <th scope="row"><?= __('Sec Name') ?></th>
                    <td><?= h($section->sec_name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Location') ?></th>
                    <td><?= $section->has('location') ? $this->Html->link($section->location->name, ['controller' => 'Locations', 'action' => 'view', $section->location->id]) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Space Limit') ?></th>
                    <td><?= $this->Number->format($section->space_limit) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Reserve') ?></th>
                    <td><?= $section->reserve ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($section->id) ?></td>
                </tr>
            </table>
        	    <div class="related">
                <?php if (!empty($section->inventory)): ?>
                <h4><?= __('Related Inventory') ?></h4>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Prod Type') ?></th>
                        <th scope="col"><?= __('SKU') ?></th>
                        <th scope="col"><?= __('Quantity') ?></th>
                        <th scope="col"><?= __('Section Id') ?></th>
                        <th scope="col"><?= __('Location Id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($section->inventory as $inventory): ?>
                    <tr>
                        <td><?= h($inventory->id) ?></td>
                        <td><?= h($inventory->prod_type_id) ?></td>
                        <td><?= h($inventory->SKU) ?></td>
                        <td><?= h($inventory->quantity) ?></td>
                        <td><?= h($inventory->section_id) ?></td>
                        <td><?= h($inventory->lcoation_id) ?></td>

                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Inventory', 'action' => 'view', $inventory->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Inventory', 'action' => 'edit', $inventory->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Inventory', 'action' => 'delete', $inventory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inventory->id)]) ?>
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
