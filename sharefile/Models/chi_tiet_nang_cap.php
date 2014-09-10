<?php
     include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/taikhoan.php");
	 class chi_tiet_nang_cap extends taikhoan {
		      private $MA_LOAI_TV;
			  private $NGAY_NANG_CAP;
			  private $NGAY_KET_THUC;
			  private $SO_LAN_GIA_HAN;
			  
			  public function setSO_LAN_GIA_HAN($a){
              $this->SO_LAN_GIA_HAN = $a;
              }
			  public function setMA_LOAI_TV($a){
              $this->MA_LOAI_TV = $a;
              }
			  public function setNGAY_NANG_CAP($a){
              $this->NGAY_NANG_CAP = $a;
              }
			  public function setNGAY_KET_THUC($a){
              $this->NGAY_KET_THUC = $a;
              }
			   public function getSO_LAN_GIA_HAN(){
               return $this->SO_LAN_GIA_HAN;
               }
			  
			   public function getMA_LOAI_TV(){
               return $this->MA_LOAI_TV;
               }
			   public function getNGAY_NANG_CAP(){
               return $this->NGAY_NANG_CAP;
               }
			   public function getNGAY_KET_THUC(){
               return $this->NGAY_KET_THUC;
               }
			   
			   public function themchi_tiet_nang_cap(){
            $this->setQuery("insert into chi_tiet_nang_cap values ('".$this->getMA_LOAI_TV()."','".$this->getEMAIL_TK()."','".$this->getNGAY_NANG_CAP()."','".$this->getNGAY_KET_THUC()."','".$this->getSO_LAN_GIA_HAN()."')");
            return $this->executeQuery();
        }
		
		 public function suachi_tiet_nang_cap($ngaygiahan){
            $this->setQuery("update chi_tiet_nang_cap set NGAY_KET_THUC='".$ngaygiahan."',SO_LAN_GIA_HAN='".$this->getSO_LAN_GIA_HAN()."' where EMAIL_TK='".$this->getEMAIL_TK()."' and NGAY_KET_THUC='".$this->getNGAY_KET_THUC()."'");
			// echo $this->getQuery();
            return $this->executeQuery();
        }
		
		  public function xoachi_tiet_nang_cap(){
            $this->setQuery("delete from chi_tiet_nang_cap where EMAIL_TK='".$this->getEMAIL_TK()."' and NGAY_NANG_CAP = '".$this->getNGAY_NANG_CAP()."'");
            return $this->executeQuery();
        }
		  public function goinguoidung($email){
			  $this->setQuery("select  max(NGAY_KET_THUC) from chi_tiet_nang_cap where EMAIL_TK='".$email."'");
               return $this->fetchAll();
			  }
		 public function addDATE($date,$a){
			  $this->setQuery("SELECT ADDDATE('".$date."'," .$a.")");
               return $this->fetchAll();
			  }	  
		 public function tiemctnc($email){
			  $this->setQuery("select  * from chi_tiet_nang_cap where EMAIL_TK='".$email."' and NGAY_KET_THUC='".$this->getNGAY_KET_THUC()."'");
               return $this->fetchAll();
			  }	  
		
	}
	/*
	
	$a = new  chi_tiet_nang_cap();
	$re =$a->addDATE("2011-11-11",10);
	while($row = mysql_fetch_array($re)){
		echo $row[0];
	}
	*/
	/*
	$a = new  chi_tiet_nang_cap();
	$re = $a->goinguoidung("thao@gmail.com");
	while($row = mysql_fetch_array($re)){
		echo $row[0];
	}
	*/
	/*
	$a = new  chi_tiet_nang_cap();
	$re = $a->addCURDATE(10);
	while($row = mysql_fetch_array($re)){
		echo $row[0];
	}
	*/
	
	/*
	$a = new  chi_tiet_nang_cap();
	$re = $a->goinguoidung("thao@gmail.com");
	while($row = mysql_fetch_array($re)){
		echo $row[0];
		}
		*/
	/*
		//them chi tiet nang cap
    $ct = new chi_tiet_nang_cap();
	 $ct->setMA_LOAI_TV("G1");
	 $ct->setEMAIL_TK("huynh@gmail.com");
	 $ct->setNGAY_NANG_CAP("2014-12-11");
	 $ct->setNGAY_KET_THUC("2014-11-11");
	  $ct->setSO_LAN_GIA_HAN("0");
	 if($ct->themchi_tiet_nang_cap())echo "ok";
	 else echo "eo";
	 */
	 
	 
	 /*
		//xoa chi tiet nang cap
     $ct = new chi_tiet_nang_cap();
	 //$ct->setMA_LOAI_TV("1");
	 $ct->setEMAIL_TK("1101605");
	 $ct->setNGAY_NANG_CAP("2014-12-11");
	// $ct->setNGAY_KET_THUC("2014-11-11");
	 if($ct->xoachi_tiet_nang_cap())echo "ok";
	 else echo "eo";
	 */
	 
	 
	 
?>
