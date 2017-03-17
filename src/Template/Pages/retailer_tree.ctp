<?php
$this->assign('title', __('Retailer Tree') . '/' . __('Add'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Employee Roles'), ['controller' => 'RetailerEmployeeRoles', 'action' => 'index']);
$this->Html->addCrumb(__('Employee Roles Tree'));
?>

<!-- Main content -->       
<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= __('Retailer Employee Roles Mapping Tree') ?></h3>
          </div>
          <div class="box-body">
            <br>
            <div class="col-md-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#retailer" data-toggle="tab">Retailer & Loggings</a></li>
                  <li><a href="#customers" data-toggle="tab">Customers & Promotions</a></li>
                  <li><a href="#suppliers" data-toggle="tab">Suppliers & Purchase Orders</a></li>
                  <li><a href="#inventory" data-toggle="tab">Products & Warehouse</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="retailer">
                    <img src="/IS3102_Final/img/retailer_tree.jpg" alt="Roles Mapping Tree" height="700" width="900">
                  </div>
                  <div class="tab-pane" id="customers">
                    <img src="/IS3102_Final/img/customer_tree.jpg" alt="Roles Mapping Tree" height="600" width="900">
                  </div>
                  <div class="tab-pane" id="suppliers">
                    <img src="/IS3102_Final/img/supplier_tree.jpg" alt="Roles Mapping Tree" height="800" width="900">
                  </div>
                  <div class="tab-pane" id="inventory">
                    <img src="/IS3102_Final/img/inventory_tree.jpg" alt="Roles Mapping Tree" height="600" width="900">
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
