<!DOCTYPE html>
<html>
<head>
	<title>Users List</title>
</head>
<body>

<?php require 'index.html';  ?>

<br>
<?php
require 'dbconn.php';

$sql = "SELECT id, username, first_name, last_name FROM users";
$result = $conn->query($sql);

?>

<?php if ($result->num_rows > 0) { ?>
<table border="1">
	<thead>
		<td>ID</td>
		<td>Username</td>
		<td>First name</td>
		<td>Last name</td>
	</thead>
	<tbody>
		<?php
			 while($row = $result->fetch_assoc()) {
		       echo "<tr>";
		       echo "<td>".$row['id']."</td>";
		       echo "<td>".$row['username']."</td>";
		       echo "<td>".$row['first_name']."</td>";
		       echo "<td>".$row['last_name']."</td>";
		       echo "</tr>";
		    }
		?>
	</tbody>
</table>

<?php
	} else { 
    echo "0 results";
	$conn->close();
	}
?>
</body>
</html>