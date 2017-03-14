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
              <?= __('Manage <b>'.ucfirst(h($retailer[0]['retailer_name'])).'\'s</b> Loyalty Points') ?> </h3>              
            </div>
            
            <div class="box-body">
              <br>
              <table class="table table-bordered table-striped">
                <thead>
                   <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= 'Type' ?></th>
                        <th scope="col"><?= 'Pts' ?></th>
                        <th scope="col"><?= $this->Paginator->sort('remarks') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('intrasys_employee_id', ['label' => 'Modified By']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified', ['label' => 'Date']) ?></th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                  $total = 0;
                  foreach ($retailerLoyaltyPoints as $retailerLoyaltyPoint): ?>
                      <tr>
                        <td><?= $this->Number->format($retailerLoyaltyPoint->id) ?></td>

                        <?php

                          if($retailerLoyaltyPoint->loyalty_pts == null){ 

                        ?>

                          <td>Deducted</td>
                          <td align="center"><font color="red">(<?= $this->Number->format($retailerLoyaltyPoint->redemption_pts) ?>)</font></td>

                        <?php 

                          } else {

                        ?>
                          <td>Awarded</td>
                          <td align="center"><?= $this->Number->format($retailerLoyaltyPoint->loyalty_pts) ?></td>

                        <?php 

                          }

                        ?>

                        <td><?= $this->Text->autoParagraph($retailerLoyaltyPoint->remarks) ?></td>
                        

                        <td><?= $retailerLoyaltyPoint->has('intrasys_employee') ? $this->Html->link($retailerLoyaltyPoint->intrasys_employee->first_name, ['controller' => 'IntrasysEmployees', 'action' => 'view', $retailerLoyaltyPoint->intrasys_employee->id]) : 'System' ?></td>

                        <td><?= $this->Time->format(h($retailerLoyaltyPoint->modified), 'd MMM YYYY, hh:mm') ?></td>
                        
                      </tr>

                    <?php 

                    $total += $retailerLoyaltyPoint->loyalty_pts;
                    $total -= $retailerLoyaltyPoint->redemption_pts;
                    endforeach;  

                    ?>

                    <tr bgcolor="black">
                      <td colspan="2" bgcolor="black"><font color="white">Current Total Pts: </font></td>
                      <td bgcolor="black"><font color="white"> <?= $total ?>  </font></td>
                      <td bgcolor="black" colspan="3"></td>
                    </tr>
                    <tr>
                      <td colspan="6">
                        <?php  $link = '/IS3102_Final/retailer-loyalty-points/add_specific/'.$retailer[0]['id'] 
                        ?>
                        <a class="btn btn-default btn-flat" href="<?=$link?>
                        ">Award / Deduct Loyalty Points</a>

                      </td>
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
