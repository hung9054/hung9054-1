<?php 
   if(isset($_SESSION["s_email"])){
	   echo "<script> location.href='index.php'; </script>";
	   }
	   else{
   include ("View/danhki.php");  
   include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/thongtinnguoidung.php");  
   include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/thumuc.php");
   include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/chi_tiet_nang_cap.php");
   if(isset($_POST["sbdk"])){
	   $hoten = $_POST["txtten"];
	   $email = $_POST["txttdt"];
	   $matkhau = $_POST["txtmk"];
	   $sdt = $_POST["txtsdt"];
	   $taikhan = new taikhoan();
	   $taikhan->setEMAIL_TK($email);
	   $taikhan->setMAT_KHAU($matkhau);
	   $taikhan->setMA_LOAI_TK("2");
	   if($taikhan->kiemtraemail()){
		    echo "<script> alert ('Tài khoản đã tồn tại !'); </script>";
		   }
	   else {
		     if($taikhan->themtaikhoan()){
				 $thongtin 	 = new thongtinnguoidung();
				 $thongtin->setEMAIL_TK($email);
				 $thongtin->setallMA_NGUOI_DUNG();
				 $result = $thongtin->maxnguoidung();
				 $ma =0;
				 while($row = mysql_fetch_array($result)){
					 $ma = $row[0] + 1;
					 }	
				$thongtin->setMA_NGUOI_DUNG($ma);
				$thongtin->setTEN_NGUOI_DUNG($hoten);
				$thongtin->setSDT($sdt);	
				 if($thongtin->themthongtinnguoidung()){
					 $thumuc = new thumuc();
					 $thumuc->setallTHU_MUC();
					  $thumuc->setTEN_THU_MUC($email);
					  $thumuc->setEMAIL_TK($email);
					 $result1 = $thumuc->maxthumuc();
					  $ma1 =0;
				 while($rows = mysql_fetch_array($result1)){
					 $ma1 = $rows[0] + 1;
					 }	
					  $thumuc->setMA_THU_MUC($ma1);
					 $result2 = $thumuc->CURDATE();
					  $ma2 ="";
					  while($rows1 = mysql_fetch_array($result2)){
					 $ma2 = $rows1[0] ;
					 }	
					 $thumuc->setNGAY_TAO_TH($ma2);
					  if($thumuc->themthumuc()){
						   $ngaycn = "0000-00-00";
							
							$ngayhh = ""	;
							$b = new  chi_tiet_nang_cap();
							$ree = $b->CURDATE();
							while($row2 = mysql_fetch_array($ree)){
								$ngaycn = $row2[0];
								}
						
							
						   echo "<script> alert ('Cám ơn bạn đã đăng kí thành viên !'); </script>";
						   echo "<script> location.href='index.php?content=dangnhapcontrol'; </script>";
						  
						  }
						   else echo "<script> alert ('Đã có lổi xảy ra ! \n vui lòng thư lại sau'); 			                                      </script>"; 
					  
					 }
				 else 	  echo "<script> alert ('Đã có lổi xảy ra ! \n vui lòng thư lại sau'); </script>"; 		
				  }
		   }	   
	   }
	 
	   }
?>