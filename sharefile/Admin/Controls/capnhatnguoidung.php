   
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
.lt_link a {
	padding:5px;
	color:#00F;
	}

</style>

<?php

error_reporting(E_ALL ^ E_NOTICE);
 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/tonghop.php");
  include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/view/Paginator.php");

        if (isset($_POST['btthem'])) {

			$email = $_POST["txtemail"];
			$matkhau = $_POST["txtmatkhau"];
			$ten = $_POST["ten"];
			$sdt = $_POST["sdt"];
			$ngaysinh = $_POST["ngaysinh"];
			$diachi = $_POST["diachi"];
			$thanhvien = $_POST["maloaitv"];
                    
                $tnd = new tonghop();
                $kqt = $tnd->tennd($email);
				$so = mysql_num_rows($kqt);
				if ($so > 0){
				echo "<script> alert('Địa chỉ email đã có người sử dụng'); </script>";
				}
				else {
					
					$tnd->themtaikhoan($email,$thanhvien, $matkhau);
					$maxtm = $tnd->maxthumuc();
					$kqmatm = mysql_fetch_array($maxtm);
					
					if ($kqmatm[0] == NULL) $mathumuc = 1;
					else $mathumuc = $kqmatm[0] + 1;
					$tnd->themthumuc($mathumuc,$email);	
					//nguoi dung
					$maxnd = $tnd->max_ma_nd();
					$kqmand = mysql_fetch_array($maxnd);
					
					if ($kqmand[0] == NULL) $mand = 1;
					else $mand = $kqmand[0] + 1;
					if ($ten =="" || (str_replace (" ","", $ten) == "")) $ten = "";
					if ($sdt =="" || (str_replace (" ","", $sdt) == "")) $sdt = "";
					if ($ngaysinh != ""){
					$ngaysinh = date('y-m-d', strtotime($ngaysinh));}
		

					if ($diachi =="" || (str_replace (" ","", $diachi) == "")) $diachi = "";
					//$tnd->themnguoidung($email,$mand,$ten,$sdt,$ngaysinh,$diachi);
					if ($ngaysinh != ""){
					$tnd->themnguoidung($email,$mand,$ten,$sdt,$ngaysinh,$diachi);	
					}
					else {
						$tnd->themnguoidung_nsnull($email,$mand,$ten,$sdt,$diachi);
					}
					echo "<script> alert('Đã thêm người dùng'); </script>";
					
				}
				
        }
		if (isset($_POST['btxoa'])) {

			$mailxoa = $_POST["mailan"];
			if (trim($mailxoa) != trim($_SESSION["tk_admin"])){
			$xoa = new tonghop();
            $xoa->xoataikhoan($mailxoa);
			$xoa->xoactnangcap($mailxoa);
			$xoa->xoabctheoemail($mailxoa);
			$xoa->xoanguoidung($mailxoa);
			$bien = new tonghop();
			$dstm = $bien->danh_sach_thu_muc($mailxoa);
			while ($rowds = mysql_fetch_array($dstm)){
				$xoa->xoafiletrongthumuc($rowds[0]);
				$xoa->xoathumuc($mailxoa);
			}
			
			}
			else echo "<script> alert('Không thể xóa'); </script>";
			
			
		}
			if (isset($_POST['btsua'])) {

			$mailsua = $_POST["mailan"];
			$sua = new tonghop();
            
			$tens = $_POST["ten"];
			$sdts = $_POST["sdt"];

			$ngaysinhs = $_POST["ngaysinh"];
			$diachis = $_POST["diachi"];

			$thanhviens = $_POST["maloaitv"];
			if ($tens =="" || (str_replace (" ","", $tens) == "")) $tens = "";
			if ($sdts =="" || (str_replace (" ","", $sdts) == "")) $sdts = "";
			if ($diachis =="" || (str_replace (" ","", $diachis) == "")) $diachis = "";
			if ($ngaysinhs != ""){
					$ngaysinhs = date('y-m-d', strtotime($ngaysinhs));}
			if ($ngaysinhs != ""){
			$sua->suattnguoidung($mailsua,$tens,$sdts,$ngaysinhs,$diachis);
			}
			else $sua->suattnguoidungnullngaysinh($mailsuas,$tens,$sdts,$diachis);
			$sua->suatknguoidung($mailsua,$thanhviens);
			echo "<script> alert('Đã sữa thông tin người dùng'); </script>";
			
		}	
			

