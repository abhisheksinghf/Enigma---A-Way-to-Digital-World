<!---------------- Session starts form here ----------------------->
<?php  
	session_start();

	if ($_SESSION["LoginAdmin"] && !$_SESSION['LoginTeacher'])
	{
		$teacher_id=$_GET['teacher_id'];
	}
	else if(!$_SESSION["LoginAdmin"] && $_SESSION['LoginTeacher']){
		$teacher_email=$_SESSION['LoginTeacher'];
		$teacher_id="";
	}
	else{ ?>
		<script> alert("Your Are Not Autorize Person For This link");</script>
	<?php
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";
?>
<!---------------- Session starts form here ----------------------->

<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Teacher Information</title>
	</head>
	<style>
		h5{
			color:#370648;
		}
	</style>
	<body>
		<?php include('../common/common-header.php') ?>
	<?php
		if($teacher_id){
			$query="select * from teacher_information where teacher_id='$teacher_id'";
		}
		else{
			$query="select * from teacher_information where email='$teacher_email'";
		}
		
		$run=mysqli_query($con,$query);
		while ($row=mysqli_fetch_array($run)) {
	?>
		<div class="container  mt-1" style="background-color: #00DBDE;
background-image: linear-gradient(90deg, #00DBDE 0%, #FC00FF 100%);">
			<div class="row text-white pt-5">
				<div class="col-md-4">
					<?php  $profile_image= $row["profile_image"] ?>
					<img class="ml-5 mb-5" id="display-image" height='270px' width='250px' src=<?php echo "images/$profile_image"  ?> >
				</div>
				
				<div class="col-md-8">
					<h3 class="ml-5 text-white"><?php echo "⭐".$row['first_name']." ".$row['middle_name']." ".$row['last_name']."⭐" ?></h3><br>
					<h5 class="display-style-">ID : </h5> <?php echo $row['teacher_id']  ?><br><br>

					<div class="row">
						<div class="col-md-6">
							<h5 class="display-style-">Email:</h5> <?php echo $row['email']  ?><br><br>
							<h5 class="display-style-">Contact:</h5> <?php echo $row['mobile_no']  ?><br><br>
							<h5 class="display-style-">Alternate Contact:</h5> <?php echo $row['alternate_mobile_no']  ?><br><br>
						</div>
						<div class="col-md-6">
							<h5 class="display-style-">Date of Birth:</h5> <?php echo $row['date_of_birth']  ?><br><br>
							<h5 class="display-style-">Gender:</h5> <?php echo $row['gender']  ?><br><br>
							<h5 class="display-style-">Address:</h5> <?php echo $row['address']  ?><br><br>
						</div>		
					</div>
				</div>
				<hr>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5 class="display-style-">Native City:</h5> <?php echo $row['city']  ?></div>
				<div class="col-md-4"><h5 class="display-style-">Qualification:</h5> <?php echo $row['qualification']  ?></div>
				<div class="col-md-4"><h5 class="display-style-">Teaching Experience:</h5> <?php echo $row['experience']  ?> Years</div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5 class="display-style-">Status :</h5> <?php echo $row['status']  ?></div>
				<div class="col-md-4"><h5 class="display-style-">Hire Date :</h5> <?php echo $row['hire_date']  ?></div>
			</div>
		</div>
	<?php } ?>
</body>
</html>
