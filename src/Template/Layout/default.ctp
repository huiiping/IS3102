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
	  <title>Intrasys</title>
	  <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
	  <?= $this->Html->charset() ?>
    <?= $this->Html->meta('icon') ?>
	
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->fetch('script') ?>
	
    <!-- CakePHP CSS -->
    <?= $this->Html->css('base.css') ?>
	
    <!-- Bootstrap 3.3.6 -->
    <?= $this->Html->css('bootstrap.min.css') ?>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  	<!-- Theme style -->
  	<?= $this->Html->css('AdminLTE.min.css') ?>
  	<!-- AdminLTE Skins. Choose a skin from the css/skins
  		 folder instead of downloading all of them to reduce the load. -->
  	<?= $this->Html->css('_all-skins.min.css') ?>
  	<!-- iCheck -->
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
   	<style> p.indent{ 
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
      <a href="" class="logo">
    	  <!-- mini logo for sidebar mini 50x50 pixels -->
    	  <span class="logo-mini"><b>Int</b></span>
    	  <!-- logo for regular state and mobile devices -->
    	  <span class="logo-lg"><b>Intrasys</b></span>
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
            <li class="dropdown messages-menu">
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
            <li class="dropdown notifications-menu">
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
        				  <a href="#">View all</a>
        			  </li>
              </ul>
            </li>
            <!-- End Notifications -->
            
            <!-- Start Tasks: style can be found in dropdown.less -->
            <li class="dropdown tasks-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li><!-- start task item -->
                      <a href="#">
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li><!-- end task item -->
                    <li><!-- start task item -->
                      <a href="#">
                        <h3>
                          Create a nice theme
                          <small class="pull-right">40%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">40% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li><!-- end task item -->
                    <li><!-- start task item -->
                      <a href="#">
                        <h3>
                          Some task I need to do
                          <small class="pull-right">60%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li><!-- end task item -->
                    <li><!-- start task item -->
                      <a href="#">
                        <h3>
                          Make beautiful transitions
                          <small class="pull-right">80%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">80% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li><!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
            <!-- End Tasks -->

            <!-- Start User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="/IS3102_Final/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= $_SESSION['Auth']['User']['first_name'] ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="/IS3102_Final/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                  <p>
                    <?= $_SESSION['Auth']['User']['first_name'] ?> <?= $_SESSION['Auth']['User']['last_name'] ?> 
                    <small>Joined since <?= $this->Time->format($_SESSION['Auth']['User']['created'], 'd MMM YYYY') ?></small>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                    <span class="btn btn-default btn-flat">
                      <?= $this->Html->link(__('Profile'), ['controller' => 'IntrasysEmployees', 'action' => 'view', $_SESSION['Auth']['User']['id'],'class'=>'btn btn-default btn-flat']); ?>
                    </span>
                  </div>
                  <div class="pull-right">
                    <span class="btn btn-default btn-flat">
                      <?= $this->Html->link(__('Logout'), ['controller' => 'IntrasysEmployees', 'action' => 'logout', 'class'=>'btn btn-default btn-flat']); ?>
                    </span>
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
      </nav>  
    </header>

<?php endif; ?>

    <?= $this->Flash->render() ?> <!--display messages-->
    <?= $this->fetch('content'); ?> <!--display main content-->
  	
    <!-- footer -->
    <footer class="main-footer">
    	<div class="pull-center hidden-xs">
    	  <strong>Copyright &copy; 2017 <a href="https://www.intrasys.com.sg/">Intrasys</a>.</strong> All rights reserved.
    	</div>
    </footer> 
  </div>

  <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <!-- jQuery 2.2.3 -->'
  <?= $this->Html->script('jquery-2.2.3.min.js') ?>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script> $.widget.bridge('uibutton', $.ui.button); </script>
  <!-- Bootstrap 3.3.6 -->
  <?= $this->Html->script('bootstrap.min.js') ?>
  <!-- Morris.js charts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <?= $this->Html->script('morris.min.js') ?>
  <!-- Sparkline -->
  <?= $this->Html->script('jquery.sparkline.min.js') ?>
  <!-- jvectormap -->
  <?= $this->Html->script('jquery-jvectormap-1.2.2.min.js') ?>
  <?= $this->Html->script('jquery-jvectormap-world-mill-en.js') ?>
  <!-- jQuery Knob Chart -->
  <?= $this->Html->script('jquery.knob.js') ?>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <?= $this->Html->script('daterangepicker.js') ?>
  <!-- datepicker -->
  <?= $this->Html->script('bootstrap-datepicker.js') ?>
  <!-- Slimscroll -->
  <?= $this->Html->script('jquery.slimscroll.min.js') ?>
  <!-- FastClick -->
  <?= $this->Html->script('fastclick.js') ?>
  <!-- AdminLTE App -->
  <?= $this->Html->script('app.min.js') ?>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <?= $this->Html->script('dashboard.js') ?>
  <!-- AdminLTE for demo purposes -->
  <?= $this->Html->script('demo.js') ?>
  <!-- DataTables -->
  <?= $this->Html->script('jquery.dataTables.min.js') ?>
  <?= $this->Html->script('dataTables.bootstrap.min.js') ?>
  <!-- bootstrap color picker -->
  <?= $this->Html->script('bootstrap-colorpicker.min.js') ?>
  <!-- bootstrap time picker -->
  <?= $this->Html->script('bootstrap-timepicker.min.js') ?>
    <!-- iCheck 1.0.1 -->
    <?= $this->Html->script('icheck.min.js') ?>
  <!-- Select2 -->
  <?= $this->Html->script('select2.full.min.js') ?>
  <!-- InputMask -->
  <?= $this->Html->script('jquery.inputmask.js') ?>
  <?= $this->Html->script('jquery.inputmask.date.extensions.js') ?>
  <?= $this->Html->script('jquery.inputmask.extensions.js') ?>

</body>
</html>
