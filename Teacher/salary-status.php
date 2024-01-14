 <!---------------- Session starts form here ----------------------->
 <?php  
	session_start();
	if (!$_SESSION["LoginTeacher"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>

<?php
	$_SESSION["LoginAdmin"]="";
	$teacher_email=$_SESSION['LoginTeacher'];
	$query1="select * from teacher_information where email='$teacher_email'";
	$run1=$run=mysqli_query($con,$query1);
	while($row=mysqli_fetch_array($run1)) {
		$teacher_id=$row["teacher_id"];
	}
	// $_SESSION['teacher_id']=$teacher_id;
?>

<!---------------- Session Ends form here ------------------------>

<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php 
 
 	if (isset($_POST['btn_save'])) {

 		$teacher_id=$_POST["teacher_id"];

 		$advance_salary=$_POST["advance_salary"];

 		$total_salary=$_POST["total_salary"];
 		
 		$recipt_no=$_POST["recipt_no"];
 		
 		$date_paid=$_POST["cur-date"];
 		
 		$query="INSERT INTO `teacher_salary`(`recipt_no`, `date_paid`, `teacher_id`, `salary_paid`, `advance_salary`) VALUES ('$recipt_no','$date_paid','$teacher_id','$total_salary','$advance_salary')";
 		$run=mysqli_query($con, $query);
 		if ($run) {
 			echo "Salary Paid💸";
 		}
 		else {
 			echo "Failed to Pay salary";
 		}
 	}



 	if (isset($_POST['btn_sub'])) {

 		$teacher_id=$_POST["teacher_id"];

 		$query="select * from teacher_salary_allowances where teacher_id='$teacher_id'";
 		$run=mysqli_query($con, $query);
 		while ($row=mysqli_fetch_array($run)) {
 			$total_amount=$row['basic_salary']+($row['basic_salary']*$row['medical_allowance']/100)+($row['basic_salary']*$row['hr_allowance']/100);
 			$query1="INSERT INTO teacher_salary_report(teacher_id, total_amount, status) VALUES ('$teacher_id','$total_amount','Paid')";
 			$run1=mysqli_query($con, $query1);

	 		if ($run1) {  ?>
	 			<script type="text/javascript">
	 				alert("Salary has been paid to I'd is : "+<?php echo $row['teacher_id'] ?>);
	 			</script>
	 		<?php }
	 		else { ?>
	 			<script type="text/javascript">
	 				alert("Salary has not been paid due to some errors");
	 			</script>
	 		<?php }
 	    }
 	}
?>
<!--*********************** PHP code end from here for data insertion into database ******************************* -->


<!doctype html>
<html lang="en">
	<head>
		<title>Teacher - Salary Status</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/teacher-sidebar.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Salary Status</h4>
					</div>
				</div>
				<button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">Check Status</button><br><br>
				<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
						<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header bg-info-header text-white"> 	
										<h4 class="modal-title text-center">Teacher Salary</h4>
									</div>
                                <?php 
                                    $id = $_SESSION['LoginTeacher']; 
                                    $query="SELECT * from teacher_salary WHERE teacher_id='$teacher_id'";
                                    
                                    $run=mysqli_query($con,$query);
                                    if (mysqli_num_rows($run)>0) {
                                        echo '<table class="w-100 table-elements mb-5 table-three-tr text-center" cellpadding="10">';
                                        echo '<tr class="w-100 table-tr-head table-three text-white">';
                                        echo '<th>Paid on</th>';
                                        echo '<th>Salary Paid</th>';
                                        echo '<th>Advance Paid</th>';
                                        echo '</tr>';
								while($row=mysqli_fetch_array($run)) {?>
									<tr class="text-center">
										<td><?php echo $row['date_paid']?></td>
										<td><?php echo $row['salary_paid'] ?></td>
										<td><?php echo $row['advance_salary'] ?></td>						
									</tr>
								<?php }
                                }
                                else
                                {
                                   echo '<img src="sad.gif" alt="doubt" class="rounded float-left">';                   
                                }
								?>
								
							</table>				
						
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../date.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>

