<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Intrasys CLRMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<?= $this->Html->charset() ?>
<?= $this->Html->meta('icon') ?>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>
<?= $this->fetch('script') ?>

<!-- CakePHP CSS -->
<!-- <?= $this->Html->css('base.css') ?>-->

<!-- Bootstrap 3.3.6 -->
<?= $this->Html->css('bootstrap.min.css') ?>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

<?= $this->Html->css('intlTelInput.css') ?>

<!-- Theme style -->
<?= $this->Html->css('AdminLTE.min.css') ?>
<!-- AdminLTE Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
<?= $this->Html->css('_all-skins.min.css') ?>
<!-- iCheck -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

<?= $this->Html->css('blue.css') ?>
<!-- Morris chart -->
<?= $this->Html->css('morris') ?>
<!-- jvectormap -->
<?= $this->Html->css('jquery-jvectormap-1.2.2.css') ?>
<!-- Date Picker -->
<?= $this->Html->css('datepicker3.css') ?>
<!-- Daterange picker -->
<?= $this->Html->css('daterangepicker.css') ?>
<!-- iCheck for checkboxes and radio inputs -->
<?= $this->Html->css('all.css') ?>
<!-- Bootstrap Color Picker -->
<?= $this->Html->css('bootstrap-colorpicker.min.css') ?>
<!-- Bootstrap time Picker -->
<?= $this->Html->css('bootstrap-timepicker.min.css') ?>
<!-- Select2 -->
<?= $this->Html->css('select2.min.css') ?>
<!-- DataTables -->
<?= $this->Html->css('dataTables.bootstrap.css') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

<!-- Sort arrows -->
<?=$this->Html->css('admin_style.min.css')?><!-- DataTables -->

<!-- jQuery -->
<!-- <script
src="https://code.jquery.com/jquery-3.1.1.slim.js"
integrity="sha256-5i/mQ300M779N2OVDrl16lbohwXNUdzL/R2aVUXyXWA="
crossorigin="anonymous"></script>
<script
src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
crossorigin="anonymous"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<!-- jQuery 2.2.3 -->
<?= $this->Html->script('jquery-2.2.3.min.js') ?>
<?= $this->Html->script('intlTelInput.min.js') ?>
<?= $this->Html->script('utils.js') ?>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script> $.widget.bridge('uibutton', $.ui.button); </script>
<!-- Sparkline -->
<?= $this->Html->script('jquery.sparkline.min.js') ?>
<!-- jvectormap -->
<?= $this->Html->script('jquery-jvectormap-1.2.2.min.js') ?>
<?= $this->Html->script('jquery-jvectormap-world-mill-en.js') ?>
<!-- jQuery Knob Chart -->
<?= $this->Html->script('jquery.knob.js') ?>
<!-- Slimscroll -->
<?= $this->Html->script('jquery.slimscroll.min.js') ?>
<!-- DataTables -->
<?= $this->Html->script('jquery.dataTables.min.js') ?>
<!-- InputMask -->
<?= $this->Html->script('jquery.inputmask.js') ?>
<?= $this->Html->script('jquery.inputmask.date.extensions.js') ?>
<?= $this->Html->script('jquery.inputmask.extensions.js') ?>


<style> 
  p.indent{ 
    padding-left: 1.8em; 
    padding-top: 0.3em; 
    color: #b8c7ce;
  }
  .row{
    max-width: none;
  }
  .navbartopright{
    font-size: 15px;
  }
  div.message{
    text-align: center;
    cursor: pointer;
    display: block;
    font-weight: normal;
    padding: 0 1.5rem 0 1.5rem;
    transition: height 300ms ease-out 0s;
    background-color: #a0d3e8;
    color: #626262;
    top: 15px;
    right: 15px;
    z-index: 999;
    overflow: hidden;
    height: 50px;
    line-height: 2.5em;
    box-radius: 5px;
  }
  div.message.error{
    background-color: #C3232D;
    color: #FFF;
  }
</style>

</head>

