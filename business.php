<?php
// Start the session
require_once('startsession.php');

require_once('connectvars.php'); // database username and password files
// Connect to the database 
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// check and see if user is logged in
if (!isset($_SESSION['id'])) {
    echo '<p class="login">Please <a href="login.php">log in</a> to access this page.    USERNAME IS: stephen   PASSWORD IS: password </p>';

    exit();
}

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
                    Business Contacts
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
                            <a href="./business.php" data-transition="fade" data-theme="a" data-icon="grid"
                               class="ui-btn-active ui-state-persist">
                                Business
                            </a>
                        </li>
                    </ul>
                </div>
                <h2>
                    My Personal Business Contacts
                </h2>
                <h5>
                    <p>Stephen Wilson: <a href="http://webdesign4.georgianc.on.ca/~200220207/">Webdesign4</a> </p>
                    <p>Tim Radder: <a href="http://webdesign4.georgianc.on.ca/~200244040/AdvancedWeb/Profile/index.html">Webdesign4</a></p>
                    <p>Centre For Applied Research and Innovation - Georgian College: <a href="http://www.georgiancollege.ca/community-alumni/applied-research/">CARI</a></p>
                    <p>Georgian College: <a href="http://georgiancollege.ca">Georgian College</a></p>
                    <p>Banner: <a href="https://sis.georgianc.on.ca">sis.georgianc.on.ca</a></p>
                    <p>Blackboard: <a href="http://gc.blackboard.com">gc.blackboard.com</a></p>
                </h5>
            </div>
            <div data-theme="a" data-role="footer" data-position="fixed">
                <h3>
                    Copyright 2013
                </h3>
            </div>
        </div>
    </body>
</html>
