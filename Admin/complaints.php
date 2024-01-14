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
  
<!---------------- Session Ends form here ------------------------>
<title>Admin - Dashboard</title>
<body>
	<?php include('../common/common-header.php') ?>
	<?php include('../common/admin-sidebar.php') ?>  
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100 page-content-index">
			<div class="flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
      <h4>Admin Dashboard </h4>  
			</div>
            <div class="row">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements table-three-tr" cellpadding="3">
								<tr class="table-tr-head table-three text-white text-center">
									<th>Submitted By</th>
									<th>Submitted On</th>
									<th>About Complaint</th>
									<th>Description</th>
								</tr>
								<?php 
								$query="SELECT * FROM `complaint_box`";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
									<tr class="text-center">
										<td><?php echo $row['submitted_by'] ?></td>
										<td><?php echo $row['date'] ?></td>
										<td><?php echo $row['about']?></td>
										<td><?php echo $row['description'] ?></td>
									</tr>
								<?php }
								?>
                            </table>
                        </section>
                    </div>
                </div>
</main>
		
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>