<!DOCTYPE html>
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?= $this->fetch('title') ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<?php echo $this->Html->script('/assets/global/plugins/pace/pace.min.js'); ?>
<?php echo $this->Html->css('/assets/global/plugins/pace/themes/pace-theme-flash.css'); ?>
<?php echo $this->Html->css('/assets/global/plugins/font-awesome/css/font-awesome.min.css'); ?>
<?php echo $this->Html->css('/assets/global/plugins/simple-line-icons/simple-line-icons.min.css'); ?>
<?php echo $this->Html->css('/assets/global/plugins/bootstrap/css/bootstrap.min.css'); ?>
<?php echo $this->Html->css('/assets/global/plugins/uniform/css/uniform.default.css'); ?>
<?php echo $this->Html->css('/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css'); ?>

<?php echo $this->Html->css('/assets/global/plugins/bootstrap-toastr/toastr.min.css'); ?>

<?php echo $this->Html->css('/assets/global/plugins/select2/select2.css'); ?>
<?php echo $this->Html->css('/assets/global/plugins/bootstrap-select/bootstrap-select.min.css'); ?>
<?php echo $this->Html->css('/assets/global/plugins/jquery-multi-select/css/multi-select.css'); ?>
<?php echo $this->Html->css('/assets/global/plugins/icheck/skins/all.css'); ?>
<?php echo $this->Html->css('/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'); ?>
<!-- END GLOBAL MANDATORY STYLES -->
<?php echo $this->Html->css('/assets/global/plugins/clockface/css/clockface.css'); ?>
<?php echo $this->Html->css('/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css'); ?>
<?php echo $this->Html->css('/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css'); ?>
<?php echo $this->Html->css('/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css'); ?>

<!-- BEGIN THEME STYLES -->
<?php echo $this->Html->css('/assets/global/css/components.css'); ?>
<?php echo $this->Html->css('/assets/global/css/plugins.css'); ?>
<?php echo $this->Html->css('/assets/admin/layout/css/layout.css'); ?>
<?php echo $this->Html->css('/assets/admin/layout/css/themes/default.css'); ?>
<?php echo $this->Html->css('/assets/admin/layout/css/custom.css'); ?>
<?php echo $this->Html->css('/assets/global/plugins/jquery-notific8/jquery.notific8.min.css'); ?>
<?php echo $this->Html->css('/assets/global/plugins/icheck/skins/all.css'); ?>
<style media="print">
	.hide_at_print {
		display:none !important;
	}
</style>
<style>
	.error-message {
		color: red;
		font-style: inherit;
	}
</style>


