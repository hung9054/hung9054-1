<?php
 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/loaitaikhoan.php");
 	
	 class taikhoan extends loaitaikhoan{
        private $EMAIL_TK;
        private $MAT_KHAU;
		
		 public function setEMAIL_TK($tk){
            $this->EMAIL_TK = $tk;
        }
       
	     public function setMAT_KHAU($mk){
            $this->MAT_KHAU = $mk;
        }
		
		 public function getEMAIL_TK(){
            return $this->EMAIL_TK;
        }
		
		 public function getMAT_KHAU(){
            return $this->MAT_KHAU;
        }
		
		
		public function kiemtra(){
			return $this->isExits("tai_khoan","EMAIL_TK='". $this->getEMAIL_TK()."' and MAT_KHAU = '".$this->getMAT_KHAU(). "' and MA_LOAI_TK = '".$this->getMA_LOAI_TK()."'");
			}
			
		public function kiemtraemail(){
			return $this->isExits("tai_khoan","EMAIL_TK='". $this->getEMAIL_TK()."'");
			}	
			
			public function themtaikhoan(){
            $this->setQuery("insert into tai_khoan values ('".$this->getEMAIL_TK()."','".$this->getMA_LOAI_TK()."','".$this->getMAT_KHAU()."')");
            return $this->executeQuery();
        }
		
		 public function suataikhoan($new){
            $this->setQuery("update tai_khoan set MAT_KHAU='".$new."' where EMAIL_TK='".$this->getEMAIL_TK()."' and MAT_KHAU='".$this->getMAT_KHAU()."'");
			// echo $this->getQuery();
            return $this->executeQuery();
        }
		
		  public function xoataikhoan(){
            $this->setQuery("delete from tai_khoan where EMAIL_TK='".$this->getEMAIL_TK()."'");
            return $this->executeQuery();
        }
		
	 }
 
	 /*
		//them nguoi dung moi
     $tk = new taikhoan();
	 $tk->setMA_LOAI_TK("1");
	 $tk->setEMAIL_TK("1101605");
	 $tk->setMAT_KHAU("123456");
	 if($tk->themtaikhoan())echo "ok";
	 else echo "eo";
	 */
	 /*
	  $tk = new taikhoan();
	 $tk->setMA_LOAI_TK("1");
	 $tk->setEMAIL_TK("1101605");
	 $tk->setMAT_KHAU("123456");
	 if($tk->kiemtraemail())echo "ok";
	 else echo "eo";
	 */
	 /*
	 // kiem tra danh nhap 
	 $tk = new taikhoan();
	 $tk->setMA_LOAI_TK("1");
	 $tk->setEMAIL_TK("1101605");
	 $tk->setMAT_KHAU("123456");
	 if($tk->kiemtra())echo "ok";
	 else echo "eo";
	 */
	  /*
	 // sua tai khoan
	 $tk = new taikhoan();
	 $tk->setMA_LOAI_TK("1");
	 $tk->setEMAIL_TK("1101605");
	 $tk->setMAT_KHAU(md5(trim("123456")));
	 if($tk->suataikhoan())echo "ok";
	 else echo "eo";
	 */
	 
	   /*
	 // xoa tai khoan
	 $tk = new taikhoan();
	 $tk->setEMAIL_TK("1101605");
	 if($tk->xoataikhoan())echo "ok";
	 else echo "eo";
	 */
 

	 
 ?>