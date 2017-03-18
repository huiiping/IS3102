<style>
.changeactive {
  background-color: rgba(0, 153, 255, 1);
}
</style>

<!-- Left side column contains the logo and sidebar -->
<aside class="main-sidebar">
  <section class="sidebar">
    
    <!-- start search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
      </div>
    </form>
    <!-- end search form -->
    
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      
      <?php if($type) : ?>
        <li class="treeview">
          <a <?php if($this->request->session()->read('page') === 'Suppliers') : ?> class="changeactive" <?php endif; ?> href="/IS3102_Final/suppliers/index">
            <i class="fa fa-table"></i><span>Supplier Details</span>
          </a>
        </li>
        
      <?php else : ?>
        <?= $this->Element('sideBar', array('title' => 'Employees', 'type1' => 'Employees', 'typePlural' => 'RetailerEmployees', 'type2' => 'Employee Roles', 'typePlural2' => 'RetailerEmployeeRoles')); ?>
        
        <?= $this->Element('sideBar2', array('title' => 'Customers', 'num' => '4', 'type1' => 'Customers', 'typePlural' => 'Customers', 'type2' => 'Membership Tiers', 'typePlural2' => 'CustMembershipTiers', 'type3' => 'Membership Points', 'typePlural3' => 'MembershipPoints', 'type4' => 'Feedbacks', 'typePlural4' => 'Feedbacks')); ?>
        
        <?= $this->Element('sideBar', array('title' => 'Promotions', 'type1' => 'Promotions', 'typePlural' => 'Promotions', 'type2' => 'Promotion Emails', 'typePlural2' => 'PromotionEmails')); ?>
        
        <?= $this->Element('sideBar2', array('title' => 'Products', 'num' => '3', 'type1' => 'Product Category', 'typePlural' => 'ProdCats', 'type2' => 'Products', 'typePlural2' => 'Products', 'type3' => 'Product Specification', 'typePlural3' => 'ProdSpecifications')); ?>

        <?= $this->Element('sideBar2', array('title' => 'Warehouse', 'num' => '5', 'type1' => 'Locations', 'typePlural' => 'Locations', 'type2' => 'Sections', 'typePlural2' => 'Sections', 'type3' => 'Inventory', 'typePlural3' => 'Inventory', 'type4' => 'Stock Levels', 'typePlural4' => 'StockLevels', 'type5' => 'Items', 'typePlural5' => 'Items')); ?>

        <?= $this->Element('sideBar2', array('title' => 'Suppliers', 'num' => '3', 'type1' => 'Suppliers', 'typePlural' => 'Suppliers', 'type2' => 'Purchase Orders', 'typePlural2' => 'PurchaseOrders', 'type3' => 'RFQ', 'typePlural3' => 'Rfqs')); ?>

        <?= $this->Element('sideBar2', array('title' => 'Transactions', 'num' => '6', 'type1' => 'Transactions', 'typePlural' => 'Transactions', 'type2' => 'Transaction Items', 'typePlural2' => 'TransactionItems', 'type3' => 'Delivery Orders', 'typePlural3' => 'DeliveryOrders', 'type4' => 'Delivery Order Items', 'typePlural4' => 'DeliveryOrderItems', 'type5' => 'Transfer Orders', 'typePlural5' => 'TransferOrders', 'type6' => 'Transfer Order Items', 'typePlural6' => 'TransferOrderItems')); ?>

        <li class="treeview">
          <a href="/IS3102_Final/messages/index">
            <i class="fa fa-table"></i><span>&nbsp;Messages</span>
          </a>
        </li>
        <li class="treeview">
          <a href="/IS3102_Final/reports/index">
            <i class="fa fa-table"></i><span>&nbsp;Reports</span>
          </a>
        </li>
        <li class="treeview">
          <a href="/IS3102_Final/retailer-loggings/index">
            <i class="fa fa-table"></i><span>&nbsp;Retailer Loggings</span>
          </a>
        </li>
      <?php endif; ?>

      <!--<li class="treeview">
        <a href="">
          <i class="fa fa-table"></i>
          <span>Reports</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
                <li><p class="indent">Retailer Statistics Report</p></li>
                <li><p class="indent">Retailer System Usage Report</p></li>
                <li><p class="indent"></p></li>
        </ul>
      </li>-->

    </ul>
  </section>
</aside>