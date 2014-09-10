var myVar;
function checktimeout() {
     myVar = setTimeout(function(){ timkiemnguoidung()}, 1500);
}
function checktimeout2() {
	 clearTimeout(myVar);
     setTimeout(function(){ timkiemnguoidungnut()}, 1000);
}
function timkiemnguoidung(){
	
	var txtten = document.getElementById('txtten').value;
	var sl = txtten.length;
 if (sl > 3){
	
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

		xmlhttp.open("GET","controls/c_timkiemnguoidung.php?txtten="+txtten,true);
		 xmlhttp.send();
		 }


}
function timkiemnguoidungnut(){
	
	var txtten = document.getElementById('txtten').value;
	var sl = txtten.length;

	
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

		xmlhttp.open("GET","controls/c_timkiemnguoidung.php?txtten="+txtten,true);
		xmlhttp.send();



}