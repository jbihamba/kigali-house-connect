<?php 	session_start();
	//load and initialize database class
	require_once 'core/db.php';
	$db = new DB();
	//include ajax
	include('ajax.php');
  //Auth
  if($_SESSION['id']=='') header('location: index.php');
  $id = $_SESSION['id'];
  $category=$_SESSION['category'];
  if($category=='admin'):
      $getU=$db->getRows('admin',array('where'=>array('id'=>$id)));
      if(!empty($getU)): foreach($getU as $getUser):
          $names = $getUser['fname'].' '.$getUser['lname'];
          $profile=$getUser['profile'];
        endforeach;
      endif;
  elseif($category=='house_owner'):
      $getU=$db->getRows('house_owners',array('where'=>array('id'=>$id)));
      if(!empty($getU)): foreach($getU as $getUser):
          $names = $getUser['fname'].' '.$getUser['lname'];
          $profile=$getUser['profile'];
        endforeach;
      endif;
  endif;
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Kigali House Connect</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
	<!-- PNotify -->
 <link href="pnotify/dist/pnotify.css" rel="stylesheet">
 <link href="pnotify/dist/pnotify.buttons.css" rel="stylesheet">
 <link href="pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

  <style media="screen">
  .sidebar hr.sidebar-divider {
  margin: 0 0rem 0rem;
      margin-top: 0px;
      margin-bottom: 0rem;
}
.modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 0rem;
    outline: 0;
}
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #6e707e;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d1d3e2;
    border-radius: 0rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.dropdown-item {
    display: block;
    width: 100%;
    padding: .2rem .2rem;
    clear: both;
    font-weight: 400;
    color: #3a3b45;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
}
.table td, .table th {
padding: 0px;
    padding-top: .4rem;
    padding-bottom: .4rem;
    padding-left: .4rem;
    padding-right: .4rem;
    vertical-align: top;
    border-top: 1px solid #e3e6f0;
}
  </style>
	<style>
 /* pnotify */
 .bg-fblue, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
		 background-color: #4e73df !important;
		 color: white;
		 border: none;
 }
 </style>
</head>
<?php
$sssData=array();
$sssData=$_SESSION['sessData'];
if($sssData!=''):
?>
<body onpageshow="new PNotify({
								title: 'Notification',
								text: '<?php echo $sssData['status']['msg'];?>',
								type: 'info',
								styling: 'bootstrap3'
						});">
</body>
<?php endif; ?>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
          <img style="width: 50px; height: 50px;" class="img-profile rounded-circle" src="<?php echo $profile; ?>">
        </div>
        <div class="sidebar-brand-text mx-4"> KHC</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="principal.php?request=home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard </span></a>
      </li>
<?php if($category=='admin'): ?>
	<!-- Divider -->
	<hr class="sidebar-divider">
	<li class="nav-item active">
		<a class="nav-link" href="principal.php?request=admin">
			<i class="fa fa-users"></i>
			<span>Administrators</span></a>
	</li>
	<!-- Divider -->
	<hr class="sidebar-divider">
	<li class="nav-item active">
		<a class="nav-link" href="principal.php?request=house-owners">
			<i class="fa fa-users"></i>
			<span>House Owners</span></a>
	</li>
	<hr class="sidebar-divider">
	<li class="nav-item active">
		<a class="nav-link" href="principal.php?request=clients">
			<i class="fa fa-users"></i>
			<span>Clients</span></a>
	</li>
<?php else: ?>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <li class="nav-item active">
        <a class="nav-link" href="principal.php?request=register-house">
          <i class="fa fa-home"></i>
          <span>Register House</span></a>
      </li>
<?php endif; ?>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <li class="nav-item active">
        <a class="nav-link" href="principal.php?request=available-houses">
          <i class="fa fa-home"></i>
          <span>Available Houses</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <li class="nav-item active">
        <a class="nav-link" href="principal.php?request=booked-houses">
          <i class="fa fa-home"></i>
          <span>Booked Houses</span></a>
      </li>
<?php if($category=='house_owner'): ?>
			<!-- Divider -->
      <hr class="sidebar-divider">
      <li class="nav-item active">
        <a class="nav-link" href="principal.php?request=payment">
          <i class="fa fa-home"></i>
          <span>Payment Report</span></a>
      </li>
<?php endif; ?>
<?php if($category=='admin'): ?>
			<!-- Divider -->
      <hr class="sidebar-divider">
      <li class="nav-item active">
        <a class="nav-link" href="principal.php?request=feedback">
          <i class="fa fa-home"></i>
          <span>Feedback</span></a>
      </li>
<?php endif; ?>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">1+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">October 12, 2019</div>
                    <span class="font-weight-bold">The System is working properly!</span>
                  </div>
                </a>

                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <!-- <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                <!-- <i class="fas fa-envelope fa-fw"></i> -->
                <!-- Counter - Messages -->
                <!-- <span class="badge badge-danger badge-counter">7</span>
              </a> -->
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $names; ?></span>
                <img class="img-profile rounded-circle" src="<?php echo $profile;?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
