<?php 
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=data-laporan-pembelian-stok-".date('Y-m-d').".xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); 

require 'config.php';
include $view;
$lihat = new view($config);

$bulan_tes =array(
    '01'=>"Januari",
    '02'=>"Februari",
    '03'=>"Maret",
    '04'=>"April",
    '05'=>"Mei",
    '06'=>"Juni",
    '07'=>"Juli",
    '08'=>"Agustus",
    '09'=>"September",
    '10'=>"Oktober",
    '11'=>"November",
    '12'=>"Desember"
);

$jumlah = 0;
$bayar = 0;
$modal = 0;

if(!empty($_GET['cari'])) {
    $periode = $_GET['bln'].'-'.$_GET['thn'];
    $hasil = $lihat->periode_stok($periode);
} elseif(!empty($_GET['hari'])) {
    $hari = $_GET['tgl'];
    $hasil = $lihat->hari_stok($hari);
} else {
    $hasil = $lihat->belistok();
}

foreach($hasil as $isi) { 
    $bayar += $isi['total'];
    $modal += $isi['harga_beli'] * $isi['jumlah'];
    $jumlah += $isi['jumlah'];
}

$keuntungan = $bayar - $modal; // Inisialisasi variabel keuntungan
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="modal-view">
        <h3 style="text-align:center;"> 
            <?php if(!empty($_GET['cari'])) { ?>
                Data Laporan Pembelian Stok <?= $bulan_tes[$_GET['bln']];?> <?= $_GET['thn'];?>
            <?php } elseif(!empty($_GET['hari'])) { ?>
                Data Laporan Pembelian Stok <?= $_GET['tgl'];?>
            <?php } else { ?>
                Data Laporan Pembelian Stok <?= $bulan_tes[date('m')];?> <?= date('Y');?>
            <?php } ?>
        </h3>
        <table border="1" width="100%" cellpadding="3" cellspacing="4">
            <thead>
                <tr bgcolor="yellow">
                    <th>No</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th style="width:10%;">Jumlah</th>
                    <th style="width:10%;">Modal</th>
                    <th style="width:10%;">Total</th>
                    <th>Kasir</th>
                    <th>Tanggal Input</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1; 
                foreach($hasil as $isi) { 
                ?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $isi['id_barang'];?></td>
                    <td><?php echo $isi['nama_barang'];?></td>
                    <td><?php echo $isi['jumlah'];?> </td>
                    <td>Rp.<?php echo number_format($isi['harga_beli'] * $isi['jumlah']);?>,-</td>
                    <td>Rp.<?php echo number_format($isi['total']);?>,-</td>
                    <td><?php echo $isi['nm_member'];?></td>
                    <td><?php echo $isi['tanggal_input'];?></td>
                </tr>
                <?php $no++; }?>
                <tr>
                <th colspan="3">Total Pembelian</td>
                    <th><?php echo $jumlah; ?></td>
                    <th>Rp.<?php echo number_format($modal); ?>,-</th>
                    <th style="background:#0bb365;color:#fff;">
                        Rp.<?php echo number_format($modal); ?>,-</th>
                        <th style="background:#0bb365;color:#fff;">Pengeluaran</th>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
