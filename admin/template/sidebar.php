<!-- **********************************************************************************************************************************************************
MAIN SIDEBAR MENU
*********************************************************************************************************************************************************** -->
<!--sidebar start-->
<?php
session_start(); // Pastikan sesi sudah dimulai

$id = $_SESSION['admin']['id_member'];
$hasil_profil = $lihat->member_edit($id);
$roleLogin = $_SESSION['admin']['level'];
?>
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a><img src="assets/img/user/<?php echo $hasil_profil['gambar']; ?>" class="img-circle" width="100" height="100"></a></p>
            <h5 class="centered"><?php echo $hasil_profil['nm_member']; ?></h5>

            <li class="mt">
                <a href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <?php if ($roleLogin == 'Kasir') : ?>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-exchange"></i>
                        <span>Transaksi <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <ul class="sub">
                        <li><a href="index.php?page=jual">Transaksi Penjualan</a></li>
                        <li><a href="index.php?page=beli">Transaksi Pembelian</a></li>
                        <li><a href="index.php?page=belistok">Transaksi Pembelian Stok</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-file-text"></i>
                        <span>Laporan <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <ul class="sub">
                        <li><a href="index.php?page=laporan">Laporan Penjualan</a></li>
                        <li><a href="index.php?page=laporanbeli">Laporan Pembelian</a></li>
                        <li><a href="index.php?page=laporanstok">Laporan Pembelian Stok</a></li>
                    </ul>
                </li>
                
            <?php elseif ($roleLogin == 'Owner') : ?>
                <li class="sub-menu">
                <a href="index.php?page=minimal">
                    <i class="fa fa-cube"></i>
                    <span>minimal stok</span>
                </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-file-text"></i>
                        <span>Laporan <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <ul class="sub">
                        <li><a href="index.php?page=laporan">Laporan Penjualan</a></li>
                        <li><a href="index.php?page=laporanbeli">Laporan Pembelian</a></li>
                        <li><a href="index.php?page=laporanstok">Laporan Pembelian Stok</a></li>
                    </ul>
                </li>
            <?php else : ?>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-database"></i>
                        <span>Master Data<span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <ul class="sub">
                        <li><a href="index.php?page=kategori">Kategori</a></li>
                        <li><a href="index.php?page=pelanggan">Data Pelanggan</a></li>
                        <li><a href="index.php?page=supplier">Data Supplier</a></li>
                        <li><a href="index.php?page=karyawan">Data Karyawan</a></li>
                    </ul>
                </li>
                <li class="mc">
                    <a href="index.php?page=barang">
                        <i class="fa fa-cube"></i>
                        <span>Barang</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
