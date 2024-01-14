<!---------------- Session starts form here ----------------------->
 <?php  
	session_start();
	if (!$_SESSION["LoginStudent"])
	{
		header('location:../login/login.php');
	}
	if($_SESSION['LoginStudent']){
		$_SESSION['LoginAdmin'] = "";
	}
		require_once "../connection/connection.php";
		
	?>
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">
	<head>
		<title>Student - Dashboard</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Welcome <?php $reg_no=$_SESSION['LoginStudent'];
					$query="select * from student_information where register_no='$reg_no'";
					$run=mysqli_query($con,$query);
					while ($row=mysqli_fetch_array($run)) {
						echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'];
					}
					?></h4>
				</div>
					<?php  
					$query1 = "SELECT profile_image from student_information where register_no='$reg_no' ";
					$run1=mysqli_query($con,$query1);
					
					while ($row=mysqli_fetch_array($run1)) {
					$profile_image = $row['profile_image'];
					}
					?>
					<!-- echo $profile_image; -->
						<div class="row pt-5">
							<div class="col-md-4">
								<img class="ml-5 mb-5" id="display-image" src=<?php echo "../Admin/images/$profile_image"  ?> >
							</div>
							<div class="col-md-4 border border-primary bg-warning h-100" style="margin-left: 85px;">
								<?php
									$register_no = $_SESSION['LoginStudent'];
									$query = "SELECT first_name,middle_name,last_name,short_student_info.register_no,course,semester from short_student_info,assign_semester where short_student_info.register_no = assign_semester.register_no and assign_semester.register_no='$register_no'";
									$run = mysqli_query($con,$query);
									
									while($row=mysqli_fetch_array($run)) {
									echo $row['first_name']." ".$row['middle_name']." ".$row['last_name']."<br>";
									echo $row['register_no']."<br>";
									echo $row['course']."<br>";
									echo $row['semester']." sem<br>";
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