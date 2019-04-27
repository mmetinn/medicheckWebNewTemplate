const express = require('express'),
http = require('http'),
app = express(),
server = http.createServer(app),
io = require('socket.io').listen(server);
var mysql = require('mysql');
var con = mysql.createConnection({
  host: "localhost",
  user: "username",
  password: "password",
  database: "medicheck"
});
var username;
var user_id;
app.get('/', (req, res) => {

res.send('Chat Server is running on port 3000')
});
var fs = require("fs");
io.on('connection', (socket) => {
console.log('user connected')

socket.on('join', function(userNickname) {

        console.log(userNickname +" : has joined the chat "  );

        socket.broadcast.emit('userjoinedthechat',userNickname +" : has joined the chat ");
        var sql = "INSERT INTO mesajlar (kullanici_adi,kullanici_sifre,mesaj) VALUES ('"+username+"','"+user_id+"','"+userNickname.message+"')";
    con.query(sql, function (err, result) {
      if (err) throw err;
      console.log("1 record inserted");
    });
    })


socket.on('messagedetection', (senderNickname,messageContent) => {

       //log the message in console

       console.log(senderNickname+" : " +messageContent)

      //create a message object

      let  message = {"message":messageContent, "senderNickname":senderNickname}

       // send the message to all users including the sender  using io.emit()

      io.emit('message', message )

      })

socket.on('disconnect', function() {
userNickname="aa";
        console.log(userNickname +' has left ')

        socket.broadcast.emit( "userdisconnect" ,' user has left')


    })




})



app.get('/message', function(req, res){
  fs.createReadStream(__dirname + '/message.php').pipe(res);
  username=req.query.u;
  user_id=req.query.i;
   //res.sendFile(__dirname + '/message.html');
});


server.listen(3000,()=>{

console.log('Node app is running on port 3000')

})
