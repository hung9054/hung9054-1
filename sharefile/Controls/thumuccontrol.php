<style type="text/css">
	 .caythumuc ul {
		list-style: none;
		margin:0;
		
		}
	  .caythumuc ul li{
		  padding:5px;
		  }
	  .header_thumuc{
		  border-bottom:1px solid #CCC;
		  height:70px;
		  margin-top:10px;
		  }	  
	.header_thumuc .left{
		float:left;	
		background:#CCC;
		margin-left:10px;
		padding:5px;
		}
	.header_thumuc .left:hover{
		cursor:pointer;	
		}	 
	.header_thumuc .right{
		float:right;	
		margin-right:10px;
		padding:5px;
		border:2px solid #CCC;
		border-radius:5px;
		}	
	.header_thumuc .right div {
		float:left;
		}	
	 .inputtex:focus{
      outline: 0;
	 }
	 .iteamthumuc {
		 height:120px;
		 width:150px;
		 border:1px solid #CCC;
		 border-radius:5px;
		 float:left;
		margin:10px;
		font-weight:bold;
		color:#060;
		 }
		.iteamthumuc a {
			color:#030;
			text-decoration:none;
			} 
		.iteamthumuc a:hover{
			cursor:pointer;
			color:#00F;
			}	
	 .iteamthumuc div:hover {
		 cursor:pointer;
		 color:#00F;
		 }	
	#taofoder {
		position:absolute;
		width:1020px;
		height:800px;
		top:5px;
		 opacity: 0.6;
		background:#666666;	
		text-align:center;
		display:none;
		}
	#table_taofoder {
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
	#table_upload {
		position:absolute;
		border:1px solid #CCC;
		border-radius:5px;
		background:#FFF;
		height:500px;
		top:80px;
		margin-left: 100px;
		font-weight:bold;
		display:none;
		width:800px;
		}	
	#table_upload div div:hover{
		cursor:pointer;
		}	
	#my-button {
		background:url(Images/bt1qyq3_0.gif) no-repeat;
		height:40px;
		width:110px;
		float:left;
		margin:5px	
		}
	#myfile		{
		background:url(Images/myfile.gif) no-repeat;
		height:40px;
		width:100px;
		float:right;
		margin:5px;
	}
	#beginupload {
		background:url(Images/bt1qyq3_2.gif) no-repeat;
		height:40px;
		width:120px;
		float:right;
		margin:5px;
		}
	.sbthuc{
			width:100px;
			}
	.sbthuc:hover{
			cursor:pointer;
			color:#00C;
			}
	#menu_foder {
		background:#CCC;
		width:180px;
		display: none;
		position:absolute;
		}		
	#menu_foder div{
		padding:5px;
		}
	#menu_foder div img{
		margin-left:7px;
		}		
	#menu_foder div:hover{
		background:#F60;
		color:#FFF;
		cursor:pointer;
		}		
	#menu_foder div span{
		position:absolute;margin-left:10px;
		}
	.control_left a{
		color:#030;
		text-decoration:none;
		}	
	.control_left a:hover{
		color:#00F;
		text-decoration:underline;
		}
	#suaten {
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
	#suafile{
	    position:absolute;
		background:#CCC;
		width:200px;
		display:none;
		}	
	#suafile div:hover{
		background:#F30;
		cursor:pointer;
		color:#FFF;
		}
	.chiase:hover .pl_pv{
	    display:block;	
		margin-left:200px;
		top : -30px;
		background:#CCC;width:200px;
		}	
	#suafile .pl_pv:hover{
		background:#CCC;
		}	
	.pl_pv {
		position:absolute;
		display:none;
		color:#000;
		}
	.pl_pv div:hover{
		background:#F30;
		color:#FFF;
		}
	.pl_pv div{
		background:#CCC;
		color:#000;
		}				
	#suafile img{
		margin-left:10px;
		padding:5px;
		}
		#suafile span{
		position:absolute;
		margin-left:15px;
		margin-top:6px;
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
</style>
<script type="text/javascript">
	$(document).ready(function(){
	$('#my-button').click(function(){
    $('#file1').click();
	});
	});
    function allupload(){
		   document.getElementById('beginupload').style.display = 'none';
		   $('#load0').click();
		  }

	 function rename_thumuc(ma) //ham lay thong tin 
    {
	 var ten= '';
	 if(document.getElementById('txttensua').value	 != ""){
		 ten+='&tenthumuc='+document.getElementById('txttensua').value;
		 document.getElementById('txttensua').value = "";
		 }	
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
         document.getElementById("main_thumuc").innerHTML =xmlhttp.responseText;
         xmlhttp = null;                          
        }
      }
     xmlhttp.open("GET","Controls/ajaxrenam.php?code="+ma+ten,true);
     xmlhttp.send();
    
    return false;
       
    }
		  
	 function getthumuc_file(ma) //ham lay thong tin 
    {

     document.getElementById("hidden_mathumuc").value =ma;
	 var ten= '';
	 if(document.getElementById('txtten').value	 != ""){
		 ten+='&tenthumuc='+document.getElementById('txtten').value;
		 document.getElementById('txtten').value = "";
		 }	
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
         document.getElementById("main_thumuc").innerHTML =xmlhttp.responseText;
         xmlhttp = null;                          
        }
      }
     xmlhttp.open("GET","Controls/Ajaxthumuc.php?code="+ma+ten,true);
     xmlhttp.send();
    
    return false;
       
    }
	function hiddentablefile(){
		document.getElementById('taofoder').style.display = 'none';
		document.getElementById('table_upload').style.display = 'none';
		document.getElementById('result0').innerHTML = "";
		document.getElementById('beginupload').style.display = 'block';
	    document.getElementById('myfile').style.display = 'block';
		getthumuc_file(document.getElementById('hidden_mathumuc').value);
		}
	function calltablefoder(){
		document.getElementById('taofoder').style.display = 'block';
		document.getElementById('table_taofoder').style.display = 'block';
		}
	function calltalerename(){
		document.getElementById('taofoder').style.display = 'block';
		document.getElementById('suaten').style.display = 'block';
		}
	function calltalerenamefile(){
		document.getElementById('taofoder').style.display = 'block';
		document.getElementById('suafile').style.display = 'block';
		}	
	function exittalerename(){
		document.getElementById('taofoder').style.display = 'none';
		document.getElementById('suaten').style.display = 'none';
		}			
		function exittablefoder(){
		document.getElementById('taofoder').style.display = 'none';
		document.getElementById('table_taofoder').style.display = 'none';
		}
	function outfoder(ten){
		if( ten== ""){
			alert ("bạn chưa nhập tên thu mục");
			return false;
			}
		else{	
		document.getElementById('taofoder').style.display = 'none';
		document.getElementById('table_taofoder').style.display = 'none';
		getthumuc_file(document.getElementById('hidden_mathumuc').value);
		 }
		}
		function outrename(ten){
		if( ten== ""){
			alert ("bạn chưa nhập tên thu mục");
			return false;
			}
		else{	
		document.getElementById('taofoder').style.display = 'none';
		document.getElementById('suaten').style.display = 'none';
		rename_thumuc(document.getElementById('clickright_mathumuc').value);
		 }
		}
 function calltablefile(){
	 document.getElementById('taofoder').style.display = 'block';
		document.getElementById('table_upload').style.display = 'block';
	 }
	 
	 
	 var iti = 0;
