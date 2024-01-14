<?php  
session_start();
if (!$_SESSION["LoginLibrary"])
{
	header('location:../login/login.php');
}
	require_once "../connection/connection.php";
?>

<!-- ----------------------assign subjects delete------------------------------------- -->
<?php 
	if (isset($_GET['issue_id'])) {
		$id=$_GET['issue_id'];
		$query5="DELETE FROM `book_issued` WHERE `issue_id`='$id'";
		$run5=mysqli_query($con,$query5);
		if ($run5) {
			echo '<script>alert("Book Returned")</script>';

			header('Location: book-issued.php');
		}
		else{
			echo "Record not deleted";
		}
	}
    else{
        echo "sf";
    }
?>
