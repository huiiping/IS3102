<?php
  use Cake\ORM\TableRegistry;
?>

<?php
$this->assign('title', __('Retailers') . '/' . __('Index'));
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Transactions'));
?>

<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= __('Transactions') ?></h3>
          </div>
          <div class="box-body">
          <form method="post" accept-charset="utf-8" action="/IS3102_Final/retailers">
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
                      <input class="btn btn-primary btn-block" class = "form-control" type="submit" class="btn btn-default bth-flat" value="Search">
                      </div>
                    </th>
                    <th width="10"></th>
                    <th scope="col" class ="form-group">
                      <div class ="submit">
                        <button class="btn btn-default btn-block"><a class="reset_button" onclick="reset();" placeholder="Reset"><i class="fa fa-fw fa-undo"></i>Reset</a></button>
                      </div>
                    </th>
                </tr>
              </table>
            </form>
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('receipt_number') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('remarks') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transactions as $transaction): ?>
                    <tr>
                        <td><?= $this->Number->format($transaction->receipt_number) ?></td>
                        <td><?= h($transaction->remarks) ?></td>
                        <td><?= $transaction->has('customer') ? $this->Html->link($transaction->customer->first_name.' '.$transaction->customer->last_name, ['controller' => 'Customers', 'action' => 'view', $transaction->customer->id], ['title' => 'View Customer Details']) : '' ?></td>
                        <!-- <td><?= $transaction->has('location') ? $this->Html->link($transaction->location->name, ['controller' => 'Locations', 'action' => 'view', $transaction->location->id], ['title' => 'View Location Details']) : '' ?></td> -->
                        <td>
                          <div class="btn-group">
                            <button title="<?=$transaction->location->name?>" type="button" style="width: 100px;" class="btn btn-info btn-flat"><?= h($transaction->location->name) ?></button>
                            <button title="Edit Location" type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                              <?php 
                                $allTrans = TableRegistry::get('Transactions');
                                $trans = $allTrans->get($transaction->id);
                                $lid = $trans->location_id;
                                $allLocs = TableRegistry::get('Locations');
                                $locs = $allLocs
                                ->find()
                                ->where(['id !=' => $lid]);
                              ?>
                              <?php foreach ($locs as $loc): ?>
                                <li><a title="<?=$loc->name?>" href="/IS3102_Final/transactions/editLocation/<?=$transaction->id?>/<?=$loc->id?> "><?=$loc->name?></a></li>
                              <?php endforeach; ?>
                            </ul>
                          </div>
                        </td>
                        <td><?= $transaction->has('retailer_employee') ? $this->Html->link($transaction->retailer_employee->first_name.' '.$transaction->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $transaction->retailer_employee->id], ['title' => 'View Employee Details']) : '' ?></td>
                        <td>
                          <?php if($transaction->status == 'Pending') { ?>
                            <div class="btn-group">
                              <button title="Pending" type="button" style="width: 100px;" class="btn btn-danger btn-flat"><?= h($transaction->status) ?></button>
                              <button title="Edit Status" type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a title="Approved" href="/IS3102_Final/transactions/approvedStatus/<?= $transaction->id ?>">Approved</a></li>
                              </ul>
                            </div>
                          <?php } else if ($transaction->status == 'Approved'){ ?>
                            <div class="btn-group">
                              <button title="Approved" type="button" style="width: 100px;" class="btn btn-success btn-flat"><?= h($transaction->status) ?></button>
                            </div>
                          <?php } ?>
                        </td>
                        <td class="actions">
                            <a href="/IS3102_Final/transactions/view/<?=$transaction->id?>">
                            <i class="fa fa-bars" title="View Transaction Details"></i></a>&nbsp
                            <!-- <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->id]) ?> -->
                            <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Transaction')), array('action' => 'delete', $transaction->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $transaction->id))) ?>
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
