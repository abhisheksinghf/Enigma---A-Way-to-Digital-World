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

?>


<!doctype html>
<html lang="en">
	<head>
		<title>Teacher - Attendance</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/teacher-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Student Attendance</h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form action="generate_attendance.php" method="post">
							<div class="row mt-3">
								<div class="col-md-4">
									<div class="form-group" style="z-index: 10;">
										<label>Select Branch:</label>
										<select class="browser-default custom-select" name="course">
											<option >Select Course</option>
											<?php
											$teacher_id=$_SESSION['teacher_id'];
											$query="select distinct(course_code) from courses";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									    <label for="exampleInputEmail1">Select Semester: </label>
									    <select class="browser-default custom-select" name="sem">
										    <option >Select Sem</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Select Subject:</label>
										<select class="browser-default custom-select" name="subject" required="">
											<option >Select Subject</option>
											<?php
											$teacher_id=$_SESSION['teacher_id'];
											$query="select distinct(subject_name) from course_subjects";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['subject_name'].">".$row['subject_name']."</option>";
											}
										?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<input type="submit" name="button" class="btn btn-success" value="Generate Attendance Report">
								</div>
							</div>	
						</form>	
					</div>
				</div>
			</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>

 