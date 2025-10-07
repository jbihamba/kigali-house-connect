        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Clients
                </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#No.</th>
                      <th>Names</th>
                      <th>Email</th>
                      <th>Telephone</th>
                      <th>Adress</th>
                      <!-- <th>House</th> -->
                      <!-- <th>Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
<?php
$tableName='clients';
$condition=array(
                 'order by' => 'id desc'
                );
$query=$db->getRows($tableName,$condition);
if(!empty($query)): $count=0;
  foreach($query as $show): $count++;
   ?>
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo $show['fname'].' '.$show['lname']; ?></td>
                      <td><?php echo $show['email']; ?></td>
                      <td><?php echo $show['phone']; ?></td>
                      <td><?php echo $show['adress'] ;?></td>
                      <!-- <td><?php if($show['status']==1) echo 'Activated'; else echo 'Desactivated'; ?></td> -->
                      <!-- <td style="width: 99px; padding-left: 30px;">
                        <center>
                            <div class="row">
                              <a style="color: #e74a3b;" class="dropdown-item col-md-4" href="#" data-toggle="modal" data-target="#delete<?php echo $show['id'];?>">
                              <i class="fa fa-trash  "></i>
                            </a> <a  style="color: #4e73df;" class="dropdown-item col-md-6" href="#" data-toggle="modal" data-target="#edit<?php echo $show['id'];?>">
                              <i class="fa fa-edit "></i>
                            </a>
                            </div>
                        </center>
                      </td> -->
                    </tr>
                    <!-- MOdal to delete -->
                    <div class="modal fade" id="delete<?php echo $show['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" style="color: #272930" id="exampleModalLabel">KHC <span class="text-muted"> | <small>House Owners</small> </span> </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <form class="" action="class/houseOwnersControler.php" method="post">
                        <div class="modal-body">Do you want to delete this Admin: <?php echo $show['fname'].' '.$show['lname']; ?> ?</div>
                        <div class="modal-footer">
                          <input type="hidden" name="ID" value="<?php echo $show['id'];?>">
                          <button style="background: lightgrey; Color: white;" class="btn-t  btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <button type="submit" style="background: #e74a3b;" name="delete" class="btn-t  btn-primary" >Delete</button>
                        </div>
                      </form>
                    </div>
                    </div>
                    </div>
                    <!-- Logout Modal-->
                    <!-- Edit New Admin -->
                    <div class="modal fade" id="edit<?php echo $show['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <input type="text" name="fname"  value="<?php echo $show['fname'];?>" class="form-control">
                          <br>
                          <input type="text" name="lname"  value="<?php echo $show['lname'];?>" class="form-control">
                          <br>
                          <input type="email" name="email"  value="<?php echo $show['email'];?>" class="form-control">
                          <br>
                          <input type="number" name="phone"  value="<?php echo $show['phone'];?>" class="form-control">
                          <br>
                          <input type="text" name="adress"  value="<?php echo $show['adress'];?>" class="form-control">
                          <br>
                          <select name="status"  value="<?php echo $show['adress'];?>" class="form-control">
                              <option value="<?php echo $show['status']; ?>" hidden><?php if($show['status']==1) echo 'Activated'; else echo 'Desactivated'; ?></option>
                              <option value="1">Activate</option>
                              <option value="0">Desactivate</option>
                          </select>

                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="ID" value="<?php echo $show['id'];?>">
                          <button style="background: lightgrey; Color: white;" class="btn-t  btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <button type="submit" name="update"  style="background: #4e73df;" class="btn-t  btn-primary">Register</button>
                        </div>
                      </form>
                    </div>
                    </div>
                    </div>
<?php endforeach; endif; ?>
                  </tbody>
                </table>
              </div>
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
