<?php
  // Start the session
  require_once('startsession.php');
  
  require_once('connectvars.php'); // database username and password files
  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <title></title>
  
  
  
  <link rel="stylesheet" href="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.css">
  
  <!-- Extra Codiqa features -->
  <link rel="stylesheet" href="codiqa.ext.css">
  
  <!-- jQuery and jQuery Mobile -->
  <script src="https://d10ajoocuyu32n.cloudfront.net/jquery-1.9.1.min.js"></script>
  <script src="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>

  <!-- Extra Codiqa features -->
  <script src="https://d10ajoocuyu32n.cloudfront.net/codiqa.ext.js"></script>
   
  <!-- Swypejs-->
  <script src="javascript/swipe.js"></script>
  <link rel="stylesheet" href="mycss.css">

  <!-- Stephen JavaScript and CSS -->
  <script src="javascript/myjs.js"></script>
   <link rel="stylesheet" href="mycss.css">
   
   
</head>
<body>
<!-- Home -->
<div data-role="page" id="page1">
    <div data-theme="a" data-role="header">
        <h3>
            Home
        </h3>
        <div style=" text-align:center">
            <img style="width: 288px; height: 100px" src="./img/logo.png">
        </div>
    </div>
    <div data-role="content">
         <div data-role="navbar" data-iconpos="top">
            <ul>
                <li>
                    <a href="./login.php" data-transition="fade" data-theme="a">
                        Login
                    </a>
                </li>
                <li>
                    <a href="./logout.php" data-transition="fade" data-theme="a">
                       <?php echo("Log Out: " . $_SESSION['username'] ) ?>
                    </a>
                </li>
            </ul>
        </div>
        <div data-role="navbar" data-iconpos="top">
            <ul>
                <li>
                    <a href="./index.php" data-transition="fade" data-theme="a" data-icon="home"
                    class="ui-btn-active ui-state-persist">
                        Home
                    </a>
                </li>
                <li>
                    <a href="./about.php" data-transition="fade" data-theme="a" data-icon="info">
                        About Me
                    </a>
                </li>
                <li>
                    <a href="./contacts.php" data-transition="fade" data-theme="a" data-icon="edit">
                        Contact
                    </a>
                </li>
            </ul>
        </div>
        <div data-role="navbar" data-iconpos="top">
            <ul>
                <li>
                    <a href="./projects.php" data-transition="fade" data-theme="a" data-icon="gear">
                        Projects
                    </a>
                </li>
                <li>
                    <a href="./services.php" data-transition="fade" data-theme="a" data-icon="check">
                        Services
                    </a>
                </li>
                 <li>
                    <a href="./business.php" data-transition="fade" data-theme="a" data-icon="grid">
                        Business
                    </a>
                </li>
            </ul>
        </div>
        <h2>
            Only The Best
        </h2>
        <!-- image slider that is broken
        <div id='slider' class='swipe'>
  <div class='swipe-wrap'>
      <div><img src="img/gc_weather.jpg" alt="GC Weather"></div>
    <div><img src="img/nintendo.jpg" alt="GC Weather"></div>
    <div><img src="img/weather_station.jpg" alt="GC Weather"></div>
  </div>
</div>
        -->
        <h5>
            I strive to give you the best looking website to present to your visitors
            as possible. By using current HTML5 and CSS3 languages to bring you a rich,
            modern web experience.
        </h5>
        <img src="img/gc_weather.jpg" alt="GC Weather" class = "frontimage">
        <img src="img/nintendo.jpg" alt="GC Weather" class = "frontimage">
        <img src="img/weather_station.jpg" alt="GC Weather" class = "frontimage">
        
    </div>
    <div data-theme="a" data-role="footer" data-position="fixed">
        <h3>
            Copyright 2013
        </h3>
    </div>
</div>
</body>
</html>
