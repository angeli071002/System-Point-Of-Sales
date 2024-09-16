<!--sidebar end-->

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<?php 
    $id = $_GET['id'];
    $hasil = $lihat->karyawan_edit($id);
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <a href="index.php?page=karyawan"><button class="btn btn-primary"><i class="fa fa-angle-left"></i> Kembali </button></a>
                <h3>Detail Karyawan</h3>
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
                        <td>Nama Karyawan</td>
                        <td><?php echo htmlspecialchars($hasil['nm_member']); ?></td>
                    </tr>
                    <tr>
                        <td>Level</td>
                        <td><?php echo htmlspecialchars($hasil['level']); ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?php echo htmlspecialchars($hasil['alamat_member']); ?></td>
                    </tr>
                    <tr>
                        <td>No Handphone</td>
                        <td><?php echo htmlspecialchars($hasil['telepon']); ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo htmlspecialchars($hasil['email']); ?></td>
                    </tr>
                </table>
                <?php } else { ?>
                <p>Data karyawan tidak ditemukan.</p>
                <?php } ?>
                <div class="clearfix" style="padding-top:16%;"></div>
            </div>
        </div>
    </section>
</section>
