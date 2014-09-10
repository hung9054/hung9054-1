<script type="text/javascript">
	function checkdmk(f){
	if(f.mkcu.value==""){
		alert ("Vui Lòng  Nhập Vào mật khẩu củ");
		f.mkcu.focus();
		return false;
		}
	 if(f.mknew.value==""){
		alert ("Vui Lòng  Nhập Vào mật khẩu mới");
		f.mknew.focus();
		return false;
		}
	 if(f.mknewagian.value==""){
		alert ("Vui Lòng  Nhập lại mật khẩu mới");
		f.mknewagian.focus();
		return false;
		}	
	if(f.mknewagian.value!=	f.mknew.value){
		alert ("Mật khẩu mới không  giống nhau");
		return false;
		f.mknewagian.focus();
		}
		return true;
		}
</script>
 <div style="margin-top:50px;margin-left:50px;color:#903;font-size:24px;">
             Chức năng thay đổi mật khẩu.
        </div>
        <div  style="width:80%;margin-left:50px;background:#03C;height:30px;border-radius:10px;margin-top:10px;margin-bottom:20px;">
        
      </div>
       
        <form action="" method="post" onSubmit="return checkdmk(this)"  name="f" >
        
        <input type="hidden" name="txtemail" value="<?php echo $_SESSION["s_email"];?>"/>
        <div style=" font-family:Arial, Helvetica, sans-serif; color:#030;font-weight:bold;margin-left:50px; margin-top:5px;">
        	Mật khẩu củ:
        </div>
        <div style="margin-left:50px;">
        <input type="password" name="mkcu" />
        </div>
         <div style=" font-family:Arial, Helvetica, sans-serif; color:#030;font-weight:bold;margin-left:50px;margin-top:5px;">
        	Mật khẩu mới:
        </div>
        <div style="margin-left:50px;">
        <input type="password" name="mknew" />
        </div>
         <div style=" font-family:Arial, Helvetica, sans-serif; color:#030;font-weight:bold;margin-left:50px;margin-top:5px;">
           Nhập lại	mật khẩu mới:
        </div>
        <div style="margin-left:50px;">
        <input type="password" name="mknewagian" />
        </div>
        <div style="margin-left:50px;" >
         <input type="submit" name="sb" value="Xác nhận"  class="btdmk"/>
         <input type="reset" value="Hủy"  class="btdmk"/>
         </div>
        </form>
        <div style="margin-left:50px;padding:5px;color:#F00;">
         <?php 
		if(isset($_POST["sb"])){
			include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/taikhoan.php");
			$email = $_SESSION["tk_admin"];
			$mkcu = $_POST["mkcu"];
			$mknew = $_POST["mknew"];
			 $tk = new taikhoan();
			 $tk->setEMAIL_TK($email);
			 $tk->setMAT_KHAU($mkcu);
			 if($tk->suataikhoan($mknew)){
				 echo "Mật khẩu đã được thay đổi";
				 }
				 else  echo "Mật khẩu củ không đúng";
			}
		?>
        </div>
 <style type="text/css">
 	.btdmk:hover{
		cursor:pointer;
		}
 </style>