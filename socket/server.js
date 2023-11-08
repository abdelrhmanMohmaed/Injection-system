'use strict';

const express=require('express');
const http=require('http');
const socket=require('socket.io');
// var Redis = require('ioredis');

// var redis = new Redis();


const socketServer=require('./socket');
class Server {
    constructor()
    {
        this.port=5050;
        this.host='10.107.32.7';
        this.app=express();
        this.http=http.Server(this.app);
        this.socket=socket(this.http);
        // redis.subscribe('test-channel');
        // redis.on('message', function (channel, message) {
        //     console.log('Message done');
        //     message = JSON.parse(message);
        //     socket.emit(channel + ":" + message.event, message.data)
        // });
    }

    runServer()
    {
        new socketServer(this.socket).socketConnection();
        this.http.listen(this.port,this.host,()=>{
            console.log(`this server is running at http//:${this.host}:${this.port}`);
        })
    }
}
const app=new Server();
app.runServer();
