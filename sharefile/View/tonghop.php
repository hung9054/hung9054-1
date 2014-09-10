<?php
 include_once($_SERVER['DOCUMENT_ROOT']."/sharefile/Configs/data.php");
	  class tonghop extends data{
		  public function timchung($ten){
			  $this->setQuery("select a.ma_file, a.ten_file ,a.ngay_tao, c.email_tk , b.ten_loai_file, a.kich_thuoc_file, a.SO_LUOT_DOWN, a.MAT_KHAU_CS_FILE,a.MA_HOA_FILE  from file a, loai_file b, thumuc c where a.ma_loai_file = b.ma_loai_file and a.ma_thu_muc = c.ma_thu_muc and a.MA_LOAI_CHIA_SE = 'ml02' and a.TRANG_THAI = 0 and a.ten_file like '%" . $ten . "%'  order by a.ngay_tao desc LIMIT 0,40");
			  return $this->fetchAll();
		  }
	
	  	public function xacdinhloaitk($email){
			  $this->setQuery("select MA_LOAI_TK from tai_khoan where email_tk = '".$email."'");
			  return $this->fetchAll();
		  }
		public function soluotbaocao($mafile){
			  $this->setQuery("select count(*) from chi_tiet_bc_vp where  MA_FILE 	 = ".$mafile);
			  return $this->fetchAll();
		  }
		public function timfileadmin($ten){
			  $this->setQuery("select a.ma_file, a.ten_file ,a.ngay_tao, c.email_tk , b.ten_loai_file, a.kich_thuoc_file, a.SO_LUOT_DOWN, a.MA_HOA_FILE  from file a, loai_file b, thumuc c where a.ma_loai_file = b.ma_loai_file and a.ma_thu_muc = c.ma_thu_muc and a.ten_file like '%" . $ten . "%'  order by a.ngay_tao desc LIMIT 0,40");
			  return $this->fetchAll();
		  }
		public function timfilethanhvienkocheck($email,$ten){
			  $this->setQuery("(select a.ma_file, a.ten_file ,a.ngay_tao,  b.ten_loai_file, a.kich_thuoc_file, a.SO_LUOT_DOWN, a.MA_HOA_FILE  from file a, loai_file b, thumuc c where a.ma_loai_file = b.ma_loai_file and a.ma_thu_muc = c.ma_thu_muc and c.email_tk = '".$email."' and a.ten_file like '%" . $ten . "%'and a.TRANG_THAI = 0  order by a.ngay_tao desc LIMIT 0,30 ) union (select e.ma_file, e.ten_file ,e.ngay_tao, f.ten_loai_file, e.kich_thuoc_file, e.SO_LUOT_DOWN, e.MA_HOA_FILE  from file e, loai_file f, thumuc g where e.ma_loai_file = f.ma_loai_file and e.ma_thu_muc = g.ma_thu_muc and e.MA_LOAI_CHIA_SE = 'ml02' and e.TRANG_THAI = 0 and e.ten_file like '%" . $ten . "%' order by e.ngay_tao desc LIMIT 0,30) ");
			  return $this->fetchAll();
		  }
		public function timfilethanhvien($email,$ten){
			  $this->setQuery("select a.ma_file, a.ten_file ,a.ngay_tao, c.ten_thu_muc , b.ten_loai_file, a.kich_thuoc_file, a.SO_LUOT_DOWN, a.MA_HOA_FILE  from file a, loai_file b, thumuc c where a.ma_loai_file = b.ma_loai_file and a.ma_thu_muc = c.ma_thu_muc and c.email_tk = '".$email."' and a.ten_file like '%" . $ten . "%' and a.TRANG_THAI = 0  order by a.ngay_tao desc LIMIT 0,40");
			  return $this->fetchAll();
		  }

		public function ktgoidangsd($email){
			  $this->setQuery("select MA_LOAI_TV from chi_tiet_nang_cap  where NGAY_KET_THUC >= sysdate() and email_tk = '".$email."' ");
			  return $this->fetchAll();
		  }
		public function timtheoten($ten){
			  $this->setQuery("select b.ma_nguoi_dung, a.email_tk , b.ten_nguoi_dung, c.TEN_LOAI_TK, b.sdt , b.dia_chi,  b.TIEN_TRONG_TK from tai_khoan a, nguoi_dung b, loai_nguoi_dung c where a.email_tk = b.email_tk and a.ma_loai_tk = c.ma_loai_tk and b.ten_nguoi_dung like '%".$ten."%' order by a.MA_LOAI_TK desc LIMIT 0,40 ");
			  return $this->fetchAll();
		  }
		public function timtheoemail($email){
			  $this->setQuery("select b.ma_nguoi_dung, a.email_tk , b.ten_nguoi_dung, c.TEN_LOAI_TK, b.sdt , b.dia_chi, b.TIEN_TRONG_TK  from tai_khoan a, nguoi_dung b, loai_nguoi_dung c where a.email_tk = b.email_tk and a.ma_loai_tk = c.ma_loai_tk and a.email_tk like '%".$email."%'  order by a.MA_LOAI_TK desc LIMIT 0,40 ");
			  return $this->fetchAll();
		  }
		public function dungluongfile($email){
			  $this->setQuery("select sum(KICH_THUOC_FILE)  from file a, thumuc b where a.ma_thu_muc = b.ma_thu_muc and b.email_tk = '".$email."' and a.TRANG_THAI = 0 ");
			  return $this->fetchAll();
		  }
		public function dungluonggoigoc(){
			  $this->setQuery("select DUNG_LUONG_LUU_TRU  from loai_goi where MA_LOAI_TV = 'g1'");
			  return $this->fetchAll();
		  }
		public function dungluonggoidangsd($email){
			  $this->setQuery("select max(a.DUNG_LUONG_LUU_TRU), b.NGAY_KET_THUC  from loai_goi a,  chi_tiet_nang_cap b where a.MA_LOAI_TV = b.MA_LOAI_TV and b.NGAY_NANG_CAP <= sysdate() and b.NGAY_KET_THUC >=sysdate()  and b.email_tk = '".$email."'");
			  return $this->fetchAll();
		  }
		public function dungluongfileoffice($email){
			  $this->setQuery("select sum(a.KICH_THUOC_FILE)  from file a, thumuc b where a.ma_thu_muc = b.ma_thu_muc and a.MA_LOAI_FILE in (2,3,4,8,11) and  b.email_tk = '".$email."' and a.TRANG_THAI = 0 ");
			  return $this->fetchAll();
		  }
		 public function dungluongfilemedia($email){
			  $this->setQuery("select sum(a.KICH_THUOC_FILE)  from file a, thumuc b where a.ma_thu_muc = b.ma_thu_muc and a.MA_LOAI_FILE in (6,7,9) and  b.email_tk = '".$email."' and a.TRANG_THAI = 0 ");
			  return $this->fetchAll();
		  }
		public function dungluongfileanh($email){
			  $this->setQuery("select sum(a.KICH_THUOC_FILE)  from file a, thumuc b where a.ma_thu_muc = b.ma_thu_muc and a.MA_LOAI_FILE in (5) and  b.email_tk = '".$email."' and a.TRANG_THAI = 0 ");
			  return $this->fetchAll();
		  }
		public function dungluongfilekhac($email){
			  $this->setQuery("select sum(a.KICH_THUOC_FILE)  from file a, thumuc b where a.ma_thu_muc = b.ma_thu_muc and a.MA_LOAI_FILE not in (2,3,5,4,8,11,6,7,9) and  b.email_tk = '".$email."' and a.TRANG_THAI = 0 ");
			  return $this->fetchAll();
		  }
		public function tientrongtk($email){
			  $this->setQuery("select TIEN_TRONG_TK  from  nguoi_dung where email_tk = '".$email."'");
			  return $this->fetchAll();
		  }
		public function filebaocao(){
			  $this->setQuery("select  	MA_FILE, count(MA_FILE)   from  chi_tiet_bc_vp where Trang_thai_bc = 0 group by MA_FILE having count(MA_FILE) >=2 order by count(MA_FILE) desc, ma_file ");
			  return $this->fetchAll();
		  }
		public function filetheoma($mafile){
			  $this->setQuery("select a.ten_file , b.email_tk, a.SO_LUOT_DOWN from file a,  thumuc b where  a.ma_thu_muc = b.ma_thu_muc and a.MA_FILE = ".$mafile." and a.TRANG_THAI = 0 ");
			  return $this->fetchAll();
		  }
		public function ktfilebixoa($mafile){
			  $this->setQuery("select ma_file from file where  MA_FILE = ".$mafile." and TRANG_THAI = 0 ");
			  return $this->fetchAll();
		  }
		public function chi_tiet_bao_cao($mafile){
			  $this->setQuery("select  	*   from  chi_tiet_bc_vp where ma_file =  '".$mafile."' and Trang_thai_bc = 0");
			  return $this->fetchAll();
		  }
	   public function xoa_bc_vp($mafile){
            $this->setQuery("delete from chi_tiet_bc_vp where ma_file = '".$mafile."'");
            return $this->executeQuery();
        }
		public function an_file($mafile){
            $this->setQuery("UPDATE file SET TRANG_THAI = 1 WHERE ma_file = '".$mafile."'");
            return $this->executeQuery();
        }
		public function an_bc_file($mafile){
            $this->setQuery("UPDATE  chi_tiet_bc_vp SET Trang_thai_bc = 1 WHERE ma_file = '".$mafile."'");
            return $this->executeQuery();
        }	
		public function lay_tat_ca_nguoi_dung(){
			  $this->setQuery("select a.EMAIL_TK, a.MAT_KHAU, b.MA_NGUOI_DUNG, b.TEN_NGUOI_DUNG, b.SDT, b.NGAY_SINH, b.DIA_CHI, b.CHIA_SE_TTCN, b.TIEN_TRONG_TK, c.MA_LOAI_TK, c.TEN_LOAI_TK from tai_khoan a, nguoi_dung b, loai_nguoi_dung c where  a.email_tk = b.email_tk and a.MA_LOAI_TK = c.MA_LOAI_TK order by b.MA_NGUOI_DUNG desc");
			  return $this->fetchAll();
		  }	
		public function lay_nguoi_dung_gh($bd, $kt){
			  $this->setQuery("select a.EMAIL_TK, a.MAT_KHAU, b.MA_NGUOI_DUNG, b.TEN_NGUOI_DUNG, b.SDT, b.NGAY_SINH, b.DIA_CHI, b.CHIA_SE_TTCN, b.TIEN_TRONG_TK, c.MA_LOAI_TK, c.TEN_LOAI_TK from tai_khoan a, nguoi_dung b, loai_nguoi_dung c where  a.email_tk = b.email_tk and a.MA_LOAI_TK = c.MA_LOAI_TK order by b.MA_NGUOI_DUNG desc limit ".$bd.",".$kt);
			  return $this->fetchAll();
		  }			
		public function lay_loai_tv(){
			  $this->setQuery("select * from  loai_nguoi_dung");
			  return $this->fetchAll();
		  }	
		 public function tennd($ten){
			  $this->setQuery("select email_tk from  tai_khoan where email_tk = '".$ten."'");
			  return $this->fetchAll();
		  }	
		 public function themtaikhoan($mail,$loai_tk, $mk){
            $this->setQuery("insert into tai_khoan values ('".$mail."',".$loai_tk.",'".$mk."')");
            return $this->executeQuery();
        }
		public function maxthumuc(){
            $this->setQuery("select max(MA_THU_MUC) from thumuc ");
           return $this->fetchAll();
        }			
		public function themthumuc($matm,$mail){
            $this->setQuery("insert into thumuc values (".$matm.",'".$mail."','".$mail."',sysdate(),0,0)");
            return $this->executeQuery();
        }
		public function max_ma_nd(){
            $this->setQuery("select max(MA_NGUOI_DUNG) from NGUOI_DUNG ");
           return $this->fetchAll();
        }
		public function themnguoidung($mail,$ma,$ten,$sdt,$ngaysinh,$diachi){
            $this->setQuery("insert into nguoi_dung values ('".$mail."',".$ma.",'".$ten."','".$sdt."','".$ngaysinh."','".$diachi."',0,0)");
            return $this->executeQuery();
        }
		public function themnguoidung_nsnull($mail,$ma,$ten,$sdt,$diachi){
            $this->setQuery("insert into nguoi_dung values ('".$mail."',".$ma.",'".$ten."','".$sdt."',NULL,'".$diachi."',0,0)");
            return $this->executeQuery();
        }
		 public function xoataikhoan($mail){
            $this->setQuery("delete from tai_khoan where email_tk = '".$mail."'");
            return $this->executeQuery();
        }

				
 		 public function xoanguoidung($mail){
            $this->setQuery("delete from nguoi_dung where email_tk = '".$mail."'");
            return $this->executeQuery();
        }	
		public function xoathumuc($mail){
            $this->setQuery("delete from thumuc where email_tk = '".$mail."'");
            return $this->executeQuery();
        }	
		public function xoafiletrongthumuc($matm){
            $this->setQuery("delete from file where ma_thu_muc = ".$matm);
            return $this->executeQuery();
        }
		public function xoactnangcap($mail){
            $this->setQuery("delete from chi_tiet_nang_cap where email_tk = '".$mail."'");
            return $this->executeQuery();
        }
		public function xoabctheoemail($mail){
            $this->setQuery("delete from  chi_tiet_bc_vp where email_tk = '".$mail."'");
            return $this->executeQuery();
        }
		public function danh_sach_thu_muc($mail){
            $this->setQuery("select MA_THU_MUC from thumuc where email_tk = '".$mail."'");
           return $this->fetchAll();
        }
		public function suattnguoidung($mail,$ten,$sdt,$ngaysinh,$diachi){
            $this->setQuery("update nguoi_dung set TEN_NGUOI_DUNG = '".$ten."',SDT = '".$sdt."', NGAY_SINH = '".$ngaysinh."', DIA_CHI = '".$diachi."'   where email_tk = '".$mail."'");
            return $this->executeQuery();
        }
		public function suattnguoidungnullngaysinh($mail,$ten,$sdt,$diachi){
            $this->setQuery("update nguoi_dung set TEN_NGUOI_DUNG = '".$ten."',SDT = '".$sdt."', NGAY_SINH = 'NULL' ,DIA_CHI = '".$diachi."'   where email_tk = '".$mail."'");
            return $this->executeQuery();
        }
		public function suatknguoidung($mail,$thanhvien){
            $this->setQuery("update tai_khoan set MA_LOAI_TK = ".$thanhvien."  where email_tk = '".$mail."'");
            return $this->executeQuery();
        }
 		public function so_thanh_vien(){
            $this->setQuery("select count(*) from tai_khoan");
           return $this->fetchAll();
        }
  		public function so_thanh_vien_admin(){
            $this->setQuery("select count(*) from tai_khoan where MA_LOAI_TK = 1");
           return $this->fetchAll();
        }		
		public function so_thanh_vien_vip(){
            $this->setQuery("SELECT  * FROM chi_tiet_nang_cap  WHERE ngay_ket_thuc >= curdate() group by email_tk ");
           return $this->fetchAll();
        }

		public function thanh_vien_chua_nang_cap(){
            $this->setQuery("SELECT  count(*) FROM tai_khoan a WHERE a.email_tk not in (select distinct b.EMAIL_TK from chi_tiet_nang_cap b)");
           return $this->fetchAll();
        }
		public function tong_gold_nang_cap(){
            $this->setQuery("SELECT  a.email_tk, a.MA_LOAI_TV, a.SO_LAN_GIA_HAN, b.Gold  FROM chi_tiet_nang_cap a, loai_goi b  WHERE a.MA_LOAI_TV = b.MA_LOAI_TV");
           return $this->fetchAll();
        }
		public function so_gold_trong_tktv(){
            $this->setQuery("SELECT  a.email_tk, a.MA_LOAI_TV, a.SO_LAN_GIA_HAN, b.Gold  FROM chi_tiet_nang_cap a, loai_goi b  WHERE a.MA_LOAI_TV = b.MA_LOAI_TV");
           return $this->fetchAll();
        }
		public function so_file_upload(){
            $this->setQuery("SELECT  count(*) FROM file  WHERE trang_thai = 0 ");
           return $this->fetchAll();
        }
		public function so_thu_muc_luu_tru(){
            $this->setQuery("SELECT  count(*) FROM thumuc ");
           return $this->fetchAll();
        }
		public function tong_dl_file_upload(){
            $this->setQuery("SELECT  sum(KICH_THUOC_FILE) FROM file  WHERE trang_thai = 0 ");
           return $this->fetchAll();
        }
		  		public function so_thanh_vien_theo_ngay($bd,$kt){
            $this->setQuery("select count(*) from thumuc where MA_THU_MUC_CHA = 0 and NGAY_TAO_TH >=  '".$bd."' and NGAY_TAO_TH <= '".$kt."'");
           return $this->fetchAll();
        }
		public function so_thanh_vien_admin_theo_ngay($bd,$kt){
            $this->setQuery("select count(*) from thumuc a, tai_khoan b where a.email_tk = b.email_tk and b.MA_LOAI_TK = 1 and a.MA_THU_MUC_CHA = 0 and a.NGAY_TAO_TH >=  '".$bd."' and a.NGAY_TAO_TH <= '".$kt."'");
           return $this->fetchAll();
        }
		public function so_thanh_vien_vip_theo_ngay($bd,$kt){
            $this->setQuery("SELECT  * FROM chi_tiet_nang_cap  WHERE  (NGAY_NANG_CAP 	 >= '".$bd."' and NGAY_NANG_CAP <= '".$kt."') or (NGAY_NANG_CAP 	 <= '".$bd."' and NGAY_KET_THUC >= '".$kt."')  group by email_tk ");
           return $this->fetchAll();
        }
		public function tong_gold_nang_cap_theo_ngay($bd,$kt){
            $this->setQuery("SELECT  a.email_tk, a.MA_LOAI_TV, a.SO_LAN_GIA_HAN, b.Gold  FROM chi_tiet_nang_cap a, loai_goi b  WHERE a.MA_LOAI_TV = b.MA_LOAI_TV and ((NGAY_NANG_CAP 	 >= '".$bd."' and NGAY_NANG_CAP <= '".$kt."') or (NGAY_NANG_CAP 	 <= '".$bd."' and NGAY_KET_THUC >= '".$kt."'))");
           return $this->fetchAll();
        }
		public function so_thu_muc_luu_tru_theo_ngay($bd,$kt){
            $this->setQuery("SELECT  count(*) FROM thumuc where  NGAY_TAO_TH >=  '".$bd."' and NGAY_TAO_TH <= '".$kt."'");
           return $this->fetchAll();
		}
		public function so_file_upload_theo_ngay($bd,$kt){
            $this->setQuery("SELECT  count(*) FROM file  WHERE trang_thai = 0 and NGAY_TAO >=  '".$bd."' and NGAY_TAO <= '".$kt."'");
           return $this->fetchAll();
        }
		public function tong_dl_file_upload_theo_ngay($bd,$kt){
            $this->setQuery("SELECT  sum(KICH_THUOC_FILE) FROM file  WHERE trang_thai = 0 and NGAY_TAO >=  '".$bd."' and NGAY_TAO <= '".$kt."'");
           return $this->fetchAll();
        }		
  }
	  ?>