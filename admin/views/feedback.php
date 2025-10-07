        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Payment
                </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#No.</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Message</th>
                      <th>InBox</th>
                    </tr>
                  </thead>
                  <tbody>
<?php $query=$db->getRows('feedback',array('Order by'=>'id desc'));
if(!empty($query)): $count=0; foreach($query as $show): $count++; ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $show['name']; ?></td>
                        <td><?php echo $show['email']; ?></td>
                        <td><?php echo $show['message']; ?></td>
                        <td class="btn btn-second">  <a  href="mailto:<?php echo $show['email']; ?>"> Reply</a> </td>
                    </tr>
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
