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
              <h3 class="box-title"><?= __('Search Sections') ?></h3>
            </div>
            <div class="box-body">

                <br>
                <!--<legend><h4><?= __('Search') ?></h4></legend>-->
                <table cellpadding="0" cellspacing="0", bgcolor="#FFFFFF">
                    <tr><?php
                        echo $this->Form->create(null);?>
                        <th width="10"></th>
                        <th scope="col"><?= $this->Form->input(('sec_name'), ['label' => 'Section Name']); ?></th>
                        <th width="30"></th>
                        <th scope="col" class="actions"><?= $this->Form->submit(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?></th>
                        <th width="10"></th>
                        <?php echo $this->Form->end();?>
                    </tr>
                </table>
                <br>
                <table class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort(('sec_name'), ['label' => 'Section Name']) ?></th>
                            <!--<th scope="col"><?= $this->Paginator->sort('space_limit') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('reserve') ?></th>-->
                            <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sections as $section): ?>
                        <tr>
                            <td><?= $this->Number->format($section->id) ?></td>
                            <td><?= h($section->sec_name) ?></td>
                            <!--<td><?= $this->Number->format($section->space_limit) ?></td>
                            <td><?= h($section->reserve) ?></td>-->
                            <td><?= $section->has('location') ? $this->Html->link($section->location->name, ['controller' => 'Locations', 'action' => 'view', $section->location->id]) : '' ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View |'), ['action' => 'view', $section->id]) ?>
                                <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $section->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $section->id], ['confirm' => __('Are you sure you want to delete # {0}?', $section->id)]) ?>
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
