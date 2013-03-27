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
var room = document.getElementById(rObject.id).getAttribute('data-room');
xmlhttp.open("GET","table.php?room="+room,true);
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
xmlhttp.open("GET","start.php?mac="+oObject.id+"&ip="+ip,true);
xmlhttp.send();
}

function startall(oObject)
{
document.getElementById('spin').style.visibility = 'visible';
document.getElementById("messageBox").innerHTML = 'Please wait...';
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
    document.getElementById('spin').style.visibility = 'hidden';
    document.getElementById("messageBox").innerHTML=xmlhttp.responseText;
    }
  }

var ip = document.getElementById("ip").innerHTML;
var room = document.getElementById('startall').getAttribute('data-room');
xmlhttp.open("GET","startall.php?room="+room+"&ip="+ip,true);
xmlhttp.send();
}


function stop(oObject)
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

xmlhttp.open("GET","stop.php?hostname="+oObject.id+"&ip="+ip,true);
xmlhttp.send();
}

function stopall(oObject)
{
document.getElementById('spin').style.visibility = 'visible';
document.getElementById("messageBox").innerHTML = 'Please wait...';
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
var room = document.getElementById('stopall').getAttribute('data-room');
xmlhttp.open("GET","stopall.php?room="+room+"&ip="+ip,true);
xmlhttp.send();
}


function stopold() {

 alert("Go and power off the computer!");
}


function refresh(oObject) {
document.getElementById('spin').style.visibility = 'visible';
document.getElementById("messageBox").innerHTML = 'Please wait...';
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
var room = document.getElementById('refreshbt').getAttribute('data-room');
xmlhttp.open("GET","scan.php?room="+room,true);
xmlhttp.send();
}
