<div class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
<img src="../../img/brand.svg" width="38" height="30" class="d-inline-block align-top" alt="">
    MIDAL
</a>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a href="../home.php" title="Beranda" class="nav-link"><i class="fas fa-home"></i> Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" title="Permintaan" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-list"></i> Permintaan</a>
                    <div class="dropdown-menu">
                        <a href="../permintaan/permintaan.php" class="dropdown-item"><i class="fas" title="Daftar Permintaan">&#xf0cb;</i> Data Permintaan</a>
                        <a href="../bmodal/b_modal.php" class="dropdown-item"><i class="fas fa-coins"></i> Belanja Modal</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" title="Laporan" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-file"></i> Laporan</a>
                    <div class="dropdown-menu">
                        <a href="../rincianlaporan.php" class="dropdown-item"><i class="fas">&#xf56d;</i> Permintaan</a>
                         <a href="../dokumen/dokumen.php" class="dropdown-item"><i class="fas fa-upload"></i> Upload Dokumen</a>
                        <!-- <a href="#" class="dropdown-item">Link</a> -->
                    </div>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pengaturan</a>
                    <div class="dropdown-menu">
                        <a href="bidang.php" class="dropdown-item">Bidang</a>
                        <a href="user.php" class="dropdown-item">User</a>
                        <a href="pegawai.php" class="dropdown-item">Koordinator</a>
                        <a href="jenis.php" class="dropdown-item">Jenis Perbaikan</a>
                        <div class="dropdown-divider"></div>
                        <a href="#"class="dropdown-item">Trash</a>
                    </div>
                </li> -->
            </ul>
            <ul class="nav navbar-nav ml-auto">
                
                <li class="nav-item">
                    <a href="#" class="nav-link" title="<?php echo ($_SESSION['role']); ?>"><i class="fas fa-user-alt"></i> <?php echo ($_SESSION['nm_lengkap']); ?></a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" title="Pengaturan" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-gear"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="../bidang/bidang.php" class="dropdown-item"><i class="far fa-circle"></i> Bidang</a>
                        <a href="../user/user.php" class="dropdown-item"><i class="far fa-circle"></i> User</a>
                        <a href="../pegawai/pegawai.php" class="dropdown-item"><i class="far fa-circle"></i> Pegawai</a>
                        <a href="../output/akun.php" class="dropdown-item"><i class="far fa-circle"></i> MAK</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" title="Notification"><i class="fas fa-bell"></i></a>
                </li>
                <li class="nav-item">
                    <a href="../logout.php" title="Keluar" onclick="return confirm('Apakah anda yakin ingin keluar?')" class="nav-link" title="Logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li> 
            </ul>
        </div>
    
</div>
