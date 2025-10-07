<?php session_start();
if($_SESSION['house_id']=='') header('location: ../index.php');
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
                    <h1 class="h4 text-gray-900 mb-4">Clients Sign In</h1>
                  </div>
                  <form method="post" action="class/signinControler.php" class="user">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <!-- <a class="small" href="forgot-password.php">Forgot Password?</a> -->
                  </div>
                  <div class="text-center">
                    <a class="small" href="signup.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <style media="screen">
  footer.sticky-footer {
  padding: 0rem 0;
  flex-shrink: 0;
}
  </style>
  <footer class="sticky-footer" >
    <div class="container my-auto row">
      <div class="copyright col-md-10 text-center my-auto">
        <span style="color: white;">Copyright &copy; Kigali House Connect ~ 2019</span>
      </div>
      <div class="copyright text-center col-md-2 pull-right my-auto">
        <a  href="../index.php" name="login" class="btn btn-primary btn-user btn-block">
          Go to Website
        </a>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->
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
