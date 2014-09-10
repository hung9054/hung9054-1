
<style type="text/css">
	 .inputtex:focus{
      outline: 0;}
	  .timk:hover{
		  cursor:pointer;
		  background:#FFF;
		  }
</style>


    
<script  type="text/javascript" src="libraries/timkiemfile.js"> </script>
        <div style="font-size:24px;color:#F00;text-align:center;margin-top:40px;text-shadow:#000;margin-bottom:10px;">
        	Sharefile.com
        </div>
        <div class="bodyStyle">
            <form name="timkiem" method="get" action="">
                <!-- bang hien thi -->  
          
                
                <table align="center" class="font" width="380" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                                <td> <div style="border:1px solid #CCC;padding:3px;border-radius:5px;"><input class="inputtex" style="border-radius:5px; border: 0px solid;font-size:16px;" name="txttenld" type="text" id="txttenfile"   size="50" maxlength="50" onKeyUp="checktimeout()" placeholder="Nhập tên file cần tìm" ></div>
                                </td>
                    
                                <td>
                                <img class="timk" style="background:#CCC;margin-left:5px;border-radius:5px;" src="../Images/system-search-6.png" height="30px"  name="btntim" id="btntim" onClick="return checktimeout2()"/>
                                
                                  </td>
                    </tr>
               <?php 
			   if (isset($_SESSION['fdssd'])) {

				   ?>
                    <tr>
                            <td colspan="2">
        
                                      <input type="checkbox" name="check" id="check" > Chỉ tìm trên file của tôi
               
                                
                             </td>
                     </tr>
               <?php   
			   }
			   else
			   {
			   ?>
               <input type="hidden" name="check" id="check" >
			   
               <?php
			   }
               ?>

              
            
                </table>
                <div id="xuathienchonay">        </div>
</form>
    </div>
    <div style="height:60px;">

</div>

