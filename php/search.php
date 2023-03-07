<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<?php
session_start();
include("dbconnect.php");
if (isset($_GET['search1']) && isset($_GET['search2'])) {
    $name = $_GET['search1'];
    $number = $_GET['search2'];
    if (!empty($name) && !empty($number)) {
        $getbook = mysqli_query($db,"SELECT*FROM tblbooks WHERE BookTitle LIKE '$name%' AND BookNo LIKE '$number%' ");
        if (mysqli_num_rows($getbook)>0) {
            $result = mysqli_fetch_assoc($getbook);
            $student = mysqli_query($db,"SELECT*FROM tblstudents WHERE StudentId='{$result['StudentId']}' ");
            if (mysqli_num_rows($student)>0) {?>
                <table border="1" id="table">
                    <thead>
                        <th>#</th>
                        <th>BookName</th>
                        <th>BookNo</th>
                        <th>Student Id</th>
                        <th>Student Name</th>
                        <th>Class</th>
                    </thead>
                    <tbody>
                        <?php 
                        $students = mysqli_fetch_assoc($student); ?>
                        <tr><td>1</td>
                            <td><?php echo $result['BookTitle']; ?></td>
                            <td><?php echo $result['BookNo']; ?></td>
                            <td><?php echo $students['StudentId']; ?></td>
                            <td><?php echo $students['StudentNames']; ?></td>
                            <td><?php echo $students['ClassName']; ?></td>

                        </tr>
                    </tbody>
                </table>
       <?php     }
        }
        else{
            echo "Book Not found";
        }
    }
}
?>
</body>
</html>