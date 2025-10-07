<?php
  session_start();
  //load and initialize database class
	require_once 'admin/core/db.php';
	$db = new DB();
if(isset($_POST['data'])):
  $data = $_POST['data'];
  $alld=$db->getRows('sector',array('where'=>array('district_id'=>$data)));
  if(!empty($alld)): foreach($alld as $getd):
?>
          <option value="<?php echo $getd['id']; ?>" ><?php echo $getd['sector_name']; ?></option>
  <?php endforeach;
 endif;
endif;?>

<?php
  //Php code for the search houses
if(isset($_POST['search'])):
  $data = $_POST['search'];
  list($district, $sector, $keyword, $category) = explode('|', $data);
  $query = $db->searchHouse($district, $sector, $keyword, $category);
if(!empty($query)): ?>
<!-- feature section -->
<section class="feature-section spad">
<div class="container">
<div class="section-title text-center">
<h3>Search Result</h3>
</div>
<div class="row">

<?php foreach($query as $show): ?>
<div class="col-lg-4 col-md-6">
  <?php if($show['status']==0): ?>
  <a href="single_list.php?request=<?php echo $show['id'];?>&status=available">
  <?php elseif($show['status']==1): ?>
  <a href="single_list.php?request=<?php echo $show['id'];?>&status=booked">
  <?php endif; ?>
<!-- feature -->
<div class="feature-item">
<div class="feature-pic set-bg" style="background: url(<?php echo 'img/pictures/'.$show['main_picture']; ?>); background-repeat: no-repeat;
background-size: cover;
background-position: top center;">
<?php if($show['category']=='For Sale'):?><div class="sale-notic"><?php echo $show['category'];?></div>
<?php elseif($show['category']=='For Rent'):?><div class="rent-notic"><?php echo $show['category'];?></div>
<?php endif; ?>
</div>
<div class="feature-text">
<div class="text-center feature-title">
<h5><?php echo $show['adress'].' '.$show['location']; ?></h5>
<p><i class="fa fa-map-marker"></i>Gasabo , Kigali City</p>
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
<a href="single-list.php" class="room-price">Rwfs <?php echo $show['price']; ?></a>
</div>
</div>
</a>
</div>
<?php endforeach;
else: echo '<center><div class="section-title text-center">No Result found.
</div></center>';
endif; ?>
</div>
</div>
</section>
<br>
<!-- feature section end -->

<?php
endif;
 ?>
