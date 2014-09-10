<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/file.php"); 
$mafile  = $_GET["code"];
$a = new File();
$a->setMA_FILE($mafile );
$a->setMA_LOAI_CHIA_SE("ml02");
$a->suafile_chiase();
?>