<?php
include('dbconnect.php');
if (!isset($_SESSION['librarian'])) {
    header("location: admin-login.php");
}
else if($_GET["ClassName"]){
    $students = mysqli_qyery($db,"SELECT*FROM tblstudents WHERE $ClassName='{$_GET["ClassName"]}' ");
    if (mysqli_num_rows($students>0)) {
        $delete = mysqli_query($db,"DELETE FROM tblstudents WHERE $ClassName='{$_GET["ClassName"]}' ");
    }
    $filename = $_FILES['name']['tmp_name'];
    $fileopen = fopen($filename, 'r');
    fgetcsv($fileopen, 100);
    while ($csv = fgetcsv($fileopen,100)) {
        $name = $csv[1];
        $ClassName = $_GET['ClassName'];
        $sex = $csv[4];
        $query = mysql_query($db,"INSERT INTO tblstudents(StudentNames,ClassName,sex) VALUES('$name','$ClassName','$sex') ");
        if ($query) {
            header("location: ../library-dashboard.php");
        }
    }

}