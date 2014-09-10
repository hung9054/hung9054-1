<?php
    include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/thumuc.php");
	class File extends thumuc{
		      private $MA_FILE;
			  private $MA_LOAI_CHIA_SE;
			  private $MA_LOAI_FILE;
			  private $TEN_FILE;
			  private $NGAY_TAO;
			  private $KICH_THUOC_FILE;
			  private $URL;
			  private $MA_HOA_FILE;
			  private $MAT_KHAU_CS_FILE;
			  private $SO_LUOT_DOWN;
			  private $TRANG_THAI;
			  
			  public function setMA_FILE($a){
              $this->MA_FILE = $a;
              }
			  
			   public function setMA_LOAI_CHIA_SE($a){
              $this->MA_LOAI_CHIA_SE = $a;
              }
			  public function setMA_LOAI_FILE($a){
              $this->MA_LOAI_FILE = $a;
              }
			  public function setTEN_FILE($a){
              $this->TEN_FILE = $a;
              }
			  public function setNGAY_TAO($a){
              $this->NGAY_TAO = $a;
              }
			  public function setKICH_THUOC_FILE($a){
              $this->KICH_THUOC_FILE = $a;
              }
			  public function setURL($a){
              $this->URL = $a;
              }
			  public function setMA_HOA_FILE($a){
              $this->MA_HOA_FILE = $a;
              }
			  public function setMAT_KHAU_CS_FILE($a){
              $this->MAT_KHAU_CS_FILE = $a;
              }
			  public function setSO_LUOT_DOWN($a){
              $this->SO_LUOT_DOWN = $a;
              }
			  public function setTRANG_THAI($a){
              $this->TRANG_THAI = $a;
              }
			  
			  
			  public function getMA_FILE(){
              return $this->MA_FILE;
               }
			   public function getMA_LOAI_CHIA_SE(){
              return $this->MA_LOAI_CHIA_SE;
               }
			   public function getMA_LOAI_FILE(){
              return $this->MA_LOAI_FILE;
               }
			   public function getTEN_FILE(){
              return $this->TEN_FILE;
              }
			  public function getNGAY_TAO(){
               return $this->NGAY_TAO;
              }
			  public function getKICH_THUOC_FILE(){
               return $this->KICH_THUOC_FILE;
              }
			  public function getURL(){
               return $this->URL;
              }
			  public function getMA_HOA_FILE(){
               return $this->MA_HOA_FILE;
              }
			  public function getMAT_KHAU_CS_FILE(){
               return $this->MAT_KHAU_CS_FILE;
              }
			  public function getSO_LUOT_DOWN(){
               return $this->SO_LUOT_DOWN;
              }
			  public function getTRANG_THAI(){
               return $this->TRANG_THAI;
              }
			  
			   public function themfile(){
					$this->setQuery("insert into file values ('".$this->getMA_FILE()."','".$this->getMA_LOAI_CHIA_SE()."','".$this->getMA_THU_MUC()."','".$this->getMA_LOAI_FILE()."','".$this->getTEN_FILE()."','".$this->getNGAY_TAO()."','".$this->getKICH_THUOC_FILE()."','".$this->getMA_HOA_FILE()."','".$this->getMAT_KHAU_CS_FILE()."','".$this->getSO_LUOT_DOWN()."','".$this->getTRANG_THAI()."')");
					return $this->executeQuery();
				}
				public function suafile(){
            $this->setQuery("update file set MA_LOAI_CHIA_SE='".$this->getMA_LOAI_CHIA_SE()."', MA_THU_MUC ='".$this->getMA_THU_MUC()."' where MA_FILE='".$this->getMA_FILE()."'");
			// echo $this->getQuery();
               return $this->executeQuery();
                }
				public function suafile_mk(){
            $this->setQuery("update file set MAT_KHAU_CS_FILE='".$this->getMAT_KHAU_CS_FILE()."' where MA_FILE='".$this->getMA_FILE()."'");
			// echo $this->getQuery();
               return $this->executeQuery();
                }
					public function suafile_chiase(){
            $this->setQuery("update file set MA_LOAI_CHIA_SE='".$this->getMA_LOAI_CHIA_SE()."' where MA_FILE='".$this->getMA_FILE()."'");
			// echo $this->getQuery();
               return $this->executeQuery();
                }
					public function suafile_luotdown(){
            $this->setQuery("update file set SO_LUOT_DOWN='".$this->getSO_LUOT_DOWN()."' where MA_FILE='".$this->getMA_FILE()."'");
			// echo $this->getQuery();
               return $this->executeQuery();
                }
				public function xoafile(){
            $this->setQuery("delete from file where MA_FILE='".$this->getMA_FILE()."'");
            return $this->executeQuery();
                }	
				 public function fetchfile($a){
               $this->setQuery("select  * from file where MA_FILE='".$a."'");
               return $this->fetchAll();
                }
				 public function fetchfile_thumuc($a){
               $this->setQuery("select  * from file where MA_THU_MUC='".$a."'");
               return $this->fetchAll();
                }
				public function timfile_mahoa($a){
               $this->setQuery("select  * from file where MA_HOA_FILE='".$a."'");
               return $this->fetchAll();
                }
				public function maxfile(){
               $this->setQuery("select  max(MA_FILE) from file ");
               return $this->fetchAll();
                }
				public function allemail($mail){
               $this->setQuery("select b.MA_FILE, b.KICH_THUOC_FILE,b.TEN_FILE from thumuc a, file b where a.ma_thu_muc =b.ma_thu_muc and a.email_tk = '".$mail."' and b.trang_thai =0 order by b.MA_FILE");
               return $this->fetchAll();
                }
				public function allsumemail($mail){
               $this->setQuery("select sum(b.KICH_THUOC_FILE) from thumuc a, file b where a.ma_thu_muc =b.ma_thu_muc and a.email_tk = '".$mail."' and b.trang_thai =0");
               return $this->fetchAll();
                }
				
					  
	}
		/*
		//them file
		$a = new File();
		$a->setMA_FILE("1");
		$a->setKICH_THUOC_FILE("10000");
		$a->setMA_HOA_FILE("1234567890");
		$a->setMA_LOAI_CHIA_SE("1");
		$a->setMA_LOAI_FILE("1");
		$a->setMA_THU_MUC("1");
		$a->setMAT_KHAU_CS_FILE("");
		$a->setNGAY_TAO("2014-05-30");
		$a->setSO_LUOT_DOWN("0");
		$a->setTEN_FILE("software");
		$a->setTRANG_THAI("active");
		if($a->themfile())echo "ok";
		else echo "eo";
		*/
		
		
		 /*
		  //tim kiem
		  $a = new File();
	   $result = $a->fetchfile("1");
	   while($row = mysql_fetch_array(($result))){
		   echo $row[1];
		   }
		   */
		  
		   
		
?>