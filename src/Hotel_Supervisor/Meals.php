<!-- Insert New Meal -->
<?php include("../../config/connection.php");
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


<!-- Insert New Set Menu -->
<?php include("../../config/connection.php");
if(isset($_POST['insertsm'])){

    $setmenuid=$_POST['setmenuid'];  
	$mealtype=$_POST['mealtype'];
	$meal1=$_POST['meal1'];
	$mealimage1 = addslashes(file_get_contents($_FILES["mealimage1"]["tmp_name"]));
	$meal1=$_POST['meal2'];
	$mealimage2 = addslashes(file_get_contents($_FILES["mealimage2"]["tmp_name"]));
	$meal1=$_POST['meal3'];
	$mealimage3 = addslashes(file_get_contents($_FILES["mealimage3"]["tmp_name"]));
	$meal1=$_POST['meal4'];
	$mealimage4 = addslashes(file_get_contents($_FILES["mealimage4"]["tmp_name"]));
	$meal1=$_POST['meal5'];
	$mealimage5 = addslashes(file_get_contents($_FILES["mealimage5"]["tmp_name"]));
    $price=$_POST['price'];    
    

        $query = "INSERT INTO set_menu(setmenu_id, meal_type, meal_1, mealimage_1, meal_2, mealimage_2, meal_3, mealimage_3, meal_4, mealimage_4, meal_5, mealimage_5, price) VALUES ('".$setmenuid."','".$mealtype."','".$meal1."','".$mealimage1."','".$meal2."','".$mealimage2."','".$meal3."','".$mealimage3."','".$meal4."','".$mealimage4."','".$meal5."','".$mealimage5."','".$price."')";
        $query_run = mysqli_query($con,$query);

        if ($query_run) {
            echo "<script>
            alert('New Set Menu Has been Added');
            window.location.href='SupervisorManageMeals.php';
            </script>";
        } else {
            echo '<script> alert("Set Menu Not Added") </script>';
        }

}

?> 
