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
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
$(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
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
                    <div class="box-body pad">
                      <textarea id="editor1" name="editor1" rows="10" cols="80">
                                              This is my textarea to be replaced with CKEditor.
                      </textarea>
              </div>
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