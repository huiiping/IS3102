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
                <h3 class="box-title"><?= __('Create New Message') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($message) ?>
                <fieldset>
                    <?php
                        echo $this->Form->input('title');
                        echo $this->Form->input('date_created', [
                            'select' => '0000:00:00 00:00:00']);
                        echo $this->Form->input('message');
                        echo $this->Form->hidden('status', ['dafult' => false]);
                        echo $this->Form->input('attachment');
                        echo $this->Form->input('attachmentID');
                        $session = $this->request->session();
                        echo $this->Form->hidden('sender_id', ['value'=>$session->read('retailer_employee_id')]);
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

