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
        window.location.href='AdminManageContent.php';
        </script>";
      }else {
        echo "<script>
        alert('Content addition is not successful. Please try again');
        window.location.href='AdminManageContent.php';
        </script>";
      }
    
    
}
?> 

<!--UPDATE-->
<?php include("../../config/connection.php");
if (isset($_POST['update'])) {
    $Content_ID=$_POST['Content_ID'];
                            $Heading=$_POST['Heading'];
							$Content = $_POST['Content'];
                            $query = "UPDATE content SET Heading='$Heading',Content='$Content' where Content_ID='" . $Content_ID . " '";
							$query_run = mysqli_query($con, $query);
							if ($query_run) {
								echo '<script type="text/javascript">alert("Data updated successfully")</script>';
								echo '<script>window.location.href="AdminManageContent.php"</script>';
							} else {
								echo '<script type="text/javascript">alert("Data update is unsuccessful. Please try again")</script>';
								//echo '<script>window.location.href=AdminAddPromotion.php"</script>';
                            }
                        }
  ?>


<!--DELETE-->
<?php include("../../config/connection.php");
if (isset($_POST['delete'])) {
    $Content_ID=$_POST["Content_ID"];
    $query = "DELETE from content  WHERE Content_ID='" . $Content_ID . " '";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
      echo '<script type="text/javascript">alert("Promotion Delete Successfully")</script>';
      echo '<script>window.location.href="AdminManageContent.php"</script>';
    } else {
      echo '<script type="text/javascript">alert("Data update is unsuccessful. Please try again")</script>';
      // echo '<script>window.location.href=AdminAddPromotion.php"</script>';
    }
  }
?>