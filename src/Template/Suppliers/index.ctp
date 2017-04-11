<?php
$this->assign('title', __('Retailers') . '/' . __('Index'));
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Supplier'));
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Search Suppliers') ?></h3>
        </div>
        <div class="box-body">
          <div class="pull-right">
            <a class="btn btn-success btn-block" title="Create New Supplier" href="/IS3102_Final/suppliers/add" >Create New Supplier</a>
          </div>
          <br>
          <form method="post" accept-charset="utf-8" action="/IS3102_Final/suppliers">
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
                        <!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
                        <!--<th scope="col"><?= $this->Paginator->sort('username') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('password') ?></th>-->
                        <th scope="col"><?= $this->Paginator->sort('supplier_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                        <!-- <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th> -->
                        <th scope="col"><?= $this->Paginator->sort('country') ?></th>
                        <!-- <th scope="col"><?= $this->Paginator->sort('activation_status') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('activation_token') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('recovery_status') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('recovery_token') ?></th> -->
                        <th scope="col"><?= $this->Paginator->sort('bank_acc') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($suppliers as $supplier): ?>
                    <tr>
                        <!-- <td><?= $this->Number->format($supplier->id) ?></td> -->
                        <!--<td><?= h($supplier->username) ?></td>
                        <td><?= h($supplier->password) ?></td>-->
                        <td>
                            <?= $this->Html->link(__($supplier->supplier_name), ['action' => 'view', $supplier->id], ['title' => 'View Supplier Details']) ?>
                        </td>
                        <td>
                            <a href="mailto:<?= h($supplier->email) ?>" title="Email">
                          <?= h($supplier->email) ?>
                        </a>
                        </td>
                        <td>
                            <a href="tel:+<?= h($supplier->contact) ?>" title="Call Contact">
                          <?= h($supplier->contact) ?>
                        </a>
                        </td>
                        <td><?= h($supplier->address) ?></td>
                        <!-- <td><?= $this->Time->format(h($supplier->created), 'd MMM YYYY, hh:mm') ?></td>
                        <td><?= $this->Time->format(h($supplier->modified), 'd MMM YYYY, hh:mm') ?></td> -->
                        <td><?= h($supplier->country) ?></td>
                        <!-- <td><?= h($supplier->activation_status) ?></td>
                        <td><?= h($supplier->activation_token) ?></td>
                        <td><?= h($supplier->recovery_status) ?></td>
                        <td><?= h($supplier->recovery_token) ?></td> -->
                        <td><?= h($supplier->bank_acc) ?></td>
                        <td class="actions">
                            <a href="/IS3102_Final/suppliers/edit/<?=$supplier->id?>">
                              <i class="fa fa-edit" title="Edit Supplier Details"></i></a>&nbsp
                            <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Supplier')), array('action' => 'delete', $supplier->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $supplier->id))) ?>&nbsp
                            <a href="/IS3102_Final/SupplierMemos/add/<?=$supplier->id?>/<?=$supplier->supplier_name?>">
                              <i class="fa fa-sticky-note-o" title="Create Supplier Memo"></i></a>&nbsp
                            <a href="/IS3102_Final/Rfqs/add/<?=$supplier->id?>">
                              <i class="fa fa-file-text-o" title="Request Quotation"></i></a>&nbsp
                            <!-- <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $supplier->id]) ?> -->
                            <!-- <?= $this->Html->link(__('New Memo'), ['controller'=>'SupplierMemos', 'action' => 'add', $supplier->id, $supplier->supplier_name]) ?>&nbsp -->
                            <!-- <?= $this->Form->postLink(__('| Delete'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]) ?> -->
                            <!-- <?= $this->Html->link(__('Request Quotation'), ['controller'=>'Rfqs','action' => 'add', $supplier->id]) ?> -->
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
