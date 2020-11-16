<?php
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['User_Email'];
?>

<html>

<head>
	<link rel="stylesheet" href="../Css/employee.css">
	<title>
		Hotel Supervisor Manage Meals
	</title>
	<script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body bgcolor="black">

	<center>
		<img src="../Images/Logo.png" width="20%">

		<span class="far fa-caret-square-down" style="color:white;font-size:30px;position:absolute;right:100px;top:10px;" onclick="funcUserDetails()"></span>
		<!--<br><span style="position:absolute;top:100px;right:40px;font-size:20px;color:white"></span>-->
		<div id="user-detail-container">
			<span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
			<p style="margin-top: 2px; color:black"><?php echo "Logged in as $username"; ?></P>
			<hr style="color:teal">
			<a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
		</div>
	</center>
	<div class="sidenav">
		<button class="dropdown-btn">Manage Meals
			<i class="fa fa-caret-down"></i>
		</button>

		<div class="dropdown-container">
			<a href="SupervisorDashboard.php"><font size="4 px">Dashboard</font></a>
			<a href="SupervisorAssignEmployeeTasks.php"><font size="4 px">Assign Employee Tasks</font></a>
			<a href="SupervisorManageSetMenus.php"><font size="4 px">Manage Set Menu</font></a>
			<a href="SupervisorLeaveRequest.php"><font size="4 px">Request a Leave</font></a>
		</div>

	</div>
	
	<div class="top-right">
		<table width="100%">
			<tr>
				<td>
					<img src="../Images/ayomal.png" height="40%">
				</td>
			</tr>
		</table>
	</div>
	<script>
		/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
		var dropdown = document.getElementsByClassName("dropdown-btn");
		var i;

		for (i = 0; i < dropdown.length; i++) {
			dropdown[i].addEventListener("click", function() {
				this.classList.toggle("active");
				var dropdownContent = this.nextElementSibling;
				if (dropdownContent.style.display === "block") {
					dropdownContent.style.display = "none";
				} else {
					dropdownContent.style.display = "block";
				}
			});
		}
	</script>

	<form action="Meals.php" method="POST" enctype="multipart/form-data">
		<fieldset style=" position:absolute; top:280px; width: 75%; left:160px">
			<legend style="color:white; font-size: 20px">Add Meals</legend>

			<table align="center" style="color:white; font-size: 20px; width:88%; ">
				<tr>
					<td>Meal ID:</td>
					<td align="center"><input type="text" name="mealid" size="20" required></td>
				</tr>
				<tr>
					<td>Meal Name:</td>
					<td align="center"><input type="text" name="mealname" size="20" required></td>
				</tr>
				<tr>
					<td>Price:</td>
					<td align="center"><input type="text" pattern="[0-9]+" name="price" size="50" required></td>
				</tr>
				<tr>
					<td>Meal Plan: </td>
					<td align="left">
						<select id="types" name="mealplan" class="inputs" style="margin: 8px 85px;">
							<option value="Staying-in">Staying-in</option>
							<option value="Events">Events</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Meal Type: </td>
					<td align="left">
						<select id="types" name="mealtype" class="inputs" style="margin: 8px 85px;">
							<option value="-">-</option>
							<option value="Breakfast">Breakfast</option>
							<option value="Lunch">Lunch</option>
							<option value="Dinner">Dinner</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Meal Image: </td>
					<td align="center"><input type="file" accept="image/*" name="mealimage" id="fileToUpload" size="20"></td>
				</tr>
			</table>

			<table style="color:white; font-size: 20px; width:86.5%;">
				<tr>
					<td align="right">
						<input type="submit" class="button" name="insert" value="Add a New Meal">
						<input type="reset" class="button" value="Reset Meal Details" name="reset">
					</td>
				</tr>
			</table>

		</fieldset>
	</form>

	<form action="" method="POST">
		<fieldset style=" position:absolute; top:800px; width: 45%; right:0%;">
			<legend style="color:white; font-size: 20px">Update and Delete Meals</legend>
			<input type="text" name="Meals_ID" placeholder="Enter id to Search" />
			<input type="submit" class="button" name="search" value="Search by ID">
		</fieldset>
	</form>

	<!-- SEARCH -->
	<?php
	include("../Templates/connection.php");
	if (isset($_POST['search'])) {
		$Meals_ID = $_POST['Meals_ID'];

		$query = "SELECT * FROM meals where Meals_ID='$Meals_ID' ";
		$query_run = mysqli_query($con, $query);

		while ($row = mysqli_fetch_array($query_run)) {
	?>
			<form action="" method="POST" enctype="multipart/form-data">
				<fieldset style=" position:absolute; top:920px; width: 45%; right:0%">
					<table style="color:white; font-size: 20px; width:95%;">
						<tr style="border: 1px solid white;">
							<td>Meal ID:</td>
							<td><input type="text" name="mealid" value="<?php echo $row['Meals_ID'] ?>" /></td>
						</tr>
						<tr>
							<td>Meal Name:</td>
							<td><input type="text" name="mealname" value="<?php echo $row['Meals_Name'] ?>" /></td>
						</tr>
						<tr>
							<td>Price:</td>
							<td><input type="float" pattern="[0-9]+" name="price" value="<?php echo $row['Price'] ?>" /></td>
						</tr>
						<tr>
							<td>Meal Plan: </td>
							<td>
								<select id="types" name="mealplan" class="inputs" style="margin: 8px 2px;">
									<option value="Staying-in"
										<?php
										if($row["Meal_Plan"]=='Staying-in')
										{
											echo "selected";
										}
										?>	
									>Staying-in</option>

									<option value="Events"
										<?php
										if($row["Meal_Plan"]=='Events')
										{
											echo "selected";
										}
										?>	
									>Events</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Meal Type:</td>
							<td>
								<select id="types" name="mealtype" class="inputs">
								<option value="-"
										<?php
										if($row["Meal_Type"]=='-')
										{
											echo "selected";
										}
										?>	
									>-</option>

									<option value="Breakfast"
										<?php
										if($row["Meal_Type"]=='Breakfast')
										{
											echo "selected";
										}
										?>	
									>Breakfast</option>

									<option value="Lunch"
										<?php
										if($row["Meal_Type"]=='Lunch')
										{
											echo "selected";
										}
										?>	
									>Lunch</option>

									<option value="Dinner"
										<?php
										if($row["Meal_Type"]=='Dinner')
										{
											echo "selected";
										}
										?>	
									>Dinner</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Meal Image:</td>
							<td><?php echo '<img src="data:image;base64, ' . base64_encode($row['Meal_Image']) . '" alt="Image" style="width: 250px; height: 200px" >' ?></td>
						</tr>
						<tr>
							<td>Update Meal Image:</td>
							<td>
								<input type="file" accept="image/*" name="mealimage" id="fileToUpload">
							</td>
						</tr>
						<tr>
							<td></td>
							<td style="position:relative;left:50px;">
								<input type="submit" class="button" name="update" value="Update Meal">
								<input type="submit" class="button" name="delete" value="Delete Meal">
							</td>
						</tr>
					</table>
				</fieldset>
			</form>

	<?php

		}
	}
	?>

	<!-- View Table-->
	<div class="dbtablescroll">
	<table style="color:white; width:100%">
		<tr>
			<th colspan="6"><h2>Meal Details</h2></th>
		</tr>
		<tr>
			<th>Meal ID:</th>
			<th>Meal Name:</th>
			<th>Price:</th>
			<th>Meal Plan:</th>
			<th>Meal Type:</th>
			<th>Meal Image:</th>
		</tr>

			<?php
				include("../Templates/connection.php");

					$query = "SELECT * FROM meals";
					$query_run = mysqli_query($con,$query);

					while($row = mysqli_fetch_array($query_run))
					{
			?>
						<tr>
							<td><?php echo $row['Meals_ID'] ?></td>
							<td><?php echo $row['Meals_Name'] ?></td>
							<td><?php echo $row['Price'] ?></td>
							<td><?php echo $row['Meal_Plan'] ?></td>
							<td><?php echo $row['Meal_Type'] ?></td>
							<td><?php echo '<img src="data:image;base64, '.base64_encode($row['Meal_Image']).'" alt="Image" style="width: 100px; height: 60px" >' ?></td>
						</tr>
				<?php
					}
				?>

	</table>
	</div>
			
	<script>
		function funcUserDetails() {
			document.getElementById('user-detail-container').style.display = "block";
		}

		function funcCloseUserDetails() {
			document.getElementById('user-detail-container').style.display = "none";
		}
	</script>
