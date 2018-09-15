<?php
include('dbconn.php');

require 'index.html';  

if (isset($_GET['id']) && is_numeric($_GET['id']))
{
	$id = $_GET['id'];


	$sql =  "DELETE FROM users WHERE id=$id";
	$result = $conn->query($sql);

	header("Location: view.php");
}

else
{
	header("Location: view.php");
}

?>