<style>
.self-table > tbody > tr > td, .self-table > tr > td
{
	border-top:none !important;
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
 
    vertical-align:middle !important;
}
option 
{
    border-top:1px solid #CACACA;
    padding:4px;
	cursor:pointer;
}
select 
{
	cursor:pointer;
}
.myshortlogo
{
	font: 15px "Open Sans",sans-serif;
	text-transform: uppercase !important;
	box-sizing:border-box;
}
.toast_success_notify{
	margin: 0px 0px 6px;
	border-radius: 3px;
	background-position: 15px center;
	background-repeat: no-repeat;
	box-shadow: 0px 0px 12px ;
	color: #FFF;
	opacity: 0.8;
	background-color: #42893D;
}
.tost_edit_notify{
	margin: 0px 0px 6px;
	border-radius: 3px;
	background-position: 15px center;
	background-repeat: no-repeat;
	box-shadow: 0px 0px 12px #999;
	color: #FFF;
	opacity: 0.8;
	background-color: #B0B343;	
}
.tost_delete_notify{
	margin: 0px 0px 6px;
	border-radius: 3px;
	background-position: 15px center;
	background-repeat: no-repeat;
	box-shadow: 0px 0px 12px #999;
	color: #FFF;
	opacity: 0.8;
	background-color: #D75C48;
}
</style>
<!-- END THEME STYLES -->
<!-- <link rel="shortcut icon" href="favicon.ico"/> -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-open ">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo" style="padding-top:5px;">
			<span style="color: #cd2831;font-weight: bold;font-size: 17px;" class="myshortlogo">Buildmart</span>
			<br/><span style="color: #FFF;font-size: 12px;">
			<?php 
			$session = $this->request->session(); 
			echo $this->viewVars['s_company_name'];
			?>
			</span>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<!-- END NOTIFICATION DROPDOWN -->
				<!-- BEGIN INBOX DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				
				<!-- END INBOX DROPDOWN -->
				<!-- BEGIN TODO DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				
				<!-- END TODO DROPDOWN -->
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<!-- <img alt="" class="img-circle" src="/assets/admin/layout/img/avatar3_small.jpg"/> -->
					<span class="username username-hide-on-mobile" style="color:#F0F0F0;">
					<strong><?php echo $s_employee_name=$this->viewVars['s_employee_name']; ?></strong> </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<?php 
							//
							echo $this->Html->link('<i class="fa fa-random"></i> Switch Company','/Logins/Switch-Company',array('escape'=>false)); ?>
						</li>
						<li>
							<?php echo $this->Html->link('<i class="icon-key"></i> Log Out','/Logins/logout',array('escape'=>false)); ?>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- BEGIN QUICK SIDEBAR TOGGLER -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
			
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				
				<li><?php echo $this->Html->link('<i class="icon-home"></i> Dashboard','/Dashboard',array('escape'=>false)); ?></li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-file-code-o"></i>
					<span class="title">Quotations</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<?php if(in_array(1,$allowed_pages)){
						echo '<li>'.$this->Html->link( 'Create', '/Quotations/add' ).'</li>';
						} ?>
						<li><?php echo $this->Html->link( 'View', '/Quotations' ); ?></li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-file-code-o"></i>
					<span class="title">Sales Orders</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<?php if(in_array(3,$allowed_pages)){
						echo '<li>'.$this->Html->link( 'Create', '/Sales-Orders/add' ).'</li>';
						} ?>
						<li><?php echo $this->Html->link( 'View', '/Sales-Orders' ); ?></li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-file-code-o"></i>
					<span class="title">Invoices</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li><?php echo $this->Html->link( 'Create', '/Invoices/add' ); ?></li>
						<li><?php echo $this->Html->link( 'View', '/Invoices' ); ?></li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-file-code-o"></i>
					<span class="title">Job Cards</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<?php if(in_array(1,$allowed_pages)){
						echo '<li>'.$this->Html->link( 'Create', '/Job-Cards/Add' ).'</li>';
						} ?>
						<li><?php echo $this->Html->link( 'View', '/Job-Cards' ); ?></li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-university"></i>
					<span class="title">Companies</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li><?php echo $this->Html->link('<i class="icon-home"></i> Company Groups','/company-groups',array('escape'=>false)); ?></li>
						<li>
							<a href="javascript:;">
							<i class="icon-basket"></i>
							<span class="title">Companies</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li><?php echo $this->Html->link( 'Add', '/Companies/add' ); ?></li>
								<li><?php echo $this->Html->link( 'View', '/Companies' ); ?></li>
							</ul>
						</li>
					</ul>
				</li>
				
				<li>
					<a href="javascript:;">
					<i class="fa fa-user"></i>
					<span class="title">Customers</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li><?php echo $this->Html->link('<i class="icon-home"></i> Customer Groups','/Customer-Groups',array('escape'=>false)); ?></li>
						<li><?php echo $this->Html->link('<i class="icon-home"></i> Districts','/Districts',array('escape'=>false)); ?></li>
						<li><?php echo $this->Html->link('<i class="icon-home"></i> Customers Segments','/customer-segs',array('escape'=>false)); ?></li>
						<li>
							<a href="javascript:;">
							<i class="icon-basket"></i>
							<span class="title">Customers</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li><?php echo $this->Html->link( 'Add', '/Customers/add' ); ?></li>
								<li><?php echo $this->Html->link( 'View', '/Customers' ); ?></li>
								<li><?php echo $this->Html->link( 'Temporary Credit Limit', '/Customers/Temporary-Credit-Limit' ); ?></li>
							</ul>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-puzzle-piece"></i>
					<span class="title">Items</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li><?php echo $this->Html->link('<i class="icon-home"></i> Item Categories','/Item-Categories',array('escape'=>false)); ?></li>
						<li><?php echo $this->Html->link('<i class="icon-home"></i> Item Groups','/Item-Groups',array('escape'=>false)); ?></li>
						<li><?php echo $this->Html->link('<i class="icon-home"></i> Item Sub-Groups','/Item-Sub-Groups',array('escape'=>false)); ?></li>
						<!--<li><?php echo $this->Html->link('<i class="icon-home"></i> Item Categories','/Categories',array('escape'=>false)); ?></li>-->
						<li><?php echo $this->Html->link('<i class="icon-home"></i> Units','/units',array('escape'=>false)); ?></li>
						<li>
							<a href="javascript:;">
							<i class="icon-basket"></i>
							<span class="title">Items</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li><?php echo $this->Html->link( 'Add', '/Items/add' ); ?></li>
								<li><?php echo $this->Html->link( 'View', '/Items' ); ?></li>
							</ul>
						</li>
					</ul>
				</li>
				<li><?php echo $this->Html->link('<i class="fa fa-truck"></i> Transporter','/transporters',array('escape'=>false)); ?></li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-file-code-o"></i>
					<span class="title">Employees</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li><?php echo $this->Html->link( 'Create', '/employees/add' ); ?></li>
						<li><?php echo $this->Html->link( 'View', '/employees' ); ?></li>
					</ul>
				</li>
				<li><?php echo $this->Html->link('<i class="fa fa-truck"></i> Logins','/Logins/Add',array('escape'=>false)); ?></li>
				<li><?php echo $this->Html->link('<i class="fa fa-truck"></i> Terms&Conditions','/Terms-Conditions',array('escape'=>false)); ?></li>
				<li><?php echo $this->Html->link('<i class="fa fa-truck"></i> Designations','/Designations',array('escape'=>false)); ?></li>
				<li><?php echo $this->Html->link('<i class="fa fa-truck"></i> Departments','/Departments',array('escape'=>false)); ?></li>
				<li><?php echo $this->Html->link('<i class="fa fa-truck"></i> Files','/Filenames',array('escape'=>false)); ?></li>
				<li><?php echo $this->Html->link('<i class="fa fa-truck"></i> Sale-Taxes','/SaleTaxes',array('escape'=>false)); ?></li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-puzzle-piece"></i>
					<span class="title">Vendors</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li><?php echo $this->Html->link('<i class="icon-home"></i> Add','/Vendors/Add',array('escape'=>false)); ?></li>
						<li><?php echo $this->Html->link('<i class="icon-home"></i> List','/Vendors',array('escape'=>false)); ?></li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-puzzle-piece"></i>
					<span class="title">Purchase Orders</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li><?php echo $this->Html->link('<i class="icon-home"></i> Create','/Purchase-Orders/Add',array('escape'=>false)); ?></li>
						<li><?php echo $this->Html->link('<i class="icon-home"></i> View','/Purchase-Orders',array('escape'=>false)); ?></li>
					</ul>
				</li>
				
				<li>
					<a href="javascript:;">
					<i class="fa fa-puzzle-piece"></i>
					<span class="title">Challans</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li><?php echo $this->Html->link('<i class="icon-home"></i> Create','/Challans/Add',array('escape'=>false)); ?></li>
						<li><?php echo $this->Html->link('<i class="icon-home"></i> View','/Challans',array('escape'=>false)); ?></li>
					</ul>
				</li>
				
				<li>
					<a href="javascript:;">
					<i class="fa fa-puzzle-piece"></i>
					<span class="title">Grns</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li><?php echo $this->Html->link('<i class="icon-home"></i> Create','/Grns/Add',array('escape'=>false)); ?></li>
						<li><?php echo $this->Html->link('<i class="icon-home"></i> View','/Grns',array('escape'=>false)); ?></li>
					</ul>
				</li>
				
				<li>
					<a href="javascript:;">
					<i class="fa fa-puzzle-piece"></i>
					<span class="title">Book Invoice</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li><?php echo $this->Html->link('<i class="icon-home"></i> Create','/InvoiceBookings/Add',array('escape'=>false)); ?></li>
						<li><?php echo $this->Html->link('<i class="icon-home"></i> View','/InvoiceBookings/',array('escape'=>false)); ?></li>
					</ul>
				</li>
				
				<li><?php echo $this->Html->link('<i class="fa fa-puzzle-piece"></i> Ledger Account','/ledgerAccounts',array('escape'=>false)); ?></li>
				<li>
				<li><?php echo $this->Html->link('<i class="fa fa-puzzle-piece"></i> Ledgers','/ledgers',array('escape'=>false)); ?></li>
				<li>
				
				<li>
					<a href="javascript:;">
					<i class="fa fa-puzzle-piece"></i>
					<span class="title">Vouchers</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li><?php echo $this->Html->link('<i class="icon-home"></i> Voucher Refrences','/VouchersReferences',array('escape'=>false)); ?></li>
						<li>
							<a href="javascript:;">
							<i class="icon-basket"></i>
							<span class="title">Payment Voucher</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li><?php echo $this->Html->link( 'Add', '/PaymentVouchers/add' ); ?></li>
								<li><?php echo $this->Html->link( 'View', '/PaymentVouchers' ); ?></li>
							</ul>
						</li>
						<li>
							<a href="javascript:;">
							<i class="icon-basket"></i>
							<span class="title">Receipt Voucher</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li><?php echo $this->Html->link( 'Add', '/ReceiptVouchers/add' ); ?></li>
								<li><?php echo $this->Html->link( 'View', '/ReceiptVouchers' ); ?></li>
							</ul>
						</li>
						<li>
							<a href="javascript:;">
							<i class="icon-basket"></i>
							<span class="title">PeetyCash Voucher</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li><?php echo $this->Html->link( 'Add', '/PettyCashReceiptVouchers/add' ); ?></li>
								<li><?php echo $this->Html->link( 'View', '/PettyCashReceiptVouchers' ); ?></li>
							</ul>
						</li>
						<li>
							<a href="javascript:;">
							<i class="icon-basket"></i>
							<span class="title">Contra Voucher</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li><?php echo $this->Html->link( 'Add', '/ContraVouchers/add' ); ?></li>
								<li><?php echo $this->Html->link( 'View', '/ContraVouchers' ); ?></li>
							</ul>
						</li>
						<li>
							<a href="javascript:;">
							<i class="icon-basket"></i>
							<span class="title">Credit Note</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li><?php echo $this->Html->link( 'Add', '/CreditNotes/add' ); ?></li>
								<li><?php echo $this->Html->link( 'View', '/CreditNotes' ); ?></li>
							</ul>
						</li>
						<li>
							<a href="javascript:;">
							<i class="icon-basket"></i>
							<span class="title">Debit Notes</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li><?php echo $this->Html->link( 'Add', '/DebitNotes/add' ); ?></li>
								<li><?php echo $this->Html->link( 'View', '/DebitNotes' ); ?></li>
							</ul>
						</li>
						<li>
							<a href="javascript:;">
							<i class="icon-basket"></i>
							<span class="title">Journal Voucher</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li><?php echo $this->Html->link( 'Add', '/JournalVouchers/add' ); ?></li>
								<li><?php echo $this->Html->link( 'View', '/JournalVouchers' ); ?></li>
							</ul>
						</li>
					</ul>
				</li>
				
				<li><?php echo $this->Html->link('<i class="fa fa-truck"></i> Quotation Close Reason','/QuotationCloseReasons',array('escape'=>false)); ?></li>	
				<li><?php echo $this->Html->link('<i class="fa fa-truck"></i> Leave Types','/LeaveTypes',array('escape'=>false)); ?></li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-file-code-o"></i>
					<span class="title">Overdue Report</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<?php if(in_array(1,$allowed_pages)){
						echo '<li>'.$this->Html->link( 'Overdue Report for Customers', '/Customers/Over-Due-Report' ).'</li>';
						} ?>
					</ul>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
      
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
   	<div class="page-content" >
            <div ng-spinner-bar="" class="page-spinner-bar hide">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
            </div>
			<!-- BEGIN PAGE HEADER-->
		
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
             
			<div class="row">
         
				<div class="col-md-12">
					
					
					<div id="toast-container" class="toast-top-right" aria-live="polite" role="alert">
					<?= $this->Flash->render() ?>
					</div>
					
					<?php //pr($this->viewVars); ?>
					<?php echo $this->fetch('content'); ?>
					<!--here is page content--->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
	<!-- BEGIN QUICK SIDEBAR -->

	<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 <a href="http://phppoets.com/" target="_blank" style="color:#FFF;">2016 &copy; PHPPOETS IT SOLUTION PVT LTD.</a>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<?php echo $this->Html->script('/assets/global/plugins/jquery.min.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/jquery-migrate.min.js'); ?>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<?php echo $this->Html->script('/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/bootstrap/js/bootstrap.min.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/jquery.blockui.min.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/jquery.cokie.min.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/uniform/jquery.uniform.min.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/icheck/icheck.min.js'); ?>
