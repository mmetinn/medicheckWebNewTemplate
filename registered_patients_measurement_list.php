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
        table{
          width: 800px;
          margin: auto;
          text-align: center;
          table-layout: fixed;
        }
        table, th, td{
          padding: 20px;
          color: white;
          border: 1px solid #080808;
          border-collapse: collapse;
          font-size: 18px;
          opacity: 0.8;
          font-family: Arial;
          background: linear-gradient(top,#3c3c3c 0%,#222222 100%);
          background: -webkit-linear-gradient(top,#3c3c3c 0%,#222222 100%);
        }
        tr , td{
          padding: 20px;
          opacity: 0.9;
        }
        td:hover{
          background: purple;
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
                    <a href="mainpage.php" class="navbar-brand"><em>M</em>edi<em>C</em>heck</a>
                </div>
                <!--/.navbar-header-->
                <div id="container" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                      <li>
                        <a href="mainpage.php">Anasayfa</a>
                      </li>
                      <li><a href="mobile_app_info.php" >Mobil Uygulama</a></li>
                      <li><a href="mainpage.php#about">Hakkımızda</a></li>
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
          <?php

          $sql = "select hasta_id from hasta_doktor where doktor_id = ".$_SESSION['user_id'] ;

          $res=mysqli_query($link, $sql);

          echo "<table id='tablo' class='table table-bordered'>";
          echo "<tr>";
          echo "<th>"; echo ""; echo "</th>";
          echo "<th>"; echo "Profil Resmi"; echo "</th>";
          echo "<th>"; echo "Kullanıcı Adı"; echo "</th>";
          echo "<th>"; echo "Adı"; echo "</th>";
          echo "<th>"; echo "Soyadı"; echo "</th>";
          echo "<th>"; echo "Tc"; echo "</th>";
          echo "<th>"; echo "Email"; echo "</th>";
          echo "<th>"; echo "Telefon"; echo "</th>";
          echo "</tr>";
          $i=0;
          while ($row=mysqli_fetch_array($res)){
              $sql2="select * from hastalar where hasta_id = ".$row['hasta_id'];
              if(isset($_POST["submit1"])){
                  $sql2 = $sql2 . " and hasta_adi like ('%$_POST[t1]%') or hasta_soyadi like ('%$_POST[t1]%')";
              }
              $res2=mysqli_query($link, $sql2);
              $row2=mysqli_fetch_array($res2);
              //dışarıda yaptıgım sorgu kadar döndüğü üçün listede arama
              //yaptıgım zaman benim aramamın satır sayısı 2 olsun arama  sounucum 1 satır olsa bile bana
              //aynı sonucu iki defa yazdırıyor bu yüzde içeride bir sayac tutum bunu da içrideki sorgunun satır sayısı taştığında
              //break yaparak hallettim
            /*  if($i==count($row2["hasta_adi"]))
                  break;
              $i++;
              if($row2==null){
                  break;
              }*/
              ?>
              <tr>
                <!--  <td><abbr title="GÜNCELLE"><a style="color: black" href="update.php?id=<?php// echo $row['id'];  ?>" onclick="return window.confirm ('Devam etmek istediğinizden emin misini')" ><i class="fa fa-refresh fa-2x" aria-hidden="true"></a></abbr></td>
                  <td><abbr title="SİL" ><a style="color: black" href="delete.php?id=<?php// echo $row['id']; ?>" onclick="return window.confirm ('Devam etmek istediğinizden emin misini')"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></a></abbr></td>-->
                      <?php
                      if(!$_GET['a']){?>
                          <td><abbr title="GEÇ" ><a style="color: black" href="measurement_page.php?id=<?php echo $row2['hasta_id']; ?>" ><i class="material-icons" style="font-size:48px;color:red;">favorite</i></a></abbr></td>
                      <?php } ?>

                      <td><?php

                      if($row2['profil_foto']!=null)
                          echo '<img src="data:image/jpeg;base64,'.$row2['profil_foto'] .'" height="50" weidth="50"/>';
                      else
                          echo '<img src="images/nullprofile.jpg" height="50" weidth="50"/>';

                      ?></td>
                      <td><?php echo $row2["hasta_kulad"]; ?></td>
                      <td><?php echo $row2["hasta_adi"]; ?></td>
                      <td><?php echo $row2["hasta_soyadi"]; ?></td>
                      <td> <?php echo $row2["hasta_tc"]; ?> </td>
                      <td> <?php echo $row2["hasta_email"]; ?> </td>
                      <td> <?php echo $row2["hasta_telefon"]; ?> </td>
                  </tr>
                  <?php
              }
              ?>

          </table>
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
