    
<div style="height:30px;">
</div>
<?php

error_reporting(E_ALL ^ E_NOTICE);
 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/tonghop.php");
  include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/view/Paginator.php");


?>
<script  type="text/javascript" src="Libraries/thongkeadmin.js"> </script>
	
	<style>
		.ui-highlight .ui-state-default{
			background: red !important;
			border-color: red !important;
			color: white !important;
		}
	</style>
	<script type="text/javascript" language="javascript">		
		 $(function() {
        $( "#ngaybd" ).datepicker({
      yearRange: "-30:+30",
      changeYear: true,
        changeMonth :true,

dateFormat:'dd-mm-yy',autoSize:true
}

);
    });
			 $(function() {
        $( "#ngaykt" ).datepicker({
      yearRange: "-30:+30",
      changeYear: true,
        changeMonth :true,

dateFormat:'dd-mm-yy',autoSize:true
}

);
    });
	</script>

        <div class="bodyStyle">
            <form name="cnnd" method="post" action="" >
                <!-- bang hien thi -->  
                <table align="center"  width="600" border="0" cellspacing="1" cellpadding="2" >
                    <tr bgcolor="#dae9f3">

                        <td align=center   height="35" > &equiv; Thống kê tình hình hoạt động </td>
                    </tr>
                    <tr bgcolor="#dae9f3">
                        <td colspan="4" valign="top">
                        <table width="600" border="0" align="center" >
                           <tr>
                                    <td >Ngày bắt đầu</td>
                                    <td  ><input  type="text" class="ngaysinh" name= "ngaybd" id="ngaybd"   maxlength="40"   size="30px"  >
                                    </td>
                                   <td style="padding-left:20px;">Ngày kết thúc</td>
                                    <td  ><input  type="text" class="ngaykt" name= "ngaykt" id="ngaykt"   maxlength="40"   size="30px"  >
                                    </td>
                                    
                        </tr>
                                 
                                <tr>
                                    <td colspan="4"  id="btn_x" align="center" height="30px">
                                        <input type="button" name="bttkad" id="bttkad" value="Thống kê" onClick="return thongkeadmin()"  >

                                         <input type="reset" name="bthuy" id="bthuy" value="Hủy" >
                                    </td>
                                </tr>
                            </table>
                            </td>
                    </tr>
                </table>
 			<div><div id="xuathienchonay">  </div></div>
            </form>
<div style="height:30px;">
</div>