</body>

</html>


<!-- Update -->
<?php include("../Templates/connection.php");
if (isset($_POST['update'])) {
	$mealid = $_POST['mealid'];
	$mealname = $_POST['mealname'];
	$price = $_POST['price'];
	$mealplan = $_POST['mealplan'];
	$mealtype = $_POST['mealtype'];
	$mealimage = addslashes(file_get_contents($_FILES["mealimage"]["tmp_name"]));

	if($mealimage=="")
	{
		$query = "UPDATE meals SET Meals_ID='$mealid',Meals_Name='$mealname',Price='$price',Meal_Plan='$mealplan',Meal_Type='$mealtype' where Meals_ID='$_POST[mealid]'";
		$query_run = mysqli_query($con, $query);

		if ($query_run) {
			echo "<script>
			alert('Food item Has been Updated');
			window.location.href='SupervisorManageMeals.php';
			</script>";
		} else {
			echo '<script> alert("Data Not Updated") </script>';
		}
	}
	else{
		$query = "UPDATE meals SET Meals_ID='$mealid',Meals_Name='$mealname',Price='$price',Meal_Plan='$mealplan',Meal_Type='$mealtype',Meal_Image='$mealimage' where Meals_ID='$_POST[mealid]'";
		$query_run = mysqli_query($con, $query);

		if ($query_run) {
			echo "<script>
			alert('Food item Has been Updated');
			window.location.href='SupervisorManageMeals.php';
			</script>";
		} else {
			echo '<script> alert("Data Not Updated") </script>';
		}
	}
}



// Delete
if (isset($_POST['delete'])) {
	$mealname = $_POST['mealname'];
	$price = $_POST['price'];
	$mealplan = $_POST['mealplan'];
	$mealtype = $_POST['mealtype'];
	$mealimage = addslashes(file_get_contents($_FILES["mealimage"]["tmp_name"]));
	$delete_query = "DELETE from meals where Meals_ID='$_POST[mealid]'";
	$delete_run = mysqli_query($con, $delete_query);
	if ($delete_run) {
		echo "<script>
		alert('Food item Has been Deleted');
		window.location.href='SupervisorManageMeals.php';
		</script>";
	} else {
		echo '<script> alert("Data Not Deleted") </script>';
	}
}
