<?php
require '../feature/function.php';

$id = $_GET["id_properti"];

if(deleteAdminLeads($id) > 0) {
    header('Location: adminLeadsPage.php');
    exit;
    
} else {
    header('Location: adminLeadsPage.php');
    exit;

}