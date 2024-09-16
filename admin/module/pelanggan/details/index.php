<!--sidebar end-->

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<?php 
    $id = $_GET['id'];
    $hasil = $lihat->pelanggan_edit($id);
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <a href="index.php?page=pelanggan"><button class="btn btn-primary"><i class="fa fa-angle-left"></i> Kembali </button></a>
                <h3>Detail Pelanggan</h3>
                <?php if(isset($_GET['success'])){ ?>
                <div class="alert alert-success">
                    <p>Tambah Data Berhasil!</p>
                </div>
                <?php } ?>
                <?php if(isset($_GET['remove'])){ ?>
                <div class="alert alert-danger">
                    <p>Hapus Data Berhasil!</p>
                </div>
                <?php } ?>
                <?php if ($hasil) { ?>
                <table class="table table-striped">
                    <tr>
                        <td>ID Pelanggan</td>
                        <td><?php echo htmlspecialchars($hasil['id_pelanggan']); ?></td>
                    </tr>
                    <tr>
                        <td>Nama Pelanggan</td>
                        <td><?php echo htmlspecialchars($hasil['nama_pelanggan']); ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?php echo htmlspecialchars($hasil['alamat']); ?></td>
                    </tr>
                    <tr>
                        <td>No Handphone</td>
                        <td><?php echo htmlspecialchars($hasil['no_hp']); ?></td>
                    </tr>
					<tr>
                        <td>Kesukaan</td>
                        <td><?php echo htmlspecialchars($hasil['kesukaan']); ?></td>
                    </tr>
                </table>
                <?php } else { ?>
                <p>Data Pelanggan tidak ditemukan.</p>
                <?php } ?>
                <div class="clearfix" style="padding-top:16%;"></div>
            </div>
        </div>
    </section>
</section>
