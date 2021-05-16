<?php	
    // Initialize a database connection
    $conn = mysqli_connect("localhost", "root", "" , "dbms_project");

    // Destroy if not possible to create a connection
    if(!$conn){
        echo "<h3 class='container bg-dark p-3 text-center text-warning rounded-lg mt-5'>Not able to establish Database Connection<h3>";
    }
	
	$profileid = $_SESSION['id'];
	$sql = "SELECT * FROM users WHERE users.id = $profileid";
	$query1 = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query1);


	$user_id = $row['id'];
	$user_name = $row['username'];
	$bio = $row['bio'];
	$skills = $row['skills'];
	$email = $row['email'];
	$user_image = $row['profileUrl'];

	if(isset($_REQUEST['searchid'])){
		$searchid = $_REQUEST['searchid'];
		$sql = "SELECT * FROM users WHERE users.id = $searchid";
		$query1 = mysqli_query($conn, $sql);

		$row = mysqli_fetch_array($query1);


		$user_id = $row['id'];
		$user_name = $row['username'];
		$bio = $row['bio'];
		$skills = $row['skills'];
		$email = $row['email'];
		$user_image = $row['profileUrl'];
	}


	 if(isset($_REQUEST['save'])){
         $username = $_REQUEST["username"];
		 $email = $_REQUEST["email"];
		 $bio = $_REQUEST["bio"];
		 $skills = $_REQUEST['skills'];
		 $url = $_REQUEST["url"];

		$sql = "UPDATE users SET username = '$username', email = '$email', bio = '$bio', skills = '$skills' , profileUrl = '$url' WHERE users.id = $user_id";
		mysqli_query($conn, $sql);
		$_SESSION['profileUrl'] = $url;
		$_SESSION['username'] = $username;
		if($sql){
            echo "success";
            echo "<script>alert('Your Profile is Updated')</script>";
			echo "<script>window.open('profile.php', '_self')</script>";
        }
	 }	

		if(isset($_REQUEST['logout'])){

			session_start();
			session_destroy();
            echo "<script>alert('You are successfully logged out')</script>";
			echo "<script>window.open('../KrushalWork/Login.php' , '_self')</script>";
			die;

		}
			


?> 