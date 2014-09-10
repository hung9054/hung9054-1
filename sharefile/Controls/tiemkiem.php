<?php 
     include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/loai_goi.php");
	 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/thongtinnguoidung.php");
	 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/chi_tiet_nang_cap.php");
	 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/tonghop.php");
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
                	<img src="Images/system-search-6.png" height="30px"/><span style="position:absolute;margin:5px;"> <a href="index.php?content=timkiemfile"> Tìm kiếm</a></span>
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
		<?php include("Controls/timkiemfile.php"); ?>
        </td>
</tr>
</table>
