<?php
session_start();
// Cek apakah user sudah login atau belum
if($_SESSION["username"] !== "Aswa Administrator") {
    header("Location: ../");
    exit;
}