 <!---------------- Session starts form here ----------------------->
 <?php  
	session_start();
	if (!$_SESSION["LoginLibrary"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
  <!-- php starts here -->
  
<!---------------- Session Ends form here ------------------------>
<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php  
 	if (isset($_POST['btn_save'])) {

		$register_no = $_POST["register_no"];

 		$book_title=$_POST["book_name"];

 		$issued_date=$_POST["issued_date"];
 		
 		$due_date=$_POST["due_date"];
 		
		$issue_id=$_POST["issue_id"];
 		
 		
 		


 		$query="INSERT INTO `book_issued`(`issue_id`,`register_no`, `book_title`, `issued_date`, `due_date`) VALUES('$issue_id','$register_no','$book_title','$issued_date','$due_date')";
 		$run=mysqli_query($con, $query);
 		if ($run) {
 			// echo "Your Data has been submitted";
			echo '<script>alert("Book Issued")</script>';
			}
			else {
			echo '<script>alert("Failed to issue Book")</script>';	
 		}
 	
 	}
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Library Management System</title>
	</head>
	<body>
	<?php include('../Common/common-header.php') ?>
	<?php include('../Common/library-sidebar.php') ?> 
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Book Issued Information</h4>
					</div>
				</div>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Issue Book</button><br><br>
				<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
						<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header bg-info text-white">
										<h4 class="modal-title text-center">Add Book Issued</h4>
									</div>
									<div class="modal-body">
										<form action="book-issued.php" method="post" enctype="multipart/form-data">
										<div class="row mt-3">
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Issue ID:</label>
													<?php $random = mt_rand(10000,99999); ?>
												    <input type='text' value='<?php echo $random ?>' readonly name='issue_id' class='form-control'>
											    </div>
											</div>
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
					                                    <label for="exampleInputEmail1">Select Book Name: </label>
					                                    <select class="browser-default custom-select" name="book_name">
					                                	    <option>Select Book Name</option>
					                                	    <?php
					                                			$query="select book_title from book_information";
					                                			$run=mysqli_query($con,$query);
					                                			while($row=mysqli_fetch_array($run)) {
					                                			 echo "<option value=".$row['book_title'].">".$row['book_title']."</option>";
					                                			}
					                                		?>
					                                	</select>
					                                </div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Issued_date:</label>
														<input type="date" name="issued_date" placeholder="Issued_date" requried="" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Due_date:</label>
														<input type="date" name="due_date" class="form-control" required="" placeholder="Due_date">
													</div>
												</div>
										</div>
												
												
												

													
											<!-- _________________________________________________________________________________
																				Hidden Values are here
											_________________________________________________________________________________ -->
											<div>
												<input type="hidden" name="password" value="book123*">
												<input type="hidden" name="role" value="Book">
											</div>
											<!-- _________________________________________________________________________________
																				Hidden Values are end here
											_________________________________________________________________________________ -->
											<div class="modal-footer">
												<input type="submit" class="btn btn-primary" name="btn_save" value="Issue Book">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row w-100">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							
							<table class="w-100 table-elements mb-5 table-three-tr text-center" cellpadding="10">
								<tr class="table-tr-head table-three text-white">
									<th>Sl No</th>
									<th>Register No</th>
									<th>Issued to</th>
									<th>Book Title</th>
									<th>Issued date</th>
									<th>Due date</th>
									<th>Returned</th>
								</tr>
								
								
									
		<?php

			$query = "SELECT * from book_issued_status";
			$count = 1;
			$run=mysqli_query($con,$query);
			
            while($row=mysqli_fetch_array($run)) {?>
				<tr>
					<td><?php echo $count++ ?></td>
					<td><?php echo $row["register_no"] ?></td>				
					<td><?php echo $row["first_name"]." ".$row["middle_name"]." ".$row["last_name"] ?></td>				
					<td><?php echo $row["book_title"] ?></td>				
					<td><?php echo $row["issued_date"] ?></td>				
					<td><?php echo $row["due_date"] ?></td>	
					<td> 
						<?php 
							echo "<a class='btn btn-danger' href=delete.php?issue_id=".$row['issue_id'].">Delete</a> ";
						?>
					</td>			
				</tr>

			<?php
			}?>
		
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


