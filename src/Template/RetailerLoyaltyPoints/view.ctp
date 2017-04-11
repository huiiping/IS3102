<?php
$this->assign('title', __('Retailer') );
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Retailers', 'action' => 'index']);
$this->Html->addCrumb(__("Retailer's Details"), ['controller' => 'Retailers', 'action' => 'view', $retailer[0]['id']]);
$this->Html->addCrumb(__("Retailer's Loyalty Points")); ?>

<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">
            <?= __('Manage <b>'.ucfirst(h($retailer[0]['retailer_name'])).'\'s</b> Loyalty Points') ?> </h3>              
          </div>
          <div class="box-body"><br>
          <div class="pull-right">
            <?php  $link = '/IS3102_Final/retailer-loyalty-points/add_specific/'.$retailer[0]['id'] ?>
            <a class="btn btn-success btn-flat" href="<?=$link?>">Award / Deduct Loyalty Points</a>
          </div>
            <br><br><br>
            <table class="table table-bordered table-striped">
              <thead>
                 <tr>
                      <th scope="col"><?= $this->Paginator->sort('modified', ['label' => 'Date']) ?></th>
                      <th scope="col"><?= 'Type' ?></th>
                      <th scope="col"><?= 'Points' ?></th>
                      <th scope="col"><?= $this->Paginator->sort('remarks') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('intrasys_employee_id', ['label' => 'Modified By']) ?></th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                $total = 0;
                foreach ($retailerLoyaltyPoints as $retailerLoyaltyPoint): ?>
                    <tr>

                      <?php

                        if($retailerLoyaltyPoint->loyalty_pts == null){ 

                      ?>

                        <td><?= $this->Time->format(h($retailerLoyaltyPoint->modified), 'd MMM YYYY, HH:mm') ?></td>
                        <td>Deducted</td>
                        <td align="center"><font color="red">(<?= $this->Number->format($retailerLoyaltyPoint->redemption_pts) ?>)</font></td>

                      <?php 

                        } else {

                      ?>
                        <td><?= $this->Time->format(h($retailerLoyaltyPoint->modified), 'd MMM YYYY, HH:mm') ?></td>
                        <td>Awarded</td>
                        <td align="center"><?= $this->Number->format($retailerLoyaltyPoint->loyalty_pts) ?></td>

                      <?php 

                        }

                      ?>

                      <td><?= $this->Text->autoParagraph($retailerLoyaltyPoint->remarks) ?></td>
                      

                      <td><?= $retailerLoyaltyPoint->has('intrasys_employee') ? $this->Html->link($retailerLoyaltyPoint->intrasys_employee->first_name.' '.$retailerLoyaltyPoint->intrasys_employee->last_name, ['controller' => 'IntrasysEmployees', 'action' => 'view', $retailerLoyaltyPoint->intrasys_employee->id], ['title' => 'View Employee Details']) : 'System' ?></td>

                      
                      
                    </tr>

                  <?php 

                  $total += $retailerLoyaltyPoint->loyalty_pts;
                  $total -= $retailerLoyaltyPoint->redemption_pts;
                  endforeach;  

                  ?>

                  <tr bgcolor="black">
                    <td colspan="2" bgcolor="black"><font color="white">Current Total Pts: </font></td>
                    <td colspan="4" bgcolor="black"><font color="white"> <?= $total ?>  </font></td>
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
