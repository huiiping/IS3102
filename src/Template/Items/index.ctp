<?php
$this->assign('title', __('Items') . '/' . __('Index'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Items'));
?>

<!-- Main content -->
<section class="content" style="min-height: 550px">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= __('Items') ?></h3>
          </div>
          <div class="box-body">
          <!-- <div class="pull-right">
            <a class="btn btn-success btn-block" title="Create New Item" href="/IS3102_Final/items/add" >Create New Item</a>
          </div> -->
            <!--<legend><h4><?= __('Search') ?></h4></legend>-->
            <form method="post" accept-charset="utf-8" action="/IS3102_Final/items">
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
          <!-- <div class="pull-right">
            <a class="btn btn-info btn-block" title="Manage Inbound Goods" href="/IS3102_Final/items/inbound" >Manage Inbound Goods</a>
          </div>
          <br><br>
          <div class="pull-right">
            <a class="btn btn-info btn-block" title="Manage Inbound Goods" href="/IS3102_Final/items/outbound" >Manage Outbound Goods</a>
          </div>
            <br><br> -->
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('EPC') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Barcode') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('section_id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= $this->Number->format($item->id) ?></td>
                        <td>
                            <?= $this->Html->link(__($item->name), ['action' => 'view', $item->id], ['title' => 'View Item Details']) ?>
                        </td>
                        <td><?= h($item->description) ?></td>
                        <td><?= h($item->EPC) ?></td>
                        <td><?= h($item->product->barcode) ?></td>
                        <td><?= h($item->status) ?></td>
                        <td><?= $item->has('product') ? $this->Html->link($item->product->prod_name, ['controller' => 'Products', 'action' => 'view', $item->product->id], ['title' => 'View Product Details']) : '' ?></td>
                        <td><?= $item->has('location') ? $this->Html->link($item->location->name, ['controller' => 'Locations', 'action' => 'view', $item->location->id], ['title' => 'View Location Details']) : '' ?></td>
                        <td><?= $item->has('section') ? $this->Html->link($item->section->sec_name, ['controller' => 'Sections', 'action' => 'view', $item->section->id], ['title' => 'View Section Details']) : '' ?></td>
                        <td class="actions">
                            <a href="/IS3102_Final/items/edit/<?=$item->id?>">
                            <i class="fa fa-edit" title="Edit Item Details"></i></a>&nbsp
                            <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Item')), array('action' => 'delete', $item->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $item->id))) ?>
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
