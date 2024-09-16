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
                <a href="index.php?page=karyawan"><button class="btn btn-primary"><i class="fa fa-angle-left"></i> Kembali</button></a>
                <h3>Edit Karyawan</h3>
                <?php if (isset($_GET['success'])) { ?>
                    <div class="alert alert-success">
                        <p>Edit Data Karyawan Berhasil!</p>
                    </div>
                <?php } ?>
                <?php if (isset($_GET['remove'])) { ?>
                    <div class="alert alert-danger">
                        <p>Hapus Data Karyawan Berhasil!</p>
                    </div>
                <?php } ?>
                <table class="table table-striped">
                    <form action="fungsi/edit/edit.php?karyawan=edit" method="POST" enctype="multipart/form-data">
                        <tr>
                            <td>Nama Karyawan</td>
                            <td><input type="hidden" class="form-control" value="<?php echo $hasil['id_member']; ?>" name="id_member"> <input type="text" class="form-control" value="<?php echo $hasil['nm_member']; ?>" name="nama"></td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td><input type="text" class="form-control" value="<?php echo $hasil['telepon']; ?>" name="telepon"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><input type="text" class="form-control" value="<?php echo $hasil['alamat_member']; ?>" name="alamat"></td>
                        </tr>
                        <tr>
                            <td>Gambar</td>
                            <td>
                                <input type="file" accept="image/*" class="form-control" name="gambar">
                                <img src="assets/img/user/<?php echo $hasil['gambar']; ?>" style="width:50px; margin-top:10px;"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><input type="text" placeholder="Username" class="form-control" name="username" value="<?php echo $hasil['user']; ?>"> <small>Kosongkan apabila tidak ingin diganti</small></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" placeholder="Password" class="form-control" name="password"> <small>Kosongkan apabila tidak ingin diganti</small></td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td>
                                <select name="level" class="form-control" required>
                                    <option value="<?php echo $hasil['level']; ?>"><?php echo $hasil['level']; ?></option>
                                    <option value="">Pilih Level</option>
                                    <option value="Owner">Pemilik Toko</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Kasir">Kasir</option>
                                </select>
                            </td>
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
<!--main content end-->
