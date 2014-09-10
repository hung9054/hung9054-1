<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/file.php");
	class loai_chia_se extends File{
			private $LOAI_CHIA_SE;
			
			public function setLOAI_CHIA_SE($a){
				$this->LOAI_CHIA_SE = $a;
				}
			public function getLOAI_CHIA_SE(){
				return $this->LOAI_CHIA_SE;
				}
				
				
			public function themloai_chia_se(){
				 $this->setQuery("insert into loai_chia_se values ('".$this->getMA_LOAI_CHIA_SE()."','".$this->getLOAI_CHIA_SE()."')");
            return $this->executeQuery();
				}	
			public function sualoai_chia_se(){
				 $this->setQuery("update loai_chia_se set LOAI_CHIA_SE='".$this->getLOAI_CHIA_SE()."' where MA_LOAI_CHIA_SE='".$this->getMA_LOAI_CHIA_SE()."'");
			// echo $this->getQuery();
            return $this->executeQuery();
				}
			public function xoaloai_chia_se(){
				 $this->setQuery("delete from loai_chia_se where MA_LOAI_CHIA_SE='".$this->getMA_LOAI_CHIA_SE()."'");
            return $this->executeQuery();
				}
		}
		
		/*
		//them loai chia se
		$a = new loai_chia_se();
		$a->setMA_LOAI_CHIA_SE("3");
		$a->setLOAI_CHIA_SE("an");
		if($a->themloai_chia_se()) echo "ok";
		else echo "eo";
		*/
		
		/*
		// sua loai chia se
		$a = new loai_chia_se();
		$a->setMA_LOAI_CHIA_SE("3");
		$a->setLOAI_CHIA_SE("aaaaa");
		if($a->sualoai_chia_se()) echo "ok";
		else echo "eo";
		*/
		/*
		//xoa loai chia se
		$a = new loai_chia_se();
		$a->setMA_LOAI_CHIA_SE("3");
		$a->setLOAI_CHIA_SE("aaaaa");
		if($a->xoaloai_chia_se()) echo "ok";
		else echo "eo";
		*/
		
?>