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

<!doctype html>
<html lang="en">
	<head>
		<title>Student - Attendance</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>

		<main role="main" class="ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Student Attendance</h4>
				</div>
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements table-three-tr" cellpadding="3">
								<tr class="table-tr-head table-three text-white text-center">
									<th>Register No</th>
									<th>Name</th>
									<th>Present</th>
									<th>Absent</th>
								</tr>
								<?php 
								$course = $_POST['course'];
								$semester = $_POST['sem'];
								$subject = $_POST['subject'];
								$query="SELECT student_information.register_no,first_name,middle_name,last_name FROM student_information,assign_semester where course='$course' and semester='$semester' and student_information.register_no = assign_semester.register_no";
								// $cnt=1;
								$run=mysqli_query($con,$query);
								$cnt=mysqli_num_rows($run);
								// echo $cnt;
								// if($cnt=0)
								// {
								// 	echo '<img src="sad.gif" alt="doubt" class="rounded float-left">';                   

								// }
								while($row=mysqli_fetch_array($run)) {?>
									<tr class="text-center">
										<?php
										$i=2;
										while ($i<$cnt) {?>
										<td><?php echo $row['register_no'] ?></td>
										<td><?php echo $row['first_name'] ?></td>
										<?php
										$i++;
										}
										?>
										<td><?php
										
										echo '<div class="form-check">';
										echo '<input class="form-check-input" type="radio"  name="atten" value="" id="defaultCheck1">';
										echo '<label class="form-check-label" for="defaultCheck1">';
										echo '</label>';
										echo '</div>';
										?>
										</td>
										
										<td><?php 
											echo '<div class="form-check">';
											echo '<input class="form-check-input" type="radio"  name="atten" value="" id="defaultCheck1">';
											echo '<label class="form-check-label" for="defaultCheck1">';
											echo '</label>';
											echo '</div>';
										?>
										</td>
									</tr>
								<?php }
								?>
                            </table>
                        </section>
                    </div>
                </div>
				<div class="col-md-2 pt-3 w-100">
  				    <!-- Large modal -->
					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					   <div class="modal-dialog modal-lg">
						    <div class="modal-content">
							    <div class="modal-header bg-info-header text-white">
							        <h4 class="modal-title text-center">Assignment</h4>
						        </div>
							    <div class="modal-body">
							        <form action="teacher-notice.php" method="POST" enctype="multipart/form-data">
										<div class="row mt-3">
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Assigment ID :</label>
													<?php $random = mt_rand(1000,5000); ?>
												    <input type='text' value='<?php echo $random ?>' readonly name='ass_id' class='form-control'>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Date :</label>
												    <input type="text" id="currentdate" readonly name="cur-date" class="form-control">
											    </div>
											</div>
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Select Subject: </label>
				                            	    <select class="browser-default custom-select" name="subject">
                                                        <option>Select Subject</option>
				                            		    <?php
				                            				$query="SELECT subject FROM assign_subjects WHERE teacher_id='178235142' ";
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
                                                    <label for="exampleInputPassword1">Due Date :</label>
                                                    <input type="date" id="duedate" name="due_date" class="form-control">
                                                </div>
                                            </div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1" required>Assignment Description:*</label>
												    <textarea  name="description" rows="4" cols="50" class="form-control"></textarea>
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
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>

 