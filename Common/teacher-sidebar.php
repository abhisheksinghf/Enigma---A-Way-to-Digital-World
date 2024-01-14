	<div class="row w-100">
		<button class="show-btn button-show ml-auto">
		<i class="fa fa-bars py-1" aria-hidden="true"></i>
		</button> 
	</div>
		<nav id="sidebarMenu" class="">
			<div class="col-xl-2 col-lg-3 col-md-4 sidebar position-fixed border-right overflow-auto">
        		<div class="sidebar-header">
					<a class="nav-link text-white" href="../teacher/teacher-index.php">
					<span class="home"></span>
						<i class="fa fa-home mr-2" aria-hidden="true"></i> Dashboard
					</a>
				</div>
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link" href="../admin/display-teacher.php">
						<span data-feather="file"></span>
						<i class="fa fa-user mr-2" aria-hidden="true"></i> Personal Profile
						</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="../teacher/teacher-notice.php">
						<span data-feather="users"></span>
						<i class="fa fa-book mr-2" aria-hidden="true"></i>Assignment
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../teacher/salary-status.php">
						<span data-feather="users"></span>
						<i class="fa fa-money mr-2" aria-hidden="true"></i>Salary Status
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../teacher/solve-doubt.php">
						<span data-feather="users"></span>
						<i class="fa fa-question-circle mr-2" aria-hidden="true"></i>Solve Doubts
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../teacher/class-result.php">
						<span data-feather="users"></span>
						<i class="fa fa-list-alt mr-2" aria-hidden="true"></i>Class Results
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../teacher/teacher-password.php">
						<span data-feather="bar-chart-2"></span>
						<i class="fa fa-key mr-2" aria-hidden="true"></i> Change Password
						</a>
					</li>
					<li class="nav-item">
            <a class="nav-link" href="../Login/logout.php">
              <span data-feather="layers"></span>
              <i class="fa fa-sign-out mr-2" aria-hidden="true"></i>Logout
            </a>
          </li>
				</ul>
			</div>
		</nav>
		
		<script>
			const toggleBtn = document.querySelector(".show-btn");
			const sidebar = document.querySelector(".sidebar");
			// undefined
			toggleBtn.addEventListener("click",function(){
				sidebar.classList.toggle("show-sidebar");
			});
			
		</script>