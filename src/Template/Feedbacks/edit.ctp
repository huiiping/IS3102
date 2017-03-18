<?php
$this->assign('title', __('Feedbacks') . '/' . __('Edit'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Feedbacks'), ['controller' => 'feedbacks', 'action' => 'index']);
$this->Html->addCrumb(__('Edit Feedback'));
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Feedback</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form id = "feedbackForm" method="post" accept-charset="utf-8" action="/IS3102_Final/feedbacks/edit/<?=$feedback->id?>">
            <div style="display:none;">
              <input type="hidden" name="_method" value="PUT">
            </div>

            <div class ="form-group">            
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span>
                <input type="hidden" name="customer_id" value="<?=$feedback->customer_id ?>">

                <select name="customer_id" class='selectpicker form-control' title ="Select Customer Id" data-live-search="true" >
                  <option label=" " ></option> 
                  <?php foreach ($customers as $customer): ?>
                    <?php if ($customer == $feedback->customer_id) :?>
                      <option selected="selected"><?=$feedback->customer_id ?></option>
                    <?php else: ?>                       
                   <option><?php echo $customer ?></option>
                   <?php endif; ?> 
                 <?php endforeach; ?>
               </select>
             </div> 
           </div>

            <div class ="form-group">          
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input class = "form-control" type="text" value = "<?=$feedback->customer_first_name?>" name="customer_first_name" required="required" id="customer_first_name" maxlength="255"> 
              </div>
            </div>

            <div class ="form-group">          
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input class = "form-control" type="text" value = "<?=$feedback->customer_last_name?>" name="customer_last_name" required="required" id="customer_last_name" maxlength="255"> 
              </div>
            </div>

            <div class ="form-group">
              <div class="input-group">
                <span class="input-group-addon">@</span>
                <input class = "form-control" type="customer_email" value = "<?=$feedback->customer_email?>" name="customer_email" id="customer_email" maxlength="255"> 
              </div>
            </div>

            <div class ="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input class = "form-control" type="text" value = "<?=$feedback->customer_contact?>" name="customer_contact" required="required" id="customer_contact" maxlength="100"> 
              </div>
            </div>

            <div class ="form-group">            
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span>
                <input type="hidden" name="product_id" value = "<?=$feedback->product_id ?>">

                <select name="product_id" class='selectpicker form-control' title ="Select Product" data-live-search="true">
                <option label=" " ></option> 
                  <?php foreach ($products as $product): ?>
                    <?php if ($product == $feedback->product_id) :?>
                      <option selected="selected"><?=$feedback->product_id ?></option>
                    <?php else: ?>                       
                   <option><?php echo $product ?></option> 
                   <?php endif; ?>
                 <?php endforeach; ?>
               </select>
             </div> 
           </div>

           <div class ="form-group">            
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span>
              <input type="hidden" name="item_id" value = "<?=$feedback->item_id?>">
              <select name="item_id" class='selectpicker form-control' title ="Select Item" data-live-search="true">
              <option label=" " ></option> 
                <?php foreach ($items as $item): ?>
                  <?php if ($product == $feedback->item_id) :?>
                      <option selected="selected"><?=$feedback->item_id ?></option>
                    <?php else: ?>
                 <option><?php echo $item ?></option>
                 <?php endif; ?>
               <?php endforeach; ?>
             </select>
           </div> 
         </div>

            <div class ="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <textarea rows="5" class = "form-control" type="textarea" name="message" required="required" placeholder = "Message*" id="message"><?=$feedback->message?></textarea>
              </div>
            </div>

         <div class ="row">
         <button class="btn btn-md btn-default pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Edit Feedback</button>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</div>
