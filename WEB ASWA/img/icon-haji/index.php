<?php
session_start();
// Cek apakah user sudah login atau belum
if(!isset($_SESSION["login"])) {
    header("Location: ../Landing Page/index.php");
    exit;
}