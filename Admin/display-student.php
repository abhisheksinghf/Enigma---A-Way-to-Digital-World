<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	
	if ($_SESSION["LoginAdmin"])
	{
		$reg_no=$_GET['register_no'] ?? $_SESSION['LoginStudent'];
	}
	else if(!$_SESSION["LoginAdmin"] && $_SESSION['LoginStudent']){
		$reg_no=$_SESSION['LoginStudent'];
	}
	else{ ?>
		<script> alert("Your Are Not Authorize Person For This link");</script>
	<?php
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Student Information</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
	<?php
	$query="select * from student_information where register_no='$reg_no'";
	$run=mysqli_query($con,$query);
	while ($row=mysqli_fetch_array($run)) {
		?>
		<div class="container  mt-1 mb-1" style="background-color: #00DBDE;
background-image: linear-gradient(90deg, #00DBDE 0%, #FC00FF 100%);">
			<div class="row text-white pt-5">
				<div class="col-md-4">
					<?php  $profile_image= $row["profile_image"] ?>
					<img class="ml-5 mb-5" id="display-image" height='290px' width='250px' src=<?php echo "images/$profile_image"  ?> >
				</div>
				<div class="col-md-8">
					<h3 class="ml-5 text-white"><?php echo "⭐".$row['first_name']." ".$row['middle_name']." ".$row['last_name']."⭐" ?></h3><br>
					<h2 class="display-style-">Course : </h5> <?php echo $row['course']  ?><br><br>
					<h2 class="display-style-">Register No : </h5> <?php echo $row['register_no']  ?><br><br>
					<div class="row">
						<div class="col-md-6">
							<h5 class="display-style-">Email:</h5> <?php echo $row['email']  ?><br><br>
							<h5 class="display-style-">Contact:</h5> <?php echo $row['mobile_no']  ?><br><br>
							<h5 class="display-style-">Alternate Contact :</h5> <?php echo $row['mobile_no_2']  ?><br><br>
						</div>
						<div class="col-md-6">
							<h5 class="display-style-">Address:</h5> <?php echo $row['home_address']  ?><br><br>
							<h5 class="display-style-">Native :</h5> <?php echo $row['native_city']  ?><br><br>
							<h5 class="display-style-">Pincode :</h5> <?php echo $row['pincode']  ?><br><br>
						</div>	
					</div>
				</div>
				<hr>
			</div>
			
			<div class="row pt-3 text-white">
				<div class="col-md-4"><h5 class="display-style-">Date of Birth :</h5> <?php echo $row['dob']  ?></div>
				<div class="col-md-4"><h5 class="display-style-">Gender : </h5> <?php echo $row['gender']  ?></div>
				<div class="col-md-4"><h5 class="display-style-">Mother Tongue :</h5> <?php echo $row['mother_tongue']  ?></div>
			</div>
			<div class="row pt-3 text-white">
				<div class="col-md-4"><h5 class="display-style-">Caste:</h5> <?php echo $row['caste']  ?></div>
				<div class="col-md-4"><h5 class="display-style-">Sub-Caste:</h5> <?php echo $row['subcaste']  ?></div>
				<div class="col-md-4"><h5 class="display-style-">Nationality:</h5> <?php echo $row['nationality']  ?></div>
			</div>
			<div class="row pt-3 text-white">
				<div class="col-md-4"><h5 class="display-style-">SSLC Percentage :</h5> <?php echo $row['sslc_percentage']  ?></div>
				<div class="col-md-4"><h5 class="display-style-">SSLC Complition Date:</h5> <?php echo $row['sslc_complition_date']  ?></div>
				<div class="col-md-4"><h5 class="display-style-">SSLC Attempts:</h5> <?php echo $row['sslc_attempt']  ?></div>
			</div>
			<div class="row pt-3 text-white">
				<div class="col-md-4"><h5 class="display-style-">Applicant Status: </h5> <?php echo $row['applicant_status']  ?></div>
				<div class="col-md-4"><h5 class="display-style-">Application Status: </h5> <?php echo $row['application_status']  ?></div>
				<div class="col-md-4"><h5 class="display-style-">Date of Admission: </h5> <?php echo $row['date_of_submission']  ?></div>
			</div>
		</div>
	<?php } ?>
</body>
</html>
