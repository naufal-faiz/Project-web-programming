<?php
require '../feature/function.php';
$products = query("SELECT * FROM properti");
$productCount = count($products);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aswa Mandiri - Temukan Hunian Anda</title>
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        .nav-hover:hover {
            color: #333;
            transition: .3s ease-in-out;
        }

        @media screen and (max-width: 768px) {
            .leads-container {
                justify-content: center;
                align-items: center;
                text-align: center;
            }

            .leads-text {
                align-items: center;
                justify-content: center;
                text-align: center;
            }
        }
    </style>
</head>

<body style="background-color: #F8F7F4; font-family: 'Kanit';">
    <header style="display: inline;">
        <div class="jumbotron p-2 d-flex gap-4 justify-content-center align-items-center text-coklat"
            style="background-color: #EBE3D5;">
            <div class="d-flex justify-content-center align-items-center">
                <img src="../img/Logo Aswa Lengkap 4.png" alt="" width="50">
            </div>
            <div class="d-flex align-items-center">
                <h1 class="me-5" style="font-size: 50px;">Aswa Mandiri</h1>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg p-1"
            style="position: sticky; z-index: 999; top: 0; background-color: #776B5D; color: white;">
            <div class="container-fluid d-flex justify-content-between">
                <div>
                    <button class="navbar-toggler border-white" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-3">
                            <li class="nav-item">
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white nav-hover" aria-current="page" href="../Product Page/halamanUtama.php">Dijual</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white nav-hover" aria-current="page" href="../Product Page/subsidi.php">Subsidi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white nav-hover" aria-current="page" href="../Product Page/cluster.php">Cluster</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white nav-hover" aria-current="page" href="../Product Page/takeOver.php">Take Over</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="d-flex gap-2 right-0">
                    <span id="username" class="text-coklat rounded-3"
                        style="background-color: #EBE3D5; padding: 8px; cursor: pointer;"></span>
                    <button class="logout-c rounded-3 mt-2 btn btn-login" id="logOutBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="logout" width="20">
                            <path fill="#776B5D"
                                d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z">
                            </path>
                        </svg>
                    </button>
                    <a class="btn btn-login" href="login.html" style="width:100px;" id="login">
                        Login
                    </a>
                    <a class="btn btn-login" href="register.html" style="width: 100px" id="register">
                        Register
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="d-flex justify-content-center flex-column align-items-center pt-5">
            <h1 class="text-coklat" id="adminTitle">Hai Admin, Selamat Datang!</h1>
            <div class="d-flex gap-3 mt-3">
                <a class="btn btn-khusus" aria-current="page" id="adminLeads" href="../adminLeads/createAdminLeads.php">Buat iklan</a>
                <a class="btn btn-login" aria-current="page" id="adminPage" href="../adminLeads/adminLeadsPage.php">Lihat halaman iklan</a>
            </div>
        </div>
        <!-- CAROUSEL START -->
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide mx-5 my-3 shadow rounded-5"
                data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner rounded-5">
                    <div class="carousel-item active">
                        <img src="../img/uploadan/Gambar1.png" class="d-block w-100" alt="Aswa Carousel" height="500"
                            width="600">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/uploadan/Gambar2.png" class="d-block w-100" alt="Aswa Carousel" height="500"
                            width="600">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/uploadan/Gambar3.png" class="d-block w-100" alt="Aswa Carousel" height="500"
                            width="600">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- CAROUSEL END -->

        <?php if(empty($products)) : ?>
        <?php else : ?>
        <!-- CARD START -->
        <div class="d-flex justify-content-center m-3 mt-4">
            <h1 class="text-coklat">Penawaran Terbaik Kami</h1>
        </div>
        <?php if($productCount > 3) : ?>
        <div class="d-flex gap-3 text-center overflow-x-auto justify-content-start">
        <?php else : ?>
        <div class="d-flex gap-3 text-center overflow-x-auto justify-content-center">
        <?php endif ?>
            <?php foreach ($products as $product): ?>
                <?php $harga = number_format($product["harga"], 0, ',') ?>
                <div class="card p-1 shadow-sm border border-none" id="isi-kartu" style="width: 18rem; min-width: 18rem;">
                    <img src="../img/uploadan/<?= $product["gambar"] ?>" class="card-img-top"
                        style="height: 10rem; border: 1px solid #776B5D;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-coklat fw-bold"><?= $product["judul"] ?></h5>
                        <p class="card-text m-0 fw-medium text-krem">Rp. <?= $harga ?></p>
                        <p class="card-text m-0"><?= $product["lokasi"] ?></p>
                    </div>
                    <div class="mb-3">
                        <a href="../Property Page/halamanProperti.php?id_properti=<?= $product["id_properti"] ?>" class="btn btn-khusus">Lihat
                            Disini</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <!-- CARD END -->
        <?php endif ?>

        <!-- SPONSOR -->
        <div class="d-flex justify-content-center m-3 mt-5 title">
            <h1 class="text-coklat">Properti Yang Kami Jangkau</h1>
        </div>

        <div class="d-flex justify-content-center overflow-x-auto" style="gap: 140px">
            <img src="../img/JID2021005924.jpg" alt="" class="rounded-circle shadow-sm" width="75
            ">
            <img src="../img/Suropati-logo.png" alt="" class="rounded-circle shadow-sm bg-white" width="75
            ">
            <img src="../img/Gambar9.png" alt="" class="rounded-circle shadow-sm bg-white" width="75
            ">
            <img src="../img/images.jpg" alt="" class="rounded-circle shadow-sm bg-white" width="75
            ">
            <img src="../img/Gambar10.png" alt="" class="rounded-circle shadow-sm bg-white" width="75
            ">
            <img src="../img/Gambar8.png" alt="" class="rounded-circle shadow-sm bg-white" width="75
            ">
        </div>
        <!-- SPONSOR END -->

        <!-- LEADS START -->
        <div class="container d-flex justify-content-center mt-5">
            <div class="leads-container shadow-sm w-100 mx-5 d-flex flex-row p-3 flex-wrap bg-white rounded-3 gap-3">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="../img/icon 1.png" class="" width="200" alt="...">
                </div>
                <div class="leads-text d-flex flex-column gap-3 justify-content-center">
                    <h3 class="text-coklat fw-bold">Ingin menjual atau menyewakan properti anda?</h3>
                    <h5 class="text-krem fw-bold">Tayangkan iklan hanya dengan beberapa langkah</h5>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="../userLeads/createLeads.php" class="btn btn-khusus" style="width: 180px;">Pasang iklan disini!</a>
                        <a href="../userLeads/leadsPage.php" class="btn btn-login" style="width: 180px;">Lihat Iklan saya</a>
                    </div>
                </div>

            </div>
        </div>

        <!-- RATING USER START -->
        <div class="d-flex justify-content-center mb-3 mt-5 title">
            <h1 class="text-coklat">Ulasan</h1>
        </div>

        <div class="d-flex justify-content-center mx-5 mb-5">
            <div class="d-flex justify-content-center flex-wrap gap-5">
                <div class="d-flex flex-column bg-white rounded-3 shadow-sm" style="width: 20rem;">
                    <div class="p-3 text-center" style="height: 75%;">
                        <q>Dengan adanya website aswa memudahkan saya untuk mencari tempat tinggal di daerah
                            sekitar yang ingin saya tempati.</q>
                    </div>
                    <div class="d-flex align-items-center p-2 gap-4 p-2 rounded-bottom-3"
                        style="background-color: #ebe3d5;">
                        <img src="../img/icon3.png" width="50" alt="">
                        <p class="fs-5 fw-medium text-coklat m-0">User Aswa</p>
                    </div>
                </div>
                <div class="d-flex flex-column bg-white rounded-3 shadow-sm" style="width: 20rem;">
                    <div class="p-3 text-center" style="height: 75%;">
                        <q>Terimakasih aswa karena sudah memudahkan saya untuk mencari properti terbaik.</q>
                    </div>
                    <div class="d-flex align-items-center p-2 gap-4 p-2 rounded-bottom-3"
                        style="background-color: #ebe3d5;">
                        <img src="../img/icon3.png" width="50" alt="">
                        <p class="fs-5 fw-medium text-coklat m-0">User Aswa</p>
                    </div>
                </div>
                <div class="d-flex flex-column bg-white rounded-3 shadow-sm" style="width: 20rem;">
                    <div class="p-3 text-center" style="height: 75%;">
                        <q>Aswa Website sangat membantu, saya jadi bisa menemukan rumah yag saya impikan dibekasi tanpa
                            pusing untuk surver ke banyak tempat</q>
                    </div>
                    <div class="d-flex align-items-center p-2 gap-4 p-2 rounded-bottom-3"
                        style="background-color: #ebe3d5;">
                        <img src="../img/icon3.png" width="50" alt="">
                        <p class="fs-5 fw-medium text-coklat m-0">User Aswa</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- RATING USER END -->
    </main>

    <footer class="container-fluid p-2 d-flex justify-content-around flex-wrap gap-5" style="background: #e6e6e6;">
        <div class="social-media d-flex flex-column gap-2 align-items-center" style="width: 20rem">
            <h5 class="fw-bold text-abu">Social Media</h5>
            <div class="d-flex gap-3">
                <a href="https://instagram.com/_tuyy68">
                    <img src="../img/icon 4.png" class="me-2" alt="" width="30">
                </a>
                <a href="https://www.facebook.com/profile.php?id=100093661991910&mibextid=ZbWKwL">
                    <img src="../img/icon 5.png" class="me-2" alt="" width="30">
                </a>
                <a href="https://www.tiktok.com/@gunturprakoso359?_t=8maBjJB9ZmD&_r=1">
                    <img src="../img/icon 6.png" class="me-2" alt="" width="30">
                </a>
            </div>
        </div>

        <div class="tentang d-flex flex-column gap-2 align-items-center text-abu" style="width: 20rem">
            <h5 class="fw-bold">Tentang</h5>
            <ul style="list-style-type: none;" class="d-flex flex-column gap-2">
                <li><a class="text-abu" style="text-decoration: none;" href="../footer/s&k.html">Syarat & Ketentuan</a>
                </li>
                <li><a class="text-abu" style="text-decoration: none;" href="../footer/kebijakan.html">Kebijakan
                        Privasi</a></li>
                <li><a class="text-abu" style="text-decoration: none;" href="../footer/tentang.html">Tentang Kami</a>
                </li>
                <li><a class="text-abu" style="text-decoration: none;" href="../footer/hakCipta.html">Hak Cipta</a></li>
            </ul>
        </div>

        <div class="kontak d-flex flex-column gap-2 align-items-center text-abu" style="width: 20rem;">
            <h5 class="fw-bold">Kontak</h5>
            <div class="d-flex align-items-center gap-3">
                <img src="../img/icon 7.png" alt="" width="30">
                <span>089999999999</span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <img src="../img/whatsapp.svg" alt="" width="30">
                <span>089999999999</span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <img src="../img/whatsapp.svg" alt="" width="30">
                <span>089999999999</span>
            </div>
        </div>
    </footer>

