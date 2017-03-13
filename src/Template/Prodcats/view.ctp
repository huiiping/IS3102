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
              <h3 class="box-title"><?= h($prodCat->cat_name) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit Product Category'), ['action' => 'edit', $prodCat->id]) ?>
              </div>
            </div>
            <div class="box-body">
                <h3><?= h($prodCat->cat_name) ?></h3>
                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Cat Name') ?></th>
                        <td><?= h($prodCat->cat_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Cat Desc') ?></th>
                        <td><?= $this->Text->autoParagraph(h($prodCat->cat_desc)); ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($prodCat->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Parentid') ?></th>
                        <td><?= $this->Number->format($prodCat->parentid) ?></td>
                    </tr>
                </table>
            </div>
        </div>
      </div>
  </section>
</div>
