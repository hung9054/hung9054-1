<style type="text/css">
.chot tr td{
	border-bottom: 1px solid #999;
	padding:5px;
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
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/tonghop.php");
$ten = trim($_GET['txtten']);
echo "<br>";
echo "<br>";

if ($ten=="") {
	echo "Bạn phải nhập từ để tìm kiếm";
}
else {
		   $nd = new tonghop();
		   $result = $nd->timtheoemail($ten);
		   $sodong1 = mysql_num_rows($result);
		   if ($sodong1 > 0) {
			   ?>
			   <table border="0" cellspacing="0" style="border:1px solid #36C;" class="chot" width="1000px" align="center" >
			   <tr align="center" class="daubang">
			   <td colspan="8">
			   Kết Quả Tìm Kiếm
			   </td>
			   <tr>
			   <tr align="center">
			   <th width="50"> Mã số</th>
			   <th width="200" align="left" > Email</th>
	
			   <th width="200" align="left"> Tên người dùng</th>
			   <th width="100"> Loại TK</th>
			   <th width="100"> Gói đang sd</th>           
			   <th width="100"> SĐT</th>
			   <th width="150" align="left"> Địa chỉ</th>
               <th width="100"> Tài khoản</th>
			   </tr>
			   <?php
	        	$mau = 0;	
			   while($row = mysql_fetch_array(($result)))
			   {
		     	$mau++;
			 	if($mau == 3) $mau = 1;				   
				   ?>
			   
				   
				   <tr style="border-bottom-color:#F00" bordercolor="#990000" align="center" class="<?php echo "dong".$mau;?>" >
				   <td >
	
				   <?php echo $row[0];  ?>
				   </td>
	
				   <td align="left">
					<?php echo $row[1];  ?>
				   </td>
					<td align="left">
					<?php echo $row[2];  ?>
				   </td>
					<td >
					<?php echo $row[3];  ?>
				   </td>
					<td >
					<?php 
					
						 $g = new tonghop();
						$goi = $g->ktgoidangsd($row[1]);
						$dem = mysql_num_rows($goi);
						if ($dem > 0){
						$rowgoi = mysql_fetch_array(($goi));
						echo $rowgoi[0];
						}
						else echo 'G1';	
					
					 ?>
				   </td>
					<td >
					<?php echo $row[4];  ?>
				   </td>
					<td  align="left">
					<?php echo $row[5];  ?>
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
			else { // tìm theo tên
				$tennd = new tonghop();
				   $result2 = $tennd->timtheoten($ten);
				   $sodong2 = mysql_num_rows($result2);
				   if ($sodong2 > 0) {
					   ?>
					   <table border="0" cellspacing="0" style="border:1px solid #36C;" class="chot" width="1000px" align="center" >
                             <tr align="center">
                                   <td colspan="8" class ="daubang">
                                   Kết Quả Tìm Kiếm
                                   </td>
                               </tr>
                               <tr align="center">
                                   <th width="50"> Mã số</th>
                                   <th width="200" align="left" > Email</th>
                        
                                   <th width="200" align="left"> Tên người dùng</th>
                                   <th width="100"> Loại TK</th>
                                   <th width="100"> Gói đang sd</th>           
                                   <th width="100"> SĐT</th>
                                   <th width="150" align="left"> Địa chỉ</th>
                                   <th width="100"> Tài khoản</th>
                          	 </tr>
					   <?php
				        $mau = 0;
					   while($rowten = mysql_fetch_array(($result2)))
					   {
						$mau++;
			            if($mau == 3) $mau = 1;  
						   ?>
					   
						   
                               <tr style="border-bottom-color:#F00" bordercolor="#990000" align="center" class="<?php echo "dong".$mau;?>"  >
                                   <td >
                    
                                   <?php echo $rowten[0];  ?>
                                   </td>
                    
                                   <td align="left">
                                    <?php echo $rowten[1];  ?>
                                   </td>
                                    <td align="left">
                                    <?php echo $rowten[2];  ?>
                                   </td>
                                    <td >
                                    <?php echo $rowten[3];  ?>
                                   </td>
                                    <td >
                                    <?php                                 
                                         $g2 = new tonghop();
                                        $goi2 = $g2->ktgoidangsd($rowten[1]);
                                        $dem2 = mysql_num_rows($goi2);
                                        if ($dem2 > 0){
                                        $rowgoi2 = mysql_fetch_array(($goi2));
                                        echo $rowgoi2[0];
                                        }
                                        else echo 'G1';	
                                    
                                     ?>
                                   </td>
                                    <td >
                                    <?php echo $rowten[4];  ?>
                                   </td>
                                    <td  align="left">
                                    <?php echo $rowten[5];  ?>
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
	
			}// tìm theo tên
} // có nhập gt tìm kiếm
?>