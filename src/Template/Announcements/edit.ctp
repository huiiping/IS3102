<?php
$this->assign('title', __('Announcement') .'/'. 'Edit' );
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Announcements'), ['controller' => 'Announcements', 'action' => 'index']);
$this->Html->addCrumb(__('Edit Announcement'));
?>

<!-- Bootstrap WYSIHTML5 -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
$(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('message');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>

<!-- Main content -->
<section class="content">
    <div class="row">
    <div class="col-md-offset-2 col-md-8">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Announcement</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/announcements/edit/<?=$announcement->id?>">
            <div style="display:none;">
              <input type="hidden" name="_method" value="PUT">
            </div>
            <div class ="form-group">          
              <div class="input-group" title="Enter Title*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input class = "form-control" type="text" value = "<?=$announcement->title?>" name="title" required="required" id="title" maxlength="255"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Message*">
                <div class="box-body pad">
                  <textarea id="message" name="message" rows="10" cols="80" required="required" maxlength="255"><?=$announcement->message?></textarea>
                </div>
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Remarks">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input class = "form-control" type="text" value = "<?=$announcement->remarks?>" name="remarks" id="remarks" maxlength="255"> 
              </div>
            </div>
            <br>
            <div class ="row">
              <a href="/IS3102_Final/announcements/index" class="btn btn-md btn-default pull-left" style="border-radius: 8px; margin:5px;">Back to Announcement Index</a>
              <button class="btn btn-md btn-default pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Edit Announcement</button>
            </div>
            <br>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
