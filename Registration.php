<?php
$error = NULL;


if (isset($_POST['submit'])) {
    //GET FORM DATA
    $u = $_POST['u'];
    $p = $_POST['p'];
    $p2 = $_POST['p2'];
    $e = $_POST['e'];

    if (strlen($u) < 5) {
        $error = "<p> Your username must be at least 5 characters</p>";
    } elseif ($p2 != $p) {
        $error .= "<p> Your passwords do not match </p>";
    } else {
        //FORM IS VALID
        //CONNECT TO THE DATABASE
        $mysqli = new MySQLi('localhost', 'root', '', 'dbms_project') or die("Unable to connect to the server");


        //SANITIZE FROM DATA
        $u = $mysqli->real_escape_string($u);
        $p = $mysqli->real_escape_string($p);
        $p2 = $mysqli->real_escape_string($p2);
        $e = $mysqli->real_escape_string($e);

        //GENERATE VKEY
        $vkey = md5(time() . $u);
        //echo $vkey;

        //INSERT ACCOUNT INTO THE DATABASE
        $p = md5($p);
        //echo $p;
        $insert = "INSERT INTO users  (username,password,email,vkey) VALUES ('$u','$p','$e','$vkey')";
        mysqli_query($mysqli, $insert);


        if ($insert) {
            //SEND EMAIL 
            $to = $e;
            $subject = "Email Verification";
            $message = "<a href='http://localhost/FORTH_ITTERATION/KrushalWork/verify.php?vkey=$vkey' > Register Account </a> ";
            $headers = "From: 20190802058@dypiu.ac.in";
            $headers .= "Mime-Version: 1.0" .  "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            mail($to, $subject, $message, $headers);

            header('location: thank_you.php');
        } else {
            echo $mysqli->error;
        }
    }
}

?>


<html>

<head>
    <title>Register</title>
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
                    <td align="right">REPEAT PASSWORD:</td>
                    <td><input type="PASSWORD" name="p2" required/> </td>
                </tr>
                <tr>
                    <td align="right">EMAIL ADDRESS:</td>
                    <td><input type="email" name="e" required/> </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"  ><input type="submit" class = "submit_button" value="Register" name = "submit"></td>
                </tr>
            </table>
        </form>
        <p class = "message" align = "center"> Already Registered? <a href="Login.php"> Login </a> </p>

        
        -->

    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="u" required/>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="e" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="p" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="p2" required>
            </div>
            <div class="input-group">
                <button type = "submit" name="submit" class="btn" value= "Register">Register</button>
            </div>
            <p class="login-register-text">Have an account? <a href="Login.php">Login Here</a>.</p>
        </form>

    </div>
</body>

</html>



<!-- MYSQL QUERY to make the table.

create table accounts(
    id int(11) not null primary key AUTO_INCREMENT,
    username varchar(45) not null,
    password_ varchar(45) not null,
    email varchar(45) not null,
    vkey varchar (45) not null,
    verified int(1) DEFAULT 0 not null,
    createdate timestamp(6) DEFAULT CURRENT_TIMESTAMP(6)
); -->