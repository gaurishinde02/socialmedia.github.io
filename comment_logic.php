<?php

$conn = mysqli_connect("localhost", "root", "", "mainblog");

if (!$conn) {
    die("ERROR: COULD NOT CONNECT" . mysqli_connect_error());
}

$sql = "SELECT * FROM comments ORDER BY timestamp ASC";
$querycomment = mysqli_query($conn, $sql);

?>