<?php if($loggedIn) : ?>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Top Left Logo -->
        <?php if($intrasys) : ?>
          <a href="/IS3102_Final/pages/intrasys" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>Int</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Intrasys</b></span>
          <?php else : ?>
            <?php if($type) : ?>
              <a href="/IS3102_Final/pages/supplier" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b><?= ucfirst(substr($_SESSION['Auth']['User']['supplier_name'],0,3)) ?></b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b><?= ucfirst($_SESSION['Auth']['User']['supplier_name']) ?></b></span>
              <?php else : ?>
                <a href="/IS3102_Final/pages/retailer" class="logo">
                  <!-- mini logo for sidebar mini 50x50 pixels -->
                  <span class="logo-mini"><b><?= ucfirst(substr($dbName, 0, 3)) ?></b></span>
                  <!-- logo for regular state and mobile devices -->
                  <span class="logo-lg"><b><?= ucfirst(substr($dbName, 0, -2)) ?></b></span>
              <?php endif; ?>
            <?php endif; ?>
          </a>	

          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top">
           <!-- Sidebar toggle button-->
           <a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- Start Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu" title="Messages">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>

                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="/IS3102_Final/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="/IS3102_Final/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="/IS3102_Final/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="/IS3102_Final/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="/IS3102_Final/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- End Messages -->

              <!-- Start Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu" title="Notifications">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <!-- start inner menu: contains the actual data -->
                  <li>
                    <ul class="menu">
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li><!-- end notification -->
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                          page and may cause design problems
                        </a>
                      </li><!-- end notification -->
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li><!-- end notification -->
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li><!-- end notification -->
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li><!-- end notification -->
                    </ul>
                  </li>
                  <!-- end inner menu -->
                  <li class="footer">
                    <a href="/IS3102_Final/announcements">View all</a>
                  </li>
                </ul>
              </li>
              <!-- End Notifications -->

             
              <!-- Setting -->
              <?php if( (!$intrasys) && (!$type) ) : ?>
                <li class="dropdown notifications-menu" title="Settings">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-gears"></i>
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <ul class="menu">
                        <li><!-- start task item -->
                          <a <?php if($this->request->session()->read('page') === 'RetailerDetails') : ?> class="changeactive" <?php endif; ?> href="/IS3102_Final/retailer-details/index">
                            <i class="fa fa-gear"></i><span>Company Profile</span>
                          </a>
                        </li><!-- end task item -->
                      </ul>
                    </li>
                  </ul>
                </li>
              <?php endif; ?>

              <!-- Start User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu"  title="Profile / Logout">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="/IS3102_Final/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">
                    <?php if($type) : ?>
                      <?= $_SESSION['Auth']['User']['supplier_name'] ?>
                    <?php else : ?>
                      <?= $_SESSION['Auth']['User']['first_name'] ?>
                    <?php endif; ?>
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="/IS3102_Final/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php if($type) : ?>
                        <?= $_SESSION['Auth']['User']['supplier_name'] ?>
                        <small>Joined since <?= $this->Time->format($_SESSION['Auth']['User']['created'], 'd MMM YYYY') ?></small>
                      <?php else : ?>
                        <?= $_SESSION['Auth']['User']['first_name'] ?> <?= $_SESSION['Auth']['User']['last_name'] ?> 
                        <small>Joined since <?= $this->Time->format($_SESSION['Auth']['User']['created'], 'd MMM YYYY') ?></small>
                      <?php endif; ?>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <?php if($intrasys) : ?>
                        <a class="btn btn-default btn-flat" href="/IS3102_Final/intrasys-employees/view/<?= $_SESSION['Auth']['User']['id'] ?>" >Profile</a>
                        <!--<?= $this->Html->link(__('Profile'), ['controller' => 'IntrasysEmployees', 'action' => 'view', $_SESSION['Auth']['User']['id']]); ?>-->
                      <?php else : ?>
                        <?php if($type) : ?>
                          <a class="btn btn-default btn-flat" href="/IS3102_Final/suppliers/view/<?= $_SESSION['Auth']['User']['id'] ?>" >Profile</a>
                          <!--<?= $this->Html->link(__('Profile'), ['controller' => 'Suppliers', 'action' => 'view', $_SESSION['Auth']['User']['id']]); ?>-->
                        <?php else : ?>
                          <a class="btn btn-default btn-flat" href="/IS3102_Final/retailer-employees/view/<?= $_SESSION['Auth']['User']['id'] ?>" >Profile</a>
                          <!--<?= $this->Html->link(__('Profile'), ['controller' => 'RetailerEmployees', 'action' => 'view', $_SESSION['Auth']['User']['id']]); ?>-->
                        <?php endif; ?>
                      <?php endif; ?>
                    </div>
                    <div class="pull-right">
                      <?php if($intrasys) : ?>
                        <a class="btn btn-default btn-flat" href="/IS3102_Final/intrasys-employees/logout" >Logout</a>
                        <!--<?= $this->Html->link(__('Logout'), ['controller' => 'IntrasysEmployees', 'action' => 'logout']); ?>-->
                      <?php else : ?>
                        <?php if($type) : ?>
                          <a class="btn btn-default btn-flat" href="/IS3102_Final/suppliers/logout" >Logout</a>
                          <!--<?= $this->Html->link(__('Logout'), ['controller' => 'Suppliers', 'action' => 'logout']); ?>-->
                        <?php else : ?>
                          <a class="btn btn-default btn-flat" href="/IS3102_Final/retailer-employees/logout" >Logout</a>
                          <!--<?= $this->Html->link(__('Logout'), ['controller' => 'RetailerEmployees', 'action' => 'logout']); ?>-->
                        <?php endif; ?>
                      <?php endif; ?>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- End User Account -->
            </ul>
          </div>
        </nav>
      </header>

