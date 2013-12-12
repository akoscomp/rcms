var $ = require('jquery');
var Computer = require('./model.js');

// store the new computer in database, and set the power state on for power on computers
function store(set) {
	var computer = new Computer();
	computer.mac = set.mac;
	computer.ip = set.ip;
	computer.room = 'others';
	computer.manufac = set.manufac;
	computer.powerstate = 1;
	computer.hostname = set.hostname;
	computer.os = "";
	computer.poweron = 1;
	computer.poweroff = 0;
	computer.vnc = 0;
	computer.comments = "";

	var query = { mac: computer.mac };
	var update = { $set: { powerstate: true } };
	Computer.findOneAndUpdate(query, update, function ( err, res ) {
		if (err) {
			console.log('Update error:' + err);
		}
		if (res == null) {
			console.log('Create new record: ' + computer.ip);
			computer.save(function (error, computer) {
	                   if (error)
	                       console.log(error);
        	           else
                	       console.log('Computer saved: ' + computer.ip);
	                });
		}
	});
};

// set all computer power state off in database
function setPowerStateOff(Computer) {
    var conditions = { powerstate: true };
    var update = { $set: { powerstate: false } };
    var options = { multi: true };

    Computer.update( conditions, update, options, callback );

    function callback (err, numAffected) {
      // numAffected is the number of updated documents
      console.log('Rows changed to false: ' + numAffected);
    }
}

// get power on computer list from server
// json input: mac, ip, hostname(long), manufacturer
$.getJSON("http://localhost/rcms/scan.php", function(data) {
    setPowerStateOff(Computer);
    console.log(data);
    $.each(data, function (i, set) {
	console.log("Mac: " + set.mac);
	store(set);
    });
});

