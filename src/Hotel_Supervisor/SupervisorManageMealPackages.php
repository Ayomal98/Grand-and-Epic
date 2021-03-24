<?php
include("../../public/includes/session.php");
include("../../config/connection.php");

checkSession();
	if(!isset($_SESSION['First_Name'])){
		header('Location:../Hotel_Website/HomePage-login.php');
		
	}
?>

<html>

<head>
	<link rel="stylesheet" href="../../public/css/employee.css">
	<title>
		Hotel Supervisor Manage Meal Packages
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
		<button class="dropdown-btn">Manage Meal Packages
			<i class="fa fa-caret-down"></i>
		</button>

		<div class="dropdown-container">
			<a href="SupervisorDashboard.php">Dashboard</a>
			<a href="SupervisorManageMeals.php">Manage Meals</a>
			<a href="SupervisorManageSetMenus.php">Manage Set Menu</a>
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
	<fieldset style = " position:absolute; top:280px; width:90%; left:50px;">
        <legend style = "color:white; font-size: 20px">Add New Meal Package</legend>
        
				<table style = "color:white; font-size:20px; width:100%;">

					<tr>
						<td>Meal Package ID:</td>
						<td><input type="text" name="mealpackid" placeholder="Ex:MP001" size="20" required></td>
					</tr>
					<tr>
                        <td>Meal Package Name: </td>
                        <td><input type="text" name="mealpackname" size="20"></td>
                    </tr>
                    <tr>
                        <td>Meal 01:</td>
						<td><input type="text" name="meal1" size="20" required></td>
						<td><input type="file" accept="image/*" name="meal1image" id="fileToUpload"></td>
					</tr>
					<tr>
                        <td>Meal 02:</td>
						<td><input type="text" name="meal2" size="20" required></td>
						<td><input type="file" accept="image/*" name="meal2image" id="fileToUpload"></td>
					</tr>
					<tr>
                        <td>Meal 03:</td>
						<td><input type="text" name="meal3" size="20" required></td>
						<td><input type="file" accept="image/*" name="meal3image" id="fileToUpload"></td>
					</tr>
					<tr>
                        <td>Meal 04:</td>
						<td><input type="text" name="meal4" size="20"></td>
						<td><input type="file" accept="image/*" name="meal4image" id="fileToUpload"></td>
					</tr>
					<tr>
                        <td>Meal 05:</td>
						<td><input type="text" name="meal5" size="20"></td>
						<td><input type="file" accept="image/*" name="meal5image" id="fileToUpload"></td>
                    </tr>
                    <tr>
                        <td>Price for the Meal Package:</td>
                        <td><input type="text" name="price" size="50" required></td>
                    </tr>
                </table>
            
                <table style = "color:white; font-size: 20px; width:86.5%;">
                    <tr>
                        <td align="right">
                            <input type="submit" class="button" name="insert" value="Add a New Meal Package">
							<input type="reset" class="button" value="Reset Package Details" name="reset">
                        </td>
                    </tr>
                </table>
            		
	</fieldset>
    </form>


 <!-- Insert New Meal Package -->
 <?php 
