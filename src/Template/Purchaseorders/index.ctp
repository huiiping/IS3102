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
                   <!--  <td><?= $this->Number->format($purchaseOrder->retailer_employee_id) ?></td> -->
                    <td><?= h($purchaseOrder->file_name) ?></td>
                  <!--   <td><?= h($purchaseOrder->file_path) ?></td> -->
                  <?php if($purchaseOrder->approval_status == 'Pending'){

                    echo '<td bgcolor="#fdffc6" valign="middle" align="center"><b>Pending</b></td>';

                }else if($purchaseOrder->approval_status == 'Rejected') {

                    echo '<td bgcolor="#db8f85" valign="middle" align="center"><b>Rejected</b></td>';

                } else {

                    echo '<td bgcolor="#85db8a" valign="middle" align="center"><b>Approved</b></td>';

                }

                ?>
                    <td><?php if($purchaseOrder->delivery_status || $purchaseOrder->approval_status == 'Approved'){echo "Pending";}else{echo "";} ?>
            <!-- 
                    <?= h($purchaseOrder->delivery_status) ?> --></td>
                    <td><?= $purchaseOrder->has('quotation') ? $this->Html->link($purchaseOrder->quotation->id, ['controller' => 'Quotations', 'action' => 'view', $purchaseOrder->quotation->id]) : '' ?></td>
                    <td><?= $purchaseOrder->has('location') ? $this->Html->link($purchaseOrder->location->name, ['controller' => 'Locations', 'action' => 'view', $purchaseOrder->location->id]) : '' ?></td>
                    <td><a href="/IS3102_Final/PurchaseOrders/download/<?=$purchaseOrder->id?>"><i class="fa fa-cloud-download" title="Download Purchase Order"></i></a>
              
                &nbsp<?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Purchase Order')), array('action' => 'delete', $purchaseOrder->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $purchaseOrder->id))) ?></td>
                   <!--  <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $purchaseOrder->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchaseOrder->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchaseOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseOrder->id)]) ?>
                    </td> -->
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
