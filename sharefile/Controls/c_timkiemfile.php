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
ob_start();


include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/tonghop.php");
include_once($_SERVER['DOCUMENT_ROOT'] . '/sharefile/configs/data.php');
$tenfile = trim($_GET['txttenfile']);
$check = $_GET['check'];
$_SESSION['s_email'] = "1101605";
echo "<br>";
echo "<br>";
echo "<br>";




if ($tenfile=="") {
	echo "Bạn phải nhập từ để tìm kiếm";
}
else
	if (!(isset($_SESSION['s_email']))){
	   $a = new tonghop();
	   $result = $a->timchung($tenfile);
	   $sodong = mysql_num_rows($result);
	   if ($sodong > 0) {
		   ?>
		   <table border="0" cellspacing="0" style="border:1px solid #36C;" class="chot" width="760px" align="center" >
               <tr align="center" class = "daubang">
                   <td colspan="6">
                   Kết Quả Tìm Kiếm
                   </td>
               </tr>
               <tr align="center" >
                   <th width="200"> Tên file</th>
                   <th width="100"> Ngày upload</th>
        
                   <th width="150"> Loại file</th>
                   <th width="150"> Kích thước file</th>
                   <th width="100"> Lượt down</th>
               </tr>
           <?php
	        $mau = 0;
		   while($row = mysql_fetch_array(($result)))

		   {		   
		     $mau++;
			 if($mau == 3) $mau = 1;
			   ?>
		
			   
                   <tr style="border-bottom-color:#F00" bordercolor="#990000" align="center" class="<?php echo "dong".$mau;?>"  >
                       <td align="left">
                       <a href='index.php?content=download&code=<?php echo $row[8];?>'>
                       <?php echo $row[1];  ?></a>
                       </td>
                       <td >
                        <?php echo date('d-m-Y', strtotime($row[2]));  ?>
                       </td>
        
                        <td >
                        <?php echo $row[4];  ?>
                       </td>
                        <td >
                        <?php				   
                        if ($row[5] > 1024*1024*1024){
					   echo round(($row[5]/(1024*1024*1024)), 3)." GB";}
					else if ($row[5] > 1024*1024){
					   echo round(($row[5]/(1024*1024)), 3)." MB";
				   }
				   else echo round(($row[5]/(1024)), 3)." KB";
                        ?>
                       
                       </td>
                        <td >
                        <?php echo $row[6];  ?>
                       </td>
                       
                   </tr>
                   
			   <?php
			   }
			   ?>
			  </table> 
              <?php
	   }
	   else echo "Không có kết quả tìm kiếm";
    }//end if ko co session
