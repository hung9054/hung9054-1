<?php 
session_start();

  if(!isset($_SESSION["tk_admin"])){
	   echo "<script> location.href='dangnhap.php'; </script>";
	  }
  $content = "trangchu";
  if(isset($_GET["content"]))	 $content  = $_GET["content"];
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="../Libraries/js/jquery-1.8.3.js"></script>
<link rel="stylesheet" href="../libraries/jquery-ui.css" />
    <script src="../libraries/jquery-ui.js"></script>
<title>Admin</title>
<style type="text/css">
	body{
  
  font-family:Arial, Helvetica, sans-serif;
}
   .header{
	   height:68px;
	   background:url(../Images/head.png) ;
	   border-top-left-radius:10px;
	   border-top-right-radius:10px;
	   }
	.header .head_left{
		float:left;
		color:#FFF;
		font-size:26px;
		font-weight:bold
		}	
	.header .head_right{
		float:right;
		color:#FFF;
		font-size:26px;
		font-weight:bold
		}
	.menu {
		background:url(../Images/background.png);
		border-bottom:1px solid #CCC;
		border-left:1px solid #CCC;
		border-right:1px solid #CCC;
		}		  	  
	.menuleft {
		float:left;
		padding:5px;
		font-weight:bold;
		color:#030;
		border-right:1px solid #CCC;
		padding-left:10px;
		padding-right:10px;
		font-size:17px;
		}
	.menuleft a{
		text-decoration:none;
		color:#030;
		}	
	.menuleft:hover a{
		cursor:pointer;	
		color:#63C;
		}
	.icon {
		float:left;
		height:150px;
		width:150px;
		border: 1px solid #CCC;
		margin:10px;
		border-radius:10px;
		}
	.icon a{
		color:#096;
		text-decoration:none;
		}
	.icon a:hover {
		text-decoration:underline;
		color:#00F;
		cursor:pointer;
		}	
	.mn_right {
		float:right;
		margin-right:5px;	
		}	
	.mn_right a{
		text-decoration:none;
		color:#00F;
		}	
	.mn_right a:hover{
		text-decoration:underline;
		cursor:pointer;
		}					   
</style>
</head>

<body>
	<table align="center" width="1020" cellpadding="0" cellspacing="0" >
        <tr>
        	<td class="header" valign="top" >
            <div class="head_left">
              <img src="../Images/system-run-6.png" height="60" />
            </div>
            <div style="padding:14px;" class="head_left">
                   Administrator
            </div>
            <div class="head_right" style="padding:14px;">
              ShareFile.com
            </div>
             <div class="head_right">
              <img src="../Images/go-home-3.png" height="60" />
            </div>
            </td>
        </tr>
        <tr>
        	<td class="menu">
                <div class="menuleft">
                <a href="index.php">Trang chủ </a>
                </div>
                <div class="menuleft">
               <a href="index.php?content=nguoidung"> Người dùng</a>
                </div>
                <div class="menuleft">
                <a href="index.php?content=file"> File</a>
                </div>
                <div class="menuleft">
                <a href="index.php?content=thongke"> Thông kê</a>
                </div>
                <div class="mn_right">
                <a href="index.php?content=thoat">Thoát</a>
                </div>
                <div class="mn_right">|
                </div>
                 <div class="mn_right">
                <a href="index.php?content=doimatkhau">Đổi mật khẩu</a>
                </div>
                 <div class="mn_right">
                <img src="../Images/Actions-irc-operator-icon.png" height="20" />
                </div>
                 <div class="mn_right" style="color:#F00;">
                Admin
                </div>
            </td>
        </tr>
        <tr>
        	<td>
                 <table width="100%" cellpadding="0" cellspacing="15px" align="center" border="0" style="border-bottom:1px solid #CCC;border-left:1px solid #CCC;border-right:1px solid #CCC;">
                 	<tr>
                          <td>
                          		<table width="100%" align="center" cellspacing="15px" align="center" border="0" style="background:url(../Images/background.png); border-radius:10px; border:1px solid #CCC;" >
                                <tr>
                                	<td  height="30px">
                                        
                                    </td>
                                </tr>
                                 <tr>
                                	<td style="background:#FFF;border:1px solid #CCC;" >
                                     	<?php include("Controls/".$content.".php"); ?>
                                    </td>
                                  
                                </tr>
                              </table> 
                          </td>
                    </tr>
                    <tr>
                    	<td align="center" style="font-weight:bold; text-shadow:#09F;font-size:18px;color:#030;">
                        Sharefile.com
                        </td>
                    </tr>
                 </table>
            </td>
        </tr>
       
    </table>
</body>
</html>