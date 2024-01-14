<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginStudent"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">
	<head>
		<title>Student - Results</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Student Result Summary</h4>
				</div>
				<div class="bg-primary text-center h4 text-uppercase text-white">
					<p><marquee>Internal Marks</marquee></p>
				</div>
				<div class="row w-100">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements mb-5 table-three-tr text-center" cellpadding="10">
								<tr class="table-tr-head table-three text-white">
									<th>Declared on</th>
									<th>Register No</th>
									<th>Subject</th>
									<th>Total Marks</th>
									<th>Obtained Marks</th>
								</tr>
								<?php 
								$reg_no = $_SESSION['LoginStudent'];
								$query="select date,register_no,subject,total_marks,obtained_marks from ia_result where register_no='$reg_no'";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
									<tr>
										<td><?php echo $row["date"] ?></td>
										<td><?php echo $row["register_no"]?></td>
										<td><?php echo $row["subject"] ?></td>
										<td><?php echo $row["total_marks"] ?></td>
										<td><?php echo $row["obtained_marks"] ?></td>
										
										
									</tr>
								<?php }
								?>
							</table>				
						</section>
					</div>
				</div>
			</div>
				<div class="bg-primary text-center h4 text-uppercase text-white">
					<p><marquee>Final Exam Marks</marquee></p>
				</div>
				<div class="row w-100">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements mb-5 table-three-tr text-center" cellpadding="10">
								<tr class="table-tr-head table-three text-white">
									<th>Declared on</th>
									<th>Register No</th>
									<?php	
									$query = "SELECT semester FROM `assign_semester` WHERE register_no='$reg_no'";
									$run=mysqli_query($con,$query);
									while($row=mysqli_fetch_array($run)) {
										$sem = $row['semester']; 
									}
									$query = "SELECT * FROM `student_information` WHERE register_no='$reg_no'";
									$run=mysqli_query($con,$query);
									while($row=mysqli_fetch_array($run)) {
										$course = $row['course']; 
									}
									$query = "SELECT subject_name FROM `course_subjects` WHERE semester='$sem' and course_code='$course'";
									$run = mysqli_query($con,$query);
                  					$count = mysqli_num_rows($run);
									// echo $count;
									while($row=mysqli_fetch_array($run)) {
											echo "<th>".$row['subject_name']."</th>";
									}
									?>
									<th>Obtained Marks</th>
								</tr>
								<?php 
								$reg_no = $_SESSION['LoginStudent'];
								$query="select * from exam_result where register_no='$reg_no'";
								$run=mysqli_query($con,$query);
								$count = mysqli_num_rows($run);
								if($count==0)
								{
									echo "<h4 class='text-center bg-success'>Result Not Yeat Announced</h4>";
									echo '<img src="../Teacher/sad.gif" alt="doubt" class="rounded float-right">';                   
									echo '<img src="../Teacher/sad.gif" alt="doubt" class="rounded float-left">';                   

								}
								while($row=mysqli_fetch_array($run)) {?>
									<tr>
										<td><?php echo $row["date"] ?></td>
										<td><?php echo $row["register_no"]?></td>
										<?php
											for ($i=1; $i <= $count; $i++) { 
												// $sum = $row['marks '.$i];
												echo "<td>".$row['marks '.$i]."</td>";
												$sum = $sum + $row['marks '.$i];
											}
										?>
										<td><?php echo $sum ?></td>
										
										
									</tr>
								<?php }
								?>
							</table>				
						</section>
					</div>
				</div>
			</div>	
	</body>
</html>