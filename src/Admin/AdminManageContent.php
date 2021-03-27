<?php
include("../../public/includes/session.php");
checkSession();
if (!isset($_SESSION['First_Name'])) {
	header('Location:../Hotel_Website/index.php');
}
?>
<html>

<head>
	<link rel="stylesheet" href="../../public/css/employee.css">

	<title>
		Admin Manage Content
	</title>
	<style>
		body {
			height: 1500px;
		}
	</style>
	<script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body bgcolor="black">

	<center>
		<img src="../../public/images/Logo.png" width="20%">
		<span class="far fa-caret-square-down" style="color:white;font-size:30px;position:absolute;right:0px;top:20px;" onclick="funcUserDetails()"></span>
		<div id="user-detail-container">
			<span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
			<p style="margin-top: 2px; color:black"><?php echo "Logged in as " . $_SESSION['First_Name']; ?></P>
			<hr style="color:teal">
			<a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
		</div>
	</center>
	<div class="sidenav">
		<button class="dropdown-btn">Manage Contents
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-container">
			<a href="AdminDashboard.php">
				<font size="4 px">Dashboard</font>
			</a>
			<a href="AdminRespondToLeaveRequests.php">
				<font size="4px">Respond to Leave Requests</font>
			</a>
			<a href="AdminViewBookings.php">
				<font size="4 px">View Booking Details</font>
			</a>
			<a href="AdminManageCoAdmins.php">
				<font size="4 px">Manage Co-Admins</font>
			</a>
			<a href="AdminAddPromotion.php">
				<font size="4 px">Add promotion</font>
			</a>
			<a href="AdminViewStats.php">
				<font size="4 px">View Stats</font>
			</a>
		</div>
	</div>
	<div class="top-right">
		<table width="100%">
			<tr>
				<td>

				</td>
				<td>
					<img src="../../public/images/Uvini.png" width="60" height="60">
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

	<!--<form action="AdminAddContent.php" method="POST" enctype="multipart/form-data">-->
	<form action="ContentManage.php" method="POST" enctype="multipart/form-data">
		<fieldset style=" position:absolute; top:280px; left:50px; width: 35%;">
			<legend style="color:white; font-size: 30px">Add New Post</legend>
			<table style="width:100%; color:white; border: 1px solid white;">
				<tr>
					<th align="center" style="font-size:20px">Heading</th>

					<td align="center"><textarea name="Heading" rows="2" cols="50" placeholder="Add Heading here:"></textarea></td>
				</tr>
				<tr>
					<th align="center" style="font-size:20px">Content</th>
				
					<td align="center"><textarea name="Content" rows="15" cols="50" placeholder="Add Content here:"></textarea></td>
				</tr>
				<tr>
				<th align="center" style="font-size:20px">Image</th>
					<td align="left"><input type="file" name="contentimage"></td>
				</tr>

				<tr>
					<td></td>
					<td align="left">
						<input type="submit" class="button" name="ADD" value="ADD NEW POST">

						<input type="reset" class="button" value="  RESET " name="reset">
					</td>
				</tr>
			</table>
		</fieldset>
	</form>

<!--VIEW-->
<form action="ContentManage.php" method="POST">
		<fieldset style=" position:absolute; top:280px;left:650px; width: 45%;">
			<legend style="color:white; font-size: 30px">Past Posts</legend>
			<table style="width:100%; color:white; border: 1px solid white;">
	
			<?php include("../../config/connection.php");

$query = "SELECT * FROM content WHERE Content_ID='8'";
$query_run = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($query_run)) {

?>
	<tr><input type="text" name="Content_ID" value="<?php echo $row['Content_ID'] ?>" /></tr>
	<tr><input type="text" name="Heading" value="<?php echo $row['Heading'] ?>" /></tr>
	<tr><input type="text" name="Content" value="<?php echo $row['Content'] ?>" /></tr>
			
<?php
}
?>
				
					<!--<td align="left">
					<?php
					/*include("../../config/connection.php");

					$next = mysqli_query($mysqli, "SELECT * FROM content WHERE Content_ID>$Content_ID order by Content_ID ASC");
					if($row = mysqli_fetch_array($next))
					{
					  echo '<a href="AdminManageContent.php"?Content_ID='.$row['Content_ID'].'"><button class="button" style="padding:5px 20px; border-radius:50%">&laquo;</a>';
					} 
					
					?>
						<!--<a href="#" class="button" style="padding:5px 20px; border-radius:50%">&laquo;</a>-->
						<a href="#" class="button" style="padding:5px 20px; border-radius:50%">&raquo;</a>
					</td>*/
					?>-->

					<form action="ContentManage.php" method="POST">
					<td align="right">
					<input type="submit" class="button" name="update" value="UPDATE">
						</td>

						<form action="ContentManage.php" method="POST">
					<td align="right">
					<input type="submit" class="button" name="delete" value="DELETE POST">
						
						</td>
						
		
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
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