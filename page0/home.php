<?php
include '../inc/koneksi.php';
session_start();  
  
  if (!isset($_SESSION['username']) || $_SESSION['role']!="user") {
      header("location:../index.php");
  }

//include 'inc/koneksi.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Midal - Monitoring Administrasi Pelayanan Internal</title>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../dist/css/adminlte.min.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="../Buttons-1.6.1/css/buttons.bootstrap4.min.css"/>
<!-- w3 CSS iOs style -->
<link rel="stylesheet" href="../assets/css/w3.css">
<link rel="stylesheet" href="../assets/css/w3-colors-ios.css">

<script type="text/javascript" src="../assets/js/jquery-3.4.1.min.js"></script>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>


<!-- Memanggil jQuery.js -->
<script src="../assets/js/jquery-3.2.1.min.js"></script>

<!-- Memanggil Autocomplete.js -->
<script src="../assets/js/jquery.autocomplete.min.js"></script>

<style type="text/css">
    body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Lato', sans-serif;
    font-size: 14px;
  }
  .table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
    border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
  .table-title {        
    padding-bottom: 15px;
    background: #435d7d;
    color: #fff;
    padding: 16px 30px;
    margin: -20px -25px 10px;
    border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
  }
  .table-title .btn-group {
    float: right;
  }
  .table-title .btn {
    color: #fff;
    float: right;
    font-size: 13px;
    border: none;
    min-width: 50px;
    border-radius: 2px;
    border: none;
    outline: none !important;
    margin-left: 10px;
  }
  .table-title .btn i {
    float: left;
    font-size: 21px;
    margin-right: 5px;
  }
  .table-title .btn span {
    float: left;
    margin-top: 2px;
  }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
    }
  table.table tr th:first-child {
    width: 60px;
  }
  table.table tr th:last-child {
    width: 100px;
  }
    table.table-striped tbody tr:nth-of-type(odd) {
      background-color: #fcfcfc;
  }
  table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
  }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    } 
    table.table td:last-child i {
    opacity: 0.9;
    font-size: 22px;
        margin: 0 5px;
    }
  table.table td a {
    font-weight: bold;
    color: #566787;
    display: inline-block;
    text-decoration: none;
    outline: none !important;
  }
  table.table td a:hover {
    color: #2196F3;
  }
  table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
  table.table .avatar {
    border-radius: 50%;
    vertical-align: middle;
    margin-right: 10px;
  }
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    } 
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
  .pagination li.disabled i {
        color: #ccc;
    }

    .pagination li i {
        font-size: 16px;
        padding-top: 6px;
    }
</style>

</head>
<div class="navbar navbar-expand-md navbar-dark bg-dark fixed-top"> 
<img src="../img/brand.svg" width="40" height="30" class="d-inline-block align-top" alt="">
    MIDAL
</a>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a href="home.php" class="nav-link"><i class="fas fa-home"></i> Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-list"></i> Permintaan</a>
                    <div class="dropdown-menu">
                        <a href="permintaan/permintaan.php" class="dropdown-item"><i class="fas" title="Daftar Permintaan">&#xf0cb;</i> Daftar Permintaan</a>
                        <a href="bmodal/b_modal.php" class="dropdown-item"><i class="fas fa-coins"></i> Belanja Modal</a>
                    </div>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link" title="<?php echo ($_SESSION['role']); ?>"><i class="fas fa-user-alt"></i> <?php echo ($_SESSION['nm_lengkap']); ?></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" title="Notification"><i class="fas fa-bell"></i></a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?')" class="nav-link" title="Logout"><i class="fas fa-sign-out-alt"></i> Log out</a>
                </li> 
            </ul>
        </div>
</div>
<body>
<div class="container" style="margin-top:75px">
  <div class="row">
    <div class="card col-md-4 w3-indigo">
      <p style="margin-top:20px">
        <h5>Hai, <span class="badge badge-success"><?php echo $_SESSION['role']; ?></span><br>
        <?php echo $_SESSION['nm_lengkap']; ?></h5>
        <h5>Selamat Datang di <b>MIDAL</b></h5>
        <h4>Aplikasi Monitoring <br>Administrasi Pelayanan Internal</h4>
      </p>
    </div>
    <div class="col-lg-8">
      <section class="content">
            <div class="container-fluid">
              <!-- Small boxes (Stat box) -->
              <div class="row">
                <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <?php 
                    $query  = "SELECT * FROM form_perbaikan";
                    $sql    = mysqli_query($conn, $query);
                    $data   = array();
                    while (($row = mysqli_fetch_array($sql)) != null) {
                      $data[] = $row;
                    }
                    $result = count($data);
                  ?>
                  <div class="small-box w3-blue">
                    <div class="inner">
                      <h3><?php echo $result; ?></h3>
                      <p><b>Permintaan</b></p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-chart-bar"></i>
                    </div>
                    <a href="permintaan/permintaan.php" class="small-box-footer">Info Selanjutnya <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <?php 
                    $query  = "SELECT * FROM pegawai";
                    $sql    = mysqli_query($conn, $query);
                    $data   = array();
                    while (($row = mysqli_fetch_array($sql)) != null) {
                      $data[] = $row;
                    }
                    $result = count($data);
                  ?>
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3><?php echo $result; ?></h3>
                      <p><b>Pegawai</b></p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-user-tie"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <?php 
                    $query  = "SELECT * FROM user";
                    $sql    = mysqli_query($conn, $query);
                    $data   = array();
                    while (($row = mysqli_fetch_array($sql)) != null) {
                      $data[] = $row;
                    }
                    $result = count($data);
                  ?>
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3><?php echo $result; ?></h3>
                      <p><b>Pengguna</b></p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
              <div class="row">
              <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <?php 
                    $query  = "SELECT * FROM belanja_modal";
                    $sql    = mysqli_query($conn, $query);
                    $data   = array();
                    while (($row = mysqli_fetch_array($sql)) != null) {
                      $data[] = $row;
                    }
                    $result = count($data);
                  ?>
                  <div class="small-box w3-teal">
                    <div class="inner">
                      <h3><?php echo $result; ?></h3>
                      <p><b>Belanja Modal</b></p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-coins"></i>
                    </div>
                    <a href="bmodal/b_modal.php" class="small-box-footer">Info Selanjutnya <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- /.container-fluid -->
      </section>
    </div>
</div>
<hr>
    <footer>
        <div class="row">
            <div class="col-md-6">
                <p>Copyright &copy; 2019-<?php echo date("Y");?> <b>am.doating</b> All rights reserved.</p>
            </div>
            <!-- <div class="col-md-6 text-md-right">
                <a href="#" class="text-dark">Terms of Use</a> 
                <span class="text-muted mx-2">|</span> 
                <a href="#" class="text-dark">Privacy Policy</a>
            </div> -->
        </div>
    </footer>
</div>
</body>
</html>

