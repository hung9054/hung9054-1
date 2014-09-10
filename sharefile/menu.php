<div style="height:50px;">
  <div class="div_left">
     <div>
     <a href="index.php" >
     Trang chủ 
     </a>
     </div>
      <div title="Thông tin ">
      <a href="index.php?content=thongtincontrol">
     Thông tin 
     </a>
     </div>
     <div title="Chính sách">
     <a href="index.php?content=chinhsachcontrol">
     Chính sách
     </a>
     
     </div>
  </div>

 <div class="div_right">
    
     <?php 
	 if(isset($_SESSION["s_email"])){
		 ?>
   
     <?php
	 }
	 else {
		 ?>
		  <div title="Đăng nhập ">
     <a href="index.php?content=dangnhapcontrol" >  Đăng nhập </a>
     </div>
      <div title="Đăng kí">
    <a href="index.php?content=dangkicontrol" >  Đăng kí </a>
     </div>
         <?
		 }
    ?>
</div>
<div class="image_banner">
  <div >
  	<div class="imge_sharefile" ></div>
  	<div class="imge_sharefile1">
    </div>
  </div>
</div>
