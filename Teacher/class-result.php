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
if (isset($_POST['btn'])) {
	
	$date=$_POST['date'];
	$register_no=$_POST['register_no'];
	$scheme=$_POST['scheme'];
	$ia=$_POST['ia'];
	$course=$_POST['course'];
	$semester=$_POST['sem'];
	$subject=$_POST['subject'];
	$tm=$_POST['total_marks'];
	$om=$_POST['obtained_marks'];

	$query = "INSERT INTO `ia_result`(`date`, `register_no`, `scheme`, `subject`, `ia`, `course`, `semester`, `total_marks`, `obtained_marks`) VALUES ('$date','$register_no','$scheme','$subject','$ia','$course','$semester','$tm','$om')";
	$run = mysqli_query($con,$query);

	}
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Teacher - Class Results</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/teacher-sidebar.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100 page-content-index">
			<div class="flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<h4>Class Results</h4>
			</div>
			
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Announce Results</button>
                <div class="col-md-2 pt-3 w-100">
  				    <!-- Large modal -->
					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					   <div class="modal-dialog modal-lg">
						    <div class="modal-content">
							    <div class="modal-header bg-info-header text-white">
							        <h4 class="modal-title text-center">Results</h4>
						        </div>
								<?php
								$teacherid = $_SESSION['LoginTeacher'];
								echo $teacherid;

								?>
							    <div class="modal-body">
							        <form action="class-result.php" method="POST" enctype="multipart/form-data">
										<div class="row mt-3">
										<div class="col-md-4">
											<div class="form-group">
														<label for="exampleInputPassword1">Date:</label>
														<input type="text" readonly id="currentdate" name="date" class="form-control">
													</div>
											</div>
											<div class="col-md-4">
											<div class="form-group">
					                            <label for="exampleInputEmail1">Select Register No: </label>
					                            <select class="browser-default custom-select" name="register_no">
					                        	    <option>Select Register_no</option>
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
													<label for="exampleInputEmail1" >Select Scheme:</label>
														<select class="browser-default custom-select" name="scheme">
															<option>Select Scheme</option>
															<option value="C-15">C-15</option>
															<option value="C-19">C-19</option>
															<option value="C-20">C-20</option>
														</select>
												</div>
											</div>
                                            <div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputEmail1">Select Course: </label>
												    <select class="browser-default custom-select" name="course">
													    <option>Select Course</option>
													    <?php
															$query="select course_code from courses";
															$run=mysqli_query($con,$query);
															while($row=mysqli_fetch_array($run)) {
															 echo "<option value=".$row['course_code'].">".$row['course_code']."</option>";
															}
														?>
													</select>
												</div>
											</div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Select Subject: </label>
				                            	    <select class="browser-default custom-select" name="subject">
                                                        <option>Select Subject</option>
				                            		    <?php
															$teacherid = $_SESSION['LoginTeacher'];
				                            				$query="SELECT subject FROM assign_subjects WHERE teacher_id='$teacherid' ";
				                            				$run=mysqli_query($con,$query);
				                            				while($row=mysqli_fetch_array($run)) {
                                                                echo "<option value=".$row['subject'].">".$row['subject']."</option>";
				                            				}
                                                            ?>
				                            		</select>
				                            	</div>
				                            </div>	
                                            <div class="col-md-4">
											<div class="form-group">
													<label for="exampleInputEmail1" >Select IA:</label>
														<select class="browser-default custom-select" name="ia">
															<option>Select Scheme</option>
															<option value="ia-1">1</option>
															<option value="ia-2">2</option>
															<option value="ia-3">3</option>
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
												    <label for="exampleInputPassword1">Total Marks</label>
												    <input type="text" name="total_marks" placeholder="Total Marks" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Obtained Marks</label>
												    <input type="text" name="obtained_marks" placeholder="Obtained Marks" class="form-control">
											    </div>
											</div>
											
											<div class="modal-footer">
												<input type="submit" class="btn btn-primary" value="Announce" name="btn_save">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
								  		</div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>    
                </div>
			</main>
	<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../date.js"></script>
	</body>
</html>

