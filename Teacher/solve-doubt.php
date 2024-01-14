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
	// $_SESSION['teacher_id']=$teacher_id;
?>

	<!-- php starts here -->
	<?php
	if(isset($_POST['btn_save'])){
	
    $links = $_POST['query_link'];

	$solution = $_POST['solve_doubt'];

	$email = $_SESSION['LoginTeacher'];

    $query="SELECT short_student_info.`register_no`,`first_name`,`middle_name`,`last_name`,`subject`, `doubt`,student_doubt.`doubt_id` FROM `student_doubt`,`short_student_info` WHERE short_student_info.register_no = student_doubt.register_no";
    $run=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($run)) {
    $doubt_id = $row['doubt_id'];
    }

	$query = "INSERT INTO `doubt_solution`(`teacher_email`, `solution`, `links`, `doubt_id`) VALUES ('$email','$solution','$links','$doubt_id')";

	$run = mysqli_query($con,$query);
	}
	?>
<!---------------- Session Ends form here ------------------------>
<title>Teacher - Solve Doubt</title>
<!-- <p><script>document.write(new Date().getFullYear())</script></p> -->
        <?php include('../common/common-header.php') ?>
		<?php include('../common/teacher-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100 page-content-index">
			<div class="flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<h4>Student Doubts</h4>
			</div>
			<!-- <button type="button" class="btn btn-primary" style="font-size:15px;" data-toggle="modal" data-target=".bd-example-modal-lg">Ask Doubt</button> -->
                <div class="col-md-2 pt-3 w-100">
  				    <!-- Large modal -->
					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					   <div class="modal-dialog modal-lg">
						    <div class="modal-content">
							    <div class="modal-header bg-info-header text-white">
							        <h4 class="modal-title text-center">Solve Doubt</h4>
						        </div>
							    <div class="modal-body">
							        <form action="solve-doubt.php" method="POST" enctype="multipart/form-data">
										<div class="row mt-3">
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1" required>Answer Doubt :*</label>
												    <textarea  name="solve_doubt" rows="4" cols="50" class="form-control"></textarea>
											    </div>
											</div>
                                            <div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1" required>Provide Links :*</label>
												    <textarea  name="query_link" rows="4" cols="50" placeholder="provide video,document links" class="form-control"></textarea>
											    </div>
											</div>
                                            
											<div class="modal-footer">
												<input type="submit" class="btn btn-primary" value="Send" name="btn_save">
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
									<th>Asked By</th>
									<th>Register No</th>
									<th>Subject</th>
									<th>Doubt</th>
									<th>Action</th>
								</tr>
								<?php 
								$query="SELECT short_student_info.`register_no`,`first_name`,`middle_name`,`last_name`,`subject`, `doubt` FROM `student_doubt`,`short_student_info` WHERE short_student_info.register_no = student_doubt.register_no";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
									<tr class="text-center">
										<td><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></td>
										<td><?php echo $row['register_no'] ?></td>
										<td><?php echo $row['subject']?></td>
										<td><?php echo $row['doubt']?></td>
										<td><?php
                                        echo '<button type="button" class="btn btn-success" style="font-size:15px;" data-toggle="modal" data-target=".bd-example-modal-lg"  id="sub9" onsubmit="submitted()">Solve Doubt</button>';
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
        </main>
        <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../date.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
