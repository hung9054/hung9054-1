<?php 
 function findexts ($filename) 
			{ 
		        $filename = strtolower($filename) ; 
				$exts = explode('.', $filename) ; 
				$n = count($exts)-1; 
				$exts = $exts[$n]; 
				 return $exts; 
			 } 		
if(isset($_SESSION["s_email"])){
	   echo "<script> location.href='index.php'; </script>";
	   }
	   else{
include ("View/dangnhap.php"); 
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/taikhoan.php"); 
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/chi_tiet_nang_cap.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/tonghop.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/file.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/chi_tiet_bc_vp.php");
if(isset($_POST["sbdn"])){
	   $email = $_POST["txtname"];
	   $matkhau = $_POST["txtmk"];
	   $taikhoan = new taikhoan();
	   $taikhoan->setEMAIL_TK($email);
	   $taikhoan->setMAT_KHAU($matkhau);
	   $taikhoan->setMA_LOAI_TK("2");
	   if($taikhoan->kiemtra()){
		   $_SESSION["s_email"]=$email;
			$_SESSION["goisd"] = "G1";	
			        $g = new tonghop();
					$dldl = 0;
					$ree= $g->goidangsdht($_SESSION["s_email"]);
					while($row = mysql_fetch_array($ree)){
						$dldl= $row[0];
						}
					$re = $g  ->dungluonggoidangsd($email,$dldl);
					while($row = mysql_fetch_array($re)){
						if($row[2]!="")
						$_SESSION["goisd"] = $row[2];
	                  }
					  $dl3g = 3*1024*1024*1024;
			if($_SESSION["goisd"] == "G1"){
				$xoafile = new File();
				$tf = 0;
				$resum = $xoafile->allsumemail($email);
				while($rowx=mysql_fetch_array($resum)){
					$tf=$tf+$rowx[0];
					
					}
					if($tf > $dl3g){
						$tam =0;
						$rowxoa = $xoafile->allemail($email);
						while($rowx=mysql_fetch_array($rowxoa)){
							$tam=$tam+$rowx[1];
							echo $tam."<br/>";
							if($tam > $dl3g){
								echo $rowx[0];
								$type = findexts($rowx[2]);
								 $a = new File();
								$a->setMA_FILE($rowx[0]);
								if($a->xoafile()){
									if (file_exists("file/".$rowx[0].".".$type)){
									  unlink("file/".$rowx[0].".".$type);
									}
								$b = new chi_tiet_bc_vp();
								$b->xoachi_tiet_bc_vp($rowx[0]);
							
							}
								}
								
							
							
						}
				
					}
			
				}	
				 echo "<script> location.href='index.php'; </script>";	
		  
	    }
		else{  echo "<script> alert ('Tài khoản không tồn tại'); </script>"; }
}
	   }
?>