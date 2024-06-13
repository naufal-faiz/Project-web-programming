<?php

// DATABASE CONNECTION
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

    $gambar = uploadFile();
    if (!$gambar) {
        return false;
    }

    $sql = "INSERT INTO properti_jual (id_jual, id_kategori, judul, no_telepon, harga, lokasi, kamar_tidur, kamar_mandi, gambar, deskripsi)
                VALUES ('', '$kategori', '$judul', '$telepon', '$harga', '$lokasi', '$kamar_tidur', '$kamar_mandi', '$gambar', '$deskripsi')";
    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}
;

function uploadFile()
{
    global $conn;

    $fileName = $_FILES['gambar']['name'];
    $fileTmpName = $_FILES['gambar']['tmp_name'];
    $fileSize = $_FILES['gambar']['size'];
    $fileError = $_FILES['gambar']['error'];

    if ($fileError === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    $fileExtensionValid = ['jpg', 'jpeg', 'png'];
    $fileExtension = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExtension));

    if (!in_array($fileExtension, $fileExtensionValid)) {
        echo "<script>
                alert('File yang diupload bukan gambar!');
            </script>";
        return false;
    }

    if ($fileSize > 3720000) {
        echo "<script>
                alert('Ukuran file terlalu besar!');
            </script>";
        return false;
    }

    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $fileExtension;
    move_uploaded_file($fileTmpName, '../uploadan/' . $newFileName);
    return $newFileName;
}

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

    $gambar = uploadFile();
    if (!$gambar) {
        return false;
    }
    $sql = "INSERT INTO properti (id_properti, id_kategori, judul, harga, lokasi, kamar_tidur, kamar_mandi, gambar, deskripsi)
                VALUES ('', '$kategori', '$judul', '$harga', '$lokasi', '$kamar_tidur', '$kamar_mandi', '$gambar', '$deskripsi')";

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
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
    $gambarLama = htmlspecialchars($datas["gambarLama"]);
    
    $gambar = htmlspecialchars($datas["gambar"]);
    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadFile();
    }


    $update = "UPDATE properti_jual SET id_kategori = '$kategori', judul = '$judul', no_telepon = '$telepon', harga = '$harga', lokasi = '$lokasi', kamar_tidur = '$kamar_tidur', kamar_mandi = '$kamar_mandi', gambar = '$gambar', deskripsi = '$deskripsi' WHERE id_jual = '$id' ";
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
    $gambarLama = htmlspecialchars($datas["gambarLama"]);
    
    $gambar = htmlspecialchars($datas["gambar"]);
    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadFile();
    }


    $update = "UPDATE properti SET id_kategori = '$kategori', judul = '$judul', harga = '$harga', lokasi = '$lokasi', kamar_tidur = '$kamar_tidur', kamar_mandi = '$kamar_mandi', gambar = '$gambar', deskripsi = '$deskripsi' WHERE id_properti = '$id' ";
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

// REGISTER
function register($user) {
    global $conn;

    $username = stripcslashes($user["username"]);
    $email = mysqli_escape_string($conn, trim($user["email"]));
    $telepon = mysqli_escape_string($conn, trim($user["no_telepon"]));
    $password = password_hash($user["password"], PASSWORD_DEFAULT);


    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar!');
            </script>";
        return false;
    }

    if(empty($username) || empty($email) || empty($telepon) || empty($password)) {
        echo "<script>
                alert('Tolong lengkapi data anda!');
            </script>";
        return false;
    }

    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$email', '$password', '$telepon')");

    return mysqli_affected_rows($conn);
}
