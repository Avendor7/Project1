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
   
</head>
<body>
<!-- Home -->
<div data-role="page" id="page1">
    <div data-theme="a" data-role="header">
        <h3>
            About Me
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
                    <a href="./index.php" data-transition="fade" data-theme="a" data-icon="home">
                        Home
                    </a>
                </li>
                <li>
                    <a href="./about.php" data-transition="fade" data-theme="a" data-icon="info"
                    class="ui-btn-active ui-state-persist">
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
                        Business Contacts
                    </a>
                </li>
            </ul>
        </div>
        <h2>
            Hello World
        </h2>
        <img src="img/GC_portrait_about.jpg" alt="Portrait" id="portrait">
        
              <p>Stephen Wiggins is currently attending Georgian College in Barrie, Ontario participating in their 3 year Computer Programmer Analyst program.
                                        <br><br>He is currently working part time at Georgian College in the Centre for Applied Research and Innovation doing web development work awaiting the start of a Winter 2014 co-op
                                        <br><br>Other past work includes manufacturing at Crystal Fountains in Concord, Ontario during the summers of 2009, 2010, and 2012.
                                        <br><br>Volunteer experience gained at Victoria Village Manor working in the laundry room in 2009.
                                        <br><br>Education includes an OSSD from Bear Creek Secondary School in 2012 specializing in business and computer courses.
                                        <br><br>If you wish to have a look at my <a href="./files/resume.pdf">Resume</a> feel free to do so!</p>
        
    </div>
    <div data-theme="a" data-role="footer" data-position="fixed">
        <h3>
            Copyright 2013
        </h3>
    </div>
</div>
</body>
</html>
