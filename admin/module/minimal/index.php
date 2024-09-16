<?php
// stok_minimal.php

// Hubungkan ke database
include 'config.php';

if (isset($_POST['submit'])) {
    // Ambil nilai minimal stok dari input form
    $minimal_stok = $_POST['minimal_stok'];

    // Simpan atau update nilai minimal stok ke database
    $sql = "UPDATE konfigurasi_stok SET minimal_stok = :minimal_stok";
    $stmt = $config->prepare($sql);
    $stmt->bindParam(':minimal_stok', $minimal_stok);
    $stmt->execute();

    // Redirect dengan pesan sukses
    header('Location: index.php?page=minimal&success=1');
    exit;
}

// Ambil nilai minimal stok saat ini dari database
$sql = "SELECT minimal_stok FROM konfigurasi_stok";
$stmt = $config->prepare($sql);
$stmt->execute();
$current_stok = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Minimal Stok Barang</title>
</head>
<body>

<div class="container">
    <h3>Pengaturan Minimal Stok Barang</h3>
    <?php if (isset($_GET['success'])) { ?>
        <div class="alert alert-success">
            <p>Pengaturan Minimal Stok Berhasil Diupdate!</p>
        </div>
    <?php } ?>

    <form method="POST" action="index.php?page=minimal">
        <div class="form-group">
            <label for="minimal_stok">Minimal Stok Barang</label>
            <input type="number" name="minimal_stok" class="form-control" value="<?php echo $current_stok['minimal_stok']; ?>" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

</body>
</html>
