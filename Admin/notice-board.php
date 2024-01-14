 <!---------------- Session starts form here ----------------------->
 <?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>

	<!-- php starts here -->
	<?php
	if(isset($_POST['btn_save'])){
	$date = $_POST['cur-date'];

	$subject = $_POST['notice_subject'];

	$description = $_POST['description'];

	$notice_id = $_POST['notice_id'];
	
	$query = "INSERT INTO `notice_board`(`notice_id`, `Date`, `Subject`, `Description`) VALUES ('$notice_id','$date','$subject','$description')";

	$run = mysqli_query($con,$query);
	}
	?>
<!---------------- Session Ends form here ------------------------>
<title>Admin - Notice Board</title>
<!-- <p><script>document.write(new Date().getFullYear())</script></p> -->
	<?php include('../common/common-header.php') ?>
	<?php include('../common/admin-sidebar.php') ?>  
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100 page-content-index">
			<div class="flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<h4>Notice Board</h4>
			</div>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Notice</button>
                <div class="col-md-2 pt-3 w-100">
  				    <!-- Large modal -->
					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					   <div class="modal-dialog modal-lg">
						    <div class="modal-content">
							    <div class="modal-header bg-info-header text-white">
							        <h4 class="modal-title text-center">Enter Notice</h4>
						        </div>
							    <div class="modal-body">
							        <form action="notice-board.php" method="POST" enctype="multipart/form-data">
										<div class="row mt-3">
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Notice ID :</label>
													<?php $random = mt_rand(1000,5000); ?>
												    <input type='text' value='<?php echo $random ?>' readonly name='notice_id' class='form-control'>
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
												    <label for="exampleInputPassword1">Notice Subject:</label>
												    <input type="text" name="notice_subject" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1" required>Notice Description:*</label>
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
									<th>Notice ID</th>
									<th>Announced on</th>
									<th>Notice Subject</th>
									<th>Description</th>
									<th>Operation</th>
								</tr>
								<?php 
								$query="SELECT * FROM `notice_board`";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
									<tr class="text-center">
										<td><?php echo $row['notice_id'] ?></td>
										<td><?php echo $row['Date'] ?></td>
										<td><?php echo $row['Subject']?></td>
										<td><?php echo $row['Description'] ?></td>
										<td><?php 
										echo "<a class='btn btn-danger' href=delete-function.php?notice_id=".$row['notice_id'].">Delete Notice</a>"
										?>
										</td>
									</tr>
								<?php }
								?>
                            </table>
                        </section>
                    </div>
                </div>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../date.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>