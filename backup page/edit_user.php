<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap 4 Fixed Layout Example</title>


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Memanggil jQuery.js -->
<script src="assets/js/jquery-3.2.1.min.js"></script>

<!-- Memanggil Autocomplete.js -->
<script src="assets/js/jquery.autocomplete.min.js"></script>

<style type="text/css">
    body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
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
        padding-top: 6px
    
});
</script>

<style>
    .bs-example{
        margin: 20px;
    }
</style>

</head>


<div class="navbar navbar-expand-md navbar-dark bg-dark">
    <nav class="container">
        <a href="home.php" class="navbar-brand">MIDAL</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a href="home.php" class="nav-link">Home</a>
                </li>
    
                <li class="nav-item">
                    <a href="permintaan.php" class="nav-link">Permintaan</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Tindak Lanjut</a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Permintaan</a>
                        <a href="#" class="dropdown-item">Realisasi</a>
                        <a href="#" class="dropdown-item">Anggaran</a>
                        <div class="dropdown-divider"></div>
                        <a href="#"class="dropdown-item">Trash</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Setting</a>
                    <div class="dropdown-menu">
                        <a href="bidang.php" class="dropdown-item">Bidang</a>
                        <a href="user.php" class="dropdown-item">Akun</a>
                        <a href="pegawai.php" class="dropdown-item">Pegawai</a>
                        <a href="#" class="dropdown-item">Koordinator</a>
                        <div class="dropdown-divider"></div>
                        <a href="#"class="dropdown-item">Trash</a>
                    </div>
                </li>
            </ul>

            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Menu</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">Reports</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a href="logout.php"class="dropdown-item">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div class="container mt-1">
    <?php 
    if (isset($_SESSION['message'])): ?>
        <div align="center" class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php 
                echo $_SESSION['message'];
                unset($_SESSION['msg_type']);
            ?>
        </div>
    <?php endif ?>
</div>


<body>

<div class="container">
    <div class="container">
        <div class="container mt-3">
            <h2>Edit <b>Akun</b></h2>
              <br>
                <form action="control.php" method="POST">
                <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                  <div class="row">
                    <div class="col">
                      <!-- <input type="text" class="form-control" placeholder="Nama lengkap" name="nm_lengkap" required> -->
                    <?php 
                        $mysqli = new mysqli('localhost', 'root', '', 'dbpermintaan') or die(mysql_error($mysqli));
                        $result = $mysqli->query("SELECT * FROM pegawai ORDER BY id_pegawai ASC") or die($mysqli->error);
                    ?>
                      <select name="nm_lengkap" class="form-control" required>                     
                            <option value="">Nama</option>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <option value="<?php echo $row['nm_pegawai']; ?>"><?php echo $row['nm_pegawai']; ?> </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col">
                      <input type="text" class="form-control" placeholder="Username" name="username" required>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col">
                      <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>
                    <div class="col">   
                        <select name="level" class="form-control" required>                    
                                <option value="">...</option>
                                <option value="admin">Admin </option>
                                <option value="user">User </option>
                        </select>   
                    </div>
                  </div>
                  <br>
                  <p align="right">
                  <button type="submit" name="add_user" class="btn btn-primary">Tambah</button>
                  <a href="user.php"><button type="button" class="btn btn-danger">Kembali</button></a> 
                  </p> 
                </form>
                
                
        </div>
    </div>
        
    <hr>
    <footer>
        <div class="row">
            <div class="col-md-6">
                <p>Copyright &copy; 2019-<?php echo date("Y");?> am.doating</p>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="#" class="text-dark">Terms of Use</a> 
                <span class="text-muted mx-2">|</span> 
                <a href="#" class="text-dark">Privacy Policy</a>
            </div>
        </div>
    </footer>
</div>

</body>
</html>