<?php 
    include '../template/header.php';
    include '../template/navbar-admin.php';
?>

<body>

<div class="container" style="margin-top:80px">
  <div class="container-fluid">
  <?php 
    $mysqli = new mysqli('localhost', 'root', '', 'dbpermintaan') or die(mysql_error($mysqli));
    $result = $mysqli->query("SELECT * FROM form_perbaikan ORDER BY id_permintaan DESC") or die($mysqli_error());
        $no=1;
  ?>
  <div class="container mt-3">
  <h4>Data Laporan &raquo; Print </h4>
  <hr />
  <p>
  <div class="btn-group" role="group" aria-label="Basic example">

    <!-- <a href="#exampleModal" class="btn btn-info btn-sm" role="button" class="treeview-item" data-toggle="modal"><i class="icon fa fa-print"></i> PRINT FILTER</a> -->

  </div>
  </p>  
    <div class="row justify-content-center">
      <table id="datatabel" class="table-sm table-bordered table-striped">
        <thead>
          <tr align="center">
            <th scope="col">#</th>            
              <th scope="col">NAMA</th>
              <th scope="col">PERIHAL PERMINTAAN</th>
              <th scope="col">KATEGORI</th> 
              <th scope="col">LOKASI</th>
              <th scope="col">PENGELOLAAN</th>
              <th scope="col">STATUS</th>
              <th scope="col">STATUS KETERANGAN</th>
              <th scope="col">TANGGAL PERMINTAAN</th>
              <th scope="col">ACTION</th>
          </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td align="center"><?php echo $no++; ?></td>
            <td><?php echo $row['nm_pegawai']; ?></td>
            <td><?php echo $row['permintaan']; ?></td>              
            <td><?php echo $row['perbaikan']; ?></td>
            <td><?php echo $row['lokasi']; ?></td>
            <td align="center"><?php echo $row['pengelola']; ?></td>                
            <td align="center"><?php echo $row['status']; ?></td>
            <td><?php echo $row['ket_status']; ?></td>
            <td align="center"><?php echo $row['tgl']; ?></td>
            <td align="center">
              <a href="detail.php?page=<?php echo $row['id_permintaan']; ?>" class="detail"><i class="fas fa-list" title="Detail"></i></a>
            </td>
          </tr>
        <?php endwhile; ?>
        </tbody>
      </table>
    </div>
    <script src="../assets/js/dataTables.bootstrap4.min.js"></script> 
      <script type="text/javascript" src="../DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {
          $('#datatabel').DataTable();
      } );
      </script>
    </div>
      <hr>

      <footer>
          <div class="row">
              <div class="col-md-6">
                  <p>Copyright &copy; 2019-<?php echo date("Y");?> am.doating</p>
              </div>
             <!--  <div class="col-md-6 text-md-right">
                  <a href="#" class="text-dark">Terms of Use</a> 
                  <span class="text-muted mx-2">|</span> 
                  <a href="#" class="text-dark">Privacy Policy</a>
              </div> -->
          </div> 
      </footer>
  </div>
</div>
</body>
</html>