?>
	<link rel="stylesheet" href="View/jquery-ui.css">
	<script src="View/jquery-1.11.1.js"></script>
	<script src="View/jquery-ui.js"></script>
	<style>
		.ui-highlight .ui-state-default{
			background: red !important;
			border-color: red !important;
			color: white !important;
		}
	</style>
	<script type="text/javascript" language="javascript">		
		 $(function() {
        $( "#ngaysinh" ).datepicker({
      yearRange: "-30:+30",
      changeYear: true,
        changeMonth :true,

dateFormat:'dd-mm-yy',autoSize:true
});
    });
	</script>


<script type="text/javascript">

// funtion lay gia tri tu radio button "chon"
    function getValue(id) {
        document.cnnd.txtemail.value = document.getElementById("email" + id).innerHTML;
		document.cnnd.mailan.value = document.getElementById("email" + id).innerHTML;
		document.cnnd.txtmatkhau.value = document.getElementById("matkhau" + id).value;
        document.cnnd.ten.value = document.getElementById("ten" + id).innerHTML;


        document.cnnd.sdt.value = document.getElementById("sdt" + id).innerHTML;
		document.cnnd.ngaysinh.value = document.getElementById("ngaysinh" + id).innerHTML;
        document.cnnd.diachi.value = document.getElementById("diachi" + id).innerHTML;
		var a = document.getElementById('maloai' + id).value;
		document.getElementById(a).selected = true;
	var b = document.getElementById('ttcs' + id).value;
	if (b == 1) document.getElementById("chiase").checked = true;
	else document.getElementById("chiase").checked = false;
 




        


        
		document.cnnd.txtemail.disabled = true;
		document.cnnd.txtmatkhau.disabled = true;
        document.cnnd.btthem.disabled = true;
        document.cnnd.btxoa.disabled = false;
		document.cnnd.btsua.disabled = false;

    }


    function confirmxoa() {
        if (confirm("Bạn có chắc muốn xóa người dùng này không?")) {
            return true;
        }
        return false;
    }

    function huy() {
		document.cnnd.btthem.disabled = false;
        document.cnnd.btxoa.disabled = true;
		document.cnnd.btsua.disabled = true;
		document.cnnd.txtemail.disabled = false;

    }
function check(){
	var a = document.cnnd.txtemail.value;
	if ( document.cnnd.txtemail.value ==""){ alert('Email bị bỏ trống'); return false;}
	
	if (document.cnnd.txtmatkhau.value == "") { alert('Mật khẩu bị bỏ trống'); return false;}
		return true;

}

</script>





  
    <div style="height:20px;">
	
