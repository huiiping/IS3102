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
      
      <?= $this->Element('sideBar3', array('title' => 'Create New', 'num' => '4', 
      'type1' => 'Employee', 'typePlural' => 'IntrasysEmployees', 
      'type2' => 'Retailer', 'typePlural2' => 'Retailers', 
      'type3' => 'Retailer Account Type', 'typePlural3' => 'RetailerAccTypes', 
      'type4' => 'Announcement', 'typePlural4' => 'Announcements')); ?>

      <?= $this->Element('sideBar', array('title' => 'Employees', 'type1' => 'Employees', 'typePlural' => 'IntrasysEmployees', 'type2' => 'Employee Roles', 'typePlural2' => 'IntrasysEmployeeRoles')); ?>
      <?= $this->Element('sideBar', array('title' => 'Retailers', 'type1' => 'Retailers', 'typePlural' => 'Retailers', 'type2' => 'Retailer Account Types', 'typePlural2' => 'RetailerAccTypes')); ?>

      <li class="treeview">
        <a href="/IS3102_Final/announcements/index">
          <i class="fa fa-table"></i><span>&nbsp;Announcements</span>
        </a>
      </li>
      <li class="treeview">
        <a href="/IS3102_Final/intrasys-loggings/index">
          <i class="fa fa-table"></i><span>&nbsp;Intrasys Loggings</span>
        </a>
      </li>
      <!--<li class="treeview">
        <a href="/IS3102_Final/intrasys-employee-roles/index">
          <i class="fa fa-table"></i><span>&nbsp;Employee Roles</span>
        </a>
      </li>
      <li class="treeview">
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