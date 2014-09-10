<?php 
function findexts ($filename) 
			{ 
		        $filename = strtolower($filename) ; 
				$exts = explode('.', $filename) ; 
				$n = count($exts)-1; 
				$exts = $exts[$n]; 
				 return $exts; 
			 } 			
				
				
	include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/file.php");
	include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/chi_tiet_bc_vp.php"); 
	include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/thumuc.php");
	if(isset($_GET["code"])){
	  $a = new File();
	   $result = $a->timfile_mahoa($_GET["code"]);
	    $mafile = "";
		$mathumuc=0;
	   $duoi = "";
	   $namefile = "";
	   $dungluong = "";
	   $matkhau ="";
	   $luotdown = 0;
	   while($row = mysql_fetch_array($result)){
		   $mafile = $row[0];
		   $mathumuc = $row[2];
		   $duoi = findexts($row[4]);
		   $namefile = $row[4];
		    $dungluong = $row[6];
			$matkhau = $row[8];
			$luotdown = $row[9]+1;
		   }
	  if($mafile == ""){ 
	     echo "<script> alert ('file không tồn tại'); </script>";
	  	 echo "<script> location.href='index.php'; </script>";
	  }
	   if(isset($_POST["txtsb"])){
       
		set_time_limit(0);
		// change this value below
		
		
		// local file that should be send to the client
		$local_file = "file/".$mafile.".".$duoi;
		// filename that the user gets as default
		
		
		// set the download rate limit (=> 20,5 kb/s)
		$download_rate = 200; 
		if(file_exists($local_file) && is_file($local_file)) {
			 $c = new File();
		$c->setMA_FILE($mafile);
		$c->setSO_LUOT_DOWN($luotdown);
		$c->suafile_luotdown();
		set_time_limit(0);
			// send headers
			header('Cache-control: private');
			header('Content-Type: application/octet-stream'); 
			header('Content-Length: '.filesize($local_file));
			header('Content-Disposition: filename='.$namefile);
		   
			// flush content
			flush();    
			// open file stream
			$file = fopen($local_file, "r");    
			while(!feof($file)) {
		
				// send the current file part to the browser
				print fread($file, round($download_rate * 1024));    
		
				// flush the content to the browser
				flush();
		
				// sleep one second
				sleep(1); 
				ob_flush();   
			}    
		
			// close file stream
			fclose($file);}
		else {
			echo "<script>alert ('file đã bị xóa');</script>";
			 echo "<script> location.href='index.php'; </script>";
		     }
		
		
		
		
		if ($dl) {
		        } 
		else {
			header('HTTP/1.0 503 Service Unavailable');
			die('Abort, you reached your download limit for this file.');
		}    

		   }  
		   
	    if(isset($_POST["txtsbvip"])){
		if(isset($_SESSION["s_email"])){
		   if($_SESSION["goisd"]!="G1"){
			  
		// change this value below
		
		
		// local file that should be send to the client
		$local_file = "file/".$mafile.".".$duoi;
		// filename that the user gets as default
		
		
		// set the download rate limit (=> 20,5 kb/s)
		$download_rate = 1024; 
		if(file_exists($local_file) && is_file($local_file)) {
			 $c = new File();
		$c->setMA_FILE($mafile);
		$c->setSO_LUOT_DOWN($luotdown);
		$c->suafile_luotdown();
		set_time_limit(0);
			// send headers
			header('Cache-control: private');
			header('Content-Type: application/octet-stream'); 
			header('Content-Length: '.filesize($local_file));
			header('Content-Disposition: filename='.$namefile);
		
			// flush content
			flush();    
			// open file stream
			$file = fopen($local_file, "r");    
			while(!feof($file)) {
		
				// send the current file part to the browser
				print fread($file, round($download_rate * 1024));    
		
				// flush the content to the browser
				flush();
		
				// sleep one second
				sleep(1); 
				ob_flush();    
			}    
		
			// close file stream
			fclose($file);}
		else {
			echo "<script>alert ('file đã bị xóa');</script>";
			 echo "<script> location.href='index.php'; </script>";
		     }
		
		
		
		
		if ($dl) {
		        } 
		else {
			header('HTTP/1.0 503 Service Unavailable');
			die('Abort, you reached your download limit for this file.');
		} 
		   }
		    else {
			 
			 echo "<script> alert (' Bạn không phải là thành viên vip , vui lòng đăng kí thành viên vip '); </script>";
			 }   
		}
		 else {
			 
			 echo "<script> alert (' Bạn không phải là thành viên vip , vui lòng đăng kí thành viên vip '); </script>";
			 }   

		   }  
	   
	   
	  
	?>
    <script type="text/javascript">
		 function getfiledown(code,mk) //ham lay thong tin 
    {
    var xmlhttp;
    if (window.XMLHttpRequest)
      { //code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
      }
    else
      { //code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
         document.getElementById("div_down").innerHTML =xmlhttp.responseText;
		 
			if(xmlhttp.responseText.length>4){
				document.getElementById("idmk").style.display = 'none';
				document.getElementById("xn").style.display = 'none';
				}	
			else {
				document.getElementById("idmk").value ="";
				alert ("Mật khẩu không đúng");
				}	 
         xmlhttp = null;                         
        }
      }
     xmlhttp.open("GET","Controls/getfiledown.php?code="+code+"&mk="+mk,true);
     xmlhttp.send();
    
    return false;
       
    }
	</script>
    <style type="text/css">
	.div_down{
	    width:600px;
		text-align:center;	
		}
	.div_down table{
	    float:left;
		margin-left:10px;	
		background:url(Images/background.png);
		}	
	.down:hover{
		cursor:pointer;	
		}	
	 .inputtex:focus{
      outline: 0;
	  }	
	 .xn{
		 padding:3px;
		 } 
		 .xn:hover{
		 cursor:pointer;
		 } 
	#mkfile{
		position:absolute;
		border:4px solid #CCC;
		border-radius:20px;
		background:#FFF;
		height:150px;
		top:200px;
		margin-left: 300px;
		font-weight:bold;
		display:none;
		width:400px;
		}
	.bcvp:hover {
		cursor:pointer;
		color:#F00;
		}						 
