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
  if($idim==""){
    header('Location: http://localhost/medicheck/notfoundpage.html');//id ile usernamei sessiona ata ve anasayfaya git
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
        <title>MediCheck</title>
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

          body {
            font-family: 'Open Sans', sans-serif;
          }

          .card {
            width: 500px;                /* Set width of cards */
            height: 300px;
            display: flex;                /* Children use Flexbox */
            flex-direction: column;       /* Rotate Axis */
            border: 1px solid #FFFFFF;    /* Set up Border */
            border-radius: 4px;           /* Slightly Curve edges */
            overflow: hidden;             /* Fixes the corners */
            margin: 5px;                  /* Add space between cards */
          }

          .card-header {
            color: #D32F2F;
            height: 40px;
            text-align: center;
            font-size: 18px;
            font-weight: 600;
            border-bottom: 1px solid #FFFFFF;
            background-color: #FFFFFF;
            padding: 5px 10px;
          }

          .card-main {
            display: flex;              /* Children use Flexbox */
            flex-direction: column;     /* Rotate Axis to Vertical */
            justify-content: center;    /* Group Children in Center */
            align-items: center;        /* Group Children in Center (on cross axis) */
            padding: 15px 0;            /* Add padding to the top/bottom */
          }

          .material-icons {
            font-size: 36px;
            color: #D32F2F;
            margin-bottom: 5px;
          }

          .main-description {
            margin-top: 10px;
            margin-bottom: 15px;
            color: #FFFFFF;
            font-size: 20px;
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
                    <a href="mainpage.php" class="navbar-brand scroll-top"><em>M</em>edi<em>C</em>heck</a>
                </div>
                <!--/.navbar-header-->
                <div id="container" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                      <li>
                        <a href="mainpage.php">Anasayfa</a>
                      </li>
                      <li><a href="mobile_app_info.php" >Mobil Uygulama</a></li>
                      <li><a href="#" class="scroll-link" data-id="about">Hakkımızda</a></li>
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
                    <!--  <li><a href="registration_user.php">Kaydol</a></li>
                      <li><a href="login.php">Giriş Yap</a></li>-->
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
          <table>
            <tr>
              <td>
                <div class="card">
                  <div class="card-header">Kayıtlı Hastalar</div>
                  <div class="card-main">
                    <img src="img/registered_patients_icon.png" alt="">
                    <div class="main-description">Sisteminizde kayıtlı olan hastaların ayrıntlı listesini görmek için tıklayınız</div>
                    <div class="primary-white-button">
                        <a href="registered_patients_list.php"> Git </a>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="card">
                  <div class="card-header">Hasta Ölçümleri</div>
                  <div class="card-main">
                    <img src="img/measurement_icon.png" alt="">
                    <div class="main-description">Sisteminizde kayıtlı olan hastaların ölçümlerini görmek için tıklayınız.</div>
                    <div class="primary-white-button">
                        <a href="registered_patients_measurement_list.php"> Git </a>
                    </div>
                  </div>
                </div>
              </td>
              <td>
               <!-- <div class="card">
                  <div class="card-header">Hasta Ölçümleri</div>
                  <div class="card-main">
                    <img src="img/measurement_icon.png" alt="">
                    <div class="main-description">Sisteminizde kayıtlı olan hastaların ölçümlerini görmek için tıklayınız.</div>
                    <form class="" action="http://10.31.8.145:3000/message" method="get">
                      <button class="login100-form-btn">
								Login
							</button>
              <input type="hidden" name="i"  value="<?php echo $_SESSION['user_id']; ?>">
              <input type="hidden" name="u"  value="<?php echo $_SESSION['user_name']; ?>">

                    </form>
                    <!--<form class="" action="http://192.168.0.10:3000/message" method="post">
                      <input type="submit" name="a"  value="messages">

                    </form>-->
                </div>-->
              </td>

              <td>
               <!-- <div class="card">
                  <div class="card-header">Hastaların İlaçları</div>
                  <div class="card-main">
                    <img src="img/measurement_icon.png" alt="">
                    <div class="main-description">Sisteminizde kayıtlı olan hastaların kullandıkları ilaçları görmek için tıklayınız.</div>
                    <div class="primary-white-button">
                        <a href="listmedicpage.php"> Gssssit </a>
                    </div>
                  </div>
                </div>-->
              </td>

            </tr>
          </table>
        </div>
    </div>
    <section id="about" class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <div class="icon">
                            <img src="img/service_icon_01.png" alt="">
                        </div>
                        <h4>Kolay İletişim</h4>
                        <div class="line-dec"></div>
                        <p>MediCheck kullanan hasta doktoruna kolaylıkla ulaşabilecek.</p>
                      <!--  <div class="primary-blue-button">
                            <a href="#" class="scroll-link" data-id="portfolio">Continue Reading</a>
                        </div>-->
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <div class="icon">
                            <img src="img/service_icon_02.png" alt="">
                        </div>
                        <h4>Akıllı Bildirim</h4>
                        <div class="line-dec"></div>
                        <p>MediCheck sayesinde doktor hastasına bildirim gönderebilecek. Hasta ise ilaçlarını alarm listesine ekleyerek artık ilaçlarını zamanında alacak.</p>
                    <!--    <div class="primary-blue-button">
                            <a href="#" class="scroll-link" data-id="portfolio">Continue Reading</a>
                        </div>-->
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <div class="icon">
                            <img src="img/service_icon_03.png" alt="">
                        </div>
                        <h4>Hastanın Durumu</h4>
                        <div class="line-dec"></div>
                        <p>MediCheck ile doktor hastasının bilgilerine her daim çok kolay bir şekilde erişebilecek</p>
                      <!--  <div class="primary-blue-button">
                            <a href="#" class="scroll-link" data-id="portfolio">Continue Reading</a>
                        </div>-->
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <div class="icon">
                            <img src="img/service_icon_04.png" alt="">
                        </div>
                        <h4>Mobil Uygulamad</h4>
                        <div class="line-dec"></div>
                        <p>Mobil uygulama ile hasta doktora kolaylıkla ulaşabilecek ve kendi durumunu kolaylıkla görebilecek.</p>
                      <!--  <div class="primary-blue-button">
                            <a href="#" class="scroll-link" data-id="portfolio">Continue Reading</a>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>

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
