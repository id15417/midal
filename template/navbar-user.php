<div class="navbar navbar-expand-md navbar-dark bg-dark fixed-top"> 
<img src="../img/brand.svg" width="40" height="30" class="d-inline-block align-top" alt="">
    MIDAL
</a>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a href="../home.php" class="nav-link"><i class="fas fa-home"></i> Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-list"></i> Permintaan</a>
                    <div class="dropdown-menu">
                        <a href="permintaan/permintaan.php" class="dropdown-item"><i class="fas" title="Daftar Permintaan">&#xf0cb;</i> Daftar Permintaan</a>
                        <a href="b_modal.php" class="dropdown-item"><i class="fas fa-coins"></i> Belanja Modal</a>
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