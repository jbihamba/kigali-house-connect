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
  <style media="screen">
  .bg-register-image {
  background: url(img/login.jpg);
      background-position-x: 0%;
      background-position-y: 0%;
      background-size: auto auto;
  background-position: center;
  background-size: cover;
}
  </style>
</head>

<body class="bg-gradient-primary">
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create a Client Account!</h1>
              </div>
              <form method="post"  action="class/clientControler.php"  enctype="multipart/form-data" class="user">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="fname" required class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="lname"  required class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" name="email" required class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="phone" required class="form-control form-control-user" id="exampleInputPassword" placeholder="Telephone Number">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="adress" required class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Current Adress">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" required class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                  </div>
                  <div class="col-sm-6"><center>
                    <input type="file" style="height: 20px;" name="picture" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Picture"></center>
                  </div>
                </div>
                <button type="submit" name="register" class="btn btn-primary btn-user btn-block">
                  Register Client Account
                </button>
              </form>
              <hr>
              <div class="text-center">
                <!-- <a class="small" href="forgot-password.php">Forgot Password?</a> -->
              </div>
              <div class="text-center">
                <a class="small" href="signin.php">Already have an account? Login!</a>
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

</body>

</html>
