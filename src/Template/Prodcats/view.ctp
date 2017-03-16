<?php
use Cake\ORM\TableRegistry;
?>

<?= $this->Element('retailerLeftSideBar'); ?>
<?php
$this->assign('title', __('ProdCats') . '/' . __('View'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('ProdCats'), ['controller' => 'ProdCats', 'action' => 'index']);
$this->Html->addCrumb(__('View'));
?>
<!-- Main Content -->
<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
    <script>
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
      });
    </script>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary" style="height: 100%;">
          <div class="box-body box-profile">
            <div class="box-header with-border">
              <h3 class="box-title"><?= h($prodCat->cat_name) ?></h3>

              <div class="pull-right">
                <a class="btn btn-default btn-flat" href="/IS3102_Final/prod-cats/edit/<?= $prodCat->id ?>" >Edit Product Category</a>
              </div>
              <br>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <tr>
                  <th scope="row"><?= __('Id') ?></th>
                  <td><?= $this->Number->format($prodCat->id) ?></td>
                </tr>
                <tr>
                  <th scope="row"><?= __('Parent Id') ?></th>
                  <?php if(!empty($prodCat->parentid)) : ?>
                    
                    <?php 
                    $ProdCats = TableRegistry::get('ProdCats');
                    $catName = $ProdCats
                    ->find()
                    ->where(['id' => $prodCat['parentid']])
                    ->extract('cat_name');

                    foreach ($catName as $result){
                    }

                    ?>
                    <?php $result ?>
                    <td><a href="/IS3102_Final/prod-cats/view/<?= $prodCat->parentid ?>" data-toggle="tooltip" data-placement="right" title= "<?php echo $result ?>" > <?= h($prodCat->parentid)?></a></td>
                  <?php else : ?>
                    <td><?= h('None') ?></td>
                  <?php endif; ?>
                </tr>
                <tr>
                  <th scope="row"><?= __('Category Name') ?></th>
                  <td><?= h($prodCat->cat_name) ?></td>
                </tr>
                <tr>
                  <th scope="row"><?= __('Category Description') ?></th>
                  <td><?= $this->Text->autoParagraph(h($prodCat->cat_desc)); ?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
