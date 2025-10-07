        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Register House
                </h6>
            </div>
            <div class="card-body">
              <form enctype="multipart/form-data" class="" action="class/houseControler.php" method="post">
                <div class="modal-body row" >
                    <div class="col-md-6">
                      <select name="category"  required class="form-control">
                          <option value="" hidden>Select Category</option>
                          <option value="For Rent">For Rent</option>
                          <option value="For Sale">For Sale</option>
                      </select>
                      <br>
                      <input type="number" required name="price" placeholder="Price" class="form-control">
                      <br>
                      <select name="district" id="district" onchange="getSectors();" required class="form-control">
                          <option value="" hidden>Select District</option>
<?php $queryD=$db->getRows('district',array('order by'=>'name asc'));
if(!empty($queryD)): foreach($queryD as $getD): ?>
                          <option value="<?php echo $getD['id']; ?>"><?php echo $getD['district_name']; ?></option>
<?php endforeach; endif; ?>
                      </select>
                      <br>
                      <select name="sector" id="display" required class="form-control">
                          <option value="" hidden>Select Sector</option>

                      </select>
                      <br>
                      <input type="text" required name="adress" placeholder="Adress ex. Cafe de Gisozi" class="form-control">
                      <br>
                      <input type="text" required name="location" placeholder="Location ex. KG-750" class="form-control">
                      <br>
                      <textarea name="description" required rows="2" placeholder="Description of the House" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                      <input type="number" required name="garage" placeholder="Number of Garages ex. 0 or 1 or 2 ..." class="form-control">
                      <br>
                      <input type="number" required name="bathroom" placeholder="Number of Bathrooms ex. 0 or 1 or 2 ..." class="form-control">
                      <br>
                      <input type="number" required name="bedroom" placeholder="Number of Bedrooms ex. 0 or 1 or 2 ..." class="form-control">
                      <br>
                      <input type="file" style="padding-bottom: 40px;" name="main_picture" required class="form-control">
                      <br>
                      <input type="file" style="padding-bottom: 40px;" name="picture_1" required class="form-control">
                      <br>
                      <input type="file"style="padding-bottom: 37px;"  name="picture_2" required class="form-control">
                      <br>
                      <input type="file" style="padding-bottom: 37px;" name="picture_3" required class="form-control">
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Logout Modal-->
      <!-- Register New Admin -->
      <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="color: #272930" id="exampleModalLabel">KHC <span class="text-muted"> | <small>House Owners</small> </span> </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form class="" action="class/houseOwnersControler.php" method="post">
          <div class="modal-body">
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
          <div class="modal-footer">
            <button style="background: lightgrey; Color: white;" class="btn-t  btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" name="add"  style="background: #4e73df;" class="btn-t  btn-primary">Register</button>
          </div>
        </form>
      </div>
      </div>
      </div>
