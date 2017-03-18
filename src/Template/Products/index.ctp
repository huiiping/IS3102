<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?php
$this->assign('title', __('Products') . '/' . __('Index'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Products'));
?>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Products') ?></h3>
        </div>
        <div class="box-body">
        <div class="pull-right">
                <a class="btn btn-default btn-block" title="Create New Feedback" href="/IS3102_Final/products/add" >Create New Product</a>
            </div>
            <br>
          <!--<h3><?= __('Search') ?></h3>-->
          <form method="post" accept-charset="utf-8" action="/IS3102_Final/feedbacks">
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
                    <th scope="col"><?= $this->Paginator->sort(('prod_name'), ['label' => 'Product Name'])?></th>
                    <th scope="col"><?= $this->Paginator->sort(('prod_cat_id'),['label' => 'Product Category']) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('store_unit_price') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('web_store_unit_price') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('SKU') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td style="max-width: 150px;"><?= $this->Number->format($product->id) ?></td>
                        <td style="max-width: 150px;"><?= $this->Html->link(__(h($product->prod_name)),['action' => 'view', $product->id], ['title' => 'View Product Details']) ?></td>
                        <td style="max-width: 150px;"><?= $product->has('prod_cat') ? $this->Html->link($product->prod_cat->cat_name, ['controller' => 'ProdCats', 'action' => 'view', $product->prod_cat->id]) : '' ?></td>
                        <td style="max-width: 150px;"><?= $this->Number->format($product->store_unit_price) ?></td>
                        <td style="max-width: 150px;"><?= $this->Number->format($product->web_store_unit_price) ?></td>
                        <td style="max-width: 150px;"><?= h($product->SKU) ?></td>
                    
                        <td><a href="/IS3102_Final/products/edit/<?=$product->id?>"><i class="fa fa-edit" title="Edit Product Details"></i></a>&nbsp<?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Product')), array('action' => 'delete', $product->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $product->id))) ?></td>
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
