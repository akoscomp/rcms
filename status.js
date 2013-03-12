/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function getXMLHTTPRequest() {
	try {
		req = new XMLHttpRequet();
	} catch (err) {
					req = false;
				}
}

function getStatus() {
	var myurl = "getstatus.php";
	acction = "action";
	var modurl = myrul+"?action="+action;
	http.open("GET", modurl, true);
	http.onreadystatechange = useHttpResponse;
	http.send(null);
}
