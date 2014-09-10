<?php
$g = 1024*1024*1024;
$m = 1024*1024;
$aray = $_POST["sophantu"];
for($j=0 ;$j<$aray;$j++){
	?>
    <div style="margin-top:10px;">
    	<div style="color:#060;"> <?php echo $_FILES["file".$j]["name"];?></div>
    	 <progress id="progressBar<?php echo $j;?>" value="0" max="100" style="width:600px;height:20px;"></progress>
         <span style="color:#F00;"> <?php if( $_FILES["file".$j]["size"]>$g)echo round($_FILES["file".$j]["size"]/$g)."GB"; elseif( $_FILES["file".$j]["size"]>$m)echo round($_FILES["file".$j]["size"]/$m)."MB"; else echo round($_FILES["file".$j]["size"]/1024)."KB"; ?> </span>
         <span style="color:#F60;" id="status<?php echo $j;?>"></span>
          <p style="display:none;" id="loaded_n_total<?php echo $j;?>" ></p>
        <span style="display:none;" onclick="uploadFile(<?php echo $j;?>, document.getElementById('hidden_mathumuc').value)"  id="load<?php echo $j;?>">
          upload
        </span>
    </div>
    <?php
	}
?>