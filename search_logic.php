<?php

$conn = mysqli_connect("localhost", "root", "", "dbms_project");

if (!$conn) {
    die("ERROR: COULD NOT CONNECT" . mysqli_connect_error());
}

$sql = "SELECT * FROM users ORDER BY username DESC";
$query = mysqli_query($conn, $sql);

if (isset($_REQUEST['searchSubmit'])){
    $searchName = $_REQUEST['searchSubmit'];

    $sql = "SELECT * FROM users WHERE username LIKE '$searchName%'";
    $profiles = mysqli_query($conn, $sql);
}

?>