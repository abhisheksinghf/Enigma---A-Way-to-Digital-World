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
<?php
if(isset($_POST['btn_submit']))
{
    $submitted_by = $_SESSION['LoginStudent'];

    $complaint_id = $_POST['complaint_id'];

    $date = $_POST['date'];

    $about = $_POST['about'];

    $description = $_POST['description'];

    $query = "INSERT INTO `complaint_box`(`submitted_by` ,`complaint_id`, `date`, `about`, `description`) VALUES ('$submitted_by','$complaint_id','$date','$about','$description')";

    $run = mysqli_query($con,$query);

    if($run)
    {
		echo '<script>alert("Complaint Submitted Successfully!")</script>';
    }
    else
    {
		echo '<script>alert("Failed to Submit Your Complaint!")</script>';
    }
    
}

?>

<!doctype html>
<html lang="en">
	<head>
		<title>Student - Dashboard</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Complaint Box</h4>
			</div>
            <div class="row">
					<div class="col-md-12">
						<form action="complaint-box.php" method="post">
							<div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Submitted On:</label>
                                        <input type="text" name="date" readonly id="currentdate" class="form-control" required placeholder="Enter Subject Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
							    	<div class="form-group">
							    	    <label for="exampleInputPassword1">Complaint ID :</label>
							    		<?php $random = mt_rand(1000,5000); ?>
							    	    <input type='text' value='<?php echo $random ?>' readonly name='complaint_id' class='form-control'>
							    	</div>
							    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Complaint About:</label>
										<input type="text" name="about" class="form-control" required placeholder="About" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Description:</label>
										<textarea name="description" class="form-control" required placeholder="Description" required></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mt-4">
									<div class="form-group pt-2">
										<input type="submit" name="btn_submit" value="Submit" class="btn btn-primary">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../date.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>