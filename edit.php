<?php
function valid($id, $uname, $first_name,$last_name, $error)

{
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Edit List</title>
</head>
<body>

	<?php require 'index.html';  ?>

	<?php
		if ($error != '')
		{
			echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
		}
	?>

	<form action="" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>"/>

		<table border="1">
			<tr>
			<td colspan="2"><b><font color='Red'>Edit Records </font></b></td>
			</tr>

			<tr>
			<td width="179"><b><font>Username<em>*</em></font></b></td>
			<td><label>
			<input type="text" name="username" value="<?php echo $uname; ?>" />
			</label></td>
			</tr>

			<tr>
			<td width="179"><b><font>First Name<em>*</em></font></b></td>
			<td><label>
			<input type="text" name="first_name" value="<?php echo $first_name; ?>" />
			</label></td>
			</tr>

			<tr>
			<td width="179"><b><font>Last Name<em>*</em></font></b></td>
			<td><label>
			<input type="text" name="last_name" value="<?php echo $last_name; ?>" />
			</label></td>
			</tr>

			<tr align="Right">
			<td colspan="2"><label>
			<input type="submit" name="submit" value="Save">
			</label></td>
			</tr>
		</table>
	</form>
	</body>
	</html>


	<?php
	}

	include('dbconn.php');

	if (isset($_POST['submit']))
	{
		//require 'dbconn.php';

		if (is_numeric($_POST['id']))
		{

			$id = $_POST['id'];
			$uname = $_POST['username'];
			$first_name = $_POST['first_name'];
			$last_name =$_POST['last_name'];


				if ($uname == '' || $first_name == '' || $last_name == '')
				 {
					echo "All fields are required.";

					$error = 'ERROR: Please fill in all required fields!';


					valid($id, $uname, $first_name,$last_name, $error);
				}

				else
				{

					$sql = "UPDATE users SET username='$uname', first_name='$first_name', last_name='$last_name' WHERE id='$id'";

					
					if ($conn->query($sql) == TRUE) {
					    echo "Updated successfully";
					    echo "$uname";
					    echo "$first_name";
					} else {
					    echo "Error: " . $sql . "<br>" . $conn->error;
					}
					$conn->close();

					header("Location: view.php");

				}
		}

		else
		{

			echo 'Error!';
		}
	}

	else
	{

		if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
		{

			$id = $_GET['id'];
			$sql= "SELECT * FROM users WHERE id=$id";
			$result = $conn->query($sql);

			$row = $result->fetch_assoc();

			if($row)
			{

				$uname = $row['username'];
				$first_name = $row['first_name'];
				$last_name = $row['last_name'];

				valid($id, $uname, $first_name,$last_name,'');
			}

			else
			{
				echo "No results!";
			}
		}

		else
		{
			echo 'Error!';
		}

	}