var maxiti =2;
/* Script written by Adam Khoury @ DevelopPHP.com */
/* Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */
function _(el){
	return document.getElementById(el);
}
function uploadFile(stt,mathumuc){
	iti = stt;
	var file = _("file1").files[stt];
	//alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("file1", file);
	formdata.append("mathumuc", mathumuc);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "file_upload_parser.php");
	ajax.send(formdata);
}
function progressHandler(event){
	_("loaded_n_total"+iti).innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
	var percent = (event.loaded / event.total) * 100;
	_("progressBar"+iti).value = Math.round(percent);
	_("status"+iti).innerHTML = Math.round(percent)+"%";
}
function completeHandler(event){
	_("status"+iti).innerHTML = event.target.responseText;
	_("progressBar"+iti).value = 100;
	if(_("progressBar"+iti).value == 100){
		if(iti<maxiti){
			iti++;
			$('#load'+iti).click();   
			}
		
		}
}
function errorHandler(event){
	_("status"+iti).innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("status"+iti).innerHTML = "Upload Aborted";
}

function getlegth(){
	var num = _("file1").files.length;
	i=0;
	maxiti = num;
	document.getElementById('wait').style.display = 'block';
    getFile(num);	
	}

function getFile(stt){
	//alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	for(i=0;i<stt;i++){
		var fil = _("file1").files[i];
		formdata.append("file"+i, fil);
		}
	
	formdata.append("sophantu", stt);
	var ajax = new XMLHttpRequest();
	
	 ajax.onreadystatechange=function()
   {
  if (ajax.readyState==4 && ajax.status==200)
    {
    document.getElementById("result0").innerHTML=ajax.responseText;
	document.getElementById('wait').style.display = 'none';
    }
	}
  
	ajax.open("POST", "fech.php");
	
	ajax.send(formdata);
}	


