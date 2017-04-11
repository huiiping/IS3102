<?php
$this->assign('title', __('Announcements') .'/'. 'Add');
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Announcements'), ['controller' => 'Announcements', 'action' => 'index']);
$this->Html->addCrumb(__('Create New Announcement'));
?>



<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-md-offset-2 col-md-8">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Create New Announcement</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/announcements/add">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>
            <div class ="form-group">          
              <div class="input-group" title="Enter Title*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                <input class = "form-control" type="text" placeholder = "Title*" name="title" required="required" id="title" maxlength="255"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Message*">
                <div class="box-body pad">
                  <textarea id="message2" name="message" rows="10" cols="80" required="required" maxlength="255">Enter Message Here*</textarea>
                </div>
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Remarks">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <input class = "form-control" type="text" placeholder = "Remarks" name="remarks" id="remarks" maxlength="255"> 
              </div>
            </div>
            <br>
            <div class ="row">
              <a href="/IS3102_Final/announcements/index" class="btn btn-md btn-primary pull-left" style="border-radius: 8px; margin:5px;">Back to Announcement Index</a>
              <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Save Announcement</button>
            </div>
            <br>
          </form>
          <!--<?= $this->Form->create($announcement, array('novalidate' => true)) ?>
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
              <?= $this->Form->end() ?>-->
        </div>
      </div>
    </div>
    </div>
</section>
