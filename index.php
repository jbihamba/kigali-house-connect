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
<title>KIGALI HOUSE CONNECT</title>
<meta charset="UTF-8">
<meta name="description" content="KIGALI Landing Page Template">
<meta name="keywords" content="KIGALI, unica, creative, html">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="icon" type="img/png" href="img/icons/favicon.ico"/>
<!-- Favicon -->
<link href="img/favicon.ico" rel="shortcut icon"/>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

<!-- Stylesheets -->
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/font-awesome.min.css"/>
<link rel="stylesheet" href="css/animate.css"/>
<link rel="stylesheet" href="css/owl.carousel.css"/>
<link rel="stylesheet" href="css/style.css"/>
<style media="screen">
.spad {
	padding-top: 3px;
	padding-bottom: 0px;
}
.section-title {
    margin-bottom: 0px;
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
<a href="https://web.facebook.com/pages/creation/?ref_type=pages_browser"><i class="fa fa-facebook"></i></a>
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
<li><a href="index.php"><b>Home</b></a></li>
<li><a href="categories.php"><b>FEATURED LISTING</b></a></li>
<li><a href="about.php"><b>ABOUT US</b></a></li>
<!-- <li><a href="single-list.html"><b>Pages</b></a></li> -->
<!-- <li><a href="blog.html"><b>Blog</a></li> -->
<li><a href="contact.php"><b>Contact</b></a></li>
<!-- <li><a href="single-blog.html"><b>CHAT WITH US</b></a></li> -->
</ul>
</div>
</div>
</div>
</div>
</header>
<!-- Header section end -->


<!-- Hero section -->
<section class="hero-section set-bg" data-setbg="img/index3.jpg">
<div class="container hero-text text-white">
<h1>KIGALI HOUSE CONNECT</h1>
<p>Search real estate property records, houses, condos, land and more on kigalihouseconnect.com®.<br>Find property info from the most comprehensive source data.</p>
<a href="#" class="site-btn">VIEW DETAIL</a>
</div>
</section>
<!-- Hero section end -->


<!-- Filter form section -->
<div class="filter-search">
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

<!-- Start Search Resul -->
<span id="getSearch" style="margin-bottom: 20px;">
<!-- Properties section -->
<section class="properties-section spad">
<div class="container">
<div class="section-title text-center">
<h3>RECENT PROPERTIES</h3>
<?php $query = $db->getRows('houses',array('order_by'=>'id desc','limit'=>4, 'where'=>array('status'=>0)));
if(!empty($query)): ?>
<p>Discover how much the latest properties have been sold for</p>
</div>
<div class="row">
<?php  foreach($query as $show):?>
<div class="col-md-6">
	<?php if($show['status']==0): ?>
	<a href="single_list.php?request=<?php echo $show['id'];?>&status=available">
	<?php elseif($show['status']==1): ?>
	<a href="single_list.php?request=<?php echo $show['id'];?>&status=booked">
	<?php endif; ?>
		<div class="propertie-item set-bg" data-setbg="<?php echo 'img/pictures/'.$show['main_picture']; ?>">
		<?php if($show['category']=='For Sale'): ?><div class="sale-notic"><?php echo $show['category']; ?></div>
		<?php elseif($show['category']=='For Rent'): ?><div class="rent-notic"><?php echo $show['category']; ?></div>
		<?php endif; ?>
			<div class="propertie-info text-white">
				<div class="info-warp">
					<h5><?php echo $show['adress'].'  '.$show['location']; ?></h5>
					<?php $query3= $db->getRows('district', array('where' => array('id'=>$show['district_id']) ));
					  if(!empty($query3)): foreach($query3 as $show3):
							$query4= $db->getRows('sector', array('where' => array('id'=>$show['sector_id']) ));
							  if(!empty($query4)): foreach($query4 as $show4): ?>
					<p><i class="fa fa-map-marker"></i> <?php echo $show4['sector_name']; ?>, <?php echo $show3['district_name']; ?> , Kigali City</p>
				<?php endforeach; endif;
			endforeach; endif; ?>
				</div>
			<div class="price">Rwfs <?php echo number_format($show['price']); ?></div>
			</div>
		</div>
	</a>
</div>
<?php  endforeach;
else: echo '<center><p>No Available House for the moment!</p></center>';
?>
</div>
<?php endif; ?>
</div>
</section>
<!-- Properties section end -->


<!-- Services section -->
<section class="services-section spad set-bg" data-setbg="img/service-bg.jpg">
<div class="container">
<div class="row">
<div class="col-lg-6">
<img src="img/service.jpg" alt="">
</div>
<div class="col-lg-5 offset-lg-1 pl-lg-0">
<div class="section-title text-white">
<h3>OUR SERVICES</h3>
<p>We provide the perfect service for </p>
</div>
<div class="services">
<div class="service-item">
<i class="fa fa-comments"></i>
<div class="service-text">
<h5>Consultant Service</h5>
<p>In Aenean purus, pretium sito amet sapien denim consectet sed urna placerat sodales magna leo.</p>
</div>
</div>
<div class="service-item">
<i class="fa fa-home"></i>
<div class="service-text">
<h5>Properties Management</h5>
<p>In Aenean purus, pretium sito amet sapien denim consectet sed urna placerat sodales magna leo.</p>
</div>
</div>
<div class="service-item">
<i class="fa fa-briefcase"></i>
<div class="service-text">
<h5>Renting and Selling</h5>
<p>In Aenean purus, pretium sito amet sapien denim consectet sed urna placerat sodales magna leo.</p>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Services section end -->


<!-- feature section -->
<section class="feature-section spad">
<div class="container">
<div class="section-title text-center">
<h3>Featured Listings</h3>
<p>Browse houses and flats for sale and to rent in your area</p>
</div>
<div class="row">
<?php $query = $db->getRows('houses',array('order_by'=>'id asc', 'limit'=>6, 'where'=>array('status'=>0)));
if(!empty($query)): foreach($query as $show):?>

<div class="col-lg-4 col-md-6">
	<?php if($show['status']==0): ?>
	<a href="single_list.php?request=<?php echo $show['id'];?>&status=available">
	<?php elseif($show['status']==1): ?>
	<a href="single_list.php?request=<?php echo $show['id'];?>&status=booked">
	<?php endif; ?>
<!-- feature -->
<div class="feature-item">
<div class="feature-pic set-bg" data-setbg="<?php echo 'img/pictures/'.$show['main_picture']; ?>">
	<?php if($show['category']=='For Sale'):?><div class="sale-notic"><?php echo $show['category'];?></div>
	<?php elseif($show['category']=='For Rent'):?><div class="rent-notic"><?php echo $show['category'];?></div>
<?php endif; ?>
</div>
<div class="feature-text">
<div class="text-center feature-title">
<h5><?php echo $show['adress'].' '.$show['location']; ?></h5>
<?php $query3= $db->getRows('district', array('where' => array('id'=>$show['district_id']) ));
  if(!empty($query3)): foreach($query3 as $show3):
		$query4= $db->getRows('sector', array('where' => array('id'=>$show['sector_id']) ));
		  if(!empty($query4)): foreach($query4 as $show4): ?>
<p><i class="fa fa-map-marker"></i> <?php echo $show4['sector_name']; ?>, <?php echo $show3['district_name']; ?> , Kigali City</p>
<?php endforeach; endif;
endforeach; endif; ?>
</div>
<div class="room-info-warp">
<div class="room-info">
<div class="rf-left">
<p><i class="fa fa-bed"></i> <?php echo $show['bedroom']; ?> Bedrooms</p>
<?php $query2= $db->getRows('house_owners', array('where' => array('id'=>$show['house_owner_id']) ));
  if(!empty($query2)): foreach($query2 as $show2): ?>
<p><i class="fa fa-user"></i><?php echo $show2['fname'].' '.$show2['lname']; ?></p>
<?php endforeach; endif; ?>
</div>
<div class="rf-right">
<p><i class="fa fa-car"></i> <?php echo $show['garage']; ?> Garages</p>
<p><i class="fa fa-bath"></i> <?php echo $show['bathroom']; ?> Bathrooms</p>
</div>
</div>
<div class="room-info">
<div class="rf-left">

</div>
<div class="rf-right">
</div>
</div>
</div>
<a href="single-list.php" class="room-price">Rwfs <?php echo number_format($show['price']); ?></a>
</div>
</div>
</a>
</div>
<?php endforeach;

 endif; ?>
</div>
</div>
</section>
<!-- feature section end -->

<!-- End Search -->
</span>
<!-- Gallery section -->
<section  style="padding-top: 40px;" class="gallery-section spad">
<div class="container">
<div class="section-title text-center">
<h3>Popular Places</h3>
<p>We understand the value and importance of place</p>
</div>
<div class="gallery">
<div class="grid-sizer"></div>
<a href="houses.php?id=2&district=Gisozi&idh=38&sector=Muhima" class="gallery-item grid-long set-bg" data-setbg="img/gallery/1.jpg">
<div class="gi-info">
<h3>Muhima</h3>
<p>Look For Approriate Properties</p>
</div>
</a>
<a href="houses.php?id=2&district=Gisozi&idh=16&sector=Kimironko" class="gallery-item grid-wide set-bg" data-setbg="img/gallery/2.jpg">
<div class="gi-info">
<h3>Kimironko</h3>
<p>Look For Approriate Properties</p>
</div>
</a>
<a href="houses.php?id=2&district=Gisozi&idh=15&sector=Kacyiru" class="gallery-item set-bg" data-setbg="img/gallery/3.jpg">
<div class="gi-info">
<h3>Kacyiru</h3>
<p>Look For Approriate Properties</p>
</div>
</a>
<a href="houses.php?id=2&district=Gisozi&idh=23&sector=Gikondo" class="gallery-item set-bg" data-setbg="img/gallery/4.jpg">
<div class="gi-info">
<h3>Gikondo</h3>
<p>Look For Approriate Properties</p>
</div>
</a>

</div>
</div>
</section>
<!-- Gallery section end -->



<!-- Review section -->
<section class="review-section set-bg" data-setbg="img/review-bg.jpg">
<div class="container">
<div class="review-slider owl-carousel">
<div class="review-item text-white">
<div class="rating">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
</div>
<p>“KHC was quick to understand my needs and steer me in the right direction. Their professionalism and warmth made the process of finding a suitable home a lot less stressful than it could have been. Thanks, agent Tony Holland.”</p>
<h5>Stacy Mc Neeley</h5>
<span>CEP’s Director</span>
<div class="clint-pic set-bg" data-setbg="img/review/1.jpg"></div>
</div>
<div class="review-item text-white">
<div class="rating">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
</div>
<p>“KHC was quick to understand my needs and steer me in the right direction. Their professionalism and warmth made the process of finding a suitable home a lot less stressful than it could have been. Thanks, agent Tony Holland.”</p>
<h5>Stacy Mc Neeley</h5>
<span>CEP’s Director</span>
<div class="clint-pic set-bg" data-setbg="img/review/1.jpg"></div>
</div>
<div class="review-item text-white">
<div class="rating">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
</div>
<p>“KHC was quick to understand my needs and steer me in the right direction. Their professionalism and warmth made the process of finding a suitable home a lot less stressful than it could have been. Thanks, agent Tony Holland.”</p>
<h5>Stacy Mc Neeley</h5>
<span>CEP’s Director</span>
<div class="clint-pic set-bg" data-setbg="img/review/1.jpg"></div>
</div>
</div>
</div>
</section>
<!-- Review section end-->



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
</body>
</html>
