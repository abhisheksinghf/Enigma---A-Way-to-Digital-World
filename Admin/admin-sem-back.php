<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
		$_SESSION['LoginTeacher']="";
	?>
<!---------------- Session Ends form here ------------------------>

<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php  
 	if (isset($_POST['btn_save'])) {
		 
		 $register_no = $_POST["register_no"];
		 
 		$semester = $_POST['semester'];
		 
 		$backlogs = $_POST['backlog'];
		 
 		$backlog_subjects = $_POST['backlog_subjects'];
		 
 		$role=$_POST['role'];
		 
		 
		 
 		$query="INSERT INTO `assign_semester`(`register_no`, `semester`, `Backlogs`, `back_subjects`) VALUES ('$register_no','$semester','$backlogs','$backlog_subjects')";
		 $run=mysqli_query($con, $query);
 		if ($run) {
			 // echo "Your Data has been submitted";
			 echo '<script>alert("Your Data has been submitted")</script>';
			}
			else {
				echo '<script>alert("Register Number Already Exists")</script>';	
			}
		}
		?>

<!--*********************** PHP code starts from here for data updation into database ******************************* -->

<?php  
 	if (isset($_POST['btn_update'])) {

		$register_no = $_POST["register_no"];

 		$semester = $_POST['semester'];

 		$backlogs = $_POST['backlog'];

 		$backlog_subjects = $_POST['backlog_subjects'];

 		$role=$_POST['role'];
	


 		$query="UPDATE `assign_semester` SET `semester`='$semester',`Backlogs`='$backlogs',`back_subjects`='$backlog_subjects' WHERE `register_no`='$register_no'";
        $run=mysqli_query($con, $query);
 		if ($run) {
 			// echo "Your Data has been submitted";
			echo '<script>alert("Your Data has been Updated")</script>';
			}
			else {
			echo '<script>alert("Data not Updated")</script>';	
 		}
 	}
?>

<!--*********************** PHP code end from here for data insertion into database ******************************* -->
 

<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Semester & Backlogs</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Semester and Backlog Management</h4>
					</div>
				</div>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Manage Backlogs</button><br><br>
				<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
						<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header bg-info-header text-white"> 	
										<h4 class="modal-title text-center">Backlogs</h4>
									</div>
									<div class="modal-body">
										<form action="admin-sem-back.php" method="post" enctype="multipart/form-data">
											<div class="row mt-3">
                                                <div class="col-md-4">
					                                <div class="form-group">
					                                    <label for="exampleInputEmail1">Select Register No: </label>
					                                    <select class="browser-default custom-select" name="register_no">
					                                	    <option>Select Register No</option>
					                                	    <?php
					                                			$query="select register_no from student_information";
					                                			$run=mysqli_query($con,$query);
					                                			while($row=mysqli_fetch_array($run)) {
					                                			 echo "<option value=".$row['register_no'].">".$row['register_no']."</option>";
					                                			}
					                                		?>
					                                	</select>
					                                </div>
				                                </div>	
                                                <div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Select Semester: </label>
														<select class="browser-default custom-select" name="semester">
															<option selected value="0">0</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6>">6</option>
														</select>
													</div>
												</div>
                                                <div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputPassword1">Enter Backlogs:</label>
														<input type="text" name="backlog" class="form-control" placeholder="Enter Backlogs">
													</div>
												</div>
												<div class="col-md-4" id="multi-subs">
													<div class="form-group">
														<label for="exampleInputPassword1">Enter Backlog Subjects:</label>
														<textarea size="30" name="backlog_subjects" class="form-control" placeholder="Enter Backlog Subjects"></textarea>
													</div>
												</div>
											</div>
											<!-- _________________________________________________________________________________
																				Hidden Values are here
											_________________________________________________________________________________ -->
											<div>
												<input type="hidden" name="password" value="teacher123*">
												<input type="hidden" name="role" value="Teacher">
											</div>
											<!-- _________________________________________________________________________________
																				Hidden Values are end here
											_________________________________________________________________________________ -->
											<div class="modal-footer">
												<input type="submit" class="btn btn-primary" name="btn_save" value="Save Data">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	

				<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg-2">Update</button><br><br>
				<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
						<div class="modal fade bd-example-modal-lg-2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header bg-info-header text-white"> 	
										<h4 class="modal-title text-center">Update Sem and Backlogs</h4>
									</div>
									<div class="modal-body">
										<form action="admin-sem-back.php" method="post" enctype="multipart/form-data">
											<div class="row mt-3">
                                                <div class="col-md-4">
					                                <div class="form-group">
					                                    <label for="exampleInputEmail1">Select Register No: </label>
					                                    <select class="browser-default custom-select" name="register_no">
					                                	    <option>Select Course</option>
					                                	    <?php
					                                			$query="select register_no from student_information";
					                                			$run=mysqli_query($con,$query);
					                                			while($row=mysqli_fetch_array($run)) {
					                                			 echo "<option value=".$row['register_no'].">".$row['register_no']."</option>";
					                                			}
					                                		?>
					                                	</select>
					                                </div>
				                                </div>	
                                                <div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Select Semester: </label>
														<select class="browser-default custom-select" name="semester">
															<option selected value="0">0</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6>">6</option>
														</select>
													</div>
												</div>
                                                <div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputPassword1">Enter Backlogs:</label>
														<input type="text" name="backlog" class="form-control" placeholder="Enter Backlogs">
													</div>
												</div>
												<div class="col-md-4" id="multi-subs">
													<div class="form-group">
														<label for="exampleInputPassword1">Enter Backlog Subjects:</label>
														<textarea size="30" name="backlog_subjects" class="form-control" placeholder="Enter Backlog Subjects"></textarea>
													</div>
												</div>
											</div>
											<!-- _________________________________________________________________________________
																				Hidden Values are here
											_________________________________________________________________________________ -->
											<div>
												<input type="hidden" name="password" value="teacher123*">
												<input type="hidden" name="role" value="Teacher">
											</div>
											<!-- _________________________________________________________________________________
																				Hidden Values are end here
											_________________________________________________________________________________ -->
											<div class="modal-footer">
												<input type="submit" class="btn btn-primary" name="btn_update" value="Update Data">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
				
                <div class="row">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements mb-5 table-three-tr text-center" cellpadding="3">
								<tr class="table-tr-head table-three text-white">
									<th>Sr.No</th>
									<th>Register No</th>
									<th>Full Name</th>
									<th>Course</th>
									<th>Semester</th>
									<th>Backlogs</th>
									<th>Back Subjects</th>
								</tr>
								<?php
									$sr = 1;
									$query = "select s.register_no,first_name,middle_name,last_name,course,semester,backlogs,back_subjects from short_student_info as s,assign_semester as a where s.register_no = a.register_no";									
									$run=mysqli_query($con,$query);
									while($row=mysqli_fetch_array($run)) {
									echo	"<tr>";
									echo	"<td>".$sr++."</td>";
									echo	"<td>".$row['register_no']."</td>";
									echo	"<td>".$row['first_name']." ".$row['middle_name']." ".$row['last_name']."</td>";
									echo	"<td>".$row['course']."</td>";
									echo	"<td>".$row['semester']."</td>";
									echo	"<td>".$row['backlogs']."</td>";
									echo	"<td>".$row['back_subjects']."</td>";
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
		<script type="text/javascript" src="../date.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>