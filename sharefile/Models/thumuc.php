<?php
 	 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/taikhoan.php");
	  class thumuc extends taikhoan{
		  	private $MA_THU_MUC;
			private $TEN_THU_MUC;
			private $NGAY_TAO_TH;
			private $MAT_KHAU_CS_TM;
			private $MA_THU_MUC_CHA;
			private $CAP_THU_MUC;
			
			    public function setallTHU_MUC(){
				 $this->CAP_THU_MUC = "0";
				 $this->TEN_THU_MUC = "root";
				 $this->NGAY_TAO_TH = "2000-00-00";
				 $this->MA_THU_MUC_CHA = "0";
				 $this->CAP_THU_MUC = "0";
				}
				public function setCAP_THU_MUC($cap){
				 $this->CAP_THU_MUC = $cap;
				}
			    public function setMA_THU_MUC($ma){
				 $this->MA_THU_MUC = $ma;
				}
				
				public function setTEN_THU_MUC($ten){
				 $this->TEN_THU_MUC = $ten;
				}
				
				public function setNGAY_TAO_TH($ngaytao){
				 $this->NGAY_TAO_TH = $ngaytao;
				}
				
				public function setMAT_KHAU_CS_TM($matkhau){
				 $this->MAT_KHAU_CS_TM = $matkhau;
				}
				
				public function setMA_THU_MUC_CHA($ma){
				 $this->MA_THU_MUC_CHA = $ma;
				}
				
				public function getCAP_THU_MUC(){
				return  $this->CAP_THU_MUC;
				}
				
				 public function getMA_THU_MUC(){
				 return $this->MA_THU_MUC;
				 }
				 
				  public function getTEN_THU_MUC(){
				 return $this->TEN_THU_MUC;
				 }
				 
				  public function getNGAY_TAO_TH(){
				 return $this->NGAY_TAO_TH;
				 }
				 
				  public function getMAT_KHAU_CS_TM(){
				 return $this->MAT_KHAU_CS_TM;
				 }
				 
				  public function getMA_THU_MUC_CHA(){
				 return $this->MA_THU_MUC_CHA;
				 }
				 
				 public function themthumuc(){
					$this->setQuery("insert into thumuc values ('".$this->getMA_THU_MUC()."','".$this->getEMAIL_TK()."','".$this->getTEN_THU_MUC()."','".$this->getNGAY_TAO_TH()."','".$this->getMA_THU_MUC_CHA()."','".$this->getCAP_THU_MUC()."')");
					return $this->executeQuery();
				}
				public function suathumuc(){
            $this->setQuery("update thumuc set TEN_THU_MUC='".$this->getTEN_THU_MUC()."' where MA_THU_MUC='".$this->getMA_THU_MUC()."'");
			// echo $this->getQuery();
               return $this->executeQuery();
                }
				public function xoathumuc(){
            $this->setQuery("delete from thumuc where MA_THU_MUC='".$this->getMA_THU_MUC()."'");
            return $this->executeQuery();
                }
				 public function fetchthumuc($a){
               $this->setQuery("select  * from thumuc where MA_THU_MUC_CHA='".$a."'");
               return $this->fetchAll();
                }
			  public function fetchthumuc_mail_ma($mail,$ma){
               $this->setQuery("select  * from thumuc where MA_THU_MUC='".$ma."' and EMAIL_TK='".$mail."'");
               return $this->fetchAll();
                }
				 public function fetchallthumuc(){
               $this->setQuery("select  * from thumuc where MA_THU_MUC='".$this->getMA_THU_MUC()."'");
               return $this->fetchAll();
                }
				 public function maxthumuc(){
               $this->setQuery("select  max(MA_THU_MUC) from thumuc ");
               return $this->fetchAll();
                }
				 public function minthumuc($email){
               $this->setQuery("select  min(MA_THU_MUC) from thumuc where EMAIL_TK ='".$email."'");
               return $this->fetchAll();
                }
				 public function minngaytao($email){
               $this->setQuery("select  *,min(MA_THU_MUC) from thumuc where EMAIL_TK ='".$email."'");
               return $this->fetchAll();
                }
	}
	        /*
			$a = new thumuc();
			$re = $a->minthumuc("thao@gmail.com");
			$number=0;
			while($row = mysql_fetch_array($re)){
				$number= $row[0];
				}
			echo $number;
			*/
	       /*
			$a = new thumuc();
			$re = $a->maxthumuc();
			$number=0;
			while($row = mysql_fetch_array($re)){
				$number= $row[0]+1;
				}
			echo $number;
			*/
		  /*
		  // them thu muc
		   
		  $a = new thumuc();
		  $a->setMA_THU_MUC("22");
		  $a->setEMAIL_TK("1101605");
		  $a->setMA_THU_MUC_CHA("0");
		  $a->setMAT_KHAU_CS_TM("");
		  $a->setTEN_THU_MUC("root");
		  $a->setNGAY_TAO_TH("2014-05-28");
		  if($a->themthumuc())echo "ok";
		  else echo"eo";
          */
		  
		  
		  /*
		  // sua thu muc
		  $a = new thumuc();
		  $a->setMA_THU_MUC("27");
		  $a->setEMAIL_TK("1101605");
		  $a->setTEN_THU_MUC("thao cho");
		  $a->setNGAY_TAO_TH("2014-05-28");
		  if($a->suathumuc())echo "ok";
		  else echo"eo";
		  */
		  
		   /*
		  // xoa thu muc
		 $a = new thumuc();
		  $a->setMA_THU_MUC("2");
		  if($a->xoathumuc())echo "ok";
		  else echo"eo";
		  */
		  
		  /*
		  //tim kiem
		  $a = new thumuc();
	   $result = $a->fetchthumuc("2");
	   while($row = mysql_fetch_array(($result))){
		   echo $row[2];
		   }
		   */
		   
		 
?>
