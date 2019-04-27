<?php
  include 'connection.php';
  error_reporting(0);
  session_start();
  $idim="";
  $idim=$_SESSION['user_id'];
  $sql="select * from doktorlar where id=".$idim;
  $res=mysqli_query($link,$sql);
  while ($row=mysqli_fetch_array($res)) {
    break;
  }
/*  if($idim==""){
    header('Location: http://localhost/medicheck/notfoundpage.html');//id ile usernamei sessiona ata ve anasayfaya git
  }*/
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
        <title>Tinker CSS Template</title>
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
          #container ul li{
            color: white;
          }
          #container ul li a{
            color: white;
          }
          #container ul ul{
            display: none;
          }
          #container ul li:hover > ul{
            display: block;
          }
          #container{
            background-image: url('../img/bg_mobile_page.png');
          }

          .text-content em {
          	font-style: normal;
          	color: #f7c552;
          	font-size: 42px;
          }

          .text-content p{
            color:black;
            font-size: 25px;
            text-align: center;
          }
        </style>
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
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
                    <?php if($idim==""){ ?>
                    <a href="index.html" class="navbar-brand scroll-top"><em>M</em>edi<em>C</em>heck</a>
                  <?php }else{ ?>
                    <a href="mainpage.php" class="navbar-brand"><em>M</em>edi<em>C</em>heck</a>
                    <?php } ?>
                </div>
                <!--/.navbar-header-->
                <div id="container" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                      <?php if($idim==""){ ?>
                        <li><a href="index.html">Anasayfa</a></li>
                      <?php }else{  ?>
                      <li><a href="mainpage.php">Anasayfa</a></li>
                      <?php } ?>
                      <li><a href="mobile_app_info.php">Mobil Uygulama</a></li>
                      <?php if($idim==""){ ?>
                        <li><a href="index.html#about">Hakkımızda</a></li>
                      <?php }else{ ?>
                        <li><a href="mainpage.php#about">Hakkımızda</a></li>
                      <?php
                            }
                        if($idim==""){
                       ?>
                      <li><a href="registration_user.php">Kaydol</a></li>
                      <li><a href="login.php">Giriş Yap</a></li>
                    <?php }else{?>
                      <li>
                        <a href="#" > <img src="img/notification_icon.png" alt=""> </a>
                        <ul>
                          <li>
                            <a href="patients_confirm_page.php">Hasta onayları</a>
                          </li>
                          <li>
                            <a href="#">Randevular</a>
                          </li>
                          <li>
                            <a href="#">Hasta mesajları</a>
                          </li>
                        </ul>
                      </li>
                      <li>
                        <a href="#" > <img src="img/account_info.png" alt=""> </a>
                        <ul>
                          <li>
                            Adı: <?php echo $row['doktor_adi']; ?>
                          </li>
                          <li>
                            Soyadı: <?php echo $row['doktor_soyadi']; ?>
                          </li>
                          <li>
                            Kullanıcı Adı: <?php echo $row['doktor_kulad']; ?>
                          </li>
                          <li>
                            <a href="account_info.php">Hesap Bilgileri</a>
                          </li>
                          <li>
                            <a href="logout.php"> <img src="img/logout_icon.png" alt=""> </a>
                          </li>
                        </ul>
                      </li>
                      <?php } ?>

                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </div>
    <!--/.header-->


    <div class="parallax-content baner-content_" id="home">
        <div class="container">
            <div class="text-content">
                <h2><em>M</em>edi<em>C</em>heck Android Uygulaması</h2>
                <p>MediCheck android uygulaması hastalar için geliştirilmiş olup sadece doktor ile iletişime geçmek için değil günlük yaşamda da kullanabileceğiniz bir uygulamadır.</p>
                <div class="primary-white-button">
                    <a href="login.php" >Hemen İndir</a>
                </div>
            </div>
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