<!-- END CORE PLUGINS -->
<?php echo $this->Html->script('/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/clockface/js/clockface.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/bootstrap-daterangepicker/moment.min.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/jquery-notific8/jquery.notific8.min.js'); ?>
<?php echo $this->Html->script('/assets/admin/pages/scripts/ui-notific8.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/bootstrap-toastr/toastr.min.js'); ?>

<?php echo $this->Html->script('/assets/global/plugins/select2/select2.min.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/bootstrap-select/bootstrap-select.min.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js'); ?>

<?php echo $this->Html->script('/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'); ?>

<?php echo $this->Html->script('/assets/global/scripts/metronic.js'); ?>
<?php echo $this->Html->script('/assets/admin/layout/scripts/layout.js'); ?>
<?php echo $this->Html->script('/assets/admin/layout/scripts/quick-sidebar.js'); ?>
<?php echo $this->Html->script('/assets/admin/layout/scripts/demo.js'); ?>
<?php echo $this->Html->script('/assets/admin/pages/scripts/form-icheck.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/jquery.pulsate.min.js'); ?>
<?php echo $this->Html->script('/assets/admin/pages/scripts/table-managed.js'); ?>
<?php echo $this->Html->script('/assets/admin/pages/scripts/components-pickers.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/jquery-validation/js/jquery.validate.min.js'); ?>

