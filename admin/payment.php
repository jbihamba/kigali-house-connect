<?php session_start();
if($_SESSION['houseID']=='') header('location: signin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Kigali House Connect</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <!-- PNotify -->
 <link href="pnotify/dist/pnotify.css" rel="stylesheet">
 <link href="pnotify/dist/pnotify.buttons.css" rel="stylesheet">
 <link href="pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
  <style media="screen">
  .bg-login-image {
  background: url(../img/feature/6.jpg);
      background-position-x: 0%;
      background-position-y: 0%;
      background-size: auto auto;
  background-position: center;
  background-size: cover;
}
.bg-gradient-primary {
    background: url(../img/feature/6.jpg);
    background-size: cover;
}
  </style>
  <style>
 /* pnotify */
 .bg-fblue, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
     background-color: #4e73df !important;
     color: white;
     border: none;
 }
 </style>
</head>
<?php

$sssData=array();
if($sssData!='' and isset($_SESSION['sessData'])):
  $sssData=$_SESSION['sessData'];
?>
<body onpageshow="new PNotify({
                title: 'Notification',
                text: '<?php echo $sssData['status']['msg'];?>',
                type: 'info',
                styling: 'bootstrap3'
            });">
</body>
<?php endif; ?>
<body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Payment </h1>
                  </div>
                  <form enctype="multipart/form-data" method="post" action="class/paymentControler.php" >
                    <div class="form-group">
                      <select name="bank_name" class="form-control form-control-user"  >
                          <option value="" hidden>Select Bank</option>
                          <option value="Access Bank">Access Bank</option>
                          <option value="Bank of Kigali">Bank of Kigali</option>
                          <option value="Eco Bank / Kigali(Former BCDI)">Eco Bank / Kigali(Former BCDI)</option>
                          <option value="Equity Bank">Equity Bank</option>
                          <option value="I & M Bank(Former BCR)/Kigali">I & M Bank(Former BCR)/Kigali</option>
                          <option value="Kenya Commercial Bank">Kenya Commercial Bank</option>
                          <option value="Unguka Bank">Unguka Bank</option>
                      </select>
                    </div>
                    <div class="form-group" style="margin-top: -9px;">
                      <label for="">Payment Date</label>
                      <input type="date" name="payment_date" class="form-control form-control-user" >
                    </div>
                    <div class="form-group">
                      <input type="text" name="slip_number" class="form-control form-control-user"  placeholder="Bank Slip Number...">
                    </div>
                    <div class="form-group">
                      <input type="number" name="amount" class="form-control form-control-user" placeholder="Amount Paid(Rwf)">
                    </div>
                    <div class="form-group" style="padding-bottom: 2px;">
                      <input type="file" style="padding-bottom: 20px;" name="slip_picture" class="form-control form-control-user" >
                    </div>
                    <button type="submit" name="save_book_payment" class="btn btn-primary btn-user btn-block">
                      Submit
                    </button>
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <!-- PNotify -->
<script src="pnotify/dist/pnotify.js"></script>
<script src="pnotify/dist/pnotify.buttons.js"></script>
<script src="pnotify/dist/pnotify.nonblock.js"></script>
</body>
<?php $_SESSION['sessData']=''; ?>
</html>
