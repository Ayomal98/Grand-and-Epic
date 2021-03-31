<?php
include("../../public/includes/session.php");
include('../../config/vendor/autoload.php');

checkSession();
if (!isset($_SESSION['First_Name'])) {
  header('Location:../Hotel_Website/index.php');
}

?>
<?php
include('../../config/vendor/autoload.php');

include("../../config/connection.php");
if (isset($_POST['print'])) {
  $html = '';
  $mpdf = new \Mpdf\Mpdf();
  $mpdf->WriteHTML($html);
  $mpdf->Output("mystats.pdf", 'D');
}
?>
<!DOCTYPE html>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>

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
  <!-- 
  <form action="stats-generator.php" method="POST" style="margin-left: 1300px;">
    <input type="submit" class="button" name="print" value="print" style="padding:10px;border-radius:5px;boder:none">
  </form> -->
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
  $selectNoSuite = mysqli_query($con, "SELECT * FROM stayingin_booking WHERE Room_Type='Suite Rooms'");
  $selectNoSuperior = mysqli_query($con, "SELECT * FROM stayingin_booking WHERE Room_Type='Superior Rooms'");
  $selectNoPanaromic = mysqli_query($con, "SELECT * FROM stayingin_booking WHERE Room_Type='Panaromic Rooms'");

  $selectFullBoard = mysqli_query($con, "SELECT * FROM stayingin_booking WHERE Reservation_Type='Full-Board'");
  $selectHalfBoard = mysqli_query($con, "SELECT * FROM stayingin_booking WHERE Reservation_Type='Half-Board'");
  $selectRoomOnly = mysqli_query($con, "SELECT * FROM stayingin_booking WHERE Reservation_Type='Room Only'");
  $selectRoomBreakfast = mysqli_query($con, "SELECT * FROM stayingin_booking WHERE Reservation_Type='Room & Breakfast'");


  $selectWeddings = mysqli_query($con, "SELECT * FROM events_booking WHERE Event_Type='Wedding'");
  $selectParties = mysqli_query($con, "SELECT * FROM events_booking WHERE Event_Type='Party'");



  $countSuperior = 0;
  $countSuite = 0;
  $countPanaromic = 0;
  $countFullBoard = 0;
  $countHalfBoard = 0;
  $countRoomOnly = 0;
  $countRoomBreakfast = 0;
  $countWeddings = 0;
  $countParties = 0;
  while ($row = mysqli_fetch_assoc($selectNoSuite)) {
    $countSuite++;
  }
  while ($row = mysqli_fetch_assoc($selectNoSuperior)) {
    $countSuperior++;
  }
  while ($row = mysqli_fetch_assoc($selectNoPanaromic)) {
    $countPanaromic++;
  }
  while ($row = mysqli_fetch_assoc($selectFullBoard)) {
    $countFullBoard++;
  }
  while ($row = mysqli_fetch_assoc($selectHalfBoard)) {
    $countHalfBoard++;
  }
  while ($row = mysqli_fetch_assoc($selectRoomOnly)) {
    $countRoomOnly++;
  }
  while ($row = mysqli_fetch_assoc($selectRoomBreakfast)) {
    $countRoomBreakfast++;
  }
  while ($row = mysqli_fetch_assoc($selectWeddings)) {
    $countWeddings++;
  }
  while ($row = mysqli_fetch_assoc($selectParties)) {
    $countParties++;
  }
  $Room_Type = array("Suite-Room", "Panaromic-Room", "Superior-Room");
  $NoRooms = array($countSuite, $countPanaromic, $countSuperior);
  $Reservation_Type = array("Full-Board", "Half-Board", "Room Only", "Room & Breakfast");
  $No_reservation = array($countFullBoard, $countHalfBoard, $countRoomOnly, $countRoomBreakfast);
  $Event_Type = array("Wedding", "Parties");
  $No_reservation_evnets = array($countWeddings, $countParties);

  // if (mysqli_num_rows($select) > 0) {
  //   while ($row = mysqli_fetch_assoc($select)) {
  //     if ($row['Meal_Selection'] == 'Set-Menu') {
  //       $count++;
  //       array_push($NoRooms, $count);
  //     } else if ($row['Meal_Selection'] == 'Customized') {
  //       $count1++;
  //       array_push($NoRooms, $count1);
  //     } //pushing the values to the array
  //   }
  // }
  $data = json_encode($Room_Type); //encode the value into json format
  $dataCount = json_encode($NoRooms); //encode the value into json format

  $data1 = json_encode($Reservation_Type); //encode the value into json format
  $dataCount1 = json_encode($No_reservation); //encode the value into json format

  $data2 = json_encode($Event_Type); //encode the value into json format
  $dataCount2 = json_encode($No_reservation_evnets); //encode the value into json format

  ?>


  <div class="chart-container" id="1" style="position:absolute;top:300px; height:120px; width:540px;left:10px">
    <h2 style="color:white" align="center" style="text-align:center">Staying-In Boooking- Room Type Analyis</h2>
    <canvas id="myChart-1"></canvas>
  </div>




  <div class="chart-container" id="2" style="position:absolute;top:300px;margin-left:800px; height:120px; width:540px;right:200px">
    <h2 style="color:white" align="center" style="text-align:center">Staying-In Booking- Reservation Type Analyis</h2>
    <canvas id="myChart-2"></canvas>
  </div>

  <div class="chart-container" id="3" style="position:absolute;top:700px;margin-left:450px; height:120px; width:540px;left:10px">
    <h2 style="color:white" align="center" style="text-align:center">Overall Events Boooking</h2>
    <canvas id="myChart-3"></canvas>
  </div>

  <!--script for #mychart-1-->
  <script>
    let myChart = document.getElementById('myChart-1').getContext('2d');
    let massChart = new Chart(myChart, {

      type: 'pie',
      data: {
        labels: <?php echo $data ?>,

        datasets: [{
          data: <?php echo $dataCount ?>,
          backgroundColor: [
            '#82E0AA',
            '#A569BD',
            '#F9E79F',
          ],

        }]


      },


    })
  </script>

  <!--script for #mychart-2-->
  <script>
    let myChart1 = document.getElementById('myChart-2').getContext('2d');
    let massChart1 = new Chart(myChart1, {

      type: 'pie',
      data: {
        labels: <?php echo $data1 ?>,

        datasets: [{
          data: <?php echo $dataCount1 ?>,
          backgroundColor: [
            '#FF6384',
            '#36A2EB',
            '#CACABF',
            '#A6B22B',
          ],


        }]


      },


    })
  </script>

  <!--script for #mychart-3-->
  <script>
    let myChart2 = document.getElementById('myChart-3').getContext('2d');
    let massChart2 = new Chart(myChart2, {

      type: 'pie',
      data: {
        labels: <?php echo $data2 ?>,

        datasets: [{
          data: <?php echo $dataCount2 ?>,
          backgroundColor: [
            '#F1948A ',
            '#36A2EB',
          ],


        }]


      },


    })
  </script>





  <button style="position:absolute;top:37%;right:20%;color:white;background-color:purple;border:none;padding:5px 15px;border-radius:10px;width:15%;cursor:pointer" onclick="window.location.href='AdminViewStats.php'">
    << Back </button>


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