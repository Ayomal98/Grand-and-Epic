<!-- Add new content-->
<?php include("../../config/connection.php");
if(isset($_POST['insert'])){

    $Content_ID=$_POST['Content_ID'];  
    $Heading=$_POST['Heading'];
    $Content=$_POST['Content'];
    $img_url = addslashes(file_get_contents($_FILES["contentimage"]["tmp_name"]));


      $query = "INSERT INTO content(Content_ID,Heading, Content, Img_url) VALUES ('".$Content_ID."','".$Heading."','".$Content."','".$contentimage."')";
      $query_run = mysqli_query($con,$query);

      if ($query_run) {
        echo "<script>
        alert('New content is added');
        window.location.href='SupervisorManageMeals.php';
        </script>";
      }else {
        echo "<script>
        alert('Content addition is not successful. Please try again');
        window.location.href='SupervisorManageMeals.php';
        </script>";
      }
    
    
}
?> 