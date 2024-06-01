<?php
$conn = mysqli_connect("localhost", "root", "", "db_aswa");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// BUAT IKLAN
// Checking Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function create($data)
{
    global $conn;

    $judul = htmlspecialchars($data['judul']);
    $telepon = htmlspecialchars($data['no_telepon']);
    $harga = htmlspecialchars($data['harga']);
    $lokasi = htmlspecialchars($data['lokasi']);
    $kategori = htmlspecialchars($data['id_kategori']);
    $kamar_tidur = htmlspecialchars($data['kamar_tidur']);
    $kamar_mandi = htmlspecialchars($data['kamar_mandi']);
    $deskripsi = htmlspecialchars($data["deskripsi"]);

    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $uploadDir = '../img/uploadan/'; // Direktori tujuan untuk menyimpan gambar
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $uploadFile = $uploadDir . basename($gambar);

    if ($_FILES['gambar']['error'] !== UPLOAD_ERR_OK) {
        echo "Terjadi kesalahan saat mengunggah gambar: " . $_FILES['gambar']['error'];
        exit;
    }
    if (move_uploaded_file($gambar_tmp, $uploadFile)) {
        $sql = "INSERT INTO properti_jual (id_jual, id_kategori, judul, no_telepon, harga, lokasi, kamar_tidur, kamar_mandi, gambar, deskripsi)
                VALUES ('', '$kategori', '$judul', '$telepon', '$harga', '$lokasi', '$kamar_tidur', '$kamar_mandi', '$gambar', '$deskripsi')";

        mysqli_query($conn, $sql);
        return mysqli_affected_rows($conn);
    }
    ;
}
;

function createAdmin($data)
{
    global $conn;

    $judul = htmlspecialchars($data['judul']);
    $harga = htmlspecialchars($data['harga']);
    $lokasi = htmlspecialchars($data['lokasi']);
    $kategori = htmlspecialchars($data['id_kategori']);
    $kamar_tidur = htmlspecialchars($data['kamar_tidur']);
    $kamar_mandi = htmlspecialchars($data['kamar_mandi']);
    $deskripsi = htmlspecialchars($data["deskripsi"]);

    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $uploadDir = '../img/uploadan/'; // Direktori tujuan untuk menyimpan gambar
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $uploadFile = $uploadDir . basename($gambar);

    if ($_FILES['gambar']['error'] !== UPLOAD_ERR_OK) {
        echo "Terjadi kesalahan saat mengunggah gambar: " . $_FILES['gambar']['error'];
        exit;
    }
    if (move_uploaded_file($gambar_tmp, $uploadFile)) {
        $sql = "INSERT INTO properti (id_properti, id_kategori, judul, harga, lokasi, kamar_tidur, kamar_mandi, gambar, deskripsi)
                VALUES ('', '$kategori', '$judul', '$harga', '$lokasi', '$kamar_tidur', '$kamar_mandi', '$gambar', '$deskripsi')";

        mysqli_query($conn, $sql);
        return mysqli_affected_rows($conn);
    }
    ;
}
;
// EDIT
function edit($datas)
{
    global $conn;
    $id = $datas["id_jual"];
    $judul = htmlspecialchars($datas['judul']);
    $telepon = htmlspecialchars($datas['no_telepon']);
    $harga = htmlspecialchars($datas['harga']);
    $lokasi = htmlspecialchars($datas['lokasi']);
    $kategori = htmlspecialchars($datas['id_kategori']);
    $kamar_tidur = htmlspecialchars($datas['kamar_tidur']);
    $kamar_mandi = htmlspecialchars($datas['kamar_mandi']);
    $deskripsi = htmlspecialchars($datas["deskripsi"]);

    $update = "UPDATE properti_jual SET id_kategori = '$kategori', judul = '$judul', no_telepon = '$telepon', harga = '$harga', lokasi = '$lokasi', kamar_tidur = '$kamar_tidur', kamar_mandi = '$kamar_mandi', deskripsi = '$deskripsi' WHERE id_jual = '$id' ";
    mysqli_query($conn, $update);
    return mysqli_affected_rows($conn);
}
function editAdmin($datas)
{
    global $conn;
    $id = $datas["id_properti"];
    $judul = htmlspecialchars($datas['judul']);
    $harga = htmlspecialchars($datas['harga']);
    $lokasi = htmlspecialchars($datas['lokasi']);
    $kategori = htmlspecialchars($datas['id_kategori']);
    $kamar_tidur = htmlspecialchars($datas['kamar_tidur']);
    $kamar_mandi = htmlspecialchars($datas['kamar_mandi']);
    $deskripsi = htmlspecialchars($datas["deskripsi"]);

    $update = "UPDATE properti SET id_kategori = '$kategori', judul = '$judul', harga = '$harga', lokasi = '$lokasi', kamar_tidur = '$kamar_tidur', kamar_mandi = '$kamar_mandi', deskripsi = '$deskripsi' WHERE id_properti = '$id' ";
    mysqli_query($conn, $update);
    return mysqli_affected_rows($conn);
}

// DELETE
function deleteLeads($id)
{
    global $conn;
    $sql = "SELECT gambar FROM properti_jual WHERE id_jual = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $image_filename = $row['gambar'];
    $upload_dir = '../img/uploadan/';
    $image_path = $upload_dir . $image_filename;
    if (file_exists($image_path)) {
        unlink($image_path);
    }

    $sql = "DELETE FROM properti_jual WHERE id_jual = '$id'";
    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}
function deleteAdminLeads($id)
{
    global $conn;
    $sql = "SELECT gambar FROM properti WHERE id_properti = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $image_filename = $row['gambar'];
    $upload_dir = '../img/uploadan/';
    $image_path = $upload_dir . $image_filename;
    if (file_exists($image_path)) {
        unlink($image_path);
    }

    $sql = "DELETE FROM properti WHERE id_properti = '$id'";
    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

