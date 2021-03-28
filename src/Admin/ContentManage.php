<!-- Add new content-->
<?php
include("../../config/connection.php");
if (isset($_POST['ADD'])) {
	$Heading = $_POST['Heading'];
	$Content = $_POST['Content'];
	$Img_url = addslashes(file_get_contents($_FILES["contentimage"]["tmp_name"]));

	$sql = "INSERT into content (Heading,Content,Img_url) VALUES (' $Heading ',' $Content','" . $Img_url . "')";

	$query_run = mysqli_query($con, $sql);

	if ($query_run) {
		echo "<script>
		alert('Post is successfully added');
		window.location.href='AdminManageContent.php';
        </script>";
	} else {
		echo "<script> alert('Promotion adding is not successful. please try again') ;
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
              $contentimage = addslashes(file_get_contents($_FILES["contentimage"]["tmp_name"]));
              if($contentimage=="")
              {
                $query = "UPDATE content SET Content_ID='$Content_ID',Heading='$Heading',Content='$Content' where Content_ID='$_POST[Content_ID]'";
                $query_run = mysqli_query($con, $query);
            
                if ($query_run) {
                  echo "<script>
                  alert('Content Has been Updated');
                  window.location.href='AdminManageContent.php';
                  </script>";
                } else {
                  echo '<script> alert("Data Not Updated") </script>';
                }
              }
              else{
                $query = "UPDATE content SET Content_ID='$Content_ID',Heading='$Heading',Content='$Content',Img_url='$Img_url' where Content_ID='$_POST[Content_Id]'";
                $query_run = mysqli_query($con, $query);
            
                if ($query_run) {
                  echo "<script>
                  alert('Content Has been Updated');
                  window.location.href='AdminManageContent.php';
                  </script>";
                } else {
                  echo '<script> alert("Data Not Updated") </script>';
                }
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