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

<!--*********************** PHP code starts from here for data updation into database ******************************* -->


<!--*********************** PHP code end from here for data insertion into database ******************************* -->
 

<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Class Results</title>
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
                <form action="final-results.php" method="post">
							<div class="row mt-3">
								<div class="col-md-4">
									<div class="form-group" style="z-index: 10;">
										<label>Select Course:</label>
										<select class="browser-default custom-select" name="course_code">
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
										<label for="exampleInputEmail1">Select Semester: </label>
										<select class="browser-default custom-select" name="semester">
											<option selected value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
										</select>
									</div>
								</div>

							<div class="col-md-4">
                                    <input type="submit" name="gene-btn" class="btn btn-success" data-toggle="modal" value="Generate Result" ><br><br>
                                    <input type="button" name="gene-btn" class="btn btn-success" data-toggle="modal" value="Click Here after Generate Result" data-target=".bd-example-modal-lg-2"><br><br>
							</div>
				    </div>	
				</form>
									

				<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
						<div class="modal fade bd-example-modal-lg-2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header bg-info-header text-white"> 	
										<h4 class="modal-title text-center">Final Results</h4>
									</div>
									<div class="modal-body">
										<form action="admin-sem-back.php" method="post" enctype="multipart/form-data">
											<div class="row mt-3" style="justify-content: center;">
                                            <div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Date :</label>
												    <input type="text" id="currentdate" readonly name="cur-date" class="form-control">
											    </div>
											</div>
                                                <div class="col-md-4">
					                                <div class="form-group">
					                                    <label for="exampleInputEmail1">Select Register No: </label>
					                                    <select class="browser-default custom-select" name="register_no">
					                                	    <option>Register No</option>
					                                	    <?php
                                                            if(isset($_POST['gene-btn'])){
                                                                $course = $_POST['course_code'];
                                                                $sem = $_POST['semester'];
					                                			$query="select student_information.register_no from student_information,assign_semester where course='$course' and semester='$sem' and student_information.register_no = assign_semester.register_no";
					                                			$run=mysqli_query($con,$query);
					                                			while($row=mysqli_fetch_array($run)) {
					                                			 echo "<option value=".$row['register_no'].">".$row['register_no']."</option>";
					                                			}
                                                            }
					                                		?>
					                                	</select>
					                                </div>
				                                </div>	
                                            </div>		
                                            <div class="row mt-3">
                                            <div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Subject :</label>
                                                    <?php
                                                    if(isset($_POST['gene-btn'])){
                                                        $scheme = $_POST['scheme'];
                                                        $course = $_POST['course_code'];
                                                        $sem = $_POST['semester'];
                                                    }    
                                                    $a = 1;
                                                    // $query = "SELECT count(*) from course_subjects WHERE course_code='$course' and semester='$sem' and scheme='$scheme' ";
                                                    // $run=mysqli_query($con,$query);
                                                    // $count = mysqli_num_rows($run);
                                                    $query = "SELECT subject_name from course_subjects WHERE course_code='$course' and semester='$sem' and scheme='$scheme' ";
                                                    
                                                    $run=mysqli_query($con,$query);
                                                    while($row=mysqli_fetch_array($run)) {
                                                    // while ($a<10) {
                                                       echo "<op
                                                       tion readonly value=".$row['subject_name'].">".$row['subject_name']."</option>";
                                                       echo "<input type='text' name=".$a++.">";

                                                        // echo '<input type="text" id="currentdate" readonly name="cur-date" class="form-control" value="'.'$row["$subject_name"]>';
                                                        // $a++;
                                                    }
                                    
                                                    ?>
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
                <?php
                    if(isset($_POST['btn_update']))
                    {
                        while ($c <= $a) {
                            $name = $_POST['$a++'];
                            $c++;
                        }
                    }
                ?>
                
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../date.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>