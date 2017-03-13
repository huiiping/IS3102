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
        
      <?= $this->Element('sideBar', array('type' => 'Employees', 'typePlural' => 'IntrasysEmployees')); ?>
      <li class="treeview">
        <a href="/IS3102_Final/intrasys-employee-roles/index">
          <i class="fa fa-table"></i><span>Employee Roles</span>
        </a>
      </li>
      <?= $this->Element('sideBar', array('type' => 'Retailers', 'typePlural' => 'retailers')); ?>
      <?= $this->Element('sideBar', array('type' => 'Retailer Account Types', 'typePlural' => 'RetailerAccTypes')); ?>
      <!--<?= $this->Element('sideBar', array('type' => 'Retailer Loyalty Points', 'typePlural' => 'RetailerLoyaltyPoints')); ?>-->
      <?= $this->Element('sideBar', array('type' => 'System Announcements', 'typePlural' => 'Announcements')); ?>
      <li class="treeview">
        <a href="/IS3102_Final/intrasys-loggings/index">
          <i class="fa fa-table"></i><span>Intrasys Loggings</span>
        </a>
      </li>
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