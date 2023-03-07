<?php
session_start();
if (!isset($_SESSION['librarian'])) {
    header("location: admin-login.php");
}
include('php/dbconnect.php');
$classes = mysqli_query($db,"select*from tblclasses");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <?php include("header.php");
        include("navigation-bar.php"); ?>
        <div class="container">
            <table id="table">
            <div class="search">
                <input type="text" name="search" method="GET" onkeyup="search()" id="search" placeholder="Search for student.." >
            </div>
                <thead>
                    <th>#</th>
                    <th>ClassName</th>
                    <th>Number of Students</th>
                    <th>Number of Books</th>
                    <th>Edit</th>
                </thead>
                <tbody>
                     <?php if (mysqli_num_rows($classes)>0) {
                         $nu = 1;
                         foreach ($classes as $class) { ?>
                             <tr><td><?php echo $nu; ?></td>
                             <td><?php echo $class['ClassName']; ?></td>
                             <?php
                             $checkstudents = mysqli_query($db,"SELECT*FROM tblstudents WHERE ClassName = '{$class['ClassName']}' ");
                             $numrows1 = mysqli_num_rows($checkstudents);
                             if ($numrows1 > 0) { ?>
                                <td><?php echo $numrows1; ?></td>
                                <?php $numberbooks = mysqli_query($db,"SELECT tblstudents.StudentId,tblstudents.ClassName AS classname,tblbooks.StudentId FROM tblstudents JOIN tblbooks ON tblstudents.StudentId=tblbooks.StudentId WHERE classname = '{$class['ClassName']}' AND ReturnStatus=0 "); 
                                $numrows2 = mysqli_num_rows($numberbooks);
                                if ($numrows2 > 0) { ?>
                                    <td><?php echo $numrows2; ?></td>
                                <?php }else{?>
                                    <td>0</td>
                                <?php }
                             }else { ?>
                                <td>No students</td>
                                <td>0</td>
                             <?php } ?>
                             <td><a href="manage-class.php?ClassName=<?php echo $class['ClassName']; ?>"><button>Edit</button></a></td></tr>
                         <?php $nu+=1; ?>
                         <?php }
                     }?>
                </tbody>
            </table>
        </div>
        <script src="js/search.js"></script>
    </body>
</html>