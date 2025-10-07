        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary row">List of Payment
                  <a href="excel.php" class="btn btn-primary btn-sm pull-right "  style="position: absolute; right: 20px; top: 10px;">Excel</a>
                  </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
<?php $output = '
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#No.</th>
                      <th>House</th>
                      <th>Category</th>
                      <th>Adress</th>
                      <th>Client </th>
                      <th>Amount Paid</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>';
$query=$db->getRows('payment', array('Order by'=>'id asc'));
if(!empty($query)): $count=0; foreach($query as $show):
$houses = $db->getRows('houses', array('where'=> array('house_owner_id'=>$id,'id'=>$show['house_id'])));
if(!empty($houses)): foreach($houses as $house): $count++;
    $clients = $db->getRows('clients', array('where'=>array('id'=>$show['client_id'])));
    if(!empty($clients)): foreach($clients as $get): $clientName = $get['fname'].' '.$get['lname']; endforeach; endif;

    $output.='                <tr>
                        <td>'.$count.'</td>
                        <td>'.$house['location'].'</td>
                        <td>'.$house['category'].'</td>
                        <td>';
                        $sector = $db->getRows('sector', array('where'=> array('id'=>$house['sector_id'])));
                        if(!empty($sector)): foreach($sector as $sector):
                $output.= $sector['sector_name'];
                       endforeach; endif;
    $output.='
                        </td>
                        <td>'.$clientName.'</td>
                        <td>'.$house['price'].' Rwf</td>
                        <td>'.$house['c_date'].'</td>
                    </tr>';
endforeach; endif;
endforeach; endif;

$output.=' </tbody>
                </table>';
//Display the content
echo $output;
//Send Session
$_SESSION['output']=$output;
$_SESSION['filename']='payment_report';
?>
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
