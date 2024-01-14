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

	<!-- php starts here -->
	<?php
	if(isset($_POST['btn_save'])){
	
    $date = $_POST['cur-date'];

	$subject = $_POST['subject'];

	$description = $_POST['description'];

	$assigment_id = $_POST['ass_id'];

    $due_date = $_POST['due_date'];
	
	$query = "INSERT INTO `teacher_notice`(`assignmet_id`, `date`, `subject`, `due_date`, `description`) VALUES ('$assigment_id','$date','$subject','$due_date','$description')";

	$run = mysqli_query($con,$query);
	}
	?>
<!---------------- Session Ends form here ------------------------>
<title>Teacher - Assigment</title>
<!-- <p><script>document.write(new Date().getFullYear())</script></p> -->
        <?php include('../common/common-header.php') ?>
		<?php include('../common/teacher-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100 page-content-index">
			<div class="flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<h4>Manage Assignments</h4>
			</div>
			
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Assignment</button>
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
				                            				$query="SELECT subject FROM assign_subjects WHERE teacher_id='$teacher_id' ";
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
                <div class="row">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements table-three-tr" cellpadding="3">
								<tr class="table-tr-head table-three text-white text-center">
									<th>Assignment ID</th>
									<th>Date</th>
									<th>Subject</th>
									<th>Due Date</th>
									<th>Description</th>
									<th>Operation</th>
								</tr>
								<?php 
								$query="SELECT * FROM `teacher_notice`";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
									<tr class="text-center">
										<td><?php echo $row['assignmet_id'] ?></td>
										<td><?php echo $row['date'] ?></td>
										<td><?php echo $row['subject']?></td>
										<td><?php echo $row['due_date']?></td>
										<td><?php echo $row['description'] ?></td>
										<td><?php 
										echo "<a class='btn btn-danger' href=../admin/delete-function.php?assignmet_id=".$row['assignmet_id'].">Delete</a>"
										?>
										</td>
									</tr>
								<?php }
								?>
                            </table>
                        </section>
                    </div>
                </div>
			</div>
			<div class="row">
				<!-- <div class="flex-wrap flex-md-no-wrap pt-3 pb-2 text-white pl-3" style="margin-top:5px;background-color:#370648de !important;border-radius:3px;"> -->
					<div class="col-lg-9 col-md-12">
						<div>
							<section class="mt-3" style="width: 136%;">
								<div class="btn btn-block table-three text-light d-flex">
									<span class="font-weight-bold"><i class="fa fa-user mr-3" aria-hidden="true"></i>Check Submissions</span>
									<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsetwo"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>
									
								</div>
								<div class="collapse show mt-2" id="collapsetwo">
									<table class="w-100 table-elements table-three-tr text-center"cellpadding="2">
										<tr class="pt-5 table-three text-white" style="height: 32px;">
											<th>Submitted On</th>
											<th>Register No</th>
											<th>Message</th>
											<th>Assignment</th>
										</tr>
										<?php  
											$query="select * from assignment_submit";
											$run=mysqli_query($con,$query);
											while ($row=mysqli_fetch_array($run)) { ?>
												<tr>
													<?php
													$register_no = $row['register_no'];
													$assignment_file = $row['assignment_file'];
													?>
													<td><?php echo $row['submitted_on'] ?></td>
													<td><?php echo $row['register_no'] ?></td>
													<td><?php echo $row['message'] ?></td>
													<td><?php echo "<a class='btn btn-success' href='assignment/$assignment_file' download><b>Download</b></a>"; ?></td>
												</tr>		
											<?php
											}
										?>
									</table>
								</div>
							</section>
						</div>
					</div>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../date.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>