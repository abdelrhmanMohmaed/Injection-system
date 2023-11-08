'use strict';

class Socket
{
    constructor(socket)
    {
        this.io=socket;

    }

    ioConfig()
    {
        this.io.use((socket,next)=>{
            // socket['id']=socket.handshake.query.user_id;
            // console.log(socket.id);
            next();
    });
    }
    socketConnection()
    {
        this.ioConfig();

        this.io.on('connection',(socket)=>{

            // console.log(this.io.sockets.clients());
            socket.broadcast.emit('online_user',{
                socket_id:socket.id
            });
            this.newToolRequest(socket);
            this.newQualityRequest(socket);
            this.newMainRequest(socket);
            this.newPost(socket);
            this.changePlan(socket);
            this.newParameter(socket);
            this.newToolAction(socket);
            this.newQualityAction(socket);
            this.newMainAction(socket);
            this.notification(socket);
            this.socketDisconnect(socket);
        });
    }

    newToolRequest(socket)
    {
        socket.on('newToolRequest',(data)=>{
           this.io.emit('fetchRequest',(data))
        });
    }
    newQualityRequest(socket)
    {
        socket.on('newQualityRequest',(data)=>{
           this.io.emit('fetchQualityRequest',(data))
        });
    }
    newMainRequest(socket)
    {
        socket.on('newMainRequest',(data)=>{
            this.io.emit('fetchMainRequest',(data))
        });
    }

    newPost(socket)
    {
        socket.on('newPost',(data)=>{
            this.io.emit('fetchPost',(data))
        });
    }
    changePlan(socket)
    {
        socket.on('changePlan',(data)=>{
            this.io.emit('fetchPlan',(data))
        });
    }
    newParameter(socket)
    {
        socket.on('newParameter',(data)=>{
            this.io.emit('fetchParameter',(data))
        });
    }

    newToolAction(socket)
    {
        socket.on('newToolAction',(data)=>{
            this.io.emit('fetchAction',(data))
        });
    }
    newQualityAction(socket)
    {
        socket.on('newQualityAction',(data)=>{
            this.io.emit('fetchQualityAction',(data))
        });
    }
    newMainAction(socket)
    {
        socket.on('newMainAction',(data)=>{
            this.io.emit('fetchMainAction',(data))
        });
    }
    notification(socket)
    {
        socket.on('notification',(data)=>{
            this.io.emit('fetchNotification',(data))
        });
    }
    socketDisconnect(socket)
    {
        socket.on('disconnect',(data)=>{

        });
    }



}
module.exports=Socket;
