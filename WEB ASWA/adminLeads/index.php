<?php
session_start();
// Cek apakah user sudah login atau belum
if($_SESSION["login"] !== "admin") {
    header("Location: ../Landing Page/index.php");
    exit;
}