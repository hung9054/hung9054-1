<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/file.php");
	class loai_file extends File{
			private $TEN_LOAI_FILE;
			private $DUOI_FILE;
			
			public function setTEN_LOAI_FILE($a){
				$this->TEN_LOAI_FILE = $a;
				}
			public function setDUOI_FILE($a){
				$this->DUOI_FILE = $a;
				}	
			public function getTEN_LOAI_FILE(){
				return $this->TEN_LOAI_FILE;
				}
		    public function getDUOI_FILE(){
				return $this->DUOI_FILE;
				}	
				
			public function themloai_file(){
            $this->setQuery("insert into loai_file values ('".$this->getMA_LOAI_FILE()."','".$this->getTEN_LOAI_FILE()."','".$this->getDUOI_FILE()."')");
            return $this->executeQuery();
              }
		
	    	public function sualoai_file(){
            $this->setQuery("update loai_file set TEN_LOAI_FILE='".$this->getTEN_LOAI_FILE()."', DUOI_FILE='".$this->getDUOI_FILE()."' where MA_LOAI_FILE='".$this->getMA_LOAI_FILE()."'");
			// echo $this->getQuery();
            return $this->executeQuery();
               }
		
		    public function xoaloai_file(){
            $this->setQuery("delete from loai_file where MA_LOAI_FILE='".$this->getMA_LOAI_FILE()."'");
            return $this->executeQuery();
             }	
			  public function tiemkiemduoi($a){
            $this->setQuery("select * from loai_file where DUOI_FILE like '%".$a."%'");
            return $this->fetchAll();
             }	
			  public function tiemkiemgoi($a){
            $this->setQuery("select * from loai_file where MA_LOAI_TV='".$a."'");
            return $this->fetchAll();
             }			
		}
		
		/*
		function findexts ($filename) 
							 { 
							 $filename = strtolower($filename) ; 
							 $exts = explode('.', $filename) ; 
							 $n = count($exts)-1; 
							 $exts = $exts[$n]; 
							 return $exts; 
							 } 
		
		$a = new loai_file();
		$res = $a->tiemkiemduoi(findexts("123.doc"));
		$num = "1";
		while($row = mysql_fetch_array($res)){
			$num = $row[0];
			}
		echo $num;
		echo findexts("123.doc");
		*/
		/*
		//theo loai file
		$a = new loai_file();
		$a->setMA_LOAI_FILE("3");
		$a->setTEN_LOAI_FILE("file nen");
		$a->setDUOI_FILE("rar");
		if($a->themloai_file()) echo "ok";
		else echo "eo";
		*/
		
		/*
		// sua loai file
		$a = new loai_file();
		$a->setMA_LOAI_FILE("2");
		$a->setTEN_LOAI_FILE("file nen");
		$a->setDUOI_FILE("zip");
		if($a->sualoai_file()) echo "ok";
		else echo "eo";
		*/
		
		/*
		//xoa loai file
		$a = new loai_file();
		$a->setMA_LOAI_FILE("3");
		if($a->xoaloai_file()) echo "ok";
		else echo "eo";
		*/
		
		
?>