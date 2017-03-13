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
              <h3 class="box-title"><?= __('Product Specifications') ?></h3>
            </div>
            <div class="box-body">

    <br>
    <!--<legend><h4><?= __('Search') ?></h4></legend>-->
    <table cellpadding="0" cellspacing="0", bgcolor="#FFFFFF">
        <tr><?php
            echo $this->Form->create($prodSpecifications);?>
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
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prodSpecifications as $prodSpecification): ?>
            <tr>
                <td><?= h($prodSpecification->title) ?></td>
                <td><?= h($prodSpecification->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View |'), ['action' => 'view', $prodSpecification->title]) ?>
                    <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $prodSpecification->title]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $prodSpecification->title], ['confirm' => __('Are you sure you want to delete # {0}?', $prodSpecification->title)]) ?>
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
