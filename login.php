<?php
require_once('connectvars.php');

// Start the session
session_start();

// Clear the error message
$error_msg = "";
// If the user isn't logged in, try to log them in
if (!isset($_SESSION['id'])) {
    if (isset($_POST['submit'])) {
        // Connect to the database
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        // Grab the user-entered log-in data
        $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
        $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

        if (!empty($user_username) && !empty($user_password)) {
            // Look up the username and password in the database
            $query = "SELECT id, username FROM portfolio WHERE username = '$user_username' AND password = SHA('$user_password')";
            $data = mysqli_query($dbc, $query);

            echo mysqli_num_rows($data);
            if (mysqli_num_rows($data) == 1) {
                // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page

                $row = mysqli_fetch_array($data);
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                setcookie('id', $row['id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
                $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/business.php';
                header('Location: ' . $home_url);
            } else {
                // The username/password are incorrect so set an error message
                $error_msg = 'Sorry, you must enter a valid username and password to log in.';
            }
        } else {
            // The username/password weren't entered so set an error message
            $error_msg = 'Sorry, you must enter your username and password to log in.';
        }
    }
}

// Insert the page header
$page_title = 'Log In';


// If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
if (empty($_SESSION['user_id'])) {
    echo '<p class="error">' . $error_msg . '</p>';
    ?>

    <!DOCTYPE html>
    <!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
        <head>
            <meta charset="utf-8" />

            <!-- Set the viewport width to device width for mobile -->
            <meta name="viewport" content="width=device-width" />

            <title>Stephen Wiggins</title>

            <link rel="stylesheet" href="css/normalize.css">
            <link rel="stylesheet" href="css/foundation.css">

            <script src="js/vendor/custom.modernizr.js"></script>

        </head>
        <body>
            <div class="row">
                <div class="large-12 columns">

                    <!-- Navigation -->

                    <nav class="top-bar">
                        <ul class="title-area">
                            <!-- Title Area -->
                            <li class="name">
                                <h1>
                                    <a href="./index.php">SW</a>
                                </h1>
                            </li>
                            <li class="toggle-topbar menu-icon"><a href="index.html"><span>menu</span></a></li>
                        </ul>

                        <section class="top-bar-section">
                            <ul class="left">
                                <li class=""><a href="./projects.php">Projects</a></li>
                                <li class=""><a href="./services.php">Services</a></li>
                                <li class=""><a href="./about.php">About Me</a></li>
                                <li class=""><a href="./contact.php">Contact Me</a></li>
                                <li class=""><a href="./business.php">Business Contacts</a></li>
                                <li class=""><a href="./links.php">Links</a></li>
                            </ul>
                            <ul class ="right">
                                <li class=""><a href="./login.php">Login</a></li>
                                <li class=""><a href="./logout.php"><?php echo("Log Out: " . $_SESSION['username'] ) ?></a></li>
                            </ul>
                        </section>
                    </nav>

                    <!-- End Navigation -->

                </div>
            </div>


            <div class="row">
                <div class="large-12 columns">
                    <div class="row">
                        <div class="large-12 columns">
                            <div class="row">

                                <!-- Content -->

                                <div class="large-12 columns">

                                    <div class="panel radius">

                                        <div class="row">
                                            <!-- PAGE CONTENT -->
                                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                <fieldset>
                                                    <legend>Log In</legend>
                                                    <label for="username">Username:</label>
                                                    <input type="text" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />
                                                    <label for="password">Password:</label>
                                                    <input type="password" name="password" />
                                                </fieldset>
                                                <input type="submit" value="Log In" name="submit" />
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- End Content -->

                            </div>
                        </div>
                    </div>


                </div>
            </div><br>



            <!-- Footer -->

            <footer class="row">
                <div class="large-12 columns">
                    <hr>
                    <div class="row">
                        <div class="large-6 columns">
                            <p>&copy; Copyright Stephen Wiggins 2013</p>
                        </div>
                        <div class="large-6 columns">
                            <ul class="inline-list right">
                                <li><a href="https://www.facebook.com/steve.wiggins">Facebook</a></li>
                                <li><a href="https://twitter.com/stevemwiggins">Twitter</a></li>
                                <li><a href="https://github.com/step1041/">GitHub</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>

            <script>
                document.write('<script src=js/vendor/' +
                        ('__proto__' in {} ? 'zepto' : 'jquery') +
                        '.js><\/script>')
            </script>
            <script src="js/foundation.min.js"></script>
            <script>
                $(document).foundation();
            </script>
            <script type="text/javascript">
                $(window).load(function() {
                    $('#featured').orbit({fluid: '2x1'});
                });
            </script>
            <!-- End Footer -->

        </body>
    </html>
    <?php
}
else {
    // Confirm the successful log-in
    echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
}
?>

