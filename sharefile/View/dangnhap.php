<script type="text/javascript" >
	function check(f){
	if(f.txtname.value==""){
		alert("Vui Lòng  Nhập Vào Email");
		f.txtname.focus();
		return false;
		}
	 if(f.txtmk.value==""){
		alert ("Vui Lòng  Nhập Vào mật khẩu");
		f.txtmk.focus();
		return false;
		}
		return true;
	}
</script>
<style type="text/css">
	.table_dangnhap {
		border:1px solid #CCC;
		border-radius:10px;
		margin-top:10px;
		}
	.table_dangnhap div{
		padding:5px;
		float:left;
		}	
	.table_dangnhap {
		font-weight:bold;
		}	
	.table_dangnhap tr td {
		
		}	
	.btdangki {
		border:0px;
		background:url(Images/dn_dangnhap.gif) no-repeat;
		width:100px;
		font-weight:bold;
		font-size:16px;
		color:#FFF;
		border-radius:5px;
		margin-left:20px;
		height:30px;
		}
	.dk_hover :hover{
		cursor:pointer;
		color:#FF0;
		}
	.dk_hover {
		font-size:16px;
		padding:10px;
		height:30px;
		}	
	.chu_y{
		border:1px solid #CCC;
		padding: 5px;
		margin-top:10px;
		border-radius:10px;
		font-weight:bold;
		font-size:16px;
		color:#030;
		}
			
     .iconsocail {
		 margin-left:20px;
		 }	
	  .iconsocail :hover{
		  cursor:pointer;
		  }
      .inputtex:focus{
      outline: 0;
}		  	 	
			
</style>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
       <td width="80%" valign="top">
        <form action="" name="f" method="post" onsubmit="return check(this)" enctype="multipart/form-data">
        <table width="100%" cellpadding="0" align="center" cellspacing="15px" border="0"  >
            <tr>
               <td  width="60%" valign="top">
               <table width="90%"  cellpadding="0" align="center" cellspacing="5" border="0"  class="table_dangnhap">
               <tr>
               <td style="font-size:24px;color:#F00;font-weight:bold;border-bottom:1px solid #999;padding:5px;height:100%;">
                   <div > Đăng nhập thành viên </div>
                  
               </td>
            </tr>
            <tr>
                <td>
                       <span class="iconsocail"><img src="Images/facebook.png" </span>
                       <span class="iconsocail"><img src="Images/google.png" </span>
                       <span class="iconsocail"><img src="Images/twitter.png" </span>
                </td>
            </tr>
             <tr>
            	<td height="10px;">
                </td>
            </tr>
           
            <tr>
                  <td height="40px"  style="height:20px;border:3px solid #999;border-radius:5px;" >
                   <div> <img src="Images/mail-queue.png" /></div>
                   <div><input placeholder="Email" type="text" name="txtname" style="height:25px;border-radius:5px; border: 0px solid;font-size:16px;" size="40px" class="inputtex" /></div>
                  </td>
            </tr>
            <tr>
            	<td height="20px;">
                </td>
            </tr>
            <tr>
                  <td height="40px" valign="middle" style="border:3px solid #999;border-radius:5px;">
                    <div> <img src="Images/kgpg_key3.png" /> </div>
                    <div> <input placeholder="Mật khẩu" type="password" name="txtmk" style="height:25px;border: 0px solid ;font-size:16px;" size="40px" class="inputtex"/>  </div> 
                  </td>
            </tr>
              <tr>
            	<td height="10px;">
                </td>
            </tr>
             <tr>
                  <td height="40px" valign="middle" >
            
                    <div class="dk_hover">  <input type="checkbox" /> Ghi nhớ <input type="submit" name="sbdn" value="Đăng Nhâp" class="btdangki"/></div>
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
                             <img src="Images/dialog-ok-apply.png" height="20px" /> <span style="position:absolute;margin-left:20px;">Upload file lớn không cần dùng <br /> công cụ hỗ trợ(max: 25 GB)</span>
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