<!-- Tambahkan di header HTML atau sebelum penutup tag </body> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
                <div class="row" style="margin-left:1pc;margin-right:1pc;">
                    <h3>Dashboard</h3>
                    <hr>
                    
                    <?php
                        // Cek stok barang yang kurang dari atau sama dengan 3
                        $sql = "SELECT * FROM barang WHERE stok <= 3";
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
                    
                    <?php 
                        $hasil_barang = $lihat->barang_row(); 
                        $hasil_kategori = $lihat->kategori_row(); 
                        $stok = $lihat->barang_stok_row(); 
                        $jual = $lihat->jual_row(); 
                        $beli = $lihat->beli_row();
                        $belistok = $lihat->belistok_row(); 
                        $jumlah_pelanggan = $lihat->pelanggan_row(); 
                        
                        // Data untuk grafik penjualan by barang
                        $penjualan_sql = "SELECT barang.nama_barang, SUM(nota.jumlah) AS jumlah_terjual 
                                        FROM nota  
                                        JOIN barang ON nota.id_barang = barang.id_barang 
                                        GROUP BY barang.nama_barang";
                        $penjualan_stmt = $config->prepare($penjualan_sql);
                        $penjualan_stmt->execute();
                        $penjualan_data = $penjualan_stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                        $nama_barang = [];
                        $jumlah_terjual = [];
                        
                        foreach ($penjualan_data as $data) {
                            $nama_barang[] = $data['nama_barang'];
                            $jumlah_terjual[] = $data['jumlah_terjual'];
                        }

                        // Data untuk grafik pembelian by barang
                        $pembelian_barang_sql = "SELECT barang.nama_barang, SUM(nota_beli.jumlah) AS jumlah_pembelian
                                                FROM nota_beli
                                                JOIN barang ON nota_beli.id_barang = barang.id_barang
                                                GROUP BY barang.nama_barang";
                        $pembelian_barang_stmt = $config->prepare($pembelian_barang_sql);
                        $pembelian_barang_stmt->execute();
                        $pembelian_barang_data = $pembelian_barang_stmt->fetchAll(PDO::FETCH_ASSOC);

                        $nama_barang_pembelian = [];
                        $jumlah_pembelian_barang = [];

                        foreach ($pembelian_barang_data as $data) {
                            $nama_barang_pembelian[] = $data['nama_barang'];
                            $jumlah_pembelian_barang[] = $data['jumlah_pembelian'];
                        }

                        // Data untuk grafik pembelian stok by barang
                        $pembelian_stok_sql = "SELECT barang.nama_barang, SUM(nota_stok.jumlah) AS jumlah_stok
                                               FROM nota_stok
                                               JOIN barang ON nota_stok.id_barang = barang.id_barang
                                               GROUP BY barang.nama_barang";
                        $pembelian_stok_stmt = $config->prepare($pembelian_stok_sql);
                        $pembelian_stok_stmt->execute();
                        $pembelian_stok_data = $pembelian_stok_stmt->fetchAll(PDO::FETCH_ASSOC);

                        $nama_barang_stok = [];
                        $jumlah_stok_barang = [];

                        foreach ($pembelian_stok_data as $data) {
                            $nama_barang_stok[] = $data['nama_barang'];
                            $jumlah_stok_barang[] = $data['jumlah_stok'];
                        }
                    ?>
                    
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
                                        <h5><i class="fa fa-desktop"></i> Stok Barang (gr) </h5>
                                    </center>
                                </div>
                                <div class="panel-body">
                                    <center>
                                        <h1><?php echo $stok['jml'] ?? 0; ?></h1>
                                    </center>
                                </div>
                                <div class="panel-footer">
                                    <h4 style="font-size:15px;font-weight:700;"><a href='index.php?page=stok'>Tabel Stok <i class='fa fa-angle-double-right'></i></a></h4>
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
                                        <h5><i class="fa fa-desktop"></i> Jumlah Barang Terjual (gr) </h5>
                                    </center>
                                </div>
                                <div class="panel-body">
                                    <center>
                                        <h1><?php echo number_format($jual['stok']); ?></h1>
                                    </center>
                                </div>
                                <div class="panel-footer">
                                    <h4 style="font-size:15px;font-weight:700;"><a href='index.php?page=laporan'>Tabel laporan Penjualan <i class='fa fa-angle-double-right'></i></a></h4>
                                </div>
                            </div><!--/grey-panel -->
                        </div><!-- /col-md-3-->
                        <!-- Panel Total Pembelian -->
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <center>
                                        <h5><i class="fa fa-cubes"></i> Jumlah Barang Dibeli (gr) </h5>
                                    </center>
                                </div>
                                <div class="panel-body">
                                    <center>
                                        <h1><?php echo number_format($beli['stok']); ?></h1>
                                    </center>
                                </div>
                                <div class="panel-footer">
                                    <h4 style="font-size:15px;font-weight:700;"><a href='index.php?page=laporanbeli'>Tabel Laporan Pembelian <i class='fa fa-angle-double-right'></i></a></h4>
                                </div>
                            </div><!--/grey-card -->
                        </div><!-- /col-md-3-->
                        <!-- Panel Total Pembelian Stok -->
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <center>
                                        <h5><i class="fa fa-cubes"></i> Jumlah Pembelian Stok (gr) </h5>
                                    </center>
                                </div>
                                <div class="panel-body">
                                    <center>
                                        <h1><?php echo number_format($belistok['stok']); ?></h1>
                                    </center>
                                </div>
                                <div class="panel-footer">
                                    <h4 style="font-size:15px;font-weight:700;"><a href='index.php?page=laporanstok'>Tabel Laporan Stok <i class='fa fa-angle-double-right'></i></a></h4>
                                </div>
                            </div><!--/grey-card -->
                        </div><!-- /col-md-3-->
                    </div>
                    
                    <!-- Grafik Penjualan dan Pembelian by Barang -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <center>
                                        <h5>Grafik Penjualan by Barang</h5>
                                    </center>
                                </div>
                                <div class="panel-body">
                                    <canvas id="penjualanChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <center>
                                        <h5>Grafik Pembelian by Barang</h5>
                                    </center>
                                </div>
                                <div class="panel-body">
                                    <canvas id="pembelianChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grafik Pembelian Stok by Barang -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <center>
                                        <h5>Grafik Pembelian Stok by Barang</h5>
                                    </center>
                                </div>
                                <div class="panel-body">
                                    <canvas id="pembelianStokChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        // Grafik Penjualan by Barang
                        var ctxPenjualan = document.getElementById('penjualanChart').getContext('2d');
                        new Chart(ctxPenjualan, {
                            type: 'line',
                            data: {
                                labels: <?php echo json_encode($nama_barang); ?>,
                                datasets: [{
                                    label: 'Jumlah Terjual',
                                    data: <?php echo json_encode($jumlah_terjual); ?>,
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna latar belakang
                                    borderColor: 'rgba(75, 192, 192, 1)', // Warna garis
                                    borderWidth: 2
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

                        // Grafik Pembelian by Barang
                        var ctxPembelian = document.getElementById('pembelianChart').getContext('2d');
                        new Chart(ctxPembelian, {
                            type: 'line',
                            data: {
                                labels: <?php echo json_encode($nama_barang_pembelian); ?>,
                                datasets: [{
                                    label: 'Jumlah Pembelian',
                                    data: <?php echo json_encode($jumlah_pembelian_barang); ?>,
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna latar belakang
                                    borderColor: 'rgba(75, 192, 192, 1)', // Warna garis
                                    borderWidth: 2
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

                        // Grafik Pembelian Stok by Barang
                        var ctxPembelianStok = document.getElementById('pembelianStokChart').getContext('2d');
                        new Chart(ctxPembelianStok, {
                            type: 'line',
                            data: {
                                labels: <?php echo json_encode($nama_barang_stok); ?>,
                                datasets: [{
                                    label: 'Jumlah Stok Pembelian',
                                    data: <?php echo json_encode($jumlah_stok_barang); ?>,
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna latar belakang
                                    borderColor: 'rgba(75, 192, 192, 1)', // Warna garis
                                    borderWidth: 2
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
                </div><!-- /row -->
            
        </div><!-- /row -->
    </section><!-- /wrapper -->
</section><!-- /main-content -->
