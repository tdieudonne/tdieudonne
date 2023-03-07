<?php
session_start();
if (!isset($_SESSION['librarian'])) {
    header("location: index.php");
    exit;
}
else{?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Students</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
        include("php/dbconnect.php");
        include("header.php");
        include("navigation-bar.php");
        $nbr = 1;
    $classes = mysqli_query($db,"SELECT*FROM tblclasses");
        ?>
        <table id="table">
            <thead>
                <th>#</th>
                <th>Class Name</th>
                <th>Action</th>
            </thead>
            <tbody>
           <?php while ($result1= mysqli_fetch_assoc($classes)) {
        $cname = $result1['ClassName'];
        ?>
                <tr>
                    <td><?php echo $nbr; ?></td>
                    <td><?php echo $cname; ?></td>
                    <td><a href="uploadStudents.php?ClassName=<?php echo $cname; ?>"><button>Add Students</button></a></td>
                </tr>
            </tbody>
        <?php $nbr++; }?>
    </table>
    </body>
    </html>
<?php }
?>