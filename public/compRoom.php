<?php
    include('header.php');
?>

<script src="js/jquery.tablesorter.min.js"></script>
<script>
	function loadCompTable() {
	/*var url = document.URL;
	url = url.replace("index.php", "getCompList1.php");*/
	var url = "getCompList1.php";
	$.getJSON(url,
		function (json) {
			var tr;
			for (var i = 0; i < json.length; i++) {
				tr = $('<tr/>');
				tr.append('<td> <span class="glyphicon"><span class="glyphicon-info-sign trigger"></span><span class="mytooltip">'
				+ '<span class="boxLabel">IP: </span><span class="boxText">' + json[i].ip + '</span></br>'
				+ '<span class="boxLabel">Mac: </span><span class="boxText">' + json[i].mac + '</span></br>'
				+ '<span class="boxLabel">Hostname: </span><span class="boxText">' + json[i].hostname + '</span></br>'
				+ '<span class="boxLabel">Manufacturer: </span><span class="boxText">' + json[i].manufac + '</span></br>'
				+ '</span></span></td>');
				tr.append("<td>" + json[i].hostname + "</td>");
				if (json[i].powerstate) {
					tr.append('<td class="poweron">On</td>');
					tr.append('<td><button id="' + json[i].mac + '" class="btn btn-danger btn-xs" onclick="compStartStop(this)">Stop</button></td>');
				}
				else
				{
					tr.append('<td class="poweroff">Off</td>');
					tr.append('<td><button id="' + json[i].mac + '" class="btn btn-success btn-xs" onclick="compStartStop(this)">Start</button></td>');
				}
				$('#myTable').append(tr);
			}
	});
}

	$(document).ready(function() {
		loadCompTable();
//		$("#myTable").tablesorter();
    });


</script>

        <div class="container">
            <div class="jumbotron text-center">
                <h2>Internet</h2>
                <a class="btn btn-default btn-success">Start</a>
                <a class="btn btn-default btn-danger">Stop</a>
            </div>
        </div>

	<div class="container">
	<div class="row">
        <div class="span6">
        <div class="table-responsive">
			<table id="myTable" class="table table-striped table-bordered table-condensed tablesorter">
			<thead>
				<tr class="warning">
					<th>Info</th>
					<th>Computer name</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
			<tfoot>
				<tr class="active">
					<th></th>
					<th></th>
					<th></th>
					<th>
						<button id="startAll" class="btn btn-success btn-xs" onclick="compStartStop(this)">Start</button>
						<button id="stopAll" class="btn btn-danger btn-xs" onclick="compStartStop(this)">Stop</button>
					</th>
				</tr>
			</tfoot>
			</table>
	</div>
	</div>
	</div>
	</div>

<?php
    include('footer.php');
?>
