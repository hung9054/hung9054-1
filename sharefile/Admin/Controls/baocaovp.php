<?php
error_reporting(E_ALL ^ E_NOTICE);
 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/tonghop.php");
 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/controls/c_xoabc.php");

?>

<script type="text/javascript">

// funtion lay gia tri tu radio button "chon"
    function getValue(id) {
        document.xlvp.txtmafile.value = document.getElementById("mafile" + id).innerHTML;
		document.xlvp.hidd.value = document.getElementById("mafile" + id).innerHTML;
		document.xlvp.txttenfile.value = document.getElementById("tenfile" + id).innerHTML;
		document.xlvp.txtnguoiup.value = document.getElementById("nguoiup" + id).innerHTML;
		document.xlvp.txtluottai.value = document.getElementById("luottai" + id).innerHTML;
		




        document.xlvp.btxem.disabled = false;
        document.xlvp.btxoafile.disabled = false;
		document.xlvp.btxoabc.disabled = false;

    }


    function confirmDeletefile() {
        if (confirm("Bạn có chắc muốn xóa file này không?")) {
            return true;
        }
        return false;
    }
    function confirmDeletebc() {
        if (confirm("Bạn có chắc muốn xóa các báo cáo file này không?")) {
            return true;
        }
        return false;
    }



</script>

<!doctype html>
<html>
    <head>
        <meta charset=utf-8 />
        <title>Xử lý báo cáo vi phạm</title>
        <style type="text/css">
.chot tr td{
	border-bottom: 1px solid #999;
	padding:5px;
	}

.dong1 {
	height: 25px;
	color:#003;
	
	background-color:#CFF;
	padding-left: 5px;
	font-size: 16px;
}
.dong2 {
	height: 25px;
	color:#003;
	
	background-color:#FFF;
	padding-left: 5px;

	font-size: 16px;
}
.daubang {
	font-size:18px;
	font-weight: bold;
	background:#066;
	color:#FFF;	
	
}

</style>
<script  type="text/javascript" >
function xemchitiet(){
	document.getElementById('khung').style.display ='block';
	document.getElementById('ctbc').style.display ='block';
	var txtmafile = document.getElementById("txtmafile").value;
	var txttenfile = document.getElementById("txttenfile").value;

	
	var xmlhttp;
		if (window.XMLHttpRequest)
		  {
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {

		    document.getElementById("ctbc").innerHTML=xmlhttp.responseText;
		    }
		  }

		xmlhttp.open("GET","controls/c_xulybcvp.php?txtmafile="+txtmafile+"&txttenfile="+txttenfile,true);
		xmlhttp.send();

		return false;

}


 </script>

    </head>

    <body>
    <div style="height:50px;">
	
