<?php 
session_start();
include("dbconnect.php");

$name = $_POST['lname'];
$password = $_POST['pwd'];
$check = mysqli_query($db,"SELECT*FROM tbllibararian WHERE Name='$name' AND Password='$password' ");
if (mysqli_num_rows($check)>0) {
    $_SESSION['librarian']=$name;
    header("location: ../library-dashboard.php");
}
else {
    $_SESSION['error']="Doesnt exist";
    header("location: ../admin-login.php");
}