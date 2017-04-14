<?php
$this->assign('title', __('Products') . '/' . __('View'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('ProdCats'), ['controller' => 'ProdCats', 'action' => 'index']);
$this->Html->addCrumb(__('Products'), ['controller' => 'Products', 'action' => 'index']);
$this->Html->addCrumb(__("Product's Details"), ['controller' => 'Products', 'action' => 'view', $prod->id]);
$this->Html->addCrumb(__('View Product Specification'));
?>

<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= h($prodSpecification->title) ?></h3>
          </div>
          <div class="box-body">
            <div class="pull-right">
                <a class="btn btn-success btn-block" title="Add Product Specification" href="/IS3102_Final/ProdSpecifications/edit/<?=$prodSpecification->id?>/<?=$prod->id?>">Edit Product Specification</a>
            </div>
              <br><br><br>
              <!-- <h3><?= h($prodSpecification->title) ?></h3> -->
              <table class="table table-bordered table-striped">
                  <tr>
                      <th scope="row"><?= __('Id') ?></th>
                      <td><?= h($prodSpecification->id) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Title') ?></th>
                      <td><?= h($prodSpecification->title) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Description') ?></th>
                      <td><?= h($prodSpecification->description) ?></td>
                  </tr>
              </table><br>
              <!-- <div class="related">
                  <?php if (!empty($prodSpecification->products)): ?>
                  <br><h4><?= __('Related Products') ?></h4>
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                          <th scope="col"><?= __('Id') ?></th>
                          <th scope="col"><?= __('Prod Name') ?></th>
                          <th scope="col"><?= __('Prod Desc') ?></th>
                          <th scope="col"><?= __('Store Unit Price') ?></th>
                          <th scope="col"><?= __('Web Store Unit Price') ?></th>
                          <th scope="col"><?= __('SKU') ?></th>
                          <th scope="col"><?= __('Prod Cat Id') ?></th>
                          <th scope="col" class="actions"><?= __('Actions') ?></th>
                      </tr>
                    </thead>
                      <?php foreach ($prodSpecification->products as $products): ?>
                      <tr>
                          <td><?= h($products->id) ?></td>
                          <td><?= h($products->prod_name) ?></td>
                          <td><?= h($products->prod_desc) ?></td>
                          <td><?= h($products->store_unit_price) ?></td>
                          <td><?= h($products->web_store_unit_price) ?></td>
                          <td><?= h($products->SKU) ?></td>
                          <td><?= h($products->prod_cat_id) ?></td>
                          <td class="actions">
                              <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                              <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                          </td>
                      </tr>
                      <?php endforeach; ?>
                  </table>
                  <?php endif; ?>
              </div> -->
          </div>
        </div>
    </div>
</section>