<?php echo $this->Html->script('/assets/global/plugins/jquery-validation/js/additional-methods.min.js'); ?>
<?php echo $this->Html->script('/assets/admin/pages/scripts/form-validation.js'); ?>
<?php echo $this->Html->script('/assets/admin/pages/scripts/ui-general.js'); ?>
<?php echo $this->Html->script('/assets/global/plugins/icheck/icheck.min.js'); ?>
<script>
jQuery(document).ready(function() {    
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	QuickSidebar.init(); // init quick sidebar
	Demo.init(); // init demo features
	UINotific8.init();
	FormValidation.init();
	TableManaged.init();
	ComponentsPickers.init();
	UIGeneral.init();
	FormiCheck.init(); // init page demo
	ComponentsDropdowns.init();
});
</script>
 
<script>
$("a[role='button']").live('click',function(e){
		e.preventDefault();
	});

$('a[role="button"]').live('click',function(e){
	e.preventDefault();
});

$('.firstupercase').die().live('blur',function(e){
	var str=$(this).val();
	var str2=touppercase(str);
	$(this).val(str2);
});

function touppercase(str){
	str = str.replace(/\b[a-z]/g, function(letter) {
		return letter.toUpperCase();
	});
	return str;
}

$(".nospace").live("keypress",function(e){
	 if(e.which === 32) 
     return false;
 })

$('input').attr('autocomplete','off');

$("textarea").keydown(function(e) {
    if(e.keyCode === 9) { // tab was pressed
        // get caret position/selection
        var start = this.selectionStart;
        var end = this.selectionEnd;

        var $this = $(this);
        var value = $this.val();

        // set textarea value to: text before caret + tab + text after caret
        $this.val(value.substring(0, start)
                    + "\t"
                    + value.substring(end));

        // put caret at right position again (add one for the tab)
        this.selectionStart = this.selectionEnd = start + 1;

        // prevent the focus lose
        e.preventDefault();
    }
});
</script>         

 
</div>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>