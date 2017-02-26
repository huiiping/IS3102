<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Element('retailerLeftSideBar'); ?>

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
              <h3 class="box-title"><?= __('Edit Section') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($section) ?>
                <fieldset>
                    <?php
                        echo $this->Form->input(('sec_name'), ['label' => 'Section Name']);
                        echo $this->Form->input('space_limit');
                        echo $this->Form->input('reserve');
                        echo $this->Form->input('location_id', ['options' => $locations, 'empty' => true]);
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
