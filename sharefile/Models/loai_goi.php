<?php
   include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Models/chi_tiet_nang_cap.php");
   class loai_goi extends chi_tiet_nang_cap{
	               private $TEN_LOAI_TV;
				   private $TIEN_NANG_CAP;
				   private $TOC_DO_UP;
				   private $TOC_DO_DOWN;
				   private $DUNG_LUONG_UP_TOI_DA;
				   private $DUNG_LUONG_DOWN_TOI_DA;
				   private $THOI_GIAN_CHO;
				   private $THOI_GIAN_SU_DUNG;
				   private $DUNG_LUONG_LUU_TRU;
				   private $Gold;
				   
				    public function setGold($a){
				   $this->Gold = $a;
					}
				   public function setDUNG_LUONG_LUU_TRU($a){
				   $this->DUNG_LUONG_LUU_TRU = $a;
					}
				   public function setTEN_LOAI_TV($a){
				   $this->TEN_LOAI_TV = $a;
					}
				   public function setTIEN_NANG_CAP($a){
				   $this->TIEN_NANG_CAP = $a;
					}
					public function setTOC_DO_UP($a){
				   $this->TOC_DO_UP = $a;
					}
					public function setTOC_DO_DOWN($a){
				   $this->TOC_DO_DOWN = $a;
					}
					public function setDUNG_LUONG_UP_TOI_DA($a){
				   $this->DUNG_LUONG_UP_TOI_DA = $a;
					}
					public function setDUNG_LUONG_DOWN_TOI_DA($a){
				   $this->DUNG_LUONG_DOWN_TOI_DA = $a;
					}
					public function setTHOI_GIAN_CHO($a){
				   $this->THOI_GIAN_CHO = $a;
					}
					public function setTHOI_GIAN_SU_DUNG($a){
				   $this->THOI_GIAN_SU_DUNG = $a;
					}
					
					 public function getGold(){
				   return $this->Gold;
				   }  
				  public function getDUNG_LUONG_LUU_TRU(){
				   return $this->DUNG_LUONG_LUU_TRU;
				   }  
				   public function getTEN_LOAI_TV(){
				   return $this->TEN_LOAI_TV;
				   } 
				   
				   public function getTIEN_NANG_CAP(){
				   return $this->TIEN_NANG_CAP;
				   }
				   public function getTOC_DO_UP(){
				   return $this->TOC_DO_UP;
				   }
				   public function getTOC_DO_DOWN(){
				   return $this->TOC_DO_DOWN;
				   } 
				   public function getDUNG_LUONG_UP_TOI_DA(){
				   return $this->DUNG_LUONG_UP_TOI_DA;
				   }  
				   public function getDUNG_LUONG_DOWN_TOI_DA(){
				   return $this->DUNG_LUONG_DOWN_TOI_DA;
				   }
				   public function getTHOI_GIAN_CHO(){
				   return $this->THOI_GIAN_CHO;
				   } 
				   public function getTHOI_GIAN_SU_DUNG(){
				   return $this->THOI_GIAN_SU_DUNG;
				   }    
				   
				   public function kiemtraloai_goi(){
			       return $this->isExits("tai_khoan","EMAIL_TK='". $this->getEMAIL_TK()."' and MAT_KHAU = '".$this->getMAT_KHAU(). "' and MA_LOAI_TK = '".$this->getMA_LOAI_TK()."'");
			}
			
			      public function themloai_goi(){
					$this->setQuery("insert into loai_goi values ('".$this->getMA_LOAI_TV()."','".$this->getTEN_LOAI_TV()."','".$this->getTIEN_NANG_CAP()."','".$this->getTOC_DO_UP()."','".$this->getTOC_DO_DOWN()."','".$this->getDUNG_LUONG_UP_TOI_DA()."','".$this->getTHOI_GIAN_CHO()."','".$this->getTHOI_GIAN_SU_DUNG()."','".$this->getDUNG_LUONG_LUU_TRU()."','".$this->getGold()."')");
					return $this->executeQuery();
				}
				
				 public function sualoai_goi(){
					$this->setQuery("update loai_goi set TEN_LOAI_TV='".$this->getTEN_LOAI_TV()."',TIEN_NANG_CAP='".$this->getTIEN_NANG_CAP()."', TOC_DO_UP='".$this->getTOC_DO_UP()."', TOC_DO_DOWN='".$this->getTOC_DO_DOWN()."', DUNG_LUONG_UP_TOI_DA='".$this->getDUNG_LUONG_DOWN_TOI_DA()."', THOI_GIAN_CHO= '".$this->getTHOI_GIAN_CHO()."', THOI_GIAN_SU_DUNG='".$this->getTHOI_GIAN_SU_DUNG()."' where MA_LOAI_TV='".$this->getMA_LOAI_TV()."'");
					// echo $this->getQuery();
					return $this->executeQuery();
				}
				
				
				  public function xoaloai_goi(){
					$this->setQuery("delete from loai_goi where MA_LOAI_TV='".$this->getMA_LOAI_TV()."'");
					return $this->executeQuery();
				}
				
				 public function fetchloai_goi($a){
               $this->setQuery("select  * from loai_goi where MA_LOAI_TV='".$a."'");
               return $this->fetchAll();
               }
			    public function fetchalloai_goi(){
               $this->setQuery("select  * from loai_goi  order by THOI_GIAN_SU_DUNG");
               return $this->fetchAll();
               }  
			    public function loai_goi_gold($a){
               $this->setQuery("select  * from loai_goi where Gold='".$a."'");
               return $this->fetchAll();
               }
				     
	   }
	   /*
	    $a = new loai_goi();
		$re = $a->loai_goi_gold("20");
		 while($row = mysql_fetch_array($re)){
			 echo $row[0];
			 }
		 */
	   /*
	   //them loai  goi
	      $a = new loai_goi();
	   $a->setMA_LOAI_TV("1");
	   $a->setTEN_LOAI_TV("Miễn phí");
	   $a->setTIEN_NANG_CAP("0");
	   $a->setDUNG_LUONG_UP_TOI_DA("1024");
	   $a->setTHOI_GIAN_CHO("10");
	   $a->setTHOI_GIAN_SU_DUNG("0");
	   $a->setTOC_DO_DOWN("200");
	   $a->setTOC_DO_UP("200");
	   $a->setDUNG_LUONG_LUU_TRU("200");
	   if($a->themloai_goi()) echo "0k";
	   else echo "eo";
	   */
	   
	   /*
	   //sua loai goi
	    $a = new loai_goi();
	   $a->setMA_LOAI_TV("3");
	   $a->setTEN_LOAI_TV("vip");
	   $a->setTIEN_NANG_CAP("30000");
	   $a->setDUNG_LUONG_UP_TOI_DA("1024");
	   $a->setTHOI_GIAN_CHO("0");
	   $a->setTHOI_GIAN_SU_DUNG("30");
	   $a->setTOC_DO_DOWN("500");
	   $a->setTOC_DO_UP("500");
	   if($a->sualoai_goi()) echo "0k";
	   else echo "eo";
	   */
	   
	   /*
	   //xoa loai goi
	   $a = new loai_goi();
	   $a->setMA_LOAI_TV("3");
	   if($a->xoaloai_goi()) echo "0k";
	   else echo "eo";
	   */
	   
	   /*
	   //tim loai goi
	    $a = new loai_goi();
	   $result = $a->fetchloai_goi("1");
	   while($row = mysql_fetch_array(($result))){
		   echo $row[1];
		   }
	   */
	  
	   
?>
