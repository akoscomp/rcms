/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function getServerText(rObject)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("tableReturn").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","table.php?room="+rObject.id,true);
xmlhttp.send();
}

function getIP(oObject) {
    alert(oObject.id);
}

function start(oObject)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("messageBox").innerHTML=xmlhttp.responseText;
    }
  }

var ip = document.getElementById("ip").innerHTML;

xmlhttp.open("GET","wol.php?mac="+oObject.id+"&ip="+ip,true);
xmlhttp.send();
}

function stop() {

 alert("Go and power off the computer!");
}


function refresh(oObject) {
document.getElementById('spin').style.visibility = 'visible';
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
 else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("messageBox").innerHTML=xmlhttp.responseText;
    getServerText(oObject);
    }
  }

xmlhttp.open("GET","scan.php?room="+oObject.id,true);
//xmlhttp.open("GET","table.php?room="+rObject.id,true);
xmlhttp.send();
}
