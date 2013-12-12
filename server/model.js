var mongoose = require('mongoose');

mongoose.connect('localhost', 'rcms')
mongoose.connection.on('error', function (err) {
  console.error('MongoDB error: ' + err.message);
  console.error('Make sure a mongoDB server is running and accessible by this application')
});

var computerSchema = mongoose.Schema({
    mac: {
        type: String,
        lowercase: true,
        unique: true,
    },
    ip: String,
    room: String,
    manufac: String,
    powerstate: Boolean,
    hostname: {
        type: String,
        lowercase: true
    },
    os: String,
    poweron: Boolean,
    poweroff: Boolean,
    comments: String,
});

module.exports = mongoose.model('Computer', computerSchema);

