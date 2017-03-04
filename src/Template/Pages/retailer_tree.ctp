<?= $this->Element('retailerLeftSideBar'); ?>

<div class="content-wrapper">
  <!-- Main content -->
  <section class="content-header">
  </section>
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
                        <img src="/IS3102_Final/img/retailer_tree.jpg" alt="Roles Mapping Tree">
                      </div>
                      <div class="tab-pane" id="customers">
                        <img src="/IS3102_Final/img/customer_tree.jpg" alt="Roles Mapping Tree">
                      </div>
                      <div class="tab-pane" id="suppliers">
                        <img src="/IS3102_Final/img/supplier_tree.jpg" alt="Roles Mapping Tree">
                      </div>
                      <div class="tab-pane" id="inventory">
                        <img src="/IS3102_Final/img/inventory_tree.jpg" alt="Roles Mapping Tree">
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
</div>