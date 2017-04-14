<?php
$this->assign('title', __('Reports') . '/' . __('Edit'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Purchase Orders'), ['controller' => 'Purchaseorders', 'action' => 'index']);
?>
<?= $this->Element('retailerLeftSideBar'); ?>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Purchase Orders') ?></h3>
        </div>
        <div class="box-body">
          <form method="post" accept-charset="utf-8" action="/IS3102_Final/PurchaseOrders">
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
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approval_status',['Label' => 'Status']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('delivery_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quotation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($purchaseOrders as $purchaseOrder): ?>
                <tr>
                  <td style="width: 50px;"><?= $this->Number->format($purchaseOrder->id) ?></td>
                  <td style="width: 150px;"><?= h($purchaseOrder->created) ?></td>
                  <td><?= h($purchaseOrder->file_name) ?></td>
                  <?php if($purchaseOrder->approval_status == 'Pending') :?>

                   <td bgcolor="#fdffc6" valign="middle" align="center"><b>Pending</b></td>

                 <?php elseif($purchaseOrder->approval_status == 'Waiting for approval'): ?> 
                  <?php $session = $this->request->session();
                  $user = $this->request->session()->read('Auth.User');
                  if($user['id'] ==1) :?>
                  <td style="width: 200px;">
                    <div class="btn-group" style>
                      <button type="button" style="width: 150px;" class="btn btn-block btn-warning btn-flat"><?= "Pending approval" ?></button>
                      <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a title="Reject Quotation" href="/IS3102_Final/PurchaseOrders/adminReject/<?= $purchaseOrder->id ?>">Reject</a></li>
                        <li><a title="Approve Quotation" href="/IS3102_Final/PurchaseOrders/adminApprove/<?= $purchaseOrder->id ?>">Approve</a></li>
                      </ul>
                    </div>
                  </td>
                <?php else:?>
                  <td bgcolor="#ea9e4d" valign="middle" align="center"><b>Waiting for approval</b></td>
                <?php endif; ?>

              <?php elseif($purchaseOrder->approval_status == 'Rejected') :?>

                <td bgcolor="#db8f85" valign="middle" align="center"><b>Rejected</b></td>

              <?php elseif($purchaseOrder->approval_status == 'Rejected by Admin') :?>

                <td bgcolor="#f44e42" valign="middle" align="center"><b>Rejected by Admin</b></td>

              <?php else : ?>

                <td bgcolor="#85db8a" valign="middle" align="center"><b>Approved</b></td>

              <?php endif; ?>

              <td ><?php if($purchaseOrder->delivery_status || $purchaseOrder->approval_status == 'Approved'){echo "Pending";}else{echo "";} ?>
            <!-- 
            <?= h($purchaseOrder->delivery_status) ?> --></td>
            <td><?= $purchaseOrder->has('quotation') ? $this->Html->link($purchaseOrder->quotation->id, ['controller' => 'Quotations', 'action' => 'view', $purchaseOrder->quotation->id]) : '' ?></td>
            <td><?= $purchaseOrder->has('location') ? $this->Html->link($purchaseOrder->location->name, ['controller' => 'Locations', 'action' => 'view', $purchaseOrder->location->id]) : '' ?></td>
            <td><a href="/IS3102_Final/PurchaseOrders/download/<?=$purchaseOrder->id?>"><i class="fa fa-cloud-download" title="Download Purchase Order"></i></a>

              &nbsp<?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Purchase Order')), array('action' => 'delete', $purchaseOrder->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $purchaseOrder->id))) ?>

              <?php if($purchaseOrder->recurring_supplier == 'Recurring' && 
              $purchaseOrder->recurring_retailer == 'Recurring') :?>
              &nbsp
                  <a href="/IS3102_Final/PurchaseOrders/recurringPO/<?=$purchaseOrder->id?>"><i class="fa fa-exchange" title="Resend PO"></i></a>
              <?php endif;?>
              <?php if($purchaseOrder->recurring_retailer == 'Recurring') :?>
              &nbsp
              <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-unlink', 'title' => 'Deactivate Recurring Purchase')), array('action' => 'deactivateRecurring', $purchaseOrder->id), array('escape' => false, 'confirm' => __('Are you sure you want to deactivate purchase order # {0}?', $purchaseOrder->id))) ?>
              <?php endif;?>

              <?php if($purchaseOrder->recurring_retailer == 'Deactivated') :?>
                &nbsp
              <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-link', 'title' => 'Activate Recurring Purchase')), array('action' => 'activateRecurring', $purchaseOrder->id), array('escape' => false, 'confirm' => __('Are you sure you want to Activate purchase order # {0}?', $purchaseOrder->id))) ?>
              <?php endif; ?>
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
