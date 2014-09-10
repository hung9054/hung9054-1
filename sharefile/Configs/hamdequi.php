<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/thumuc.php");
 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/file.php");
 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/chi_tiet_bc_vp.php");

 function xoadequithumuc($a){
	   $row=mysql_num_rows($a);
	   if($row >0){
		     while($rows= mysql_fetch_array($a)){
			 
			 ?>
            
                <?php 
				$c = new thumuc();
 				$c->setMA_THU_MUC($rows[0]);
				 $c->xoathumuc();
				 $f = new File();
				 $rf = $f-> fetchfile_thumuc($rows[0]);
				 while($rowf = mysql_fetch_array($rf)){
					 $type = findexts($rowf[4]);
					 $f->setMA_FILE($rowf[0]);
					 if($f->xoafile()){
						$t = new chi_tiet_bc_vp();
						$t->xoachi_tiet_bc_vp($rowf[0]);
					    }
						if (file_exists("../file/".$rowf[0].".".$type)){
						  unlink("../file/".$rowf[0].".".$type);
						}
					 }
				 ?>
                 <?php  $b = new thumuc();
				 $result =$b->fetchthumuc($rows[0]);  
				   xoadequithumuc($result);
				 ?>
            
             
  <?php
			 
				 }
		   }
	   }
?>
<?php /*
 $c = new thumuc();
 $c->setMA_THU_MUC("37");
  $result = $c->fetchallthumuc();
 dequithumuc($result);
 */
?>