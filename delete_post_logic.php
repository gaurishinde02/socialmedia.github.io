<?php 

    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "dbms_project";

    $conn = mysqli_connect($server, $user, $pass, $database);

    if (!$conn) {
        die("<script>alert('Connection Failed.')</script>");
    }

    if (isset($_REQUEST['delete'])) {
        $postid = $_REQUEST["postid"];

        $sql = "DELETE FROM newblogs WHERE newblogs.id = $postid";
        $query =  mysqli_query($conn, $sql);

        if ($sql) {
            echo "success";
            echo "<script>alert('Your Post is Deleted')</script>";
            echo "<script>window.open('../PostPages/index.php' , '_self')</script>";
        }
    }
?>