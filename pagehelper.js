/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


// JS functions for etcon.php remote script call and ouput print
function buttons_state(state) {
 for (var i=1; i<4; i++) {
  document.getElementById("import201" + i.toString()).disabled = state;
  document.getElementById("remove201" + i.toString()).disabled = state;
 }
 document.getElementById("importall").disabled = state;
 document.getElementById("removeall").disabled = state;
}

function run(action) {
    var dt = new Date();
    var hour = dt.getHours();
    var min = dt.getMinutes();
    var sec = dt.getSeconds();
    document.getElementById("btime").innerHTML = "<td>Time Before last operation:</td><td>&nbsp;<strong>" + dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds(); + "</td>"
    var url = "etcon.php?action=" + action;
    buttons_state(true);
    var confrun = true;
    if (action == "removeall")  { confrun = confirm("Are you sure that you want to REMOVE ALL FOLDERS from LOCAL server?"); }
    if (action == "copyall")  { confrun = confirm("Are you sure that you want to IMPORT ALL FOLDERS from REMOTE server? More than 15 Minutes task!"); }
    if (confrun == true) {
     document.getElementById("atime").innerHTML = "<td>Now Executing <i>" + url + "</i></td>";
     document.getElementById("output").innerHTML = "Please do not refresh the page while connected to the remote server!<br><br><center><img src='loader_c1.gif' alt='Preparing the output'/></center>";
     if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
      } else if (window.ActiveXObject) {
               req = new ActiveXObject("Microsoft.XMLHTTP");
      }
     req.open("GET", url, true);
     req.onreadystatechange = callback;
     req.send(null);
    }
    else  {  // if cancel pressed in alert window
     document.getElementById("output").innerHTML = "&nbsp; Operation canceled by user!"
     document.getElementById("atime").innerHTML = "<td> Canceled </td>";
     buttons_state(false);
    }
}

function callback() {
    var dt = new Date();
    if (req.readyState == 4) {
        if (req.status == 200) {
            buttons_state(false);
            document.getElementById("atime").innerHTML = "<td>Finishing last operation at:</td><td>&nbsp;<strong>" + dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds() + "</td>";
            document.getElementById("output").innerHTML = "<small><center> Script executed with Success...</center></small> <hr size='1' color='#8e9cbf' noshade>" + req.responseText;
           } else {
            alert("There was a problem in calling the server-side script!:\n" +  req.statusText);
        }
    }
}

function aredir() {
alert("Action: REFRESH Folder Listing");
document.location='index.php';
}

function aredir2() {
alert("All operations done. Refreshing the folder listing..");
document.location='index.php';
}