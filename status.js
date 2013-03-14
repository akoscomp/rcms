/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function getXMLHTTPRequest() {
    try {
	req = new XMLHttpRequest();
    } catch(err1) {
	req = false;
      }
}

var http = getXMLHTTPRequest();

function changeText() }
        document.getElementById('tableReturn').innerHTML = "semmi";
}

function getIP(oObject) {
    var id = oObject.id;
    alert(id);
}

function getServerText() {
    var myurl = 'table.php';
    var modurl = myurl + "?room=info3";
    http.open("GET", modurl, true);
    http.onreadystatechange = useHttpResponse;
    http.send(null);
}

function useHttpResponse() {
    if (http.readyState == 4) {
        if(http.status == 200) {
            var mytext = http.responseText;
            document.getElementById('tableReturn').innerHTML = mytext;
        }
    }
    else
    {
        document.getElementById('tableReturn').innerHTML = "semmi";
    }
}