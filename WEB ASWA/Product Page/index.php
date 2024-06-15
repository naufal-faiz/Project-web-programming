<?php
session_start();
// Cek apakah user sudah login atau belum
header("Location: halamanUtama.php");
exit;
