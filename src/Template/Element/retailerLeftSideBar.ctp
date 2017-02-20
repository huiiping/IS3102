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
        
      <?= $this->Element('sideBar', array('type' => 'Employees', 'typePlural' => 'RetailerEmployees')); ?>
      <?= $this->Element('sideBar2', array('type' => 'Employee Roles', 'typePlural' => 'RetailerEmployeeRoles')); ?>
      <?= $this->Element('sideBar', array('type' => 'Customers', 'typePlural' => 'Customers')); ?>
      <?= $this->Element('sideBar', array('type' => 'Customer Membership Tiers', 'typePlural' => 'CustMembershipTiers')); ?>
      <?= $this->Element('sideBar', array('type' => 'Promotions', 'typePlural' => 'Promotions')); ?>
      <?= $this->Element('sideBar', array('type' => 'Product Category', 'typePlural' => 'ProdCats')); ?>
      <?= $this->Element('sideBar', array('type' => 'Product Types', 'typePlural' => 'ProdTypes')); ?>
      <?= $this->Element('sideBar', array('type' => 'Locations', 'typePlural' => 'Locations')); ?>
      <?= $this->Element('sideBar', array('type' => 'Sections', 'typePlural' => 'Sections')); ?>
      <?= $this->Element('sideBar', array('type' => 'Suppliers', 'typePlural' => 'Suppliers')); ?>
      <?= $this->Element('sideBar', array('type' => 'Supplier Memos', 'typePlural' => 'SupplierMemos')); ?>
      <?= $this->Element('sideBar', array('type' => 'Purchase Orders', 'typePlural' => 'PurchaseOrders')); ?>
      <?= $this->Element('sideBar', array('type' => 'Promotions', 'typePlural' => 'Promotions')); ?>
      <?= $this->Element('sideBar', array('type' => 'Messages', 'typePlural' => 'Messages')); ?>
      <?= $this->Element('sideBar', array('type' => 'Loggings', 'typePlural' => 'Loggings')); ?>


      <li class="treeview"><!-- start -->
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
      </li><!-- end -->

    </ul>
  </section>
</aside>