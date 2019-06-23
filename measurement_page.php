<?php
include 'connection.php';
error_reporting(0);
session_start();
$idim=$_SESSION['user_id'];
$sql="select * from doktorlar where id=".$idim;
$res=mysqli_query($link,$sql);
while ($row=mysqli_fetch_array($res)) {
    break;
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
          #olcumler table{
            margin: auto;
            height: auto;
            text-align: center;
            table-layout: fixed;
          }
          #olcumler table, th, td{
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

        <script type="text/javascript">
        function godown ()
        { document.getElementById("down").scrollIntoView(); // JUMP TO DIV "DOWN".
        }
        function gobottom ()
        { document.getElementById("bottom").scrollIntoView(); // JUMP TO DIV "BOTTOM".
        }
        </script>

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
          <div class="row">

                <center>
                  <h1 style="color:black;">Hastanın Künyesi</h1>

                  <table style="width:90%" id="tablo2" class="table table-bordered">
                      <tr>
                          <td rowspan="2" >
                              <?php
                              $sql="select * from hastalar where hasta_id=".$_GET['id'];
                              $res=mysqli_query($link, $sql);
                              if($row=mysqli_fetch_array($res)){
                                  $image=$row['profil_foto'];
                                  echo '<img src="data:image/jpeg;base64,'.$row['profil_foto'] .'" />';
                              }
                              ?></td>
                              <td>Adı:</td>
                              <td><?php echo $row['hasta_adi']; ?></td>
                              <td>Soyadı:</td>
                              <td><?php echo $row['hasta_soyadi']; ?></td>
                              <td>TC:</h2></td>
                              <td><?php echo $row['hasta_tc']; ?></td>
                              <td>Cinsiyeti:</h2></td>
                              <td><?php echo $row['cinsiyet']; ?></td>
                          </tr>

                          <tr>
                              <td>Email:</h2></td>
                              <td><?php echo $row['hasta_email']; ?></td>
                              <td>Telefonu:</td>
                              <td><?php echo $row['hasta_telefon']; ?></td>
                              <td>Bilinen Hastalığı:</td>
                              <td><?php echo $row['hastalik']; ?></td>
                              <td>Doğum Tarihi:</h2></td>
                              <td><?php echo $row['dog_tarih']; ?></td>
                          </tr>


                      </table>
                    </center>              
                  <marquee style="font-size: 25px;text-transform: uppercase;background: #999999;color: #ffffff" >Hasta Ölçüm Bilgileri</marquee>
                  <br>
                  <table id="olcumler" class='table table-bordered'>
                      <tr>
                          <td>

                              <div class="analytics-sparkle-line reso-mg-b-30">
                                  <div class="analytics-content">
                                     <?php
                          //şekerin yüzdesi hesaplanacak kna şekeri tip id'si ===>> 2
                                     $sql="select * from olcumler where hangiOlcum = 2 and hasta_id=".$_GET['id']." ORDER BY id DESC LIMIT 2 ";
                                     $res=mysqli_query($link, $sql);
                                     if(mysqli_num_rows($res)==0){
                                      $seker[0]=1;
                                      $seker[1]=1;
                                      $sekerolcumsaati[0]="";
                                      $sekerolcumsaati[1]="";
                                      $sekerAciklama[0]="";
                                      $sekerAciklama[1]="";
                                  }
                                  $i=0;
                                  while($SEKER_row=mysqli_fetch_array($res)){
                                      $seker[$i]=$SEKER_row['deger'];
                                      $sekerolcumsaati[$i]=$SEKER_row['tarih'];
                                      $sekerAciklama[$i]=$SEKER_row['aciklama'];
                                      $i++;
                                  }


                                  ?>
                                  <h2>Şeker Önceki Ölçüme Göre Değişimi</h2>
                                  <h3><span class="counter"><?php echo $seker[0]; ?></span> <span class="tuition-fees">Şu anki şeker değeri</span></h3>
                                  <h4><span >Açıklama:</span> <?php echo $sekerAciklama[0]; ?></span></h4>
                                  <h5> <span class="tuition-fees">Ölçüm tarihi</span> <span><?php echo $sekerolcumsaati[0]; ?></span></h5>

                                  <span class="text-success"><?php
                                  $yuzde=(($seker[0]-$seker[1])/$seker[1])*100;
                                  $ek="";
                                  if($yuzde>0){
                                      $ek=" artmış.";
                                  }else{
                                      $ek=" azalmış.";
                                  }
                                  echo "%".intval(abs($yuzde))."".$ek; ?></span>
                                  <div class="progress m-b-0">
                                      <div class="progress-bar progress-bar-success progress-bar-striped"  role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo abs($yuzde);?>%;"></div>
                                  </div>
                              </div>
                              <div>
                                 <center> <form method="post" action="#olcumdeger">
                                  <input style="visibility: hidden" type="input" name="degerler" value="<?php echo "2";?>">
                                  <center> <input type="submit" class="btn btn-default submit"  name="submit" value="Ayrıntılı görmek için tıklatınız"></center>
                              </form></center>
                          </div>
                      </div>
                  </td>
                  <td>
                      <div class="analytics-sparkle-line reso-mg-b-30">
                          <div class="analytics-content">

                              <?php
                          //şekerin yüzdesi hesaplanacak kna şekeri tip id'si ===>> 2
                              $sql="select * from olcumler where hangiOlcum = 1 and hasta_id=".$_GET['id']." ORDER BY id DESC LIMIT 2";
                              $res=mysqli_query($link, $sql);
                              if(mysqli_num_rows($res)==0){
                                  $kilo[0]=1;
                                  $kilo[1]=1;
                                  $kiloolcumsaati[0]="";
                                  $kiloolcumsaati[1]="";
                                  $kiloAciklama[0]="";
                                  $kiloAciklama[1]="";
                              }
                              $i=0;
                              while($KILO_row=mysqli_fetch_array($res)){
                                  $kilo[$i]=$KILO_row['deger'];
                                  $kiloolcumsaati[$i]=$KILO_row['tarih'];
                                  $kiloAciklama[$i]=$KILO_row['aciklama'];
                                  $i++;
                              }


                              ?>

                              <h2>Kilonun Önceki Ölçüme Göre Değişimi</h2>
                              <h3><span class="counter"><?php echo $kilo[0]; ?></span> <span class="tuition-fees">Şu anki kilo değeri</span></h3>
                              <h4><span class="tuition-fees">Açıklama:</span> <?php echo $kiloAciklama[0]; ?></span></h4>
                              <h5> <span class="tuition-fees">Ölçüm tarihi</span> <span><?php echo $kiloolcumsaati[0]; ?></span></h5>
                              <span class="text-danger">
                                  <?php
                                  $yuzde=(($kilo[0]-$kilo[1])/$kilo[1])*100;
                                  $ek="";
                                  if($yuzde>0){
                                      $ek=" artmış.";
                                  }else{
                                      $ek=" azalmış.";
                                  }
                                  echo "%".intval(abs($yuzde))."".$ek; ?></span>
                                  <div class="progress m-b-0">
                                      <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo abs($yuzde);?>%;"></div>
                                  </div>
                              </div>
                              <div>
                                 <center> <form method="post" action="#olcumdeger">
                                  <input style="visibility: hidden" type="input" name="degerler" value="<?php echo "1";?>">
                                  <center> <input type="submit" class="btn btn-default submit"  name="submit" value="Ayrıntılı görmek için tıklatınız"></center>
                              </form></center>
                          </div>
                      </div>
                  </td>
                  <td>
                      <div class="analytics-sparkle-line reso-mg-b-30">
                          <div class="analytics-content">

                              <?php
                          //şekerin yüzdesi hesaplanacak kna şekeri tip id'si ===>> 2
                              $sql="select * from olcumler where hangiOlcum = 8 and hasta_id=".$_GET['id']." ORDER BY id DESC LIMIT 2";
                              $res=mysqli_query($link, $sql);
                              if(mysqli_num_rows($res)==0){
                                  $kolestrol[0]=1;
                                  $kolestrol[1]=1;
                                  $kolestrololcumsaati[0]="";
                                  $kolestrololcumsaati[1]="";
                                  $kolestrolAciklama[0]="";
                                  $kolestrolAciklama[1]="";
                              }
                              $i=0;
                              while($KOLESTROL_row=mysqli_fetch_array($res)){
                                  $kolestrol[$i]=$KOLESTROL_row['deger'];
                                  $kolestrololcumsaati[$i]=$KOLESTROL_row['tarih'];
                                  $kolestrolAciklama[$i]=$KOLESTROL_row['aciklama'];
                                  $i++;

                              }


                              ?>

                              <h2>Kolestrolün Önceki Ölçüme Göre Değişimi</h2>
                              <h3><span class="counter"><?php
                              if($kolestrol[0]!=1)
                                  echo $kolestrol[0]; ?></span> <span class="tuition-fees">Şu anki kolestrol değeri</span></h3>
                              <h4><span class="tuition-fees">Açıklama:</span> <?php echo $kolestrolAciklama[0]; ?></span></h4>
                              <h5> <span class="tuition-fees">Ölçüm tarihi</span> <span><?php echo $kolestrololcumsaati[0]; ?></span></h5>
                              <span class="text-danger">
                                  <?php
                                  $yuzde=(($kolestrol[0]-$kolestrol[1])/$kolestrol[1])*100;
                                  $ek="";
                                  if($yuzde>0){
                                      $ek=" artmış.";
                                  }else{
                                      $ek=" azalmış.";
                                  }
                                  echo "%".intval(abs($yuzde))."".$ek; ?></span>
                                  <div class="progress m-b-0">
                                      <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo abs($yuzde);?>%;"></div>
                                  </div>
                              </div>
                              <div>
                                 <center> <form method="post" action="#olcumdeger">
                                  <input style="visibility: hidden" type="input" name="degerler" value="<?php echo "8";?>">
                                  <center> <input type="submit" class="btn btn-default submit"  name="submit" value="Ayrıntılı görmek için tıklatınız"></center>
                              </form>
                          </center>
                      </div>
                  </div>
              </td>
          </tr>
          <tr>
              <td>
               <div class="analytics-sparkle-line reso-mg-b-30">
                  <div class="analytics-content">

                      <?php
                          //şekerin yüzdesi hesaplanacak kna şekeri tip id'si ===>> 2

                      $sql="select * from olcumler where hangiOlcum = 4 and hasta_id=".$_GET['id']." ORDER BY id DESC LIMIT 2";
                      $res=mysqli_query($link, $sql);

                      if(mysqli_num_rows($res)==0){
                          $mesafe[0]=1;
                          $mesafe[1]=1;
                          $mesafeolcumsaati[0]="";
                          $mesafeolcumsaati[1]="";
                          $mesafeAciklama[0]="";
                          $mesafeAciklama[1]="";
                      }
                      $i=0;
                      while($MESAFE_row=mysqli_fetch_array($res)){
                          $mesafe[$i]=$MESAFE_row['deger'];
                          $mesafeolcumsaati[$i]=$MESAFE_row['tarih'];
                          $mesafeAciklama[$i]=$MESAFE_row['aciklama'];
                          $i++;
                      }

                      ?>

                      <h2>Yürünen Mesafenin Önceki Ölçüme Göre Değişimi</h2>
                      <h3><span class="counter"><?php

                      if($mesafe[0]!=1)
                          echo $mesafe[0]; ?></span> <span class="tuition-fees">Şu anki yürünen mesafe değeri</span></h3>
                      <h4><span class="tuition-fees">Açıklama:</span> <?php echo $mesafeAciklama[0]; ?></span></h4>
                      <h5> <span class="tuition-fees">Ölçüm tarihi</span> <span><?php echo $mesafeolcumsaati[0]; ?></span></h5>
                      <span class="text-danger">
                          <?php
                          $yuzde=(($mesafe[0]-$mesafe[1])/$mesafe[1])*100;
                          $ek="";
                          if($yuzde>0){
                              $ek=" artmış.";
                          }else{
                              $ek=" azalmış.";
                          }
                          echo "%".intval(abs($yuzde))."".$ek; ?></span>
                          <div class="progress m-b-0">
                              <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo abs($yuzde);?>%;"></div>
                          </div>
                      </div>
                      <div>
                          <form method="post" action="#olcumdeger">
                              <input style="visibility: hidden" type="input" name="degerler" value="<?php echo "4";?>">
                              <center> <input type="submit" class="btn btn-default submit"  name="submit" value="Ayrıntılı görmek için tıklatınız"></center>
                          </form>

                      </div>
                  </div>
              </td>
              <td>
               <div class="analytics-sparkle-line reso-mg-b-30">
                  <div class="analytics-content">

                      <?php
                          //şekerin yüzdesi hesaplanacak kna şekeri tip id'si ===>> 2

                      $sql="select * from olcumler where hangiOlcum = 5 and hasta_id=".$_GET['id']." ORDER BY id DESC LIMIT 2";
                      $res=mysqli_query($link, $sql);

                      if(mysqli_num_rows($res)==0){
                          $nabiz[0]=1;
                          $nabiz[1]=1;
                          $nabizolcumsaati[0]="";
                          $nabizolcumsaati[1]="";
                          $nabizAciklama[0]="";
                          $nabizAciklama[1]="";
                      }
                      $i=0;
                      while($NABİZ_row=mysqli_fetch_array($res)){
                          $nabiz[$i]=$NABİZ_row['deger'];
                          $nabizolcumsaati[$i]=$NABİZ_row['tarih'];
                          $nabizAciklama[$i]=$NABİZ_row['aciklama'];
                          $i++;
                      }

                      ?>

                      <h2>Nabzın Önceki Ölçüme Göre Değişimi</h2>
                      <h3><span class="counter"><?php

                      if($nabiz[0]!=1)
                          echo $nabiz[0]; ?></span> <span class="tuition-fees">Şu anki nabız değeri</span></h3>
                      <h4><span class="tuition-fees">Açıklama:</span> <?php echo $nabizAciklama[0]; ?></span></h4>
                      <h5> <span class="tuition-fees">Ölçüm tarihi</span> <span><?php echo $nabizolcumsaati[0]; ?></span></h5>
                      <span class="text-danger">
                          <?php
                          $yuzde=(($nabiz[0]-$nabiz[1])/$nabiz[1])*100;
                          $ek="";
                          if($yuzde>0){
                              $ek=" artmış.";
                          }else{
                              $ek=" azalmış.";
                          }
                          echo "%".intval(abs($yuzde))."".$ek; ?></span>
                          <div class="progress m-b-0">
                              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo abs($yuzde);?>%;"></div>
                          </div>
                      </div>
                      <div>
                         <center> <form method="post" action="#olcumdeger">
                          <input style="visibility: hidden" type="input" name="degerler" value="<?php echo "5";?>">
                          <center> <input type="submit" class="btn btn-default submit"  name="submit" value="Ayrıntılı görmek için tıklatınız"></center>
                      </form></center>
                  </div>
              </div>
          </td>
          <td>
           <div class="analytics-sparkle-line reso-mg-b-30">
              <div class="analytics-content">

                  <?php
                          //şekerin yüzdesi hesaplanacak kna şekeri tip id'si ===>> 2

                  $sql="select * from olcumler where hangiOlcum = 3 and hasta_id=".$_GET['id']." ORDER BY id DESC LIMIT 2";
                  $res=mysqli_query($link, $sql);

                  if(mysqli_num_rows($res)==0){
                      $kanbasinci[0]=1;
                      $kanbasinci[1]=1;
                      $kanbasinciolcumsaati[0]="";
                      $kanbasinciolcumsaati[1]="";
                      $kanbasinciAciklama[0]="";
                      $kanbasinciAciklama[1]="";
                  }
                  $i=0;
                  while($KANBASINCI_row=mysqli_fetch_array($res)){
                      $kanbasinci[$i]=$KANBASINCI_row['deger'];
                      $kanbasinciolcumsaati[$i]=$KANBASINCI_row['tarih'];
                      $kanbasinciAciklama[$i]=$KANBASINCI_row['aciklama'];
                      $i++;
                  }

                  ?>

                  <h2>Kan Basıncının Önceki Ölçüme Göre Değişimi</h2>
                  <h3><span class="counter"><?php

                  if($kanbasinci[0]!=1)
                      echo $kanbasinci[0]; ?></span> <span class="tuition-fees">Şu anki kan basıncı değeri</span></h3>
                  <h4><span class="tuition-fees">Açıklama:</span> <?php echo $kanbasinciAciklama[0]; ?></span></h4>
                  <h5> <span class="tuition-fees">Ölçüm tarihi</span> <span><?php echo $kanbasinciolcumsaati[0]; ?></span></h5>
                  <span class="text-danger">
                      <?php
                      $yuzde=(($kanbasinci[0]-$kanbasinci[1])/$kanbasinci[1])*100;
                      $ek="";
                      if($yuzde>0){
                          $ek=" artmış.";
                      }else{
                          $ek=" azalmış.";
                      }
                      echo "%".intval(abs($yuzde))."".$ek; ?></span>
                      <div class="progress m-b-0">
                          <div  class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo abs($yuzde);?>%;"></div>
                      </div>
                  </div>
                  <div>
                     <center> <form method="post" action="#olcumdeger">
                      <input style="visibility: hidden" type="input" name="degerler" value="<?php echo "3";?>">
                      <center> <input type="submit" class="btn btn-default submit"  name="submit" value="Ayrıntılı görmek için tıklatınız"></center>
                  </form></center>
              </div>
          </div>
      </td>
  </tr>
  <tr>
      <td>
          <div class="analytics-sparkle-line reso-mg-b-30">
              <div class="analytics-content">

                  <?php
                          //şekerin yüzdesi hesaplanacak kna şekeri tip id'si ===>> 2

                  $sql="select * from olcumler where hangiOlcum = 6 and hasta_id=".$_GET['id']." ORDER BY id DESC LIMIT 2";
                  $res=mysqli_query($link, $sql);

                  if(mysqli_num_rows($res)==0){
                      $tuketilenkalori[0]=1;
                      $tuketilenkalori[1]=1;
                      $tuketilenkaloriolcumsaati[0]="";
                      $tuketilenkaloriolcumsaati[1]="";
                      $tuketilenkaloriAciklama[0]="";
                      $tuketilenkaloriAciklama[1]="";
                  }
                  $i=0;
                  while($TUKETILENKALORI_row=mysqli_fetch_array($res)){
                      $tuketilenkalori[$i]=$TUKETILENKALORI_row['deger'];
                      $tuketilenkaloriolcumsaati[$i]=$TUKETILENKALORI_row['tarih'];
                      $tuketilenkaloriAciklama[$i]=$TUKETILENKALORI_row['aciklama'];
                      $i++;
                  }

                  ?>

                  <h2>Tüketülen Kalorinin Önceki Ölçüme Göre Değişimi</h2>
                  <h3><span class="counter"><?php

                  if($kanbasinci[0]!=1)
                      echo $tuketilenkalori[0]; ?></span> <span class="tuition-fees">Şu anki tüketilen kalori değeri</span></h3>
                  <h4><span class="tuition-fees">Açıklama:</span> <?php echo $tuketilenkaloriAciklama[0]; ?></span></h4>
                  <h5> <span class="tuition-fees">Ölçüm tarihi</span> <span><?php echo $tuketilenkaloriolcumsaati[0]; ?></span></h5>
                  <span class="text-danger">
                      <?php
                      $yuzde=(($tuketilenkalori[0]-$tuketilenkalori[1])/$tuketilenkalori[1])*100;
                      $ek="";
                      if($yuzde>0){
                          $ek=" artmış.";
                      }else{
                          $ek=" azalmış.";
                      }
                      echo "%".intval(abs($yuzde))."".$ek; ?></span>
                      <div class="progress m-b-0">
                          <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo abs($yuzde);?>%;"></div>
                      </div>
                  </div>
                  <div>
                     <center> <form method="post" action="#olcumdeger">
                      <input style="visibility: hidden" type="input" name="degerler" value="<?php echo "6";?>">
                      <center> <input type="submit" class="btn btn-default submit"  name="submit" value="Ayrıntılı görmek için tıklatınız"></center>
                  </form></center>
              </div>
          </div>
      </td>
      <td>
       <div class="analytics-sparkle-line reso-mg-b-30">
          <div class="analytics-content">

              <?php
                          //şekerin yüzdesi hesaplanacak kna şekeri tip id'si ===>> 2

              $sql="select * from olcumler where hangiOlcum = 7 and hasta_id=".$_GET['id']." ORDER BY id DESC LIMIT 2";
              $res=mysqli_query($link, $sql);

              if(mysqli_num_rows($res)==0){
                  $harcanankalori[0]=1;
                  $harcanankalori[1]=1;
                  $harcanankaloriolcumsaati[0]="";
                  $harcanankaloriolcumsaati[1]="";
                  $harcanankaloriAciklama[0]="";
                  $harcanankaloriAciklama[1]="";
              }
              $i=0;
              while($HARCANANKALORI_row=mysqli_fetch_array($res)){
                  $harcanankalori[$i]=$HARCANANKALORI_row['deger'];
                  $harcanankaloriolcumsaati[$i]=$HARCANANKALORI_row['tarih'];
                  $harcanankaloriAciklama[$i]=$HARCANANKALORI_row['aciklama'];
                  $i++;
              }

              ?>

              <h2>Harcanan Kalorinin Önceki Ölçüme Göre Değişimi</h2>
              <h3><span class="counter"><?php

              if($kanbasinci[0]!=1)
                  echo $harcanankalori[0]; ?></span> <span class="tuition-fees">Şu anki harcanan kalori değeri</span></h3>
              <h4><span class="tuition-fees">Açıklama:</span> <?php echo $tuketilenkaloriAciklama[0]; ?></span></h4>
              <h5> <span class="tuition-fees">Ölçüm tarihi</span> <span><?php echo $tuketilenkaloriolcumsaati[0]; ?></span></h5>
              <span class="text-danger">
                  <?php
                  $yuzde=(($harcanankalori[0]-$harcanankalori[1])/$harcanankalori[1])*100;
                  $ek="";
                  if($yuzde>0){
                      $ek=" artmış.";
                  }else{
                      $ek=" azalmış.";
                  }
                  echo "%".intval(abs($yuzde))."".$ek; ?></span>
                  <div class="progress m-b-0">
                      <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo abs($yuzde);?>%;"></div>
                  </div>
              </div>
              <div>
                 <center><form method="post" action="#olcumdeger">
                  <input style="visibility: hidden" type="input" name="degerler" value="<?php echo "7";?>">
                  <center> <input type="submit" class="btn btn-default submit"  name="submit" value="Ayrıntılı görmek için tıklatınız"></center>
              </form></center>
          </div>
      </div>
  </td>
  <td>
   <div class="analytics-sparkle-line reso-mg-b-30">
      <div class="analytics-content">

          <?php
                          //şekerin yüzdesi hesaplanacak kna şekeri tip id'si ===>> 2

          $sql="select * from olcumler where hangiOlcum = 9 and hasta_id=".$_GET['id']." ORDER BY id DESC LIMIT 2";
          $res=mysqli_query($link, $sql);

          if(mysqli_num_rows($res)==0){
              $vucutsicakligi[0]=1;
              $vucutsicakligi[1]=1;
              $vucutsicakligiolcumsaati[0]="";
              $vucutsicakligiolcumsaati[1]="";
              $vucutsicakligiAciklama[0]="";
              $vucutsicakligiAciklama[1]="";
          }
          $i=0;
          while($VUCUTSICAKLIGI_row=mysqli_fetch_array($res)){
              $vucutsicakligi[$i]=$VUCUTSICAKLIGI_row['deger'];
              $vucutsicakligiolcumsaati[$i]=$VUCUTSICAKLIGI_row['tarih'];
              $vucutsicakligiAciklama[$i]=$VUCUTSICAKLIGI_row['aciklama'];
              $i++;
          }

          ?>

          <h2>Vucut Sıcaklığı Önceki Ölçüme Göre Değişimi</h2>
          <h3><span class="counter"><?php

          if($kanbasinci[0]!=1)
              echo $kanbasinci[0]; ?></span> <span class="tuition-fees">Şu anki Vucut Sıcaklığı değeri</span></h3>
          <h4><span class="tuition-fees">Açıklama:</span> <?php echo $vucutsicakligiolcumsaati[0]; ?></span></h4>
          <h5> <span class="tuition-fees">Ölçüm tarihi</span> <span><?php echo $vucutsicakligiolcumsaati[0]; ?></span></h5>
          <span class="text-danger">
              <?php
              $yuzde=(($vucutsicakligi[0]-$vucutsicakligi[1])/$vucutsicakligi[1])*100;
              $ek="";
              if($yuzde>0){
                  $ek=" artmış.";
              }else{
                  $ek=" azalmış.";
              }
              echo "%".intval(abs($yuzde))."".$ek; ?></span>
              <div class="progress m-b-0">
                  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo abs($yuzde);?>%;"></div>
              </div>
          </div>
          <div>
             <center><form method="post" action="#olcumdeger">
              <input style="visibility: hidden" type="input" name="degerler" value="<?php echo "9";?>">
              <center> <input type="submit" class="btn btn-default submit"  name="submit" value="Ayrıntılı görmek için tıklatınız"></center>
          </form></center>
      </div>
  </div>
