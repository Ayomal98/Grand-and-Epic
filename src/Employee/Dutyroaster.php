<html>

<head>
	<link rel="stylesheet" href="../../public/css/employee.css">
	<title>
		Employee View Customer Feedback
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
			<p style="margin-top: 2px; color:black"><?php echo "Logged in as " . $_SESSION['First_Name']; ?></P>
			<hr style="color:teal">
			<a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
		</div>

	</center>
	<div class="sidenav">
		<button class="dropdown-btn">View Customer Feedback
			<i class="fa fa-caret-down"></i>
		</button>

		<div class="dropdown-container">
			<a href="EmployeeDashboard.php">Dashboard</a>
			<a href="EmployeeLeaveRequest.php">Leave Request</a>
			<a href="EmployeeDutyRoaster.php">View Duty Roaster</a>
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


<table style="color:white;border:1px solid white;margin-left:12%;margin-top:-100px;width: 80%;">
<tr>
    <th>Feedback ID</th>
    <th>Staff Rate</th>
    <th>Staff Feedback</th>

</tr>

<?php
include("../../config/connection.php");
$sql = "SELECT Feedback_ID,Staff_Rate,Feedback_Staff FROM customer_feedback";

$query = mysqli_query($con,$sql);
while($row = mysqli_fetch_assoc($query)){

echo "
    <tr>                  
        <td>".$row['Feedback_ID']."</td>
        <td>".$row['Staff_Rate']."</td>
        <td>".$row['Feedback_Staff']."</td>
      
    </tr>";
    
} 
echo "</table>";
?>
    <table>
    
				<td><?php echo $row["Employee_ID"]; ?></td>
    </table>

<script>
        function funcUserDetails() {
            document.getElementById('user-detail-container').style.display = "block";
        }

        function funcCloseUserDetails() {
            document.getElementById('user-detail-container').style.display = "none";
        }
    </script>
<script>
    var table = document.getElementById('myTable');
                
        for(var i = 2; i < table.rows.length; i++)
        {
            table.rows[i].onclick = function()
            {
                document.getElementById("Feedback_ID").value = this.cells[0].innerHTML;
                document.getElementById("Staff_Rate").value = this.cells[1].innerHTML;
                document.getElementById("Feedback_Staff").value = this.cells[2].innerHTML;
                //document.getElementById("admin_type").value = this.cells[3].innerHTML;
                // document.getElementById("password").value = this.cells[3].innerHTML;
                
            };
        }

</script>
</body>

</html>