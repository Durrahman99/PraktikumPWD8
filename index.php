<?php
include_once "koneksi.php";
include_once "Product.php";

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$data = $product->getProducts();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Data Produk Toko</h2>

<table>
    <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Stok</th>
    </tr>

    <?php
    $no = 1;
    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>".$no++."</td>";
        echo "<td>".$row['nama_produk']."</td>";
        echo "<td>Rp ".$row['harga']."</td>";
        echo "<td>".$row['stok']."</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>