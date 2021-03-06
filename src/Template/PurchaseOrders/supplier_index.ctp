<?php
/**
  * @var \App\View\AppView $this
  */
?>


<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <?php 
          if($id == null) {
            ?>
            <h3 class="box-title"><?= __('Purchase Orders') ?></h3>
            <?php
          } else {

            ?>
            <h3 class="box-title"><?= __('Purchase Order for Quotation ID: '.$id) ?></h3>
            &nbsp <a href="/IS3102_Final/PurchaseOrders/supplierIndex"> View All Purchase Orders </a>
            <?php
          }
          ?>
        </div>
        <div class="box-body">
          <!--<legend><h4><?= __('Search') ?></h4></legend>-->
          <form method="post" accept-charset="utf-8" action="/IS3102_Final/PurchaseOrders/supplier-index">
            <table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
              <tr>
                <th width="10"></th>
                <th scope="col">
                  <div class ="form-group">
                    <div class="input-group">
                      <label for="search"></label>&nbsp&nbsp&nbsp
                      <input class = "form-control" type="text" name="search" id="search" placeholder="Search">
                    </div>
                  </div>
                </th>
                <th width="30"></th>
                <th scope="col" class ="form-group">
                  <div class ="submit">
                    <input class = "form-control" type="submit" class="btn btn-default bth-flat" value="Search">
                  </div>
                </th>
              </tr>
            </table>
          </form>
          <br>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file_name', ['Label' => 'Purchase Order']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('quotation_id', ['Label' => 'Quotation']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('approval_status', ['Label' => 'Status']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($purchaseorders as $purchaseorder): ?>

                <td style="max-width: 150px;"><?= $this->Number->format($purchaseorder['id']) ?></td>
                <td style="max-width: 150px;" ><a href="/IS3102_Final/PurchaseOrders/download/<?= $purchaseorder['id'] ?>"><?=$purchaseorder['file_name']?></a></td>

                <td style="max-width: 150px;"><a href="/IS3102_Final/Quotations/supplierView/<?= $purchaseorder['quotation_id'] ?>"><?=$purchaseorder['quotation_id']?></a></td>

                <?php if($purchaseorder['approval_status'] == 'Pending'){
                  ?>
                  <td style="width: 200px;">
                    <div class="btn-group">
                      <button type="button" style="width: 150px;" class="btn btn-warning btn-flat"><?= $purchaseorder['approval_status'] ?></button>
                      <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a title="Reject Purchase Order" href="/IS3102_Final/PurchaseOrders/rejectOrder/<?= $purchaseorder['id'] ?>">Reject</a></li>
                        <li><a title="Approve Purchase Order" href="/IS3102_Final/PurchaseOrders/approveOrder/<?= $purchaseorder['id'] ?>">Approve</a></li>
                      </ul>
                    </div>
                  </td>
                  <?php
                } 
                else if($purchaseorder['approval_status'] == 'Rejected') {
                 ?>

                 <td style="background-color:#db8f85; text-align: center;">
                   <b>Rejected</b>
                 </td>
                     <!-- <div class="btn-group">
                      <button type="button" style="width: 100px;" class="btn btn-danger btn-flat"><?= $purchaseorder['approval_status'] ?></button>
                      <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a title="Pending Purchase Order" href="/IS3102_Final/PurchaseOrders/pendingOrder/<?= $purchaseorder['id'] ?>">Pending</a></li>
                        <li><a title="Approve Purchase Order" href="/IS3102_Final/PurchaseOrders/approveOrder/<?= $purchaseorder['id'] ?>">Approve</a></li>
                      </ul>
                    </div> -->
                    <?php

                  } else {
                    ?>
                    <td style="background-color:#85db8a; text-align: center;">
                      <b>Approved</b>
                    </td>
                    <!-- <div class="btn-group">
                      <button type="button" style="width: 100px;" class="btn btn-success btn-flat"><?= $purchaseorder['approval_status'] ?></button>
                      <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a title="Pending Purchase Order" href="/IS3102_Final/PurchaseOrders/pendingOrder/<?= $purchaseorder['id'] ?>>">Pending</a></li>
                        <li><a title="Reject Purchase Order" href="/IS3102_Final/PurchaseOrders/rejectOrder/<?= $purchaseorder['id'] ?>">Reject</a></li>
                      </ul>
                    </div> -->
                    
                    <?php 

                  }

                  ?>
                </td>

                <td style="max-width: 150px;"><?= $purchaseorder['created'] ?></td>
                <td><a href="/IS3102_Final/PurchaseOrders/download/<?=$purchaseorder['id']?>"><i class="fa fa-cloud-download" title="Download Purchase Order"></i></a>
                  <?php if($purchaseorder->recurring_supplier == 'Deactivated') :?>
                    &nbsp
                    <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-link', 'title' => 'Activate Recurring Purchase')), array('action' => 'activateRecurringSupplier', $purchaseorder->id), array('escape' => false, 'confirm' => __('Are you sure you want to Activate purchase order # {0}?', $purchaseorder->id))) ?>

                  <?php endif; ?>

                  <?php if($purchaseorder->recurring_supplier == 'Recurring') :?>
                    &nbsp
                    <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-unlink', 'title' => 'Deactivate Recurring Purchase')), array('action' => 'deactivateRecurringSupplier', $purchaseorder->id), array('escape' => false, 'confirm' => __('Are you sure you want to deactivate purchase order # {0}?', $purchaseorder->id))) ?>
                  <?php endif;?>



                  <!-- &nbsp<?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Quotation')), array('action' => 'delete', $purchaseorder['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $purchaseorder['id']))) ?> --></td>
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

