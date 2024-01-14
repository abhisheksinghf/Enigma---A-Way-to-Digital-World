<?php  
session_start();
if (!$_SESSION["LoginAdmin"])
{
	header('location:../login/login.php');
}
	require_once "../connection/connection.php";
?>

<!-- --------------------------------Delete Student------------------------------------- -->

	<?php 
	if (isset($_GET['register_no'])) {
		$register_no=$_GET['register_no'];
		$query1="delete from student_information where register_no='$register_no'";
		$run1=mysqli_query($con,$query1);
		if ($run1) {
			header('Location: student.php');
		}
		else{
			echo "Record not deleted. Frist of all delete record  from the child table then you can delete from here ";
			header('Refresh: 5; url=student.php');
		}
	}
	?>
<!-- --------------------------------Delete Course------------------------------------- -->
<?php 
	if (isset($_GET['course_code'])) {
		$course_code=$_GET['course_code'];
		$query2="delete from courses where course_code='$course_code'";
		$run2=mysqli_query($con,$query2);
		if ($run2) {
			header('Location: courses.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>
<!-- --------------------------------Delete Subject------------------------------------- -->
<?php 
	if (isset($_GET['subject_code'])) {
		$subject_code=$_GET['subject_code'];
		$query3="delete from course_subjects where subject_code='$subject_code'";
		$run3=mysqli_query($con,$query3);
		if ($run3) {
			header('Location: subjects.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>
<!-- --------------------------------Delete Teacher------------------------------------- -->
<?php 
	if (isset($_GET['teacher_id'])) {
		$teacher_id=$_GET['teacher_id'];
		$query3="delete from teacher_information where teacher_id='$teacher_id'";
		$run3=mysqli_query($con,$query3);
		if ($run3) {
			header('Location: teacher.php');
		}
		else{
			echo "Record not deleted";
		}
	}
	?>

<!-- --------------------------------Delete Notice------------------------------------- -->

<?php 
	if (isset($_GET['notice_id'])) {
		$notice_id=$_GET['notice_id'];
		$query4="DELETE FROM `notice_board` WHERE `notice_id`='$notice_id'";
		$run4=mysqli_query($con,$query4);
		if ($run4) {
			header('Location: notice-board.php');
		}
		else{
			echo "Record not deleted";
		}
	}
	?>

<!-- --------------------------------assign subjects delete------------------------------------- -->
<?php 
	if (isset($_GET['subject'])) {
		$subject=$_GET['subject'];
		$query5="DELETE FROM `assign_subjects` WHERE `subject`='$subject'";
		$run5=mysqli_query($con,$query5);
		if ($run5) {
			header('Location: assign-subjects-teacher.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>

<!-- --------------------------------assign subjects delete------------------------------------- -->
<?php 
	if (isset($_GET['assignmet_id'])) {
		$ass_id=$_GET['assignmet_id'];
		$query5="DELETE FROM `teacher_notice` WHERE `assignmet_id`='$ass_id'";
		$run5=mysqli_query($con,$query5);
		if ($run5) {
			header('Location: ../teacher/teacher-notice.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>
