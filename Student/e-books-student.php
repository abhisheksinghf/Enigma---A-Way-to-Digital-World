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
				<h4>E-Books Section</h4>
            </div>
            <div class="modal-body">
		<form action="e-books-student.php" method="POST" enctype="multipart/form-data">							
            <div class="row">		
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
								  		<!-- <div>
											<input type="hidden" name="password" value="student123*">
											<input type="hidden" name="role" value="Student">
								  		</div> -->
								  		<!-- _________________________________________________________________________________
								  											Hidden Values are end here
								  		_________________________________________________________________________________ -->
                                    </div>
                                    <input class="btn btn-primary px-4" type="submit" name="btnSearch" value="Search">
			</div>
		</form>
	</div>
	<table class="w-100 table-elements mb-5 table-three-tr text-center" cellpadding="10">
		<tr class="table-tr-head table-three text-white">
            <th>Sl.no</th>
			<th>E-Book Name</th>
			<th>Semester</th>
			<th>Course</th>
			<th>Download</th>
		</tr>
		<?php 
		if(isset($_POST["btnSearch"]))
		{
            $semester = $_POST['sem'];
            $course = $_POST['course_code'];
			$query = "select * from ebooks where course='$course' and semester='$semester'";
			$count = 1;
			$run=mysqli_query($con,$query);
			while($row=mysqli_fetch_array($run)) {?>
				<tr>
					<td><?php echo $count++ ?></td>
					<td><?php echo $row["name"] ?></td>				
					<td><?php echo $row["semester"] ?></td>				
					<td><?php echo $row["course"] ?></td>	
                    <?php $file = $row["ebook_file"];?>			
                    <td><?php echo "<a class='btn btn-success' href='../Library/e-books/$file' download><b>Download</b></a>"; ?></td>
				</tr>

			<?php }
			}?>
	</table>
        </main>  
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../date.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>