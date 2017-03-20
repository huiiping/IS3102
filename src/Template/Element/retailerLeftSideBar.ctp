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
        <?= $this->Element('sideBar3', array('icon' => 'tags', 'title' => 'Create New', 'num' => '26', 
        'type1' => 'Employee', 'typePlural' => 'RetailerEmployees', 
        'type2' => 'Customer', 'typePlural2' => 'Customers', 
        'type3' => 'Membership Tier', 'typePlural3' => 'CustMembershipTiers', 
        'type4' => 'Membership Points', 'typePlural4' => 'MembershipPoints', 
        'type5' => 'Feedback', 'typePlural5' => 'Feedbacks', 
        'type6' => 'Promotion', 'typePlural6' => 'Promotions', 
        'type7' => 'Promotion Email', 'typePlural7' => 'PromotionEmails', 
        'type8' => 'Product Category', 'typePlural8' => 'ProdCats', 
        'type9' => 'Product', 'typePlural9' => 'Products', 
        'type10' => 'Product Specification', 'typePlural10' => 'ProdSpecifications', 
        'type11' => 'Location', 'typePlural11' => 'Locations', 
        'type12' => 'Section', 'typePlural12' => 'Sections', 
        'type13' => 'Inventory', 'typePlural13' => 'Inventory', 
        'type14' => 'Stock Level', 'typePlural14' => 'StockLevels', 
        'type15' => 'Item', 'typePlural15' => 'Items', 
        'type16' => 'Supplier', 'typePlural16' => 'Suppliers', 
        'type17' => 'Purchase Order', 'typePlural17' => 'PurchaseOrders', 
        'type18' => 'RFQ', 'typePlural18' => 'Rfqs', 
        'type19' => 'Transaction', 'typePlural19' => 'Transactions', 
        'type20' => 'Transaction Item', 'typePlural20' => 'TransactionItems', 
        'type21' => 'Delivery Order', 'typePlural21' => 'DeliveryOrders', 
        'type22' => 'Delivery Order Item', 'typePlural22' => 'DeliveryOrderItems', 
        'type23' => 'Transfer Order', 'typePlural23' => 'TransferOrders', 
        'type24' => 'Transfer Order Item', 'typePlural24' => 'TransferOrderItems',
        'type25' => 'Message', 'typePlural25' => 'Messages',
        'type26' => 'Report', 'typePlural26' => 'Reports'
        )); ?>

        <?= $this->Element('sideBar', array('icon' => 'users', 'title' => 'Employees', 'type1' => 'Employees', 'typePlural' => 'RetailerEmployees', 'type2' => 'Employee Roles', 'typePlural2' => 'RetailerEmployeeRoles')); ?>
        
        <?= $this->Element('sideBar2', array('icon' => 'users', 'title' => 'Customers', 'num' => '4', 'type1' => 'Customers', 'typePlural' => 'Customers', 'type2' => 'Membership Tiers', 'typePlural2' => 'CustMembershipTiers', 'type3' => 'Membership Points', 'typePlural3' => 'MembershipPoints', 'type4' => 'Feedbacks', 'typePlural4' => 'Feedbacks')); ?>
        
        <?= $this->Element('sideBar', array('icon' => 'shopping-cart', 'title' => 'Promotions', 'type1' => 'Promotions', 'typePlural' => 'Promotions', 'type2' => 'Promotion Emails', 'typePlural2' => 'PromotionEmails')); ?>
        
        <?= $this->Element('sideBar2', array('icon' => 'shopping-cart', 'title' => 'Products', 'num' => '3', 'type1' => 'Product Category', 'typePlural' => 'ProdCats', 'type2' => 'Products', 'typePlural2' => 'Products', 'type3' => 'Product Specification', 'typePlural3' => 'ProdSpecifications')); ?>

        <?= $this->Element('sideBar2', array('icon' => 'building', 'title' => 'Warehouse', 'num' => '5', 'type1' => 'Locations', 'typePlural' => 'Locations', 'type2' => 'Sections', 'typePlural2' => 'Sections', 'type3' => 'Inventory', 'typePlural3' => 'Inventory', 'type4' => 'Stock Levels', 'typePlural4' => 'StockLevels', 'type5' => 'Items', 'typePlural5' => 'Items')); ?>

        <?= $this->Element('sideBar2', array('icon' => 'users', 'title' => 'Suppliers', 'num' => '3', 'type1' => 'Suppliers', 'typePlural' => 'Suppliers', 'type2' => 'Purchase Orders', 'typePlural2' => 'PurchaseOrders', 'type3' => 'RFQ', 'typePlural3' => 'Rfqs')); ?>

        <?= $this->Element('sideBar2', array('icon' => 'file-text-o', 'title' => 'Transactions', 'num' => '6', 'type1' => 'Transactions', 'typePlural' => 'Transactions', 'type2' => 'Transaction Items', 'typePlural2' => 'TransactionItems', 'type3' => 'Delivery Orders', 'typePlural3' => 'DeliveryOrders', 'type4' => 'Delivery Order Items', 'typePlural4' => 'DeliveryOrderItems', 'type5' => 'Transfer Orders', 'typePlural5' => 'TransferOrders', 'type6' => 'Transfer Order Items', 'typePlural6' => 'TransferOrderItems')); ?>

        <li class="treeview">
          <a href="/IS3102_Final/messages/index">
            <i class="fa fa-envelope"></i><span>&nbsp;Messages</span>
          </a>
        </li>
        <li class="treeview">
          <a href="/IS3102_Final/reports/index">
            <i class="fa fa-book"></i><span>&nbsp;Reports</span>
          </a>
        </li>
        <li class="treeview">
          <a href="/IS3102_Final/retailer-loggings/index">
            <i class="fa fa-table"></i><span>&nbsp;Loggings</span>
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