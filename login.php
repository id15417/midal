<?php 
  session_start();
  $conn = new mysqli("localhost","root","","dbpermintaan");

  $msg="";
  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $level    = $_POST['level'];

    $sql    = "SELECT * FROM user WHERE username=? AND password=? AND level=?";
    $stmt   = $conn->prepare($sql);
    $stmt->bind_param("sss",$username,$password,$level);
    $stmt->execute();
    $result = $stmt->get_result();
    $row    = $result->fetch_assoc();

    session_regenerate_id();
    $_SESSION['id_user']    = $row['id_user'];
    $_SESSION['nm_lengkap'] = $row['nm_lengkap'];
    $_SESSION['username']   = $row['username'];
    $_SESSION['role']       = $row['level'];
    session_write_close();

    if ($result->num_rows==1 && $_SESSION['role'] == "user") {
        $row_akun = mysqli_fetch_array($sql);
        $_SESSION['id_user'] = $row['id_user'];
      header("location:page0/home.php");
    }
    elseif ($result->num_rows==1 && $_SESSION['role'] == "admin") {
      header("location:page1/home.php");
    }
    else {
      $msg = "<strong>Failed!</strong> Username and Password is Incorrect.";
    // echo "<script>alert('Login Gagal, Coba lagi!');document.location.href='index.php'</script>";
    }
  }
  
 ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- w3 CSS iOs style -->
  <link rel="stylesheet" href="assets/css/w3.css">
  <link rel="stylesheet" href="assets/css/w3-colors-ios.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Login</b>MIDAL</a>
  </div>
  <h5 align="center">Aplikasi Monitoring Administrasi Pelayanan Internal</h5>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login to start your session</p>
      <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="form-group lead">
          <label for="level">Role :</label>
          <input type="radio" name="level" value="user" class="custom-radio" required>&nbsp;<b>User</b> |
          <input type="radio" name="level" value="admin" class="custom-radio" required>&nbsp;<b>Admin</b>
        </div>
        <div class="row">
          <div class="col-8">
            <p class="mb-1">
              <a href="#" data-toggle="popover" title="Attention" data-content="Segera hubungi administrator untuk masalah ini." data-placement="bottom">Lupa password</a>
            </p>
            <p class="mb-1">
              <a href="index.php" title="Beranda" data-placement="bottom">Beranda</a>
            </p>
          </div>
          <!-- /.col -->
          <div class="col-4 float-sm-right">
            <button type="submit" name="login" class="w3-button w3-large w3-blue">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      
    </div>
    <h6><p align="center" style="color: red;"><?php echo $msg; ?></p></h6>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
</script>
</body>
</html>
