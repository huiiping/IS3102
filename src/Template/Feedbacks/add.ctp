<?php
$this->assign('title', __('Feedbacks') . '/' . __('Add'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Feedbacks'), ['controller' => 'feedbacks', 'action' => 'index']);
$this->Html->addCrumb(__('Create New Feedback'));
?>

<?= $this->Element('retailerLeftSideBar'); ?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Create New Feedback</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/feedbacks/add">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>
            <div class ="form-group">          
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input class = "form-control" type="text" placeholder = "First Name*" name="first_name" required="required" id="first_name" maxlength="255"> 
              </div>
            </div>

                <fieldset>
                    <?php
                        echo $this->Form->control('customer_id', ['options' => $customers, 'empty' => true]);
                        echo $this->Form->control('customer_first_name');
                        echo $this->Form->control('customer_last_name');
                        echo $this->Form->control('customer_contact');
                        echo $this->Form->control('customer_email');
                        echo $this->Form->control('message');
                        echo $this->Form->control('status');
                        echo $this->Form->control('customer_id', ['options' => $customers, 'empty' => true]);
                        echo $this->Form->control('product_id', ['options' => $products, 'empty' => true]);
                        echo $this->Form->control('item_id', ['options' => $items, 'empty' => true]);
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
