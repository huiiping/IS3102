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
              <h3 class="box-title"><?= 'Inventory ID '.h($inventory->id) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit Inventory'), ['action' => 'edit', $inventory->id]) ?>
              </div>
            </div>
            <div class="box-body">

                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Product Type') ?></th>
                        <td><?= $inventory->has('prod_type') ? $this->Html->link($inventory->prod_type->prod_name, ['controller' => 'ProdTypes', 'action' => 'view', $inventory->prod_type->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('SKU') ?></th>
                        <td><?= h($inventory->SKU) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Section') ?></th>
                        <td><?= $inventory->has('section') ? $this->Html->link($inventory->section->sec_name, ['controller' => 'Sections', 'action' => 'view', $inventory->section->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Location') ?></th>
                        <td><?= $inventory->has('location') ? $this->Html->link($inventory->location->name, ['controller' => 'Locations', 'action' => 'view', $inventory->location->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($inventory->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Quantity') ?></th>
                        <td><?= $this->Number->format($inventory->quantity) ?></td>
                    </tr>
                </table>
            </div>
          </div>
      </div>
  </section>
</div>
