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

          <form id = "feedbackForm" method="post" accept-charset="utf-8" action="/IS3102_Final/feedbacks/add">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>

            <div class ="form-group">            
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span>
                <input type="hidden" name="customer_id" value="">

                <select name="customer_id" class='selectpicker form-control' title ="Select Customer Id" data-live-search="true">
                  <option label=" " >No Customer ID</option> 
                  <?php foreach ($customers as $customer): ?>
                    <option><?php echo $customer ?></option> 
                  <?php endforeach; ?>
                </select>
              </div> 
            </div>

            <div class ="form-group">          
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input class = "form-control" type="text" placeholder = "Customer First Name*" name="customer_first_name" required="required" id="customer_first_name" maxlength="255"> 
              </div>
            </div>

            <div class ="form-group">          
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input class = "form-control" type="text" placeholder = "Customer Last Name*" name="customer_last_name" required="required" id="customer_last_name" maxlength="255"> 
              </div>
            </div>

            <div class ="form-group">
              <div class="input-group">
                <span class="input-group-addon">@</span>
                <input class = "form-control" type="customer_email" placeholder = "Customer Email" name="customer_email" id="email" maxlength="255"> 
              </div>
            </div>

            <div class ="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input class = "form-control" type="text" placeholder = "Contact Number*" name="customer_contact" required="required" id="customer_contact" maxlength="100"> 
              </div>
            </div>

            <div class ="form-group">            
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span>
                <input type="hidden" name="product_id" value="">

                <select name="product_id" class='selectpicker form-control' title ="Select Product" data-live-search="true">
                <option label=" " >No Product</option> 
                  <?php foreach ($products as $product): ?>
                   <option><?php echo $product ?></option> 
                 <?php endforeach; ?>
               </select>
             </div> 
           </div>

           <div class ="form-group">            
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span>
              <input type="hidden" name="item_id" value="">
              <select name="item_id" class='selectpicker form-control' title ="Select Item" data-live-search="true">
              <option label=" " >No Item</option> 
                <?php foreach ($items as $item): ?>
                 <option><?php echo $item ?></option>
               <?php endforeach; ?>
             </select>
           </div> 
         </div>

            <div class ="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <textarea rows="5" class = "form-control" type="textarea" name="message" required="required" placeholder = "Message*" id="message"></textarea>
              </div>
            </div>

            <input class = "hidden" type="text" name="status" required="required" id="status" value="Pending"> 

         <div class ="row">
         <button class="btn btn-md btn-default pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Add Feedback</button>
        </div>


        <!-- <fieldset>
          <?php
          echo $this->Form->control('customer_id', ['options' => $customers, 'empty' => true]);

          echo $this->Form->control('product_id', ['options' => $products, 'empty' => true]);
          echo $this->Form->control('item_id', ['options' => $items, 'empty' => true]);
          ?>
        </fieldset>
        <br>
        <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?>
        <?= $this->Form->end() ?> -->
      </div>
    </div>
  </div>
</div>
</section>
</div>

<<!-- script>
$(document).ready(function() {
    $('#feedbackForm')
        .find('[name="customer_contact"]')
            .intlTelInput({
                // utilsScript: '/vendor/intl-tel-input-11.0.0/build/js/utils.js',
                //autoPlaceholder: true,
                preferredCountries: ['fr', 'us', 'sg']
            });

    // $('#feedbackForm')
    //     .formValidation({
    //         framework: 'bootstrap',
    //         icon: {
    //             valid: 'glyphicon glyphicon-ok',
    //             invalid: 'glyphicon glyphicon-remove',
    //             validating: 'glyphicon glyphicon-refresh'
    //         },
    //         fields: {
    //             customer_contact: {
    //                 validators: {
    //                     callback: {
    //                         message: 'The phone number is not valid',
    //                         callback: function(value, validator, $field) {
    //                             return value === '' || $field.intlTelInput('isValidNumber');
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     })
    //     // Revalidate the number when changing the country
    //     .on('click', '.country-list', function() {
    //         $('#feedbackForm').formValidation('revalidateField', 'customer_contact');
    //     });
});
</script> -->