<?php
    require '../feature/function.php';
    $properti = query("SELECT * FROM properti");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Produk</title>
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</head>
<body>
    <h1>DAFTAR PRODUK</h1>

    <table cellspacing="0" border="1" cellpadding="10">
        <tr>
            <th>No.</th>
            <th>Judul</th>
            <th>Harga</th>
            <th>Lokasi</th>
            <th>Kamar Tidur</th>
            <th>Kamar Mandi</th>
            <th>Deskripsi</th>
        </tr>
        <?php $i = 1 ?>
        <?php foreach($product as $prod) : ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $prod["judul"] ?></td>
            <td>Rp. <?= $prod["harga"] ?></td>
            <td><?= $prod["lokasi"] ?></td>
            <td><?= $prod["kamar_tidur"] ?></td>
            <td><?= $prod["kamar_mandi"] ?></td>
            <td><?= $prod["deskripsi"] ?></td>
            <?php $i++ ?>
        </tr>
        <?php endforeach ?>
    </table>
</body>
</html>