 <!---------------- Session starts form here ----------------------->
 <?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
	<!-- php code starts here -->
	<?php
		if(isset($_POST["btnSearch"]))
		{
			   $scheme = $_POST['scheme'];
			
			   $course = $_POST['course_code'];
			
			   $semester = $_POST['sem'];
		}
	?>
<!---------------- Session Ends form here ------------------------>
<title>Admin - Scheme and Syllabus</title>
	<?php include('../common/common-header.php') ?>
	<?php include('../common/admin-sidebar.php') ?>  
	<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100 page-content-index">
			<div class="flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<h4>Scheme and Syllabus </h4>
			</div>
	<div class="modal-body">
		<form action="scheme-syllabus.php" method="POST" enctype="multipart/form-data">							
            <div class="row">	
				<div class="col-md-4">
				    <div class="form-group">
						<label for="exampleInputEmail1" >Select Scheme:</label>
							<select class="browser-default custom-select" name="scheme">
								<option>Select Scheme</option>
								<option value="C-15">C-15</option>
								<option value="C-19">C-19</option>
								<option value="C-20">C-20</option>
							</select>
					</div>
				</div>		
				<div class="col-md-4">
					<div class="form-group">
					    <label for="exampleInputEmail1">Select Course: </label>
					    <select class="browser-default custom-select" name="course_code">
						    <option>Select Course</option>
						    <?php
								$query="select course_code from courses";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {
								 echo "<option value=".$row['course_code'].">".$row['course_code']."</option>";
								}
							?>
						</select>
					</div>
				</div>	
				<div class="col-md-4">
					<div class="form-group">
					    <label for="exampleInputEmail1">Select Semester: </label>
					    <select class="browser-default custom-select" name="sem">
						    <option >Select Sem</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
						</select>
					</div>
				</div>
					<!-- _________________________________________________________________________________
								  											Hidden Values are here
								  		_________________________________________________________________________________ -->
								  		<div>
											<input type="hidden" name="password" value="student123*">
											<input type="hidden" name="role" value="Student">
								  		</div>
								  		<!-- _________________________________________________________________________________
								  											Hidden Values are end here
								  		_________________________________________________________________________________ -->
				<input class="btn btn-primary px-4 ml-4" type="submit" name="btnSearch" value="Search">
				</div>
			</div>
		</form>
	</div>
	<table class="w-100 table-elements mb-5 table-three-tr text-center" cellpadding="10">
		<tr class="table-tr-head table-three text-white">
			<th>Sl.no</th>
			<th>Course Code</th>
			<th>Subjects</th>
		</tr>
		<?php 
		if(isset($_POST["btnSearch"]))
		{
			$query = "select subject_name,subject_code from course_subjects where scheme='$scheme' and semester='$semester' and course_code='$course'";
			$count = 1;
			$run=mysqli_query($con,$query);
			while($row=mysqli_fetch_array($run)) {?>
				<tr>
					<td><?php echo $count++ ?></td>
					<td><?php echo $row["subject_code"] ?></td>				
					<td><?php echo $row["subject_name"] ?></td>				
				</tr>

			<?php }
			}?>
	</table>		
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>