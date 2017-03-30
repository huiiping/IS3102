<!-- Main content -->
<section class="content" style="min-height: 550px">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Section</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/sections/edit/<?=$section->id?>">
            <div style="display:none;">
              <input type="hidden" name="_method" value="PUT">
            </div>
            <div class ="form-group">          
              <div class="input-group" title="Enter Section Name*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                <input class = "form-control" type="text" placeholder = "Section Name*" name="sec_name" required="required" id="sec_name" value="<?=$section->sec_name?>" maxlength="100"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Maximum Space Avaliable in Units*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-inbox"></i></span>
                <input class = "form-control" type="number" placeholder = "Maximum Space Avaliable in Units*" name="space_limit" required="required" id="space_limit" value="<?=$section->space_limit?>" min="0"> 
              </div>
            </div>
            <div class ="form-group">
              <div class="input-group" title="Enter Reserve Space in Units">
                <span class="input-group-addon"><i class="glyphicon glyphicon-inbox"></i></span>
                <input class = "form-control" type="number" placeholder = "Reserve Space in Units" name="reserve_space" id="reserve_space" value="<?=$section->reserve_space?>" min="0" max="<?=$section->space_limit?>"> 
              </div>
            </div>
            <br>
            <div class ="row">
              <a href="/IS3102_Final/sections/index" class="btn btn-md btn-primary pull-left" style="border-radius: 8px; margin:5px;">Back to Section Index</a>
              <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Save Section</button>
            </div>
            <br>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!--<div class="sections form large-9 medium-8 columns content">
    <?= $this->Form->create($section) ?>
    <fieldset>
        <legend><?= __('Edit Section') ?></legend>
        <?php
            echo $this->Form->input('sec_name');
            echo $this->Form->input('available_space');
            echo $this->Form->input('space_limit');
            echo $this->Form->input('reserve');
            echo $this->Form->input('location_id', ['options' => $locations, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->
