<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?php if($intrasys) : ?>
<?= $this->Element('intrasysLeftSideBar'); ?>
<?php else : ?>
<?= $this->Element('retailerLeftSideBar'); ?>
<?php endif; ?>

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
              <h3 class="box-title"><?= __('Retailer Loyalty Point') ?></h3>
              <div class="pull-right">
              <?php if($intrasys) : ?>
                <?= $this->Html->link(__('Edit Retailer Loyalty Point'), ['action' => 'edit', $retailerLoyaltyPoint->id]) ?>
              <?php else : ?>
                <?= $this->Html->link(__('Redeem Loyalty Point'), ['action' => 'redeem', $retailerLoyaltyPoint->id]) ?>
              <?php endif; ?>
              </div>
            </div>
            <div class="box-body">

                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Retailer Name') ?></th>
                        <td>
                        <?php if($intrasys) : ?>
                          <?= $retailerLoyaltyPoint->has('retailer') ? $this->Html->link($retailerLoyaltyPoint->retailer->retailer_name, ['controller' => 'Retailers', 'action' => 'view', $retailerLoyaltyPoint->retailer->id]) : '' ?>
                        <?php else : ?>
                          <?= h($retailerLoyaltyPoint->retailer->retailer_name) ?>
                        <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Remarks') ?></th>
                        <td><?= $this->Text->autoParagraph(h($retailerLoyaltyPoint->remarks)); ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Loyalty Points') ?></th>
                        <td><?= $this->Number->format($retailerLoyaltyPoint->loyalty_pts) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Redemption Points') ?></th>
                        <td><?= $this->Number->format($retailerLoyaltyPoint->redemption_pts) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($retailerLoyaltyPoint->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= $this->Time->format(h($retailerLoyaltyPoint->created), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= $this->Time->format(h($retailerLoyaltyPoint->modified), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                </table>
            </div>
        </div>
      </div>
  </section>
</div>
