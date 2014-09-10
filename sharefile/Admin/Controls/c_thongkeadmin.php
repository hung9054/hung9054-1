<style type="text/css">
.wrap{
	width: 750px;
	margin:auto;	
}
.mot{
	border-right: 2px inset #F00 ;
	width: 46%;	
	float: left;
	padding-left:4%;
	margin-bottom:50px;
}
.hai{
	width: 42%;	
	float: left;
	padding-left:7%;
	margin-bottom:50px;
}

</style>
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/tonghop.php");
$ngaybd = trim($_GET['ngaybd']);
$ngaykt = trim($_GET['ngaykt']);
echo "<br>";
echo "<br>";



if (($ngaybd == "" ) && ($ngaykt == '')) {
echo "<h2 style='font-size:26; font-weight:bold;color:#603; ' align='center'>Thống Kê Hoạt Động Website</h2>";
echo "<br>";
?>

<div class = "wrap">
<div class = "mot">
<?php

			// tong so thanh vien
		   $tk = new tonghop();
		   $result = $tk->so_thanh_vien();
		   $row = mysql_fetch_array($result);
		   echo "Số thành viên: ".$row[0];
		   // Số thành viên là admin
		   echo "<br>";
		   echo "Trong đó:";
		  echo "<br>";
		   $admin = $tk->so_thanh_vien_admin();
		   $rowadmin = mysql_fetch_array($admin);
		   echo "&nbsp&nbsp&nbsp&nbsp&nbsp+ Số Admin hiện tại: ".$rowadmin[0];
		   // Số thành viên là admin
			echo "<br>";
		   echo "&nbsp&nbsp&nbsp&nbsp&nbsp+ Số thành viên: ".($row[0] -$rowadmin[0]);
		   // thanh vien vip hien tai
		   $resulttvvip = $tk->so_thanh_vien_vip();
		   $sotvvip =  mysql_num_rows($resulttvvip);
		   echo "<br>";
		   echo "Số thành viên Vip hiện tại: ".$sotvvip;
		   
		   //thanh vien chua nang cap lan nao
		   $tvthuong = $tk->thanh_vien_chua_nang_cap();
		   $sotvthuong =  mysql_fetch_array($tvthuong);
		   echo "<br>";
		   echo "Số thành viên thường (chưa bao giờ nâng cấp): ".$sotvthuong[0];		   

		   ?>
           </div>
           
           <div class = "hai">
           <?php
		   $resultgold = $tk->tong_gold_nang_cap();		  
		   $sogold = 0;
		   $sodong = mysql_num_rows($resultgold);
		   if ($sodong > 0) {
			   while ($cactvnc = mysql_fetch_array($resultgold)){
				   if ($cactvnc['SO_LAN_GIA_HAN'] == 0) {$sogold = $sogold + $cactvnc['Gold'];}
				   else {$sogold = $sogold + $cactvnc['SO_LAN_GIA_HAN']*$cactvnc['Gold'];}
				   
			   }
			   
		   }
		   echo "Tổng số gold nâng cấp: ".$sogold;		   
		   $sotm = $tk->so_thu_muc_luu_tru();
		   $rowsotm = mysql_fetch_array($sotm);
		   echo "<br>";		   
		   echo "Số thư mục được tạo: ".$rowsotm[0];		   
		   $sofile = $tk->so_file_upload();
		   $rowsofile = mysql_fetch_array($sofile);
		   echo "<br>";		   
		   echo "Số file được upload: ".$rowsofile[0];
		   
		   	$dlfile = $tk->tong_dl_file_upload();
		   $rowdlfile = mysql_fetch_array($dlfile);
		   echo "<br>";
		   if ($rowdlfile[0] > 1024*1024*1024*1024) {
			   echo "Tổng dung lượng file upload: ".round(($rowdlfile[0]/(1024*1024*1024*1024)), 3)." TB";
		   }
		   		if ($rowdlfile[0] > 1024*1024*1024){
					echo "Tổng dung lượng file upload: ".round(($rowdlfile[0]/(1024*1024*1024)), 3)." GB";}
					else if ($rowdlfile[0] > 1024*1024){
					   echo "Tổng dung lượng file upload: ".round(($rowdlfile[0]/(1024*1024)), 3)." MB";
				   }
				   	else echo "Tổng dung lượng file upload: ".round(($rowdlfile[0]/(1024)), 3)." KB";		   


?></div>
</div>
<?php
}
else {
if (strtotime($ngaybd) <= strtotime($ngaykt)){
echo "<h2 style='font-size:26; font-weight:bold;color:#603; ' align='center'>Thống Kê Hoạt Động Website từ $ngaybd đến $ngaykt</h2>";
echo "<br>";		
	?>
<div class = "wrap">
<div class = "mot">
<?php

			// tong so thanh vien
		   $tk = new tonghop();
		   $ngaybd = date('y-m-d', strtotime($ngaybd));
		   $ngaykt = date('y-m-d', strtotime($ngaykt));
		   
		   $result = $tk->so_thanh_vien_theo_ngay($ngaybd,$ngaykt);
		   $row = mysql_fetch_array($result);
		   echo "Số tài khoản đăng kí mới: ".$row[0];
		   // Số thành viên là admin
		   echo "<br>";
		   echo "Trong đó:";
		  echo "<br>";
		   $admin = $tk->so_thanh_vien_admin_theo_ngay($ngaybd,$ngaykt);
		   $rowadmin = mysql_fetch_array($admin);
		   echo "&nbsp&nbsp&nbsp&nbsp&nbsp+ Số Admin: ".$rowadmin[0];
		   // Số thành viên là admin
			echo "<br>";
		   echo "&nbsp&nbsp&nbsp&nbsp&nbsp+ Số thành viên: ".($row[0] -$rowadmin[0]);
		   // thanh vien vip hien tai
		   $resulttvvip = $tk->so_thanh_vien_vip_theo_ngay($ngaybd,$ngaykt);
		   $sotvvip =  mysql_num_rows($resulttvvip);
		   echo "<br>";
		   echo "Số thành viên Vip: ".$sotvvip;
		   
		   //thanh vien chua nang cap lan nao

		   ?>
           </div>
           
           <div class = "hai">
           <?php
		   $resultgold = $tk->tong_gold_nang_cap_theo_ngay($ngaybd,$ngaykt);		  
		   $sogold = 0;
		   $sodong = mysql_num_rows($resultgold);
		   if ($sodong > 0) {
			   while ($cactvnc = mysql_fetch_array($resultgold)){
				   if ($cactvnc['SO_LAN_GIA_HAN'] == 0) {$sogold = $sogold + $cactvnc['Gold'];}
				   else {$sogold = $sogold + $cactvnc['SO_LAN_GIA_HAN']*$cactvnc['Gold'];}
				   
			   }
			   
		   }
		   echo "Tổng số gold nâng cấp: ".$sogold;		   
		   $sotm = $tk->so_thu_muc_luu_tru_theo_ngay($ngaybd,$ngaykt);
		   $rowsotm = mysql_fetch_array($sotm);
		   echo "<br>";		   
		   echo "Số thư mục được tạo: ".$rowsotm[0];		   
		   $sofile = $tk->so_file_upload_theo_ngay($ngaybd,$ngaykt);
		   $rowsofile = mysql_fetch_array($sofile);
		   echo "<br>";		   
		   echo "Số file được upload: ".$rowsofile[0];
		   
		   $dlfile = $tk->tong_dl_file_upload_theo_ngay($ngaybd,$ngaykt);
		   $rowdlfile = mysql_fetch_array($dlfile);
		   echo "<br>";
		   if ($rowdlfile[0] > 1024*1024*1024*1024) {
			   echo "Tổng dung lượng file upload: ".round(($rowdlfile[0]/(1024*1024*1024*1024)), 3)." TB";
		   }
		   		if ($rowdlfile[0] > 1024*1024*1024){
					echo "Tổng dung lượng file upload: ".round(($rowdlfile[0]/(1024*1024*1024)), 3)." GB";}
					else if ($rowdlfile[0] > 1024*1024){
					   echo "Tổng dung lượng file upload: ".round(($rowdlfile[0]/(1024*1024)), 3)." MB";
				   }
				   	else echo "Tổng dung lượng file upload: ".round(($rowdlfile[0]/(1024)), 3)." KB";		   


?></div>
</div>
<?php
}

else {
	echo "Ngày bắt đầu không được lớn hơn ngày kết thúc";

}
}
?>