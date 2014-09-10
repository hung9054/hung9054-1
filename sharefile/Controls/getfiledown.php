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
	if(isset($_GET["code"])){
	  $a = new File();
	   $result = $a->timfile_mahoa($_GET["code"]);
	    $mafile = "";
	   $duoi = "";
	   $namefile = "";
	   $dungluong = "";
	   $matkhau ="";
	   while($row = mysql_fetch_array($result)){
		   $mafile = $row[0];
		   $duoi = findexts($row[4]);
		   $namefile = $row[4];
		    $dungluong = $row[6];
			$matkhau = $row[8];
		   }
		   if(isset($_GET["mk"])){
			   if($_GET["mk"]==$matkhau){
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
			   }
	}
 
?>

 