<?php
session_start();
if (!isset($_SESSION['librarian']) && !isset($_GET['ClassName'])) {
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Students</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    include("php/dbconnect.php");
    include("header.php");
    include("navigation-bar.php");
    $ClassName = $_GET['ClassName'];
    ?>
    <form action="php/uploadStudents.php?ClassName=<?php echo $ClassName; ?>" method="POST" enctype="multipart/form-data">
        <div class="text">You are about to upload students in <?php echo $ClassName; ?></div>
        <input type="file" name="students" id="studentsInClass">
        <button type="submit" name="upload">Upload</button>
    </form>
</body>
</html>