</style>
<script type="text/javascript">
	function goibb(){
		document.getElementById("mkfile").style.display = 'block';
		}
	function outbb(){
		document.getElementById("mkfile").style.display = 'none';
		document.getElementById("mkfile").value = "";
		}	
</script>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
        <td width="80%" valign="top" align="center">
          <div style="text-align:center;font-size:26px;color:#F00;padding:5px;">
          Thông tin tập tin tải xuống
          </div>
          <div style="text-align:center;width:300px;margin-bottom:10px;">
          	<div style="text-align:left;">
            <span style="color:#060;">Tên tập tin : </span><?php echo  $namefile; ?>
            </div>
            <div style="text-align:left;">
            <span style="color:#060;">Dung lượng : </span><?php if($dungluong>(1024*1024*1024)) echo round($dungluong/(1024*1024*1024),1)." GB";elseif($dungluong>(1024*1024))echo  round($dungluong/(1024*1024),1)." MB"; else round($dungluong/(1024),1)." KB"  ?>
            </div>
            <?php 
			if(isset($_POST["sbbcvp"])){
				$nd= $_POST["txtnd"];
				if($nd==""){}
				else{
					$a = new chi_tiet_bc_vp();
					$ngaycn = "0000-00-00";
					$ree = $a->CURDATE();
					while($row2 = mysql_fetch_array($ree)){
						$ngaycn = $row2[0];
						}
						$a->setEMAIL_TK($_SESSION["s_email"]);
						$a->setMA_FILE($mafile);
						$a->setLI_DO_BC($nd);
						$a->setNGAY_BAO_CAO($ngaycn);
						$a->setTrang_thai_bc(0);
						$a->themchi_tiet_bc_vp();
					
					}
				}
			?>
            <div class="bcvp" style="text-align:left;" onclick="goibb()" >
           <?php if(isset( $_SESSION["s_email"])){
			   $v = new thumuc();
					$ss = $v->fetchthumuc_mail_ma($_SESSION["s_email"],$mathumuc);
					if(mysql_num_rows($ss)==0){
						$n = new chi_tiet_bc_vp();
						$ff = $n->tiemctbc($_SESSION["s_email"],$mafile);
						if(mysql_num_rows($ff)==0){
						 echo "Báo cáo vi phạm";
						}
						}
			  
			   }?>
            
            
            </div>
            <?php  
			if($matkhau!=""){
				?>
                <div style="text-align:left;">
                <input id="codetam" value="<?php echo $_GET['code'];?>" type="hidden"/>
               <input class="inputtex" placeholder="Mật khẩu" size="10" style="padding:5px;border-radius:5px;" id="idmk"/><input  type="button" value="Xác nhận"  class="xn" id="xn"  onclick="getfiledown(document.getElementById('codetam').value,document.getElementById('idmk').value)"/>
                 </div>
                <?php
				}
			?>
          </div>
          <div class="div_down" id="div_down">
          <?php
		  	if($matkhau==""){
				?>
                <table cellpadding="0" cellspacing="0" border="0" width="250px">
             <tr >
             	<td height="90px" style="background:url(Images/free.png);">
                <div style="height:40px;width:150px;background:url(Images/free%20.gif);border-top-right-radius:40px;border-bottom-right-radius:40px;">
                </div>
                </td>
             </tr>
             <tr>
             	<td align="center">
                  <div style="width:220px;height:30px;border-bottom:1px solid #666;padding-top:5px; text-align:left;">
                 <img src="Images/Next_16.png"  style="margin-top:2px;position:absolute;"/> <span style="padding:5px;font-size:16px;margin-left:20px;">
                Download chậm</span>
                </div>
                </td>
             </tr>
              <tr>
             	<td align="center">
                  <div style="width:220px;height:30px;border-bottom:1px solid #666;padding-top:5px; text-align:left;">
                 <img src="Images/Next_16.png"  style="margin-top:2px;position:absolute;"/> <span style="padding:5px;font-size:16px;margin-left:20px;">
                 Tốc độ chậm</span>
                </div>
                </td>
             </tr>
             <tr>
             	<td align="center">
                  <div style="width:220px;height:30px;border-bottom:1px solid #666;padding-top:5px; text-align:left;">
                 <img src="Images/Next_16.png"  style="margin-top:2px;position:absolute;"/> <span style="padding:5px;font-size:16px;margin-left:20px;">
                 Lượng file tải: 1 file</span>
                </div>
                </td>
             </tr>
              <tr>
             	<td align="center">
                  <div style="width:220px;height:30px;border-bottom:1px solid #666;padding-top:5px; text-align:left;">
                 <img src="Images/Next_16.png"  style="margin-top:2px;position:absolute;"/> <span style="padding:5px;font-size:16px;margin-left:20px;">
                 Thời gian chờ tải: 5 giây</span>
                </div>
                </td>
             </tr>
              <tr>
             	<td align="center" height="80px">
                 <form name="f" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" value="das" name="hdtk"/>
                 <input type="submit" name="txtsb" value="Tải xuống chậm" style="background:url(Images/down.gif);height:44px;width:200px;border:3px solid #CCC;border-radius:5px;font-weight:bold;" class="down"/>
                 </form>
                </td>
             </tr>
             </table>
             <table cellpadding="0" cellspacing="0" border="0" width="250px">
             <tr>
             	<td style="background:url(Images/vip.png);"  height="90px" >
                <div style="height:40px;width:150px;background:url(Images/vip.gif);border-top-left-radius:35px;border-bottom-left-radius:35px;float:right;">
                </div>
                </td>
             </tr>
             <tr>
             	<td  align="center">
                <div style="width:220px;height:30px;border-bottom:1px solid #666;padding-top:5px; text-align:left;">
                 <img src="Images/Next_16.png"  style="margin-top:2px;position:absolute;"/> <span style="padding:5px;font-size:16px;margin-left:20px;">Download nhanh</span>
                 </div>
                </td>
             </tr>
              <tr>
             	<td align="center">
                   <div style="width:220px;height:30px;border-bottom:1px solid #666;padding-top:5px; text-align:left;">
                 <img src="Images/Next_16.png"  style="margin-top:2px;position:absolute;"/> <span style="padding:5px;font-size:16px;margin-left:20px;">
                 Tốc độ cao</span>
                 </div>
                </td>
             </tr>
             <tr>
             	<td align="center">
                 <div style="width:220px;height:30px;border-bottom:1px solid #666;padding-top:5px; text-align:left;">
                 <img src="Images/Next_16.png"  style="margin-top:2px;position:absolute;"/> <span style="padding:5px;font-size:16px;margin-left:20px;">
                 Lượng file tải: 0 giới hạn</span>
                 </div>
                </td>
             </tr>
              <tr>
             	<td align="center">
                  <div style="width:220px;height:30px;border-bottom:1px solid #666;padding-top:5px; text-align:left;">
                 <img src="Images/Next_16.png"  style="margin-top:2px;position:absolute;"/> <span style="padding:5px;font-size:16px;margin-left:20px;">
                 Thời gian chờ tải: 0 giây</span>
                 </div>
                </td>
             </tr>
              <tr>
             	<td align="center" height="80px">
                <form name="f" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" value="das" name="hdtk"/>
                 <input type="submit" name="txtsbvip" value="Tải xuống nhanh" style="background:url(Images/down1.gif);height:44px;width:200px;border:3px solid #CCC;border-radius:5px;font-weight:bold;" class="down"/>
                 </form>

                </td>
             </tr>
             </table>
                <?php
				}
		  ?>
             
          </div>
        </td>
        <td valign="top">
         <?php  include("main_right.php"); ?>
        </td>
    </tr>
    
