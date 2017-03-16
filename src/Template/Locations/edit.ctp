<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Element('retailerLeftSideBar'); ?>
<?php
$this->assign('title', __('Edit') . '/' . __('Add'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Location'), ['controller' => 'Locations', 'action' => 'index']);
$this->Html->addCrumb(__('Edit'));
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
              <h3 class="box-title"><?= __('Edit Location') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($location) ?>
                <fieldset>
                    <?php
                        echo $this->Form->input('name');
                        echo $this->Form->input('address');
                        echo $this->Form->input('contact');
                    ?>
                    <?php if ($location->type == 'Store'): ?>
                    <?php
                       echo 'Type: ';
                        echo $this->Form->radio('type', [
                          ['value' => 'Store', 'text' => 'Store', 'selected' => true],
                          ['value' => 'Warehouse', 'text' => 'Warehouse']
                          ]);
                    ?>
                    <?php else: ?>
                   <?php
                     echo 'Type: ';
                      echo $this->Form->radio('type', [
                        ['value' => 'Store', 'text' => 'Store'],
                        ['value' => 'Warehouse', 'text' => 'Warehouse', 'selected' => true]
                        ]);
                    ?>
                    <?php endif; ?>

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
