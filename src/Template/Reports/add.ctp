<?php
  use Cake\ORM\TableRegistry;
?>

<?php
$this->assign('title', __('Report') . '/' . __('Add'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Incident Report'), ['controller' => 'reports', 'action' => 'index']);
$this->Html->addCrumb(__('Create New Incident Report'));
?>

<!-- Main content -->
<section class="content" style="min-height: 550px">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Create New Incident Report</h3>
          </div>
        </div>
        <div class="main" style="padding: 10px 20px;">

          <form method="post" accept-charset="utf-8" action="/IS3102_Final/reports/add">
            <div style="display:none;">
              <input type="hidden" name="_method" value="POST">
            </div>
            <div class ="form-group">          
              <div class="input-group" title="Enter Report Title*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                <input class = "form-control" type="text" placeholder = "Report Title*" name="title" required="required" id="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : '' ?>" maxlength="100"> 
              </div>
            </div>

            <div class ="form-group">          
              <div class="input-group" title="Enter Report Message*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <textarea rows="5" class = "form-control" type="textarea" name="message" required="required" placeholder = "Report Message*" id="message"></textarea>
              </div> 
            </div>

            <div class ="form-group">
              <div class="input-group" style="z-index: 4;" title="Select Entity Name*">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                  <?php if (!isset($_POST['generate_button'])): ?>
                    <select name="entity2" id="entity" class="selectpicker form-control" required="required" title="Select Entity Name*">
                  <?php else: ?>
                    <select name="entity" id="entity" class="selectpicker form-control" required="required" title="Select Entity Name*" disabled>
                  <?php endif; ?>
                  <?php
                    switch ($_POST['entity2']) {
                      case 'Items': ?>
                        <option selected value="Items">Items</option>
                        <option value="PurchaseOrders">Purchase Orders</option>
                        <option value="TransferOrders">Transfer Orders</option>
                        <option value="DeliveryOrders">Delivery Orders</option>
                        <option value="Transactions">Transactions</option>
                  <?php break; 
                      case 'PurchaseOrders': ?>
                        <option value="Items">Items</option>
                        <option selected value="PurchaseOrders">Purchase Orders</option>
                        <option value="TransferOrders">Transfer Orders</option>
                        <option value="DeliveryOrders">Delivery Orders</option>
                        <option value="Transactions">Transactions</option>
                  <?php break;
                      case 'TransferOrders': ?>
                        <option value="Items">Items</option>
                        <option value="PurchaseOrders">Purchase Orders</option>
                        <option selected value="TransferOrders">Transfer Orders</option>
                        <option value="DeliveryOrders">Delivery Orders</option>
                        <option value="Transactions">Transactions</option>
                  <?php break;
                      case 'DeliveryOrders': ?>
                        <option value="Items">Items</option>
                        <option value="PurchaseOrders">Purchase Orders</option>
                        <option value="TransferOrders">Transfer Orders</option>
                        <option selected value="DeliveryOrders">Delivery Orders</option>
                        <option value="Transactions">Transactions</option>
                  <?php break;
                      case 'Transactions': ?>
                        <option value="Items">Items</option>
                        <option value="PurchaseOrders">Purchase Orders</option>
                        <option value="TransferOrders">Transfer Orders</option>
                        <option value="DeliveryOrders">Delivery Orders</option>
                        <option selected value="Transactions">Transactions</option>
                  <?php break;
                      default: ?>
                        <option value="Items">Items</option>
                        <option value="PurchaseOrders">Purchase Orders</option>
                        <option value="TransferOrders">Transfer Orders</option>
                        <option value="DeliveryOrders">Delivery Orders</option>
                        <option value="Transactions">Transactions</option>
                <?php }
                  ?>
                </select>
              </div>
            </div>
            <?php if (isset($_POST['generate_button'])): ?>
              <input type="hidden" name="entity" value="<?= $_POST['entity2'] ?>">
              <div class ="row" align="center">
                <button class="btn btn-md btn-success" type="submit" name="generate_button" style="border-radius: 8px; margin:5px; display: none; ">Generate Entity ID(s)</button>
              </div>
            <?php else: ?>              
              <div class ="row" align="center">
                <button class="btn btn-md btn-success" type="submit" name="generate_button" style="border-radius: 8px; margin:5px; ">Generate Entity ID(s)</button>
              </div><br>
            <?php endif; ?>

            <?php if (isset($_POST['generate_button'])): ?>
              <div class ="form-group">
                <div class="input-group" style="z-index: 3;" title="Select Entity ID*">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                  <input type="hidden" name="entityID" id="entityID" value=""> 
                  <select  name="entityID" id="entityID" class="selectpicker form-control" title="Select Entity ID*" required>
                    <?php
                      if ($entity == 'Items') {
                        $allEnts = TableRegistry::get('Items');
                        $ents = $allEnts
                        ->find();
                      } else 
                        if ($entity == 'PurchaseOrders') {
                          $allEnts = TableRegistry::get('PurchaseOrders');
                          $ents = $allEnts
                          ->find();
                        } else
                          if ($entity == 'TransferOrders') {
                            $allEnts = TableRegistry::get('TransferOrders');
                            $ents = $allEnts
                            ->find();                
                          } else
                            if ($entity == 'DeliveryOrders') {
                              $allEnts = TableRegistry::get('DeliveryOrders');
                              $ents = $allEnts
                              ->find();
                            } else
                              if ($entity == 'Transactions') {
                                $allEnts = TableRegistry::get('Transactions');
                                $ents = $allEnts
                                ->find();
                              }
                    ?>
                    <?php foreach ($ents as $ent): ?>
                      <option value="<?=$ent->id?>"><?php echo $ent->id ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            <?php endif; ?>

            <br>
            <div class ="row">
              <a href="/IS3102_Final/reports/index" class="btn btn-md btn-primary pull-left" style="border-radius: 8px; margin:5px;">Back to Incident Report Index</a>
              <?php if (isset($_POST['generate_button'])): ?>
              <button id="div" class="btn btn-md btn-success pull-right" type="submit" name="save_button" style="border-radius: 8px; margin:5px;">Save Incident Report</button>
              <?php endif; ?>
            </div>
            <br>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!--<div class="reports form large-9 medium-8 columns content">
    <?= $this->Form->create($report) ?>
    <fieldset>
        <legend><?= __('Add Report') ?></legend>
        <?php
            echo $this->Form->input('retailer_employee_id', ['options' => $retailerEmployees, 'empty' => true]);
            echo $this->Form->input('entity');
            echo $this->Form->input('entityID');
            echo $this->Form->input('title');
            echo $this->Form->input('message');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->
