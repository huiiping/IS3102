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
              <h3 class="box-title"><?= h($retailerDetail->retailer_name) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit Retailer Detail'), ['action' => 'edit', $retailerDetail->retailerid]) ?>
              </div>
            </div>
            <div class="box-body">

                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Retailer Name') ?></th>
                        <td><?= h($retailerDetail->retailer_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Retailer Description') ?></th>
                        <td><?= $this->Text->autoParagraph(h($retailerDetail->retailer_desc)); ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Retailer Email') ?></th>
                        <td><?= h($retailerDetail->retailer_email) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Address') ?></th>
                        <td><?= h($retailerDetail->address) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Contact') ?></th>
                        <td><?= h($retailerDetail->contact) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Retailer ID') ?></th>
                        <td><?= $this->Number->format($retailerDetail->retailerid) ?></td>
                    </tr>
                </table>
            </div>
        </div>
      </div>
  </section>
</div>