else { //co session 
      $email = $_SESSION['s_email'];
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
				   
					   
                           <tr style="border-bottom-color:#F00" bordercolor="#990000" align="center"  class="<?php echo "dong".$mau;?>" >
                               <td align="left">
                               <a href='index.php?content=download&code=<?php echo $row['MA_HOA_FILE'];?>'>
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
	   else { // neu la thanh vien
		   if ($check == 'false') {//ko check
				   $c = new tonghop();
				   $result = $c->timfilethanhvienkocheck($email,$tenfile);
				   $sodong = mysql_num_rows($result);
				   if ($sodong > 0) {
					   ?>
					   <table border="0" cellspacing="0" style="border:1px solid #36C;" class="chot" width="700px" align="center" >
                          <tr align="center" class = "daubang">
                                   <td colspan="6">
                                   Kết Quả Tìm Kiếm
                                   </td>
                            <tr>
                           <tr align="center">
                               <th width="200"> Tên file</th>
                               <th width="100"> Ngày upload</th>
                               <th width="150"> Loại file</th>
                               <th width="150"> Kích thước file</th>
                               <th width="100"> Lượt down</th>
                           
                           </tr>
					   <?php
					   	$mau = 0;
					   while($row = mysql_fetch_array(($result)))
					   {
						$mau++;
			            if($mau == 3) $mau = 1;
						   ?>
					   
						   
                               <tr style="border-bottom-color:#F00" bordercolor="#990000" align="center" class="<?php echo "dong".$mau;?>"  >
                                       <td align="left">
                               			<a href='index.php?content=download&code=<?php echo $row['MA_HOA_FILE'];?>'>
                                       <?php echo $row[1];  ?>                                       </a>
                                       </td>

                                       <td >
                                        <?php echo date('d-m-Y', strtotime($row[2]));  ?>
                                       </td>
                        
                                        <td >
                                        <?php echo $row['ten_loai_file'];  ?>
                                       </td>
                                        <td >
                                        <?php 
											if ($row['kich_thuoc_file'] > 1024*1024*1024){
											echo round(($row['kich_thuoc_file']/(1024*1024*1024)), 3)." GB";}
											else if ($row['kich_thuoc_file'] > 1024*1024){
											echo round(($row['kich_thuoc_file']/(1024*1024)), 3)." MB";
											}
											else echo round(($row['kich_thuoc_file']/(1024)), 3)." KB";
										?>
                                       </td>
                                        <td >
                                        <?php echo $row['SO_LUOT_DOWN'];  ?>
                                       </td>

                               </tr>
						   <?php
						   }
						   ?>
						  </table> 
						  <?php
				   }
				   else echo "Không có kết quả tìm kiếm";
		   		}//ko check
		   
		   else  {//co check
		   
		   
		   		   $d = new tonghop();
				   $timfiletv = $d->timfilethanhvien($email,$tenfile);
				   $sodongfiletv = mysql_num_rows($timfiletv);
				   if ($sodongfiletv > 0) {
					   ?>
					   <table border="0" cellspacing="0" style="border:1px solid #36C;" class="chot" width="780px" align="center" >
                           <tr align="center" class = "daubang">
                               <td colspan="6">
                               Kết Quả Tìm Kiếm
                               </td>
                            <tr>
                           <tr align="center">
                               <th width="200"> Tên file</th>
                               <th width="100"> Ngày upload</th>
                               <th width="100"> Thư mục</th>			
                               <th width="150"> Loại file</th>
                               <th width="150"> Kích thước file</th>
                               <th width="80"> Lượt down</th>
                           </tr>
					   <?php
					   $mau = 0;
					   while($rowtv = mysql_fetch_array(($timfiletv)))
					   {
						$mau++;
			            if($mau == 3) $mau = 1;   
						   ?>
					   
                               
                               <tr style="border-bottom-color:#F00" bordercolor="#990000" align="center" class="<?php echo "dong".$mau;?>" >
                                       <td align="left">
                               			<a href='index.php?content=download&code=<?php echo $rowtv['MA_HOA_FILE'];?>'>
                                       <?php echo $rowtv[1];  ?>                                       </a>
                                       </td>
                                      
                                       <td >
                                       <?php echo date('d-m-Y', strtotime($rowtv[2]));
   										?>
                                       </td>
                                       <td >
                                        <?php
                                        if ($rowtv[3] != $email) 
                                         echo $rowtv[3]; 
                                         else  echo 'Thư mục gốc';
                                          ?>
                                       </td>			
                                        <td >
                                        <?php echo $rowtv[4];  ?>
                                       </td>
                                        <td >
                                        <?php
											if ($rowtv[5] > 1024*1024*1024){
											echo round(($rowtv[5]/(1024*1024*1024)), 3)." GB";}
											else if ($rowtv[5] > 1024*1024){
											echo round(($rowtv[5]/(1024*1024)), 3)." MB";
											}
											else echo round(($rowtv[5]/(1024)), 3)." KB";										
										?>
                                       </td>
                                        <td >
                                        <?php echo $rowtv[6];  ?>
                                       </td>
                               </tr>
						   <?php
						   }
						   ?>
						  </table> 
						  <?php
				   }
				   else echo "Không có kết quả tìm kiếm";
				  }//co check
	   } // neu la thanh vien
}//co session


?>
