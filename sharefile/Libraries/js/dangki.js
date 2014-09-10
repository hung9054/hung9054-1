// JavaScript Document

	function check(f){
	if(f.txtten.value==""){
		alert(" Vui Lòng  Nhập Vào họ tên");
		f.txtten.focus();
		return false;
		}
	else if(f.txttdt.value==""){
		alert ("Vui Lòng  Nhập Vào Email");
		f.txttdt.focus();
		return false;
		}
	else if(f.txttdta.value =! f.txttdt.value){
		alert ("Email không giông nhau");
		f.txttdta.focus();
		return false;
		}
	else if(f.txtmk.value==""){
		alert ("Vui Lòng  Nhập Vào mật khẩu");
		f.txtmk.focus();
		return false;
		}
	else if(f.txtsdt.value==""){
		alert ("Vui Lòng  Nhập Vào số điện thoại");
		f.txtsdt.focus();
		return false;
		}	
	return true;
	}
