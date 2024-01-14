  <div class="row w-100">
    <button class="show-btn button-show ml-auto">
      <i class="fa fa-bars py-1" aria-hidden="true"></i>
    </button> 
  </div>
    <nav id="sidebarMenu" class="" >
			<div class="col-xl-2 col-lg-3 col-md-4 sidebar position-fixed border-right overflow-auto">
        <div class="sidebar-header">
          <div class="nav-item">
              <a class="nav-link text-white " href="../admin/admin-index.php">
                <span class="home"></span>
                  <i class="fa fa-home mr-2" aria-hidden="true"></i> Dashboard 
              </a>
          </div>
        </div>   
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="../admin/Teacher.php">
              <span data-feather="file"></span>
              <i class="fa fa-user mr-2" aria-hidden="true"></i>Teacher Registration
            </a>
		      </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/Student.php">
              <span data-feather="shopping-cart"></span>
              <i class="fa fa-user-circle mr-2" aria-hidden="true"></i>Admission
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/Courses.php">
              <span data-feather="users"></span>
              <i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i>Courses
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/subjects.php">
              <span data-feather="bar-chart-2"></span>
              <i class="fa fa-book mr-2" aria-hidden="true"></i> Subjects
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/scheme-syllabus.php">
              <span data-feather="layers"></span>
              <i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp;Scheme and Syllabus
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/fetch-student-info.php">
              <span data-feather="layers"></span>
              <i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;&nbsp;Student Information
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/fetch-teacher-info.php">
              <span data-feather="layers"></span>
              <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Faculty Information
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/assign-subjects-teacher.php">
              <span data-feather="layers"></span>
              <i class="fa fa-sticky-note-o mr-2" aria-hidden="true"></i>Assign Subjects
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/notice-board.php">
              <span data-feather="layers"></span>
              <i class="fa fa-clipboard mr-2" aria-hidden="true"></i>Notice Board
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/admin-sem-back.php">
              <span data-feather="layers"></span>
              <i class="fa fa-frown-o mr-2" aria-hidden="true"></i>Semester & Backlogs
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/classroom.php">
              <span data-feather="layers"></span>
              <i class="fa fa-users mr-2" aria-hidden="true"></i>Classrooms
            </a>
          </li>
          
          
          <li class="nav-item">
            <a class="nav-link" href="../admin/class-result.php">
              <span data-feather="layers"></span>
              <i class="fa fa-users mr-2" aria-hidden="true"></i> Class Results
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/teacher-salary.php">
              <span data-feather="layers"></span>
              <i class="fa fa-money mr-2" aria-hidden="true"></i> Teacher Salary
            </a>
          </li>   
          <li class="nav-item">
            <a class="nav-link" href="../admin/student-fee.php">
              <span data-feather="layers"></span>
              <i class="fa fa-credit-card-alt mr-2" aria-hidden="true"></i> Student Fee
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/complaints.php">
              <span data-feather="layers"></span>
              <i class="fa fa-comments mr-2" aria-hidden="true"></i> Complaints
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/manage-accounts.php">
              <span data-feather="layers"></span>
              <i class="fa fa-cogs mr-2" aria-hidden="true"></i> Manage Accounts
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/admin-password.php">
              <span data-feather="layers"></span>
              <i class="fa fa-key mr-2" aria-hidden="true"></i>Change Password
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