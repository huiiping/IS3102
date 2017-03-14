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
              <h3 class="box-title">
              <?= __('Loyalty Points Log') ?> </h3>
            </div>
            <div class="box-body">
              <br>
              <table class="table table-bordered table-striped">
                <thead>
                   <tr>
                        <th scope="col"><?='Type' ?></th>
                        <th scope="col"><?= 'Pts' ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified', ['label' => 'Date']) ?></th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                  $total = 0;
                  foreach ($retailerLoyaltyPoints as $retailerLoyaltyPoint): ?>
                      <tr>
                        <td><?= $this->Number->format($retailerLoyaltyPoint->loyalty_pts) ?></td>
                        <td><?= $this->Number->format($retailerLoyaltyPoint->redemption_pts) ?></td>
                        <td><?= $this->Time->format(h($retailerLoyaltyPoint->modified), 'd MMM YYYY, hh:mm') ?></td>
                        
                      </tr>

                    <?php 

                    $total += $retailerLoyaltyPoint->loyalty_pts;
                    $total -= $retailerLoyaltyPoint->redemption_pts;
                    endforeach;  

                    ?>

                    <tr>
                      <td colspan="6">Current Amount: <?= $total ?></td>
                    </tr>

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
                    <p><?php
                      echo $this->Html->link(
                        'Redeem Loyalty Points',
                        '/RetailerLoyaltyPoints/redeem/'.$retailer[0]['id'],
                        ['class' => 'button']
); ?></p>
                    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                </div>
            </div>
        </div>
      </div>
  </section>
</div>

<!--
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
        -->
