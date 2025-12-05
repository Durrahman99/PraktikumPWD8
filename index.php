<?php
include "config.php";
include "Database.php";
include "Game.php";

$db = new Database($conn);
$game = new Game($db->getConnection());

if (isset($_POST["submit"])) {
    $nama = $_POST["nama_game"];
    $ukuran = $_POST["ukuran_game"];
    $tahun = $_POST["tahun_rilis"];

    $query = "INSERT INTO game (nama_game, ukuran_game, tahun_rilis)
              VALUES ('$nama', '$ukuran', '$tahun')";

    if ($db->getConnection()->query($query)) {
        echo "<script>alert('Game baru berhasil ditambahkan!');</script>";
    } else {
        echo "<script>alert('Gagal menambahkan!');</script>";
    }
}

$jsonData = $game->getAll();
$data = json_decode($jsonData, true);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Game</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Daftar Game</h2>

<div class="container">
    <?php foreach ($data as $row): ?>
        <div class="card">
            <h3><?php echo $row["nama_game"]; ?></h3>
            <p>Ukuran: <?php echo $row["ukuran_game"]; ?></p>
            <p>Tahun Rilis: <?php echo $row["tahun_rilis"]; ?></p>
        </div>
    <?php endforeach; ?>
</div>

<hr>

<h2>Tambah Game Baru</h2>

<div class="form-container">
    <form method="POST">
        <label>Nama Game</label>
        <input type="text" name="nama_game" required>

        <label>Ukuran Game</label>
        <input type="text" name="ukuran_game" placeholder="Contoh: 10 GB" required>

        <label>Tahun Rilis</label>
        <input type="number" name="tahun_rilis" required>

        <button type="submit" name="submit">Simpan</button>
    </form>
</div>

</body>
</html>