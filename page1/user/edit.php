<?php 
    include '../template/header.php';
    include '../template/navbar-admin.php';
    include '../../inc/koneksi.php';
?>

<body>

<div class="container" style="margin-top:80px">
    <div class="container">
        <div class="container mt-3">
            <h4>Manajemen User &raquo; Edit User</h4>
            <?php 
              include 'proses.php';
              $id     = $_GET['edit'];
              $query  = "SELECT * FROM user WHERE id_user='$id'";
              $sql    = mysqli_query($conn, $query);
              $data   = mysqli_fetch_array($sql);
            ?>
            <div class="card">
              <div class="card-body">
                <form action="" method="POST">
                  <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
                    <div class="row form-inline">
                      <div class="col-md-2" align="right"><b>Nama</b></div>
                      <input type="text" class="form-control" value="<?php echo $data['nm_lengkap']; ?>" placeholder="Nama lengkap" name="nm_lengkap" style="width:27%" required> 
                    </div>
                    <br>
                    <div class="row form-inline">
                      <div class="col-md-2" align="right"><b>Username</b></div>
                      <input type="text" class="form-control" value="<?php echo $data['username']; ?>" placeholder="Enter username" name="username" style="width:27%" required>
                    </div>
                    <br>
                    <div class="row form-inline">
                      <div class="col-md-2" align="right"><b>Password</b></div>
                      <input type="text" class="form-control" placeholder="Enter password" value="<?php echo $data['password']; ?>" name="password" style="width:27%" required>
                    </div>
                    <br>
                    <div class="row form-inline">  
                      <div class="col-md-2" align="right"><b>Role</b></div> 
                      <select name="level" class="form-control" style="width:27%" required>
                        <option value="">Pilih</option>
                        <?php 
                         if ($data['level']=="admin") 
                            echo "<option value='admin' selected>Administrator</option>";
                         else echo "<option value='admin'>Administrator</option>";
                         if ($data['level']=="user") 
                            echo "<option value='user' selected>User</option>";
                         else echo "<option value='user'>User</option>";
                        ?>
                      </select>   
                    </div>
                    <br>
                    <p style="margin-left: 171px">
                      <a href="javascript:history.go(-1)" class="w3-button w3-small w3-red" role="button"><i class="fas fa-angle-left"></i> Kembali</a>
                      <button type="submit" name="edit" class="w3-button w3-small w3-blue"><i class="fas fa-save"></i> Simpan</button>
                    </p> 
                </form>
              </div>
            </div>       
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