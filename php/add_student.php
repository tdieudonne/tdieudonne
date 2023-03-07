<?php
session_start();
include("dbconnect.php");
$StudentNames = mysqli_real_escape_string($db,$_POST['fullname']);
$IdNumber = mysqli_real_escape_string($db,$_POST['idnumber']);
$ClassName = mysqli_real_escape_string($db,$_POST['class']);
$checkstudent = mysqli_query($db,"SELECT*FROM tblstudents WHERE StudentId=$IdNumber ");
if (mysqli_num_rows($checkstudent)>0) {
    echo "Student Exist";
}else {
        $insertquery = mysqli_query($db,"INSERT INTO tblstudents(StudentId,StudentNames,ClassName) VALUES ('$IdNumber','$StudentNames','$ClassName')");
        if ($insertquery) {
            echo "Student added successfully";
        }else {
            echo "error";
        }
    }

?>