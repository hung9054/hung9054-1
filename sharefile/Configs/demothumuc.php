
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/thumuc.php");
 function dequithumuc($a){
	   $row=mysql_num_rows($a);
	   if($row >0){
		     while($rows= mysql_fetch_array($a)){
			 
			 ?>
             <ul>
                 <li >
                 <?php echo $rows[2]; ?>
                 <?php  $b = new thumuc();
				 $result =$b->fetchthumuc($rows[0]);  
				   dequithumuc($result);
				 ?>
                 </li>
             </ul>
             
  <?php
			 
				 }
		   }
	   }
?>
<?php 
 $c = new thumuc();
 $result = $c->fetchthumuc("2");
 dequithumuc($result);
?>
</body>
</html>