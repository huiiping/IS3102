<?php
$this->assign('title', __('Retailer') );
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Customers'), ['controller' => 'Customers', 'action' => 'index']);
$this->Html->addCrumb(__("Customer's Profile"), ['controller' => 'Customers', 'action' => 'view', $customer[0]['id']]);
$this->Html->addCrumb(__("Customer's Membership Points")); 
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= ucfirst(h($customer[0]['first_name'])).' '.ucfirst(h($customer[0]['last_name'])).'\'s</b> Membership Points' ?></h3>
        </div>
        <div class="box-body">
          <br>
          <table class="table table-bordered table-striped">
            <thead>
               <tr>
                <th scope="col"><?= $this->Paginator->sort('created', ['label' => 'Date']) ?></th>
                <th scope="col"><?= 'Type' ?></th>
                <th scope="col"><?= 'Points' ?></th>
                <th scope="col"><?= $this->Paginator->sort('remarks') ?></th>
                <th scope="col"><?= $this->Paginator->sort('retailer_employee_id', ['label' => 'Modified By']) ?></th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $total = 0;
              foreach ($membershipPoints as $membershipPoint): ?>
                <tr>
                  <?php if($membershipPoint->type == 'Deducted') { ?>
                    <td><?= $this->Time->format(h($membershipPoint->created), 'd MMM YYYY, HH:mm') ?></td>
                    <td><?= h($membershipPoint->type) ?></td>
                    <td align="center"><font color="red">(<?= $this->Number->format($membershipPoint->pts)?>)</font></td>
                    <?php $total -= $membershipPoint->pts; ?>
                  <?php } else { ?>
                    <td><?= $this->Time->format(h($membershipPoint->created), 'd MMM YYYY, HH:mm') ?></td>
                    <td><?= h($membershipPoint->type) ?></td>
                    <td align="center"><?= $this->Number->format($membershipPoint->pts) ?></td>
                    <?php $total += $membershipPoint->pts; ?>
                  <?php } ?>
                    <td><?= $this->Text->autoParagraph($membershipPoint->remarks) ?></td>
                    <td><?= $membershipPoint->has('retailer_employee') ? $this->Html->link($membershipPoint->retailer_employee->first_name.' '.$membershipPoint->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $membershipPoint->retailer_employee->id], ['title' => 'View Employee Details']) : 'System' ?></td>
                </tr>
              <?php endforeach; ?>
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
