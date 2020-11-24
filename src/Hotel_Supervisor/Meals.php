<!-- Insert New Meal -->
<?php include("../../config/connection.php");
include("../../public/includes/session.php");
if(isset($_POST['insert'])){

    $mealid=$_POST['mealid'];  
    $mealname=$_POST['mealname'];
    $price=$_POST['price'];    
    $mealplan =$_POST['mealplan'];
    $mealimage = addslashes(file_get_contents($_FILES["mealimage"]["tmp_name"]));

    if($mealplan=="Staying-in"){
    $mealtype=$_POST['mealtype'];

      $query = "INSERT INTO meals(Meals_ID,Meals_Name, Price, Meal_Plan, Meal_Type, Meal_Image) VALUES ('".$mealid."','".$mealname."','".$price."','".$mealplan."','".$mealtype."','".$mealimage."')";
      $query_run = mysqli_query($con,$query);

      if ($query_run) {
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

    }else{
      $mealtype="None";
      $query = "INSERT INTO meals(Meals_ID,Meals_Name, Price, Meal_Plan, Meal_Type, Meal_Image) VALUES ('".$mealid."','".$mealname."','".$price."','".$mealplan."','".$mealtype."','".$mealimage."')";
      $query_run = mysqli_query($con,$query);

      if ($query_run) {
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
    
    
}
?> 
