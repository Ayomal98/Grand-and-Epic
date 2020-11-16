<!-- Insert New Meal -->
<?php include("../Templates/connection.php");
if(isset($_POST['insert'])){

    $mealid=$_POST['mealid'];  
    $mealname=$_POST['mealname'];
    $price=$_POST['price'];    
    $mealplan =$_POST['mealplan'];
    $mealtype=$_POST['mealtype'];
    $mealimage = addslashes(file_get_contents($_FILES["mealimage"]["tmp_name"]));

        $query = "INSERT INTO meals(Meals_ID,Meals_Name, Price, Meal_Plan, Meal_Type, Meal_Image) VALUES ('".$mealid."','".$mealname."','".$price."','".$mealplan."','".$mealtype."','".$mealimage."')";
        $query_run = mysqli_query($con,$query);

        if ($query_run) {
            echo "<script>
            alert('New Food item Has been Added');
            window.location.href='SupervisorManageMeals.php';
            </script>";
        } else {
            echo '<script> alert("Data Not Added") </script>';
        }

}

?> 
