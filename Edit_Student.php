<?php
session_start();
if (!isset($_GET['StudentId'])) {
    header("location: student_list.php");
}
include("php/dbconnect.php");
$studentdetails=mysqli_query($db,"SELECT*FROM tblstudents WHERE StudentId={$_GET['StudentId']}  ");
$books = mysqli_query($db,"SELECT*FROM tblbooks WHERE StudentId={$_GET['StudentId']} AND ReturnStatus=0 order by id desc ");
if (mysqli_num_rows($studentdetails)>0) {
    $result1 = mysqli_fetch_assoc($studentdetails);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSA: Edit Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="header">
             <div>Student details:</div>
             <hr></hr>
             <div>Names: <?php echo $result1['StudentNames']; ?></div>
             <div>Id: <?php echo $result1['StudentId']; ?></div>
             <div>Class: <?php echo $result1['ClassName']; ?></div>
            </div>
            <div class="lend">
              <?php 
              $StudentId= $_GET['StudentId'];
              include("add_book.php"); ?>
            </div>
            <div class="table">
             <div class="table-left">
             <?php if (isset($_SESSION['success'])) {?>
                <div class="success">
                    <?php echo $_SESSION['success']; ?>
                    <?php echo $_SESSION['success']="";?>
                </div>
             <?php } ?>
             <a href="manage-class.php?ClassName=<?php echo $result1['ClassName']; ?>"><button>BACK</button></a>
                <table border="1">
                    <?php if (mysqli_num_rows($books)>0) {
                        ?>
                        <th>#</th>
                            <th>Book Title</th>
                            <th>Book No</th>
                            <th>issue date</th>
                            <th>Edit</th>
                        <tbody>
                            <?php
                            $count = 1;
                            foreach ($books as $book) { ?>
                                <tr><td><?php echo $count; ?></td>
                                <td><?php echo $book['BookTitle']; ?></td>
                                <td><?php echo $book['BookNo']; ?></td>
                                <td><?php echo $book['issuedate']; ?></td>
                                <td><a href="return_book.php?StudentId=<?php echo $result1['StudentId']; ?>&BookTitle=<?php echo $book['BookTitle']; ?>&BookNo=<?php echo $book['BookNo']; ?>"><button class="unique">Return Book</button></a></td></tr>
                            <?php $count+=1; }  
                            ?>
                        </tbody>
                    <?php } ?>
                 </table>
              </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>