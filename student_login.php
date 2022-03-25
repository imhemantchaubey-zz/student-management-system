<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
	<link rel="stylesheet" type="text/css" href="student_login.css">
</head>
<body>
	<div id="content">
		<center><br><br>
		<form id="one" action="" method="post">
		<div id="four">Student Login Page</div><br>
		Email ID: <input class="two" type="text" name="email" required><br><br>
		Password: <input class="two" type="password" name="password" required><br><br>
		<input id="three" type="submit" name="submit" value="Login">
		</form><br>
		<?php
			session_start();
			if(isset($_POST['submit']))
			{
				$connection = mysqli_connect("localhost","root","");
				$db = mysqli_select_db($connection,"test");
				$query = "select * from students where email = '$_POST[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					if($row['email'] == $_POST['email'])
					{
						if($row['password'] == $_POST['password'])
						{
							$_SESSION['name'] =  $row['name'];
							$_SESSION['email'] =  $row['email'];
							header("Location: student_dashboard.php");
						}
						else{
							?>
							<span id="er">Wrong Password...!</span>
							<?php
						}
					}
				}
			}
			?>
	</center>
		</div>
</body>
</html>