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
                <a href="index.php?page=pelanggan"><button class="btn btn-primary"><i class="fa fa-angle-left"></i> Kembali</button></a>
                <h3>Detail Pelanggan</h3>
                <?php if(isset($_GET['success'])){ ?>
                <div class="alert alert-success">
                    <p>Edit Data Pelanggan Berhasil!</p>
                </div>
                <?php } ?>
                <?php if(isset($_GET['remove'])){ ?>
                <div class="alert alert-danger">
                    <p>Hapus Data Pelanggan Berhasil!</p>
                </div>
                <?php } ?>
                <table class="table table-striped">
                    <form action="fungsi/edit/edit.php?pelanggan=edit" method="POST">
                        <tr>
                            <td>ID Pelanggan</td>
                            <td><input type="text" readonly="readonly" class="form-control" value="<?php echo $hasil['id_pelanggan'];?>" name="id"></td>
                        </tr>
                        <tr>
                            <td>Nama Pelanggan</td>
                            <td><input type="text" class="form-control" value="<?php echo $hasil['nama_pelanggan'];?>" name="nama"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><input type="text" class="form-control" value="<?php echo $hasil['alamat'];?>" name="alamat"></td>
                        </tr>
                        <tr>
                            <td>No Handphone</td>
                            <td><input type="text" class="form-control" value="<?php echo $hasil['no_hp'];?>" name="no_hp"></td>
                        </tr>
						<tr>
                            <td>Kesukaan</td>
                            <td><input type="text" class="form-control" value="<?php echo $hasil['kesukaan'];?>" name="kesukaan"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Perbarui Data</button></td>
                        </tr>
                    </form>
                </table>
                <div class="clearfix" style="padding-top:16%;"></div>
            </div>
        </div>
    </section>
</section>
