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
              <h3 class="box-title"><?= __('Edit Message') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($message) ?>
                <fieldset>
                    <?php
                        echo $this->Form->input('title');
                        echo $this->Form->input('date_created', ['empty' => true]);
                        echo $this->Form->input('message');
                        echo $this->Form->input('status');
                        echo $this->Form->input('reference_id');
                        echo $this->Form->input('sender_id');
                        echo $this->Form->input('retailer_employees._ids', ['options' => $retailerEmployees]);
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
