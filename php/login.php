<?php 
session_start();
include("dbconnect.php");

$name = $_POST['sname'];
$password = $_POST['pwd'];
$check = mysqli_query($db,"SELECT*FROM tblstudents WHERE StudentId=$password AND StudentNames='$name' ");
if (mysqli_num_rows($check)>0) {
    $_SESSION['student_dashboard']=$StudentId;
    header("location: ../student-list.php");
}
else {
    $_SESSION['error']="Student doesnt exist";
    header("location: ../login.php");
}