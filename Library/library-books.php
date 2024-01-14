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

		$book_id = $_POST["book_id"];

 		$book_title=$_POST["book_title"];

 		$book_author=$_POST["book_author"];

 		$description=$_POST["description"];
 		
 		$pages=$_POST["pages"];
 		
 		$price=$_POST["price"];
 		
 		$quantity=$_POST["quantity"];

 		$publisher=$_POST["publisher"];


 		$query="INSERT INTO `book_information`(`book_id`, `book_title`, `book_author`, `description`, `pages`, `price`, `quantity`, `publisher`) VALUES('$book_id','$book_title','$book_author','$description','$pages','$price','$quantity','$publisher')";
 		$run=mysqli_query($con, $query);
 		if ($run) {
 			// echo "Your Data has been submitted";
			echo '<script>alert("Book Added")</script>';
			}
			else {
			echo '<script>alert("Failed to add Book")</script>';	
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
						<h4 class="mr-5">Book Registration</h4>
					</div>
				</div>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Book</button><br><br>
				<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
						<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header bg-info text-white">
										<h4 class="modal-title text-center">Add New Book</h4>
									</div>
									<div class="modal-body">
										<form action="library-books.php" method="post" enctype="multipart/form-data">
											<div class="row mt-3">
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Book ID:</label>
													<?php $random = mt_rand(10000,99999); ?>
												    <input type='text' value='<?php echo $random ?>' readonly name='book_id' class='form-control'>
											    </div>
											</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Book Title: </label>
														<input type="text" name="book_title" class="form-control" required="" placeholder="Book Title">
													</div>
												</div><div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Book Author: </label>
														<input type="text" name="book_author" class="form-control" required="" placeholder="Book Author">
													</div>
												</div>
												
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Description:</label>
														<input type="text" name="description" placeholder="Description" requried="" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Pages:</label>
														<input type="number" name="pages" class="form-control" required="" placeholder="Number of Pages">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Price:</label>
														<input type="number" name="price" class="form-control" placeholder="Price">
													</div>
												</div>
											</div>
												
											<div class="row">
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Quantity:</label>
														<input type="number" name="quantity" class="form-control" placeholder="Quantity">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Publisher: </label>
														<input type="text" name="publisher" class="form-control" placeholder="Publisher">
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
									<th>Book ID</th>
									<th>Book Title</th>
									<th>Book author</th>
									<th>Description</th>
									<th>Pages</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Publisher</th>
							
								</tr>
								<?php 
								$query="select book_id,book_title,book_author,description,pages,price,quantity,publisher from book_information";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
									<tr>
										<td><?php echo $row["book_id"] ?></td>
										<td><?php echo $row["book_title"]?></td>
										<td><?php echo $row["book_author"]?></td>
										<td><?php echo $row["description"]?></td>
										<td><?php echo $row["pages"] ?></td>
										<td><?php echo $row["price"] ?></td>
										<td><?php echo $row["quantity"] ?></td>
										<td><?php  echo $row["publisher"] ?>
		
										
										
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


