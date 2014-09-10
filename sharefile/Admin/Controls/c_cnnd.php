

<?php


        if (isset($_POST['btthem'])) {
			echo "<script> alert('Email bị bỏ trống')></script>";
			$email = $_POST["txtemail"];
			$matkhau = $_POST["txtmatkhau"];
			if (empty($email)|| (str_replace (" ","", $email) == "")) {
     			echo "<script> alert('Email bị bỏ trống')></script>";
    }

        }

?>
