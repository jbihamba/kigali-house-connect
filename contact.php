<?php 	session_start(); ?>
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
<!-- <li><a href="blog.php">Blog</a></li> -->
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
<h2>Contact</h2>
</div>
</section>
<!--  Page top end -->


<section class="hero-section set-bg" data-setbg="img/index3.jpg">
<!-- page -->
<section class="page-section blog-page">
<div class="container">
<div id="map-canvas"></div>
<div class="contact-info-warp">
<p><i class="fa fa-map-marker"></i>3711-2880 Kabuguru St, Nyamirambo, Nyarugenge </p>
<p><i class="fa fa-envelope"></i>info.kigalihouses@gmail.com</p>
<p><i class="fa fa-phone"></i>(+250) 784 077 896</p>
</div>
<div class="row">
<div class="col-lg-6">
<img src="img/contact.jpg" alt="">
</div>
<div class="col-lg-6">
<div class="contact-right">
<div class="section-title">
<br>
</div>
<form  method="post" action="admin/class/feedbackControler.php" class="contact-form">
  <br><br>
  <h2><b>Get in touch</b></h2>
  <b><p>Browse houses and flats for sale and to rent in your area</p></b>
<div class="row">
<div class="col-md-6">
<input type="text" required name="name" placeholder="Your name">
</div>
<div class="col-md-6">
<input type="text" required name="email" placeholder="Your email">
</div>
<div class="col-md-12">
<textarea name="message" required placeholder="Your message"></textarea>
<input type="hidden" name="house_id" value="0">
<input type="hidden" name="link" value="../../contact.php">
<button type="submit" name="send_feedback" class="site-btn">SUBMIT NOW</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</section>
<!-- page end -->


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
<footer class="footer-section set-bg" data-setbg="img/footer-bg.jpg">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-6 footer-widget">
<h5 class="fw-title">KIGALI HOUSE CONNECT</h5>
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
<li><a href="index.html">Home</a></li>
<li><a href="categories.html">Featured Listing</a></li>
<li><a href="about.html">About us</a></li>
<li><a href="single-list.html">Pages</a></li>
<li><a href="blog.html">Blog</a></li>
<li><a href="contact.html">Contact</a></li>
</ul>
</div>
<div class="copyright">
<p>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">kigalihouseconnect</a>
</p>
</div>
</div>
</div>
</footer>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/magnific-popup.min.js"></script>
<script src="js/main.js"></script>
<!-- PNotify -->
<script src="admin/pnotify/dist/pnotify.js"></script>
<script src="admin/pnotify/dist/pnotify.buttons.js"></script>
<script src="admin/pnotify/dist/pnotify.nonblock.js"></script>
</body>
<?php $_SESSION['sessData']=''; ?>
</html>
