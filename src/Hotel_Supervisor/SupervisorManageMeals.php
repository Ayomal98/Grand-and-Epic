<?php
include("../../public/includes/session.php");
include("../../config/connection.php");
include('../../public/includes/id-generator.php');

checkSession();
	if(!isset($_SESSION['First_Name'])){
		header('Location:../Hotel_Website/HomePage-login.php');
		
	}
?>

<html>

<head>
	<link rel="stylesheet" href="../../public/css/employee.css">
	<title>
		Hotel Supervisor Manage Meals
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
				<?php 
					echo "<br><p class=\"logged-in-msg\">You are Logged in as " . $_SESSION['First_Name']. " (Staff)</p>"; 
				?>
			<hr style="color:teal">
			<a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
		</div>
	</center>
	<div class="sidenav">
		<button class="dropdown-btn">Manage Meals
			<i class="fa fa-caret-down"></i>
		</button>

		<div class="dropdown-container">
			<a href="SupervisorDashboard.php">Dashboard</a>
			<a href="SupervisorManageSetMenus.php">Manage Set Menu</a>
			<a href="SupervisorManageMealPackages.php">Manage Meal Packages</a>
			<a href="SupervisorAssignEmployeeTasks.php">Assign Employee Tasks</a>
			<a href="SupervisorLeaveRequest.php">Request a Leave</a>
		</div>

	</div>
	
	<div class="top-right">
		<table width="100%">
			<tr>
				<td>
					<img src="../../public/images/ayomal.png" height="80px">
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

	<form action="" method="POST" enctype="multipart/form-data">
		<fieldset style=" position:absolute; top:280px; width: 75%; left:160px">
			<legend style="color:white; font-size: 20px">Add Meals</legend>

			<table align="center" style="color:white; font-size: 20px; width:88%; ">
				<tr>
					<td>Meal ID:</td>
					<td align="center"><input type="text" name="mealid" placeholder="Ex:M001" size="20" required></td>
				</tr>
				<tr>
					<td>Meal Name:</td>
					<td align="center"><input type="text" name="mealname" size="20" required></td>
				</tr>
				<tr>
					<td>Price:</td>
					<td align="center"><input type="text" pattern="[0-9]+" name="price" size="50" required></td>
				</tr>
				<tr id="MealT">
					<td>Meal Type: </td>
					<td align="left">
						<select id="mttypes" name="mealtype" class="inputs" style="margin: 8px 85px;">
							<option value disabled selected>Select a Meal Type</option>
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

	
 <!-- Insert New Meal -->
<?php 
if(isset($_POST['insert'])){

    $mealid=$_POST['mealid'];  
    $mealname=$_POST['mealname'];
    $price=$_POST['price'];
    $mealimage = addslashes(file_get_contents($_FILES["mealimage"]["tmp_name"]));
    $mealtype=$_POST['mealtype'];

      $add_query = "INSERT INTO meals(Meals_ID,Meals_Name, Price, Meal_Type, Meal_Image) VALUES ('".$mealid."','".$mealname."','".$price."','".$mealtype."','".$mealimage."')";
      $add_query_run = mysqli_query($con,$add_query);

      if ($add_query_run) {
        echo "<script>
        alert('New Food item Has been Added');
        window.location.href='SupervisorManageMeals.php';
        </script>";
      }else {
        echo "<script>
        alert('Food item Not Added');
        window.location.href='SupervisorManageMeals.php';
        </script>";
      }  
}
?> 



	<form action="" method="POST">
		<fieldset style=" position:absolute; top:700px; width: 45%; right:0%;">
			<legend style="color:white; font-size: 20px">Update and Delete Meals</legend>
			<input type="text" name="Meals_ID" placeholder="Enter id to Search" />
			<input type="submit" class="button" name="search" value="Search by ID">
		</fieldset>
	</form>



	<!-- SEARCH -->
	<?php
	
	if (isset($_POST['search'])) {
		$Meals_ID = $_POST['Meals_ID'];

		$query = "SELECT * FROM meals where Meals_ID='$Meals_ID' ";
		$query_run = mysqli_query($con, $query);
		if (mysqli_num_rows($query_run) == 1) {

			while ($row = mysqli_fetch_array($query_run)) {
	?>
				<form action="" method="POST" enctype="multipart/form-data">
					<fieldset style=" position:absolute; top:820px; width: 45%; right:0%">
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
							<tr id="MealT">
								<td>Meal Type:</td>
								<td>
									<select id="mttypes" name="mealtype" class="inputs" style="margin: 8px 2px;">
										<option value disabled selected>Select a Meal Type</option>

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
								<td><?php echo '<img src="data:image;base64, ' . base64_encode($row['Meal_Image']) . '" alt="Image" style="width: 200px; height: 150px" >' ?></td>
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
									<input type="reset" class="button" name="reset" value="Reset"></a>
								</td>
							</tr>
						</table>
					</fieldset>
				</form>

	<?php

			}
		} else {
			echo "<script>alert('ID you entered doesn't Exist.Please Try Again!')</script>";
			echo "<script>window.location.href='SupervisorManageMeals.php'</script>";
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
			<th>Price(Rs):</th>
			<th>Meal Type:</th>
			<th>Meal Image:</th>
		</tr>

			<?php
				

					$query = "SELECT * FROM meals";
					$query_run = mysqli_query($con,$query);

					while($row = mysqli_fetch_array($query_run))
					{
			?>
						<tr>
							<td><?php echo $row['Meals_ID'] ?></td>
							<td><?php echo $row['Meals_Name'] ?></td>
							<td><?php echo $row['Price'] ?></td>
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
<?php 
if (isset($_POST['update'])) {
	$mealid = $_POST['mealid'];
	$mealname = $_POST['mealname'];
	$price = $_POST['price'];
	$mealtype = $_POST['mealtype'];
	$mealimage = addslashes(file_get_contents($_FILES["mealimage"]["tmp_name"]));

	if($mealimage=="")
	{
		$query = "UPDATE meals SET Meals_ID='$mealid',Meals_Name='$mealname',Price='$price',Meal_Type='$mealtype' where Meals_ID='$_POST[mealid]'";
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
		$query = "UPDATE meals SET Meals_ID='$mealid',Meals_Name='$mealname',Price='$price',Meal_Type='$mealtype',Meal_Image='$mealimage' where Meals_ID='$_POST[mealid]'";
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
?>



<!-- Delete -->
<?php 
if (isset($_POST['delete'])) {
	$mealname = $_POST['mealname'];
	$price = $_POST['price'];
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
?>