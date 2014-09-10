        <style type="text/css">

.dong1 {
	height: 25px;
	color:#003;
	
	background-color:#CFF;
	padding: 5px;
	font-size: 16px;
}
.dong2 {
	height: 25px;
	color:#003;
	
	background-color:#FFF;
	padding: 5px;

	font-size: 16px;
}
.vb {
	border-top:1px solid #CCC;
	border-left: 1px solid #CCC;;
	}
.vb tr td {
	padding:5px;
	border-bottom:1px solid #CCC;
	border-right: 1px solid #CCC;;
	}

</style>





<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/tonghop.php");
$mafile = $_GET['txtmafile'];
$tenfile = $_GET['txttenfile'];
$ma = $mafile;

?>
<p style="color:#F00;font-size:20px;font-weight:bold;text-align:center "> Chi tiết báo cáo của các người dùng</p>
<p style="color:#006;font-size:17px;font-weight:bold;padding-left:8px; ">Tên file:  <span style="color:#F00;"><?php echo $tenfile;?></span></p>

<table border="0"  align="center" cellpadding="0" cellspacing="0" class="vb" >

    <tr style="font-size:18px; font-weight:bold;" align="center">
        <td width="150">
        Ngày Báo Cáo
        </td>
        <td width="150" >
        Người Báo Cáo
        </td>
        <td >
        Nội Dung Báo Cáo
        </td>
    </tr>
    		<?php 
            $bcvp = new tonghop();
			$mau=0;

            $bc = $bcvp->chi_tiet_bao_cao($ma);
			
            while($rowbc = mysql_fetch_array($bc)){

					$mau++;
							if($mau == 3) $mau = 1;	
     
    		 ?>
    <tr class ='dong<?php echo $mau;?>'>
            <td  style="padding-left:5px">
            <?php
            echo $rowbc['NGAY_BAO_CAO']; 
            ?>
            </td>
            <td style="padding-left:5px" >
            <?php
            echo $rowbc['EMAIL_TK']; 
            ?>
            </td>
            
            <td style="padding-left:5px">
            <?php
            echo $rowbc['LI_DO_BC']; 
            ?>
            </td>
    </tr>
    <?php
    
            }
    ?>

</table>
<?php

?>

