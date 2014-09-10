<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/file.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/loai_file.php");
                            function findexts ($filename) 
							 { 
							 $filename = strtolower($filename) ; 
							 $exts = explode('.', $filename) ; 
							 $n = count($exts)-1; 
							 $exts = $exts[$n]; 
							 return $exts; 
							 } 
$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; 
$matm = $_POST["mathumuc"];
        $a = new File();
		$res = $a->maxfile();
		$num = 0;
		$mahoa = "sharefile";
		while($row = mysql_fetch_array($res)){
			$num = $row[0]+1;
			}
		$mahoa = "sharefile".$num;
		$mahoafile = md5($mahoa);
		$resu = $a->CURDATE();
		while($roww = mysql_fetch_array($resu)){
		$a->setNGAY_TAO($roww[0]);
				}
		$b = new loai_file();			
		$ress = $b->tiemkiemduoi(findexts($fileName));
		$loai = "1";
		while($row = mysql_fetch_array($ress)){
			$loai = $row[0];
			}			
		$a->setMA_FILE($num);
		$a->setKICH_THUOC_FILE($fileSize);
		$a->setMA_HOA_FILE($mahoafile);
		$a->setMA_LOAI_CHIA_SE("ml02");
		$a->setMA_LOAI_FILE($loai);
		$a->setMA_THU_MUC($matm);
		$a->setMAT_KHAU_CS_FILE("");
		$a->setSO_LUOT_DOWN("0");
		$a->setTEN_FILE($fileName);
		$a->setTRANG_THAI("active");
		$a->themfile();
		

// 0 for false... and 1 for true
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
if(move_uploaded_file($fileTmpLoc, "file/$num.".findexts($fileName))){
    echo "complete";
} else {
    echo "move_uploaded_file function failed";
}
?>