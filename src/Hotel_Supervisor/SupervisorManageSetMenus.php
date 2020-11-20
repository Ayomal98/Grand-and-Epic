<?php
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['User_Email'];
?>

<html>

<head>
	<link rel="stylesheet" href="../../public/css/employee.css">
	<title>
		Hotel Supervisor Manage Set Menu
	</title>
	<script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body bgcolor="black">

	<center>
		<img src="../../public/images/Logo.png" width="20%">

		<span class="far fa-caret-square-down" style="color:white;font-size:30px;position:absolute;right:0px;top:20px;" onclick="funcUserDetails()"></span>
		<!--<br><span style="position:absolute;top:100px;right:40px;font-size:20px;color:white"></span>-->
		<div id="user-detail-container">
			<span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
			<p style="margin-top: 2px; color:black"><?php echo "Logged in as $username"; ?></P>
			<hr style="color:teal">
			<a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
		</div>
	</center>
	<div class="sidenav">
		<button class="dropdown-btn">Manage Set Menu
			<i class="fa fa-caret-down"></i>
		</button>

		<div class="dropdown-container">
			<a href="SupervisorDashboard.php"><font size="4 px">Dashboard</font></a>
			<a href="SupervisorAssignEmployeeTasks.php"><font size="4 px">Assign Employee Tasks</font></a>
			<a href="SupervisorManageMeals.php"><font size="4 px">Manage Meals</font></a>
			<a href="SupervisorLeaveRequest.php"><font size="4 px">Request a Leave</font></a>
		</div>

	</div>
	
	<div class="top-right">
		<table width="100%">
			<tr>
				<td>
					<img src="../../public/images/ayomal.png" height="40%">
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
	<fieldset style = " position:absolute; top:280px; width:90%; left:50px;">
        <legend style = "color:white; font-size: 20px">Add New Set Menu</legend>
        
				<table style = "color:white; font-size:20px; width:100%;">

					<tr>
						<td>Set Menu ID:</td>
						<td><input type="text" name="setmenuid" size="20" required></td>
					</tr>
					<tr>
                        <td>Meal Type: </td>
                        <td>
                            <select id="types" name="mealtype" class="inputs">
                                <option value="Breakfast">Breakfast</option>
                                <option value="Lunch">Lunch</option>
                                <option value="Dinner">Dinner</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Meal 01:</td>
						<td><input type="text" name="meal1" size="20" required></td>
						<td><input type="file" name="mealimage1" id="fileToUpload"></td>
					</tr>
					<tr>
                        <td>Meal 02:</td>
						<td><input type="text" name="meal2" size="20" required></td>
						<td><input type="file" name="mealimage2" id="fileToUpload"></td>
					</tr>
					<tr>
                        <td>Meal 03:</td>
						<td><input type="text" name="meal3" size="20" required></td>
						<td><input type="file" name="mealimage3" id="fileToUpload"></td>
					</tr>
					<tr>
                        <td>Meal 04:</td>
						<td><input type="text" name="meal4" size="20"></td>
						<td><input type="file" name="mealimage4" id="fileToUpload"></td>
					</tr>
					<tr>
                        <td>Meal 05:</td>
						<td><input type="text" name="meal5" size="20"></td>
						<td><input type="file" name="mealimage5" id="fileToUpload"></td>
                    </tr>
                    <tr>
                        <td>Price for the Set Menu:</td>
                        <td><input type="text" name="price" size="50" required></td>
                    </tr>
                </table>
            
                <table style = "color:white; font-size: 20px; width:86.5%;">
                    <tr>
                        <td align="right">
                            <input type="submit" class="button" name="insertsm" value="Add a New Set Menu">
							<input type="reset" class="button" value="Reset Menu Details" name="reset">
                        </td>
                    </tr>
                </table>
            		
	</fieldset>
    </form>

	<form action="" method="POST">
		<fieldset style=" position:absolute; top:1300px; width:90%; left:50px;">
			<legend style="color:white; font-size: 20px">Update and Delete Set Menu</legend>
			<input type="text" name="Meals_ID" placeholder="Enter id to Search" />
			<input type="submit" class="button" name="search" value="Search by ID">
		</fieldset>
	</form>

	<!-- SEARCH -->
	<?php
	include("../../config/connection.php");
	if (isset($_POST['search'])) {
		$setmenu_id = $_POST['setmenu_id'];

		$query = "SELECT * FROM set_menu where setmenu_id='$setmenu_id' ";
		$query_run = mysqli_query($con, $query);

		while ($row = mysqli_fetch_array($query_run)) {
	?>
			<form action="" method="POST" enctype="multipart/form-data">
				<fieldset style=" position:absolute; top:1420px; width: 90%; left:50px; ">
					<table style="color:white; font-size: 20px; width:100%;">
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
								<input type="submit" class="button" name="update" value="Update Menu">
								<input type="submit" class="button" name="delete" value="Delete Menu">
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
	<div>
	<table style="position:absolute; left:50px; top:900px; border: 1px solid white; color:white; width:92%">
		<tr>
			<th colspan="13"><h2>Set Menu Details</h2></th>
		</tr>
		<tr>
			<th>Menu ID</th>
			<th>Meal Type</th>
			<th>Meal 01</th>
			<th>Image 01</th>
			<th>Meal 02</th>
			<th>Image 02</th>
			<th>Meal 03</th>
			<th>Image 03</th>
			<th>Meal 04</th>
			<th>Image 04</th>
			<th>Meal 05</th>
			<th>Image 05</th>
			<th>Price</th>
		</tr>

			<?php
				include("../../config/connection.php");

					$query = "SELECT * FROM set_menu";
					$query_run = mysqli_query($con,$query);

					while($row = mysqli_fetch_array($query_run))
					{
			?>
						<tr>
							<td><?php echo $row['setmenu_id'] ?></td>
							<td><?php echo $row['meal_type'] ?></td>
							<td><?php echo $row['meal_1'] ?></td>
							<td><?php echo '<img src="data:image;base64, '.base64_encode($row['mealimage_1']).'" alt="Image" style="width: 100px; height: 60px" >' ?></td>
							<td><?php echo $row['meal_2'] ?></td>
							<td><?php echo '<img src="data:image;base64, '.base64_encode($row['mealimage_2']).'" alt="Image" style="width: 100px; height: 60px" >' ?></td>
							<td><?php echo $row['meal_3'] ?></td>
							<td><?php echo '<img src="data:image;base64, '.base64_encode($row['mealimage_3']).'" alt="Image" style="width: 100px; height: 60px" >' ?></td>
							<td><?php echo $row['meal_4'] ?></td>
							<td><?php echo '<img src="data:image;base64, '.base64_encode($row['mealimage_4']).'" alt="Image" style="width: 100px; height: 60px" >' ?></td>
							<td><?php echo $row['meal_5'] ?></td>
							<td><?php echo '<img src="data:image;base64, '.base64_encode($row['mealimage_5']).'" alt="Image" style="width: 100px; height: 60px" >' ?></td>
							<td><?php echo $row['price'] ?></td>						
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
<?php include("../../config/connection.php");
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

