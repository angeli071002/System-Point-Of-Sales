<!--sidebar end-->

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <h3>Data Karyawan</h3>
                <br />
                <?php if (isset($_GET['success'])) { ?>
                    <div class="alert alert-success">
                        <p>Tambah Data Karyawan Berhasil !</p>
                    </div>
                <?php } ?>
                <?php if (isset($_GET['remove'])) { ?>
                    <div class="alert alert-danger">
                        <p>Hapus Data Karyawan Berhasil !</p>
                    </div>
                <?php } ?>

                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus"></i> Tambah Data
                </button>
                <a href="index.php?page=karyawan" style="margin-right :0.5pc;" class="btn btn-success btn-md pull-right">
                    <i class="fa fa-refresh"></i> Refresh Data
                </a>
                <div class="clearfix"></div>
                <br />

                <!-- view karyawan -->
                <div class="modal-view">
                    <table class="table table-bordered table-striped" id="example1">
                        <thead>
                            <tr style="background:#DFF0D8;color:#333;">
                                <th>No.</th>
                                <th>Nama Karyawan</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Gambar</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Mengambil data karyawan dari database
                            $hasil = $lihat->member();
                            $no = 1;
                            foreach ($hasil as $isi) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $isi['nm_member']; ?></td>
                                    <td><?php echo $isi['telepon']; ?></td>
                                    <td><?php echo $isi['alamat_member']; ?></td>
                                    <td><img src="assets/img/user/<?php echo $isi['gambar']; ?>" style="width:50px;"/></td>
                                    <td><?php echo $isi['user']; ?></td>
                                    <td><?php echo $isi['pass']; ?></td>
                                    <td><?php echo $isi['level']; ?></td>
                                    <td>
                                        <!-- Tombol untuk aksi -->
                                        <a href="index.php?page=karyawan/details&id=<?php echo $isi['id_member']; ?>">
                                            <button class="btn btn-primary btn-xs">Details</button>
                                        </a>
                                        <a href="index.php?page=karyawan/edit&id=<?php echo $isi['id_member']; ?>">
                                            <button class="btn btn-warning btn-xs">Edit</button>
                                        </a>
                                        <a href="fungsi/hapus/hapus.php?karyawan=hapus&id=<?php echo $isi['id_member']; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');">
                                            <button class="btn btn-danger btn-xs">Hapus</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="clearfix" style="margin-top:7pc;"></div>
                <!-- end view karyawan -->
                <!-- tambah karyawan MODALS-->
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content" style="border-radius:0px;">
                            <div class="modal-header" style="background:#285c64;color:#fff;">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Karyawan</h4>
                            </div>
                            <form action="fungsi/tambah/tambah.php?karyawan=tambah" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <table class="table table-striped bordered">
                                        <tr>
                                            <td>Nama Karyawan</td>
                                            <td><input type="text" placeholder="Nama Karyawan" required class="form-control" name="nama"></td>
                                        </tr>
                                        <tr>
                                            <td>Telepon</td>
                                            <td><input type="text" placeholder="Telepon" required class="form-control" name="telepon"></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td><input type="text" placeholder="Alamat" required class="form-control" name="alamat"></td>
                                        </tr>
                                        <tr>
                                            <td>Gambar</td>
                                            <td><input type="file" accept="image/*" required class="form-control" name="gambar"></td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td><input type="text" placeholder="Username" required class="form-control" name="username"></td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td><input type="password" placeholder="Password" required class="form-control" name="password"></td>
                                        </tr>
                                        <tr>
                                            <td>Level</td>
                                            <td>
                                                <select name="level" class="form-control" required>
                                                    <option value="#">Pilih Level</option>
                                                    <option value="Owner">Pemilik Toko</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Kasir">Kasir</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- end tambah karyawan MODALS-->
            </div>
        </div>
    </section>
</section>
<!--main content end-->