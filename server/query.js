var Computer = require('./model.js');

//query
Computer.find({}, function (error, computer) {
    if (error)
        console.log(error)
    if(computer)
        console.log( JSON.stringify(computer) );
});
