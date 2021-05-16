<?php 

session_start();
session_destroy();

header("Location: ../PostPages/index.php");

?>