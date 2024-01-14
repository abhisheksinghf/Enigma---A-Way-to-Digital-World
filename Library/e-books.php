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
  
<?php  
	if (isset($_POST['btn_save'])) {
		$id=$_POST['eid'];
		$ename=$_POST['ebookname'];
		$semester=$_POST['semester'];
		$course_code=$_POST['course_code'];
		
        // ebook placement
		$ebook = $_FILES['ebookfile']['name'];$tmp_name=$_FILES['ebookfile']['tmp_name'];$path = "e-books/".$ebook;move_uploaded_file($tmp_name, $path);
		// echo $ebook;
		// $profile_image = $_FILES['profile_image']['name'];$tmp_name=$_FILES['profile_image']['tmp_name'];$path = "images/".$profile_image;move_uploaded_file($tmp_name, $path);

		$query="INSERT INTO `ebooks`(`id`, `name`, `semester`, `course`, `ebook_file`) VALUES ('$id','$ename','$semester','$course_code','$ebook')";
		$run=mysqli_query($con,$query);
		// if ($run) {
		// 	echo "successfully";
		// }
		// else{
		// 	echo "not";
		// }
	}
?>


<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Subjects</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/library-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">E-Book Management</h4>
					</div>
				</div>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add E-Book</button><br><br>
				<div class="col-md-2 pt-3 w-100">
  				    <!-- Large modal -->
					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					   <div class="modal-dialog modal-lg">
						    <div class="modal-content">
							    <div class="modal-header bg-info-header text-white">
							        <h4 class="modal-title text-center">Add E-Book</h4>
						        </div>
							    <div class="modal-body">
							        <form action="e-books.php" method="POST" enctype="multipart/form-data">
										<div class="row mt-3">
											<div class="col-md-4">
                                            <div class="form-group">
							    <label for="exampleInputPassword1">E-Book ID :</label>
								<?php $random = mt_rand(50000,99999); ?>
							    <input type='text' value='<?php echo $random ?>' readonly name='eid' class='form-control'>
						    </div>
											</div>
											
											<div class="col-md-4">
                                            <div class="form-group">
										<label for="exampleInputEmail1">E-Book Name: </label>
										<input type="text" name="ebookname" class="form-control" required placeholder="Enter Name" required>
									</div>
											</div>
								  		</div>
								  		<div class="row">
											  <div class="col-md-4">
                                              <div class="form-group">
										<label for="exampleInputEmail1">Select Semester: </label>
										<select class="browser-default custom-select" name="semester">
											<option selected value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6>">6</option>
										</select>
									</div>
											  </div>

											<div class="col-md-4">
                                            <div class="form-group">
										<label for="exampleInputEmail1">Course Code:</label>
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
                                    <label for="exampleInputPassword1">Upload E-Book:</label>
                                    <input type="file" name="ebookfile" placeholder="Upload" class="form-control">
                                </div>
											</div>
								  		</div>
										<!-- _________________________________________________________________________________
								  											Hidden Values are end here
								  		_________________________________________________________________________________ -->
								  		<div class="modal-footer">
						   		            <input type="submit" class="btn btn-primary" name="btn_save" value="Submit Form">
		      								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									    </div>
									</form>
						        </div>
						    </div>
					   </div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements table-three-tr text-center" cellpadding="3">
								<tr class="table-tr-head table-three text-white">
									<th>Sr.No</th>
									<th>ID</th>
									<th>Name</th>
									<th>Semester</th>
									<th>Course</th>
									<th>File</th>
								</tr>
								<?php
									$sr=1;
									$query="select * from ebooks";
									$run=mysqli_query($con,$query);
									while($row=mysqli_fetch_array($run)) {
									$file = $row['ebook_file'];
									echo	"<tr>";
									echo	"<td>".$sr++."</td>";
									echo	"<td>".$row['id']."</td>";
									echo	"<td>".$row['name']."</td>";
									echo	"<td>".$row['semester']."</td>";
									echo	"<td>".$row['course']."</td>";
									echo "<td><a class='btn btn-success' href='e-books/$file' download><b>Download</b></a></td>"; 
									echo	"</tr>";
									} 
								?>
							</table>				
						</section>
					</div>
				</div>
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
