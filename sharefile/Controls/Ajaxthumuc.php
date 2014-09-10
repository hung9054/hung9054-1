<?php 
    session_start();
	if(!isset($_SESSION["s_email"])){
	   echo "<script> location.href='index.php'; </script>";
	   }
	  else{ 
    include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Configs/hamdequi.php");
    include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/thumuc.php");
	include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/file.php");
	$ma = $_GET['code'];
	if(isset($_GET['tenthumuc'])){
		    $a = new thumuc();
			$re = $a->maxthumuc();
			$number=0;
			while($row = mysql_fetch_array($re)){
				$number= $row[0]+1;
				}
			$a->setallTHU_MUC();
			$resu = $a->CURDATE();
			while($roww = mysql_fetch_array($resu)){
				$a->setNGAY_TAO_TH($roww[0]);
				}
			$a->setTEN_THU_MUC($_GET['tenthumuc']);
			$a->setMA_THU_MUC($number);
			$a->setMA_THU_MUC_CHA($ma);
			$a->setEMAIL_TK($_SESSION['s_email']);
		    $a->themthumuc();
	
		}
	$thumuc = new thumuc();
			$thumuc->setMA_THU_MUC($ma);
			$kq = $thumuc->fetchallthumuc();
			$mathumuccha = 0;
			while($rowss = mysql_fetch_array($kq)){
				$mathumuccha = $rowss[4];
				}
				if($mathumuccha==0) $mathumuccha=$ma;	
				?>
                 <div class="com_back" onclick="return getthumuc_file(<?php echo $mathumuccha; ?>)">
                           <div> <img src="Images/go-previous-9.png"/></div>
                            </div>
                <div>
                <?php				
            $c = new thumuc();
			$result = $c->fetchthumuc($ma);
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
			 $result = $f->fetchfile_thumuc($ma);
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
                               <td align="center" valign="top" >
                               <a target="_blank" href="index.php?content=download&code=<?php echo $rowthumuc[7];?>" id="fil<?php echo $rowthumuc[0]; ?>" onmousedown="rightfile(<?php echo $rowthumuc[0];?>)"><?php echo $rowthumuc[4];?>
                               </td>
                            </tr>
                            </table>      
                  <?php
			  }
	  }
        	 ?>			