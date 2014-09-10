<?php
	
	 include($_SERVER['DOCUMENT_ROOT']."/sharefile/Configs/data.php");
	 
	  class loaitaikhoan extends data{
        private $MA_LOAI_TK;
        private $TEN_LOAI_TK;
		
		 public function setMA_LOAI_TK($loai){
            $this->MA_LOAI_TK = $loai;
        }
		
		 public function setTEN_LOAI_TK($ten){
            $this->TEN_LOAI_TK = $ten;
        }
		
		
		 public function getMA_LOAI_TK(){
            return $this->MA_LOAI_TK;
        }
		
		
		 public function getTEN_LOAI_TK(){
            return $this->TEN_LOAI_TK;
        }
		
		//them loai tai khoan
		public function themloaitaikhoan(){
            $this->setQuery("insert into loai_nguoi_dung values ('".$this->getMA_LOAI_TK()."','".$this->getTEN_LOAI_TK()."')");
            return $this->executeQuery();
        }
		
		//xoa loai tai khoan
		public function xoaloaitaikhoan(){
            $this->setQuery("delete from loai_nguoi_dung where MA_LOAI_TK='".$this->getMA_LOAI_TK()."'");
            return $this->executeQuery();
        }
		
		//sua loai nguoi dung
		public function suaNguoiDung(){
            $this->setQuery("update loai_nguoi_dung set TEN_LOAI_TK='".$this->getTEN_LOAI_TK()."' where MA_LOAI_TK='".$this->getMA_LOAI_TK()."'");
			// echo $this->getQuery();
            return $this->executeQuery();
        }
		//kiem tra loai tai khoan
		public function kiemtraloaitaikhoan(){
            return $this->isExits("loai_nguoi_dung","MA_LOAI_TK='". $this->getMA_LOAI_TK()."'");
            //$this->getQuery();
        }
		
	  }
	  
       /*
	  //vi du them taikhoan de test
      $loai = new loaitaikhoan();
	  $loai->setMA_LOAI_TK("1");
	  $loai->setTEN_LOAI_TK("ADMIN");
	  if($loai->themloaitaikhoan()){
		  echo "ok";
		  }
	  else echo "eo";
	  */
	  
	  /*
	  //vi du xoa taikhoan de test
      $loai = new loaitaikhoan();
	  $loai->setMA_LOAI_TK("1");
	  if($loai->xoaloaitaikhoan()){
		  echo "ok";
		  }
	  else echo "eo";
	  */
	  
	    /*
	  //vi du xoa taikhoan de test
      $loai = new loaitaikhoan();
	  $loai->setMA_LOAI_TK("1");
	  $loai->setTEN_LOAI_TK("Admin");
	  if($loai->suaNguoiDung()){
		  echo "ok";
		  }
	  else echo "eo";
	    */
	 /*kiem tra loai tai khoan
	   $loai = new loaitaikhoan();
	  $loai->setMA_LOAI_TK("2");
	  if($loai->kiemtraloaitaikhoan()){
		  echo "ok";
		  }
	  else echo "eo";
	 */
	
?>