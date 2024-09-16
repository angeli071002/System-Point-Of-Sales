<!--sidebar end-->

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 <!--main content start-->
 <section id="main-content">
 	<section class="wrapper">

 		<div class="row">
 			<div class="col-lg-12 main-chart">
 				<h3>Data Stok per Kategori</h3>
 				<br />

 				<?php
					$sql = "SELECT k.id_kategori, k.nama_kategori, SUM(b.stok) as total_stok
							FROM barang b
							JOIN kategori k ON b.id_kategori = k.id_kategori
							GROUP BY k.id_kategori, k.nama_kategori";
					$hasil = $config->prepare($sql);
					$hasil->execute();
					$stokPerKategori = $hasil->fetchAll();
					?>

 				<!-- Trigger the modal with a button -->
 				<a href="index.php?page=stok&stok=yes" style="margin-right :0.5pc;" class="btn btn-warning btn-md pull-right">
 					<i class="fa fa-list"></i> Sortir Stok Kurang</a>
 				<a href="index.php?page=stok" style="margin-right :0.5pc;" class="btn btn-success btn-md pull-right">
 					<i class="fa fa-refresh"></i> Refresh Data</a>
 				<div class="clearfix"></div>
 				<br />

 				<!-- view stok per kategori -->
 				<div class="modal-view">
 					<table class="table table-bordered table-striped" id="example1">
 						<thead>
 							<tr style="background:#DFF0D8;color:#333;">
 								<th>No.</th>
 								<th>Kategori</th>
 								<th>Total Stok</th>
 							</tr>
 						</thead>
 						<tbody>
 							<?php
								$no = 1;
								foreach ($stokPerKategori as $kategori) {
								?>
 								<tr>
 									<td><?php echo $no; ?></td>
 									<td><?php echo $kategori['nama_kategori']; ?></td>
 									<td><?php echo $kategori['total_stok']; ?></td>
 								</tr>
 							<?php
									$no++;
								}
								?>
 						</tbody>
 					</table>
 				</div>
 				<div class="clearfix" style="margin-top:7pc;"></div>
 				
 			</div>
 		</div>
 	</section>
 </section>
