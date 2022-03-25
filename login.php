<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<center><br><br>
	<h3 id="head">Student Management System</h3><br>
	<form action="" method="POST">
		<input class="button" type="submit" name="admin_login" value="Admin Login" required><br><br>
		<input class="button" type="submit" name="student_login" value="Student Login" required>
	</form>
	<?php
		if(isset($_POST['admin_login'])){
			header("Location: admin_login.php");
		}
		if(isset($_POST['student_login'])){
			header("Location: student_login.php");
		}
	?>
	</center>
</body>
</html>