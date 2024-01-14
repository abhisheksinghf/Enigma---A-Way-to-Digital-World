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
    $register_no=$_SESSION['LoginStudent'];

    $subject = $_POST['subject'];

	$doubt = $_POST['explain-doubt'];
	
	$doubt_id = $_POST['doubt_id'];



$query = "INSERT INTO `student_doubt`(`register_no`, `subject`, `doubt`, `doubt_id`) VALUES ('$register_no','$subject','$doubt','$doubt_id')";

$run = mysqli_query($con,$query);

if($run)
{
    echo "<script type=\"text/javascript\">
    alert('Doubt Submitted 😁');</script>";
}
else{
    echo "<script type=\"text/javascript\">
    alert('Doubt not Submitted 😐');</script>";

}
}
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Student - Doubt</title>
    </head>
    <body>
        <?php include('../common/common-header.php') ?>
        <?php include('../common/student-sidebar.php') ?>  
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100 page-content-index">
			<div class="flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<h4>Ask Doubt</h4>
            </div>
            <img src="../img/doubt.gif" alt="doubt" class="rounded float-right">                    
                <div class="col-md-2 pt-3 w-100">
  				    <!-- Large modal -->
                <button type="button" class="btn btn-primary" style="font-size:15px;" data-toggle="modal" data-target=".bd-example-modal-lg">Ask Doubt</button>
                <div class="col-md-2 pt-3 w-100">
  				    <!-- Large modal -->
					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					   <div class="modal-dialog modal-lg">
						    <div class="modal-content">
							    <div class="modal-header bg-info-header text-white">
							        <h4 class="modal-title text-center">Enter Notice</h4>
						        </div>
							    <div class="modal-body">
							        <form action="student-doubt.php" method="POST" enctype="multipart/form-data">
										<div class="row mt-3">
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Select Subject: </label>
				                            	    <select class="browser-default custom-select" name="subject">
                                                        <option>Select Subject</option>
				                            		    <?php
				                            				$query="SELECT subject_name FROM course_subjects";
				                            				$run=mysqli_query($con,$query);
				                            				while($row=mysqli_fetch_array($run)) {
                                                                echo "<option value=".$row['subject_name'].">".$row['subject_name']."</option>";
				                            				}
                                                            ?>
				                            		</select>
				                            	</div>
				                            </div>
									
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1" required>Write your Doubt :*</label>
												    <textarea  name="explain-doubt" rows="4" cols="50" class="form-control"></textarea>
											    </div>
											</div>
				
													<?php $random = mt_rand(1000,5000); ?>
												    <input type='hidden' value='<?php echo $random ?>' readonly name='doubt_id' class='form-control'>
											<div class="modal-footer">
												<input type="submit" class="btn btn-primary" value="Ask" name="btn_save">
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
				<!-- <div class="flex-wrap flex-md-no-wrap pt-3 pb-2 text-white pl-3" style="margin-top:5px;background-color:#370648de !important;border-radius:3px;"> -->
					<div class="col-lg-9 col-md-12">
						<div>
							<section class="mt-3" style="width: 136%;">
								<div class="btn btn-block table-three text-light d-flex">
									<span class="font-weight-bold"><i class="fa fa-user mr-3" aria-hidden="true"></i>Doubt Solutions</span>
									<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsetwo"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>
									
								</div>
								<div class="collapse show mt-2" id="collapsetwo">
									<table class="w-100 table-elements table-three-tr text-center"cellpadding="2">
										<tr class="pt-5 table-three text-white" style="height: 32px;">
											<th>Your Doubt</th>
											<th>Solved By</th>
											<th>Solution</th>
											<th>Links</th>
										</tr>
										<?php  
											$query="SELECT doubt,teacher_information.first_name,solution,links FROM doubt_solution,teacher_information,student_doubt WHERE student_doubt.doubt_id=doubt_solution.doubt_id and teacher_information.email=doubt_solution.teacher_email";
											$run=mysqli_query($con,$query);
											while ($row=mysqli_fetch_array($run)) { ?>
												<tr>
						
													<td><?php echo $row['doubt'] ?></td>
													<td><?php echo $row['first_name'] ?></td>
													<td><?php echo $row['solution'] ?></td>
													<td><?php echo $row['links'] ?></td>
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