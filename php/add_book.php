<?php
session_start();
include('dbconnect.php');
if (!isset($_GET['StudentId'])) {
    echo "You cant view this page";
}
$StudentId = $_GET['StudentId'];
$BookTitle = mysqli_real_escape_string($db,$_POST['booktitle']);
$BookNo = mysqli_real_escape_string($db,$_POST['bookno']);

$checkbook = mysqli_query($db,"SELECT*FROM tblbooks WHERE BookTitle='$BookTitle' AND BookNo='$BookNo' AND ReturnStatus = 0 ");
if (mysqli_num_rows($checkbook)>0) {
    $_SESSION['error']="error: That book already issued";
    header("location: ../add_book.php?StudentId=$StudentId");
}else {
    //insert book
    $ReturnStatus = 0;
    $insertbooks = mysqli_query($db,"INSERT INTO tblbooks(StudentId,BookTitle,BookNo,ReturnStatus) VALUES($StudentId,'$BookTitle','$BookNo',$ReturnStatus) ");
    if($insertbooks==true){
        //check in tlb borrowers
        $checkstudent = mysqli_query($db,"SELECT*FROM tblborrowers WHERE StudentId='$StudentId'  ");
        $rows = mysqli_num_rows($checkstudent);
        if ($rows > 0) {
            $_SESSION['success'] = "Book issued";
            header("location: ../Edit_Student.php?StudentId=$StudentId");
        }
        else {
            $getstudent = mysqli_query($db,"SELECT*FROM tblstudents WHERE StudentId='$StudentId' ");
            $result = mysqli_fetch_assoc($getstudent);
            $StudentNames = $result['StudentNames'];
            $ClassName = $result['ClassName'];
            $insertBorrower = mysqli_query($db,"INSERT INTO tblborrowers(StudentId,StudentNames,ClassName) VALUES($StudentId,'$StudentNames','$ClassName')");
            $_SESSION['success']="Book issued successfully";
            header("location: ../Edit_Student.php?StudentId=$StudentId");
        }
    }
}
?>