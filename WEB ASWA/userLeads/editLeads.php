<?php
require '../feature/function.php';
if (isset($_POST["submit"])) {
    if (edit($_POST) > 0) {
        echo "
        <script>
        alert('Iklan Berhasil Diperbarui!')
        document.location.href = 'leadsPage.php'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Iklan Gagal Diperbarui!')
        </script>
        ";
    }
    ;
}

$id = $_GET["id_jual"];
$prop = query("SELECT * FROM properti_jual WHERE id_jual = $id")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Iklan</title>
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #F8F7F4;
        }

        #deskripsi {
            resize: none;
            width: 100%;
            height: 200px;
        }

        label {
            font-size: 23px;
            font-weight: 500;
            color: #776B5D;
        }

        option,
        select {
            color: #776B5D;
            font-weight: 500;
        }

        input {
            color: #776B5D
        }

        input::placeholder {
            color: #776B5D;
        }

        input:focus {
            color: #776B5D;
            outline: 3px solid #776B5D;
        }

        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

        input[type=number] {
            text-align: center;
        }
    </style>
</head>

<body>
    <header class="bg-navbar1">
        <div class="d-flex justify-content-between align-items-center" style="text-align: center;">
            <div class="m-3" id="backButton">
                <img src="../img/arrow-left.svg" alt="" id="back">
            </div>
            <h2 class="fw-bold">Perbarui Iklan</h2>
            <div></div>
        </div>
    </header>

    <main class="d-flex justify-content-center">
            <div class="container d-flex flex-column">
                <form action="" method="post">
                    <div class="p-3 w-100 d-flex justify-content-center">
                        <input type="text" name="judul" id="judul" placeholder="Berikan Judul"
                            class="w-100 border-0 rounded-2 p-2" style="box-shadow: 0 0 4px rgba(0,0,0, .25) inset"
                            value="<?= $prop["judul"] ?>">
                    </div>
                    <input type="hidden" name="id_jual" value="<?= $prop["id_jual"] ?>">
                    <div class="d-flex flex-column gap-2">
                        <label for="telepon">Telepon</label>
                        <div class="container d-flex gap-3 px-3">
                            <select name="country" id="country" class="border-0 rounded-2 p-2"
                                style="box-shadow: 0 0 8px rgba(0,0,0, .2)">
                                <option value="+62">IDN +62</option>
                                <option value="+61">AUS +61</option>
                                <option value="+60">MYS +60</option>
                                <option value="+65">SGP +65</option>
                                <option value="+84">VNM +84</option>
                            </select>
                            <input type="text" name="no_telepon" id="telepon" class="w-100 border-0 rounded-2 p-2"
                                style="box-shadow: 0 0 4px rgba(0,0,0, .25) inset" value="<?= $prop["no_telepon"] ?>">
                        </div>
                    </div>
                    <div class=" d-flex flex-column mt-3 gap-2">
                        <label for="lokasi">Ubah Lokasi</label>
                        <div class="px-3 d-flex gap-3">
                            <img src="../img/location.svg" alt="location-icon" width="30">
                            <input type="text" name="lokasi" id="lokasi" class="w-100 border-0 rounded-2 p-2"
                                style="box-shadow: 0 0 4px rgba(0,0,0, .25) inset" value="<?= $prop["lokasi"] ?>">
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-2 mt-3">
                        <label for="telepon">Harga</label>
                        <div class="container d-flex gap-3 px-3">
                            <select name="country" id="country" class="border-0 rounded-2 p-2"
                                style="box-shadow: 0 0 4px rgba(0,0,0, .2)">
                                <option value="Indonesia">IDR</option>
                                <option value="Australia">AUD</option>
                                <option value="Malaysia">MYR</option>
                                <option value="Singapore">SGD</option>
                                <option value="Vietnam">VND</option>
                            </select>
                            <input type="text" name="harga" id="telepon" class="w-100 border-0 rounded-2 p-2"
                                style="box-shadow: 0 0 4px rgba(0,0,0, .25) inset" value="<?= $prop["harga"] ?>">
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-2 mt-3">
                        <label for="kategori">Kategori</label>
                        <div class="d-flex gap-3">
                            <input type="radio" class="btn-check" name="id_kategori" id="option1" autocomplete="off"
                                checked value="111">
                            <label class="btn btn-login" for="option1">Subsidi</label>
                            <input type="radio" class="btn-check" name="id_kategori" id="option2" autocomplete="off"
                                value="112">
                            <label class="btn btn-login" for="option2">Cluster</label>
                            <input type="radio" class="btn-check" name="id_kategori" id="option3" autocomplete="off"
                                value="113">
                            <label class="btn btn-login" for="option3">Take Over</label>
                        </div>
                    </div>
                    <div class=" d-flex flex-column mt-3 gap-2">
                        <label for="kamar_tidur">Jumlah Kamar Tidur</label>
                        <div class="d-flex gap-4 px-3">
                            <input type="number" name="kamar_tidur" id="kamar_tidur" class="border-0 rounded-2 p-2"
                                style="width: 50px; box-shadow: 0 0 4px rgba(0,0,0, .25) inset" max="20" min="1"
                                value="<?= $prop["kamar_tidur"] ?>">
                        </div>
                    </div>
                    <div class="mt-3 d-flex flex-column gap-2">
                        <label for="kamar_mandi">Jumlah Kamar Mandi</label>
                        <div class="d-flex gap-4 px-3">
                            <input type="number" name="kamar_mandi" id="kamar_mandi" class="border-0 rounded-2 p-2"
                                style="width: 50px; box-shadow: 0 0 4px rgba(0,0,0, .25) inset" max="20" min="1"
                                value="<?= $prop["kamar_mandi"] ?>">
                        </div>
                    </div>
                    <div class="mt-3 d-flex flex-column gap-2">
                        <label for="deskripsi">Ubah Keterangan</label>
                        <textarea name="deskripsi" id="deskripsi" class="w-100 border-0 rounded-2 p-2"
                            style="box-shadow: 0 0 4px rgba(0,0,0, .25) inset"><?= $prop["deskripsi"] ?></textarea>
                    </div>
                    <div class="mt-3 mb-3 d-flex flex-column gap-2">
                        <button class="btn btn-khusus" type="submit" name="submit" onclick="send()"
                            style="box-shadow: 0 0 4px rgba(0,0,0, .25)">Perbarui Iklan!</button>
                    </div>
                </form>
            </div>
    </main>
</body>

<script>
    const backButton = document.getElementById("backButton");
    const imageUpload = document.getElementById('image-upload');
    const preview = document.getElementById('preview');
    const bungkusus = document.getElementById('bungkusus');

    backButton.addEventListener('click', () => {
        window.history.back()
    })

    imageUpload.addEventListener('change', function () {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
            preview.style.width = "100%"
            preview.style.height = "100%"
            bungkusus.style.boxShadow = "0 0 16px rgba(0,0,0, .25) inset"
        }
    });

</script>

</html>