</div>
 

        <div class="bodyStyle">
            <form name="cnnd" method="post" action="" >
                <!-- bang hien thi -->  
                <table align="center"  width="650" border="0" cellspacing="1" cellpadding="2" >
                    <tr bgcolor="#dae9f3">

                        <td align=center   height="35" style="font-size:18px;color:#F00;" > &equiv; Cập nhật người dùng</td>
                    </tr>
                    <tr bgcolor="#dae9f3">
                        <td colspan="4" valign="top"><table width="600" border="0" align="center" >

                                <tr>
                                    <td >Email</td>
                                    <td  ><input name="txtemail" type="text" id="txtemail"   maxlength="40"   size="25px"  >
                                    <input name="mailan" type="hidden" id="mailan"    >
                                    </td>
                                   <td  style="padding-left:20px;">Mật khẩu</td>
                                    <td  ><input name="txtmatkhau" type="password" id="txtmatkhau"   maxlength="40"   size="25px"  >
                                    </td>
                                    
                                </tr>
                           <tr>
                                    <td >Tên người dùng</td>
                                    <td  ><input name="ten" type="text" id="ten"   maxlength="40"   size="25px"  >
                                    </td>
                                   <td style="padding-left:20px;">SĐT </td>
                                    <td  ><input name="sdt" type="text" id="sdt"   maxlength="40"   size="25px"  >
                                    </td>
                                    
                                </tr>
                           <tr>
                                    <td >Ngày sinh</td>
                                    <td  ><input  type="text" class="ngaysinh" name= "ngaysinh" id="ngaysinh"   maxlength="40"   size="25px"  >
                                    </td>
                                   <td style="padding-left:20px;">Địa chỉ</td>
                                    <td  ><input name="diachi" type="text" id="diachi"   maxlength="40"   size="25px"  >
                                    </td>
                                    
                                </tr>
                                                           <tr>
                                    <td >Loại thành viên</td>
                                    <td  >
                                    <select id="maloaitv" name="maloaitv">
                                     <option id= "2" value="2" >Thành viên</option>
                                     <option id= "1" value="1" >Admin</option>
                                     
                                     </select>
                 </td>
                                   <td style="padding-left:20px;">Chia sẻ </td>
                                    <td ><input name="chiase" type="checkbox" id="chiase"   maxlength="40"   size="25px"  disabled="true" >
                                    </td>
                                    
                                </tr>                                  
                                <tr>
                                    <td colspan="4"  id="btn_x">
                                        <input type="submit" name="btthem" id="btthem" value="Thêm" onClick="return check()"  >


                                        <input type="submit" name="btsua" id="btsua" value="Sửa"  disabled="true"  >
                                        <input type="submit" name="btxoa" id="btxoa" value="Xóa"  disabled="true" onClick="return confirmxoa()">
                                         <input type="reset" name="bthuy" id="bthuy" value="Hủy"  onClick="return huy()">
                                    </td>
                                </tr>
                            </table></td>
                    </tr>
                </table>
                <br>
                <br>
                <!-- lay du lieu tu bang don vi va hien thi -->
                                <?php
                $nguoidung = new tonghop();
                $result = $nguoidung->lay_tat_ca_nguoi_dung();
				$numrow = mysql_num_rows($result);
				$st = $numrow;
				$trang = 1;
				if(isset($_POST['page'])) $trang=$_POST['page'];
				$paginator = new Paginator($st,$trang,8);
				$link = $paginator->getLink();
				$start = $paginator->getOffset();
				$num_row = $paginator->getNumRow();
				$result2 = $nguoidung->lay_nguoi_dung_gh($start, $num_row);
				?>


				<table  border='0' cellspacing='0' cellpadding="0" style='border:1px solid #36C;' class='chot' width='840px' align='center' >
                <tr  >
                <th align='left' style='padding-left:10px' colspan="8" class="daubang" > Danh sách người dùng</th>
               </tr>
                <tr>
               <th width='30' align='center' >Mã</th>
               <th width='100' align='center'  >Email</th>

				<th width='200' align='left' >Tên</th>
                <th width='120' align='left' >Loại TV</th>
				<th width='50' align='center' >SĐT</th>
				<th width='150' align='center' >Ngày sinh</th>
               <th width='150' align='center'>Địa chỉ</td>
               <th  align='center'>Chọn</td>
                </tr>

				<?php
                $num = mysql_num_rows($result2);
                $i = 0;
				$mau=0;
				?>
				
                
                <?php
                while ($row = mysql_fetch_array($result2)) {
					
					 
							$mau++;
							if($mau == 3) $mau = 1;	
							$i++;
						
			?>
					  
							
							<tr class ='dong<?php  echo $mau;?>'>
                                <td align='center'  ><?php  echo $row['MA_NGUOI_DUNG'];?> 
                                </td>
                                <td  align='center' ><div id='email<?php echo $i;?>'><?php  echo $row['EMAIL_TK'];?>  </div></td>

                                 <input type="hidden" id='matkhau<?php echo $i;?>' value="<?php echo $row['MAT_KHAU'];?>"/>
                                <td  align='left' ><div id='ten<?php  echo $i; ?>'><?php  echo $row['TEN_NGUOI_DUNG'];?></div></td>
                                               
                         <td  align='left' ><div > <?php echo $row['TEN_LOAI_TK'];?></div>
                         <input type="hidden" id='maloai<?php echo $i;?>' value="<?php echo $row['MA_LOAI_TK'];?>"/>
                         </td>
                         
                               
                                <td  align='center' ><div id='sdt<?php  echo $i;?>'><?php  echo $row['SDT'];?></div></td>
                                <td  align='center' ><div id='ngaysinh<?php  echo $i;?>'><?php  echo $row['NGAY_SINH'];?></div></td>
                                <td  align='center' ><div id='diachi<?php  echo $i;?>'><?php  echo $row['DIA_CHI'];?></div></td>

                                <td  align='center' >
                                                                <?php
                                    echo "<input type='hidden' name='hiddenField' id='ttcs$i' value='" . $row['CHIA_SE_TTCN'] . "' />";
									?>
                                <input type='radio' name='chkchon' value='<?php  echo $i;?>' onClick='getValue(this.value);' ></td>
							</tr>
						
	<?php				
				}
				?>
               

               <tr>
                <td align='left' colspan='9'><span style=' color:#008000'>Tổng số người dùng: <?php  echo $st; ?>

               </span></td>
                <td align='right' colspan='2'><font color='green'>
                </font></td>
                </tr>
                </table>
            </form>
             <div align="center" class="lt_link">
      Trang <?php echo $link; ?>
          <form name="frmChuyenTrang" method="post">
        <input type="hidden" name="page" value="1"/>
    </form>
    <script type="text/javascript">
        function chuyen_trang(trang){
            document.frmChuyenTrang.page.value=trang;
            document.frmChuyenTrang.submit();
        }
		</script>
        </div>
        <div style="height:50px;">
	
</div>


