function compStartStop(oObject)
{
	alert(oObject.innerHTML);
	$.ajax(
	{
		type: "POST",
		url: "/rcms/compStartStop.php",
		data: { mac: oObject.id, button: oObject.innerHTML, room: "room" },
		dataType: "json",
		async: false,
		success: function(data) {
		alert(data);
		}
	})
}

function bellStartStop(oObject)
{
	$.ajax(
	{
		type: "POST",
		url: "/rcms/bellStartStop.php",
		data: { button: oObject.innerHTML },
		dataType: "json",
		async: false,
		success: function(data) {
			var button = document.getElementById("ringStartStop");
			if (data == "1") {
				button.innerHTML="Stop";
				button.className="btn btn-lg btn-default btn-danger";
			}
			else {
				button.innerHTML="Start";
				button.className="btn btn-lg btn-default btn-success";
			}
		}
	})
}

function bellStop()
{
	$.ajax(
	{
		type: "POST",
		url: "/rcms/bellStartStop.php",
		data: { button: "Stop" },
		dataType: "json",
		async: true
	})
}

/*
var id = $("button").closest("div").attr("id");  // megadja a jelen gomb szulo div id-jet
$("button").click(function () {
    var correctAnswer = $(this).parent().siblings("input[type=hidden]").val();
    var userAnswer = $(this).parent().siblings("input[type=text]").val();
    validate(userAnswer, correctAnswer);
    $("#messages").html(feedback);
});

*/

/*
function parseElements() {
	$('.class_name').each(    //vegeimegy minde class_name calss-u elemen
		function(index) {  /az indexben megvan, hgoy epp hanyadik elemen vagyok
			$(this).find('input.serverdatetime').val()    / az aktuaslisaj kijelolt class_name class-u elem serverdatetime class-u imput elemet keresi meg es val-al megadja az ereket, jelen esetben a datumot
			var d = new Date($(this).find('input.serverdatetime').val());   //ebbol a javascript datumot konvertal ez a postbejegyzes datuma
			var now = new Date(ServerDateTime); //ez meg a szerverideo
			
		}
	)
}
*/

/*
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
*/

/*
function startComp(oObject)
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
*/