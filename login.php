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
                        Contact Me
                    </h3>
                    <div style=" text-align:center">
                        <img style="width: 288px; height: 100px" src="./img/logo.png">
                    </div>
                </div>
                <div data-role="content">
                    <div data-role="navbar" data-iconpos="top">
                        <ul>
                            <li>
                                <a href="./login.php" data-transition="fade" data-theme="a"
                                   class="ui-btn-active ui-state-persist">
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
                                <a href="./business.php" data-transition="fade" data-theme="a" data-icon="grid">
                                    Business Contacts
                                </a>
                            </li>
                        </ul>
                    </div>
                    <h2>
                        How to Contact Me
                    </h2>
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
                <div data-theme="a" data-role="footer" data-position="fixed">
                    <h3>
                        Copyright 2013
                    </h3>
                </div>
            </div>
        </body>
    </html>

    <?php
}
else {
    // Confirm the successful log-in
    echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
}
?>

