<?php 
  include '../template/header.php';
  include '../template/navbar-admin.php';
  include '../../inc/koneksi.php';
  include '../../inc/config.php';
?>

<body>
  <div class="container" style="margin-top:75px">
    <p>
      <h4> Laporan &raquo; Unggah Dokumen</h4>  
    </p>
    <div class="row">
      <div class="card"> 
          <div class="card-header">
            <div class="float-sm-right">
            <a href="tambah_dokumen.php" class="w3-button w3-small w3-green" role="button"><i class="fas fa-plus"></i> Tambah</a>
            </div>
          </div>
          <div class="card-body">
            <table id="datatabel" class="table table-bordered table-striped">
            <thead>
              <tr align="center">
                <th scope="col">#</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">JUDUL</th>
                <th scope="col">FILE</th>
                <th scope="col">BIDANG</th>
                <th scope="col">ACTION</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $no =1;
                $query = "SELECT * FROM upload";
                $sql   = mysqli_query($conn, $query);
                while ($row=mysqli_fetch_array($sql)) {
                // Ubah tanggal menjadi yyyy-mm-dd
					      $tanggal = date('Y-m-d', strtotime($row['tgl'])); 
              ?>
              <tr>
                <td align="center"><?php echo $no++; ?>.</td>
                <td align="center"><?php echo tanggal_indo($tanggal, true) ?></td>
                <td align="center"><?php echo $row['judul_file']; ?></td>           
                <td align="center"><?php echo $row['nama_file']; ?></td>
                <td align="center"><?php echo $row['bidang']; ?></td>
                <td align="center">
                  <a href="#" class="edit"><i class="fas fa-edit" title="Edit"></i></a>
                  <a href="#" onclick="return confirm('Yakin data ini akan dihapus?')" name="delete_per" class="delete"><i class="fas fa-trash" title="Hapus"></i></a> 
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          </div>
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
<script type="text/javascript" src="../DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#datatabel').DataTable();
} );
</script>
</body>
</html>

