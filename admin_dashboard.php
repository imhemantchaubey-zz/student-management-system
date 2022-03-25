<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<style>
		body{
			background: url(https://png.pngtree.com/thumb_back/fw800/background/20190223/ourmid/pngtree-fresh-book-student-advertising-background-backgroundwhite-bordercloudhand-paintedbookfreshstudentcloud-image_68054.jpg);
		}
		#header{
			height: 10%;
			width: 100%;
			top: 2%;
			background-color: black;
			position: fixed;
			color: white;
		}
		#left_side{
			height: 75%;
			width: 15%;
			margin: auto;
			top: 10%;
			position: fixed;
		}
		#right_side{
			height: 75%;
			width: 80%;
			background-color: whitesmoke;
			position: fixed;
			left: 17%;
			top: 21%;
			color: red;
			border: solid 1px black;
		}
		#top_span{
			top: 15%;
			width: 80%;
			left: 17%;
			position: fixed;
		}
		.one{
			margin-left: 150px;
		}
		.td{
			border: 1px solid black;
			text-align: left;
			width: 200px;
		}
		a#logout{
		  text-decoration: none;
			color: rgb(130, 230, 84);
		}
	</style>
	<?php
		session_start();
		$name = "";
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"test");
	?>
</head>
<body>
	<div id="header"><br>
		<center>Student Management System &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: <?php echo $_SESSION['email'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:<?php echo $_SESSION['name'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a id="logout" href="logout.php">Logout</a>
		</center>
	</div>
	<span id="top_span"><marquee>Note:- This is DBMS IE project made for the demonstration purpose...</marquee></span>
	<div id="left_side">
		<br><br><br>
		<form action="" method="post">
			<table>
				<tr>
					<td>
						<input style="font-size: 20px; border-radius:8px; background-color: yellow" type="submit" name="search_student" value="Search Student">
					</td>
				</tr>
				<tr>
					<td>
						<input style="font-size: 20px; border-radius:8px; background-color: yellow" type="submit" name="edit_student" value="Edit Student">
					</td>
				</tr>
				<tr>
					<td>
						<input style="font-size: 20px; border-radius:8px; background-color: yellow" type="submit" name="add_new_student" value="Add New Student">
					</td>
				</tr>
				<tr>
					<td>
						<input style="font-size: 20px; border-radius:8px; background-color: yellow" type="submit" name="delete_student" value="Delete Student">
					</td>
				</tr>
				<tr>
					<td>
						<input style="font-size: 20px; border-radius:8px; background-color: yellow" type="submit" name="show teacher" value="Show Teachers">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div id="right_side"><br><br>
		<div id="demo">
			<?php
				if(isset($_POST['search_student']))
				{
					?>
					<center>
					<form action="" method="post">
					&nbsp;&nbsp;<b>Enter Roll No:</b>&nbsp;&nbsp; <input type="text" name="roll_no">
					<input type="submit" name="search_by_roll_no_for_search" value="Search">
					</form><br><br>
					<h4><b><u>Student's details</u></b></h4><br><br>
					</center>
					<?php
				}
				if(isset($_POST['search_by_roll_no_for_search']))
				{
					$query = "select * from students where roll_no = '$_POST[roll_no]'";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
						?>
						<table class="one">
							<tr>
								<td>
									<b>Roll No:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['roll_no']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Name:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['name']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Father's Name:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['father_name']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Class:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['class']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Mobile:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['mobile']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Email:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['email']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Password:</b>
								</td> 
								<td>
									<input type="password" value="<?php echo $row['password']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Remark:</b>
								</td> 
								<td>
									<textarea rows="3" cols="40" disabled><?php echo $row['remark']?></textarea>
								</td>
							</tr>
						</table>
						<?php
					}
				}
			?>
			
		<?php
			if(isset($_POST['edit_student']))
			{
				?>
				<center>
				<form action="" method="post">
				&nbsp;&nbsp;<b>Enter Roll No:</b>&nbsp;&nbsp; <input type="text" name="roll_no">
				<input type="submit" name="search_by_roll_no_for_edit" value="Search">
				</form><br><br>
				<h4><b><u>Student's details</u></b></h4><br><br>
				</center>
				<?php
			}
			if(isset($_POST['search_by_roll_no_for_edit']))
			{
				$query = "select * from students where roll_no = $_POST[roll_no]";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					?>
					<form action="admin_edit_student.php" method="post">
						<table  class="one">
						<tr>
							<td>
								<b>Roll No:</b>
							</td> 
							<td>
								<input type="text" name="roll_no" value="<?php echo $row['roll_no']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Name:</b>
							</td> 
							<td>
								<input type="text" name="name" value="<?php echo $row['name']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Father's Name:</b>
							</td> 
							<td>
								<input type="text" name="father_name" value="<?php echo $row['father_name']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Class:</b>
							</td> 
							<td>
								<input type="text" name="class" value="<?php echo $row['class']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Mobile:</b>
							</td> 
							<td>
								<input type="text" name="mobile" value="<?php echo $row['mobile']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Email:</b>
							</td> 
							<td>
								<input type="text" name="email" value="<?php echo $row['email']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Password:</b>
							</td> 
							<td>
								<input type="password" name="password" value="<?php echo $row['password']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Remark:</b>
							</td> 
							<td>
								<textarea rows="3" cols="40" name="remark"><?php echo $row['remark']?></textarea>
							</td>
						</tr><br>
						<tr>
							<td></td>
							<td>
								<input type="submit" name="edit" value="Save">
							</td>
						</tr>
					</table>
					</form>
					<?php
				}
			}
		?>
		<?php
			if(isset($_POST['delete_student']))
			{
				?>
				<center>
				<form action="delete_student.php" method="post">
				&nbsp;&nbsp;<b>Enter Roll No:</b>&nbsp;&nbsp; <input type="text" name="roll_no">
				<input type="submit" name="search_by_roll_no_for_delete" value="Delete">
				</form><br><br>
				</center>
				<?php
			}
			?>

			<?php 
				if(isset($_POST['add_new_student'])){
					?>
					<center><h4>Fill the given details</h4></center>
					<form action="add_student.php" method="post">
						<table  class="one">
						<tr>
							<td>
								<b>Roll No:</b>
							</td> 
							<td>
								<input type="text" name="roll_no" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Name:</b>
							</td> 
							<td>
								<input type="text" name="name" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Father's Name:</b>
							</td> 
							<td>
								<input type="text" name="father_name" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Class:</b>
							</td> 
							<td>
								<input type="text" name="class" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Mobile:</b>
							</td> 
							<td>
								<input type="text" name="mobile" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Email:</b>
							</td> 
							<td>
								<input type="text" name="email" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Password:</b>
							</td> 
							<td>
								<input type="password" name="password" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Remark:</b>
							</td> 
							<td>
								<textarea rows="3" cols="40" placeholder="Optional" name="remark"></textarea>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><br><input type="submit" name="add" value="Add Student"></td>
						</tr>
					</table>
					</form>
					<?php
				}
			?>
			<?php
				if(isset($_POST['show_teacher']))
				{
					?>
					<center>
						<h5 style="font-size: 30px;" >Teacher's Details</h5>
						<table  class="two" style="border-collapse: collapse;border: 1px solid black;">
							<tr>
								<td style="padding: 15px; font-size:20px; color: rgb(0, 153, 51); font-family:'Consolas'" class="td"><b>ID</b></td>
								<td style="padding: 15px; font-size:20px; color: rgb(0, 153, 51); font-family:'Consolas'" class="td"><b>Name</b></td>
								<td style="padding: 15px; font-size:20px; color: rgb(0, 153, 51); font-family:'Consolas'" class="td"><b>Mobile</b></td>
								<td style="padding: 15px; font-size:20px; color: rgb(0, 153, 51); font-family:'Consolas'" class="td"><b>Courses</b></td>
							</tr>
						</table>
					</center>
					<?php
					$query = "select * from teachers";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
						?>
						<center>
						<table class="two" style="border-collapse: collapse;border: 1px solid black;">
							<tr>
								<td style="padding: 15px; font-size:15px; color: rgb(0, 38, 153); font-family:'Comic Sans MS'" class="td"><?php echo $row['t_id']?></td>
								<td style="padding: 15px; font-size:15px; color: rgb(0, 38, 153); font-family:'Comic Sans MS'" class="td"><?php echo $row['name']?></td>
								<td style="padding: 15px; font-size:15px; color: rgb(0, 38, 153); font-family:'Comic Sans MS'" class="td"><?php echo $row['mobile']?></td>
								<td style="padding: 15px; font-size:15px; color: rgb(0, 38, 153); font-family:'Comic Sans MS'" class="td"><?php echo $row['courses']?></td>
							</tr>
						</table>
						</center>
						<?php
					}
				}
			?>
		</div>
	</div>
</body>
</html>