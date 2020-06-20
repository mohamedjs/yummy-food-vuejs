var socket_channel = 'notify';
var server = require('http').Server();
var io = require('socket.io')(server);
var Redis = require('ioredis');

var redis =  new Redis({
  port: 6379,          // Redis port
  host: 'ecommerce-ecommerce.herokuapp.com',   // Redis host
  family: 4,           // 4 (IPv4) or 6 (IPv6)
  password: '',
  db: 0
});

redis.subscribe(socket_channel);

io.on('connection', function(socket) {
  console.log('new user');

  redis.on('message', function (channel, message) {
      const event = JSON.parse(message);
      console.log('this is message : '+ event.data.message);
      io.emit(event.event, channel, event.data);
  });
});

console.log("Starting Socket.IO Server on port "+6001+" and channel "+socket_channel+"... ");

server.listen({
    port: 6001
});
