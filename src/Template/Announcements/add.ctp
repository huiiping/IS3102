<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('Announcements') );
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Announcements'), ['controller' => 'Announcements', 'action' => 'index']);

?>
<?= $this->Element('intrasysLeftSideBar'); ?>
<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
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
              <h3 class="box-title"><?= __('Create New System Announcement') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($announcement, array('novalidate' => true)) ?>
                <fieldset>
                    <?php
                        echo $this->Form->input('title');
                        echo $this->Form->input('message', array('type' => 'textarea'));
                        echo $this->Form->input('remarks');
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