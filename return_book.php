<?php
session_start();
if (!isset($_GET['StudentId']) && !isset($_GET['BookTitle']) && !isset($_GET['BookNo']) ) {
    echo "You are not allowed to view this page";
}
include("php/dbconnect.php");
$StudentId = $_GET['StudentId'];
$BookTitle = $_GET['BookTitle'];
$BookNo = $_GET['BookNo'];

$checkbooks = mysqli_query($db,"SELECT*FROM tblbooks WHERE StudentId='$StudentId' ");
$number_of_books = mysqli_num_rows($checkbooks);
if ($number_of_books > 1) {
    $returnbook = mysqli_query($db,"DELETE FROM tblbooks WHERE StudentId='$StudentId' AND BookTitle='$BookTitle' AND BookNo='$BookNo' ");
    $_SESSION['success']="1 book returned";
    header("location: Edit_Student.php?StudentId=$StudentId ");
}else{
    $returnbook = mysqli_query($db,"DELETE FROM tblbooks WHERE StudentId='$StudentId' AND BookTitle='$BookTitle' AND BookNo='$BookNo' ");
    if($returnbook){
    $deletestudent = mysqli_query($db,"DELETE FROM tblborrowers WHERE StudentId='$StudentId' ");
    if ($deletestudent) {
    $_SESSION['success']="1 book returned";
    header("location: Edit_Student.php?StudentId=$StudentId ");
    }
    }
}


?>