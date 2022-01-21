<?php
session_start();
require "./utils/connect.php";
// Jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
if(!isset($_SESSION['username'])){
    header("location: ./login-logout/login.php");
}else{
    // Jika sudah dibuatkan sesi maka akan kita masukkan kedalam variabel
    $username = $_SESSION['username'];
}
?>

<html>
    <head>
    <link rel="stylesheet" type="text/css" href="/mengukl/Styles/index.css">  
        <title>UKL Pembayaran SPP</title>
    </head>
<body>
<!-- Kita akan panggil menu navigasi -->
<?php require_once("./misc/header.php"); ?>

<div class="main">
  <div id="wrapper">
    <div class="content-holder">
      <div class="hero-wrap fl-wrap full-height scroll-con-sec">
        
        <div class="impulse-wrap">
          <div class="mm-par-wrap">
            <div class="mm-parallax" data-tilt data-tilt-max="4" >
              <div class="overlay"></div>
              <?php
              if($_SESSION['level'] == "admin"){
                echo "<div class=\"bg\" data-bg=\"https://www.teahub.io/photos/full/340-3401662_adolf-hitler-quote-meme.jpg\" style=\"background-image: url(https://www.teahub.io/photos/full/340-3401662_adolf-hitler-quote-meme.jpg);\">";
                echo "</div>";
              }elseif($_SESSION['level'] == "petugas"){
                echo "<div class=\"bg\" data-bg=\"https://www.desktopbackground.org/p/2014/07/14/793085_joseph-stalin-famous-war-quotes-quotesgram_2461x3431_h.jpg\" style=\"background-image: url(https://www.desktopbackground.org/p/2014/07/14/793085_joseph-stalin-famous-war-quotes-quotesgram_2461x3431_h.jpg);\">";
                echo "</div>";
              }else{
                echo "<div class=\"bg\" data-bg=\"/Assets/index_wallpaper.jpg\" style=\"background-image: url(/Assets/index_wallpaper.jpg);\">";
                echo "</div>";
              }
              ?>
              <!-- https://www.desktopbackground.org/p/2014/07/14/793085_joseph-stalin-famous-war-quotes-quotesgram_2461x3431_h.jpg -->
              <!--<div class="bg" data-bg="https://www.teahub.io/photos/full/340-3401662_adolf-hitler-quote-meme.jpg" style="background-image: url(https://www.teahub.io/photos/full/340-3401662_adolf-hitler-quote-meme.jpg);">-->
                
              <!-- </div> -->
              
              <div class="hero-wrap-item fl-wrap">
                <div class="container"><div class="fl-wrap section-entry hiddec-anim" style="opacity: 1; ">
                 <h1 class="BoardName">Selamat Datang <?=$username; ?></h1>
                  
                  </div></div></div>
              
            </div>
            
          </div>
        </div>
        
        <div class="hero-corner hiddec-anim" style="opacity: 1; transform: translate3d(0px, 0px, 0px);"></div>
        
        <div class="hero-corner2 hiddec-anim" style="opacity: 1; transform: translate3d(0px, 0px, 0px);"></div>
        
        <div class="hero-corner3 hiddec-anim" style="opacity: 1; transform: translate3d(0px, 0px, 0px);"></div>
        
        <div class="hero-corner4 hiddec-anim" style="opacity: 1; transform: translate3d(0px, 0px, 0px);"></div>
        
        
      </div>
    </div>
  </div>
  
</div>
<?php require("./misc/footer.php"); ?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script><script  src="./script.js"></script>
</body>
</html>