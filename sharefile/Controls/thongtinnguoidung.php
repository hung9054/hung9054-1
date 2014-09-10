<?php 
     include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/loai_goi.php");
	 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/thongtinnguoidung.php");
	 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/chi_tiet_nang_cap.php");
	 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/thumuc.php");
	 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/tonghop.php");
     $loai_goi = new loai_goi();
	 $res  = $loai_goi->fetchalloai_goi();
	  
		 if(isset($_POST["sbluu"])){
			 $em = $_POST["txtemail"];
			 $ten = $_POST["txthoten"];
			 $sdt = $_POST["txtsdt"];
			 $diac = $_POST["txtdc"];
			 $ngays = $_POST["txtng"];
			 $tt = new thongtinnguoidung();
			 $tt->setEMAIL_TK($em);
			 $tt->setTEN_NGUOI_DUNG($ten);
			 $tt->setNGAY_SINH($ngays);
			 $tt->setDIA_CHI($diac);
			 $tt->setSDT($sdt);
			 $tt->suathongtinnguoidung();
			 }
		  
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
</style>
<table width="100%" cellpadding="0" cellspacing="0" align="center" border="0"  >
	<tr>
    	<td valign="top"  style="background:url(Images/background.png);border-bottom:1px solid #CCC ;border-left:1px solid #CCC;border-right:1px solid #CCC;width:200px;" >
                <div style="padding:5px;border-bottom:1px solid #CCC;">
                	<img src="Images/im-user.png" height="50px;" /><span style="position:absolute;margin-top:20px;margin-left:5px;font-weight:bold;text-shadow:#FFF;"><?php
						    $tt = new thongtinnguoidung();
							$hoten = "";
							$ngaysinh ="";
							$diachi = "";
							$sodienthoai="";
							 $result = $tt->nguoidung($_SESSION["s_email"]); 
							 while($row = mysql_fetch_array($result)){
								 $hoten = $row[2];
								 $sodienthoai = $row[3];
								 $ngaysinh =$row[4];
								 $diachi = $row[5];
								 echo $hoten;
								 ?>
                                 
                    </span>
                   
                    <div >
                        <img  src="Images/gold-ingot-icon.png" height="25px" style="margin-left:10px;"/>
                          
                                 <span   style="position:absolute;margin-left:10px;margin-top:5px;"><?php echo $row[7]; ?></span>
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
				$a = new thumuc();
			$re = $a->minngaytao($_SESSION["s_email"]);
			$ngaydk=0;
			while($row = mysql_fetch_array($re)){
				$ngaydk= $row[3];
				}
			    $dlgoi = 0;
				  
				if($_SESSION["goisd"]!="G1"){
					$g = new tonghop();
					$dldl = 0;
					$ree= $g->goidangsdht($_SESSION["s_email"]);
					while($row = mysql_fetch_array($ree)){
						$dldl= $row[0];
						}
					$re = $g  ->dungluonggoidangsd($_SESSION["s_email"],$dldl);
					while($row = mysql_fetch_array($re)){
						$dlgoi= $row[0];
						echo "VIP    ".$row[0]."GB";
						}
					$dlgoi = $dlgoi+3;	
					}
				else {$dlgoi=3; 
				 echo "Free   3GB";
				}	
			
				?>
                </div>
        </td>
        <td valign="top" align="left" >
         <?php 
		        $ngayhh = "";
				if($_SESSION["goisd"]!="G1"){
					$g = new tonghop();
					$dldl = 0;
					$ree= $g->goidangsdht($_SESSION["s_email"]);
					while($row = mysql_fetch_array($ree)){
						$dldl= $row[0];
						}
					$re = $g  ->dungluonggoidangsd($_SESSION["s_email"],$dldl);
					while($row = mysql_fetch_array($re)){
						$ngayhh=$row[1];
						}
					}
				else $ngayhh = "Không giới hạn"; 	
				?>
        <?php
	   
		
		
		 ?>
         <div class="item1" >
                Thông tin tài khoản :
		 </div>
         <div style="background:#093;height:20px;width:80%;margin-left:20px;border-radius:5px;">
         </div>
         <div class="item2">
                Loại tài khoản :<span><?php if($_SESSION["goisd"]!="G1"){echo "Tài khoản VIP";}else echo "Miễn phí"; ?></span>
		 </div>
          <div class="item2">
         		Ngày hết hạn :<span><?php echo $ngayhh; ?></span>
         </div>
         <div class="item2">
         		Ngày mở tài khoản : <span><?php echo $ngaydk; ?></span>
         </div>
         <div class="item2">
         		tổng dung lượng lưu trử :<span><?php if($_SESSION["goisd"]=="G1")echo "3G"; else echo $dlgoi."G";?></span>
         </div> 
         <div class="item2">
         		dung lượng cố định :<span>3G</span>
         </div>
         <div class="item2">
         		dung lượng gói :<span> <?php if($_SESSION["goisd"]=="G1")echo "0G"; else echo ($dlgoi-3)."G";?></span>
         </div>
          <div class="item1" >
                Thông tin cá nhân :
		 </div>
          <div style="background:#093;height:20px;width:80%;margin-left:20px;border-radius:5px;">
         </div>
         <form name="f" action="" method="post" >
         <div class="item2">
               Họ tên :
         </div>
         <div>
         <input type="hidden" name="txtemail" value="<?php echo $_SESSION["s_email"]; ?>" />
         	<input type="text" name="txthoten" value="<?php echo $hoten; ?>" />
         </div>
          <div class="item2">
               Ngày sinh :
         </div>
         <div>
         	<input type="text" name="txtng" value="<?php echo $ngaysinh; ?>" id="ngaynhap"/>
         </div>
          <div class="item2">
               Số điện thoại :
         </div>
         <div>
         	<input type="text" name="txtsdt" value="<?php echo $sodienthoai; ?>"/>
         </div>
          <div class="item2">
               Địa chỉ liên lạc :
         </div>
         <div>
         	<textarea name="txtdc" style="margin-left:40px;border-radius:5px;width:300px;" "><?php echo $diachi; ?></textarea>
         </div>
         <div>
         <input type="submit" value="Lưu" name="sbluu" class="sb"/>
         </div>
         </form>
         <div style="height:40px;">
        
         </div>
        </td>
</tr>
</table>
<style type="text/css">
	.item1{
		font-size:18px;color:#F00;
		margin-top:20px;
		margin-left:20px;
		margin-bottom:5px;
		}
	.item2 {
		margin-left:40px;
		margin-top:10px;
		color:#066;
		}
	.item2 span {
		margin-left:10px;
		color:#F60;	
		}	
	div input{
		border-radius:5px;
		margin-left:40px;
		padding:3px;
		}	
	.sb{
		padding:5px;
		background:#060;
		color:#FFF;
		width:50px;
		}
	.sb:hover{
		cursor:pointer;
		}		
</style>
<script type="text/javascript">
	 $(function() {
        $( "#ngaynhap" ).datepicker({
      yearRange: "-30:+30",
      changeYear: true,
        changeMonth :true,

	dateFormat:'yy-mm-dd',autoSize:true
	});
	});
</script>