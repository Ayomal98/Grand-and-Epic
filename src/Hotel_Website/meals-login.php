<!-- This page consists for meals(set menu for the logged in customers) -->
<?php
include("../../public/includes/session.php");
checkSession();
if (!isset($_SESSION['First_Name'])) {
  header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grand & Epic Hotel</title>
  <link rel="stylesheet" href="../../public/css/style.css">
  <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="header-container" id="header-container">
    <?php include("../../public/includes/sticky-nav-login.php"); ?>

    <?php include("../../public/includes/side-nav-login.php"); ?>
    <span class="fa fa-user" style="position:absolute;top:20px;right:40px;font-size:60px;color:white"><span class="far fa-caret-square-down" style="font-size:20px;margin-left:10px;" onclick="funcUserDetails()"></span></span>
    <div id="user-detail-container">
      <span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
      <p style="margin-bottom: 10px;"><?php echo "Logged in as " . $_SESSION['First_Name']; ?></P>
      <hr style="color:teal">
      <a href="logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:5px;margin-left:85px;padding:5px;background-color:black;color:white;border-radius:5px;"></a>

    </div>
    <div class="text-container">
      <span class="text1">Grand &</span>
      <span class="text2">Epic
      </span>
    </div>
  </div>
  <!-- set menu shower container -->
  <div class="body-container set-menu" id="body-container-set-menu">

    <h1 style="text-align: center;font-size:40px;margin-top:-10px;padding:20px;">Set Menu For Staying-In </h1>
    <p style="text-align: center;font-size:20px;">This menu is for the staying in customers which will be sufficient for one person only</p>
    <div class="set-menu-breakfast-area">
      <?php
      include('../../config/connection.php');
      $setMenuBF = "SELECT * FROM stayingin_setmenu WHERE Meal_Type='Breakfast'";
      $result = mysqli_query($con, $setMenuBF);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">' . $row["Meal_Type"] . ' Menu</h3>
                              <div class="set-menu-meals-card">
                                <div class="set-menu-card-img"><img src="data:image;base64, ' . base64_encode($row["Meal1_Image"]) . '" style="border-radius:10px 10px 0px 0px;height:180px;width:100%"></div>
                                <div class="set-menu-card-text-meals-page">' . $row["Meal1"] . '</div>
                              </div>
                              <div class="set-menu-meals-card">
                                <div class="set-menu-card-img"><img src="data:image;base64, ' . base64_encode($row["Meal2_Image"]) . '" style="border-radius:10px 10px 0px 0px;height:180px;width:100%"></div>
                                <div class="set-menu-card-text-meals-page">' . $row["Meal2"] . '</div>
                              </div>
                              <div class="set-menu-meals-card">
                                <div class="set-menu-card-img"><img src="data:image;base64, ' . base64_encode($row["Meal3_Image"]) . '" style="border-radius:10px 10px 0px 0px;height:180px;width:100%"></div>
                                <div class="set-menu-card-text-meals-page">' . $row["Meal3"] . '</div>
                              </div>
                              <div class="set-menu-meals-card">
                                <div class="set-menu-card-img"><img src="data:image;base64, ' . base64_encode($row["Meal4_Image"]) . '" style="border-radius:10px 10px 0px 0px;height:180px;width:100%"></div>
                                <div class="set-menu-card-text-meals-page">' . $row["Meal4"] . '</div>
                              </div>
                              <div class="set-menu-meals-card">
                                <div class="set-menu-card-img"><img src="data:image;base64, ' . base64_encode($row["Meal5_Image"]) . '" style="border-radius:10px 10px 0px 0px;height:180px;width:100%"></div>
                                <div class="set-menu-card-text-meals-page">' . $row["Meal5"] . '</div>
                              </div>
                              <div class="amount-set-menu" style="position: absolute;top:200%;right:20%"><span> Whole Plate For Rs.' . $row["Price"] . '/=</span></div>
                              ';
        }
      }

      ?>
    </div>

    <div class="set-menu-lunch-area">
      <?php
      include('../../config/connection.php');
      $setMenuBF = "SELECT * FROM stayingin_setmenu WHERE Meal_Type='Lunch'";
      $result = mysqli_query($con, $setMenuBF);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">' . $row["Meal_Type"] . ' Menu</h3>
                              <div class="set-menu-meals-card">
                                <div class="set-menu-card-img"><img src="data:image;base64, ' . base64_encode($row["Meal1_Image"]) . '" style="border-radius:10px 10px 0px 0px;height:180px;width:100%"></div>
                                <div class="set-menu-card-text-meals-page">' . $row["Meal1"] . '</div>
                              </div>
                              <div class="set-menu-meals-card">
                                <div class="set-menu-card-img"><img src="data:image;base64, ' . base64_encode($row["Meal2_Image"]) . '" style="border-radius:10px 10px 0px 0px;height:180px;width:100%"></div>
                                <div class="set-menu-card-text-meals-page">' . $row["Meal2"] . '</div>
                              </div>
                              <div class="set-menu-meals-card">
                                <div class="set-menu-card-img"><img src="data:image;base64, ' . base64_encode($row["Meal3_Image"]) . '" style="border-radius:10px 10px 0px 0px;height:180px;width:100%"></div>
                                <div class="set-menu-card-text-meals-page">' . $row["Meal3"] . '</div>
                              </div>
                              <div class="set-menu-meals-card">
                                <div class="set-menu-card-img"><img src="data:image;base64, ' . base64_encode($row["Meal4_Image"]) . '" style="border-radius:10px 10px 0px 0px;height:180px;width:100%"></div>
                                <div class="set-menu-card-text-meals-page">' . $row["Meal4"] . '</div>
                              </div>
                              <div class="set-menu-meals-card">
                                <div class="set-menu-card-img"><img src="data:image;base64, ' . base64_encode($row["Meal5_Image"]) . '" style="border-radius:10px 10px 0px 0px;height:180px;width:100%"></div>
                                <div class="set-menu-card-text-meals-page">' . $row["Meal5"] . '</div>
                              </div>
                              <div class="amount-set-menu" style="position: absolute;top:260%;right:20%"><span> Whole Plate For Rs.' . $row["Price"] . '/=</span></div>
                              ';
        }
      }

      ?>
    </div>
    <div class="set-menu-dinner-area">
      <?php
      include('../../config/connection.php');
      $setMenuBF = "SELECT * FROM stayingin_setmenu WHERE Meal_Type='Dinner'";
      $result = mysqli_query($con, $setMenuBF);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">' . $row["Meal_Type"] . ' Menu</h3>
                              <div class="set-menu-meals-card">
                                <div class="set-menu-card-img"><img src="data:image;base64, ' . base64_encode($row["Meal1_Image"]) . '" style="border-radius:10px 10px 0px 0px;height:180px;width:100%"></div>
                                <div class="set-menu-card-text-meals-page">' . $row["Meal1"] . '</div>
                              </div>
                              <div class="set-menu-meals-card">
                                <div class="set-menu-card-img"><img src="data:image;base64, ' . base64_encode($row["Meal2_Image"]) . '" style="border-radius:10px 10px 0px 0px;height:180px;width:100%"></div>
                                <div class="set-menu-card-text-meals-page">' . $row["Meal2"] . '</div>
                              </div>
                              <div class="set-menu-meals-card">
                                <div class="set-menu-card-img"><img src="data:image;base64, ' . base64_encode($row["Meal3_Image"]) . '" style="border-radius:10px 10px 0px 0px;height:180px;width:100%"></div>
                                <div class="set-menu-card-text-meals-page">' . $row["Meal3"] . '</div>
                              </div>
                              <div class="set-menu-meals-card">
                                <div class="set-menu-card-img"><img src="data:image;base64, ' . base64_encode($row["Meal4_Image"]) . '" style="border-radius:10px 10px 0px 0px;height:180px;width:100%"></div>
                                <div class="set-menu-card-text-meals-page">' . $row["Meal4"] . '</div>
                              </div>
                              <div class="set-menu-meals-card">
                                <div class="set-menu-card-img"><img src="data:image;base64, ' . base64_encode($row["Meal5_Image"]) . '" style="border-radius:10px 10px 0px 0px;height:180px;width:100%"></div>
                                <div class="set-menu-card-text-meals-page">' . $row["Meal5"] . '</div>
                              </div>
                              <div class="amount-set-menu" style="position: absolute;top:325%;right:20%"><span> Whole Plate For Rs.' . $row["Price"] . '/=</span></div>
                              
                              ';
        }
      }

      ?>
    </div>

  </div>

  <?php include("../../public/includes/footer-footer.php"); ?>
  <script src="../../public/Javascript/script.js"></script>
  <script src="../../public/Javascript/sticky-nav.js"></script>
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