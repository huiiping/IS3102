<?php
use Cake\ORM\TableRegistry;
?>

<!-- AdminLTE App -->
<?= $this->Html->script('app.min.js') ?>
<!-- <?= $this->Html->script('jquery-1.4.2.min.js') ?>
<?= $this->Html->script('jsLabel2PDF.js') ?>
<?= $this->Html->script('base64.js') ?>
<?= $this->Html->script('sprintf.js') ?>
<?= $this->Html->script('JsBarcode.all.min.js') ?> -->

<?php
$this->assign('title', __('Products') . '/' . __('Index'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('ProdCats'), ['controller' => 'ProdCats', 'action' => 'index']);
$this->Html->addCrumb(__('Products'));
?>
<!-- Main content -->
<section class="content" style="min-height: 550px">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Products') ?></h3>
        </div>
        <div class="box-body">
          <div class="pull-right">
            <a class="btn btn-success btn-block" title="Create New Product" href="/IS3102_Final/products/add" >Create New Product</a>
          </div>
          <br>
          <!--<h3><?= __('Search') ?></h3>-->
          <form method="post" accept-charset="utf-8" action="/IS3102_Final/products">
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
                <th scope="col"><?= $this->Paginator->sort(('prod_name'), ['label' => 'Product Name'])?></th>
                <th scope="col"><?= $this->Paginator->sort(('prod_cat_id'),['label' => 'Product Category']) ?></th>
                <th scope="col"><?= $this->Paginator->sort(('store_unit_price'), ['title' => 'Store Unit Price ($)']) ?></th>
                <th scope="col"><?= $this->Paginator->sort(('web_store_unit_price'), ['title' => 'Web Store Unit Price ($)']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('SKU') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $product): ?>
                <tr>
                  <td style="max-width: 150px;"><?= $this->Html->link(__(h($product->prod_name)),['action' => 'view', $product->id], ['title' => 'View Product Details']) ?></td>


                  <?php
                  //Getting the Product Cat name using the prod_Cat_ID 
                  $session = $this->request->session();
                  $productCats = TableRegistry::get('ProdCats');
                  $catID = $product->prod_cat_id;
                  $productCat = $productCats
                  ->find()
                  ->where(['id' => $catID])
                  ->extract('cat_name');

                  foreach ($productCat as $name){
                  $session->write('catName',$name);
                  }
                  ?>

                  <td style="max-width: 150px;"><?= $product->has('prod_cat') ? $this->Html->link($session->read('catName'), ['controller' => 'ProdCats', 'action' => 'view', $product->prod_cat_id], ['title' => 'View Product Category Details']) : '' ?></td>
                  <td style="max-width: 150px;"><?= $this->Number->format($product->store_unit_price) ?></td>
                  <td style="max-width: 150px;"><?= $this->Number->format($product->web_store_unit_price) ?></td>
                  <td style="max-width: 150px;"><?= h($product->SKU) ?></td>

                  <td><a href="/IS3102_Final/products/edit/<?=$product->id?>"><i class="fa fa-edit" title="Edit Product Details"></i></a>&nbsp<?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Product')), array('action' => 'delete', $product->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $product->id))) ?>&nbsp<a href="/IS3102_Final/products/" target="_blank"><i class="fa fa-print" title="Print Price Label" onclick="printLabel('<?=$product->prod_name?>', '<?=$product->web_store_unit_price?>', '<?=$product->barcode?>')"></i></a></td>
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

<!-- <script>

  function printLabel(name, price, barcode) {
    price = "$SGD" + price;
    img = toBarcode(barcode);

    jQuery.CreateTemplate("inches",8.268,11.693,0.3815,0.5965,2.5,1.5,7,3,0.0,0.0);
    jQuery.CreateLabel();
    jQuery.AddText(1.1,0.8, name ,12);
    jQuery.AddText(1.1,0.6, barcode ,10);
    jQuery.AddText(0.9,0.4, price ,10);
    jQuery.DrawPDF();
  }

  function toBarcode(text){
    var canvas = document.createElement("canvas");
    JsBarcode(canvas, text, {format: "CODE39"});
    popup = window.open(canvas.toDataURL("image/png"));
    popup.print();
    return canvas.toDataURL("image/png");
  }


</script> -->

