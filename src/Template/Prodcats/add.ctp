<?php
use Cake\ORM\TableRegistry;
?>

<?= $this->Element('retailerLeftSideBar'); ?>
<?php
$this->assign('title', __('ProdCats') . '/' . __('Add'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('ProdCats'), ['controller' => 'ProdCats', 'action' => 'index']);
$this->Html->addCrumb(__('Add'));
?>
<!-- Main Content -->
<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
  </section>
  <!-- Main content -->
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= __('Create New Product Category') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($prodCat) ?>
                <fieldset>
                    <?php
                    echo $this->Form->input('cat_name');
                    echo $this->Form->input('cat_desc');
                    $prodCats = TableRegistry::get('prodCats');
                    $query = $prodCats->find('all');
                    $results = $query->all()
                    ->extract('id');
                    $data= $results->toArray();

                    echo $this->Form->input('parentid', array('type' => 'select', 'options' => array_combine($data, $data), 'empty' => true));
                    ?>
                </fieldset>
                <br>
                <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?>
                <?= $this->Form->end() ?>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
