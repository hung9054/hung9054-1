<?php
	 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/taikhoan.php");
	 
	 class thongtinnguoidung extends taikhoan{
		 private $MA_NGUOI_DUNG;
		 private $TEN_NGUOI_DUNG;
		 private $SDT;
		 private $NGAY_SINH;
		 private $DIA_CHI;
		 private $CHIA_SE_TTCN;
		 private $TIEN_TRONG_TK;
		     
			 public function setallMA_NGUOI_DUNG(){
				 $this->MA_NGUOI_DUNG = "";
				 $this->TEN_NGUOI_DUNG = "";
				 $this->SDT = "";
				 $this->NGAY_SINH = "0000-00-00";
				 $this->DIA_CHI = "";
				 $this->CHIA_SE_TTCN = "";
				 $this->TIEN_TRONG_TK = "0";
				 }
			 public function setMA_NGUOI_DUNG($ma){
				 $this->MA_NGUOI_DUNG = $ma;
				 }
				 
			 public function setTEN_NGUOI_DUNG($ten){
				 $this->TEN_NGUOI_DUNG = $ten;
				 }
				 
			 public function setSDT($sdt){
				  $this->SDT = $sdt;
				 }	
				  
			  public function setNGAY_SINH($ngaysinh){
			       $this->NGAY_SINH = $ngaysinh;
			 }
			 
			   public function setDIA_CHI($diachi){
			 		$this->DIA_CHI = $diachi;
			 }
			 
			    public function setCHIA_SE_TTCN($chiase){
			 		$this->CHIA_SE_TTCN = $chiase;
			 }	
			 
			   public function setTIEN_TRONG_TK($point){
			 		$this->TIEN_TRONG_TK = $point;
			 }	 
			 
			 public function getMA_NGUOI_DUNG(){
				 return $this->MA_NGUOI_DUNG;
				 }
				 
			 public function getTEN_NGUOI_DUNG(){
				  return $this->TEN_NGUOI_DUNG;
				 }
				 
			 public function getSDT(){
				  return $this->SDT;
				 }
				 	 
			  public function getNGAY_SINH(){
			 	  return $this->NGAY_SINH;
			 }
			 
			   public function getDIA_CHI(){
			 	  return $this->DIA_CHI;
			   }
			   
			    public function getCHIA_SE_TTCN(){
			 	  return $this->CHIA_SE_TTCN;
			 }	 
			 
			   public function getTIEN_TRONG_TK(){
			 	  return $this->TIEN_TRONG_TK;
			 }	 
			 
			  public function themthongtinnguoidung(){
            $query = "insert into nguoi_dung
            values ('".$this->getEMAIL_TK()."','".$this->getMA_NGUOI_DUNG()."','".$this->getTEN_NGUOI_DUNG()."','".$this->getSDT()."','".$this->getNGAY_SINH()."','".$this->getDIA_CHI()."','".$this->getCHIA_SE_TTCN()."','".$this->getTIEN_TRONG_TK()."')";
            $this->setQuery($query);
            //echo $this->getQuery();
            return $this->executeQuery();
             }
			 
			  public function suathongtinnguoidung(){
              $this->setQuery("update nguoi_dung set TEN_NGUOI_DUNG='".$this->getTEN_NGUOI_DUNG()."', SDT='".$this->getSDT()."', NGAY_SINH ='".$this->getNGAY_SINH()."', DIA_CHI='".$this->getDIA_CHI()."' where EMAIL_TK='".$this->getEMAIL_TK()."'");
			// echo $this->getQuery();
              return $this->executeQuery();
               }
			     public function suatien(){
              $this->setQuery("update nguoi_dung set TIEN_TRONG_TK='".$this->getTIEN_TRONG_TK()."' where EMAIL_TK='".$this->getEMAIL_TK()."'");
			// echo $this->getQuery();
              return $this->executeQuery();
               }
			   public function xoathongtinnguoidung(){
               $this->setQuery("delete from nguoi_dung where EMAIL_TK='".$this->getEMAIL_TK()."'");
               return $this->executeQuery();
               }
			   
			   public function allnguoidung(){
               $this->setQuery("select  * from nguoi_dung ");
               return $this->fetchAll();
               }
			   
			   public function maxnguoidung(){
               $this->setQuery("select  max(MA_NGUOI_DUNG) from nguoi_dung ");
               return $this->fetchAll();
               }
			   
			   public function nguoidung($a){
               $this->setQuery("select  * from nguoi_dung where EMAIL_TK='".$a."'");
               return $this->fetchAll();
               }
		
		 }
		 
		 /*
		 //them thong tin nguoi dung
		  $tt = new thongtinnguoidung();
		 $tt->setEMAIL_TK("1101605");
		 $tt->setMA_NGUOI_DUNG("1");
		 $tt->setTEN_NGUOI_DUNG("thao thao");
		 $tt->setNGAY_SINH("1992-05-22");
		 $tt->setDIA_CHI("can tho");
		 $tt->setSDT("01668565419");
		 $tt->setTIEN_TRONG_TK("0");
		 $tt->setCHIA_SE_TTCN("1");
		 if($tt->themthongtinnguoidung()) echo "ok";
		 else echo "eo";
		 */
		 
		  /*
		 //sua thong tin nguoi dung
		 $tt = new thongtinnguoidung();
		 $tt->setEMAIL_TK("1101605");
		 $tt->setMA_NGUOI_DUNG("1");
		 $tt->setTEN_NGUOI_DUNG("thao cho");
		 $tt->setNGAY_SINH("1992-05-05");
		 $tt->setDIA_CHI("sai gon");
		 $tt->setSDT("01668565418");
		 $tt->setTIEN_TRONG_TK("2");
		 $tt->setCHIA_SE_TTCN("2");
		 if($tt->suathongtinnguoidung()) echo "ok";
		 else echo "eo";
		*/ 
		 
		 /* 
		 //xoa thong tin nguoi dung
		 $tt = new thongtinnguoidung();
		 $tt->setEMAIL_TK("1101605");
		 if($tt->xoathongtinnguoidung()) echo "ok";
		 else echo "eo";
		 */
		 
		 
		 /*
		 // hien thi tat ca nguoi dung
		  $tt = new thongtinnguoidung();
		 $result = $tt->allnguoidung(); 
		 while($row = mysql_fetch_array($result)){
			 echo $row["0"];
		 }
		 */
		 
		  /*
		 // hien thi 1 nguoi dung chi thi
		   $tt = new thongtinnguoidung();
		 $result = $tt->allnguoidung("1101605"); 
		 while($row = mysql_fetch_array($result)){
			 echo $row["2"];
		 }
		 
		 */
		 
			 
		 
?>