<?php 
 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/loai_goi.php");
	 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/thongtinnguoidung.php");
	 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/chi_tiet_nang_cap.php");
	 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/tonghop.php");
	 $tb ="";
	if(isset($_POST["sbnangcap"])){
		$a = new loai_goi();
	    $currentgold = $_POST["ingold"];
		$sogold = $_POST["numgold"];
		$sub = $currentgold -$sogold;
		$magoi ="";
		$songay = "";
		
		$ree = $a->loai_goi_gold($sogold);
		while($rows = mysql_fetch_array($ree)){
			$songay = $rows[7];
			$magoi = $rows[0];
			}
		$goldgoi=0;	
		$rr = $a->fetchloai_goi($_SESSION["goisd"]);
		while($rows = mysql_fetch_array($rr)){
			$goldgoi= $rows[9];
			}	
		$ngaycn = "0000-00-00";
		$ree = $a->CURDATE();
		while($row2 = mysql_fetch_array($ree)){
			$ngaycn = $row2[0];
			}
		$ngayhh = "0000-00-00"	;
		$b = new  chi_tiet_nang_cap();
		$re = $b->addCURDATE($songay);
		while($row = mysql_fetch_array($re)){
			$ngayhh = $row[0];
		}
		if($_SESSION["goisd"]=="G1"){
			 $ct = new chi_tiet_nang_cap();
			 $ct->setMA_LOAI_TV($magoi);
			 $ct->setEMAIL_TK($_SESSION["s_email"]);
			 $ct->setNGAY_NANG_CAP($ngaycn);
			 $ct->setNGAY_KET_THUC($ngayhh);
			 $ct->setSO_LAN_GIA_HAN("0");
			 if($ct->themchi_tiet_nang_cap()){
			 $tt = new thongtinnguoidung();
			 $tt->setEMAIL_TK($_SESSION["s_email"]);
			 $tt->setTIEN_TRONG_TK($sub);
			 if($tt->suatien()){
			 $_SESSION["goisd"]=$magoi;
					 echo "<script> location.href='index.php'; </script>";
					 }
					 else
					 echo "eo";	 
				 }
				 else
					 echo "eo";
				}
		 else {
			  if($sogold>$goldgoi){
				    
				   $ct = new chi_tiet_nang_cap();
					 $ct->setMA_LOAI_TV($magoi);
					 $ct->setEMAIL_TK($_SESSION["s_email"]);
					 $ct->setNGAY_NANG_CAP($ngaycn);
					 $ct->setNGAY_KET_THUC($ngayhh);
					 $ct->setSO_LAN_GIA_HAN("0");
					 if($ct->themchi_tiet_nang_cap()){
					 $tt = new thongtinnguoidung();
					 $tt->setEMAIL_TK($_SESSION["s_email"]);
					 $tt->setTIEN_TRONG_TK($sub);
					 if($tt->suatien()){
									 $_SESSION["goisd"]=$magoi;
									  echo "<script> location.href='index.php'; </script>";
					                   }
					 }
				  }
			 else if($sogold==$goldgoi) {
				 $g = new tonghop();
				 $dddd = "0000-00-00";
				 $dldl = 0;
					$ree= $g->goidangsdht($_SESSION["s_email"]);
					while($rowt = mysql_fetch_array($ree)){
						$dldl= $rowt[0];
						}
					$re = $g  ->dungluonggoidangsd($_SESSION["s_email"], $dldl);
					while($row = mysql_fetch_array($re)){
						$dddd =$row[1];
						}
			
					$daygiahan ="";
					$b = new  chi_tiet_nang_cap();
					$re = $b->addDATE($dddd,$songay);
					while($row = mysql_fetch_array($re)){
						$daygiahan = $row[0];
					
					}
					 $ct = new chi_tiet_nang_cap();
					 $ct->setMA_LOAI_TV($magoi);
					 $ct->setEMAIL_TK($_SESSION["s_email"]);
					 $ct->setNGAY_NANG_CAP($ngaycn);
					 $ct->setNGAY_KET_THUC($dddd);
					 $rr = $ct->tiemctnc($_SESSION["s_email"]);
					 $ct->setSO_LAN_GIA_HAN("0");
					 while($rct = mysql_fetch_array($rr)){
						 $ct->setSO_LAN_GIA_HAN($rct[4]+1);
						 }
					 if($ct->suachi_tiet_nang_cap($daygiahan)){
					 $tt = new thongtinnguoidung();
					 $tt->setEMAIL_TK($_SESSION["s_email"]);
					 $tt->setTIEN_TRONG_TK($sub);
					 $tt->suatien();
					 $tb = "Nâng cấp thành công ";
					 }
					}
				 else if($sogold<$goldgoi){
					 $tb = "Bạn đang xài gói cao hơn ";
					 }	
			 }		
	}
