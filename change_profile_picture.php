<?php
    session_start();
    include 'scribble.php';
  
    if(isset($_REQUEST['post'])){
        
        $user_image = $_REQUEST["file"];
        $id = $_SESSION['id'];
        $run = "UPDATE users SET profileUrl='$user_image' WHERE users.id=$id";
        mysqli_query($conn, $run);
        $_SESSION['profileUrl'] = $user_image;
        if($run){
            echo "success";
            echo "<script>alert('Your Profile Updated')</script>";
			echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
        }

       
}
					
				

			
    
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="main-content">
        <!-- Top navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">



                <!-- Header -->
                <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-color: black; background-size: cover; background-position: center top;">
                    <!-- Mask -->
                    <span class="mask bg-gradient-default opacity-8"></span>
                    <!-- Header container -->
                    <div class="container-fluid d-flex align-items-center">
                        <div class="row">
                            <div class="col-lg-7 col-md-10">
                                <h1 class="display-2 text-white">GEEKSTER</h1>
                                <p class="text-white mt-0 mb-5">SELECT YOUR PROFILE IMAGE</p>
                                <form action='change_profile_picture.php' method='request'>
                                IMAGE URL: <input type="textbox" name="file"><br><br>
                                <input id="update_button" type="submit" name="post" class="btn btn-sm btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</body>
</html>