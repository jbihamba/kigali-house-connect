<?php
  session_start();
  if(!isset($_GET['request'])) header('location: index.php');
  if(!isset($_SESSION['sessData'])) $_SESSION['sessData']='';
	//load and initialize database class
	require_once 'admin/core/db.php';
	$db = new DB();
  $house_id = $_GET['request'];
  $house_info = $db->getRows('houses', array('where'=>array('id'=>$house_id)));
  if(!empty($house_info)): foreach($house_info as $show):
    $district_info = $db->getRows('district', array('where'=>array('id'=>$show['district_id'])));
    if(!empty($district_info)): foreach($district_info as $showDistrict):
      $sector_info = $db->getRows('sector', array('where'=>array('id'=>$show['sector_id'])));
      if(!empty($sector_info)): foreach($sector_info as $showSector):
        $house_owner_info = $db->getRows('house_owners', array('where'=>array('id'=>$show['house_owner_id'])));
        if(!empty($house_owner_info)): foreach($house_owner_info as $showOwner):
          $category = $show['category'];
          $price = $show['price'];
          $main_picture = $show['main_picture'];
          $picture_1 = $show['picture_1'];
          $picture_2 = $show['picture_2'];
          $picture_3 = $show['picture_3'];
          $district = $showDistrict['district_name'];
          $sector = $showSector['sector_name'];
          $location = $show['location'];
          $adress = $show['adress'];
          $garage = $show['garage'];
          $bathroom = $show['bathroom'];
          $bedroom = $show['bedroom'];
          $house_owner_name = $showOwner['fname'].' '.$showOwner['lname'];
          $house_owner_email= $showOwner['email'];
          $house_owner_phone= $showOwner['phone'];
          $house_owner_adress=$showOwner['adress'];
          $house_owner_profile = $showOwner['profile'];
          $description = $show['description'];
          //Getting sessio house ID
          $_SESSION['house_id'] = $house_id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>KIGALI HOUSE CONNECT - Page Template</title>
<meta charset="UTF-8">
<meta name="description" content="KIGALI HOUSE Landing Page Template">
<meta name="keywords" content="KIGALI HOUSE, unica, creative, html">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Favicon -->
<link href="img/favicon.ico" rel="shortcut icon"/>
<link rel="icon" type="img/png" href="img/icons/favicon.ico"/>


<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

<!-- Stylesheets -->
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/font-awesome.min.css"/>
<link rel="stylesheet" href="css/animate.css"/>
<link rel="stylesheet" href="css/owl.carousel.css"/>
<link rel="stylesheet" href="css/style.css"/>
<!-- PNotify -->
<link href="admin/pnotify/dist/pnotify.css" rel="stylesheet">
<link href="admin/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
<link href="admin/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
/* pnotify */
.bg-fblue, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
   background-color: #30caa0 !important;
   color: white;
   border: none;
}
.single-list-content .price-btn {
    display: inline-block;
    font-size: 22px;
    font-weight: 600;
    text-align: center;
    padding: 9px;
    background: #30caa0;
    color: #fff;
    min-width: 200px;
    border-radius: 2px;
    margin-bottom: 70px;
}
.rent-booked {
    background: #30caa0;
    color: #fff;
    font-size: 12px;
    text-transform: uppercase;
    background: #e94646;
    padding: 7px 13px;
    display: inline-block;
    border-radius: 2px;
    position: relative;
    z-index: 3;
    margin: 20px;
}

