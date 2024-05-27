<?php
require '../feature/function.php';

if (isset($_POST["submit"])) {
    create($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Iklan</title>
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

        option, select {
            color: #776B5D;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <header class="bg-navbar1">
        <div class="d-flex justify-content-between align-items-center" style="text-align: center;">
            <div class="m-3" id="backButton">
                <img src="../img/arrow-left.svg" alt="" id="back">
            </div>
            <h2 class="fw-bold">Buat Iklan</h2>
            <div></div>
        </div>
    </header>

    <main class="d-flex justify-content-center">
        <div class="container d-flex flex-column">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="p-3 w-100 d-flex justify-content-center">
                    <input type="text" name="judul" id="judul" placeholder="Berikan Judul"
                        class="w-100 border-0 rounded-2 p-2" require style="box-shadow: 0 0 4px rgba(0,0,0, .25) inset">
                </div>
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
                        <input type="text" name="telepon" id="telepon" class="w-100 border-0 rounded-2 p-2"
                            style="box-shadow: 0 0 4px rgba(0,0,0, .25) inset">
                    </div>
                </div>
                <div class="mt-3 d-flex flex-column gap-2">
                    <label for="gambar">Tambahkan Gambar</label>
                    <div class="border-0 d-flex justify-content-center mx-3 align-items-center rounded-3 bg-white"
                        style="height: 300px; box-shadow: 0 0 4px rgba(0,0,0, .25) inset">
                        <img src="../img/getImage.svg" alt="image" width="50">
                        <input type="file" name="gambar" id="gambar" require
                            style="position: absolute; opacity: 0; z-index: 1;">
                    </div>
                </div>
                <div class=" d-flex flex-column mt-3 gap-2">
                    <label for="lokasi">Tambahkan Lokasi</label>
                    <div class="px-3 d-flex gap-3">
                        <img src="../img/location.svg" alt="location-icon" width="30">
                        <input type="text" name="lokasi" id="lokasi" require class="w-100 border-0 rounded-2 p-2"
                            style="box-shadow: 0 0 4px rgba(0,0,0, .25) inset">
                    </div>
                </div>
                <div class="d-flex flex-column gap-2 mt-3">
                    <label for="telepon">Harga</label>
                    <div class="container d-flex gap-3 px-3">
                        <select name="country" id="country" class="border-0 rounded-2 p-2" style="box-shadow: 0 0 4px rgba(0,0,0, .2)">
                            <option value="Indonesia">IDR</option>
                            <option value="Australia">AUD</option>
                            <option value="Malaysia">MYR</option>
                            <option value="Singapore">SGD</option>
                            <option value="Vietnam">VND</option>
                        </select>
                        <input type="text" name="harga" id="telepon" class="w-100 border-0 rounded-2 p-2"
                            style="box-shadow: 0 0 4px rgba(0,0,0, .25) inset">
                    </div>
                </div>
                <div class=" d-flex flex-column mt-3 gap-2">
                    <label for="kamar_tidur">Jumlah Kamar Tidur</label>
                    <div class="d-flex gap-4 px-3">
                        <input type="number" name="kamar_tidur" id="kamar_tidur" class="border-0 rounded-2 p-2"
                            style="width: 50px; box-shadow: 0 0 4px rgba(0,0,0, .25) inset" maxlength="2">
                    </div>
                </div>
                <div class="mt-3 d-flex flex-column gap-2">
                    <label for="kamar_mandi">Jumlah Kamar Mandi</label>
                    <div class="d-flex gap-4 px-3">
                        <input type="number" name="kamar_mandi" id="kamar_mandi" class="border-0 rounded-2 p-2"
                            style="width: 50px; box-shadow: 0 0 4px rgba(0,0,0, .25) inset" maxlength="2">
                    </div>
                </div>
                <div class="mt-3 d-flex flex-column gap-2">
                    <label for="deskripsi">Tambahkan Keterangan</label>
                    <textarea name="deskripsi" id="deskripsi" class="w-100 border-0 rounded-2 p-2"
                        style="box-shadow: 0 0 4px rgba(0,0,0, .25) inset"></textarea>
                </div>
                <div class="mt-3 mb-3 d-flex flex-column gap-2">
                    <button class="btn btn-khusus" type="submit" name="submit" onclick="send()"
                        style="box-shadow: 0 0 4px rgba(0,0,0, .25)">Buat Iklan!</button>
                </div>
            </form>
        </div>
    </main>
</body>

<script>

    const country = document.getElementById("country");
    const telepon = document.getElementById("telepon")

    const send = () => {
        let number = country.value + telepon.value
        telepon.value = number
    }

    const backButton = document.getElementById("backButton");

    backButton.addEventListener('click', () => {
        window.history.back()
    })
</script>

</html>