<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/taikhoan.php"); 
if(isset($_POST["sbmit"])){
	   $email = $_POST["txtten"];
	   $matkhau = $_POST["txtmk"];
	   $taikhoan = new taikhoan();
	   $taikhoan->setEMAIL_TK($email);
	   $taikhoan->setMAT_KHAU($matkhau);
	   $taikhoan->setMA_LOAI_TK("1");
	   if($taikhoan->kiemtra()){
		   $_SESSION["tk_admin"]=$email;
		   echo "<script> location.href='index.php'; </script>";
	    }
		else{  echo "<script> alert ('Tài khoản không tồn tại'); </script>"; }
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
	*{margin:0;padding:0;}


body {
    background:#567;	
	}
.button{
  width:100px;
  background:#3399cc;
  display:block;
  margin:0 auto;
  margin-top:1%;
  padding:10px;
  text-align:center;
  text-decoration:none;
  color:#fff;
  cursor:pointer;
  transition:background .3s;
  -webkit-transition:background .3s;
}

.button:hover{
  background:#2288bb;
}

#login{
  width:400px;
  margin:0 auto;
  margin-top:8px;
  margin-bottom:2%;
  transition:opacity 1s;
  -webkit-transition:opacity 1s;
}
#triangle{
  width:0;
  border-top:12x solid transparent;
  border-right:12px solid transparent;
  border-bottom:12px solid #3399cc;
  border-left:12px solid transparent;
  margin:0 auto;
}

#login h1{
  background:#3399cc;
  padding:20px 0;
  font-size:140%;
  font-weight:300;
  text-align:center;
  color:#fff;
}

form{
  background:#f0f0f0;
  padding:6% 4%;
}
input[type="text"],input[type="password"]{
  width:92%;
  background:#fff;
  margin-bottom:4%;
  border:1px solid #ccc;
  padding:4%;
  font-family:Arial, Helvetica, sans-serif;
  font-size:95%;
  color:#555;
}

input[type="submit"]{
  width:100%;
  background:#3399cc;
  border:0;
  padding:4%;
  font-family:Arial, Helvetica, sans-serif;
  font-size:100%;
  color:#fff;
  cursor:pointer;
  transition:background .3s;
  -webkit-transition:background .3s;
}

input[type="submit"]:hover{
  background:#2288bb;}
</style>
<script type="text/javascript">

</script>
</head>

<body>
<div id="login">
<h1>Đăng Nhập</h1>
<form name="f" action="" method="post" onsubmit="">
<input name="txtten"  type="text" placeholder="Tên tài khoản" class="text"/>
<input type="password" placeholder="Mật khẩu"  name="txtmk"/>
<input type="submit" value="Đăng Nhập" name="sbmit"/>
</form>
</div>


</body>
</html>
