<?php
session_start();
if (!empty($_SESSION['admin'])) {
    require '../../config.php';
    if(!empty($_GET['kategori'])){
		$nama= $_POST['kategori'];
		$tgl= date("j F Y, G:i");
		$data[] = $nama;
		$data[] = $tgl;
		$sql = 'INSERT INTO kategori (nama_kategori,tgl_input) VALUES(?,?)';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=kategori&&success=tambah-data"</script>';
	}


    if (!empty($_GET['karyawan'])) {
        $nama = $_POST['nama'];
        $telepon = $_POST['telepon'];
        $alamat = $_POST['alamat'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];
    
        // Menangani upload gambar
        $target_dir = "../../assets/img/user/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Cek apakah file gambar adalah gambar asli atau palsu
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if ($check !== false) {
            // Cek apakah file sudah ada
            if (file_exists($target_file)) {
                echo "Maaf, file sudah ada.";
                exit();
            }
            // Cek ukuran file
            if ($_FILES["gambar"]["size"] > 500000) {
                echo "Maaf, ukuran file terlalu besar.";
                exit();
            }
            // Hanya format tertentu yang diperbolehkan
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
                exit();
            }
            // Cek jika $uploadOk bernilai 0
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                $gambar = basename($_FILES["gambar"]["name"]);
            } else {
                echo "Maaf, terjadi kesalahan saat mengupload file.";
                exit();
            }
        } else {
            echo "File yang diupload bukan gambar.";
            exit();
        }
    
        try {
            // Buat query untuk insert data karyawan
            $sqlMember = 'INSERT INTO member (nm_member, alamat_member, telepon, gambar, level) VALUES (?, ?, ?, ?, ?)';
            $stmtMember = $config->prepare($sqlMember);
            $stmtMember->execute([$nama, $alamat, $telepon, $gambar, $level]);
    
            // Ambil member_id yang baru saja diinsert
            $member_id = $config->lastInsertId();
    
            // Buat query untuk insert data login
            $sqlLogin = 'INSERT INTO login (id_member, user, pass) VALUES (?, ?, ?)';
            $stmtLogin = $config->prepare($sqlLogin);
            $stmtLogin->execute([$member_id, $username, md5($password)]);
    
            // Redirect ke halaman sukses
            header('Location: ../../index.php?page=karyawan&success=tambah-data');
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        // echo "Parameter 'karyawan' tidak ditemukan.";
    }


    if (!empty($_GET['supplier'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];

        try {
            // Buat query untuk insert data supplier
            $sql = 'INSERT INTO supplier (id_supplier, nama_supplier, alamat, no_hp) VALUES (?, ?, ?, ?)';
            $stmt = $config->prepare($sql);
            $stmt->execute([$id, $nama, $alamat, $no_hp]);

            // Redirect ke halaman sukses
            header('Location: ../../index.php?page=supplier&success=tambah-data');
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        // echo "Parameter 'supplier' tidak ditemukan.";
    }

    if (!empty($_GET['pelanggan'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $kesukaan = $_POST['kesukaan'];

        try {
            // Buat query untuk insert data pelanggan
            $sql = 'INSERT INTO pelanggan (id_pelanggan, nama_pelanggan, alamat, no_hp, kesukaan) VALUES (?, ?, ?, ?, ?)';
            $stmt = $config->prepare($sql);
            $stmt->execute([$id, $nama, $alamat, $no_hp, $kesukaan]);

            // Redirect ke halaman sukses
            header('Location: ../../index.php?page=pelanggan&success=tambah-data');
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        // echo "Parameter 'pelanggan' tidak ditemukan.";
    }

    if(!empty($_GET['barang'])){
		$id = $_POST['id'];
		$kategori = $_POST['kategori'];
		$nama = $_POST['nama'];
		$merk = $_POST['merk'];
		$beli = $_POST['beli'];
		$jual = $_POST['jual'];
		$satuan = $_POST['satuan'];
		$stok = $_POST['stok'];
		$tgl = $_POST['tgl'];
		
		$data[] = $id;
		$data[] = $kategori;
		$data[] = $nama;
		$data[] = $merk;
		$data[] = $beli;
		$data[] = $jual;
		$data[] = $satuan;
		$data[] = $stok;
		$data[] = $tgl;
		$sql = 'INSERT INTO barang (id_barang,id_kategori,nama_barang,merk,harga_beli,harga_jual,satuan_barang,stok,tgl_input) 
			    VALUES (?,?,?,?,?,?,?,?,?) ';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=barang&success=tambah-data"</script>';
	}



    if (!empty($_GET['jual'])) {
        $id = $_GET['id'];

        // get tabel barang id_barang 
        $sql = 'SELECT * FROM barang WHERE id_barang = ?';
        $row = $config->prepare($sql);
        $row->execute(array($id));
        $hsl = $row->fetch();

        if ($hsl['stok'] > 0) {
            $kasir =  $_GET['id_kasir'];
            $jumlah = 1;
            $total = $hsl['harga_jual'];
            $tgl = date("j F Y, G:i");

            $kasir = $_GET['id_kasir'];
            $id_barang = $id; // Asumsikan $id adalah id_barang
            $jumlah = 1;
            $total = $hsl['harga_jual'];
            $tgl = date("j F Y, G:i");

            // Periksa apakah barang dengan kasir yang sama sudah ada di database
            $sql_check = 'SELECT * FROM penjualan WHERE id_barang = ? AND id_member = ?';
            $row_check = $config->prepare($sql_check);
            $row_check->execute([$id_barang, $kasir]);
            $existing = $row_check->fetch();

            if ($existing) {
                // Jika data barang dengan kasir yang sama sudah ada, update jumlah dan totalnya
                $new_jumlah = $existing['jumlah'] + $jumlah;
                $new_total = $existing['total'] + $total;

                $sql_update = 'UPDATE penjualan SET jumlah = ?, total = ? WHERE id_barang = ? AND id_member = ?';
                $row_update = $config->prepare($sql_update);
                $row_update->execute([$new_jumlah, $new_total, $id_barang, $kasir]);
            } else {
                // Jika tidak ada, tambahkan data baru
                $data1 = [$id_barang, $kasir, $jumlah, $total, $tgl];
                $sql_insert = 'INSERT INTO penjualan (id_barang, id_member, jumlah, total, tanggal_input) VALUES (?, ?, ?, ?, ?)';
                $row_insert = $config->prepare($sql_insert);
                $row_insert->execute($data1);
            }

            echo '<script>window.location="../../index.php?page=jual&success=tambah-data"</script>';
        } else {
            echo '<script>alert("Stok Barang Anda Telah Habis !");
					window.location="../../index.php?page=jual#keranjang"</script>';
        }
    }

    if (!empty($_GET['beli'])) {
        $id = $_GET['id'];

        // Dapatkan data barang berdasarkan id_barang
        $sql = 'SELECT * FROM barang WHERE id_barang = ?';
        $row = $config->prepare($sql);
        $row->execute([$id]);
        $hsl = $row->fetch();

        if ($hsl && $hsl['stok'] > 0) {
            $id_kasir = $_GET['id_kasir'];
            $jumlah = 1;
            $total = $hsl['harga_beli'];
            $tgl = date("j F Y, G:i");

            // Cek apakah barang sudah ada di tabel pembelian
            $sql_check = 'SELECT * FROM pembelian WHERE id_barang = ? AND id_member = ?';
            $row_check = $config->prepare($sql_check);
            $row_check->execute([$id, $id_kasir]);
            $existing_item = $row_check->fetch();

            if ($existing_item) {
                // Update jumlah dan total jika barang sudah ada
                $new_jumlah = $existing_item['jumlah'] + $jumlah;
                $new_total = $existing_item['total'] + $total;

                $sql_update = 'UPDATE pembelian SET jumlah = ?, total = ?, tanggal_input = ? WHERE id_barang = ?';
                $row_update = $config->prepare($sql_update);
                $row_update->execute([$new_jumlah, $new_total, $tgl, $id]);
            } else {
                // Insert data baru jika barang belum ada
                $data1 = [$id, $id_kasir, $jumlah, $total, $tgl];
                $sql1 = 'INSERT INTO pembelian (id_barang, id_member, jumlah, total, tanggal_input) VALUES (?, ?, ?, ?, ?)';
                $row1 = $config->prepare($sql1);
                $row1->execute([$id, $id_kasir, $jumlah, $total, $tgl]);
            }

            echo '<script>window.location="../../index.php?page=beli&success=tambah-data"</script>';
        } else {
            echo '<script>alert("Stok Barang Anda Telah Habis!"); window.location="../../index.php?page=beli#keranjang"</script>';
        }
    }

    if (!empty($_GET['belistok'])) {
        $id = $_GET['id'];

        // Dapatkan data barang berdasarkan id_barang
        $sql = 'SELECT * FROM barang WHERE id_barang = ?';
        $row = $config->prepare($sql);
        $row->execute([$id]);
        $hsl = $row->fetch();

        if ($hsl && $hsl['stok'] > 0) {
            $id_kasir = $_GET['id_kasir'];
            $jumlah = 1;
            $total = $hsl['harga_beli'];
            $tgl = date("Y-m-d H:i:s");

            // Cek apakah barang sudah ada di tabel pembelian
            $sql_check = 'SELECT * FROM pembelianstok WHERE id_barang = ? AND id_member = ?';
            $row_check = $config->prepare($sql_check);
            $row_check->execute([$id, $id_kasir]);
            $existing_item = $row_check->fetch();

            if ($existing_item) {
                // Update jumlah dan total jika barang sudah ada
                $new_jumlah = $existing_item['jumlah'] + $jumlah;
                $new_total = $existing_item['total'] + $total;

                $sql_update = 'UPDATE pembelianstok SET jumlah = ?, total = ?, tanggal_input = ? WHERE id_barang = ?';
                $row_update = $config->prepare($sql_update);
                $row_update->execute([$new_jumlah, $new_total, $tgl, $id]);
            } else {
                // Insert data baru jika barang belum ada
                $data1 = [$id, $id_kasir, $jumlah, $total, $tgl];
                $sql1 = 'INSERT INTO pembelianstok (id_barang, id_member, jumlah, total, tanggal_input) VALUES (?, ?, ?, ?, ?)';
                $row1 = $config->prepare($sql1);
                $row1->execute([$id, $id_kasir, $jumlah, $total, $tgl]);
            }

            echo '<script>window.location="../../index.php?page=belistok&success=tambah-data"</script>';
        } else {
            echo '<script>alert("Stok Barang Anda Telah Habis!"); window.location="../../index.php?page=belistok#keranjang"</script>';
        }
    }
}
