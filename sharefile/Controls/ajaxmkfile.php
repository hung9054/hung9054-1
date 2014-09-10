<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/file.php"); 
$mafile  = $_GET["code"];
$mk = $_GET["text"];
$a = new File();
$a->setMA_FILE($mafile );
$a->setMAT_KHAU_CS_FILE($mk);
$a->suafile_mk();
?>