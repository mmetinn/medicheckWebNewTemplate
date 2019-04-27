<!doctype html>
<html>
<head>
  <title>Socket.IO chat</title>
  <style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body { font: 13px Helvetica, Arial; }
  form { background: #000; padding: 3px; position: fixed; bottom: 0; width: 100%; }
  form input { border: 0; padding: 10px; width: 90%; margin-right: .5%; }
  form button { width: 9%; background: rgb(130, 224, 255); border: none; padding: 10px; }
  #messages { list-style-type: none; margin: 0; padding: 0; }
  #messages li { padding: 5px 10px; }
  #messages li:nth-child(odd) { background: #eee; }
</style>
<script src="/socket.io/socket.io.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.js"></script>
    <!--<script>
      $(function () {
        var socket = io();
        $('form').submit(function(){
          socket.emit('chat message', $('#m').val());
          $('#m').val('');
          return false;
        });
      });
    </script>-->
    <script>
      var sayac=0;
      $(function () {
        var socket = io();
        $('form').submit(function(){
          var a=$('#m').val();
          socket.emit('join',{ customId:"HaveCustomIdNow", message:a,destination:"k2" });
          $('#m').val('');
          return false;
        });
        socket.on('chat message', function(msg){
          //if(msg.destination=="k1"){
          	var ses = new Audio("http://192.168.0.10/socket_io/not.mp3");
          	ses.play();
            $('#messages').append($('<li>').text(msg.message));
            return false;
          //}
        });

        socket.on('chat users', function(usr){
          if(sayac==0){
             var count = Object.keys(usr).length;
            for(var i = 0 ; i < count ; i++ ){
              var x=usr[i].kulad;
              $('#t').append($('<tr>').append($('<td>').text(usr[i].kulad)));
            }
            sayac++;
            return false;
          }
        });
      });
    </script>
    <script>
      var socket = io();
    </script>
  </head>
  <body>
    <table border="1" id = "t">
    </table>
    <input type="input" name="aa">

    <ul id="messages"></ul>
    <form action="">
      <input id="m" autocomplete="off" /><button>Send</button>
    </form>
  </body>
  </html>