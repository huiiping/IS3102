<?php
use Cake\ORM\TableRegistry;
?>
<?php
$this->assign('title', __('ProdCats') . '/' . __('Index'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Product Category'));
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Product Categories') ?></h3>
        </div>
        <div class="box-body">
          <div class="pull-right">
            <a class="btn btn-default btn-block" title="Create New Product Category" href="/IS3102_Final/prod-cats/add" >Create New Product Category</a>
          </div>
          <br>

          <br>
          <!--<legend><h4><?= __('Search') ?></h4></legend>-->
          <form method="post" accept-charset="utf-8" action="/IS3102_Final/prod-cats">
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
                <th scope="col"><?= $this->Paginator->sort('parentid', ['label' => 'Parent Category']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('cat_name', ['label' => 'Category Name']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('cat_desc', ['label' => 'Category Description']) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($prodCats as $prodCat): ?>
                <tr>

                  <?php
                  //Getting the Product Cat name using the prod_Cat_ID 
                  $session = $this->request->session();
                  $productCats = TableRegistry::get('ProdCats');
                  $catID = $prodCat->parentid;

                  if (!($catID == NULL)) {
                  $productCat = $productCats
                  ->find()
                  ->where(['id' => $catID])
                  ->extract('cat_name');

                  foreach ($productCat as $name){
                    $session->write('catName',$name);
                  }
                } else {
                  $session->write('catName',$catID);
                }
                  ?>
                  <td style="max-width: 150px;"><?= $this->Html->link(__($session->read('catName')), ['action' => 'view', $prodCat->parentid]) ?></td>
                  <td style="max-width: 150px;"><?= $this->Html->link(__($prodCat->cat_name), ['action' => 'view', $prodCat->id]) ?></td>
                  <td style="max-width: 150px;"><?= h($prodCat->cat_desc) ?></td>
                  <td class="actions">
                    <a href="/IS3102_Final/prod-cats/edit/<?=$prodCat->id?>"><i class="fa fa-edit" title="Edit Product Category"></i></a>&nbsp<?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Product Category')), array('action' => 'delete', $prodCat->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $prodCat->id))) ?></td>
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
</div>