</td>
</tr>
</table>

</div>
        </div>

    <div>
    <?php
    if(isset($_POST['degerler'])){
        $idler[0]=$_GET['id'];
        $idler[1]=$_POST['degerler'];
    //  echo "------------".$_SESSION['user_id'];
        $sql = "select * from olcumler where hasta_id = ".$idler[0]." and hangiOlcum = ".$idler[1];
    /*if(isset($_POST["submit1"])){
        $sql = $sql . " where kitap_ad like ('%$_POST[t1]%') ";
    }*/
            //kitap ismini tablo olarak gösterir
    $res=mysqli_query($link, $sql);

    echo "<center>
    <table style='width:90%' id='tablo' class='table table-bordered'>";
    echo "<tr>";
    echo "<th>"; echo "Ölçüm"; echo "</th>";
    echo "<th>"; echo "Açıklama"; echo "</th>";
    echo "<th>"; echo "Ölçüm Tarihi"; echo "</th>";
    echo "</tr>";
    while ($row=mysqli_fetch_array($res)){
        if($row["deger"]==null){
            ?>
            <tr>
                <td></td>
                <td>Veri Girişi Yok</td>
                <td>Veri Girişi Yok</td>
                <td>Veri Girişi Yok</td>
                <td>Veri Girişi Yok</td>
                <td>Veri Girişi Yok</td>
                <td>Veri Girişi Yok</td>
                <td>Veri Girişi Yok</td>
            </tr>
            <?php
            break;
        }
        ?>
        <tr>
            <td><?php echo $row["deger"]; ?></td>
            <td><?php echo $row["aciklama"]; ?></td>
            <td> <?php echo $row["tarih"]; ?> </td>
        </tr>
        <?php
    }
    }

    ?>

    </table>
  </center>
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
