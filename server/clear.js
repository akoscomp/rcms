var mongoose = require('mongoose');
mongoose.connect('localhost', 'rcms-test')
mongoose.connection.on('error', function (err) {
  console.error('MongoDB error: ' + err.message);
  console.error('Make sure a mongoDB server is running and accessible by this application')
});

// drop mydatabase
mongoose.connection.db.dropDatabase();
// mydatabase has been dropped

