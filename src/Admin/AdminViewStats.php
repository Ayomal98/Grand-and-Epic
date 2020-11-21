<?php
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['User_Email'];
?>
<html>

<head>
	<link rel="stylesheet" href="../../public/css/employee.css">
	
	<title>
		Admin Manage Co-admins
	</title>
	<style>
		body{
			height : 1500px;
		}
		</style>
	<script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body bgcolor="black" >
	
	<center>
		<img src="../../public/images/Logo.png" width="20%">
		<span class="far fa-caret-square-down" style="color:white;font-size:30px;position:absolute;right:0px;top:20px;" onclick="funcUserDetails()"></span>
		<div id="user-detail-container">
			<span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
			<p style="margin-top: 2px; color:black"><?php echo "Logged in as $username"; ?></P>
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
					<img src="../../public/images/Uvini.png" height="25%">
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
  <table style="position:absolute; top : 350px; left:0px;">
    <tr>
      <th>
        <p style="font-family :Lato; font-size:20px; color :blue;">Bookings Overview of the Year</p>
      </th>
    </tr>
    <tr>
      <td align="center">
        <img src="../../public/images/chart5.png" height="70%">
      </td>
    </tr>
  </table>
  <script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = x.length
      }
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      x[slideIndex - 1].style.display = "block";
    }
  </script>
  </div>

  <table style="position:absolute; top : 350px; left:850px;">
    <tr>
      <th>
        <p style="font-family :Lato; font-size:20px; color :blue;">Bookings on Rooms-current month</p>
      </th>
    </tr>
    <tr>
      <td align="center">
        <img src="../../public/images/chart2.png" height="70%">
      </td>
    </tr>
  </table>
  <script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = x.length
      }
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      x[slideIndex - 1].style.display = "block";
    }
  </script>
  </div>
  <script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = x.length
      }
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      x[slideIndex - 1].style.display = "block";
    }
  </script>
  </div>

  <table style="position:absolute; top : 800px; left:850px;">
    <tr>
      <th>
        <p style="font-family :Lato; font-size:20px; color :blue;">General Reservations</p>
      </th>
    </tr>
    <tr>
      <td align="center">
        <img src="../../public/images/chart3.png" height="70%">
      </td>
    </tr>
  </table>
  <script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = x.length
      }
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      x[slideIndex - 1].style.display = "block";
    }
  </script>
  </div>

  <table style="position:absolute; top : 800px; left:850px;">
    <tr>
      <th>
        <p style="font-family :Lato; font-size:20px; color :blue;">General Reservations</p>
      </th>
    </tr>
    <tr>
      <td align="center">
        <img src="../../public/images/chart3.png" height="70%">
      </td>
    </tr>
  </table>
  <script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = x.length
      }
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      x[slideIndex - 1].style.display = "block";
    }
  </script>
  </div>

  <table style="position:absolute; top : 800px; left:0px;">
    <tr>
      <th>
        <p style="font-family :Lato; font-size:20px; color :blue;">Meal preference</p>
      </th>
    </tr>
    <tr>
      <td align="center">
        <img src="../../public/images/chart4.png" height="70%">
      </td>
    </tr>
  </table>
  <script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = x.length
      }
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      x[slideIndex - 1].style.display = "block";
    }
  </script>
  </div>
  <table style="position:absolute; top :1200px; left:0px;">
    <tr>
      <th>
        <p style="font-family :Lato; font-size:20px; color :blue;">Meal preference - Dine-in</p>
      </th>
    </tr>
    <tr>
      <td align="center">
        <img src="../../public/images/chart6.png" height="70%">
      </td>
    </tr>
  </table>
  <script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = x.length
      }
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      x[slideIndex - 1].style.display = "block";
    }
  </script>
  </div>
  <table style="position:absolute; top :1200px; left:850px;">
    <tr>
      <th>
        <p style="font-family :Lato; font-size:20px; color :blue;">Bookings on Rooms-upcoming month</p>
      </th>
    </tr>
    <tr>
      <td align="center">
        <img src="../../public/images/chart8.png" height="70%">
      </td>
    </tr>
  </table>
  <script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = x.length
      }
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      x[slideIndex - 1].style.display = "block";
    }
  </script>
  </div>

  <div class=button1>
    <p><b>Generte Report</b></p>
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