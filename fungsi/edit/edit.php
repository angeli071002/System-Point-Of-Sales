<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (!empty($_SESSION['admin'])) {
	require '../../config.php';
	if (!empty($_GET['pengaturan'])) {
		$nama = htmlentities($_POST['namatoko']);
		$alamat = htmlentities($_POST['alamat']);
		$kontak = htmlentities($_POST['kontak']);
		$pemilik = htmlentities($_POST['pemilik']);
		$id = '1';

		$data[] = $nama;
		$data[] = $alamat;
		$data[] = $kontak;
		$data[] = $pemilik;
		$data[] = $id;
		$sql = 'UPDATE toko SET nama_toko=?, alamat_toko=?, tlp=?, nama_pemilik=? WHERE id_toko = ?';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index.php?page=pengaturan&success=edit-data"</script>';
	}

	if(!empty($_GET['kategori'])){
		$nama= htmlentities($_POST['kategori']);
		$id= htmlentities($_POST['id']);
		$data[] = $nama;
		$data[] = $id;
		$sql = 'UPDATE kategori SET  nama_kategori=? WHERE id_kategori=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=kategori&uid='.$id.'&success-edit=edit-data"</script>';
	}


	if (!empty($_GET['karyawan'])) {
		$nama = $_POST['nama'];
		$level = $_POST['level'];
		$alamat = $_POST['alamat'];
		$no_hp = $_POST['telepon'];  // Menggunakan 'telepon' sesuai dengan nama field di form
		$email = $_POST['email'];
		$member_id = $_POST['id_member'];
	
		// Handle file upload
		if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
			$file_name = $_FILES['gambar']['name'];
			$file_tmp = $_FILES['gambar']['tmp_name'];
			$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
			$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
	
			if (in_array($file_ext, $allowed_ext)) {
				$new_file_name = uniqid() . '.' . $file_ext;
				move_uploaded_file($file_tmp, '../../assets/img/user/' . $new_file_name);
	
				// Delete old image if necessary
				$old_image_query = $config->prepare("SELECT gambar FROM member WHERE id_member = ?");
				$old_image_query->execute([$member_id]);
				$old_image_result = $old_image_query->fetch();
				if ($old_image_result['gambar'] != '' && file_exists('../../assets/img/user/' . $old_image_result['gambar'])) {
					unlink('../../assets/img/user/' . $old_image_result['gambar']);
				}
	
				// Update with new image
				$sqlMember = 'UPDATE member SET nm_member = ?, alamat_member = ?, telepon = ?, email = ?, level = ?, gambar = ? WHERE id_member = ?';
				$stmtMember = $config->prepare($sqlMember);
				$stmtMember->execute([$nama, $alamat, $no_hp, $email, $level, $new_file_name, $member_id]);
			} else {
				echo "Invalid file type.";
				exit;
			}
		} else {
			// Update without changing image
			$sqlMember = 'UPDATE member SET nm_member = ?, alamat_member = ?, telepon = ?, email = ?, level = ? WHERE id_member = ?';
			$stmtMember = $config->prepare($sqlMember);
			$stmtMember->execute([$nama, $alamat, $no_hp, $email, $level, $member_id]);
		}
	
		// Jika username dan password diinput, update data login
		if (!empty($_POST['username']) && !empty($_POST['password'])) {
			$username = $_POST['username'];
			$password = md5($_POST['password']);
	
			$sqlLogin = 'UPDATE login SET user = ?, pass = ? WHERE id_member = ?';
			$stmtLogin = $config->prepare($sqlLogin);
			$stmtLogin->execute([$username, $password, $member_id]);
		}
	
		echo '<script>window.location="../../index.php?page=karyawan/edit&id=' . $member_id . '&success=edit-data"</script>';
	}
	

	if (!empty($_GET['supplier'])) {
		$id = htmlentities($_POST['id']);
		$nama = htmlentities($_POST['nama']);
		$alamat = htmlentities($_POST['alamat']);
		$no_hp = htmlentities($_POST['no_hp']);

		$data = [
			$nama,
			$alamat,
			$no_hp,
			$id
		];

		$sql = 'UPDATE supplier SET nama_supplier=?, alamat=?, no_hp=? WHERE id_supplier=?';
		$row = $config->prepare($sql);
		$row->execute($data);

		echo '<script>window.location="../../index.php?page=supplier/edit&id=' . $id . '&success=edit-data"</script>';
	}

	if (!empty($_GET['pelanggan'])) {
		$id = htmlentities($_POST['id']);
		$nama = htmlentities($_POST['nama']);
		$alamat = htmlentities($_POST['alamat']);
		$no_hp = htmlentities($_POST['no_hp']);
		$kesukaan = htmlentities($_POST['kesukaan']);

		$data = [
			$nama,
			$alamat,
			$no_hp,
			$kesukaan,
			$id
		];

		$sql = 'UPDATE pelanggan SET nama_pelanggan=?, alamat=?, no_hp=?, kesukaan=? WHERE id_pelanggan=?';
		$row = $config->prepare($sql);
		$row->execute($data);

		echo '<script>window.location="../../index.php?page=pelanggan/edit&id=' . $id . '&success=edit-data"</script>';
	}

	if (!empty($_GET['stok'])) {
		$restok = htmlentities($_POST['restok']);
		$id = htmlentities($_POST['id']);
		$dataS[] = $id;
		$sqlS = 'select*from barang WHERE id_barang=?';
		$rowS = $config->prepare($sqlS);
		$rowS->execute($dataS);
		$hasil = $rowS->fetch();

		$stok = $restok + $hasil['stok'];

		$data[] = $stok;
		$data[] = $id;
		$sql = 'UPDATE barang SET stok=? WHERE id_barang=?';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index.php?page=barang&success-stok=stok-data"</script>';
	}

	if(!empty($_GET['barang'])){
		$id = htmlentities($_POST['id']);
		$kategori = htmlentities($_POST['kategori']);
		$nama = htmlentities($_POST['nama']);
		$merk = htmlentities($_POST['merk']);
		$beli = htmlentities($_POST['beli']);
		$jual = htmlentities($_POST['jual']);
		$satuan = htmlentities($_POST['satuan']);
		$stok = htmlentities($_POST['stok']);
		$tgl = htmlentities($_POST['tgl']);
		
		$data[] = $kategori;
		$data[] = $nama;
		$data[] = $merk;
		$data[] = $beli;
		$data[] = $jual;
		$data[] = $satuan;
		$data[] = $stok;
		$data[] = $tgl;
		$data[] = $id;
		$sql = 'UPDATE barang SET id_kategori=?, nama_barang=?, merk=?, 
				harga_beli=?, harga_jual=?, satuan_barang=?, stok=?, tgl_update=?  WHERE id_barang=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=barang/edit&barang='.$id.'&success=edit-data"</script>';
	}



	if (!empty($_GET['gambar'])) {
		$id = htmlentities($_POST['id']);
		set_time_limit(0);
		$allowedImageType = array("image/gif",   "image/JPG",   "image/jpeg",   "image/pjpeg",   "image/png",   "image/x-png");

		if ($_FILES['foto']["error"] > 0) {
			$output['error'] = "Error in File";
		} elseif (!in_array($_FILES['foto']["type"], $allowedImageType)) {
			// echo "You can only upload JPG, PNG and GIF file";
			// echo "<font face='Verdana' size='2' ><BR><BR><BR>
			// 		<a href='../../index.php?page=user'>Back to upform</a><BR>";
			echo '<script>alert("You can only upload JPG, PNG and GIF file");window.location="../../index.php?page=user"</script>';
		} elseif (round($_FILES['foto']["size"] / 1024) > 4096) {
			// echo "WARNING !!! Besar Gambar Tidak Boleh Lebih Dari 4 MB";
			// echo "<font face='Verdana' size='2' ><BR><BR><BR>
			// 		<a href='../../index.php?page=user'>Back to upform</a><BR>";
			echo '<script>alert("WARNING !!! Besar Gambar Tidak Boleh Lebih Dari 4 MB");window.location="../../index.php?page=user"</script>';
		} else {
			$dir = '../../assets/img/user/';
			$tmp_name = $_FILES['foto']['tmp_name'];
			$name = time() . basename($_FILES['foto']['name']);
			if (move_uploaded_file($tmp_name, $dir . $name)) {
				//post foto lama
				$foto2 = $_POST['foto2'];
				//remove foto di direktori
				unlink('../../assets/img/user/' . $foto2 . '');
				//input foto
				$id = $_POST['id'];
				$data[] = $name;
				$data[] = $id;
				$sql = 'UPDATE member SET gambar=?  WHERE member.id_member=?';
				$row = $config->prepare($sql);
				$row->execute($data);
				echo '<script>window.location="../../index.php?page=user&success=edit-data"</script>';
			} else {
				echo '<script>alert("Masukan Gambar !");window.location="../../index.php?page=user"</script>';
			}
		}
	}

	if (!empty($_GET['profil'])) {
		$id = htmlentities($_POST['id']);
		$nama = htmlentities($_POST['nama']);
		$alamat = htmlentities($_POST['alamat']);
		$tlp = htmlentities($_POST['tlp']);
		$email = $_POST['email'] ?? '';
		$nik = $_POST['nik'] ?? '';

		$data[] = $nama;
		$data[] = $alamat;
		$data[] = $tlp;
		$data[] = $email;
		$data[] = $nik;
		$data[] = $id;
		$sql = 'UPDATE member SET nm_member=?,alamat_member=?,telepon=?,email=?,NIK=? WHERE id_member=?';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index.php?page=user&success=edit-data"</script>';
	}
	if (!empty($_GET['pass'])) {
		$id = htmlentities($_POST['id']);
		$user = htmlentities($_POST['user']);
		$pass = htmlentities($_POST['pass']);

		$data[] = $user;
		$data[] = $pass;
		$data[] = $id;
		$sql = 'UPDATE login SET user=?,pass=md5(?) WHERE id_member=?';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index.php?page=user&success=edit-data"</script>';
	}

	if (!empty($_GET['jual'])) {
		$id = htmlentities($_POST['id']);
		$id_barang = htmlentities($_POST['id_barang']);
		$jumlah = htmlentities($_POST['jumlah']);

		$sql_tampil = "select * from barang where barang.id_barang=?";
		$row_tampil = $config->prepare($sql_tampil);
		$row_tampil->execute(array($id_barang));
		$hasil = $row_tampil->fetch();

		if ($hasil['stok'] > $jumlah) {
			$jual = $hasil['harga_jual'];
			$total = $jual * $jumlah;
			$data1[] = $jumlah;
			$data1[] = $total;
			$data1[] = $id;
			$sql1 = 'UPDATE penjualan SET jumlah=?,total=? WHERE id_penjualan=?';
			$row1 = $config->prepare($sql1);
			$row1->execute($data1);
			echo '<script>window.location="../../index.php?page=jual#keranjang"</script>';
		} else {
			echo '<script>alert("Keranjang Melebihi Stok Barang Anda !");
					window.location="../../index.php?page=jual#keranjang"</script>';
		}
	}

	if (!empty($_GET['beli'])) {
		$id = htmlentities($_POST['id']);
		$id_barang = htmlentities($_POST['id_barang']);
		$jumlah = htmlentities($_POST['jumlah']);

		$sql_tampil = "select *from barang where barang.id_barang=?";
		$row_tampil = $config->prepare($sql_tampil);
		$row_tampil->execute(array($id_barang));
		$hasil = $row_tampil->fetch();

		if ($hasil['stok'] > $jumlah) {
			$beli = $hasil['harga_beli'];
			$total = $beli * $jumlah;
			$data1[] = $jumlah;
			$data1[] = $total;
			$data1[] = $id;
			$sql1 = 'UPDATE pembelian SET jumlah=?,total=? WHERE id_pembelian=?';
			$row1 = $config->prepare($sql1);
			$row1->execute($data1);
			echo '<script>window.location="../../index.php?page=beli#keranjang"</script>';
		} else {
			echo '<script>alert("Keranjang Melebihi Stok Barang Anda !");
					window.location="../../index.php?page=beli#keranjang"</script>';
		}
	}

	if (!empty($_GET['belistok'])) {
		$id = htmlentities($_POST['id']);
		$id_barang = htmlentities($_POST['id_barang']);
		$jumlah = htmlentities($_POST['jumlah']);
	
		$sql_tampil = "SELECT * FROM barang WHERE barang.id_barang=?";
		$row_tampil = $config->prepare($sql_tampil);
		$row_tampil->execute(array($id_barang));
		$hasil = $row_tampil->fetch();
	
		// Logika untuk memeriksa stok dihapus, sehingga pengguna dapat membeli stok sebanyak apapun.
		$belistok = $hasil['harga_beli'];
		$total = $belistok * $jumlah;
		$data1[] = $jumlah;
		$data1[] = $total;
		$data1[] = $id;
		$sql1 = 'UPDATE pembelianstok SET jumlah=?,total=? WHERE id_pembelianstok=?';
		$row1 = $config->prepare($sql1);
		$row1->execute($data1);
		echo '<script>window.location="../../index.php?page=belistok#keranjang"</script>';
	}
	

	if (!empty($_GET['cari_barang'])) {
		$cari = trim(strip_tags($_POST['keyword']));
		if ($cari == '') {
		} else {
			$sql = "SELECT barang.*, kategori.id_kategori, kategori.nama_kategori
                FROM barang 
                LEFT JOIN kategori ON barang.id_kategori = kategori.id_kategori
                WHERE barang.id_barang LIKE :cari OR barang.nama_barang LIKE :cari OR barang.merk LIKE :cari";
			$row = $config->prepare($sql);
			$row->execute([':cari' => "%$cari%"]);
			$hasil1 = $row->fetchAll();
?>
			<table class="table table-stripped" width="100%" id="example2">
				<tr>
					<th>ID Barang</th>
					<th>Nama Barang</th>
					<th>Merk</th>
					<th>Harga Jual</th>
					<th>Aksi</th>
				</tr>
				<?php foreach ($hasil1 as $hasil) { ?>
					<tr>
						<td><?php echo $hasil['id_barang']; ?></td>
						<td><?php echo $hasil['nama_barang']; ?></td>
						<td><?php echo $hasil['merk']; ?></td>
						<td><?php echo $hasil['harga_jual']; ?></td>
						<td>
							<a href="fungsi/tambah/tambah.php?jual=jual&id=<?php echo $hasil['id_barang']; ?>&id_kasir=<?php echo $_SESSION['admin']['id_member']; ?>" class="btn btn-success">
								<i class="fa fa-shopping-cart"></i></a>
						</td>
					</tr>
				<?php } ?>
			</table>
		<?php
		}
	}

	if (!empty($_GET['cari_barang1'])) {
		$cari = trim(strip_tags($_POST['keyword']));
		if ($cari == '') {
		} else {
			$sql = "SELECT barang.*, kategori.id_kategori, kategori.nama_kategori
                FROM barang 
                LEFT JOIN kategori ON barang.id_kategori = kategori.id_kategori
                WHERE barang.id_barang LIKE :cari OR barang.nama_barang LIKE :cari OR barang.merk LIKE :cari";
			$row = $config->prepare($sql);
			$row->execute([':cari' => "%$cari%"]);
			$hasil1 = $row->fetchAll();
?>
			<table class="table table-stripped" width="100%" id="example2">
				<tr>
					<th>ID Barang</th>
					<th>Nama Barang</th>
					<th>Merk</th>
					<th>Harga Beli</th>
					<th>Aksi</th>
				</tr>
				<?php foreach ($hasil1 as $hasil) { ?>
					<tr>
						<td><?php echo $hasil['id_barang']; ?></td>
						<td><?php echo $hasil['nama_barang']; ?></td>
						<td><?php echo $hasil['merk']; ?></td>
						<td><?php echo $hasil['harga_beli']; ?></td>
						<td>
							<a href="fungsi/tambah/tambah.php?beli=beli&id=<?php echo $hasil['id_barang']; ?>&id_kasir=<?php echo $_SESSION['admin']['id_member']; ?>" class="btn btn-success">
								<i class="fa fa-shopping-cart"></i></a>
						</td>
					</tr>
				<?php } ?>
			</table>
		<?php
		}
	}

	if (!empty($_GET['cari_barang2'])) {
		$cari = trim(strip_tags($_POST['keyword']));
		if ($cari == '') {
		} else {
			$sql = "SELECT barang.*, kategori.id_kategori, kategori.nama_kategori
                FROM barang 
                LEFT JOIN kategori ON barang.id_kategori = kategori.id_kategori
                WHERE barang.id_barang LIKE :cari OR barang.nama_barang LIKE :cari OR barang.merk LIKE :cari";
			$row = $config->prepare($sql);
			$row->execute([':cari' => "%$cari%"]);
			$hasil1 = $row->fetchAll();
		?>
			<table class="table table-stripped" width="100%" id="example2">
				<tr>
					<th>ID Barang</th>
					<th>Nama Barang</th>
					<th>Merk</th>
					<th>Harga beli</th>
					<th>Aksi</th>
				</tr>
				<?php foreach ($hasil1 as $hasil) { ?>
					<tr>
						<td><?php echo $hasil['id_barang']; ?></td>
						<td><?php echo $hasil['nama_barang']; ?></td>
						<td><?php echo $hasil['merk']; ?></td>
						<td><?php echo $hasil['harga_beli']; ?></td>
						<td>
						<a href="fungsi/tambah/tambah.php?belistok=belistok&id=<?php echo $hasil['id_barang']; ?>&id_kasir=<?php echo $_SESSION['admin']['id_member']; ?>" class="btn btn-success">
								<i class="fa fa-shopping-cart"></i></a>
						</td>
					</tr>
				<?php } ?>
			</table>
<?php
		}
	}
}
