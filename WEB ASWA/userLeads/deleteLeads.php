<?php
require '../feature/function.php';

$id = $_GET["id_jual"];

if(deleteLeads($id) > 0) {
    header('Location: leadsPage.php');
    exit;
    
} else {
    header('Location: leadsPage.php');
    exit;

}