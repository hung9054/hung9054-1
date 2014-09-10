<?php 
   include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Configs/hamdequi.php");
    session_start();
	 function findexts ($filename) 
			{ 
		        $filename = strtolower($filename) ; 
				$exts = explode('.', $filename) ; 
				$n = count($exts)-1; 
				$exts = $exts[$n]; 
				 return $exts; 
			 } 		
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
			$a->setTEN_THU_MUC($_GET['tenthumuc']);
			$a->setMA_THU_MUC($ma);
		    $a->suathumuc();
	
		}
		 
	      $thumuc = new thumuc();
			$thumuc->setMA_THU_MUC($ma);
			$kq = $thumuc->fetchallthumuc();
			$mathumuccha = 0;
			$macha =0;
			while($rowss = mysql_fetch_array($kq)){
				$mathumuccha = $rowss[4];
				}
				if($mathumuccha==0) $mathumuccha=$ma;
				else{
				$thumuc->setMA_THU_MUC($mathumuccha);
				$kq = $thumuc->fetchallthumuc();
				
				while($rowss = mysql_fetch_array($kq)){
				$macha = $rowss[4];
				}
				}
				if($macha==0) $macha=$mathumuccha;		
				?>
                 <div class="com_back" onclick="return getthumuc_file(<?php echo $macha; ?>)">
                           <div> <img src="Images/go-previous-9.png"/></div>
                            </div>
                <div>
                <?php	
				 $c = new thumuc();
				  $c->setMA_THU_MUC($ma);
				  $result = $c->fetchallthumuc();
				  xoadequithumuc($result);			
            $c = new thumuc();
			$result = $c->fetchthumuc($mathumuccha);
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
			 $result = $f->fetchfile_thumuc($mathumuccha);
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
                               <a target="_blank" id="fil<?php echo $rowthumuc[0]; ?>" onmousedown="rightfile(<?php echo $rowthumuc[0];?>)" href="index.php?content=download&code=<?php echo $rowthumuc[7];?>" ><?php echo $rowthumuc[4];?>
                               </td>
                            </tr>
                            </table>      
                  <?php
			  }
	   }
        	 ?>			