</div>

        <div class="bodyStyle">
            <form name="xlvp" method="post" action="">
                <!-- bang hien thi -->  
                <table align="center"  width="600" border="0" cellspacing="1" cellpadding="2">
                    <tr bgcolor="#dae9f3">

                        <td align=center   height="35" style="color:#F00;font-size:18px;"> &equiv; Xử lý báo cáo vi phạm</td>
                    </tr>
                    <tr bgcolor="#dae9f3">
                        <td colspan="4" valign="top"><table width="600" border="0" align="center" >

                                <tr>
                                    <td width="100" height="25" > Mã file </td>
                                    <td width="200" align="left"  ><input name="txtmafile" type="text" id="txtmafile"   maxlength="40" disabled="true"  size="25px"  >
                                     <input  type="hidden" id="hidd"  name="hidd"  maxlength="40"  size="25px"  >
                                    <td width="80" height="25" > Tên file </td>
                                    <td width="220" align="left"  ><input name="txttenfile" type="text" id="txttenfile" maxlength="100" disabled="true"  size="25px">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="100" height="25" > Người Upload </td>
                                    <td width="200" align="left"  ><input name="txtnguoiup" type="text" id="txtnguoiup"   maxlength="40" disabled="true" size="25px">
                                    <td width="80" height="25" > Số lượt tải </td>
                                    <td width="220" align="left"  ><input name="txtluottai" type="text" id="txtluottai" maxlength="100" disabled="true" size ="25px">
                                    </td>
                                </tr>                                
                                <tr>
                                    <td colspan="4"  id="btn_x">
                                        <input type = "button" name="btxem" id="btxem" value="Xem chi tiết" disabled="true" onClick="xemchitiet()">


                                        <input type="submit" name="btxoafile" id="btxoafile" value="Xóa file"  disabled="true" onClick="return confirmDeletefile()">
                                        <input type="submit" name="btxoabc" id="btxoabc" value="Xóa báo cáo file"  disabled="true" onClick="return confirmDeletebc()">
                                    </td>
                                </tr>
                            </table></td>
                    </tr>
                </table>
                <br>
                <br>
                <!-- lay du lieu tu bang don vi va hien thi -->
                <?php
                $filevp = new tonghop();
                $result = $filevp->filebaocao();
				?>

                
				<table  border='0' cellspacing='0' style='border:1px solid #36C;' class='chot' width='840px' align='center' >
       			<tr>
                    <th align='left' style='padding-left:10px'  colspan="7" class="daubang"> Danh sách file vi phạm
                    </th>        
       			 </tr>
                <tr>
                    <th width='40' align='center' >STT</th>
                    <th width='100' align='center'  >Mã file</th>
                    <th width='250' align='left' >Tên file</th>
                    <th width='200' align='left' >Người upload</th>
                    <th width='50' align='center' >Số lượt tải</th>
                    <th width='150' align='center' >Số lượt báo cáo</th>
                    <th width='50' align='center'>Chọn</td>
                </tr>

				<?php
                $num = mysql_num_rows($result);
                $i = 0;
				$mau=0;
				$ttfile = new tonghop();
				$ktfile = new tonghop();
				?>
                <tbody style='display:none;'>
                <?php
                while ($row = mysql_fetch_array($result)) {
					 $kt = $ktfile->ktfilebixoa($row['MA_FILE']);
					 $dem = mysql_num_rows($kt);
					 if ($dem > 0) {
							$mau++;
							if($mau == 3) $mau = 1;	
							$i++;
						
							$file = $ttfile->filetheoma($row['MA_FILE']);
							$rowfile = mysql_fetch_array($file);
					?>  
							</tbody>
							<tr class ='dong<?php echo $mau; ?>'>
							<td align='center'  > <?php echo $i; ?> </td>
							<td  align='center' ><div id='mafile<?php echo $i; ?>'> <?php  echo $row['MA_FILE'];?> </div></td>
							<td  align='left' ><div id='tenfile<?php echo $i; ?>'> <?php  echo $rowfile['ten_file'];?> </div></td>
							<td  align='left' ><div id='nguoiup<?php echo $i; ?>'> <?php  echo $rowfile['email_tk'];?></div></td>
							<td  align='center' ><div id='luottai<?php echo $i; ?>'> <?php  echo $rowfile['SO_LUOT_DOWN'];?> </div></td>
							<td  align='center' ><div id='luotbc<?php echo $i; ?>'> <?php  echo $row[1];?></div></td>
	
							<td  align='center' ><input type='radio' name='chkchon' value='<?php echo $i; ?>' onClick='getValue(this.value);' ></td>
							</tr>
                            
						<?php
					}
				}
				
				?>
			</tbody>
               <tr>
               <td align='left' colspan='7'><span style=' color:#008000'>Tổng số file vi phạm: <?php echo $i; ?>         </span></td>

                </tr>
                </table>

            </form>
            <!-- het bang -->

    </div>
   
  <div id="khung" style="height:525px;width:608px;background:#F60; position:absolute;top:100px;left:300px; display:none; margin:auto; ">
  <img src="Images/close3.png" width="25px" height="17px" align="right" onclick="document.getElementById('khung').style.display ='none'" >
<div  id="ctbc" style="height:500px;width:600px;background:#FFF;  display:none; margin-top:22px;margin-left:4px; overflow:scroll;" >
     

    </div>
</div>
<div style="height:50px;">
	
</div>

</body>
</html>
