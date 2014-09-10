<style type="text/css">
.chot tr td{
	border-bottom: 1px solid #999;
	padding:5px;
	}
.chot tr td a{
	text-decoration:none;
	color:#063;
	}
.chot tr td a:hover{
	color:#00F;
	text-decoration:underline;
	}		
.dong1 {
	height: 25px;
	color:#003;
	
	background-color:#CFF;
	padding-left: 5px;
	font-size: 16px;
}
.dong2 {
	height: 25px;
	color:#003;
	
	background-color:#FFF;
	padding-left: 5px;

	font-size: 16px;
}
.daubang {
	font-size:18px;
	font-weight: bold;
	background:#066;
	color:#FFF;
}
</style>
<?php

$_SESSION['s_email'] = "1101605";

include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/tonghop.php");
include_once($_SERVER['DOCUMENT_ROOT'] . '/sharefile/configs/data.php');
$tenfile = trim($_GET['txttenfile']);
$check = $_GET['check'];

echo "<br>";
echo "<br>";
echo "<br>";




if ($tenfile=="") {
	echo "Bạn phải nhập từ để tìm kiếm";
}

else { //co session 
      $email = $_SESSION["tk_admin"];
	 
	   $tk = new tonghop();
	   $loaitk = $tk->xacdinhloaitk($email);
	   $rowloaitk = mysql_fetch_array(($loaitk));
	   if ($rowloaitk[0] == 1) { // neu la admin
			   $b = new tonghop();
			   $timtheoadmin = $b->timfileadmin($tenfile);
			   $sodongadmin = mysql_num_rows($timtheoadmin);
			   if ($sodongadmin > 0) {
				   ?>
				   <table border="0" cellspacing="0" style="border:1px solid #36C;" class="chot" width="900px" align="center" >
                       <tr align="center" class = "daubang">
                           <td colspan="7">
                           Kết Quả Tìm Kiếm
                           </td>
                       <tr>
                       <tr align="center">
                           <th width="200"> Tên file</th>
                           <th width="100"> Ngày upload</th>
                           <th width="130"> Người upload</th>		
                           <th width="150"> Loại file</th>
                           <th width="150"> Kích thước file</th>
                           <th width="70"> Lượt down</th>
                           <th width="100">Số lượt báo cáo</th>
                       </tr>
				   <?php
				   $mau = 0;
				   while($rowad = mysql_fetch_array(($timtheoadmin)))
				   {
					$mau++;
			        if($mau == 3) $mau = 1;
					   ?>
				   
					   
                           <tr style="border-bottom-color:#F00" bordercolor="#990000" align="center"  class="<?php echo 'dong'.$mau;?>" >
                               <td align="left">
                               <a href="../index.php?content=download&code=<?php echo $rowad['MA_HOA_FILE'];?>">
                               <?php echo   $rowad[1];?> </a>
                               </td>
                              
                               <td >
                                <?php echo date('d-m-Y', strtotime($rowad[2]));  ?>
                               </td>
                                <td >
                                <?php echo $rowad[3];  ?>
                               </td>		
                                <td >
                                <?php echo $rowad[4];  ?>
                               </td>
                                <td >
                                <?php 
									if ($rowad[5] > 1024*1024*1024){
									echo round(($rowad[5]/(1024*1024*1024)), 3)." GB";}
									else if ($rowad[5] > 1024*1024){
									echo round(($rowad[5]/(1024*1024)), 3)." MB";
									}
									else echo round(($rowad[5]/(1024)), 3)." KB";
								?>
                               </td>
                                <td >
                                <?php echo $rowad[6];  ?>
                               </td>
                                <td >
                                <?php 
									   $sobc = new tonghop();
	   								   $baocao = $sobc->soluotbaocao($rowad[0]);
									   $rowbc = mysql_fetch_array(($baocao));
									   echo $rowbc[0];  ?>
                               </td>
					   </tr>
					   <?php
					   }
					   ?>
					  </table> 
					  <?php
			   }
			   else echo "Không có kết quả tìm kiếm";
	   		}// neu la admin

}//co session


?>
