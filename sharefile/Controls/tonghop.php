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
		public function chitietbaocao($mafile){
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
			  $this->setQuery("select a.EMAIL_TK, a.MAT_KHAU, b.MA_NGUOI_DUNG, b.TEN_NGUOI_DUNG, b.SDT, b.NGAY_SINH, b.DIA_CHI, b.CHIA_SE_TTCN, b.TIEN_TRONG_TK, c.MA_LOAI_TK, c.TEN_LOAI_TK from tai_khoan a, nguoi_dung b, loai_nguoi_dung c where  a.email_tk = b.email_tk and a.MA_LOAI_TK = c.MA_LOAI_TK order by c.MA_LOAI_TK");
			  return $this->fetchAll();
		  }	
		public function lay_nguoi_dung_gh($bd, $kt){
			  $this->setQuery("select a.EMAIL_TK, a.MAT_KHAU, b.MA_NGUOI_DUNG, b.TEN_NGUOI_DUNG, b.SDT, b.NGAY_SINH, b.DIA_CHI, b.CHIA_SE_TTCN, b.TIEN_TRONG_TK, c.MA_LOAI_TK, c.TEN_LOAI_TK from tai_khoan a, nguoi_dung b, loai_nguoi_dung c where  a.email_tk = b.email_tk and a.MA_LOAI_TK = c.MA_LOAI_TK order by c.MA_LOAI_TK limit ".$bd.",".$kt);
			  return $this->fetchAll();
		  }			

  }
	  ?>