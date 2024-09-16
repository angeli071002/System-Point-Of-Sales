<?php
/*
	 * PROSES TAMPIL  
	 */
class view
{
	protected $db;
	function __construct($db)
	{
		$this->db = $db;
	}

	function member()
	{
		$sql = "select member.*, login.*
						from member inner join login on member.id_member = login.id_member";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function member_edit($id)
	{
		$sql = "select member.*, login.*
						from member inner join login on member.id_member = login.id_member
						where member.id_member= ?";
		$row = $this->db->prepare($sql);
		$row->execute(array($id));
		$hasil = $row->fetch();
		return $hasil;
	}

	function toko()
	{
		$sql = "select*from toko where id_toko='1'";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();
		return $hasil;
	}

	// Fungsi untuk mengambil semua data kategori
	function kategori()
	{
		$sql = "SELECT * FROM kategori";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	// Fungsi untuk mengambil ID kategori terakhir dan membuat ID baru
	function kategori_id()
	{
		$sql = 'SELECT * FROM kategori ORDER BY id DESC';
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();

		$urut = substr($hasil['id_kategori'], 2, 3);
		$tambah = (int) $urut + 1;
		if (strlen($tambah) == 1) {
			$format = 'KT00' . $tambah . '';
		} else if (strlen($tambah) == 2) {
			$format = 'KT0' . $tambah . '';
		} else {
			$ex = explode('KT', $hasil['id_kategori']);
			$no = (int) $ex[1] + 1;
			$format = 'KT' . $no . '';
		}
		return $format;
	}

	// Fungsi untuk mengambil data kategori berdasarkan ID
	function kategori_edit($id)
	{
		$sql = "SELECT * FROM kategori WHERE id_kategori=?";
		$row = $this->db->prepare($sql);
		$row->execute(array($id));
		$hasil = $row->fetch();
		return $hasil;
	}

	// Fungsi untuk mencari data kategori
	function kategori_cari($cari)
	{
		$sql = "SELECT * FROM kategori WHERE id_kategori LIKE '%$cari%' OR nama_kategori LIKE '%$cari%' OR nama_barang LIKE '%$cari%' OR merk LIKE '%$cari%'";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	// Fungsi untuk menghitung jumlah baris dalam tabel kategori
	function kategori_row()
	{
		$sql = "SELECT * FROM kategori";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->rowCount();
		return $hasil;
	}

	function karyawan()
	{
		$sql = "SELECT * FROM member";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function karyawan_id()
	{
		$sql = 'SELECT * FROM member ORDER BY id DESC';
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();

		$urut = substr($hasil['id_member'], 2, 3);
		$tambah = (int) $urut + 1;
		if (strlen($tambah) == 1) {
			$format = 'KR00' . $tambah . '';
		} else if (strlen($tambah) == 2) {
			$format = 'KR0' . $tambah . '';
		} else {
			$ex = explode('KR', $hasil['id_member']);
			$no = (int) $ex[1] + 1;
			$format = 'KR' . $no . '';
		}
		return $format;
	}

	function karyawan_edit($id)
	{
		$sql = "SELECT * FROM member WHERE id_member=?";
		$row = $this->db->prepare($sql);
		$row->execute(array($id));
		$hasil = $row->fetch();
		return $hasil;
	}

	function karyawan_cari($cari)
	{
		$sql = "SELECT * FROM member WHERE id_member LIKE '%$cari%' OR nm_member LIKE '%$cari%' OR level LIKE '%$cari%' OR alamat_member LIKE '%$cari%' OR telepon LIKE '%$cari%'";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function karyawan_row()
	{
		$sql = "SELECT * FROM member";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->rowCount();
		return $hasil;
	}

	function supplier()
	{
		$sql = "SELECT * FROM supplier";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function supplier_id()
	{
		$sql = 'SELECT * FROM supplier ORDER BY id DESC';
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();

		$urut = substr($hasil['id_supplier'], 2, 3);
		$tambah = (int) $urut + 1;
		if (strlen($tambah) == 1) {
			$format = 'SP00' . $tambah . '';
		} else if (strlen($tambah) == 2) {
			$format = 'SP0' . $tambah . '';
		} else {
			$ex = explode('SP', $hasil['id_supplier']);
			$no = (int) $ex[1] + 1;
			$format = 'SP' . $no . '';
		}
		return $format;
	}

	function supplier_edit($id)
	{
		$sql = "SELECT * FROM supplier WHERE id_supplier=?";
		$row = $this->db->prepare($sql);
		$row->execute(array($id));
		$hasil = $row->fetch();
		return $hasil;
	}

	function supplier_cari($cari)
	{
		$sql = "SELECT * FROM supplier WHERE id_supplier LIKE '%$cari%' OR nama_supplier LIKE '%$cari%' OR alamat LIKE '%$cari%' OR no_hp LIKE '%$cari%'";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function supplier_row()
	{
		$sql = "SELECT * FROM supplier";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->rowCount();
		return $hasil;
	}

	function pelanggan()
	{
		$sql = "SELECT * FROM pelanggan";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function pelanggan_id()
	{
		$sql = 'SELECT * FROM pelanggan ORDER BY id DESC';
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();

		$urut = substr($hasil['id_pelanggan'], 2, 3);
		$tambah = (int) $urut + 1;
		if (strlen($tambah) == 1) {
			$format = 'PL00' . $tambah . '';
		} else if (strlen($tambah) == 2) {
			$format = 'PL0' . $tambah . '';
		} else {
			$ex = explode('PL', $hasil['id_pelanggan']);
			$no = (int) $ex[1] + 1;
			$format = 'PL' . $no . '';
		}
		return $format;
	}

	function pelanggan_edit($id)
	{
		$sql = "SELECT * FROM pelanggan WHERE id_pelanggan=?";
		$row = $this->db->prepare($sql);
		$row->execute(array($id));
		$hasil = $row->fetch();
		return $hasil;
	}

	function pelanggan_cari($cari)
	{
		$sql = "SELECT * FROM pelanggan WHERE id_pelanggan LIKE '%$cari%' OR nama_pelanggan LIKE '%$cari%' OR alamat LIKE '%$cari%' OR no_hp LIKE '%$cari%' OR kesukaan LIKE '%$cari%'";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function pelanggan_row()
	{
		$sql = "SELECT * FROM pelanggan";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->rowCount();
		return $hasil;
	}

	function barang(){
		$sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
				from barang inner join kategori on barang.id_kategori = kategori.id_kategori 
				ORDER BY id DESC";
		$row = $this-> db -> prepare($sql);
		$row -> execute();
		$hasil = $row -> fetchAll();
		return $hasil;
	}

	function stok() {
		$sql = "SELECT kategori.nama_kategori, SUM(barang.stok) AS total_stok
FROM barang 
INNER JOIN kategori ON barang.id_kategori = kategori.id_kategori
GROUP BY kategori.nama_kategori";
		$row = $this-> db -> prepare($sql);
		$row -> execute();
		$hasil = $row -> fetchAll();
		return $hasil;
	}
	
	function barang_stok(){
		$sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
				from barang inner join kategori on barang.id_kategori = kategori.id_kategori 
				where stok <= 3 
				ORDER BY id DESC";
		$row = $this-> db -> prepare($sql);
		$row -> execute();
		$hasil = $row -> fetchAll();
		return $hasil;
	}

	function barang_edit($id){
		$sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
				from barang inner join kategori on barang.id_kategori = kategori.id_kategori
				where id_barang=?";
		$row = $this-> db -> prepare($sql);
		$row -> execute(array($id));
		$hasil = $row -> fetch();
		return $hasil;
	}

	function barang_cari($cari){
		$sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
				from barang inner join kategori on barang.id_kategori = kategori.id_kategori
				where id_barang like '%$cari%' or nama_barang like '%$cari%' or merk like '%$cari%'";
		$row = $this-> db -> prepare($sql);
		$row -> execute();
		$hasil = $row -> fetchAll();
		return $hasil;
	}

	function barang_id(){
		$sql = 'SELECT * FROM barang ORDER BY id DESC';
		$row = $this-> db -> prepare($sql);
		$row -> execute();
		$hasil = $row -> fetch();
		
		$urut = substr($hasil['id_barang'], 2, 3);
		$tambah = (int) $urut + 1;
		if(strlen($tambah) == 1){
			 $format = 'BR00'.$tambah.'';
		}else if(strlen($tambah) == 2){
			 $format = 'BR0'.$tambah.'';
		}else{
			$ex = explode('BR',$hasil['id_barang']);
			$no = (int) $ex[1] + 1;
			$format = 'BR'.$no.'';
		}
		return $format;
	}

	function barang_row(){
		$sql = "select*from barang";
		$row = $this-> db -> prepare($sql);
		$row -> execute();
		$hasil = $row -> rowCount();
		return $hasil;
	}

	function barang_stok_row(){
		$sql ="SELECT SUM(stok) as jml FROM barang";
		$row = $this-> db -> prepare($sql);
		$row -> execute();
		$hasil = $row -> fetch();
		return $hasil;
	}

	function barang_beli_row(){
		$sql ="SELECT SUM(harga_beli) as beli FROM barang";
		$row = $this-> db -> prepare($sql);
		$row -> execute();
		$hasil = $row -> fetch();
		return $hasil;
	}

	function jual_row()
	{
		$sql = "SELECT SUM(jumlah) as stok FROM nota";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();
		return $hasil;
	}

	function beli_row()
	{
		$sql = "SELECT SUM(jumlah) as stok FROM nota_beli";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();
		return $hasil;
	}

	function belistok_row()
	{
		$sql = "SELECT SUM(jumlah) as stok FROM nota_stok";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();
		return $hasil;
	}


	function jual()
	{
		$sql = "SELECT nota.* , barang.id_barang, barang.nama_barang,barang.merk, barang.harga_beli, member.id_member,
						member.nm_member from nota 
					   left join barang on barang.id_barang=nota.id_barang 
					   left join member on member.id_member=nota.id_member 
					   where nota.periode = ?
					   ORDER BY id_nota DESC";
		$row = $this->db->prepare($sql);
		$row->execute(array(date('m-Y')));
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function beli()
	{
    $sql = "SELECT nota_beli.*, barang.id_barang, barang.nama_barang, barang.merk, barang.harga_beli, member.id_member, member.nm_member 
            FROM nota_beli
            LEFT JOIN barang ON barang.id_barang = nota_beli.id_barang
            LEFT JOIN member ON member.id_member = nota_beli.id_member
            WHERE nota_beli.periode = ?
            ORDER BY nota_beli.id_nota DESC";

    $row = $this->db->prepare($sql);
    $row->execute(array(date('m-Y')));
    $hasil = $row->fetchAll();
    return $hasil;
	}


	function belistok()
	{
		$sql = "SELECT nota_stok.*, barang.id_barang, barang.nama_barang,barang.merk, barang.harga_beli, member.id_member, member.nm_member
						from nota_stok
					   left join barang on barang.id_barang=nota_stok.id_barang 
					   left join member ON member.id_member=nota_stok.id_member
					   where nota_stok.periode = ?
					   ORDER BY id_nota DESC";
		$row = $this->db->prepare($sql);
		$row->execute(array(date('m-Y')));
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function periode_jual($periode)
	{
		$sql = "SELECT nota.* , barang.id_barang, barang.nama_barang,barang.merk, barang.harga_beli, member.id_member,
						member.nm_member from nota 
					   left join barang on barang.id_barang=nota.id_barang 
					   left join member on member.id_member=nota.id_member WHERE nota.periode LIKE ?
					   ORDER BY id_nota ASC";
		$row = $this->db->prepare($sql);
		$row->execute(array($periode));
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function periode_beli($periode)
{
    $sql = "SELECT nota_beli.*, barang.id_barang, barang.nama_barang, barang.merk, barang.harga_beli, member.id_member, member.nm_member
            FROM nota_beli
            LEFT JOIN barang ON barang.id_barang = nota_beli.id_barang
            LEFT JOIN member ON member.id_member = nota_beli.id_member
            WHERE nota_beli.periode LIKE ?
            ORDER BY id_nota ASC";

    $row = $this->db->prepare($sql);
    $row->execute(array($periode));
    $hasil = $row->fetchAll();
    return $hasil;
}


	function periode_stok($periode)
	{
		$sql = "SELECT nota_stok.*, barang.id_barang, barang.nama_barang,barang.merk, barang.harga_beli, member.id_member, member.nm_member
						from nota_stok
					   left join barang on barang.id_barang=nota_stok.id_barang 
					   left join member ON member.id_member=nota_stok.id_member WHERE nota_stok.periode LIKE ? 
					   ORDER BY id_nota ASC";
		$row = $this->db->prepare($sql);
		$row->execute(array($periode));
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function hari_jual($hari)
	{
		$ex = explode('-', $hari);
		$monthNum  = $ex[1];
		$monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
		if ($ex[2] > 9) {
			$tgl = $ex[2];
		} else {
			$tgl1 = explode('0', $ex[2]);
			$tgl = $tgl1[1];
		}
		$cek = $tgl . ' ' . $monthName . ' ' . $ex[0];
		$param = "%{$cek}%";
		$sql = "SELECT nota.* , barang.id_barang, barang.nama_barang,barang.merk,  barang.harga_beli, member.id_member,
						member.nm_member from nota 
					   left join barang on barang.id_barang=nota.id_barang 
					   left join member on member.id_member=nota.id_member WHERE nota.tanggal_input LIKE ? 
					   ORDER BY id_nota ASC";
		$row = $this->db->prepare($sql);
		$row->execute(array($param));
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function hari_beli($hari)
	{
		$ex = explode('-', $hari);
		$monthNum  = $ex[1];
		$monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
		if ($ex[2] > 9) {
			$tgl = $ex[2];
		} else {
			$tgl1 = explode('0', $ex[2]);
			$tgl = $tgl1[1];
		}
		$cek = $tgl . ' ' . $monthName . ' ' . $ex[0];
		$param = "%{$cek}%";
		$sql = "SELECT nota_beli.* , barang.id_barang, barang.nama_barang,barang.merk,  barang.harga_beli, member.id_member,
						member.nm_member from nota_beli 
					   left join barang on barang.id_barang=nota_beli.id_barang 
					   left join member on member.id_member=nota_beli.id_member WHERE nota_beli.tanggal_input LIKE ? 
					   ORDER BY id_nota ASC";
		$row = $this->db->prepare($sql);
		$row->execute(array($param));
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function hari_stok($hari)
	{
		$ex = explode('-', $hari);
		$monthNum  = $ex[1];
		$monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
		if ($ex[2] > 9) {
			$tgl = $ex[2];
		} else {
			$tgl1 = explode('0', $ex[2]);
			$tgl = $tgl1[1];
		}
		$cek = $tgl . ' ' . $monthName . ' ' . $ex[0];
		$param = "%{$cek}%";
		$sql = "SELECT nota_stok.* , barang.id_barang, barang.nama_barang,barang.merk,  barang.harga_beli, member.id_member,
						member.nm_member from nota_stok 
					   left join barang on barang.id_barang=nota_stok.id_barang 
					   left join member on member.id_member=nota_stok.id_member WHERE nota_stok.tanggal_input LIKE ? 
					   ORDER BY id_nota ASC";
		$row = $this->db->prepare($sql);
		$row->execute(array($param));
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function penjualan()
	{
		$sql = "SELECT penjualan.* , barang.id_barang, barang.nama_barang, barang.merk, barang.satuan_barang, member.id_member,
						member.nm_member from penjualan 
					   left join barang on barang.id_barang=penjualan.id_barang 
					   left join member on member.id_member=penjualan.id_member
					   ORDER BY id_penjualan";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function pembelian()
	{
		$sql = "SELECT p.*, b.nama_barang, b.merk, b.satuan_barang, m.id_member as id_member, m.nm_member
        FROM pembelian p
        LEFT JOIN barang b ON b.id_barang = p.id_barang
        LEFT JOIN member m ON m.id_member = p.id_member
        ORDER BY p.id_pembelian";

		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function pembelianstok()
	{
		$sql = "SELECT s.*, b.nama_barang, b.merk, b.satuan_barang, m.id_member as id_member, m.nm_member
        FROM pembelianstok s
        LEFT JOIN barang b ON b.id_barang = s.id_barang
        LEFT JOIN member m ON m.id_member = s.id_member
        ORDER BY s.id_pembelianstok";

		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	function jumlah()
	{
		$sql = "SELECT SUM(total) as bayar FROM penjualan";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();
		return $hasil;
	}

	function jumlahbeli()
	{
		$sql = "SELECT SUM(total) as bayar FROM pembelian";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();
		return $hasil;
	}

	function jumlahstok()
	{
		$sql = "SELECT SUM(total) as bayar FROM pembelianstok";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();
		return $hasil;
	}

	function jumlah_nota()
	{
		$sql = "SELECT SUM(total) as bayar FROM nota";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();
		return $hasil;
	}

	function jumlah_nota_beli()
	{
		$sql = "SELECT SUM(total) as bayar FROM nota_beli";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();
		return $hasil;
	}

	function jumlah_nota_stok()
	{
		$sql = "SELECT SUM(total) as bayar FROM nota_stok";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();
		return $hasil;
	}


	function jml()
	{
		$sql = "SELECT SUM(harga_beli*stok) as byr FROM barang";
		$row = $this->db->prepare($sql);
		$row->execute();
		$hasil = $row->fetch();
		return $hasil;
	}

}
