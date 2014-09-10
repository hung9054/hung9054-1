<style type="text/css">
	.control_left a{
		color:#030;
		text-decoration:none;
		}	
	.control_left a:hover{
		color:#00F;
		text-decoration:underline;
		}
</style>
		<meta charset=utf-8 />
		<script type="text/javascript" src="libraries/chart/js/pie.js"></script>
		<script type="text/javascript">
$(function () {
var a = parseFloat(document.getElementById('file').value);

var b = parseFloat(document.getElementById('dl').value);

    $('#a').highcharts({
        chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
        },
        title: {
            text: 'Thống kê dung lượng hiện có'
        },
        tooltip: {
    	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
        series: [{
            type: 'pie',
            name: 'Dung Lượng',
            data: [
                ['Đã sử dụng',   a],

                {
                    name: 'Trống',
                    y: b,
                  //  sliced: true,
                   // selected: true
                }

            ]
        }]
    });
	$('#b').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Thống kê dung lượng hiện có'
        },
        tooltip: {
    	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
        series: [{
            type: 'pie',
            name: 'Dung Lượng',
            data: [
                ['Trống',   b]

            ]
        }]
    });
	
		$('#c').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Thống kê dung lượng hiện có'
        },
        tooltip: {
    	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
        series: [{
            type: 'pie',
            name: 'Dung Lượng',
            data: [
                ['Đã sử dụng',   a]

            ]
        }]
    });
});
    

		</script>

	