?>
<?php 
    
     $loai_goi = new loai_goi();
	 $res  = $loai_goi->fetchalloai_goi(); 
?>
<script type="text/javascript">
	function checknangcap(){
	   if(parseFloat(document.getElementById("ingold").value) < parseFloat(document.getElementById("numgold").value)){
		   alert("Bạn không có đủ Gold để nâng cấp");
		   return false;
		   }
		   return true;
		}
     function changegold(a){
		 document.getElementById("numbergold").value = document.getElementById("slngay").value;
		 document.getElementById("numgold").value = document.getElementById("slngay").value;
		 }
</script>
<style  type="text/css">
	.table_thongtin{
		margin-left:10px;border-top:1px solid #CCC; border-left:1px solid #CCC;float:left;
		
		}
	.table_thongtin tr td{
		border-bottom:1px solid #CCC; border-right:1px solid #CCC;
		}
	.control_left a{
		color:#030;
		text-decoration:none;
		}	
	.control_left a:hover{
		color:#00F;
		text-decoration:underline;
		}	
	.btnc{
	    padding:3px;	
		}	
	.btnc:hover {
		cursor:pointer;
		color:#F00;
		}						
</style>
<table width="100%" cellpadding="0" cellspacing="0" align="center" border="0"  >
	<tr>
    	<td valign="top"  style="background:url(Images/background.png);border-bottom:1px solid #CCC ;border-left:1px solid #CCC;border-right:1px solid #CCC;width:200px;" >
              
                          <?php
						    $tt = new thongtinnguoidung();
							 $result = $tt->nguoidung($_SESSION["s_email"]); 
							 while($row = mysql_fetch_array($result)){
								 ?>
                                 <div style="padding:5px;border-bottom:1px solid #CCC;" class="control_left">
                	<img src="Images/im-user.png" height="50px;" /><span style="position:absolute;margin-top:20px;margin-left:5px;font-weight:bold;text-shadow:#FFF;"><?php echo $row[2];  ?>
                    </span>
                    <div >
                        <img  src="Images/gold-ingot-icon.png" height="25px" style="margin-left:10px;"/>
                                 <span  style="position:absolute;margin-left:10px;margin-top:5px;"><?php echo $row[7]; ?></span>
                                 
                                 <?php
							 } 
						 ?>
                    </div>
                    
                </div>
      			<div style="padding:5px;border-bottom:1px solid #CCC;" class="control_left">
                	<img src="Images/folder-flower-blue-icon.png" height="30px"/><span style="position:absolute;margin:5px;"><a href="index.php"> Quản lí tập tin</a></span>
                    </div>
         		 <div style="padding:5px;border-bottom:1px solid #CCC;" class="control_left">
                	<img src="Images/edit.png" height="30px"/><span style="position:absolute;margin:5px;"> <a href="index.php?content=tk"> Thống kê</a></span>
         		</div>
                <div style="padding:5px;border-bottom:1px solid #CCC;" class="control_left">
                	<img src="Images/system-search-6.png" height="30px"/><span style="position:absolute;margin:5px;"> <a href="index.php?content=tiemkiem"> Tìm kiếm</a></span>
         		</div>
                <div style="padding:5px;border-bottom:1px solid #CCC;" class="control_left">
                	<img src="Images/user-group-properties (2).png" height="30px"/><span style="position:absolute;margin:5px;"><a  href="index.php?content=thongtinnguoidung">Tài khoản của tôi</a></span>
         		</div>
       			<div style="padding:5px;border-bottom:1px solid #CCC;" class="control_left">
                	<img src="Images/update-product.png" height="30px"/><span style="position:absolute;margin:5px;"><a href="index.php?content=nangcap">Nâng cấp thành viên</a></span>
         		</div>
                 <div style="padding:5px;border-bottom:1px solid #CCC;" class="control_left">
                	<img src="Images/modify-key-icon.png" height="30px"/><span style="position:absolute;margin:5px;"><a href="index.php?content=doimatkhau">Đổi mật khẩu</a></span>
         		</div>
                <div style="padding:5px;border-bottom:1px solid #CCC;" class="control_left">
                	<img src="Images/dialog-no-2.png" height="30px"/><span style="position:absolute;margin:5px;"> <div title="Thoat">
    <a href="index.php?content=logout" > Đăng xuất </a>
     </div></span>
         		</div>
                 <div style="text-align:center;padding:30px;font-size:24px;color:#F30;">
                <?php 
				if($_SESSION["goisd"]!="G1"){
					$g = new tonghop();
					$dldl = 0;
					$ree= $g->goidangsdht($_SESSION["s_email"]);
					while($row = mysql_fetch_array($ree)){
						$dldl= $row[0];
						}
					$re = $g  ->dungluonggoidangsd($_SESSION["s_email"],$dldl);
					while($row = mysql_fetch_array($re)){
						echo "VIP    ".$row[0]."GB";
						}
					}
				else echo "Free   3GB"; 	
				?>
                </div>
        </td>
        <td valign="top" align="left" >
        <div>
        <div style="float:left;margin-top:40px;">
        <div style="color:#F00;font-size:24px;padding:5px;margin-left:40px;">  Thông tin nâng cấp </div>
     <table class="table_thongtin"  cellpadding="0" cellspacing="0" border="0" >
     <tr>
     	<td width="100px" align="center" style="background:url(Images/background.png);" >
        Dung lương<br/> gói
        </td>
        <td width="100px" align="center"  style="background:url(Images/background.png);">
        Số ngày <br>sử dụng
        </td>
        <td width="100px" align="center"  style="background:url(Images/background.png);">
        Gold </br> Tương </br>  ứng
        </td>
     </tr>
	<?php
	 
	while($row = mysql_fetch_array($res)){
		if($row[2]>0){
			?>
		<tr>
        	<td align="center">
            	<?php echo $row[8]; ?> <span style="color:#03F;"> GB
                </span>
            </td>
            <td align="center">
            	<?php echo $row[7]; ?>
            </td>
            <td align="center">
            	<?php echo $row[9]; ?>
            </td>
        </tr>
		<?php
			
			}
		
		}
	?>