if(isset($_POST['insert'])){

    $mealpackid=$_POST['mealpackid'];  
    $mealpackname=$_POST['mealpackname'];
	$meal1=$_POST['meal1'];
    $meal1image = addslashes(file_get_contents($_FILES["meal1image"]["tmp_name"]));
	$meal2=$_POST['meal2'];
    $meal2image = addslashes(file_get_contents($_FILES["meal2image"]["tmp_name"]));
	$meal3=$_POST['meal3'];
    $meal3image = addslashes(file_get_contents($_FILES["meal3image"]["tmp_name"]));
	$meal4=$_POST['meal4'];
    $meal4image = addslashes(file_get_contents($_FILES["meal4image"]["tmp_name"]));
	$meal5=$_POST['meal5'];
    $meal5image = addslashes(file_get_contents($_FILES["meal5image"]["tmp_name"]));
    $price=$_POST['price'];

      $add_query = "INSERT INTO events_meals_packages(Package_ID,Package_Name, Meal1, Meal2, Meal3, Meal4, Meal5, Meal1_Image, Meal2_Image, Meal3_Image, Meal4_Image, Meal5_Image, price) VALUES ('".$mealpackid."', '".$mealpackname."', '".$meal1."', '".$meal2."', '".$meal3."', '".$meal4."', '".$meal5."', '".$meal1image."', '".$meal2image."', '".$meal3image."', '".$meal4image."', '".$meal5image."', '".$price."')";
      $add_query_run = mysqli_query($con,$add_query);

      if ($add_query_run) {
        echo "<script>
        alert('New Meal Package Has been Added');
        window.location.href='SupervisorManageMealPackages.php';
        </script>";
      }else {
        echo "<script>
        alert('Meal Package Not Added');
        window.location.href='SupervisorManageMealPackages.php';
        </script>";
      }  
}
?> 



	<form action="" method="POST">
		<fieldset style=" position:absolute; top:1300px; width:90%; left:50px;">
			<legend style="color:white; font-size: 20px">Update and Delete Meal Package</legend>
			<input type="text" name="Package_ID" placeholder="Enter id to Search" /><br>
			<input type="submit" class="button" name="search" value="Search by ID">
		</fieldset>
	</form>


	<!-- SEARCH -->
	<?php
	
	if (isset($_POST['search'])) {
		$Package_ID = $_POST['Package_ID'];

		$query = "SELECT * FROM events_meals_packages where Package_ID = '$Package_ID' ";
		$query_run = mysqli_query($con, $query);
		if (mysqli_num_rows($query_run) == 1) {

			while ($row = mysqli_fetch_array($query_run)) {
	?>

			<form action="" method="POST" enctype="multipart/form-data">
				<fieldset style=" position:absolute; top:1420px; width: 90%; left:50px; ">
					<table style="color:white; font-size: 20px; width:94%;">
						<tr>
							<td>Meal Package ID:</td>
							<td><input type="text" name="mealpackid" value="<?php echo $row['Package_ID'] ?>" /></td>
						</tr>
						<tr>
							<td>Meal Package Name: </td>
							<td><input type="text" name="mealpackname" value="<?php echo $row['Package_Name'] ?>" /></td>
						</tr>

						<tr>
							<td>Meal 01:</td>
							<td><input type="text" name="meal1" value="<?php echo $row['Meal1'] ?>" /></td>
							<td><?php echo '<img src="data:image;base64, ' . base64_encode($row['Meal1_Image']) . '" alt="Image" style="width: 150px; height: 100px" >' ?></td>
							<td style="position:relative; right:20px;"><input type="file" accept="image/*" name="meal1image" id="fileToUpload"></td>
						</tr>

						<tr>
							<td>Meal 02:</td>
							<td><input type="text" name="meal2" value="<?php echo $row['Meal2'] ?>" /></td>
							<td><?php echo '<img src="data:image;base64, ' . base64_encode($row['Meal2_Image']) . '" alt="Image" style="width: 150px; height: 100px" >' ?></td>
							<td style="position:relative; right:20px;"><input type="file" accept="image/*" name="meal2image" id="fileToUpload"></td>
						</tr>

						<tr>
							<td>Meal 03:</td>
							<td><input type="text" name="meal3" value="<?php echo $row['Meal3'] ?>" /></td>
							<td><?php echo '<img src="data:image;base64, ' . base64_encode($row['Meal3_Image']) . '" alt="Image" style="width: 150px; height: 100px" >' ?></td>
							<td style="position:relative; right:20px;"><input type="file" accept="image/*" name="meal3image" id="fileToUpload"></td>
						</tr>

						<tr>
							<td>Meal 04:</td>
							<td><input type="text" name="meal4" value="<?php echo $row['Meal4'] ?>" /></td>
							<td><?php echo '<img src="data:image;base64, ' . base64_encode($row['Meal4_Image']) . '" alt="Image" style="width: 150px; height: 100px" >' ?></td>
							<td style="position:relative; right:20px;"><input type="file" accept="image/*" name="meal4image" id="fileToUpload"></td>
						</tr>

						<tr>
							<td>Meal 05:</td>
							<td><input type="text" name="meal5" value="<?php echo $row['Meal5'] ?>" /></td>
							<td><?php echo '<img src="data:image;base64, ' . base64_encode($row['Meal5_Image']) . '" alt="Image" style="width: 150px; height: 100px" >' ?></td>
							<td style="position:relative; right:20px;"><input type="file" accept="image/*" name="meal5image" id="fileToUpload"></td>
						</tr>

						<tr>
							<td>Price for the Meal Package:</td>
							<td><input type="text" name="price" value="<?php echo $row['price'] ?>" /></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td colspan = "2" style="position:relative;">
								<input type="submit" class="button" name="update" value="Update Package">
								<input type="submit" class="button" name="delete" value="Delete Package">
								<input type="reset" class="button" name="reset" value="Reset Details"></a>
							</td>
						</tr>
					</table>
				</fieldset>
			</form>

<?php

			}
		} else {
			echo "<script>alert('ID you entered doesn't Exist.Please Try Again!')</script>";
			echo "<script>window.location.href='SupervisorManageMealPackages.php'</script>";
		}
	}
