<?php
$conn = mysqli_connect("localhost", "root", "", "db_aswa");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// BUAT IKLAN
// Checking Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Processing data while form submited
function create($data) {
    global $conn;

    $judul = htmlspecialchars($data['judul']);
    $harga = htmlspecialchars($data['harga']);
    $lokasi = htmlspecialchars($data['lokasi']);
    $kamar_tidur = htmlspecialchars($data['kamar_tidur']);
    $kamar_mandi = htmlspecialchars($data['kamar_mandi']);
    $deskripsi = htmlspecialchars($data["deskripsi"]);

    // Memproses upload gambar
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $uploadDir = '../img/uploadan/'; // Direktori tujuan untuk menyimpan gambar
    if(!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $uploadFile = $uploadDir.basename($gambar);

    if ($_FILES['gambar']['error'] !== UPLOAD_ERR_OK) {
        echo "Terjadi kesalahan saat mengunggah gambar: " . $_FILES['gambar']['error'];
        exit;
    }
    // Memindahkan file gambar ke direktori tujuan
    if (move_uploaded_file($gambar_tmp, $uploadFile)) {
        // Menyimpan data ke tabel properti
        $sql = "INSERT INTO properti (id_properti, gambar, judul, harga, lokasi, kamar_tidur, kamar_mandi, deskripsi)
                VALUES ('', '$gambar', '$judul', '$harga', '$lokasi', '$kamar_tidur', '$kamar_mandi', '$deskripsi')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Data Berhasil Dibuat!')</script>";
            header('Location: index.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<script>alert(Terjadi kesalahan saat mengunggah gambar)</script>";
    }
}