</body>
<script>
    const logOutBtn = document.getElementById("logOutBtn")
    const login = document.getElementById("login")
    const register = document.getElementById("register")
    const username = document.getElementById("username")
    const adminL = document.getElementById("adminLeads")
    const adminP = document.getElementById("adminPage")
    const adminT = document.getElementById("adminTitle")

    if(localStorage.getItem("Username") == "admin" && localStorage.getItem("Password") == "admin") {
        adminL.style.display = "block"
        adminP.style.display = "block"
        adminT.style.display = "block"
    } else {
        adminL.style.display = "none"
        adminP.style.display = "none"
        adminT.style.display = "none"
    }

    username.style.display = "none"
    logOutBtn.style.display = "none"

    if (localStorage.getItem("Username")) {
        login.style.display = "none"
        register.style.display = "none"
        username.style.display = "block"

        username.innerText = localStorage.getItem("Username")
    } else {
        login.style.display = "block"
        register.style.display = "block"
        username.style.display = "none"
    }

    username.addEventListener('click', () => {
        logOutBtn.style.display = "block"
        setInterval(() => {
            logOutBtn.style.display = "none"
        }, 5000)
    })

    logOutBtn.addEventListener('click', () => {
        localStorage.removeItem("Username")
        localStorage.removeItem("Email")
        localStorage.removeItem("Password")
        localStorage.removeItem("Telepon")
        location.reload()
        login.style.display = "block"
        register.style.display = "block"
        logOutBtn.style.display = "none"
        username.style.display = "none"
    })
</script>

</html>