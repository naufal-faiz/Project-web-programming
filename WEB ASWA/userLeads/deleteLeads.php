<?php
session_start();
// Cek apakah user sudah login atau belum
if(!isset($_SESSION["login"])) {
    header("Location: ../Landing Page/index.php");
    exit;
}
require '../feature/function.php';

$id = $_GET["id_jual"];

if(deleteLeads($id) > 0) {
    header('Location: leadsPage.php');
    exit;
    
} else {
    header('Location: leadsPage.php');
    exit;

}