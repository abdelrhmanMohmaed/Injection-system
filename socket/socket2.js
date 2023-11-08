var app = require('express')();
var server = require('http').Server(app);

var io = require('socket.io')(server);
io.on('connection', function (socket) {

    console.log('done');
    socket.on('newToolRequest', function (data) {
    });
});
var Redis = require('ioredis');

var redis = new Redis();

// redis.subscribe('test-channel');
// redis.on('message', function (channel, message) {
//     console.log('Message Send');
//     message = JSON.parse(message);
//     io.emit(channel + ":" + message.event, message.data)
// });
server.listen(2000);


