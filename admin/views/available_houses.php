        <!-- Begin Page Content -->
        <div class="container-fluid">


          <div class="row">
<?php
if($category=='admin'): $query = $db->getRows('houses',array('where'=>array('status'=>0)));
elseif($category=='house_owner'): $query = $db->getRows('houses',array('where'=>array('status'=>0, 'house_owner_id'=>$id)));
endif;
      if(!empty($query)): foreach($query as $show):
        $districtInfo = $db->getRows('district', array('where'=>array('id'=>$show['district_id'])));
        if(!empty($districtInfo)): foreach($districtInfo as $showD):
          $sectorInfo = $db->getRows('sector', array('where'=>array('id'=>$show['sector_id'])));
          if(!empty($sectorInfo)): foreach($sectorInfo as $showS):
          ?>
            <div class="col-lg-6">
              <!-- Collapsable Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample<?php echo $show['id'];?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <img src="<?php echo '../img/pictures/'.$show['main_picture']; ?>" style="width: 111%; height: 180px;" alt="">
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample1">
                  <div class="card-body">
                     <div class="">
                       <?php echo $show['location']; ?> <?php echo $show['adress']; ?>, <?php echo $showS['sector_name']; ?>, <?php echo $showD['district_name']; ?>, Kigali
                     </div>
                     <div class="">
                       <?php if($show['category']=='For Sale'): ?>
                          <button type="button" class="btn btn-danger" style="border-radius: 0px;" name="button"><?php echo $show['category']; ?></button>
                       <?php elseif($show['category']=='For Rent'): ?>
                          <button type="button" class="btn btn-danger" style="border-radius: 0px;" name="button"><?php echo $show['category']; ?></button>
                       <?php endif; ?>
                       <button type="button" style="border-radius: 0px;" class="btn btn-primary" name="button"><?php echo $show['price']; ?> Frw</button>
                       <a href="../single_list.php?request=<?php echo $show['id'];?>&status=available" style="border-radius: 0px;"  class="btn btn-primary" name="button">More Info</a>
                     </div>
                  </div>
                </div>
              </div>
          </div>
<?php  endforeach; endif;
endforeach; endif;
endforeach; else: ?>

            <div class="col-lg-12" style="margin-bottom: 46%;">
              <!-- Collapsable Card Example -->
              <div class="card shadow mb-4" style="background: lightgray;">
                <!-- Card Header - Accordion -->
                <!-- <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <img src="../img/index4.jpg" style="width: 111%; height: 180px;" alt="">
                </a> -->
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                     <div class="" style="color: white;">
                       <center>The list of available houses is empty!</center>
                     </div>
                     <!-- <div class="">
                       <button type="button" class="btn btn-success" style="border-radius: 0px;" name="button">For Rent</button>
                       <button type="button" style="border-radius: 0px;" class="btn btn-primary" name="button">500 000 Frw</button>
                       <a href="" style="border-radius: 0px;"  class="btn btn-primary" name="button">More Info</a>
                     </div> -->

                  </div>
                </div>
              </div>
          </div>
<?php endif; ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
