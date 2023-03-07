<?php
session_start();
if (!isset($_GET['ClassName'])) {
    echo "You have not selected class";
}?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="css/style.css">
    </head>
<body>
<?php include("php/dbconnect.php");
$count = 1;
$ClassName = $_GET['ClassName'];
$getstudents = mysqli_query($db,"SELECT*FROM tblstudents WHERE ClassName='$ClassName' ");
if (mysqli_num_rows($getstudents)>0) {?>
<?php include("header.php");
include("navigation-bar.php");
 ?>
 <a href="library-dashboard.php"><button>BACK</button></a>
<table border="1">
    <thead>
        <th>#</th>
        <th>Student Name</th>
        <th>Student id</th>
        <th>Number of books</th>
        <th>Edit</th>
    </thead>
    <tbody>
    <?php foreach ($getstudents as $student) {?>
    <tr><td><?php echo $count; ?></td>
    <td><?php echo $student['StudentNames']; ?></td>
    <td><?php echo $student['StudentId']; ?></td>
    <?php $numbooks=mysqli_query($db,"SELECT*FROM tblbooks WHERE StudentId={$student['StudentId']} AND ReturnStatus=0 "); 
    $num = mysqli_num_rows($numbooks);
    ?>
    <td><?php echo $num; ?></td>
    <td><a href="Edit_Student.php?StudentId=<?php echo $student['StudentId']; ?> "><button>View</button></a></td></tr>
<?php $count+=1; }
}else{
    echo "No students";
}
?>
</tbody>
</table>
</body>
</html>
