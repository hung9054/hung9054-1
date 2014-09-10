<?php
	class Paginator{
	  var $so_dong_moi_trang=10;
	  var $hien_thi=5; //so trang hien thi
	  var $trang=1;//trang hien tai
	  var $ts;// tong so dong cua danh sach
	  public function __construct($ts,$trang,$sdmt=10,$ht=5){     
              $this->ts=$ts;
              $this->trang=$trang;
              $this->so_dong_moi_trang=$sdmt;
              $this->hienthi=$ht;              
          }
          public function getLink(){
              $so_trang=ceil($this->ts/$this->so_dong_moi_trang);
              $doan=ceil($this->trang/$this->hien_thi);
              $t_bd=($doan-1)*$this->hienthi+1;
              $t_kt=$doan*$this->hien_thi;
              if($t_kt>$so_trang) $t_kt=$so_trang;
              $link="";              
              if($this->trang>1) {
                  $link.="<a href='#none' class= 'p-link' onclick='chuyen_trang(1)'>Trang đầu</a>";
                 // $link.="<a href='#none' class='p-link' onclick='chuyen_trang(".($this->trang-1).")'>Trang Truoc</a>";
              }
              if($doan>1){
                  $link.="<a href= '#none' class= 'p-link' onclick='chuyen_trang(".($doan-1).$this->hien_thi.")'>...</a>";
              }
              for($i=$t_bd;$i<=$t_kt;$i++){
                  if($i==$this->trang){
                      $link.="<span class='p-link-cur'>$i</span>";
                  }else{
                      $link.="<a href='#none' class='p-link'  onclick='chuyen_trang(".$i.")' class='p-link'>$i</a>";
                  }
              }
              if($so_trang>$t_kt){
                  $link.="<a href='#none' class='p-link' onclick='chuyen_trang(".($t_kt+1).")'>...</a>";
              }
              if($this->trang<$so_trang){
                 // $link.="<a href='#none' class='p-link' onclick='chuyen_trang(".($this->trang+1).")'>Trang Ke</a>";
                  $link.="<a href='#none' class='p-link' onclick='chuyen_trang(".$so_trang.")'>Trang cuối</a>";
              }
              return $link;        
        }   
        public function getOffset(){
            return ($this->trang-1)*($this->so_dong_moi_trang);
        }
        public function getNumRow(){
            return $this->so_dong_moi_trang;
        }
}
?>