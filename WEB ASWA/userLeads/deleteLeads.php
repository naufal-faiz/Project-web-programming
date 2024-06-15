<?php
session_start();
// Cek apakah user sudah login atau belum
if(!isset($_SESSION["login"])) {
    header("Location: ../");
    exit;
}
require '../feature/function.php';

$id = $_GET["id_jual"];
$idUser = $_SESSION["id_user"];

if(deleteLeads($id) > 0) {
    header("Location: leadsPage.php?id_user=$idUser");
    exit;
    
} else {
    header("Location: leadsPage.php?id_user=$idUser");
    exit;

}