</table>
</div>

<div style="float:right; margin-right:10px;margin-top:40px;">
<form name="f" action="" method="post" onsubmit="return checknangcap()">
    <div style="color:#F00;padding:5px;font-size:24px;">
      Nâng cấp thành viên bàng Gold 
    </div>
    <div style="color:#033;">
    Sô ngày cần mua : 
        <select style="text-align:right;" onchange="return changegold()" id="slngay">
           <?php
		   $loai_goi = new loai_goi();
	 $res  = $loai_goi->fetchalloai_goi();
	while($row = mysql_fetch_array($res)){
		if($row[2]>0){
			?>
            <option value="<?php echo $row[9];  ?>" style="text-align:right;" >
            	<?php echo $row[7];  ?>
            </option>
            <?php
		     }
	      }
			?>
        </select>
    </div>
    <div>
       <input id="numbergold" type="text"  size="5" disabled="true" value="20"/> <span style="color:#06F;">Gold</span>
       <input id="numgold" type="hidden"  size="5"  value="20" name="numgold"/>
    </div>
     <?php
						    $tt = new thongtinnguoidung();
							 $result = $tt->nguoidung($_SESSION["s_email"]); 
							 while($row = mysql_fetch_array($result)){
								 ?>
                                 <input type="hidden" value="<?php echo $row[7]; ?>" id="ingold" name="ingold"/>
                                 <?php
							 } 
						 ?>
    <div>
    	<input style="background:url(Images/nc.gif) no-repeat ; width:120px;height:32px;border:0px solid #CCC;text-align:left;font-size:16px;" type="submit" value="Nâng cấp" name="sbnangcap" class="btnc"/>
    </div>
    <div style="color:#F00;">
    	<?php echo $tb; ?>
    </div>
    </form>
</div>
</div>
<div>

</td>
</tr>

</table>
