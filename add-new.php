<!DOCTYPE html>
<html>
<head>
	<title>Add New User</title>
</head>
<body>
	<?php require 'index.html';  ?>
	
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	require 'dbconn.php';

	$uname = $_POST['username'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];

	if (empty($uname) || empty($first_name) || empty($last_name)) {
		echo "All fields are required.";
	}else{
		$sql = "INSERT INTO users (username, first_name, last_name)
		VALUES ('".$uname."', '".$first_name."', '".$last_name."')";

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}
}
?>

<form action="add-new.php" method="post">
	<label>Username</label>
	<input type="text" name="username">
	<br>
	<label>First Name</label>
	<input type="text" name="first_name">
	<br>
	<label>Last Name</label>
	<input type="text" name="last_name">
	<br>
	<input type="submit" value="Add New User" >
</form>

</body>
</html>