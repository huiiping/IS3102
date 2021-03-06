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
              <h3 class="box-title"><?= __('Search Inventory') ?></h3>
            </div>
            <div class="box-body">

                <br>
                <!--<legend><h4><?= __('Search') ?></h4></legend>-->
                <table cellpadding="0" cellspacing="0", bgcolor="#FFFFFF">
                    <tr><?php
                        echo $this->Form->create($inventory);?>
                        <th width="10"></th>
                        <th scope="col"><?= $this->Form->input(('search'), ['label' => 'Search', 'type' => 'search']); ?></th>
                        <th width="10"></th>

                        <th scope="col" class="actions"><?= $this->Form->submit(__('Search'), ['class'=>'btn btn-default btn-flat']); ?></th>
                        <th width="10"></th>
                        <?php echo $this->Form->end();?>
                    </tr>
                </table>
                <br>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort(('prod_type_id'), ['label' => 'Product Type Id']) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('SKU') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('section_id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($inventory as $inventory): ?>
                        <tr>
                            <td><?= $this->Number->format($inventory->id) ?></td>
                            <td><?= $inventory->has('prod_type') ? $this->Html->link($inventory->prod_type->prod_name, ['controller' => 'ProdTypes', 'action' => 'view', $inventory->prod_type->prod_name]) : '' ?></td>
                            <td><?= h($inventory->SKU) ?></td>
                            <td><?= $this->Number->format($inventory->quantity) ?></td>
                            <td><?= $inventory->has('section') ? $this->Html->link($inventory->section->sec_name, ['controller' => 'Sections', 'action' => 'view', $inventory->section->id]) : '' ?></td>
                            <td><?= $inventory->has('location') ? $this->Html->link($inventory->location->name, ['controller' => 'Locations', 'action' => 'view', $inventory->location->id]) : '' ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View |'), ['action' => 'view', $inventory->id]) ?>
                                <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $inventory->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $inventory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inventory->id)]) ?>
                            </td>
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
</div>
