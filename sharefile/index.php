<?php
session_start();
ob_start();
$content ="timkiemfile";
if(isset($_GET["content"])){
	$content = $_GET["content"];
	}
else {
	if(isset($_SESSION['s_email'])){
	$content ="thumuccontrol";
	}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="Libraries/js/jquery-1.8.3.js"></script>
<link rel="stylesheet" href="libraries/jquery-ui.css" />
    <script src="libraries/jquery-ui.js"></script>
<title>ShareFile.com</title>
<style type="text/css">
	.index_banner{
		height:188px;
		background:url(Images/1958.jpg);
		}
	
	body {

  background:#567;
  font-family:Arial, Helvetica, sans-serif;
		}	
	.div_left {
		width:50%;
		color:#FFF;
		font-weight:bold;
		margin-left:50;
		float:left;
		font-size:18px;
		}
	.div_right a{
		text-decoration:none;
		color:#FFF;
		}	
	.div_left a{
		text-decoration:none;
		color:#FFF;
		}		
	.div_left div{
		float:left;
		margin-left:15px;
		padding:15px
		}	
	.div_left div a:hover{
		cursor:pointer;
		color:#FF0;
		}	
	.div_right div{
		height:50%;
		float:right;
		color:#FFF;
		font-weight:bold;
		margin-left:50;
		font-size:18px;
		font-family:"Arial ", Gadget, sans-serif;
		padding:15px;
		}
	.div_right div a:hover{
		cursor:pointer;
		color:#FF0;
		}	
	.image_banner div{
		float:left;
		margin-left:10px;
		}
	.image_banner div div{
		float:left;
		}
	.imge_sharefile {
		height:125px;
		width:170px;
		background:url(Images/1977.png);
		}
	.imge_sharefile1{
	    height:125px;
		width:370px;
		background:url(Images/1978.png);	
		}
		.table_dangki	{
		background:#FFF;
		
		}
	.footer {
		float:left;
		font-weight:bold;
		font-size:14px;
		padding:5px;
		margin-left:5px;
		}
	.footer div{
	    padding:3px;
		color:#FFF;
		}		
</style>

</head>

<body>
<table align="center" cellpadding="0" cellspacing="0" border="0" width="1000">
	<tr>
    	<td class="index_banner" valign="top">
        <?php 
		include("menu.php");
		?>
        </td>
    </tr>
    <tr>
    	<td style="background:#FFF;">
            <?php include("Controls/".$content.".php"); ?>
            </td>
          </tr>
        
        
    </tr>
    <tr>
    	<td style="background:url(Images/free.png);">
        	<?php include("footer.php"); ?>
        </td>
    </tr>
</table>
</body>
</html>