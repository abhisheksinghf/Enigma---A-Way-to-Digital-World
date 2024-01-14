 <!---------------- Session starts form here ----------------------->
 <?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>

	<!-- php starts here -->
	<?php

	if(isset($_POST['btn_submit']))
	{
		$teacher_id = $_POST['teacher_id'];

		$course = $_POST['course'];

		$semester = $_POST['semester'];

		$subject = $_POST['subject'];

		$query = "INSERT INTO `assign_subjects`(`teacher_id`, `course`, `semester`, `subject`) VALUES ('$teacher_id','$course','$semester','$subject')";

		$run = mysqli_query($con,$query);
	}
	?>
<!---------------- Session Ends form here ------------------------>
<title>Admin - Assign Subjects</title>
	<?php include('../common/common-header.php') ?>
	<?php include('../common/admin-sidebar.php') ?>  
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100 page-content-index">
			<div class="flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<h4>Assign Subjects</h4>
			</div>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg1">Assign Subjects</button>
			<div class="row">
				<div class="col-md-3 offset-9 pt-5 mb-2">
					<!-- Large modal -->
					<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header bg-info-header text-white">
									<h4 class="modal-title text-center">Assign Subjects To Teachers</h4>
								</div>
								<div class="modal-body">
									<form action="assign-subjects-teacher.php" method="POST" enctype="multipart/form-data">
										<div class="row mt-3">
										<div class="col-md-6">
												<div class="form-group">
													<label for="exampleInputPassword1" required>Select Teacher ID:*</label>
													<select class="browser-default custom-select" name="teacher_id">
														<option>Select Teacher ID</option>
														<?php
															$query="select teacher_id from teacher_information";
															$run=mysqli_query($con,$query);
															while($row=mysqli_fetch_array($run)) {
															 echo	"<option value=".$row['teacher_id'].">".$row['teacher_id']."</option>";
															}
													?>
													</select>
												</div>
											</div>
											<div class="col-md-6">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Select Course: </label>
											        <select class="browser-default custom-select" name="course">
													    <option >Select Course</option>
													    <?php
															$query="select course_code from courses";
															$run=mysqli_query($con,$query);
															while($row=mysqli_fetch_array($run)) {
															 echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
															}
														?>
													</select>
											    </div>
											</div>
											
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="exampleInputPassword1">Select Semester:*</label>
													<select class="browser-default custom-select" name="semester">
														<option>Select Semester</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
													</select>
												</div>
											</div>
											
											<div class="col-md-6">
												<div class="form-group">
													<label for="exampleInputPassword1">Select Subject:*</label>
													<select class="browser-default custom-select" name="subject" required="">
														<option >Select Subject</option>
														<?php
															$query="select subject_name from course_subjects";
															$run=mysqli_query($con,$query);
															while($row=mysqli_fetch_array($run)) {
															echo	"<option value=".$row['subject_name'].">".$row['subject_name']."</option>";
															}
														?>
													</select>
												</div>
											</div>
										</div>
										
										<div class="modal-footer">
											<input type="submit" value="Assign Subject" class="btn btn-primary" name="btn_submit">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row w-100">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements mb-5 table-three-tr text-center" cellpadding="3">
								<tr class="table-tr-head table-three text-white">
									<th>Sr.no</th>
									<th>Teacher ID</th>
									<th>Course</th>
									<th>Semester</th>
									<th>Subject</th>
									<th>Action</th>
								</tr>
								<?php
									$sr=1;
									$query="select * from assign_subjects";
									$run=mysqli_query($con,$query);
									while($row=mysqli_fetch_array($run)) {
									echo	"<tr>";
									echo	"<td>".$sr++."</td>";
									echo	"<td>".$row['teacher_id']."</td>";
									echo	"<td>".$row['course']."</td>";
									echo	"<td>".$row['semester']."</td>";
									echo	"<td>".$row['subject']."</td>";
									echo	"<td width='20'><a class='btn btn-danger' href=delete-function.php?subject=".$row['subject'].">Delete</a></td>";
									echo	"</tr>";
									} 
								?>
							</table>				
						</section>
					</div>
				</div>
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>