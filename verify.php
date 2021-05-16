<?php
if(isset($_GET['vkey'])){
    //Process verification 
    $vkey = $_GET['vkey'];
    
    

    //CONNECT TO THE DATABASE
    $mysqli = NEW MySQLi ('localhost','root','','dbms_project') or die ("Unable to connect to the server");
    
    $resultSet = $mysqli->query("SELECT verified , vkey FROM users WHERE verified = 0 and vkey = '$vkey' LIMIT 1");
    
    if($resultSet->num_rows > 0){
        //Validate
        $update = $mysqli->query("UPDATE users SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");

        if($update){
            echo '<div style="font-size:1.50em;color : White;font-weight:bold;"> Your account has been verified. You may now login. <span style="font-size:1.25em;color:#0e3c68;font-weight:bold;"></span></div>';
            echo "Your account has been verified. You may now login.";
        }else{
            echo $mysqli->error;
        }

    }else{
        echo '<div style="font-size:1.50em;color : White;font-weight:bold;">This account is invalid or already verified. <span style="font-size:1.25em;color:#0e3c68;font-weight:bold;"></span></div>';
        echo "This account is invalid or already verified. ";

    }

}else{
    die("Something Went wrong");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link rel="stylesheet" href="style.css" type = "text/css">
</head>
<body>
    
<p class = "message" align = "center"  ><a href="Login.php"> <Font size = "10">Login  </a></p>
    
</body>
</html>

