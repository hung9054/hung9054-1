var myVar;
function checktimeout() {
     myVar = setTimeout(function(){ timkiemfile()}, 1500);

}
function checktimeout2() {
	 clearTimeout(myVar);
     setTimeout(function(){ timkiemfilenut()}, 1000);
}
function timkiemfile(){
	
	var txttenfile = document.getElementById('txttenfile').value;
	var check = document.getElementById('check').checked;

	var sl = txttenfile.length;
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

		xmlhttp.open("GET","Control/c_timkiemfile.php?txttenfile="+txttenfile+"&check="+check,true);
		xmlhttp.send();
		 }
		return false;

}


function timkiemfilenut(){

	
	var txttenfile = document.getElementById('txttenfile').value;
	var check = document.getElementById('check').checked;

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

		xmlhttp.open("GET","controls/c_timkiemfile.php?txttenfile="+txttenfile+"&check="+check,true);
		xmlhttp.send();
		 
		return false;

}