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
    
    
<!---------------- Session Ends form here ------------------------>
<title>Admin - Search Student</title>
	<?php include('../common/common-header.php') ?>
	<?php include('../common/admin-sidebar.php') ?>  
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100 page-content-index">
			<div class="flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<h4>Student Information</h4>
			</div>
            <div class="row">
                <div class="col-md-6">
                <form action="fetch-stud.php" method="post">
                <input type="text" name="regi_no" id="regno" class="form form-control" placeholder="Enter Register No">
					<div class="form-group">
						<div class="d-flex">
                            <button class='btn btn-primary text-white mt-2' name='search-btn'>Search</button>
							</div>
						</div>
					</form>
				</div>	
			</div>
            
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>