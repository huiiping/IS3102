<style>
  /*.changeactive {
    background-color: rgba(0, 153, 255, 1);
  }*/
</style>

<!-- Left side column contains the logo and sidebar -->
<aside class="main-sidebar">
  <section class="sidebar">

    <!-- start search form -->
    <!-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
      </div>
    </form> -->
    <!-- end search form -->
    
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <!-- <li class="header">MAIN NAVIGATION</li> -->
      
      <?php if($type) : ?>
        <li class="treeview">
          <a <?php if($this->request->session()->read('page') === 'Suppliers') : ?> class="changeactive" <?php endif; ?> href="/IS3102_Final/suppliers/index">
            <i class="fa fa-table"></i><span>Supplier Details</span>
          </a>
        </li>
        <li class="treeview">
          <a href="/IS3102_Final/rfqs/supplierIndex">
            <i class = "fa fa-sticky-note-o"></i><span>View RFQs</span>
          </a>
        </li>
        <li class="treeview">
          <a href="/IS3102_Final/quotations/supplier-index">
            <i class = "fa fa-sticky-note-o"></i><span>View Quotations</span>
          </a>
        </li>
        
      <?php else : ?>
        <?= $this->Element('sideBar2', array('icon' => 'tags', 'title' => 'Create New', 'num' => '22', 
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
          'type13' => 'Stock Level', 'typePlural13' => 'StockLevels', 
          'type14' => 'Item', 'typePlural14' => 'Items', 
          'type15' => 'Supplier', 'typePlural15' => 'Suppliers', 
          'type16' => 'Purchase Order', 'typePlural16' => 'PurchaseOrders', 
          'type17' => 'RFQ', 'typePlural17' => 'Rfqs', 
          'type18' => 'Transaction', 'typePlural18' => 'Transactions',
          'type19' => 'Delivery Order', 'typePlural19' => 'DeliveryOrders', 
          'type20' => 'Transfer Order', 'typePlural20' => 'TransferOrders', 
          'type21' => 'Message', 'typePlural21' => 'Messages',
          'type22' => 'Report', 'typePlural22' => 'Reports'
        )); ?>

        <?= $this->Element('sideBar', array('icon' => 'users', 'title' => 'Employees', 'num' => '2', 
          'type1' => 'Employees', 'typePlural' => 'RetailerEmployees', 
          'type2' => 'Employee Roles', 'typePlural2' => 'RetailerEmployeeRoles')); ?>

        <?= $this->Element('sideBar', array('icon' => 'users', 'title' => 'Customers', 'num' => '4', 
          'type1' => 'Customers', 'typePlural' => 'Customers', 
          'type2' => 'Membership Tiers', 'typePlural2' => 'CustMembershipTiers',
          'type3' => 'Membership Points', 'typePlural3' => 'MembershipPoints', 
          'type4' => 'Feedbacks', 'typePlural4' => 'Feedbacks')); ?>

        <?= $this->Element('sideBar', array('icon' => 'shopping-cart', 'title' => 'Promotions', 'num' => '2', 
          'type1' => 'Promotions', 'typePlural' => 'Promotions', 
          'type2' => 'Promotion Emails', 'typePlural2' => 'PromotionEmails')); ?>

        <?= $this->Element('sideBar', array('icon' => 'shopping-cart', 'title' => 'Products', 'num' => '3', 
          'type1' => 'Product Category', 'typePlural' => 'ProdCats', 
          'type2' => 'Products', 'typePlural2' => 'Products', 
          'type3' => 'Product Specification', 'typePlural3' => 'ProdSpecifications')); ?>

        <?= $this->Element('sideBar', array('icon' => 'building', 'title' => 'Warehouse', 'num' => '4', 
          'type1' => 'Locations', 'typePlural' => 'Locations',
          'type2' => 'Sections', 'typePlural2' => 'Sections', 
          'type3' => 'Stock Levels', 'typePlural3' => 'StockLevels', 
          'type4' => 'Items', 'typePlural4' => 'Items')); ?>

        <?= $this->Element('sideBar', array('icon' => 'users', 'title' => 'Suppliers', 'num' => '3',
         'type1' => 'Suppliers', 'typePlural' => 'Suppliers', 
         'type2' => 'Purchase Orders', 'typePlural2' => 'PurchaseOrders', 
         'type3' => 'RFQ', 'typePlural3' => 'Rfqs')); ?>

        <?= $this->Element('sideBar', array('icon' => 'file-text-o', 'title' => 'Transactions', 'num' => '3',
         'type1' => 'Transactions', 'typePlural' => 'Transactions', 
         'type2' => 'Delivery Orders', 'typePlural2' => 'DeliveryOrders', 
         'type3' => 'Transfer Orders', 'typePlural3' => 'TransferOrders')); ?>

        <li class="treeview">
          <a href="/IS3102_Final/messages/index">
            <i class="fa fa-envelope"></i><span>&nbsp;Messages</span>
          </a>
        </li>
        <li class="treeview">
          <a href="/IS3102_Final/reports/index">
            <i class="fa fa-book"></i><span>&nbsp;Incident Reports</span>
          </a>
        </li>
        <li class="treeview">
          <a href="/IS3102_Final/reports/other">
            <i class="fa fa-book"></i><span>&nbsp;Other Reports</span>
          </a>
        </li>
        <li class="treeview">
          <a href="/IS3102_Final/retailer-loggings/index">
            <i class="fa fa-table"></i><span>&nbsp;Loggings</span>
          </a>
        </li>
      <?php endif; ?>

    </ul>
  </section>
</aside>