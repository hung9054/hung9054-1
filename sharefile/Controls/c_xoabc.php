<?php
include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/tonghop.php");

        if (isset($_POST['btxoabc']) ) {
			$mafile = $_POST['hidd'];

			$bcvp = new tonghop();
			$bcvp->xoa_bc_vp($mafile);

			  

}
        if (isset($_POST['btxoafile']) ) {
			$mafile = $_POST['hidd'];

			$xoafile = new tonghop();
			$xoafile->an_file($mafile);
			$xoafile->an_bc_file($mafile);
			

			  

}
?>
