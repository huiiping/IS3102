<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?php
$this->assign('title', __('RFQ') . '/' . __('Add'));
$this->Html->addCrumb(__('RFQ'), ['controller' => 'Rfqs', 'action' => 'index']);
$this->Html->addCrumb(__('Add'));
?>
  <!-- Main content -->
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= __('Create New RFQ') ?></h3>
            </div>
            <div class="box-body">
            <form method="post" accept-charset="utf-8" action="/IS3102_Final/rfqs/add">
                <div style="display:none;">
                  <input type="hidden" name="_method" value="POST">
                  <input type="hidden" name="retailer_employee_id" value="<?php echo $this->request->session()->read('retailer_employee_id') ?>">
                </div>
                <div class ="form-group">          
                  <div class="input-group">
                    <input class = "form-control" type="text" placeholder = "Title*" name="title" required="required" id="title" maxlength="100"> 
                  </div>
                </div>
                <div class ="form-group">
                  <div class="input-group">
                    Message: <br >
                    <textarea name="message" placeholder = "Enter your message.." required="required" id="remarks" rows="4" cols="50"></textarea>
                  </div>
                </div>
                <div class ="form-group">          
                  <div class="input-group">
                   Closing date: <br > 
                    <input class = "form-control" type="date" placeholder = "closing date*" name="end_date" required="required" id="end_date"> 
                  </div>
                </div>
                <div class ="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span>
                        <input type="hidden" name="suppliers[_ids]" value="">
                        <select name="suppliers[_ids][]" class='selectpicker form-control' multiple data-selected-text-format="count > 3" title = "Select Supplier(s)*">
                            <?php foreach ($suppliers as $supplier): ?>
                              <option <?php if($supplier->id == $id){ echo("selected") ;} ?>
                              value="<?= $supplier->id ?>"><?php echo $supplier->supplier_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <br >
                <input type="submit" class="btn btn-default btn-flat" value="Create">
              </form>
            </div>
          </div>
        </div>
      </div>
  </section>
