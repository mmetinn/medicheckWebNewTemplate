<?php
session_start();
$errorMsg = "";
include "connection.php";


//print_r($_POST);die;
function logincheck($u, $p) {
    global $link;
    $res=mysqli_query($link,"select * from doktorlar where doktor_kulad='$u' and doktor_sifre='$p' ");//bize gelen password ve username göre sorgu yapıtoruz
    while ($r = mysqli_fetch_array($res)) {
        return [
            'id' => $r['id'],
            'username' => $r['doktor_kulad'],];//gelen veriyi return ediyoruz.
    }
}

if ( count($_POST) > 0) {

    if (isset($_POST['input_username']) && isset($_POST['input_user_password'])) {
        $u = md5($_POST['input_username']);
        $p = md5($_POST['input_user_password']);
        $user = logincheck($u, $p);// kullanıcı adı ve şifremizi bir değişkene atıp fonksiyona göderiyoruz.ve return edilen veriyi user değişkeninin içerisine atıyoruz.
        if ( $user ) {//user boş değilse.
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['username'];
          //  echo "string".$user['id']." ".$user['username'];
            header('Location: http://localhost/medicheck/mainpage.php');//id ile usernamei sessiona ata ve anasayfaya git
            die;
        } else {
            $errorMsg = "Kullanıcı adı veya şifre hatalı!";//user boş ise error mesajı ver.
            echo "<script>alert('Kullanıcı adı veya şifre hatalı!');</script>";
        }
    }
}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!--
Tinker Template
http://www.templatemo.com/tm-506-tinker
-->
        <title>MediCheck Sing In</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/templatemo-style.css">
        <link rel="stylesheet" href="css/lightbox.css">
        <style media="screen">
          @import url('https://fonts.googleapis.com.css?family=Lobster|Pacifico');
        </style>
        <style media="screen">
          /**{
              margin: 0px;
              padding: 0px;
              height: 100%;
              width: 100%;
          }*/

          .intro {
          	width: 100%;
            height: 100%;
            background: url("Stock/lake-lucerne-3840x2400-switzerland-landscape-lake-mountain-4k-15261.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            display: table;
            top: 0;
          }

          .inner {
          	display: table-cell;
              vertical-align: middle;
              width: 100%;
          }

          .content {
          	width: 26vw;
            height: 62vh;
            background: rgba(255,255,255,0.39);
            margin: auto;
            border-radius: 1%;
            display: table;
          }

          .photo_user {
          	display: table-cell;
            width: 42%;
            height: 37%;
            margin: auto;
            border: 2px solid #726b6b;
            border-radius: 100%;
          }

          .input_username {
          	display: table-cell;
            margin-left: 3.5vw;
            margin-top: 6vh;
            padding: 1% 1% 1% 10%;
            background: url("Stock/if_user_925901.png");
            background-size: contain;
            background-repeat: no-repeat;
            font-size: 20px;
            font-family: 'Pacifico';
            border: 0px;
            border-bottom: 1px solid white;
            width: 13.5vw;
          }

          .input_user_password {
          	display: table-cell;
            margin-left: 3.5vw;
            margin-top: 6vh;
            padding: 1% 1% 1% 10%;
            background: url("Stock/if_user_925901.png");
            background-size: contain;
            background-repeat: no-repeat;
            font-size: 20px;
            font-family: 'Pacifico';
            border: 0px;
            border-bottom: 1px solid white;
            width: 13.5vw;
          }

          ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: white;
            opacity: 1; /* Firefox */
          }

          :-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: white;
          }

          ::-ms-input-placeholder { /* Microsoft Edge */
            color: white;
          }

        /*  .login_user{
            align: right;
              text-decoration: none;
              display: table;
              text-align: center;
              margin-top: 6%;
              height: 7vh;
              padding: 3% 0% 3% 0%;
              background: #12e553;
              font-family: 'Lobster';
              font-size: 1.8vw;
              color: #0d0707;
          }*/
          .login_user {
            margin-top: 10px;
          	-moz-box-shadow:inset 0px 0px 15px 3px #23395e;
          	-webkit-box-shadow:inset 0px 0px 15px 3px #23395e;
          	box-shadow:inset 0px 0px 15px 3px #23395e;
          	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #2e466e), color-stop(1, #bac6de));
          	background:-moz-linear-gradient(top, #2e466e 5%, #bac6de 100%);
          	background:-webkit-linear-gradient(top, #2e466e 5%, #bac6de 100%);
          	background:-o-linear-gradient(top, #2e466e 5%, #bac6de 100%);
          	background:-ms-linear-gradient(top, #2e466e 5%, #bac6de 100%);
          	background:linear-gradient(to bottom, #2e466e 5%, #bac6de 100%);
          	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#2e466e', endColorstr='#bac6de',GradientType=0);
          	background-color:#2e466e;
          	-moz-border-radius:17px;
          	-webkit-border-radius:17px;
          	border-radius:17px;
          	border:1px solid #1f2f47;
          	display:inline-block;
          	cursor:pointer;
          	color:#ffffff;
          	font-family:Arial;
          	font-size:15px;
          	padding:6px 13px;
          	text-decoration:none;
          	text-shadow:0px 1px 0px #263666;
          }
          .login_user:hover {
          	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #bac6de), color-stop(1, #2e466e));
          	background:-moz-linear-gradient(top, #bac6de 5%, #2e466e 100%);
          	background:-webkit-linear-gradient(top, #bac6de 5%, #2e466e 100%);
          	background:-o-linear-gradient(top, #bac6de 5%, #2e466e 100%);
          	background:-ms-linear-gradient(top, #bac6de 5%, #2e466e 100%);
          	background:linear-gradient(to bottom, #bac6de 5%, #2e466e 100%);
          	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#bac6de', endColorstr='#2e466e',GradientType=0);
          	background-color:#bac6de;
          }
          .login_user:active {
          	position:relative;
          	top:1px;
          }

        </style>
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>
    <div class="header">
        <div class="container">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand scroll-top"><em>M</em>edi<em>C</em>heck</a>
                </div>
                <!--/.navbar-header-->
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                      <li><a href="index.html">Anasayfa</a></li>
                      <li><a href="mobile_app_info.php" >Mobil Uygulama</a></li>
                      <li><a href="index.html#about">Hakkımızda</a></li>
                      <li><a href="registration_user.php">Kaydol</a></li>
                      <li><a href="login.php">Giriş Yap</a></li>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </div>
    <!--/.header-->


    <div class="parallax-content baner-content" id="home">
        <div class="container">
          <section class="intro">
            <div class="inner">
              <div class="content">
                <img src="img/user_singin.png" alt="" class="photo_user">
                <form class="form1" action="" method="post">
                  <input type="text" placeholder="Username"  value="" class="input_username" name="input_username">
                  <input type="password" placeholder="Password" value="" class="input_user_password" name="input_user_password">
                  <center><input type="submit" value="Log In" class="login_user"></center>
                </form>
                <a href="registration_user.php" style="color:white;"> Yeni hesap oluşturmak için tıkla. </a>
              </div>
            </div>
          </section>
        </div>
    </div>
    <?php
    include "footer.php";
     ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        // navigation click actions
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 50;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>
</body>
</html>
