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

		$language= $_POST["language"];

		$id= $_POST["id"];

 		$Name=$_POST["Name"];

 		$price=$_POST["price"];

 		$Publisher=$_POST["Publisher"];
 		 		
 		


 		$query="INSERT INTO `magazine`(`id`,`language`, `Name`, `price`, `Publisher`) VALUES('$id','$language','$Name','$price','$Publisher')";
 		$run=mysqli_query($con, $query);
 		if ($run) {
			echo '<script>alert("Magazine Added")</script>';
			}
			else {
			echo '<script>alert("Failed to Add Magazine")</script>';	
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
						<h4 class="mr-5">Magazine Section</h4>
					</div>
				</div>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Magazine</button><br><br>
				<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
						<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header bg-info text-white">
										<h4 class="modal-title text-center">Add Magazine</h4>
									</div>
									<div class="modal-body">
										<form action="magazine.php" method="post" enctype="multipart/form-data">
											<div class="row mt-3">
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Magazine ID :</label>
													<?php $random = mt_rand(10000,99999); ?>
												    <input type='text' value='<?php echo $random ?>' readonly name='id' class='form-control'>
											    </div>
											</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Language:</label>
														<input type="text" name="language" class="form-control" required="" placeholder="Language">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Name: </label>
														<input type="text" name="Name" class="form-control" required="" placeholder="Name">
													</div>
												</div><div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Price: </label>
														<input type="number" name="price" class="form-control" required="" placeholder="Price">
													</div>
												</div>
												
											</div>
											
												<div class="row">
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Publisher:</label>
														<input type="text" name="Publisher" placeholder="Publisher" requried="" class="form-control">
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
									<th>ID</th>
									<th>Language</th>
									<th>Name</th>
									<th>Price</th>
									<th>Publisher</th>
									
							
								</tr>
								<?php 
								$query="select * from magazine";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
									<tr>
										<td><?php echo $row["id"] ?></td>
										<td><?php echo $row["language"] ?></td>
										<td><?php echo $row["Name"]?></td>
										<td><?php echo $row["price"]?></td>
										<td><?php echo $row["Publisher"]?></td>
										
		
										
										
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


