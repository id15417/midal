<?php 
  include '../template/header.php';
  include '../template/navbar-admin.php';
  include '../../inc/koneksi.php';
  include '../../inc/config.php';
?>

<body>
  <div class="container" style="margin-top:45px">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <h3 class="text-center text-dark">Data Permintaan Alat Lab</h3>
          <hr> 
          <?php if (isset($_SESSION['message'])):?>
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
              ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="row">
        <div class="card"> 
            <div class="card-header">
              <div class="float-sm-right">
              <a href="add.php" class="w3-button w3-small w3-green" role="button"><i class="fas fa-plus"></i> Tambah</a>
              </div>
            </div>
            <div class="card-body">
              <table id="datatabel" class="table table-hover table-striped">
              <thead>
                <tr align="center">
                  <th scope="col">#</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">PERMINTAAN BELANJA</th>
                    <th scope="col">LOKASI</th>
                    <th scope="col">AKUN</th>
                    <th scope="col">TANGGAL PERMINTAAN</th>
                    <th scope="col">STATUS</th>
                    <th scope="col-sm-4"><i class="fas fa-gear"></i></th>
                </tr>
              </thead>
              <tbody>
              <?php
              $no=1;
              $query = "SELECT * FROM belanja_modal
                        INNER JOIN pegawai 	  ON belanja_modal.id_pegawai 	 = pegawai.id_pegawai
                        INNER JOIN sub_bidang ON belanja_modal.id_sub_bidang = sub_bidang.id_sub_bidang
                        INNER JOIN kat_perbaikan ON belanja_modal.id_kat_perbaikan = kat_perbaikan.id_kat_perbaikan
                        WHERE belanja_modal.id_bmodal = belanja_modal.id_bmodal 
                        ORDER BY id_bmodal DESC";
              $sql = mysqli_query($conn, $query) or die (mysqli_error($conn));
              while ($row = mysqli_fetch_array($sql)) { 
              // Ubah tanggal menjadi yyyy-mm-dd
              $tanggal = date('Y-m-d', strtotime($row['tgl']));
              ?>
                <tr>
                  <td align="center"><?php echo $no++; ?></td>
                    <td><?php echo $row['nm_pegawai']; ?></td>
                    <td><?php echo $row['bmodal']; ?></td>           
                    <td><?php echo $row['sub_bidang']; ?></td>
                    <td><?php echo $row['kat_perbaikan']; ?></td>
                    <td align="center"><?php echo tanggal_indo($tanggal, true); ?></td>
                    <td align="center">
                      <h6>
                        <?php if ($row['status_post']=='1') {?>
                          <span class="badge badge-success"> SELESAI</span>
                        <?php } elseif ($row['status_post']=='2') { ?>
                          <span class="badge badge-primary"> PROSES</span>
                        <?php } else { ?>
                          <span class="badge badge-danger"> PENDING</span>
                        <?php } ?>
                      </h6>
                    </td>
                  <td align="center">
                    <a href="detail_bmodal.php?detail=<?php echo $row['id_bmodal']; ?>" class="detail"><i class="fas fa-list" title="Detail"></i></a>
                    <a href="edit.php?edit=<?php echo $row['id_bmodal']; ?>" class="edit"><i class="fas fa-edit" title="Edit"></i></a>
                    <a href="proses.php?id=<?php echo $row['id_bmodal']; ?>" onclick="return confirm('Yakin data ini akan dihapus?')" name="delete_bmodal" class="delete"><i class="fas fa-trash" title="Hapus"></i></a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
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
<script type="text/javascript" src="../../DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#datatabel').DataTable();
} );
</script>
</body>
</html>

