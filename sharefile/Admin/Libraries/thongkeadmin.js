
function thongkeadmin(){
	
	var ngaybd = document.getElementById('ngaybd').value;
	var ngaykt = document.getElementById('ngaykt').value;
if ((ngaybd == '' && ngaykt != '')||(ngaybd != '' && ngaykt == ''))  {alert ("Bạn phải chọn cả ngày bắt đầu và ngày kết thúc (hoặc không chọn cả 2)"); return false;}



	var xmlhttp;
		if (window.XMLHttpRequest)
		  {
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {

		    document.getElementById("xuathienchonay").innerHTML=xmlhttp.responseText;
		    }
		  }

		xmlhttp.open("GET","controls/c_thongkeadmin.php?ngaybd="+ngaybd+"&ngaykt="+ngaykt,true);
		xmlhttp.send();



}