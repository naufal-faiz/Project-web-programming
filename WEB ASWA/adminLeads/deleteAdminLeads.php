<?php
session_start();
// Cek apakah user sudah login atau belum
if($_SESSION["login"] !== "admin") {
    header("Location: ../");
    exit;
}
require '../function.php';

$id = $_GET["id_properti"];

if(deleteAdminLeads($id) > 0) {
    header('Location: adminLeadsPage.php');
    exit;
    
} else {
    header('Location: adminLeadsPage.php');
    exit;

}