</table>
	 <?php
	   if(isset($_POST["txt"])){
			if(isset($_SESSION["s_email"])){
		   if($_SESSION["goisd"]!="G1"){

		set_time_limit(0);
		// change this value below
		
		
		// local file that should be send to the client
		$local_file = "file/".$mafile.".".$duoi;
		// filename that the user gets as default
		
		
		// set the download rate limit (=> 20,5 kb/s)
		$download_rate = 1024; 
		if(file_exists($local_file) && is_file($local_file)) {
			// send headers
			header('Cache-control: private');
			header('Content-Type: application/octet-stream'); 
			header('Content-Length: '.filesize($local_file));
			header('Content-Disposition: filename='.$namefile);
		
			// flush content
			flush();    
			// open file stream
			$file = fopen($local_file, "r");    
			while(!feof($file)) {
		
				// send the current file part to the browser
				print fread($file, round($download_rate * 1024));    
		
				// flush the content to the browser
				flush();
		
				// sleep one second
				sleep(1);    
			}    
		
			// close file stream
			fclose($file);}
		else {
			echo "<script>alert ('file đã bị xóa');</script>";
			 echo "<script> location.href='index.php'; </script>";
		     }
		
		
		
		
		if ($dl) {
		        } 
		else {
			header('HTTP/1.0 503 Service Unavailable');
			die('Abort, you reached your download limit for this file.');
		}    

		   }
 
		 else {
			 
			 echo "<script> alert (' Bạn không phải là thành viên vip , vui lòng đăng kí thành viên vip '); </script>";
			 }   
		   
	   }
	    else {
			 
			 echo "<script> alert (' Bạn không phải là thành viên vip , vui lòng đăng kí thành viên vip '); </script>";
			 }   
		}
	}
	else {
		echo "<script> location.href='index.php'; </script>";
		}

?>

  <div id="mkfile" >
 	<div style="background:#F00;text-align:center;color:#FFF;padding:10px;border-top-left-radius:20px;border-top-right-radius:20px;font-size:20px;">
    Báo cáo vi phạm
    </div>
    <form name="f" action="" method="post"> 
    <div style="padding:15px;text-align:center">
    <span>Nội dung </span><span> <input type="text" id="txtsetmk" name="txtnd"/></span>
    </div>
    <div style="text-align:center;">
    	<input class="sbthuc" type="submit"  value="Xác nhận" name="sbbcvp" onclick="return checktxtmatkhau(document.getElementById('txtsetmk').value)"/>
        <input class="sbthuc" type="button"  value="Hủy" name="bttao" onclick="outbb()"/>
        
    </div>
    </form>
 </div>              