<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php

include("connection.php");

//getting id of the data 
$id = $_GET['id'];

$result=mysqli_query($mysqli, "DELETE FROM products WHERE id=$id"); //deleting the row from table

//redirecting to display
header("Location:view.php");
?>