.description {
    margin-bottom: 0px;
}
h5 {
    font-size: 18px;
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
<body>
<!-- Page Preloder -->
<div id="preloder">
<div class="loader"></div>
</div>

<!-- Header section -->
<header class="header-section">
<div class="header-top">
<div class="container">
<div class="row">
<div class="col-lg-6 header-top-left">
<div class="top-info">
<i class="fa fa-phone"></i>
(+250) 784 077 896
</div>
<div class="top-info">
<i class="fa fa-envelope"></i>
info.kigalihouses@gmail.com
</div>
</div>

<div class="col-lg-6 text-lg-right header-top-right">
<div class="top-social">
<a href=""><i class="fa fa-facebook"></i></a>
<a href=""><i class="fa fa-twitter"></i></a>
<a href=""><i class="fa fa-instagram"></i></a>
<a href=""><i class="fa fa-pinterest"></i></a>
<a href=""><i class="fa fa-linkedin"></i></a>
</div>
<div class="user-panel">
<a href="admin/register.php"><i class="fa fa-user-circle-o"></i> Register</a>
<a href="admin/index.php"><i class="fa fa-sign-in"></i> Login</a>
</div>
</div>
</div>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-12">
<div class="site-navbar">

<div class="nav-switch">
<i class="fa fa-bars"></i>
</div>
<ul class="main-menu">
<li><a href="index.php">Home</a></li>
<li><a href="categories.php">FEATURED LISTING</a></li>
<li><a href="about.php">ABOUT US</a></li>
<!-- <li><a href="single-list.html">Pages</a></li> -->
<!-- <li><a href="blog.html">Blog</a></li> -->
<li><a href="contact.php">Contact</a></li>
<!-- <li><a href="single-blog.html">CHAT WITH US</a></li> -->
</ul>
</div>
</div>
</div>
</div>
</header>
<!-- Header section end -->

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
<div class="container text-white">
<h2>SINGLE LISTING</h2>
</div>
</section>
<!--  Page top end -->

<br>

<!-- Page -->
<section class="page-section">
<div class="container">
<div class="row">
<div class="col-lg-8 single-list-page">
<div class="single-list-slider owl-carousel" id="sl-slider">
<div class="sl-item set-bg" data-setbg="img/pictures/<?php echo $main_picture; ?>">
  <?php if($_GET['status']=='booked'): ?> <div class="rent-booked" style="background: #30caa0;">BOOKED</div>
  <?php elseif($category=='For Sale'): ?> <div class="sale-notic">FOR SALE</div>
  <?php elseif($category=='For Rent'): ?> <div class="rent-notic">FOR Rent</div>
  <?php endif; ?>
</div>
<div class="sl-item set-bg" data-setbg="img/pictures/<?php echo $picture_1; ?>">
  <?php if($_GET['status']=='booked'): ?> <div class="rent-booked" style="background: #30caa0;">BOOKED</div>
  <?php elseif($category=='For Sale'): ?> <div class="sale-notic">FOR SALE</div>
  <?php elseif($category=='For Rent'): ?> <div class="rent-notic">FOR Rent</div>
  <?php endif; ?>
</div>
<div class="sl-item set-bg" data-setbg="img/pictures/<?php echo $picture_2; ?>">
  <?php if($_GET['status']=='booked'): ?> <div class="rent-booked" style="background: #30caa0;">BOOKED</div>
  <?php elseif($category=='For Sale'): ?> <div class="sale-notic">FOR SALE</div>
  <?php elseif($category=='For Rent'): ?> <div class="rent-notic">FOR Rent</div>
  <?php endif; ?>
</div>
<div class="sl-item set-bg" data-setbg="img/pictures/<?php echo $picture_3; ?>">
  <?php if($_GET['status']=='booked'): ?> <div class="rent-booked" style="background: #30caa0;">BOOKED</div>
  <?php elseif($category=='For Sale'): ?> <div class="sale-notic">FOR SALE</div>
  <?php elseif($category=='For Rent'): ?> <div class="rent-notic">FOR Rent</div>
  <?php endif; ?>
</div>
<div class="sl-item set-bg" data-setbg="img/pictures/<?php echo $main_picture; ?>">
  <?php if($_GET['status']=='booked'): ?> <div class="rent-booked" style="background: #30caa0;">BOOKED</div>
  <?php elseif($category=='For Sale'): ?> <div class="sale-notic">FOR SALE</div>
  <?php elseif($category=='For Rent'): ?> <div class="rent-notic">FOR Rent</div>
  <?php endif; ?>
</div>
</div>
<div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">
<div class="sl-thumb set-bg" data-setbg="img/pictures/<?php echo $main_picture; ?>"></div>
<div class="sl-thumb set-bg" data-setbg="img/pictures/<?php echo $picture_1; ?>"></div>
<div class="sl-thumb set-bg" data-setbg="img/pictures/<?php echo $picture_2; ?>"></div>
<div class="sl-thumb set-bg" data-setbg="img/pictures/<?php echo $picture_3; ?>"></div>
<div class="sl-thumb set-bg" data-setbg="img/pictures/<?php echo $main_picture; ?>"></div>
</div>
<div class="single-list-content">
<div class="row">
<div class="col-xl-8 sl-title">
<h2><?php echo $location; ?> <?php echo $adress; ?></h2>
<p><i class="fa fa-map-marker"></i><?php echo $sector; ?>, <?php echo $district; ?></p>
</div>
<div class="col-xl-4 row">
<a href="#" class="price-btn col-md-4" style="margin-right: 5%;">Rwfs <?php echo number_format($price); ?></a>
<?php if($_GET['status']=='available'): ?>
  <a href="admin/signin.php" class="price-btn col-md-6 pull-right"  style="background: #34574d;">Book This House</a>
<?php elseif($_GET['status']=='booked'): ?>
  <a  class="price-btn col-md-7 pull-right"  style="background: #34574d; color: white;">This House is booked!</a>
<?php endif; ?>

</form>
</div>
</div>
<h3 class="sl-sp-title">Property Details</h3>
<div class="row property-details-list">
<div class="col-md-4 col-sm-6">
<!-- <p><i class="fa fa-th-large"></i> 1500 Square foot</p> -->
<p><i class="fa fa-bed"></i> <?php echo $bedroom; ?> Bedrooms</p>
<p><i class="fa fa-user"></i> <?php echo $house_owner_name; ?></p>
</div>
<div class="col-md-4 col-sm-6">
<p><i class="fa fa-car"></i> <?php echo $garage; ?> Garages</p>
<p><i class="fa fa-building-o"></i> Family Villa</p>
</div>
<div class="col-md-4">
<p><i class="fa fa-bath"></i> <?php echo $bathroom; ?> Bathrooms</p>
<!-- <p><i class="fa fa-trophy"></i> 5 years age</p> -->
<p><i class="fa fa-clock-o"></i> 1 days ago</p>

</div>
</div>
<h3 class="sl-sp-title">Description</h3>
<div class="description">
<p style="width: 100%; word-wrap: break-word; text-align: justify; padding-bottom: 0px;"><?php echo $description; ?></p>
</div>

</div>
</div>
<!-- sidebar -->
<div class="col-lg-4 col-md-7 sidebar">
<div class="author-card">
<div class="author-img set-bg" data-setbg="<?php echo 'admin/'.$house_owner_profile; ?>"></div>
<div class="author-info">
<h5><?php echo $house_owner_name; ?></h5>
<p><?php echo $house_owner_adress; ?></p>
</div>
<div class="author-contact">
<p><i class="fa fa-phone"></i><?php echo $house_owner_phone ?></p>
<p><i class="fa fa-envelope"></i><?php echo $house_owner_email; ?></p>
</div>
</div>
<div class="contact-form-card">
<h5>Do you have any question?</h5>
<form method="post" action="admin/class/feedbackControler.php">
<input type="text" name="name" placeholder="Your name">
<input type="text"  name="email" placeholder="Your email">
<textarea  name="message" placeholder="Your question"></textarea>
<input type="hidden" name="house_id" value="1">
<input type="hidden" name="link" value="../../single_list.php">
<button type="submit" name="send_feedback">SEND</button>
</form>
</div>

</div>
</div>
</div>
</section>
<!-- Page end -->

<!-- Clients section -->
<div class="clients-section">
<div class="container">
<div class="clients-slider owl-carousel">
<a href="#">
<img src="img/partner/1.png" alt="">
</a>
<a href="#">
<img src="img/partner/2.png" alt="">
</a>
<a href="#">
<img src="img/partner/3.png" alt="">
</a>
<a href="#">
<img src="img/partner/4.png" alt="">
</a>
<a href="#">
<img src="img/partner/5.png" alt="">
</a>
</div>
</div>
</div>
<!-- Clients section end -->


<!-- Footer section -->
<footer class="footer-section set-bg" data-setbg="img/footer-bg.jpg">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-6 footer-widget">
<h4 class="fw-title">KGALI HOUSE CONNECT</h4><br/>
<p>Lorem ipsum dolo sit azmet, consecter dipise consult  elit. Maecenas mamus antesme non anean a dolor sample tempor nuncest erat.</p>
<div class="social">
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
<a href="#"><i class="fa fa-instagram"></i></a>
<a href="#"><i class="fa fa-pinterest"></i></a>
<a href="#"><i class="fa fa-linkedin"></i></a>
</div>
</div>
<div class="col-lg-3 col-md-6 footer-widget">
<div class="contact-widget">
<h5 class="fw-title">CONTACT US</h5>
<p><i class="fa fa-map-marker"></i>3711-2880 Kabuguru St, Nyamirambo, Nyarugenge </p>
<p><i class="fa fa-phone"></i>(+250) 784 077 896</p>
<p><i class="fa fa-envelope"></i>info.kigalihouses@gmail.com</p>
<p><i class="fa fa-clock-o"></i>Mon - Sat, 08 AM - 06 PM</p>
</div>
</div>
<div class="col-lg-3 col-md-6 footer-widget">
<div class="double-menu-widget">
<h5 class="fw-title">POPULAR PLACES</h5>
<ul>
<li><a href="houses.php?id=2&district=Gasabo&idh=17&sector=Remera">Remera</a></li>
<li><a href="houses.php?id=2&district=Gasabo&idh=23&sector=Gikondo">Gikondo</a></li>
<li><a href="houses.php?id=2&district=Gasabo&idh=25&sector=Kanombe">Kanombe</a></li>
<li><a href="houses.php?id=2&district=Gasabo&idh=24&sector=Kagunga">Kagunga</a></li>
<li><a href="houses.php?id=1&district=Kicukiro&idh=2&sector=Masaka">Masaka</a></li>

</ul>
<ul>
<li><a href="houses.php?id=2&district=Gasabo&idh=19&sector=Kinyinya">Kinyinya</a></li>
<li><a href="houses.php?id=2&district=Gasabo&idh=15&sector=Kacyiru">Kacyiru</a></li>
<li><a href="houses.php?id=2&district=Gasabo&idh=14&sector=Kimihurura">Kimihurura</a></li>
<li><a href="houses.php?id=2&district=Gasabo&idh=16&sector=Kimironko">Kimironko</a></li>
<li><a href="houses.php?id=2&district=Gasabo&idh=18&sector=Gisozi">Gisozi</a></li>

</ul>
</div>
</div>
<div class="col-lg-3 col-md-6  footer-widget">
<div class="newslatter-widget">
<h5 class="fw-title">NEWSLETTER</h5>
<p>Subscribe your email to get the latest news and new offer also discount</p>
<form class="footer-newslatter-form">
<input type="text" placeholder="Email address">
<button><i class="fa fa-send"></i></button>
</form>
</div>
</div>
</div>
<div class="footer-bottom">
<div class="footer-nav">
<ul>
<li><a href="">Home</a></li>
<li><a href="">Featured Listing</a></li>
<li><a href="">About us</a></li>
<li><a href="">Pages</a></li>
<li><a href="">Blog</a></li>
<li><a href="">Contact</a></li>
</ul>

</div>
<div class="copyright">
<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
</div>
</div>
</div>
</footer>
<!-- Footer section end -->


<!--====== Javascripts & Jquery ======-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/magnific-popup.min.js"></script>
<script src="js/main.js"></script>


<!-- load for map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo"></script>
<script src="js/map-2.js"></script>
<!-- PNotify -->
<script src="admin/pnotify/dist/pnotify.js"></script>
<script src="admin/pnotify/dist/pnotify.buttons.js"></script>
<script src="admin/pnotify/dist/pnotify.nonblock.js"></script>

<!-- Register New Admin -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-lg">
  <div class="modal-header">
    <h5 class="modal-title" style="color: #272930" id="exampleModalLabel">KHC <span class="text-muted"> | <small> CLIENT REGISTRATION AND PAYMENT</small> </span> </h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <form class="" action="class/houseOwnersControler.php" method="post">
    <div class="modal-body">
      <div class="row">
          <div class="col-md-7" style="border-right: 1px solid gray;">
            <input type="text" name="fname" placeholder="First Name" class="form-control">
            <br>
            <input type="text" name="lname" placeholder="Last Name" class="form-control">
            <br>
            <input type="email" name="email" placeholder="Email" class="form-control">
            <br>
            <input type="number" name="phone" placeholder="Telephone" class="form-control">
            <br>
            <input type="text" name="adress" placeholder="Adress" class="form-control">
            <br>
            <select name="status"  value="<?php echo $show['adress'];?>" class="form-control">
                <option value="1">Activate</option>
                <option value="0">Desactivate</option>
            </select>
          </div>
          <div class="col-md-5">
            <input type="text" name="fname" placeholder="First Name" class="form-control">
            <br>
            <input type="text" name="lname" placeholder="Last Name" class="form-control">
            <br>
            <input type="email" name="email" placeholder="Email" class="form-control">
            <br>
            <input type="number" name="phone" placeholder="Telephone" class="form-control">
            <br>
            <input type="text" name="adress" placeholder="Adress" class="form-control">
            <br>
            <select name="status"  value="<?php echo $show['adress'];?>" class="form-control">
                <option value="1">Activate</option>
                <option value="0">Desactivate</option>
            </select>
          </div>
      </div>
    </div>
    <div class="modal-footer">
      <button style="background: lightgrey; Color: white;" class="btn-t  btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <button type="submit" name="add"  style="background: #4e73df;" class="btn-t  btn-primary">Register</button>
    </div>
  </form>
</div>
</div>
</div>
<?php $_SESSION['sessData']=''; ?>
</body>
</html>
<?php
endforeach; endif;
endforeach; endif;
endforeach; endif;
endforeach;
else: echo '<center><span>Access denied to this page!</span></center>';
endif;
 ?>
