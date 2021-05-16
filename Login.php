<?php
$error = NULL;


session_start();

error_reporting(0);

if (isset($_POST['submit'])) {

    //CONNECT TO THE DATABASE
    $mysqli = new MySQLi('localhost', 'root', '', 'dbms_project') or die("Unable to connect to the server");

    //GET FORM DATA
    $u = $mysqli->real_escape_string($_POST['u']);
    $p = $mysqli->real_escape_string($_POST['p']);
    $p = md5($p);

    //Query the database 
    $resultSet = $mysqli->query("SELECT * FROM users WHERE username = '$u' AND password = '$p' LIMIT 1 ");

    if ($resultSet->num_rows != 0) {
        //Process Login
        $row = $resultSet->fetch_assoc();
        $verified = $row['verified'];
        $email = $row['email'];
        $profileUrl = $row['profileUrl'];
        $date = $row['createdate'];
        $date = strtotime($date);
        $date = date('M d Y', $date);
        $id = $row['id'];

        if ($verified == 1) {
            //Continue Processing
            $_SESSION['username'] = $u;
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $email;
            $_SESSION['profileUrl'] = $profileUrl;

            // Go to Home page
            header('Location: ..\PratikWork\BLOG_PROJECT\PostPages\index.php');
        } else {
            $error = "<p>This account has not been verified. An email was sent to $email on $date</p>";
        }
    } else {
        //Invalid credentials 
        $error = "<p>The username or password you entered is incorrect</p>";
    }
}
?>

<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="loginstyle.css" type="text/css">
</head>

<body>

    <!-- <form method="POST" action="" >
        <h1> Welcome To Geekster </h1>
            <table border="0" align="center" cellpadding="5">
                <tr>
                    <td align="right">USERNAME:</td>
                    <td><input type="text" name="u" required/> </td>
                </tr>
                <tr>
                    <td align="right">PASSWORD:</td>
                    <td><input type="PASSWORD" name="p" required/> </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="SUBMIT" class = "submit_button" value="Login" name = "submit" required> </td>
                </tr>
                
            </table>
        </form>
        <p class = "message" align = "center">  Not Registered? <a href="Registration.php"> Register </a> </p> -->

    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="u" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="p" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn" value= "Login" name = "submit">Login</button>
            </div>
            <p class="login-register-text">Don't have an account? <a href="Registration.php">Register Here</a>.</p>
        </form>
    </div>
</body>

</html>