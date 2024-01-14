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

	if (isset($_POST['sub'])) {
		
		$reg_no = $_POST['register_no'];
		$date = $_POST['cur-date'];
		$sub1 = $_POST['sub1'];
		$sub2 = $_POST['sub2'];
		$sub3 = $_POST['sub3'];
		$sub4 = $_POST['sub4'];
		$sub5 = $_POST['sub5'];
		$sub6 = $_POST['sub6'];
		$sub7 = $_POST['sub7'];
		$sub8 = $_POST['sub8'];
		$sub9 = $_POST['sub9'];
		$sub10 = $_POST['sub10'];
		$marks1 = $_POST['marks1'];
		$marks2 = $_POST['marks2'];
		$marks3 = $_POST['marks3'];
		$marks4 = $_POST['marks4'];
		$marks5 = $_POST['marks5'];
		$marks6 = $_POST['marks6'];
		$marks7 = $_POST['marks7'];
		$marks8 = $_POST['marks8'];
		$marks9 = $_POST['marks9'];
		$marks10 = $_POST['marks10'];

		$query = "INSERT INTO `exam_result`(`date`, `register_no`, `subject 1`, `subject 2`, `subject 3`, `subject  4`, `subject 5`, `subject 6`, `subject 7`, `subject 8`, `subject 9`, `subject 10`, `marks 1`, `marks 2`, `marks 3`, `marks 4`, `marks 5`, `marks 6`, `marks 7`, `marks 8`, `marks 9`, `marks 10`) VALUES ('$date','$reg_no','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6','$sub7','$sub8','$sub9','$sub10','$marks1','$marks2','$marks3','$marks4','$marks5','$marks6','$marks7','$marks8','$marks9','$marks10')";

		$run = mysqli_query($con,$query);
		
		if($run){
			echo "<script type=\"text/javascript\">
			alert('Result Submitted 😁');</script>";
		}
		else{
			echo "<script type=\"text/javascript\">
			alert('Failed to Submit Result 😟');</script>";	
		}

	}

?>


	<!-- title of this page -->
		<title>Admin - Class Result</title>
		

		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>Result Management System </h4>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<form action="class-result.php" method="post">
							<div class="row mt-3">
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleInputPassword1">Date: </label>
										<input type="text" id="currentdate" readonly name="cur-date" class="form-control">
									</div>
								</div>							
								<div class="col-md-4">
								<div class="form-group">
					        	    <label for="exampleInputEmail1">Register No: </label>
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
					        	</div></div>
							</div>
							<div class="row mt-3">
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleInputEmail1">Select Subject 1: </label>
										<select class="browser-default custom-select" name="sub1">
											<option >Select Subject 1</option>
											<?php
											$query="select subject_code from course_subjects";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
											}
										?>
									</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group" style="z-index: 10;">
										<label>Enter Marks 1:</label>
										<input type="number" class="form-control" name="marks1"/>
									</div>
								</div>
							</div>
							
							<div class="row mt-3">
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleInputEmail1">Select Subject 2: </label>
										<select class="browser-default custom-select" name="sub2">
											<option >Select Subject 2</option>
											<?php
											$query="select subject_code from course_subjects";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
											}
										?>
									</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group" style="z-index: 10;">
										<label>Enter Marks 2:</label>
										<input type="number" class="form-control" name="marks2"/>
									</div>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleInputEmail1">Select Subject 3: </label>
										<select class="browser-default custom-select" name="sub3">
											<option >Select Subject 3</option>
											<?php
											$query="select subject_code from course_subjects";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
											}
										?>
									</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group" style="z-index: 10;">
										<label>Enter Marks 3:</label>
										<input type="number" class="form-control" name="marks3"/>
									</div>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleInputEmail1">Select Subject 4: </label>
										<select class="browser-default custom-select" name="sub4">
											<option >Select Subject 4</option>
											<?php
											$query="select subject_code from course_subjects";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
											}
										?>
									</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group" style="z-index: 10;">
										<label>Enter Marks 4:</label>
										<input type="number" class="form-control" name="marks4"/>
									</div>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleInputEmail1">Select Subject 5: </label>
										<select class="browser-default custom-select" name="sub5">
											<option >Select Subject 5</option>
											<?php
											$query="select subject_code from course_subjects";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
											}
										?>
									</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group" style="z-index: 10;">
										<label>Enter Marks 5:</label>
										<input type="number" class="form-control" name="marks5"/>
									</div>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleInputEmail1">Select Subject 6: </label>
										<select class="browser-default custom-select" name="sub6">
											<option >Select Subject 6</option>
											<?php
											$query="select subject_code from course_subjects";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
											}
										?>
									</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group" style="z-index: 10;">
										<label>Enter Marks 6:</label>
										<input type="number" class="form-control" name="marks6"/>
									</div>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleInputEmail1">Select Subject 7: </label>
										<select class="browser-default custom-select" name="sub7">
											<option >Select Subject 7</option>
											<?php
											$query="select subject_code from course_subjects";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
											}
										?>
									</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group" style="z-index: 10;">
										<label>Enter Marks 7:</label>
										<input type="number" class="form-control" name="marks7"/>
									</div>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleInputEmail1">Select Subject 8: </label>
										<select class="browser-default custom-select" name="sub8">
											<option >Select Subject 8</option>
											<?php
											$query="select subject_code from course_subjects";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
											}
										?>
									</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group" style="z-index: 10;">
										<label>Enter Marks 8:</label>
										<input type="number" class="form-control" name="marks8"/>
									</div>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleInputEmail1">Select Subject 9: </label>
										<select class="browser-default custom-select" name="sub9">
											<option >Select Subject 9</option>
											<?php
											$query="select subject_code from course_subjects";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
											}
										?>
									</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group" style="z-index: 10;">
										<label>Enter Marks 9:</label>
										<input type="number" class="form-control" name="marks9"/>
									</div>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleInputEmail1">Select Subject 10: </label>
										<select class="browser-default custom-select" name="sub10">
											<option >Select Subject 10</option>
											<?php
											$query="select subject_code from course_subjects";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
											}
										?>
									</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group" style="z-index: 10;">
										<label>Enter Marks 10:</label>
										<input type="number" class="form-control" name="marks10"/>
									</div>
								</div>
							</div>
								
								<div class="col-md-4">
									<input type="submit" name="sub" class="btn btn-success" value="Submit Result">
								</div>
							</div>	
						</form>
					</div>
				</div>
				
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../date.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

