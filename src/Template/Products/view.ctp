<?php
$this->assign('title', __('Products') . '/' . __('View'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('ProdCats'), ['controller' => 'ProdCats', 'action' => 'index']);
$this->Html->addCrumb(__('Products'), ['controller' => 'Products', 'action' => 'index']);
$this->Html->addCrumb(__('View Product'));
?>

<!-- Main content -->
<section class="content" style="min-height: 550px">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= h($product->prod_name) ?></h3>
        </div>
        <div class="box-body">
        <div class="pull-right">
                <a class="btn btn-success btn-block" title="Add Product Specification" href="/IS3102_Final/products/add2">Add Product Specification</a>
          
                <a class="btn btn-success btn-block" title="Edit Product Details" href="/IS3102_Final/products/edit/<?=$product->id?>">Edit Product</a>
                <br>
            </div>

            <br><br><br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($product->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Product Name') ?></th>
                    <td><?= h($product->prod_name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Product Description') ?></th>
                    <td><?= $this->Text->autoParagraph(h($product->prod_desc)); ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Product Category') ?></th>
                    <td><?= $product->has('prod_cat') ? $this->Html->link($product->prod_cat->cat_name, ['controller' => 'ProdCats', 'action' => 'view', $product->prod_cat->id], ['title' => 'View Product Category Details']) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('SKU') ?></th>
                    <td><?= h($product->SKU) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Store Unit Price ($)') ?></th>
                    <td><?= $this->Number->format($product->store_unit_price) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Web Store Unit Price ($)') ?></th>
                    <td><?= $this->Number->format($product->web_store_unit_price) ?></td>
                </tr>
            </table>
            <br>
            <div class="related">
                <h4><?= __('Specifications of Product') ?></h4>
                <?php if (!empty($product->prod_specifications)): ?>
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                            <th scope="col"><?= __('Title') ?></th>
                            <th scope="col"><?= __('Description') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                      </thead>
                        <?php foreach ($product->prod_specifications as $prodSpecifications): ?>
                            <tr>
                                <td>
                                    <?= $this->Html->link(__($prodSpecifications->title), ['controller' => 'ProdSpecifications', 'action' => 'view', $prodSpecifications->id, $product->id], ['title' => 'View Product Specification Details']) ?>
                                </td>
                                <td><?= h($prodSpecifications->description) ?></td>
                                <td class="actions">
                                    <!--<?= $this->Html->link(__('Edit'), ['controller' => 'ProdSpecifications', 'action' => 'edit', $prodSpecifications->title]) ?>-->
                                    <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Product Specification')), array('action' => 'delete', $prodSpecifications->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $prodSpecifications->id))) ?>
                                    <!-- <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProdSpecifications', 'action' => 'delete', $prodSpecifications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prodSpecifications->id)]) ?> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </div>
            <div class="related">
                <?php if (!empty($prodType->promotions)): ?>
                    <h4><?= __('Related Promotions') ?></h4>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Start Date') ?></th>
                            <th scope="col"><?= __('End Date') ?></th>
                            <th scope="col"><?= __('Promo Desc') ?></th>
                            <th scope="col"><?= __('First Voucher Num') ?></th>
                            <th scope="col"><?= __('Last Voucher Num') ?></th>
                            <th scope="col"><?= __('Discount Rate') ?></th>
                            <th scope="col"><?= __('Credit Card Type') ?></th>
                            <th scope="col"><?= __('Retailer Employee Id') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->promotions as $promotions): ?>
                            <tr>
                                    <!--<td><?= h($promotions->id) ?></td>
                                    <td><?= h($promotions->start_date) ?></td>
                                    <td><?= h($promotions->end_date) ?></td>
                                    <td><?= h($promotions->promo_desc) ?></td>
                                    <td><?= h($promotions->first_voucher_num) ?></td>
                                    <td><?= h($promotions->last_voucher_num) ?></td>
                                    <td><?= h($promotions->discount_rate) ?></td>
                                    <td><?= h($promotions->credit_card_type) ?></td>
                                    <td><?= h($promotions->retailer_employee_id) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Promotions', 'action' => 'view', $promotions->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Promotions', 'action' => 'edit', $promotions->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Promotions', 'action' => 'delete', $promotions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotions->id)]) ?>
                                    </td>-->
                                    <td>
                                        <?= $this->Html->link(__(h($promotions->first_voucher_num).' '.h($promotions->last_voucher_num)), ['controller' => 'Promotions', 'action' => 'view', $promotions->id]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>
