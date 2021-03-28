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
		Respond Leave Requests
	</title>
	<style>
		body {
			height: 700px;
		}
	</style>
	<script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>



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
    <button class="dropdown-btn">View Stats
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
      <a href="AdminManageContent.php">
        <font size="4 px">Manage Content on web-site</font>
      </a>
      <a href="AdminAddPromotion.php">
        <font size="4 px">Add promotion</font>
      </a>
      <a href="AdminManageCoAdmins.php">
        <font size="4 px">Manage Co-admins(H.M)</font>
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
    <?php include("../../config/connection.php");
$select = mysqli_query($con, "SELECT * FROM rooms");
$Room_Type = array();
$NoRooms = array();
if (mysqli_num_rows($select) > 0) {
    while ($row = mysqli_fetch_assoc($select)) {
        array_push($Room_Type, $row['Room_Type']); //pushing the values to the array
        array_push($NoRooms, (int)$row['NoRooms']);
    }
}
$data = json_encode($Room_Type); //encode the value into json format
$dataCount = json_encode($NoRooms); //encode the value into json format

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Type Summary</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>

</head>

<body bgcolor="black">
<div class="chart-container" style="position:absolute;top:250px; height:1000px; width:1000px">
        <canvas id="myChart"></canvas>
    </div>
    <script>
        let myChart = document.getElementById('myChart').getContext('2d');
        let massChart = new Chart(myChart, {
            type: 'pie',
            data: {
                labels: <?php echo $data ?>,

                datasets: [{
                    label: 'Room Type Summary',
                    data: <?php echo $dataCount ?>,
                    backgroundColor: [
                         '#ff6384',
                         '#1CE4D9',
                         '#3BEC01'
                    ],
                

                }]
               
            },
        

        })
    </script>

<div class="parent-container">
    <h3 class="pdf-name">To Print the results</h3><button type="button" class="open-pdf" 
    data-pdf="source">Click Here</button>
    </div>
    <button class="button1"style="position:absolute;top:57%;right:20%;color:white;background-color:purple;border:none;padding:5px 15px;border-radius:10px;width:15%;cursor:pointer" onclick="window.location.href='AdminViewStats.php'"><< Back </button>
    <script>
function displayEmbeddedPdf (event){
      event.preventDefault();
      let pdfSource = $(this).data("pdf");

      let pdfDisplay=`<embed class="embed-responsive-item embedded-pdf" 
      src="http://localhost/Grand-and-Epic/src/Admin/roomtype.php">`

      $(this).parent().append(pdfDisplay);
    }

    $( document ).ready(function() {
      $(".open-pdf").click(displayEmbeddedPdf) 
    });
    </script>

</body>

</html>