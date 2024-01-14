<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>

<?php
if (isset($_POST['btn_save'])) {
 	
	$recipt_no = $_POST['recipt_no'];
	
 	$date = $_POST['cur-date'];

 	$register_no = $_POST['register_no'];

	$total_fees = $_POST['total_fees'];

 	$fees_paid = $_POST['fees_paid'];
 	
	$status=$_POST['status'];

	$que="INSERT INTO `student_fees`(`recipt_no`, `date`, `register_no`, `total_fees`, `paid_fees`, `status`) VALUES ('$recipt_no','$date','$register_no','$total_fees','$fees_paid','$status')";

	$run=mysqli_query($con,$que);
	if ($run) {
			echo "Insert Successfully";
		}	
		else{
			echo " Insert Not Successfully";
		}
	}

?>

<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Student Fee</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>Student Fee Management System </h4>
				</div>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Fee Info</button><br><br>
				<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
						<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header bg-info-header text-white"> 	
										<h4 class="modal-title text-center">Fee Management</h4>
									</div>
									<div class="modal-body">
										<form action="student-fee.php" method="post" enctype="multipart/form-data">
											<div class="row mt-3">
										
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Recipt No :</label>
													<?php $random = mt_rand(10000,99999); ?>
												    <input type='text' value='<?php echo $random ?>' readonly name='recipt_no' class='form-control'>
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
														<label for="exampleInputPassword1">Total Fees:</label>
														<input type="text" name="total_fees" class="form-control" placeholder="Enter Total Fees">
													</div>
												</div>
												
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputPassword1">Fees Paid:</label>
														<input type="text" name="fees_paid" class="form-control" placeholder="Enter Fees Paid">
													</div>
												</div>
												
												<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Status: </label>
											        <select class="browser-default custom-select" name="status">
													  <option>Select Status</option>
													  <option value="Paid">Paid</option>
													  <option value="Unpaid">Unpaid</option>
													</select>
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
						<form action="student-fee.php" method="post" enctype="multipart/form-data">
						<div class="row mt-3 ">
							<div class="col-md-4">
								<div class="form-group">
									<label for="exampleInputEmail1"></label>
									<select class="browser-default custom-select" name="filter_status">
										<option>Select Status</option>
										<option value="Paid">Paid</option>
										<option value="Unpaid">Unpaid</option>
										<option value="All">All</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
								<label for="exampleInputEmail1"></label>
									<input type="submit" class="btn btn-warning" name="btn_filter" value="Filter Data">

								</div>
							</div>							
							</div>
						</form>
						<table class="w-100 table-elements mb-5 table-three-tr text-center" cellpadding="10">
							<tr class="w-100 table-tr-head table-three text-white">
									<th>Sr No.</th>
									<th>Recipt no</th>
									<th>Date</th>
									<th>Register no</th>
									<th>Name</th>
									<th>Total Fees</th>
									<th>Fees Paid</th>
									<th>Due Amount</th>
									<th>Status</th>
								</tr>
								<?php 
								$sr = 1;
								$query="SELECT recipt_no,date,student_information.register_no,first_name,middle_name,last_name,total_fees,paid_fees,status from student_information,student_fees WHERE student_information.register_no = student_fees.register_no ";
								if (isset($_POST['btn_filter'])) {
								$filter_status = $_POST['filter_status'];
								if($filter_status!='All'){
								$query="SELECT recipt_no,date,student_information.register_no,first_name,middle_name,last_name,total_fees,paid_fees,status from student_information,student_fees WHERE student_information.register_no = student_fees.register_no and status='$filter_status'";
								}
								}

								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
									<tr class="text-center"><?php
										$total = $row['total_fees'];
										$paid = $row['paid_fees'];?>
										<td><?php echo $sr++ ?></td>
										<td><?php echo $row['recipt_no'] ?></td>
										<td><?php echo $row['date']?></td>
										<td><?php echo $row['register_no'] ?></td>
										<td><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></td>
										<td><?php echo $row['total_fees'] ?></td>
										<td><?php echo $row['paid_fees'] ?></td>
										<td><?php echo $total-$paid?></td>
										<td><?php echo $row['status'] ?></td>
								
									</tr>
								<?php }
								?>
								
							</table>				
						
					</div>
				</div>
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../date.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>

