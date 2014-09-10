<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/file.php");
	class chi_tiet_bc_vp extends File{
			private $NGAY_BAO_CAO;
			private $LI_DO_BC;
			private  $Trang_thai_bc;
			
				public function setTrang_thai_bc($a){
				$this->Trang_thai_bc = $a;
				}
			public function setNGAY_BAO_CAO($a){
				$this->NGAY_BAO_CAO = $a;
				}
			public function setLI_DO_BC($a){
				$this->LI_DO_BC = $a;
				}
				public function getTrang_thai_bc(){
				return $this->Trang_thai_bc;
				}
			public function getNGAY_BAO_CAO(){
				return $this->NGAY_BAO_CAO;
				}
			public function getLI_DO_BC(){
				return $this->LI_DO_BC;
				}	
				
			  public function themchi_tiet_bc_vp(){
            $this->setQuery("insert into chi_tiet_bc_vp values ('".$this->getEMAIL_TK()."','".$this->getMA_FILE()."','".$this->getNGAY_BAO_CAO()."','".$this->getLI_DO_BC()."','".$this->getTrang_thai_bc()."')");
            return $this->executeQuery();
        }
		
		 public function suachi_tiet_bc_vp(){
            $this->setQuery("update chi_tiet_bc_vp set MAT_KHAU='".$this->getMAT_KHAU()."' where EMAIL_TK='".$this->getEMAIL_TK()."'");
			// echo $this->getQuery();
            return $this->executeQuery();
        }
		
		  public function xoachi_tiet_bc_vp($a){
            $this->setQuery("delete from chi_tiet_bc_vp where MA_FILE='".$a."'");
            return $this->executeQuery();
        }
		 public function tiemctbc($email,$mafile){
			  $this->setQuery("select  * from chi_tiet_bc_vp where EMAIL_TK='".$email."' and MA_FILE='".$mafile."'");
               return $this->fetchAll();
			  }
	}
    /*
	$a = new chi_tiet_bc_vp();
	$a->setEMAIL_TK("1101605");
	$a->setMA_FILE(3);
	$a->setLI_DO_BC("virut");
	$a->setNGAY_BAO_CAO("2014-05-28");
	$a->setTrang_thai_bc(0);
	if($a->themchi_tiet_bc_vp()) echo "0k";
	else echo "eo";
	*/
?>