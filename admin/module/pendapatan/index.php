<!-- Tambahkan di header HTML atau sebelum penutup tag </body> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-9">
                <div class="row" style="margin-left:1pc;margin-right:1pc;">
                    <h3>Dashboard</h3>
                    <hr>
                    
                    <?php
                        // Existing PHP code
                        $sql = " select * from barang where stok <= 3";
                        $row = $config->prepare($sql);
                        $row->execute();
                        $r = $row->rowCount();
                        if ($r > 0) {
                            echo "
                            <div class='alert alert-warning'>
                                <span class='glyphicon glyphicon-info-sign'></span> Ada <span style='color:red'>$r</span> barang yang Stok tersisa sudah kurang dari 3 items. silahkan pesan lagi !!
                                <span class='pull-right'><a href='index.php?page=barang&stok=yes'>Tabel Barang <i class='fa fa-angle-double-right'></i></a></span>
                            </div>
                            ";
                        }
                    ?>
                    
                    <?php $hasil_barang = $lihat->barang_row(); ?>
                    <?php $hasil_kategori = $lihat->kategori_row(); ?>
                    <?php $stok = $lihat->barang_stok_row(); ?>
                    <?php $jual = $lihat->jual_row(); ?>
                    <?php $beli = $lihat->beli_row(); ?>
                    <?php $jumlah_pelanggan = $lihat->pelanggan_row(); ?> <!-- Penambahan baris ini -->
                    
                    <div class="row">
                        <!-- STATUS PANELS -->
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <center>
                                        <h5><i class="fa fa-desktop"></i> Data Barang</h5>
                                    </center>
                                </div>
                                <div class="panel-body">
                                    <center>
                                        <h1><?php echo number_format($hasil_barang); ?></h1>
                                    </center>
                                </div>
                                <div class="panel-footer">
                                    <h4 style="font-size:15px;font-weight:700;"><a href='index.php?page=barang'>Tabel Barang <i class='fa fa-angle-double-right'></i></a></h4>
                                </div>
                            </div><!--/grey-panel -->
                        </div><!-- /col-md-3-->
                        <!-- STATUS PANELS -->
                        <div class="col-md-3">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <center>
                                        <h5><i class="fa fa-desktop"></i> Stok Barang</h5>
                                    </center>
                                </div>
                                <div class="panel-body">
                                    <center>
                                        <h1><?php echo $stok['jml'] ?? 0; ?></h1>
                                    </center>
                                </div>
                                <div class="panel-footer">
                                    <h4 style="font-size:15px;font-weight:700;"><a href='index.php?page=barang'>Tabel Barang <i class='fa fa-angle-double-right'></i></a></h4>
                                </div>
                            </div><!--/grey-panel -->
                        </div><!-- /col-md-3-->
                        <!-- Panel Jumlah Pelanggan -->
                        <div class="col-md-3">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <center>
                                        <h5><i class="fa fa-bookmark"></i> Jumlah Pelanggan</h5>
                                    </center>
                                </div>
                                <div class="panel-body">
                                    <center>
                                        <h1><?php echo number_format($jumlah_pelanggan); ?></h1>
                                    </center>
                                </div>
                                <div class="panel-footer">
                                    <h4 style="font-size:15px;font-weight:700;"><a href='index.php?page=pelanggan'>Tabel Data Pelanggan <i class='fa fa-angle-double-right'></i></a></h4>
                                </div>
                            </div><!--/grey-card -->
                        </div><!-- /col-md-3-->
                        <!-- STATUS PANELS -->
                        <div class="col-md-3">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <center>
                                        <h5><i class="fa fa-bookmark"></i> Kategori Barang</h5>
                                    </center>
                                </div>
                                <div class="panel-body">
                                    <center>
                                        <h1><?php echo number_format($hasil_kategori); ?></h1>
                                    </center>
                                </div>
                                <div class="panel-footer">
                                    <h4 style="font-size:15px;font-weight:700;"><a href='index.php?page=kategori'>Tabel Kategori Barang <i class='fa fa-angle-double-right'></i></a></h4>
                                </div>
                            </div><!--/grey-card -->
                        </div><!-- /col-md-3-->
                        <!-- STATUS PANELS -->
                        <div class="col-md-3">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <center>
                                        <h5><i class="fa fa-desktop"></i> Total Penjualan </h5>
                                    </center>
                                </div>
                                <div class="panel-body">
                                    <center>
                                        <h1><?php echo number_format($jual['stok']); ?></h1>
                                    </center>
                                </div>
                                <div class="panel-footer">
                                    <h4 style="font-size:15px;font-weight:700;font-weight:700;"><a href='index.php?page=laporan'>Tabel laporan Penjualan <i class='fa fa-angle-double-right'></i></a></h4>
                                </div>
                            </div><!--/grey-panel -->
                        </div><!-- /col-md-3-->
                        <!-- Panel Total Pembelian -->
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <center>
                                        <h5><i class="fa fa-cubes"></i> Total Pembelian</h5>
                                    </center>
                                </div>
                                <div class="panel-body">
                                    <center>
                                        <h1><?php echo number_format($beli['stok']); ?></h1>
                                    </center>
                                </div>
                                <div class="panel-footer">
                                    <h4 style="font-size:15px;font-weight:700;font-weight:700;"><a href='index.php?page=beli'>Tabel Laporan Pembelian <i class='fa fa-angle-double-right'></i></a></h4>
                                </div>
                            </div><!--/grey-card -->
                        </div><!-- /col-md-3-->
                        <!-- Panel Total Stok Barang -->
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <center>
                                        <h5><i class="fa fa-cubes"></i> Total Pembelian Stok </h5>
                                    </center>
                                </div>
                                <div class="panel-body">
                                    <center>
                                        <h1><?php echo number_format($stok['jml']); ?></h1>
                                    </center>
                                </div>
                                <div class="panel-footer">
                                    <h4 style="font-size:15px;font-weight:700;font-weight:700;"><a href='index.php?page=belistok'>Tabel Laporan Stok <i class='fa fa-angle-double-right'></i></a></h4>
                                </div>
                            </div><!--/grey-card -->
                        </div><!-- /col-md-3-->
                    </div>
                    
                    <!-- Tambahkan canvas untuk grafik -->
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="dataBarangChart"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="stokBarangChart"></canvas>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="totalPenjualanChart"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="kategoriBarangChart"></canvas>
                        </div>
                    </div>
                    
                    <!-- Tambahkan script untuk menginisialisasi Chart.js -->
                    <script>
                        var ctx1 = document.getElementById('dataBarangChart').getContext('2d');
                        var dataBarangChart = new Chart(ctx1, {
                            type: 'bar', // Pastikan tipe grafik adalah 'bar'
                            data: {
                                labels: ['Data Barang'],
                                datasets: [{
                                    label: 'Jumlah Barang',
                                    data: [<?php echo $hasil_barang; ?>],
                                    backgroundColor: '#dff0d8',
                                    borderColor: '#dff0d8',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                        
                        
                    </script>
                </div>
            </div>
            <div class="col-lg-3 ds">
                <div id="calendar" class="mb">
                    <div class="panel green-panel no-margin">
                        <div class="panel-body">
                            <div id="date-popover" class="popover top" style="cursor: pointer; display: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                <div class="arrow"></div>
                                <h3 class="popover-title" style="display: none;"></h3>
                                <div id="date-popover-content" class="popover-content"></div>
                            </div>
                            <div id="my-calendar"></div>
                        </div>
                    </div>
                </div><!-- / calendar -->
            </div><!-- /col-lg-3 -->
        </div><!-- /row -->
    </section>
</section>