<script src="libraries/chart/js/highcharts.js"></script>
<script src="libraries/chart/js/modules/exporting.js"></script>
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/thumuc.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/file.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/thongtinnguoidung.php");
?>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/tonghop.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/loai_goi.php");
$email = $_SESSION['s_email'];

 ?>

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
                	<img src="Images/folder-flower-blue-icon.png" height="30px"/><span style="position:absolute;margin:5px;"> <a href="index.php"> Quản lí tập tin</a></span>
         		</div>
                  <div style="padding:5px;border-bottom:1px solid #CCC;" class="control_left">
                	<img src="Images/edit.png" height="30px"/><span style="position:absolute;margin:5px;"> <a href="index.php?content=tk"> Thống kê</a></span>
         		</div>
                <div style="padding:5px;border-bottom:1px solid #CCC;" class="control_left">
                	<img src="Images/system-search-6.png" height="30px"/><span style="position:absolute;margin:5px;"> <a href="index.php?content=tiemkiem"> Tìm kiếm</a></span>
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
                	<img src="Images/dialog-no-2.png" height="30px"/><span style="position:absolute;margin:5px;">
                     <div title="Đăng xuất">
                <a href="index.php?content=logout" > Đăng xuất </a>
     </div></span>
         		</div>
                <div style="text-align:center;padding:30px;font-size:24px;color:#F30;">
               <?php 
				if($_SESSION["goisd"]!="G1"){
					$g = new tonghop();
					$dldl = 0;
					$ree= $g->goidangsdht($_SESSION["s_email"]);
					while($rowt = mysql_fetch_array($ree)){
						$dldl= $rowt[0];
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
        <td valign="top"  width="800px">
<table width="800px" >
<?php
		   $th = new tonghop();
		   
		   //Dung lượng đã sử dụng
		   $result = $th->dungluongfile($email);
		   $dlfile = 0;
		   $row = mysql_fetch_array($result);
		   	if ($row[0] != NULL)	{
				   $dlfile = $row[0];
			}
		   //Dung lượng gói gốc
		   		  
			$dungluonggoc = $th->dungluonggoigoc();
			$row1 = mysql_fetch_array($dungluonggoc);
			//dang sd
			$dldl = 0;
					$ree= $th->goidangsdht($_SESSION["s_email"]);
					while($rowt = mysql_fetch_array($ree)){
						$dldl= $rowt[0];
						}
			$dungluongdangsd = $th->dungluonggoidangsd($email,$dldl );
			$goisd = 0;
			$row2 = mysql_fetch_array($dungluongdangsd);	
			if ($row2[0] != NULL)	
				   {
					   $goisd = $row2[0];
				   }
				   
?>
           <input type="hidden"  id="file" value = <?php echo $dlfile;?> >
           <input type="hidden"  id="dl" value = <?php echo ($row1[0] + $goisd)*1024*1024*1024;?> >
<tr>
<?php 
if ($dlfile == 0) {
	?>
   		<td id="b" style="min-width: 400px; height: 400px; max-width: 600px; margin: 0 auto"> </td>
   <?php
   }
   else if ( $dlfile >= ($row1[0] + $goisd)*1024*1024*1024) {
	   ?>
      	 <td id="c" style="min-width: 400px; height: 400px; max-width: 600px; margin: 0 auto"> </td>
       <?php 
	   }
   else {
	   ?>
		<td id="a" style="min-width: 400px; height: 400px; max-width: 600px; margin: 0 auto"></td>
	<?php
   }
   ?>
<td style="padding-left:30px;padding-top:0px" >
<p style="color:#006;font-size:25px;font-weight:bold "> Chi Tiết Sử Dụng</p>
<?php
 			//Dung lượng đã sử dụng
		   if ($row[0] != NULL)	{
				   $dlfile = $row[0];
				   if ($dlfile > 1024*1024*1024){
					   echo "Dung lượng đã sử dụng : ".round((($dlfile/1024)/1024)/1024, 3)." GB";}
					else if ($dlfile > 1024*1024){
					   echo "Dung lượng đã sử dụng : ".round(($dlfile/1024)/1024, 3)." MB";
				   }
				   else echo "Dung lượng đã sử dụng : ".round($dlfile/1024, 3)." KB";				   
				   echo "<br>";
				   
				   //Dung lượng của file office (word, powerpoint, txt,pdf,exel)
					   $dungluongoffice = $th->dungluongfileoffice($email);
					   $row11 = mysql_fetch_array($dungluongoffice);
					  
						$dlfileoffice = 0;
			
					   if ($row11[0] != NULL)	
					   {
							$dlfileoffice = $row11[0];
						   if ($dlfileoffice > 1024*1024*1024){
							   echo "&nbsp&nbsp&nbsp&nbsp+ Office : ".round((($dlfileoffice/1024)/1024)/1024, 3)." GB";}
							else if ($dlfileoffice > 1024*1024){
							   echo "&nbsp&nbsp&nbsp&nbsp+ Office : ".round(($dlfileoffice/1024)/1024, 3)." MB";
						   }
							else echo "&nbsp&nbsp&nbsp&nbsp+ Office : ".round($dlfileoffice/1024, 3)." KB";
							echo "<br>";
				   		}
				   //Dung lượng file nhạc video srt
					   $dungluongmedia = $th->dungluongfilemedia($email);
					   $row12 = mysql_fetch_array($dungluongmedia);					   
					   $dlfilemedia = 0;
			
					   if ($row12[0] != NULL)		 
					   {
							$dlfilemedia = $row12[0];
							if ($dlfilemedia > 1024*1024*1024){
							   echo "&nbsp&nbsp&nbsp&nbsp+ Media : ".round((($dlfilemedia/1024)/1024)/1024, 3)." GB";}
							else if ($dlfilemedia > 1024*1024){
							   echo "&nbsp&nbsp&nbsp&nbsp+ Media : ".round(($dlfilemedia/1024)/1024, 3)." MB";
						   }
							else echo "&nbsp&nbsp&nbsp&nbsp+ Media : ".round(($dlfilemedia/1024), 3)." KB";
							echo "<br>";
					   }
					// Dung lượng file ảnh
					   $dungluonganh = $th->dungluongfileanh($email);
					   $row13 = mysql_fetch_array($dungluonganh);
					   
						$dlfileanh = 0;
			
					   if ($row13[0] != NULL)
					   {
						   $dlfileanh = $row13[0];
						   if ($dlfileanh > 1024*1024*1024){
							   echo "&nbsp&nbsp&nbsp&nbsp+ File ảnh : ".round((($dlfileanh/1024)/1024)/1024, 3)." GB";}
							else if ($dlfileanh > 1024*1024){
							   echo "&nbsp&nbsp&nbsp&nbsp+ File ảnh : ".round(($dlfileanh/1024)/1024, 3)." MB";
						   }
						   else echo "&nbsp&nbsp&nbsp&nbsp+ File ảnh : ".round(($dlfileanh/1024), 3)." KB";
					   
						   echo "<br>";
					   }
				// Các loại file khác
					   $dungluongkhac = $th->dungluongfilekhac($email);
					   $row14 = mysql_fetch_array($dungluongkhac);
					   
					$dlfilekhac = 0;
			
					   if ($row14[0] != NULL)	
					   {
						   $dlfilekhac = $row14[0];
						   if ($dlfilekhac > 1024*1024*1024){
							   echo "&nbsp&nbsp&nbsp&nbsp+ File khác : ".round((($dlfilekhac/1024)/1024)/1024, 3)." GB";}
						    else if ($dlfilekhac > 1024*1024){
							    echo "&nbsp&nbsp&nbsp&nbsp+ File khác : ".round(($dlfilekhac/1024)/1024, 3)." MB";
					   }
					   else echo "&nbsp&nbsp&nbsp&nbsp+ File khác : ".round(($dlfilekhac/1024), 3)." KB";
					echo "<br>";
				   }
			}
		   else echo "Chưa sử dụng dung lượng nào";
		   //Dung lượng gói gốc
		   		   echo "<br>";

				   echo "Dung lượng gói gốc : ".$row1[0]." GB";			   
				   echo "<br>";



				   if ($row2[0] != NULL)	
				   {
					   $goisd = $row2[0];
					   echo "Dung lượng gói đang sử dụng : ".$goisd." GB <br/>(đến ngày ".date('d-m-Y', strtotime($row2[1])).")";
				   }
				   //Dung lượng còn lại
				   echo "<br>";
				   $dlcl = $goisd + $row1[0] - round((($dlfile/1024)/1024)/1024, 3);
				   if ($dlcl > 0)
				    	echo "Dung lượng còn lại : ".$dlcl." GB";
				   else echo "Dung lượng còn lại : 0 GB";
				  
		   ?>
           <p style="color:#F00"> Số liệu đã được làm tròn để phù hợp cho việc hiển thị. Nhưng dung lượng thật sự của bạn luôn được đảm bảo chính xác nhất.</p>
			<p style="color:#006;font-size:25px;font-weight:bold "> Tài khoản của bạn</p>
           <?php
		   
		   $tk = $th -> tientrongtk($email);
		  
		   $tientk = mysql_fetch_array($tk);
		   echo "Số Gold trong tài khoản : ".$tientk[0] ." Gold";
		   
?>
</td>


</tr>


</table>
</td>
</tr>
</table>