function right(context){
	    var $menu = $('#menu_foder');
	    var $wmenu = $menu.outerWidth();
	    var $hmenu = $menu.outerHeight();
	    $('#'+context).bind('contextmenu', function(e){
		document.getElementById("clickright_mathumuc").value = context;
		$('#suafile').hide();	
		var $leftm=e.clientX+200, $topm=e.clientY+100;
		var $rightm = $(this).width() - $leftm;
		var $bottomm = $(this).height() - $topm;
		if($rightm  <  $wmenu) $leftm -= $wmenu;
		if($bottomm < $hmenu) $topm -= $hmenu;
		$menu.css({display:'block',left: $leftm, top: $topm});
		e.preventDefault();
		}).click(function(){
		$menu.hide();
		});
	}
	
	function rightfile(context){
	    var $menu = $('#suafile');
	    var $wmenu = $menu.outerWidth();
	    var $hmenu = $menu.outerHeight();
	    $('#fil'+context).bind('contextmenu', function(e){
		$('#menu_foder').hide();
		document.getElementById("right_mafile").value = context;
		var $leftm=e.clientX+200, $topm=e.clientY+100;
		var $rightm = $(this).width() - $leftm;
		var $bottomm = $(this).height() - $topm;
		if($rightm  <  $wmenu) $leftm -= $wmenu;
		if($bottomm < $hmenu) $topm -= $hmenu;
		$menu.css({display:'block',left: $leftm, top: $topm});
		e.preventDefault();
		}).click(function(){
		$menu.hide();
		});
	}
	
	$(document).ready(function(){
	 var $menu = $('#menu_foder');
	 var $wmenu = $menu.outerWidth();
	 var $hmenu = $menu.outerHeight();
	$(window).click(function(){
		$menu.hide();
		$('#suafile').hide()
		}); });		
</script>

