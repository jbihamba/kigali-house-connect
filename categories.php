<?php 	session_start();
	//load and initialize database class
	require_once 'admin/core/db.php';
	$db = new DB();
  //Include Ajax
  include('ajax.php');
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
<style media="screen">
.filter-form {
	padding: 31px;
	background: #30caa0;
	border-radius: 3px;
}
.site-breadcrumb {
    padding: 10px 0;
}
</style>
<style media="screen">
.spad {
	padding-top: 3px;
	padding-bottom: 0px;
}
h5 {
    font-size: 18px;
}
</style>
</head>
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
</div>
</div>
</div>
</div>
</header>
<!-- Header section end -->


<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
<div class="container text-white">
<h2>Featured Listings</h2>
</div>
</section>
<!--  Page top end -->
<center>
	<!-- Filter form section -->
	<div style="margin-top: -5%;" class="filter-search">
	<div class="container">
	<form class="filter-form">
	<div class="form-group row">
	    <select name="district" id="district" onchange="getSectors();" class="col-md-3">
	        <option value="" hidden>District</option>
	<?php $alld=$db->getRows('district',array('Order by'=>'district_name desc'));
	if(!empty($alld)): foreach($alld as $getd):?>
	        <option value="<?php echo $getd['id']; ?>" ><?php echo $getd['district_name']; ?></option>
	<?php endforeach; endif; ?>
	    </select>
	    <select id="display" class="col-md-3">
	        <option value="" hidden>Sector</option>
	    </select>
			<input type="hidden" name="" id="type" value="all">
	    <input type="text" id="location" class="col-md-3" placeholder="Enter a street name, address number or keyword">
	    <style media="screen">
	      .n:hover{ background: #30caa0; color: grey; border: 1px solid gray;}
	    </style>
	    <button type="button" class="btn btn-sm n col-md-2 fa fa-search" onclick="make_search();" style="background: black; color: white;" > SEARCH</button>
	</div>
	</form>
	</div>
	</div>
	<!-- Filter form section end -->
<a href="categories-for-sale.php"><div class="sale-notic">FOR Sale</div></a>
<a href="categories-for-rent.php"><div class="rent-notic">FOR Rent</div></a>

</center>
<!-- Breadcrumb -->
<br>
<span id="getSearch">
<!-- page -->
<section class="page-section categories-page">
<div class="container">
<div class="row">
	<?php
	if(!isset($_GET['range'])): $query= $db->getRows('houses', array('orderd by' => 'id asc', 'where'=>array('status'=>0)));
	elseif(isset($_GET['range'])):
		if($_GET['range']==1):
			$query= $db->getRows('houses', array('order_by' => 'id asc', 'start'=>0, 'limit'=>12,'where'=>array('status'=>0)));
		elseif($_GET['range']==2):
			$query= $db->getRows('houses', array('order_by' => 'id asc', 'start'=>13, 'limit'=>12,'where'=>array('status'=>0)));
		elseif($_GET['range']==3):
			$query= $db->getRows('houses', array('order_by' => 'id asc', 'start'=>25, 'limit'=>12,'where'=>array('status'=>0)));
		elseif($_GET['range']==4):
			$query= $db->getRows('houses', array('order_by' => 'id asc', 'start'=>37, 'limit'=>12,'where'=>array('status'=>0)));
		endif;
	endif;
	if(!empty($query)): $count=0; foreach($query as $show): $count++; ?>
<div class="col-lg-4 col-md-6">
				<div class="feature-item">
					<a href="single_list.php?request=<?php echo $show['id'];?>&status=available">
						<div class="feature-pic set-bg" data-setbg="<?php echo 'img/pictures/'.$show['main_picture']; ?>">
						<?php if($show['category']=='For Sale'):?><div class="sale-notic"><?php echo $show['category'];?></div>
						<?php elseif($show['category']=='For Rent'):?><div class="rent-notic"><?php echo $show['category'];?></div>
					<?php endif; ?>
						</div>
						<div class="feature-text">
								<div class="text-center feature-title">
								<h5><?php echo $show['adress'].'  '.$show['location']; ?></h5>
								<?php $query1=$db->getRows('district', array('where'=>array('id'=>$show['district_id']))); if(!empty($query1)): foreach($query1 as $show1):
									$query2=$db->getRows('sector', array('where'=>array('id'=>$show['district_id']))); if(!empty($query2)): foreach($query2 as $show2): ?>
								<p><i class="fa fa-map-marker"></i> <?php echo $show2['sector_name']; ?>, <?php echo $show1['district_name']; ?>, Kigali City</p>
							<?php endforeach; endif;
						endforeach; endif; ?>
								</div>
								<div class="room-info-warp">
								<div class="room-info">
								<div class="rf-left">
								<p><i class="fa fa-bed"></i> <?php echo $show['bedroom']; ?> Bedrooms</p>
								<?php $query2=$db->getRows('house_owners', array('where'=>array('id'=>$show['house_owner_id']))); if(!empty($query2)): foreach($query2 as $show2): ?>
								<p><i class="fa fa-user"></i> <?php echo $show2['fname'].' '.$show2['lname']; ?></p>
							<?php endforeach; endif; ?>
								</div>
								<div class="rf-right">
								<p><i class="fa fa-car"></i> <?php echo $show['garage'];?> Garages</p>
								<p><i class="fa fa-bath"></i> <?php echo $show['bathroom'];?> Bathrooms</p>
								</div>
								</div>
								<div class="room-info">
								<div class="rf-left">

								</div>
								<div class="rf-right">
								</div>
								</div>
								</div>
							<a href="#" class="room-price">Rwfs <?php echo number_format($show['price']); ?></a>
						</div>
					</a>
				</div>
</div>
<?php endforeach; endif; ?>
</div>
<div class="site-pagination">
<?php if($count>=0 and $count<=12): ?>
<a href="categories.php?range=1">1</a>
<?php endif; if($count>=13 and $count<=24): ?>
<a href="categories.php?range=2">2</a>
<?php endif; if($count>=25 and $count<=36): ?>
<a href="categories.php?range=3">3</a>
<?php endif; if($count>=37 and $count<=48): ?>
<a href="categories.php?range">4</a>
<?php endif; ?>
</div>
</div>
</section>
<!-- page end -->
</span>

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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="" target="_blank">kigalihouseconnect</a>
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
</body>
</html>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/magnific-popup.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
