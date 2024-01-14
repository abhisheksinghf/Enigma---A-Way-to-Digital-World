 <!---------------- Session starts form here ----------------------->
 <?php  
	session_start();
	if (!$_SESSION["LoginTeacher"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>

<?php
	$_SESSION["LoginAdmin"]="";
	$teacher_email=$_SESSION['LoginTeacher'];
	$query1="select * from teacher_information where email='$teacher_email'";
	$run1=$run=mysqli_query($con,$query1);
	while($row=mysqli_fetch_array($run1)) {
		$teacher_id=$row["teacher_id"];
	}
	$_SESSION['teacher_id']=$teacher_id;
?>


<html lang="en">
	<head>
		<title>Teacher - Dashboard</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/teacher-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 main-background mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Welcome <?php $teacher_id=$_SESSION['LoginTeacher'];
					$query="select * from teacher_information where email='$teacher_email'";
					$run=mysqli_query($con,$query);
					while ($row=mysqli_fetch_array($run)) {
						echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'];
						$teacher_id = $row['teacher_id'];
					}
					?></h4>
				</div>
				<?php  
					$query1 = "SELECT profile_image from teacher_information where teacher_id='$teacher_id' ";
					$run1=mysqli_query($con,$query1);
					
					while ($row=mysqli_fetch_array($run1)) {
					$profile_image = $row['profile_image'];
					// echo '<img class="ml-5 mb-5 h-100 w-100 rounded-circle" src="../Admin/images/$profile_image">';
				}
				?>
					<!-- echo $profile_image; -->
					<div class="row pt-5">
						<div class="col-md-4">
							<img class="ml-5 mb-5" id="display-image" src=<?php echo "../Admin/images/$profile_image"  ?>>
						</div>
							<div class="col-md-4 border border-primary bg-warning h-100" style="margin-left: 85px;">
								<?php
									$query = "SELECT first_name,middle_name,last_name,teacher_id,qualification,status from teacher_information where teacher_id='$teacher_id'";
									$run = mysqli_query($con,$query);
									
									while($row=mysqli_fetch_array($run)) {
									echo $row['first_name']." ".$row['middle_name']." ".$row['last_name']."<br>";
									echo $row['teacher_id']."<br>";
									echo $row['qualification']."<br>";
									echo $row['status']." sem<br>";
									echo "Government Polytechnic Gadag<br>";
									}
									
								?>
							</div>
						</div>
				<div class="bg-primary text-center h4 text-uppercase text-white">
					<p><marquee>Latest Updates</marquee></p>
				</div>
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements table-three-tr" cellpadding="3">
								<tr class="table-tr-head table-three text-white text-center">
									<th>Announced on</th>
									<th>Notice Subject</th>
									<th>Description</th>
								</tr>
								<?php 
								$query="SELECT * FROM `notice_board` order by Date desc";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
									<tr class="text-center">
										<td><?php echo $row['Date'] ?></td>
										<td><?php echo $row['Subject']?></td>
										<td><?php echo $row['Description'] ?></td>		
									</tr>
								<?php }
								?>
                            </table>
                        </section>
                    </div>
                </div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>