<?php else : ?>

  <!-- Top Bar -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <a href="/IS3102_Final/" class="logo">
            <span class="logo-lg"><b>Intrasys</b></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown messages-menu">
                <?= $this->Html->link(__('Login For Retailer'), ['controller' => 'RetailerEmployees', 'action' => 'login'], array( 'class' => 'navbartopright')); ?>
              </li>
            </ul>
          </div>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown messages-menu">
               <?= $this->Html->link(__('Login For Intrasys'), ['controller' => 'IntrasysEmployees', 'action' => 'login'],  array( 'class' => 'navbartopright')); ?>
             </li>
           </ul>
          </div>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown messages-menu">
                <?= $this->Html->link(__('Login For Supplier'), ['controller' => 'Suppliers', 'action' => 'login'], array( 'class' => 'navbartopright')); ?>
              </li>
            </ul>
          </div>
        </nav>  
      </header>

<?php endif; ?>

      <!-- Left Sidebar -->
      <?php if($loggedIn) : ?>
        <?php if($intrasys) : ?>
          <?= $this->Element('intrasysLeftSideBar'); ?>        
        <?php else : ?>
          <?= $this->Element('retailerLeftSideBar'); ?>
        <?php endif; ?>
      <?php endif; ?>

      <!-- Main Content -->
      <div class="content-wrapper">
        <!-- Breadcrumb -->
        <?php if($loggedIn) : ?>
          <?=$this->Html->getCrumbList(['class' => 'breadcrumb navbar-breadcrumb',
              'firstClass' => false,
              'lastClass' => 'active']/*,
              ['text' => __('Home'),
                  'url' => ['controller' => 'Pages',
                      'action' => 'main'],
                  'escape' => false]*/)
          ?>
        <?php endif; ?>
        <?= $this->Flash->render() ?> <!--display messages-->
        <?= $this->fetch('content'); ?> <!--display main content-->
      </div>

      <!-- footer -->
      <footer class="main-footer">
        <div class="pull-center hidden-xs">
          <strong>Copyright &copy; 2017 <a href="https://www.intrasys.com.sg/">Intrasys</a>.</strong> All rights reserved.
        </div>
      </footer> 
    </div>

<!-- Bootstrap 3.3.6 -->
<?= $this->Html->script('bootstrap.min.js') ?>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<?= $this->Html->script('morris.min.js') ?>

<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<?= $this->Html->script('daterangepicker.js') ?>
<!-- datepicker -->
<?= $this->Html->script('bootstrap-datepicker.js') ?>

<!-- FastClick -->
<?= $this->Html->script('fastclick.js') ?>
<!-- AdminLTE App -->
<?= $this->Html->script('app.min.js') ?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<?= $this->Html->script('dashboard.js') ?>-->
<!-- AdminLTE for demo purposes -->
<?= $this->Html->script('demo.js') ?>

<!-- DataTables -->
<?= $this->Html->script('dataTables.bootstrap.min.js') ?>
<!-- bootstrap color picker -->
<?= $this->Html->script('bootstrap-colorpicker.min.js') ?>
<!-- bootstrap time picker -->
<?= $this->Html->script('bootstrap-timepicker.min.js') ?>
<!-- iCheck 1.0.1 -->
<?= $this->Html->script('icheck.min.js') ?>
<!-- Select2-->
<?= $this->Html->script('select2.full.min.js') ?>

  </body>
</html>
