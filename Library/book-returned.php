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

 		$book_id=$_POST["book_id"];

 		$book_title=$_POST["book_title"];

 		$issued_date=$_POST["issued_date"];
 		
 		$returned_date=$_POST["returned_date"];

        $due_date=$_POST["due_date"];
 		
 		


 		$query="INSERT INTO `book_returned`(`book_id`, `book_title`, `issued_date`, `returned_date`,`due_date`) VALUES('$book_id','$book_title','$issued_date','$returned_date','$due_date')";
 		$run=mysqli_query($con, $query);
 		if ($run) {
 			// echo "Your Data has been submitted";
			echo '<script>alert("Your Data has been submitted")</script>';
			}
			else {
			echo '<script>alert("Data not submitted")</script>';	
 		}
 		//$query2="insert into login(user_id,Password,Role)values('$email','$password','$role')";
 		// $run2=mysqli_query($con, $query2);
 		// if ($run2) {
 		// 	echo "Your Data has been submitted into login";
 		// }
 		// else {
 		// 	echo "Your Data has not been submitted into login";
 		// }
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
						<h4 class="mr-5">Book Returned Information</h4>
					</div>
				</div>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Returned Book</button><br><br>
				<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
						<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header bg-info text-white">
										<h4 class="modal-title text-center">Add Returned Book</h4>
									</div>
									<div class="modal-body">
										<form action="book-returned.php" method="post" enctype="multipart/form-data">
											<div class="row mt-3">
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Book Id:</label>
														<input type="text" name="book_id" class="form-control" required="" placeholder="Book Id">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Book Title: </label>
														<input type="text" name="book_title" class="form-control" required="" placeholder="Book Title">
													</div>
												</div>
											<div class="row">
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Issued date:</label>
														<input type="date" name="issued_date" placeholder="Issued_date" requried="" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Returned date:</label>
														<input type="date" name="returned_date" class="form-control" required="" placeholder="Returned_date">
													</div>
												</div>
                                                
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Due date:</label>
														<input type="date" name="due_date" class="form-control" required="" placeholder="Due_date">
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
				<div class="row w-100">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							
							<table class="w-100 table-elements mb-5 table-three-tr text-center" cellpadding="10">
								<tr class="table-tr-head table-three text-white">
						            <th>Book Id</th>
									<th>Book Title</th>
									<th>Issued date</th>
									<th>Returned date</th>
                                    <th>Due date</th>
									
								</tr>
								<?php 
								$query="select book_id,book_title,issued_date,returned_date,due_date from book_returned";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
									<tr>
										<td><?php echo $row["book_id"] ?></td>
										<td><?php echo $row["book_title"]?></td>
										<td><?php echo $row["issued_date"]?></td>
										<td><?php echo $row["returned_date"]?></td>
										<td><?php echo $row["due_date"] ?></td>
										
										
						
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


