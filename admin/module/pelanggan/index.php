<!--sidebar end-->

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <h3>Data Pelanggan</h3>
                <br/>
                <?php if(isset($_GET['success'])){?>
                <div class="alert alert-success">
                    <p>Tambah Data Pelanggan Berhasil !</p>
                </div>
                <?php }?>
                <?php if(isset($_GET['remove'])){?>
                <div class="alert alert-danger">
                    <p>Hapus Data Pelanggan Berhasil !</p>
                </div>
                <?php }?>

                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus"></i> Tambah Data
                </button>
                <a href="index.php?page=pelanggan" style="margin-right :0.5pc;" class="btn btn-success btn-md pull-right">
                    <i class="fa fa-refresh"></i> Refresh Data
                </a>
                <div class="clearfix"></div>
                <br/>

                <!-- view pelanggan -->
                <div class="modal-view">
                    <table class="table table-bordered table-striped" id="example1">
                        <thead>
                            <tr style="background:#DFF0D8;color:#333;">
                                <th>No.</th>
                                <th>ID Pelanggan</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>No Handphone</th>
								<th>Kesukaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                // Mengambil data pelanggan dari database
                                $hasil = $lihat->pelanggan();
                                $no = 1;
                                foreach($hasil as $isi) {
                            ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $isi['id_pelanggan'];?></td>
                                <td><?php echo $isi['nama_pelanggan'];?></td>
                                <td><?php echo $isi['alamat'];?></td>
                                <td><?php echo $isi['no_hp'];?></td>
								<td><?php echo $isi['kesukaan'];?></td>
                                <td>
                                    <!-- Tombol untuk aksi -->
                                    <a href="index.php?page=pelanggan/details&id=<?php echo $isi['id_pelanggan']; ?>">
                                        <button class="btn btn-primary btn-xs">Details</button>
                                    </a>
                                    <a href="index.php?page=pelanggan/edit&id=<?php echo $isi['id_pelanggan']; ?>">
                                        <button class="btn btn-warning btn-xs">Edit</button>
                                    </a>
                                    <a href="fungsi/hapus/hapus.php?pelanggan=hapus&id=<?php echo $isi['id_pelanggan']; ?>"
                                        onclick="return confirm('Anda yakin ingin menghapus data ini?');">
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
                <!-- end view pelanggan -->
                <!-- tambah pelanggan MODALS-->
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content" style="border-radius:0px;">
                            <div class="modal-header" style="background:#285c64;color:#fff;">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Pelanggan</h4>
                            </div>
                            <form action="fungsi/tambah/tambah.php?pelanggan=tambah" method="POST">
                                <div class="modal-body">
                                    <table class="table table-striped bordered">
                                        <?php
                                            $format = $lihat->pelanggan_id(); // Mengambil ID pelanggan terbaru
                                        ?>
                                        <tr>
                                            <td>ID Pelanggan</td>
                                            <td><input type="text" readonly="readonly" required value="<?php echo $format;?>" class="form-control" name="id"></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pelanggan</td>
                                            <td><input type="text" placeholder="Nama Pelanggan" required class="form-control" name="nama"></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td><input type="text" placeholder="Alamat" required class="form-control" name="alamat"></td>
                                        </tr>
                                        <tr>
                                            <td>No Handphone</td>
                                            <td><input type="text" placeholder="No Handphone" required class="form-control" name="no_hp"></td>
                                        </tr>
										<tr>
                                            <td>Kesukaan</td>
                                            <td><input type="text" placeholder="Kesukaan" required class="form-control" name="kesukaan"></td>
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
                <!-- end tambah pelanggan MODALS-->
            </div>
        </div>
    </section>
</section>
<!--main content end-->
