<script type="text/javascript" >
	function check(f){
	if(f.txtten.value==""){
		alert(" Vui Lòng  Nhập Vào họ tên");
		f.txtten.focus();
		return false;
		}
	 if(f.txttdt.value==""){
		alert ("Vui Lòng  Nhập Vào Email");
		f.txttdt.focus();
		return false;
		}
	 if(f.txttdta.value != f.txttdt.value){
		alert ("Email không giông nhau");
		f.txttdta.focus();
		return false;
		}
	 if(f.txtmk.value==""){
		alert ("Vui Lòng  Nhập Vào mật khẩu");
		f.txtmk.focus();
		return false;
		}
	 if(f.txtsdt.value==""){
		alert ("Vui Lòng  Nhập Vào số điện thoại");
		f.txtsdt.focus();
		return false;
		}	
	return true;
	}

</script>
<link rel="stylesheet" type="text/css" href="./Libraries/css/dangki.css" />
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
       <td width="80%" valign="top">
        <form action="" name="f" method="post" onsubmit="return check(this)" enctype="multipart/form-data">
        <table width="100%" cellpadding="0" align="center" cellspacing="10" border="0"  >
            <tr>
               <td  width="60%" valign="top">
               <table width="90%"  cellpadding="0" align="center" cellspacing="0" border="0"  class="table_dangki">
               <tr>
               <td>
                   <div style="font-size:24px;color:#F00;font-weight:bold;border-bottom:1px solid #999;padding:10px;"> Đăng kí thành viên </div>
                   <span class="iconsocail"><img src="Images/facebook.png" </span>
                   <span class="iconsocail"><img src="Images/google.png" </span>
                   <span class="iconsocail"><img src="Images/twitter.png" </span>
               </td>
            </tr>
            <tr>
                <td height="30px" >
               <div> Họ tên :</div>
                </td>
               
            </tr>
            <tr>
                  <td height="30px">
                    <div><input type="text" name="txtten" style="height:20px;background:#CCC;border-radius:5px;" size="60px" />  </div>
                  </td>
            </tr>
            <tr>
                <td height="30px">
                 <div>Thư điện tử :</div>
                </td>
               
            </tr>
            <tr>
                  <td height="30px">
                    <div><input type="email" name="txttdt" style="height:20px;background:#CCC;border-radius:5px;" size="60px" />  </div>
                  </td>
            </tr>
            <tr>
                <td height="30px">
                <div> Nhập lại thư điện tử :</div>
                </td>
               
            </tr>
            <tr>
                  <td height="30px">
                    <div><input type="email" name="txttdta" style="height:20px;background:#CCC;border-radius:5px;" size="60px" /></div>
                  </td>
            </tr>
             <tr>
                <td height="30px">
                  <div> Mật khẩu :</div>
                </td>
               
            </tr>
            <tr>
                  <td height="30px">
                    <div><input type="password" name="txtmk" style="height:20px;background:#CCC;border-radius:5px;" size="60px" />   </div>
                  </td>
            </tr>
             <tr>
                <td height="30px">
               <div> Nhập lại mật khẩu :</div>
                </td>
               
            </tr>
            <tr>
                  <td height="30px">
                    <div><input type="password" name="txtnlmk" style="height:20px;background:#CCC;border-radius:5px;" size="60px" /></div>
                  </td>
            </tr>
            <tr>
                <td height="30px">
               <div> Số điện thoại :</div>
                </td>
               
            </tr>
            <tr>
                  <td height="30px">
                    <div><input type="text" name="txtsdt" style="height:20px;background:#CCC;border-radius:5px;" size="60px" /></div>
                  </td>
            </tr>
             <tr>
                  <td height="40px" >
                    <div class="dk_hover"><input type="submit" name="sbdk" value="Đăng kí" class="btdangki"/></div>
                  </td>
            </tr>
            </table>
            <td valign="top">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
            	<td>
                     <table width="100%" cellpadding="0" cellspacing="0" border="0" class="chu_y" >
                       <tr>
                       	<td>
                              <div style="padding:10px;color:#F00;font-weight:bold;font-size:24px;border-bottom:1px solid #063;"> ShareFile.com </div>
                        </td>
                       </tr>
                        <tr>
                       	<td height="60px">
                             <img src="Images/dialog-ok-apply.png" height="20px" /> <span style="position:absolute;margin-left:20px;">Upload file lớn không cần dùng<br /> công cụ hỗ trợ(max: 25 GB)</span>
                        </td>
                       </tr>
                        <tr>
                       	<td height="40px">
                            <img src="Images/dialog-ok-apply.png" height="20px" /> <span style="position:absolute;margin-left:20px;">   Upload cực nhanh </span>
                        </td>
                       </tr>
                        <tr>
                       	<td height="40px">
                              <img src="Images/dialog-ok-apply.png" height="20px" /> <span style="position:absolute;margin-left:20px;">  Donwload cực đã </span>
                        </td>
                       </tr>
                       <tr>
                       	<td>
                              <div style="padding:5px;color:#F00;font-weight:bold;font-size:17px;"> Đăng ký và trải nghiệm ngay </div>
                        </td>
                       </tr>
                     </table>
                </td>
            </tr>
            </table>
            </td> 
            </tr>
        </table>
        </form>
        </td>
        <td valign="top">
         <?php  include("main_right.php"); ?>
        </td>
    </tr>
    
</table>