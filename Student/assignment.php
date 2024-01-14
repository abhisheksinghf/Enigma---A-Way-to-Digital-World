 <!---------------- Session starts form here ----------------------->
 <?php  
	session_start();
	if (!$_SESSION["LoginStudent"])
	{
		header('location:../login/login.php');
	}
	if($_SESSION['LoginStudent']){
		$_SESSION['LoginAdmin'] = "";
	}
		require_once "../connection/connection.php";
		
	?>
<!---------------- Session Ends form here ------------------------>
<!-- php starts here -->
<?php

if(isset($_POST['btn_save']))
{
    $message = $_POST['message'];
    
    $register_no=$_SESSION['LoginStudent'];

	$submitted_on = $_POST['cur-date'];

$assignment_file = $_FILES['assignment_file']['name'];$tmp_name=$_FILES['assignment_file']['tmp_name'];$path = "../teacher/assignment/".$assignment_file;move_uploaded_file($tmp_name, $path);

$query = "INSERT INTO assignment_submit VALUES ('$register_no','$message','$assignment_file','$submitted_on')";

$run = mysqli_query($con,$query);

if($run)
{
    echo "<script type=\"text/javascript\">
    alert('Assignment Submitted 😁');</script>";
}
else{
    echo "<script type=\"text/javascript\">
    alert('You Have Already Submitted your Assigment 🤗');</script>";

}
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Student - Assigment</title>
    </head>
    <body>
        <?php include('../common/common-header.php') ?>
        <?php include('../common/student-sidebar.php') ?>  
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100 page-content-index">
			<div class="flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<h4>Assigment</h4>
            </div>
                    <div class="row">
				    	<div class="col-md-12 ml-2">
				    		<section class="mt-3">
				    			<table class="w-100 table-elements table-three-tr" cellpadding="3">
				    				<tr class="table-tr-head table-three text-white text-center">
				    					<th>Date</th>
				    					<th>Subject</th>
				    					<th>Due Date</th>
				    					<th>Description</th>
				    					<th>Upload Assigment</th>
				    				</tr>
				    				<?php 
				    				$query="SELECT * FROM `teacher_notice`";
				    				$run=mysqli_query($con,$query);
				    				while($row=mysqli_fetch_array($run)) {?>
				    					<tr class="text-center">
				    						<td><?php echo $row['date'] ?></td>
				    						<td><?php echo $row['subject']?></td>
				    						<td><?php echo $row['due_date']?></td>
				    						<td><?php echo $row['description'] ?></td>
				    						<td><?php 
                                            echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='.bd-example-modal-lg'>Upload</button>";
				    						?>
				    						</td>
				    					</tr>
				    				<?php }
				    				?>
                                </table>
                <div class="col-md-2 pt-3 w-100">
  				    <!-- Large modal -->
					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					   <div class="modal-dialog modal-lg">
						    <div class="modal-content">
							    <div class="modal-header bg-info-header text-white">
							        <h4 class="modal-title text-center">Assignment</h4>
						        </div>
							    <div class="modal-body">
							        <form action="assignment.php" method="POST" enctype="multipart/form-data">
										<div class="row mt-3">
											
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Write Message:</label>
                                                    <input type="text" name="message" class="form-control" placeholder="Optional">
                                                </div>
											</div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Attach File:</label>
                                                    <input type="file" name="assignment_file" class="form-control" value="there is no file">
                                                </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <input type="hidden" id="currentdate" readonly name="cur-date" class="form-control">
											    </div>
											</div>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary" value="Submit" name="btn_save">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>    
                </div>
                            </section>
                        </div>
                    </div>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../date.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>