?>

	<!-- View Table-->
	<div>
	<table style="position:absolute; left:50px; top:900px; border: 1px solid white; color:white; width:92%">
		<tr>
			<th colspan="13"><h2>Meal Package Details</h2></th>
		</tr>
		<tr>
			<th>Package ID</th>
			<th>Package Name</th>
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
				

					$query = "SELECT * FROM events_meals_packages";
					$query_run = mysqli_query($con,$query);

					while($row = mysqli_fetch_array($query_run))
					{
			?>
						<tr>
							<td><?php echo $row['Package_ID'] ?></td>
							<td><?php echo $row['Package_Name'] ?></td>
							<td><?php echo $row['Meal1'] ?></td>
							<td><?php echo '<img src="data:image;base64, '.base64_encode($row['Meal1_Image']).'" alt="Image" style="width: 100px; height: 60px" >' ?></td>
							<td><?php echo $row['Meal2'] ?></td>
							<td><?php echo '<img src="data:image;base64, '.base64_encode($row['Meal2_Image']).'" alt="Image" style="width: 100px; height: 60px" >' ?></td>
							<td><?php echo $row['Meal3'] ?></td>
							<td><?php echo '<img src="data:image;base64, '.base64_encode($row['Meal3_Image']).'" alt="Image" style="width: 100px; height: 60px" >' ?></td>
							<td><?php echo $row['Meal4'] ?></td>
							<td><?php echo '<img src="data:image;base64, '.base64_encode($row['Meal4_Image']).'" alt="Image" style="width: 100px; height: 60px" >' ?></td>
							<td><?php echo $row['Meal5'] ?></td>
							<td><?php echo '<img src="data:image;base64, '.base64_encode($row['Meal5_Image']).'" alt="Image" style="width: 100px; height: 60px" >' ?></td>
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
<?php 
if (isset($_POST['update'])) {
	
	$mealpackid=$_POST['mealpackid'];  
    $mealpackname=$_POST['mealpackname'];
	$meal1=$_POST['meal1'];
    $meal1image = addslashes(file_get_contents($_FILES["meal1image"]["tmp_name"]));
	$meal2=$_POST['meal2'];
    $meal2image = addslashes(file_get_contents($_FILES["meal2image"]["tmp_name"]));
	$meal3=$_POST['meal3'];
    $meal3image = addslashes(file_get_contents($_FILES["meal3image"]["tmp_name"]));
	$meal4=$_POST['meal4'];
    $meal4image = addslashes(file_get_contents($_FILES["meal4image"]["tmp_name"]));
	$meal5=$_POST['meal5'];
    $meal5image = addslashes(file_get_contents($_FILES["meal5image"]["tmp_name"]));
    $price=$_POST['price'];

	if($meal1image=="" && $meal2image=="" && $meal3image=="" && $meal4image=="" && $meal5image=="")
	{
		$query = "UPDATE events_meals_packages SET Package_ID='$mealpackid',Package_Name='$mealpackname', Meal1='$meal1', Meal2='$meal2', Meal3='$meal3', Meal4='$meal4', Meal5='$meal5', Price='$price' where Package_ID='$_POST[mealpackid]'";
		$query_run = mysqli_query($con, $query);

		if ($query_run) {
			echo "<script>
			alert('Meal Package Has been Updated');
			window.location.href='SupervisorManageMealPackages.php';
			</script>";
		} else {
			echo '<script> alert("MealPackage Not Updated") </script>';
		}
	}
	else{
		$query = "UPDATE events_meals_packages SET Package_ID='$mealpackid',Package_Name='$mealpackname', Meal1='$meal1', Meal1_Image='$meal1image', Meal2='$meal2', Meal2_Image='$meal2image', Meal3='$meal3', Meal3_Image='$meal3image', Meal4='$meal4', Meal4_Image='$meal4image', Meal5='$meal5', Meal5_Image='$meal5image', Price='$price' where Package_ID='$_POST[mealpackid]'";
		$query_run = mysqli_query($con, $query);

		if ($query_run) {
			echo "<script>
			alert('Meal Package Has been Updated');
			window.location.href='SupervisorManageMealPackages.php';
			</script>";
		} else {
			echo '<script> alert("MealPackage Not Updated") </script>';
		}
	}
}



// Delete
if (isset($_POST['delete'])) {
	$mealpackname = $_POST['mealpackname'];
	$meal1=$_POST['meal1'];
	$meal1image = addslashes(file_get_contents($_FILES["meal1image"]["tmp_name"]));
	$meal2=$_POST['meal2'];
	$meal2image = addslashes(file_get_contents($_FILES["meal2image"]["tmp_name"]));
	$meal3=$_POST['meal3'];
	$meal3image = addslashes(file_get_contents($_FILES["meal3image"]["tmp_name"]));
	$meal4=$_POST['meal4'];
	$meal4image = addslashes(file_get_contents($_FILES["meal4image"]["tmp_name"]));
	$meal5=$_POST['meal5'];
	$meal5image = addslashes(file_get_contents($_FILES["meal5image"]["tmp_name"]));
	$price = $_POST['price'];

	$delete_query = "DELETE from events_meals_packages where Package_ID='$_POST[mealpackid]'";
	$delete_run = mysqli_query($con, $delete_query);

	if ($delete_run) {
		echo "<script>
		alert('Food Package Has been Deleted');
		window.location.href='SupervisorManageMealPackages.php';
		</script>";
	} else {
		echo '<script> alert("Food Package Not Deleted") </script>';
	}
}