<?php include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Configs/hamdequi.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/thumuc.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/file.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/thongtinnguoidung.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/loai_goi.php");
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/tonghop.php");
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
					while($row = mysql_fetch_array($ree)){
						$dldl= $row[0];
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
        <div class="header_thumuc">
               <div class="left" title="Tạo thu mục" onclick="return calltablefoder()">
               <img src="Images/folder-new-7.png" height="48"  />
               </div>
               <div  class="left" title="Tải file lên" onclick="return calltablefile()">
               <img src="Images/uploadfile.jpg" height="48"  />
               </div>
               
               <div  class="right" style="border:0px solid;" >
               <?php 
			   if($_SESSION["goisd"]!="G1"){
			    $g = new tonghop();
				 $dddd = "0000-00-00";
				 $dldl = 0;
					$ree= $g->goidangsdht($_SESSION["s_email"]);
					while($rowt = mysql_fetch_array($ree)){
						$dldl= $rowt[0];
						}
					$re = $g  ->dungluonggoidangsd($_SESSION["s_email"], $dldl);
					while($row = mysql_fetch_array($re)){
						$dddd =$row[1];
						}
						?>
                        <span style="color:#00F;">Ngày hết hạn :</span>
               <span style="color:#F00;"><?php  echo $dddd; ?> </span>
                        <?php
						
			   }
			    ?>
                
               </div>
               
      
        </div>
      
        <div id="main_thumuc"  class="main_thumuc">
          <div class="com_back" onclick="return getchathumuc(document.getElementById('hidden_mathumuc').value)">
                            <div><img src="Images/go-previous-9.png"/>
                            </div>
         </div>
        	<?php 
			             $c = new thumuc();
						 $numroot = -1;
						 $re = $c->minthumuc($_SESSION['s_email']);
						while($row = mysql_fetch_array($re)){
							$numroot= $row[0];
							}
						 $result = $c->fetchthumuc($numroot);
			           while($rowthumuc = mysql_fetch_array($result)){
				        ?>
                            <table cellpadding="0" cellspacing="0" class="iteamthumuc" border="0">
                            <tr>
                               <td align="center">
                               <img src="Images/foder.jpg" height="60px"  />
                               </td>
                            </tr>
                             <tr>
                               <td align="center" valign="top">
                               <div id="<?php echo $rowthumuc[0]; ?>" onmousedown="right(<?php echo $rowthumuc[0];?>)" onclick="return getthumuc_file(<?php echo $rowthumuc[0]; ?>);"><?php echo $rowthumuc[2]; ?></div>
                               </td>
                            </tr>
                            </table>          
                
                <?php
				}
			?>
             <?php 
			 $f = new File();
			 $result = $f->fetchfile_thumuc($numroot);
          	  while($rowthumuc = mysql_fetch_array($result)){
				  ?>
                   <table cellpadding="0" cellspacing="0" class="iteamthumuc" border="0">
                            <tr>
                               <td align="center">
                               <?php 
							   if($rowthumuc[3]==2){
								   ?>
                                   <img src="Images/Microsoft-Word-icon.png" height="60px"  />
								   <?php
								   }
								  elseif($rowthumuc[3]==3) {
									  ?>
                                      <img src="Images/Microsoft-Excel-icon.png" height="60px"  />
                                      <?php
									  }
									  elseif($rowthumuc[3]==6) {
									  ?>
                                      <img src="Images/applications-multimedia-3.png" height="60px"  />
                                      <?php
									  }  
									   elseif($rowthumuc[3]==10) {
									  ?>
                                      <img src="Images/document-compress-icon.png" height="60px"  />
                                      <?php
									  }  
									  elseif($rowthumuc[3]==8) {
									  ?>
                                      <img src="Images/txt32x32b.png" height="60px"  />
                                      <?php
									  }
									   elseif($rowthumuc[3]==7) {
									  ?>
                                      <img src="Images/mp3.jpg" height="60px"  />
                                      <?php
									  } 
									   elseif($rowthumuc[3]==11) {
									  ?>
                                      <img src="Images/pdf.jpg" height="60px"  />
                                      <?php
									  }       
									  else{
										  ?>
                                           <img src="Images/applications-system-5.png" height="60px"  />
                                          <?php
										  } 
							   ?>
                               
                               </td>
                            </tr>
                             <tr>
                               <td align="center" valign="top">
                               <a target="_blank" id="fil<?php echo $rowthumuc[0]; ?>" onmousedown="rightfile(<?php echo $rowthumuc[0];?>)" href="index.php?content=download&code=<?php echo $rowthumuc[7];?>" ><?php echo $rowthumuc[4];?></a>
                               </td>
                            </tr>
                            </table>      
                  <?php
			  }
        	 ?>
        </div>
        </td>
    </tr>
</table>

<table id="taofoder" cellpadding="0" cellspacing="0" border="0" align="center" >
	<tr>
    	<td align="center">
       
        </td>
    </tr>
</table>
 <div id="table_taofoder" >
 	<div style="background:#F00;text-align:center;color:#FFF;padding:10px;border-top-left-radius:20px;border-top-right-radius:20px;font-size:20px;">
    Tạo Thu Mục
    </div>
    <div style="padding:15px;text-align:center">
    <span>Tên thư mục </span><span> <input type="text" id="txtten"/></span>
    </div>
    <div style="text-align:center;">
    	<input class="sbthuc" type="button"  value="tao" name="bttao" onclick="return outfoder(document.getElementById('txtten').value)"/>
        <input class="sbthuc" type="button"  value="Hủy" name="bttao" onclick="return exittablefoder()"/>
        <input  type="hidden" name="hidden_mathumuc" id="hidden_mathumuc" value="<?php echo $numroot; ?>"/>
        <input  type="hidden" name="clickright_mathumuc" id="clickright_mathumuc" value="<?php echo $numroot; ?>"/>
        <input  type="hidden" name="right_mafile" id="right_mafile" value="<?php echo $numroot; ?>"/>
    </div>
 </div>
 
 <div id="table_upload" >
 	<div style="height:40px;background:url(Images/background.png);">
     	<div style="float:left; font-size:18px;font-weight:bold;color:#03F;padding:5px;">
        Tập tin tải lên
        
        </div>
        <div id="wait" style="display:none;float:left;"><img src="Images/wait.gif"/></div>
        <div style="background:url(Images/dialog-close.png);float:right;height:32px;width:32px;" onclick="hiddentablefile()"></div>
    </div>
    <div id="result0" style="height:400px;">
    </div>
    <div style="height:60px;background:url(Images/background.png);">
        <div id="my-button" >
        </div>
        <input type="file" id="file1" multiple="" style="display:none;" onchange="getlegth()"/>
    
     <div id="myfile" onclick="hiddentablefile()" >
        </div>
        <div id="beginupload" onclick="allupload()">
        </div>
        </div>
 </div>
         
         <div class="menu_foder" id="menu_foder">
         <div onclick="return getthumuc_file(document.getElementById('clickright_mathumuc').value);">
           <img src="Images/foder.jpg" height="20px"/> <span > Mơ</span>
         </div>
       
          <div onclick="calltalerename()">
          <img src="Images/tools-check-spelling-5.png" height="20px"  /><span>Đổi tên</span>
         </div>
           <div onclick="xoa_thumuc(document.getElementById('clickright_mathumuc').value)">
          <img src="Images/dialog-no-2.png" height="20px" /><span> Xóa</span>
         </div>
         </div>
         
 <div id="suaten" >
 	<div style="background:#F00;text-align:center;color:#FFF;padding:10px;border-top-left-radius:20px;border-top-right-radius:20px;font-size:20px;">
    Đổi tên thư mục
    </div>
    <div style="padding:15px;text-align:center">
    <span>Tên mới </span><span> <input type="text" id="txttensua"/></span>
    </div>
    <div style="text-align:center;">
    	<input class="sbthuc" type="button"  value="Xác nhận" name="bttao" onclick="return outrename(document.getElementById('txttensua').value)"/>
        <input class="sbthuc" type="button"  value="Hủy" name="bttao" onclick="return exittalerename()"/>
        
    </div>
 </div>         
 
 
    <div class="suafile" id="suafile">
          <div class="chiase">
          <img src="Images/tools-check-spelling-5.png" height="20px"  /><span>Chia sẻ</span>
          <div class="pl_pv">
          			<div onclick="privatefile()">
                      <img src="Images/Private-Folder-icon.png" height="20px" /><span> Cá nhân</span>
                     </div>
                     <div onclick="publicfile()">
                      <img src="Images/Alarm-Public-icon.png" height="20px" /><span> Mọi người</span>
                     </div>
          </div>
         </div>
         
           <div onclick="deletemafile()">
          <img src="Images/dialog-no-2.png" height="20px" /><span> Xóa</span>
         </div>
          <div onclick="calltablesetmk()">
          <img src="Images/lock.png" height="20px" /><span> Mật khẩu bảo vệ</span>
         </div>
         </div>
 
  <div id="mkfile" >
 	<div style="background:#F00;text-align:center;color:#FFF;padding:10px;border-top-left-radius:20px;border-top-right-radius:20px;font-size:20px;">
    Tạo mật khẩu bảo vệ
    </div>
    <div style="padding:15px;text-align:center">
    <span>Mật khẩu </span><span> <input type="text" id="txtsetmk"/></span>
    </div>
    <div style="text-align:center;">
    	<input class="sbthuc" type="button"  value="Xác nhận" name="bttao" onclick="return checktxtmatkhau(document.getElementById('txtsetmk').value)"/>
        <input class="sbthuc" type="button"  value="Hủy" name="bttao" onclick="return exittablesetmk()"/>
        
    </div>
 </div>               
 <script type="text/javascript">
 function calltablesetmk(){
	 document.getElementById('taofoder').style.display = 'block';
		document.getElementById('mkfile').style.display = 'block';
	 }
 function exittablesetmk(){
	 document.getElementById('taofoder').style.display = 'none';
		document.getElementById('mkfile').style.display = 'none';
		document.getElementById('txtsetmk').value = "";
	 } 
 function checktxtmatkhau(txtmk){
	 if(txtmk==""){
		 alert ("Bạn chua nhập vào mật khẩu");
		 }
	 else {
		 exittablesetmk();
		 getmatkhau(document.getElementById("right_mafile").value,txtmk);
		 }	 
	 }	
function getmatkhau(mafile,textmk)	{
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
         xmlhttp = null;    
		 getchathumuc(document.getElementById('hidden_mathumuc').value);                      
        }
      }
     xmlhttp.open("GET","Controls/ajaxmkfile.php?code="+mafile+"&text="+textmk,true);
     xmlhttp.send();
    
    return false;
	}  
 function deletemafile(){
	 var ma= (document.getElementById("right_mafile").value);
	 var xmlhttp;
	 var mathumuc = document.getElementById('hidden_mathumuc').value;
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
		 document.getElementById("main_thumuc").innerHTML =xmlhttp.responseText;
         xmlhttp = null;    
		                      
        }
      }
     xmlhttp.open("GET","Controls/deletedfile.php?code="+ma+"&matm="+mathumuc,true);
     xmlhttp.send();
    
    return false;
	 }
	
	function publicfile(){
	 var ma= (document.getElementById("right_mafile").value);
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
         xmlhttp = null;    
		                      
        }
      }
     xmlhttp.open("GET","Controls/ajaxpublic.php?code="+ma,true);
     xmlhttp.send();
    
    return false;
	 } 
	 function privatefile(){
	 var ma= (document.getElementById("right_mafile").value);
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
         xmlhttp = null;                         
        }
      }
     xmlhttp.open("GET","Controls/ajaxprivate.php?code="+ma,true);
     xmlhttp.send();
    
    return false;
	 } 
	 
	  function xoa_thumuc(ma) //ham lay thong tin 
    {
	 var ten= '';
	 if(document.getElementById('txttensua').value	 != ""){
		 ten+='&tenthumuc='+document.getElementById('txttensua').value;
		 document.getElementById('txttensua').value = "";
		 }	
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
         document.getElementById("main_thumuc").innerHTML =xmlhttp.responseText;
         xmlhttp = null;                          
        }
      }
     xmlhttp.open("GET","Controls/deletefoder.php?code="+ma+ten,true);
     xmlhttp.send();
    
    return false;
       
    }	
 </script>
