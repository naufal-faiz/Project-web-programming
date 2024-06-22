<?php
require '../feature/function.php';
$properties = query("SELECT * FROM properti_jual WHERE id_kategori = 112");
$property = query("SELECT * FROM properti WHERE id_kategori = 112");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Iklan</title>
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</head>

<body style="font-family: 'Kanit', sans-serif;">
    <header class="bg-navbar1">
        <div class="d-flex justify-content-between align-items-center" style="text-align: center;">
            <div class="m-3" id="backButton">
                <img src="../img/arrow-left.svg" alt="" id="back">
            </div>
            <h2 class="fw-bold">Lihat Produk Cluster</h2>
            <div></div>
        </div>
    </header>

    <?php if (empty($properties) && empty($property)): ?>
        <main>
            <div class="d-flex text-center align-items-center justify-content-center" style="height: 100vh">
                <h1 class="text-abu opacity-25">Belum ada tawaran menarik hari ini 😔</h1>
            </div>
        <?php else: ?>
            <main style="margin-bottom: 20px">
                <?php foreach ($properties as $properti): ?>
                    <?php $harga = number_format($properti["harga"], 0, ',') ?>
                    <div class="px-5 mt-3">
                        <div class="card p-3 rounded-4 d-flex flex-row gap-5 flex-wrap">
                            <div style="max-width: 530px; max-height: 300px; border: 2px solid black; overflow: hidden"
                                class="rounded-4">
                                <img src="../uploadan/<?= $properti["gambar"] ?>" alt="<?= $properti["gambar"] ?>"
                                    style="width: 100%; height: 100%; object-fit: cover">
                            </div>
                            <div class="w-50">
                                <p style="font-size: 40px; font-weight: 500; color: #776B5D" class="m-0">
                                    <?= $properti["judul"] ?></p>
                                <p style="color: #B0A695; font-size: 28px; font-weight: 500">Rp. <?= $harga ?></p>
                                <p style="font-size: 24px;"><?= $properti["lokasi"] ?></p>
                                <div class="d-flex gap-3">
                                    <p style="font-size: 20px; color: #776B5D"><img src="../img/tempat-tidur.svg" alt="icon"
                                            class="me-3"><?= $properti["kamar_tidur"] ?></p>
                                    <p style="font-size: 24px; color: #776B5D">|</p>
                                    <p style="font-size: 20px; color: #776B5D"><img src="../img/tempat-mandi.svg" alt="icon"
                                            class="me-3"><?= $properti["kamar_mandi"] ?></p>
                                </div>
                                <div class=" d-flex gap-3">
                                    <a href="../Property Page/halamanJual.php?id_jual=<?= $properti["id_jual"] ?>"
                                        class="btn btn-khusus px-4 py-1 rounded-3" style="font-size: 23px;">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php foreach ($property as $prop): ?>
                    <?php $harga = number_format($prop["harga"], 0, ',') ?>
                    <div class="px-5 mt-3">
                        <div class="card p-3 rounded-4 d-flex flex-row gap-5 flex-wrap">
                            <div style="max-width: 530px; max-height: 300px; border: 2px solid black; overflow: hidden"
                                class="rounded-4">
                                <img src="../uploadan/<?= $prop["gambar"] ?>" alt="<?= $prop["gambar"] ?>"
                                    style="width: 100%; height: 100%; object-fit: cover">
                            </div>
                            <div class="w-50">
                                <p style="font-size: 40px; font-weight: 500; color: #776B5D" class="m-0"><?= $prop["judul"] ?>
                                </p>
                                <p style="color: #B0A695; font-size: 28px; font-weight: 500">Rp. <?= $harga ?></p>
                                <p style="font-size: 24px;"><?= $prop["lokasi"] ?></p>
                                <div class="d-flex gap-3">
                                    <p style="font-size: 20px; color: #776B5D"><img src="../img/tempat-tidur.svg" alt="icon"
                                            class="me-3"><?= $prop["kamar_tidur"] ?></p>
                                    <p style="font-size: 24px; color: #776B5D">|</p>
                                    <p style="font-size: 20px; color: #776B5D"><img src="../img/tempat-mandi.svg" alt="icon"
                                            class="me-3"><?= $prop["kamar_mandi"] ?></p>
                                </div>
                                <div class=" d-flex gap-3">
                                    <a href="../Property Page/halamanProperti.php?id_properti=<?= $prop["id_properti"] ?>"
                                        class="btn btn-khusus px-4 py-1 rounded-3" style="font-size: 23px;">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif ?>
        </main>
        <script>
            const backButton = document.getElementById("backButton");

            backButton.addEventListener('click', () => {
                window.history.back()
            })
        </script>
</body>